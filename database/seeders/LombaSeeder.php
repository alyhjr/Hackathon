<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LombaKetentuanItem;
use App\Models\LombaTahapanStep;

class LombaSeeder extends Seeder
{
    public function run(): void
    {
        // =========================
        // KETENTUAN: KATEGORI
        // =========================
        $kategori = [
            ['title' => 'PAUD / Sederajat', 'image' => 'image/kategori/paud.png', 'sort_order' => 1],
            ['title' => 'SD / Sederajat',   'image' => 'image/kategori/sd.png',   'sort_order' => 2],
            ['title' => 'SMP / Sederajat',  'image' => 'image/kategori/smp.png',  'sort_order' => 3],
            ['title' => 'SMA / Sederajat',  'image' => 'image/kategori/sma.png',  'sort_order' => 4],
            ['title' => 'SMK / Sederajat',  'image' => 'image/kategori/smk.png',  'sort_order' => 5],
        ];

        foreach ($kategori as $row) {
            LombaKetentuanItem::updateOrCreate(
                [
                    'tab' => 'kategori',
                    'title' => $row['title'],
                ],
                [
                    'image' => $row['image'],     // pakai asset publik (bukan storage)
                    'content' => null,
                    'sort_order' => $row['sort_order'],
                    'is_active' => true,
                ]
            );
        }

        // =========================
        // KETENTUAN: PERSYARATAN
        // =========================
        $persyaratan = [
            'Warga Negara Indonesia',
            'Peserta bersifat tim: 1 (satu) tim terdiri dari 3 (tiga) orang (guru dan/atau tenaga kependidikan) dari satu sekolah yang sama.',
            'Setiap orang peserta hanya dapat terdaftar pada 1 (satu) tim.',
            'Peserta (tim) merupakan pendidik dan atau tenaga kependidikan aktif dibuktikan dengan surat keterangan dari Kepala Sekolah.',
            'Seluruh anggota tim diutamakan memiliki akun belajar.id',
            'Satu sekolah dapat mengirim lebih dari satu tim.',
        ];

        foreach ($persyaratan as $i => $text) {
            LombaKetentuanItem::updateOrCreate(
                [
                    'tab' => 'persyaratan',
                    'content' => $text,
                ],
                [
                    'title' => null,
                    'image' => null,
                    'sort_order' => $i + 1,
                    'is_active' => true,
                ]
            );
        }

        // =========================
        // KETENTUAN: PENDAFTARAN
        // =========================
        $pendaftaran = [
            'Tim (perwakilan) melakukan pendaftaran melalui superaplikasi Rumah Pendidikan dan mengunggah surat keterangan dari Kepala Sekolah.',
            'Tim yang telah mendaftar berhak untuk mengikuti pelatihan yang diselenggarakan oleh Pusdatin.',
        ];

        foreach ($pendaftaran as $i => $text) {
            LombaKetentuanItem::updateOrCreate(
                [
                    'tab' => 'pendaftaran',
                    'content' => $text,
                ],
                [
                    'title' => null,
                    'image' => null,
                    'sort_order' => $i + 1,
                    'is_active' => true,
                ]
            );
        }

        // =========================
        // TAHAPAN (STEP 1..6)
        // =========================
        $steps = [
            [
                'step_number' => 1,
                'title' => 'Pendaftaran',
                'bullets' => [
                    'Pendaftaran melampirkan Surat Keterangan dari Kepala Sekolah',
                ],
                'sort_order' => 1,
            ],
            [
                'step_number' => 2,
                'title' => 'Pelatihan',
                'bullets' => [
                    'Pelatihan secara daring',
                    'Difasilitasi Google for Education dan Canva',
                ],
                'sort_order' => 2,
            ],
            [
                'step_number' => 3,
                'title' => 'Proposal Ide Karya',
                'bullets' => [
                    'Unggah Proposal Ide Karya untuk 2 Gim Edukasi',
                    'Penilaian Proposal Ide Karya',
                    'Pengumuman 10 proposal terbaik tiap kategori',
                ],
                'sort_order' => 3,
            ],
            [
                'step_number' => 4,
                'title' => 'Inkubasi Peserta',
                'bullets' => [
                    'Inkubasi daring 10 peserta lolos tahap proposal tiap kategori',
                    'Unggah karya 2 Gim Edukasi',
                ],
                'sort_order' => 4,
            ],
            [
                'step_number' => 5,
                'title' => 'Penjurian',
                'bullets' => [
                    'Penilaian karya peserta',
                    'Presentasi karya 2 Gim Edukasi',
                ],
                'sort_order' => 5,
            ],
            [
                'step_number' => 6,
                'title' => 'Pemberian Hadiah',
                'bullets' => [
                    'Pengumuman 3 pemenang tiap kategori',
                    'Pemberian hadiah',
                ],
                'sort_order' => 6,
            ],
        ];

        foreach ($steps as $row) {
            LombaTahapanStep::updateOrCreate(
                [
                    'step_number' => $row['step_number'],
                ],
                [
                    'title' => $row['title'],
                    'bullets' => $row['bullets'],     // json
                    'sort_order' => $row['sort_order'],
                    'is_active' => true,
                ]
            );
        }
    }
}