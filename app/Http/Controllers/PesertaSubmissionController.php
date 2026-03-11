<?php

namespace App\Http\Controllers;

use App\Models\PesertaSubmission;
use Illuminate\Http\Request;

class PesertaSubmissionController extends Controller
{
    public function create()
    {
        return view('pages.peserta-submission');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_tim' => 'required|string|max:255',
            'anggota_1' => 'required|string|max:255',
            'anggota_2' => 'nullable|string|max:255',
            'anggota_3' => 'nullable|string|max:255',
            'proposal_file' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'karya_file' => 'nullable|file|mimes:pdf,zip,rar,doc,docx|max:10240',
        ]);

        $proposalPath = null;
        $karyaPath = null;

        if ($request->hasFile('proposal_file')) {
            $proposalPath = $request->file('proposal_file')->store('peserta/proposal', 'public');
        }

        if ($request->hasFile('karya_file')) {
            $karyaPath = $request->file('karya_file')->store('peserta/karya', 'public');
        }

        PesertaSubmission::create([
            'nama_tim' => $data['nama_tim'],
            'anggota_1' => $data['anggota_1'],
            'anggota_2' => $data['anggota_2'] ?? null,
            'anggota_3' => $data['anggota_3'] ?? null,
            'proposal_file' => $proposalPath,
            'karya_file' => $karyaPath,
        ]);

        return redirect()->back()->with('success', 'Data peserta berhasil dikirim.');
    }
}