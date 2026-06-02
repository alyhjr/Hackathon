<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Peserta;
use Illuminate\Support\Facades\Hash;

class PesertaAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $peserta = Peserta::where('email', $request->email)->first();

        if (!$peserta || !Hash::check($request->password, $peserta->password)) {
            return back()->with('gagal', 'Email atau password salah.');
        }

        // Login manual pakai session
        session(['peserta_login' => $peserta->id]);

        return redirect()->route('peserta-submission.create');
    }

    public function logout()
{
    session()->forget('peserta_login');
    return redirect()->route('peserta.login')->with('status', 'Berhasil keluar.');
}

public function resetPassword(Request $request)
{
    $request->validate([
        'email'    => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $peserta = Peserta::where('email', $request->email)->first();

    if (!$peserta) {
        return back()->withErrors(['email' => 'Email tidak ditemukan.'])->withInput();
    }

    $peserta->password = Hash::make($request->password);
    $peserta->save();

    return redirect()->route('peserta.login')->with('status', 'Password berhasil diubah. Silakan login.');
}
}