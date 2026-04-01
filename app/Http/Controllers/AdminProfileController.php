<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function gantiPassword(Request $request)
    {
        $request->validate([
            'password_lama'     => 'required',
            'password_baru'     => 'required|min:8|confirmed',
        ], [
            'password_lama.required'      => 'Password lama wajib diisi.',
            'password_baru.required'      => 'Password baru wajib diisi.',
            'password_baru.min'           => 'Password baru minimal 8 karakter.',
            'password_baru.confirmed'     => 'Konfirmasi password tidak cocok.',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->password_lama, $user->password)) {
            return back()->withErrors(['password_lama' => 'Password lama tidak sesuai.'])->with('open_tab', 'password');
        }

        $user->update(['password' => Hash::make($request->password_baru)]);

        return back()->with('success', 'Password berhasil diubah!')->with('open_tab', 'password');
    }

    public function gantiEmail(Request $request)
    {
        $request->validate([
            'email_baru'  => 'required|email|unique:users,email,' . Auth::id(),
            'password'    => 'required',
        ], [
            'email_baru.required' => 'Email baru wajib diisi.',
            'email_baru.email'    => 'Format email tidak valid.',
            'email_baru.unique'   => 'Email sudah digunakan.',
            'password.required'   => 'Password wajib diisi untuk konfirmasi.',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password tidak sesuai.'])->with('open_tab', 'email');
        }

        $user->update(['email' => $request->email_baru]);

        return back()->with('success', 'Email berhasil diubah!')->with('open_tab', 'email');
    }
}