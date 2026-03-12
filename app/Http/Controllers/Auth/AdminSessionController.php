<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminSessionController extends Controller
{
    /**
     * Tampilkan halaman login admin.
     */
    public function create(): View
    {
        return view('auth.admin-login');
    }

    /**
     * Proses login admin.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        // Cek apakah user adalah admin
        if (!Auth::user()->is_admin) {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return back()->withErrors([
                'email' => 'Akun ini tidak memiliki akses admin.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('admin.site-settings.edit'));
    }

    /**
     * Logout admin.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}