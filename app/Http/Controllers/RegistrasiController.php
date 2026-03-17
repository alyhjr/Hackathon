<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;

class RegistrasiController extends Controller
{
    public function index()
    {
       return view('pages.registrasi');
    }

    public function cek(Request $request)
    {
        $request->validate([
            'nuptk'         => 'required|digits:16',
            'tanggal_lahir' => 'required|date',
        ]);

        $peserta = Peserta::where('nuptk', $request->nuptk)
                          ->whereDate('tanggal_lahir', $request->tanggal_lahir)
                          ->first();

        if (!$peserta) {
            return back()->with('gagal', 'NUPTK atau tanggal lahir tidak ditemukan dalam sistem.');
        }

        session(['peserta_id' => $peserta->id]);

        return back()->with('berhasil', true)->with('peserta', $peserta);
    }

    public function submit(Request $request)
    {
        $pesertaId = session('peserta_id');

        if (!$pesertaId) {
            return redirect()->route('registrasi')->with('gagal', 'Sesi habis, silakan ulangi.');
        }

        $peserta = Peserta::findOrFail($pesertaId);

        $password = \Carbon\Carbon::parse($peserta->tanggal_lahir)->format('dmY');
        $peserta->update(['password' => bcrypt($password)]);

        session()->forget('peserta_id');

        return redirect()->route('peserta.login')->with('status', 'Registrasi berhasil! Silakan login menggunakan email dan password tanggal lahir Anda (format: ddmmyyyy).');
    }
}