<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Auth\AdminSessionController;
use App\Models\Faq;
use App\Models\LombaKetentuanItem;
use App\Models\LombaTahapanStep;
use App\Models\Pengumuman;
use App\Models\PengumumanGroup;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\PesertaSubmissionController;
use App\Http\Controllers\PesertaAuthController;
use App\Http\Controllers\Admin\NewsController;


/*
|--------------------------------------------------------------------------
| BERANDA
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| LOMBA
|--------------------------------------------------------------------------
*/
Route::prefix('lomba')->name('lomba.')->group(function () {
    Route::view('/panduan', 'pages.lomba.panduan')->name('panduan');

    Route::get('/tahapan', function () {
        $steps = LombaTahapanStep::where('is_active', 1)
            ->orderBy('step_number')->orderBy('sort_order')->get();
        return view('pages.lomba.tahapan', compact('steps'));
    })->name('tahapan');

    Route::get('/ketentuan', function () {
        $kategori     = LombaKetentuanItem::where('tab', 'kategori')->where('is_active', 1)->orderBy('sort_order')->orderBy('id')->get();
        $persyaratan  = LombaKetentuanItem::where('tab', 'persyaratan')->where('is_active', 1)->orderBy('sort_order')->orderBy('id')->get();
        $pendaftaran  = LombaKetentuanItem::where('tab', 'pendaftaran')->where('is_active', 1)->orderBy('sort_order')->orderBy('id')->get();
        return view('pages.lomba.ketentuan', compact('kategori', 'persyaratan', 'pendaftaran'));
    })->name('ketentuan');
});

/*
|--------------------------------------------------------------------------
| PENGUMUMAN
|--------------------------------------------------------------------------
*/
Route::prefix('pengumuman')->name('pengumuman.')->group(function () {
    Route::get('/3besar', function () {
        $pengumuman = Pengumuman::where('type', 'tiga_besar')->where('is_active', 1)->orderBy('sort_order')->first();
        $groups = collect();
        if ($pengumuman) {
            $groups = PengumumanGroup::with(['entries' => fn($q) => $q->where('is_active', 1)->orderBy('rank_order')->orderBy('sort_order')->orderBy('id')])
                ->where('pengumuman_id', $pengumuman->id)->where('is_active', 1)->orderBy('sort_order')->orderBy('id')->get();
        }
        return view('pages.pengumuman.3besar', compact('pengumuman', 'groups'));
    })->name('3besar');

    Route::get('/lolos-seleksi-proposal', function () {
        $pengumuman = Pengumuman::where('type', 'lolos')->where('is_active', 1)->orderBy('sort_order')->first();
        $groups = collect();
        if ($pengumuman) {
            $groups = PengumumanGroup::with(['entries' => fn($q) => $q->where('is_active', 1)->orderBy('rank_order')->orderBy('sort_order')->orderBy('id')])
                ->where('pengumuman_id', $pengumuman->id)->where('is_active', 1)->orderBy('sort_order')->orderBy('id')->get();
        }
        return view('pages.pengumuman.lolos', compact('pengumuman', 'groups'));
    })->name('lolos');
});

/*
|--------------------------------------------------------------------------
| FAQ
|--------------------------------------------------------------------------
*/
Route::get('/faq', function () {
    $faqs = Faq::where('is_active', 1)->orderBy('category')->orderBy('sort_order')->orderBy('id')->get();
    return view('pages.faq', compact('faqs'));
})->name('faq');

/*
|--------------------------------------------------------------------------
| REGISTRASI
|--------------------------------------------------------------------------
*/
Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('registrasi');
Route::post('/registrasi/cek', [RegistrasiController::class, 'cek'])->name('registrasi.cek');
Route::post('/registrasi/store', [RegistrasiController::class, 'store'])->name('registrasi.store');
Route::post('/registrasi/submit', [RegistrasiController::class, 'submit'])->name('registrasi.submit');

/*
|--------------------------------------------------------------------------
| PESERTA
|--------------------------------------------------------------------------
*/
Route::get('/peserta/login', fn() => view('pages.peserta-login'))->name('peserta.login');
Route::post('/peserta/login', [PesertaAuthController::class, 'login'])->name('peserta.login.post');
Route::post('/peserta/logout', [PesertaAuthController::class, 'logout'])->name('peserta.logout');

Route::get('/peserta-submission', [PesertaSubmissionController::class, 'create'])->name('peserta-submission.create');
Route::post('/peserta-submission', [PesertaSubmissionController::class, 'store'])->name('peserta-submission.store');

