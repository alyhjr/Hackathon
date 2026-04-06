<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use PragmaRX\Google2FA\Google2FA;
use App\Models\AdminTwoFactor;
use App\Models\User;

class AdminSessionController extends Controller
{
    // =============================================
    // STEP 1: Tampilkan halaman login
    // =============================================
    public function create(): View
    {
        return view('admin.login');
    }

    // =============================================
    // STEP 1: Proses login (email + password + reCAPTCHA)
    // =============================================
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Verifikasi reCAPTCHA
        $captchaToken = $request->input('g-recaptcha-response');
        if (!$captchaToken) {
            return back()
                ->withInput(['email' => $request->email])
                ->with('captcha_error', 'Centang verifikasi "Saya bukan robot" terlebih dahulu.');
        }

        $captchaVerify = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => config('services.recaptcha.secret'),
            'response' => $captchaToken,
            'remoteip' => $request->ip(),
        ]);

        if (!$captchaVerify->json('success')) {
            return back()
                ->withInput(['email' => $request->email])
                ->with('captcha_error', 'Verifikasi reCAPTCHA gagal. Coba lagi.');
        }

        // Cek email & password
        if (!Auth::validate(['email' => $request->email, 'password' => $request->password])) {
            return back()
                ->withInput(['email' => $request->email])
                ->with('error', 'Email dan Password tidak terdaftar!');
        }

        $user = User::where('email', $request->email)->first();

        // Cek apakah admin
        if (!$user->is_admin) {
            return back()
                ->withInput(['email' => $request->email])
                ->with('error', 'Akun ini tidak memiliki akses admin.');
        }

        // Simpan sementara di session, belum login penuh
        Session::put('2fa_user_id', $user->id);
        Session::put('2fa_email', $user->email);

        // Cek apakah sudah setup 2FA
        $twoFactor = AdminTwoFactor::where('user_id', $user->id)->first();

        if (!$twoFactor || !$twoFactor->is_confirmed) {
            return redirect()->route('admin.2fa.setup');
        }

        return redirect()->route('admin.2fa.verify');
    }

    // =============================================
    // STEP 2a: Setup Google Authenticator (scan QR)
    // =============================================
    public function showSetup()
    {
        if (!Session::has('2fa_user_id')) {
            return redirect()->route('admin.login');
        }

        $user      = User::find(Session::get('2fa_user_id'));
        $google2fa = new Google2FA();

        $twoFactor = AdminTwoFactor::firstOrCreate(
            ['user_id' => $user->id],
            ['secret'  => $google2fa->generateSecretKey()]
        );

        $qrUri = $google2fa->getQRCodeUrl(
            config('app.name', 'CMS Kemendikdasmen'),
            $user->email,
            $twoFactor->secret
        );

        return view('admin.setup2fa', [
            'qr_uri' => $qrUri,
            'secret' => $twoFactor->secret,
            'email'  => $user->email,
        ]);
    }

    public function confirmSetup(Request $request)
    {
        if (!Session::has('2fa_user_id')) {
            return redirect()->route('admin.login');
        }

        $request->validate(['otp_code' => 'required|digits:6']);

        $user      = User::find(Session::get('2fa_user_id'));
        $twoFactor = AdminTwoFactor::where('user_id', $user->id)->firstOrFail();
        $google2fa = new Google2FA();

        if (!$google2fa->verifyKey($twoFactor->secret, $request->otp_code)) {
            return back()->with('error', 'Kode salah. Pastikan waktu HP Anda sinkron.');
        }

        $twoFactor->update(['is_confirmed' => true]);

        Auth::loginUsingId($user->id);
        Session::forget(['2fa_user_id', '2fa_email']);

        return redirect()->intended(route('admin.site-settings.edit'))
                         ->with('success', 'Google Authenticator berhasil diaktifkan!');
    }

    // =============================================
    // STEP 2b: Verifikasi kode OTP
    // =============================================
    public function showVerify()
    {
        if (!Session::has('2fa_user_id')) {
            return redirect()->route('admin.login');
        }

        $email  = Session::get('2fa_email', '');
        $masked = $this->maskEmail($email);

        return view('admin.verify2fa', ['masked_email' => $masked]);
    }

    public function processVerify(Request $request)
    {
        if (!Session::has('2fa_user_id')) {
            return redirect()->route('admin.login');
        }

        $request->validate(['otp_code' => 'required|digits:6']);

        $user      = User::find(Session::get('2fa_user_id'));
        $twoFactor = AdminTwoFactor::where('user_id', $user->id)->firstOrFail();
        $google2fa = new Google2FA();

        if (!$google2fa->verifyKey($twoFactor->secret, $request->otp_code, 2)) {
            return back()->with([
                'error'        => 'Kode salah atau sudah kadaluarsa. Coba kode terbaru.',
                'masked_email' => $this->maskEmail(Session::get('2fa_email', '')),
            ]);
        }

        Auth::loginUsingId($user->id);
        Session::forget(['2fa_user_id', '2fa_email']);

        return redirect()->intended(route('admin.site-settings.edit'))
                         ->with('success', 'Selamat datang, ' . $user->name . '!');

    }
    // =============================================
    // Forgot Password
    // =============================================
    public function showForgot()
    {
        return view('admin.forgot-password');
    }

    public function processForgot(Request $request)
    {
        $request->validate([
            'email'                 => 'required|email',
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = User::where('email', $request->email)->where('is_admin', true)->first();

        if (!$user) {
            return back()->with('error', 'Email admin tidak ditemukan.');
        }

        $user->update(['password' => bcrypt($request->password)]);

        return redirect()->route('admin.login')->with('status', 'Password berhasil direset! Silakan login.');
    }

    // =============================================
    // Logout
    // =============================================
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    // =============================================
    // Helper: Sembunyikan sebagian email
    // =============================================
    private function maskEmail(string $email): string
    {
        [$local, $domain] = explode('@', $email);
        $masked = substr($local, 0, 1) . str_repeat('*', max(strlen($local) - 2, 1)) . substr($local, -1);
        return "$masked@$domain";
    }
}