<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\RegistrasiMail;
use App\Models\Registrasi;

class RegistrasiController extends Controller
{
    // ----------------------------------------------------------------
    // Tampilkan form registrasi
    // ----------------------------------------------------------------
    public function index()
    {
        return view('pages.registrasi');
    }

    // ----------------------------------------------------------------
    // AJAX: Cek NUPTK + tanggal lahir ke API Dapodik (mock)
    // ----------------------------------------------------------------
    public function cekNuptk(Request $request)
    {
        $request->validate([
            'nuptk'      => 'required|digits:16',
            'tgl_lahir'  => 'required|date_format:Y-m-d',
        ]);

        $nuptk     = $request->nuptk;
        $tglLahir  = $request->tgl_lahir;

        try {
            // ---------------------------------------------------------
            // MOCK: ganti blok ini dengan endpoint Dapodik asli nanti
            // Contoh endpoint asli:
            //   $response = Http::withToken(config('services.dapodik.token'))
            //       ->get(config('services.dapodik.url') . '/ptk/nuptk', [
            //           'nuptk'     => $nuptk,
            //           'tgl_lahir' => $tglLahir,
            //       ]);
            // ---------------------------------------------------------
            $mockData = $this->mockDapodik($nuptk, $tglLahir);

            if (!$mockData['valid']) {
                return response()->json([
                    'status'  => 'not_found',
                    'message' => 'NUPTK atau tanggal lahir tidak ditemukan di data Dapodik.',
                ], 404);
            }

            // Cek apakah sudah terdaftar
            $sudahDaftar = Registrasi::where('nuptk', $nuptk)->exists();

            return response()->json([
                'status'       => 'found',
                'sudah_daftar' => $sudahDaftar,
                'data'         => $mockData['data'],
            ]);

        } catch (\Exception $e) {
            Log::error('Dapodik API error: ' . $e->getMessage());
            return response()->json([
                'status'  => 'error',
                'message' => 'Gagal menghubungi server Dapodik. Coba lagi.',
            ], 500);
        }
    }

    // ----------------------------------------------------------------
    // Simpan registrasi + kirim notifikasi
    // ----------------------------------------------------------------
    public function store(Request $request)
    {
        $request->validate([
            'nuptk'      => 'required|digits:16',
            'tgl_lahir'  => 'required|date_format:Y-m-d',
            'nama'       => 'required|string|max:255',
            'sekolah'    => 'required|string|max:255',
            'provinsi'   => 'required|string|max:100',
            'no_tlp'     => 'required|string|min:9|max:15|regex:/^[0-9+\-\s]+$/',
            'email'      => 'required|email|max:255',
        ]);

        // Cegah duplikasi
        if (Registrasi::where('nuptk', $request->nuptk)->exists()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'NUPTK ini sudah terdaftar.',
            ], 422);
        }

        // Simpan ke database
        $registrasi = Registrasi::create([
            'nuptk'    => $request->nuptk,
            'tgl_lahir'=> $request->tgl_lahir,
            'nama'     => $request->nama,
            'sekolah'  => $request->sekolah,
            'provinsi' => $request->provinsi,
            'no_tlp'   => $request->no_tlp,
            'email'    => $request->email,
        ]);

        // Kirim notifikasi (email + WA) — async agar tidak blocking
        $this->kirimEmail($registrasi);
        $this->kirimWhatsApp($registrasi);

        return response()->json([
            'status'  => 'success',
            'message' => 'Registrasi berhasil! Notifikasi telah dikirim ke email dan WhatsApp Anda.',
        ]);
    }

    // ----------------------------------------------------------------
    // Kirim Email
    // ----------------------------------------------------------------
    private function kirimEmail(Registrasi $registrasi): void
    {
        try {
            Mail::to($registrasi->email)->send(new RegistrasiMail($registrasi));
        } catch (\Exception $e) {
            Log::error('Gagal kirim email registrasi: ' . $e->getMessage());
        }
    }

    // ----------------------------------------------------------------
    // Kirim WhatsApp via Fonnte
    // Docs: https://fonnte.com/api
    // ----------------------------------------------------------------
    private function kirimWhatsApp(Registrasi $registrasi): void
    {
        $token  = config('services.fonnte.token'); // set di .env: FONNTE_TOKEN=xxx
        $no     = preg_replace('/[^0-9]/', '', $registrasi->no_tlp);

        // Normalisasi nomor: 08xx → 628xx
        if (str_starts_with($no, '0')) {
            $no = '62' . substr($no, 1);
        }

        $pesan = "✅ *Registrasi Berhasil!*\n\n"
               . "Halo, *{$registrasi->nama}*!\n\n"
               . "Pendaftaran Anda untuk *Hackathon Rumah Pendidikan 2026* telah berhasil dicatat.\n\n"
               . "📋 *Detail Registrasi:*\n"
               . "• NUPTK     : {$registrasi->nuptk}\n"
               . "• Nama      : {$registrasi->nama}\n"
               . "• Sekolah   : {$registrasi->sekolah}\n"
               . "• Provinsi  : {$registrasi->provinsi}\n"
               . "• Email     : {$registrasi->email}\n\n"
               . "Pantau informasi selanjutnya di website resmi kami.\n\n"
               . "_Pesan ini dikirim otomatis, mohon tidak membalas._";

        try {
            Http::withHeaders(['Authorization' => $token])
                ->post('https://api.fonnte.com/send', [
                    'target'  => $no,
                    'message' => $pesan,
                    'countryCode' => '62',
                ]);
        } catch (\Exception $e) {
            Log::error('Gagal kirim WA Fonnte: ' . $e->getMessage());
        }
    }

    // ----------------------------------------------------------------
    // MOCK Dapodik — hapus / ganti dengan API asli
    // ----------------------------------------------------------------
    private function mockDapodik(string $nuptk, string $tglLahir): array
    {
        // Simulasi: NUPTK valid jika 16 digit & tgl lahir cocok (dummy)
        $mockDb = [
            '1234567890123456' => [
                'tgl_lahir' => '1985-06-15',
                'nama'      => 'Siti Rahayu, S.Pd.',
                'sekolah'   => 'SDN 01 Pamulang',
                'provinsi'  => 'Banten',
                'jabatan'   => 'Guru Kelas',
                'nip'       => '198506152010012001',
            ],
            '9876543210987654' => [
                'tgl_lahir' => '1990-03-22',
                'nama'      => 'Budi Santoso, M.Pd.',
                'sekolah'   => 'SMPN 3 Tangerang Selatan',
                'provinsi'  => 'Banten',
                'jabatan'   => 'Guru Matematika',
                'nip'       => '-',
            ],
        ];

        if (!isset($mockDb[$nuptk])) {
            return ['valid' => false];
        }

        $data = $mockDb[$nuptk];

        if ($data['tgl_lahir'] !== $tglLahir) {
            return ['valid' => false];
        }

        return [
            'valid' => true,
            'data'  => [
                'nama'     => $data['nama'],
                'sekolah'  => $data['sekolah'],
                'provinsi' => $data['provinsi'],
                'jabatan'  => $data['jabatan'],
                'nip'      => $data['nip'],
                'nuptk'    => $nuptk,
            ],
        ];
    }
}