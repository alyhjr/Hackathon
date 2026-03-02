<?php

namespace App\Http\Controllers;

use App\Models\CalonPeserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegistrasiController extends Controller
{
    // GET /registrasi
    public function index()
    {
        return view('pages.registrasi');
    }

    // POST /registrasi/cek
    public function cek(Request $request)
    {
        $data = $request->validate([
            'nuptk' => ['required', 'min:5'],
            'tanggal_lahir' => ['required', 'date'],
        ]);

        $nuptk = $data['nuptk'];
        $tanggal_lahir = $data['tanggal_lahir'];

        // ===== DUMMY DAPODIK =====
        // nanti kalau sudah ada API dapodik asli, ganti bagian ini
        $hasil = [
            'nama' => 'Guru Contoh',
            'npsn' => '20202020',
            'sekolah' => 'SDN Contoh 1',
        ];

        // balik ke halaman yang sama + bawa variable supaya STEP 2 muncul
        return view('pages.registrasi', compact('nuptk', 'tanggal_lahir', 'hasil'));
    }

    // POST /registrasi/simpan
    public function simpan(Request $request)
    {
        $data = $request->validate([
            'nuptk' => ['required', 'min:5'],
            'tanggal_lahir' => ['required', 'date'],
            'nama' => ['required', 'string'],
            'npsn' => ['nullable', 'string'],
            'no_telp' => ['required', 'string', 'min:9'],
            'email' => ['required', 'email'],
        ]);

        // Simpan / update data calon peserta
        CalonPeserta::updateOrCreate(
            ['nuptk' => $data['nuptk']],
            [
                'tanggal_lahir' => $data['tanggal_lahir'],
                'nama' => $data['nama'],
                'npsn' => $data['npsn'] ?? null,
                'no_telp' => $data['no_telp'],
                'email' => $data['email'],
                'status' => 'submitted',
            ]
        );

        // Kirim email konfirmasi (Mailtrap / SMTP)
        Mail::raw(
            "Halo {$data['nama']},\n\nRegistrasi kamu berhasil dikirim dan sedang menunggu verifikasi panitia.\n\nTerima kasih.",
            function ($message) use ($data) {
                $message->to($data['email'])
                    ->subject('Registrasi Berhasil - Hackathon');
            }
        );

        return redirect()
            ->route('registrasi')
            ->with('success', 'Registrasi berhasil dikirim!');
    }
}