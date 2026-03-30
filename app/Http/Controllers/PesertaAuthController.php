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
}