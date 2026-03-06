<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Timeline;

class TimelineSeeder extends Seeder
{
    public function run(): void
    {
        Timeline::query()->delete();

        $data = [
            [
                'date_label' => "18\nNov, 2025",
                'title' => 'Kickoff Meeting',
                'description' => null,
                'sort_order' => 1,
                'is_active' => 1,
            ],
            [
                'date_label' => "18 – 25\nNov, 2025",
                'title' => 'Pendaftaran Peserta',
                'description' => null,
                'sort_order' => 2,
                'is_active' => 1,
            ],
            [
                'date_label' => "27 – 28\nNov, 2025",
                'title' => 'Pelatihan Peserta dengan Tools (daring)',
                'description' => 'Cek email (yang terdaftar) untuk mendapatkan tautan zoom',
                'sort_order' => 3,
                'is_active' => 1,
            ],
            [
                'date_label' => "28 Nov –\n3 Des, 2025",
                'title' => 'Unggah Proposal Ide Karya',
                'description' => null,
                'sort_order' => 4,
                'is_active' => 1,
            ],
            [
                'date_label' => "5 – 6\nDes, 2025",
                'title' => 'Penilaian Proposal Ide Karya',
                'description' => null,
                'sort_order' => 5,
                'is_active' => 1,
            ],
            [
                'date_label' => "7\nDes, 2025",
                'title' => 'Pengumuman Peserta Lolos Seleksi Proposal',
                'description' => null,
                'sort_order' => 6,
                'is_active' => 1,
            ],
            [
                'date_label' => "9\nDes, 2025",
                'title' => 'Inkubasi Peserta (daring)',
                'description' => null,
                'sort_order' => 7,
                'is_active' => 1,
            ],
            [
                'date_label' => "10\nDes, 2025",
                'title' => 'Unggah Karya Peserta',
                'description' => null,
                'sort_order' => 8,
                'is_active' => 1,
            ],
            [
                'date_label' => "12 – 13\nDes, 2025",
                'title' => 'Presentasi Karya',
                'description' => 'Penilaian dan Penentuan Pemenang',
                'sort_order' => 9,
                'is_active' => 1,
            ],
        ];

        foreach ($data as $item) {
            Timeline::create($item);
        }
    }
}