/*
|--------------------------------------------------------------------------
| ADMIN LOGIN + 2FA
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    // Login
    Route::get('/login',  [AdminSessionController::class, 'create'])->name('login');
    Route::post('/login', [AdminSessionController::class, 'store'])->name('login.post');

    // 2FA Setup (scan QR - hanya sekali)
    Route::get('/2fa/setup',  [AdminSessionController::class, 'showSetup'])->name('2fa.setup');
    Route::post('/2fa/setup', [AdminSessionController::class, 'confirmSetup'])->name('2fa.setup.post');

    // 2FA Verify (input kode OTP)
    Route::get('/2fa/verify',  [AdminSessionController::class, 'showVerify'])->name('2fa.verify');
    Route::post('/2fa/verify', [AdminSessionController::class, 'processVerify'])->name('2fa.verify.post');
    
    // Forgot Password  ← TAMBAHKAN DI SINI
    Route::get('/forgot-password', [AdminSessionController::class, 'showForgot'])->name('forgot');
    Route::post('/forgot-password', [AdminSessionController::class, 'processForgot'])->name('forgot.post');
    // Logout
    Route::post('/logout', [AdminSessionController::class, 'destroy'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| ADMIN CMS (perlu login)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    Route::put('/akun/email',    [SiteSettingController::class, 'updateEmail'])->name('akun.email');
    Route::put('/akun/password', [SiteSettingController::class, 'updatePassword'])->name('akun.password');

    Route::get('/site-settings',  [SiteSettingController::class, 'edit'])->name('site-settings.edit');
    Route::put('/site-settings',  [SiteSettingController::class, 'update'])->name('site-settings.update');

    Route::get('/peserta-submissions', [SiteSettingController::class, 'pesertaSubmissionIndex'])->name('site-settings.peserta-submissions');
    Route::delete('/site-settings/peserta-submission/{pesertaSubmission}', [SiteSettingController::class, 'pesertaSubmissionDestroy'])->name('site-settings.peserta-submission.destroy');
    Route::get('/site-settings/peserta-submission/export', [SiteSettingController::class, 'pesertaSubmissionExport'])->name('site-settings.peserta-submission.export');

    Route::post('/site-settings/faqs',        [SiteSettingController::class, 'faqStore'])->name('site-settings.faqs.store');
    Route::put('/site-settings/faqs/{faq}',   [SiteSettingController::class, 'faqUpdate'])->name('site-settings.faqs.update');
    Route::delete('/site-settings/faqs/{faq}',[SiteSettingController::class, 'faqDestroy'])->name('site-settings.faqs.destroy');

    Route::post('/site-settings/timeline',             [SiteSettingController::class, 'timelineStore'])->name('site-settings.timeline.store');
    Route::put('/site-settings/timeline/{timeline}',   [SiteSettingController::class, 'timelineUpdate'])->name('site-settings.timeline.update');
    Route::delete('/site-settings/timeline/{timeline}',[SiteSettingController::class, 'timelineDestroy'])->name('site-settings.timeline.destroy');

    Route::post('/site-settings/informasi-penting',                    [SiteSettingController::class, 'informasiPentingStore'])->name('site-settings.informasi-penting.store');
    Route::put('/site-settings/informasi-penting/{informasiPenting}',  [SiteSettingController::class, 'informasiPentingUpdate'])->name('site-settings.informasi-penting.update');
    Route::delete('/site-settings/informasi-penting/{informasiPenting}',[SiteSettingController::class, 'informasiPentingDestroy'])->name('site-settings.informasi-penting.destroy');

    Route::post('/site-settings/pengumuman',              [SiteSettingController::class, 'storePengumuman'])->name('site-settings.pengumuman.store');
    Route::put('/site-settings/pengumuman/{pengumuman}',  [SiteSettingController::class, 'updatePengumuman'])->name('site-settings.pengumuman.update');
    Route::delete('/site-settings/pengumuman/{pengumuman}',[SiteSettingController::class, 'destroyPengumuman'])->name('site-settings.pengumuman.destroy');

    Route::post('/site-settings/pengumuman-groups',           [SiteSettingController::class, 'storePengumumanGroup'])->name('site-settings.pengumuman-groups.store');
    Route::put('/site-settings/pengumuman-groups/{group}',    [SiteSettingController::class, 'updatePengumumanGroup'])->name('site-settings.pengumuman-groups.update');
    Route::delete('/site-settings/pengumuman-groups/{group}', [SiteSettingController::class, 'destroyPengumumanGroup'])->name('site-settings.pengumuman-groups.destroy');

    // NEWS
Route::post('/site-settings/news', [NewsController::class, 'store'])->name('news.store');
Route::put('/site-settings/news/{id}', [NewsController::class, 'update'])->name('news.update');
Route::delete('/site-settings/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

    Route::post('/site-settings/pengumuman-entries',          [SiteSettingController::class, 'storePengumumanEntry'])->name('site-settings.pengumuman-entries.store');
    Route::put('/site-settings/pengumuman-entries/{entry}',   [SiteSettingController::class, 'updatePengumumanEntry'])->name('site-settings.pengumuman-entries.update');
    Route::delete('/site-settings/pengumuman-entries/{entry}',[SiteSettingController::class, 'destroyPengumumanEntry'])->name('site-settings.pengumuman-entries.destroy');

    Route::post('/site-settings/lomba/ketentuan',          [SiteSettingController::class, 'lombaKetentuanStore'])->name('site-settings.lomba.ketentuan.store');
    Route::put('/site-settings/lomba/ketentuan/{item}',    [SiteSettingController::class, 'lombaKetentuanUpdate'])->name('site-settings.lomba.ketentuan.update');
    Route::delete('/site-settings/lomba/ketentuan/{item}', [SiteSettingController::class, 'lombaKetentuanDestroy'])->name('site-settings.lomba.ketentuan.destroy');

    Route::post('/site-settings/lomba/tahapan',          [SiteSettingController::class, 'lombaTahapanStore'])->name('site-settings.lomba.tahapan.store');
    Route::put('/site-settings/lomba/tahapan/{step}',    [SiteSettingController::class, 'lombaTahapanUpdate'])->name('site-settings.lomba.tahapan.update');
    Route::delete('/site-settings/lomba/tahapan/{step}', [SiteSettingController::class, 'lombaTahapanDestroy'])->name('site-settings.lomba.tahapan.destroy');

    Route::post('/peserta-registrasi/{id}/status', [SiteSettingController::class, 'updateStatus'])->name('peserta-registrasi.status');
});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| admin
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\AdminProfileController;

Route::middleware('auth')->group(function () {
    Route::post('/admin/ganti-password', [AdminProfileController::class, 'gantiPassword'])->name('admin.ganti-password');
    Route::post('/admin/ganti-email', [AdminProfileController::class, 'gantiEmail'])->name('admin.ganti-email');
});



Route::middleware('auth')->group(function () {
    Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::patch('/profile/email', [ProfileController::class, 'updateEmail'])->name('profile.email');
});


