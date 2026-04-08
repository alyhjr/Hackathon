<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Peserta;

class PesertaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nuptk'         => '1234567890123456',
                'tanggal_lahir' => '1990-05-15',
                'nama'          => 'Amara Putri',
                'sekolah'       => 'SMA Negeri 1 Jakarta',
                'email'         => 'amara@gmail.com',
                'kota'          => 'Jakarta',
                'provinsi'      => 'DKI Jakarta',
                'status'        => 'pending',
                'password'      => null,
            ],
            [
                'nuptk'         => '9876543210987654',
                'tanggal_lahir' => '1988-11-20',
                'nama'          => 'Siti Rahayu',
                'sekolah'       => 'SMP Negeri 3 Bandung',
                'email'         => 'siti@gmail.com',
                'kota'          => 'Bandung',
                'provinsi'      => 'Jawa Barat',
                'status'        => 'pending',
                'password'      => null,
            ],
            [
                'nuptk'         => '1112223334445556',
                'tanggal_lahir' => '2000-02-01',
                'nama'          => 'Rachel',
                'sekolah'       => 'SMA Citra Bangsa',
                'email'         => 'rachel@gmail.com',
                'kota'          => 'Jakarta',
                'provinsi'      => 'DKI Jakarta',
                'status'        => 'pending',
                'password'      => null,
            ],
            [
                'nuptk'         => '1122334455667788',
                'tanggal_lahir' => '1995-03-08',
                'nama'          => 'Ahmad Fauzi',
                'sekolah'       => 'SD Negeri 5 Surabaya',
                'email'         => 'ahmad@gmail.com',
                'kota'          => 'Surabaya',
                'provinsi'      => 'Jawa Timur',
                'status'        => 'pending',
                'password'      => null,
            ],

            [
                'nuptk'         => '2005050500000001',
                'tanggal_lahir' => '2005-05-05',
                'nama'          => 'Aqeela Ulth',
                'sekolah'       => 'SMA Negeri 2 Jakarta',
                'email'         => 'aqeela@gmail.com',
                'kota'          => 'Jakarta',
                'provinsi'      => 'DKI Jakarta',
                'status'        => 'pending',
                'password'      => null,
            ],
            [
                'nuptk'         => '2004040400000002',
                'tanggal_lahir' => '2004-04-04',
                'nama'          => 'Aurela',
                'sekolah'       => 'SMA Negeri 5 Bandung',
                'email'         => 'aurela@gmail.com',
                'kota'          => 'Bandung',
                'provinsi'      => 'Jawa Barat',
                'status'        => 'pending',
                'password'      => null,
            ],
        ];

        foreach ($data as $item) {
            Peserta::updateOrCreate(
                ['nuptk' => $item['nuptk']],
                $item
            );
        }
    }
}