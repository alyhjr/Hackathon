<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InformasiPenting;

class InformasiPentingSeeder extends Seeder
{
    public function run(): void
    {
        InformasiPenting::query()->delete();

        $data = [
            [
                'content' => 'Informasi lanjutan terkait pelatihan dan tahapan berikutnya telah dikirimkan melalui email kepada masing-masing Ketua Tim yang lolos.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'content' => 'Mohon segera melakukan pengecekan email (termasuk folder spam/promosi) agar tidak ada informasi terlewat.',
                'sort_order' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($data as $item) {
            InformasiPenting::create($item);
        }
    }
}