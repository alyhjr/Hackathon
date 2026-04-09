<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengumuman;
use App\Models\PengumumanGroup;
use App\Models\PengumumanEntry;

class PengumumanSeeder extends Seeder
{
    public function run(): void
    {
        // biar tidak dobel saat dijalankan ulang
        PengumumanEntry::query()->delete();
        PengumumanGroup::query()->delete();
        Pengumuman::query()->delete();

        /*
        |--------------------------------------------------------------------------
        | PENGUMUMAN LOLOS
        |--------------------------------------------------------------------------
        */
        $lolos = Pengumuman::create([
            'type' => 'lolos',
            'title' => 'Pengumuman Peserta Lolos Seleksi Proposal Hackathon Rumah Pendidikan 2026',
            'content' => null,
            'sort_order' => 1,
            'is_active' => 1,
        ]);

        $lolosData = [
            [
                'title' => '10 TIM PESERTA',
                'subtitle' => 'LOLOS JENJANG PAUD',
                'slug' => 'paud',
                'sort_order' => 1,
                'entries' => [
                    ['team_name' => 'Tim GPG (Guru PAUD Cacor)', 'school_name' => 'TK IT AL-BUSYRA HASYIMIYAH, Prov. Nusa Tenggara Barat', 'rank_order' => 1, 'is_preview' => 1],
                    ['team_name' => 'PIONER DIGITAL', 'school_name' => 'TK Cendekia, Prov. Jawa Barat', 'rank_order' => 2, 'is_preview' => 1],
                    ['team_name' => 'SRIKANDI', 'school_name' => 'TK Dharma Wanita, Prov. Jawa Barat', 'rank_order' => 3, 'is_preview' => 1],
                    ['team_name' => 'TIM INSAN MADANI', 'school_name' => 'TK Islam Terpadu Insan Madani, Prov. Sulawesi Selatan', 'rank_order' => 4, 'is_preview' => 0],
                    ['team_name' => 'THE S.E.A PROJECT', 'school_name' => 'TK SURYA BUANA, Prov. Jawa Timur', 'rank_order' => 5, 'is_preview' => 0],
                    ['team_name' => 'TIM BAWI HABARING HURUNG', 'school_name' => 'TK BAKTI IBU SAMPIT, Prov. Kalimantan Tengah', 'rank_order' => 6, 'is_preview' => 0],
                    ['team_name' => 'MUMON', 'school_name' => 'TK MUTIARA, Prov. Jawa Barat', 'rank_order' => 7, 'is_preview' => 0],
                    ['team_name' => 'Tim Bu Guru Ceria', 'school_name' => 'TAUD SaQu Al Umm Barabai, Prov. Kalimantan Selatan', 'rank_order' => 8, 'is_preview' => 0],
                    ['team_name' => 'BHAYANGKARI 47 FUTURE MAKERS', 'school_name' => 'TK KEMALA BHAYANGKARI 47 KOTA SUKABUMI, Prov. Jawa Barat', 'rank_order' => 9, 'is_preview' => 0],
                    ['team_name' => 'IZVI TEAM (ITA IZA SILVI)', 'school_name' => 'TK Alkhairiyah Surabaya, Prov. Jawa Timur', 'rank_order' => 10, 'is_preview' => 0],
                ],
            ],
            [
                'title' => '10 TIM PESERTA',
                'subtitle' => 'LOLOS JENJANG SD',
                'slug' => 'sd',
                'sort_order' => 2,
                'entries' => [
                    ['team_name' => 'DEADLINE DEFENDERS JADUL', 'school_name' => 'SDN SOKARAJA KIDUL, Prov. Jawa Tengah', 'rank_order' => 1, 'is_preview' => 1],
                    ['team_name' => 'Doktor Game AI', 'school_name' => 'SD 1 Yayasan Pupuk Kaltim, Prov. Kalimantan Timur', 'rank_order' => 2, 'is_preview' => 1],
                    ['team_name' => 'SNELOVERSE', 'school_name' => 'SD NEGERI SELOHARJO, Prov. D.I. Yogyakarta', 'rank_order' => 3, 'is_preview' => 1],
                    ['team_name' => 'Novus Glitch', 'school_name' => 'SD Negeri Kradenan 01, Prov. Jawa Tengah', 'rank_order' => 4, 'is_preview' => 0],
                    ['team_name' => 'Trinity', 'school_name' => 'SD Katolik Waimamongu, Prov. Nusa Tenggara Timur', 'rank_order' => 5, 'is_preview' => 0],
                    ['team_name' => 'Tim Tilu Wira', 'school_name' => 'SDN 3 SUKAHURIP, Prov. Jawa Barat', 'rank_order' => 6, 'is_preview' => 0],
                    ['team_name' => 'G.U.R.U (Grow Up Reform Unit)', 'school_name' => 'SDN BOGEM 1, Prov. Jawa Timur', 'rank_order' => 7, 'is_preview' => 0],
                    ['team_name' => 'NextGen EduCreators', 'school_name' => 'SD Negeri Cisauk, Prov. Jawa Barat', 'rank_order' => 8, 'is_preview' => 0],
                    ['team_name' => 'SmartEcoMath', 'school_name' => 'SDN TANGGULTLARE, Prov. Jawa Tengah', 'rank_order' => 9, 'is_preview' => 0],
                    ['team_name' => 'ARKANANTA', 'school_name' => 'SD Negeri Nongkosawit 01, Prov. Jawa Tengah', 'rank_order' => 10, 'is_preview' => 0],
                ],
            ],
            [
                'title' => '10 TIM PESERTA',
                'subtitle' => 'LOLOS JENJANG SMP',
                'slug' => 'smp',
                'sort_order' => 3,
                'entries' => [
                    ['team_name' => 'SPANSAKU', 'school_name' => 'SMP NEGERI 1 KEBUN TEBU, Prov. Lampung', 'rank_order' => 1, 'is_preview' => 1],
                    ['team_name' => 'The Sapars', 'school_name' => 'SMP Negeri 1 Nglipar, Prov. D.I. Yogyakarta', 'rank_order' => 2, 'is_preview' => 1],
                    ['team_name' => 'BESTARIAU', 'school_name' => 'SMP ISLAM AS-SHOFA, Prov. Riau', 'rank_order' => 3, 'is_preview' => 1],
                    ['team_name' => 'EduGen 3.0', 'school_name' => 'SMP 3 KUDUS, Prov. Jawa Tengah', 'rank_order' => 4, 'is_preview' => 0],
                    ['team_name' => 'SMPN 4 SATU ATAP KRAGAN', 'school_name' => 'SMP NEGERI 4 SATU ATAP KRAGAN, Prov. Jawa Tengah', 'rank_order' => 5, 'is_preview' => 0],
                    ['team_name' => 'Tim Smenduba', 'school_name' => 'SMP Negeri 02 Batu, Prov. Jawa Timur', 'rank_order' => 6, 'is_preview' => 0],
                    ['team_name' => 'Tim WaLL', 'school_name' => 'SMP Negeri 10 Surabaya, Prov. Jawa Timur', 'rank_order' => 7, 'is_preview' => 0],
                    ['team_name' => 'TIM 1TOT (Tim Orang Tua) SMPN 18 PALU', 'school_name' => 'SMP Negeri 18 Palu, Prov. Sulawesi Tengah', 'rank_order' => 8, 'is_preview' => 0],
                    ['team_name' => "DF Pixel Innovators", 'school_name' => "SMP Qur'an Darul Fatta Lampung Selatan, Prov. Lampung", 'rank_order' => 9, 'is_preview' => 0],
                    ['team_name' => 'KAMI CERIA SMP NEGERI 5 BALIKPAPAN', 'school_name' => 'SMP Negeri 5 Balikpapan, Prov. Kalimantan Timur', 'rank_order' => 10, 'is_preview' => 0],
                ],
            ],
            [
                'title' => '10 TIM PESERTA',
                'subtitle' => 'LOLOS JENJANG SMA',
                'slug' => 'sma',
                'sort_order' => 4,
                'entries' => [
                    ['team_name' => 'GAMEBUS', 'school_name' => 'SMA NEGERI 10 MANDAU, Prov. Riau', 'rank_order' => 1, 'is_preview' => 1],
                    ['team_name' => 'The Winner', 'school_name' => 'SMA Negeri 1 Kabila, Prov. Gorontalo', 'rank_order' => 2, 'is_preview' => 1],
                    ['team_name' => 'InspiraTech Educators', 'school_name' => 'SMAN 1 INDRAMAYU, Prov. Jawa Barat', 'rank_order' => 3, 'is_preview' => 1],
                    ['team_name' => 'Pulau Kreatif', 'school_name' => 'SMAN 1 Bintan Pesisir, Prov. Kepulauan Riau', 'rank_order' => 4, 'is_preview' => 0],
                    ['team_name' => 'Jum@Space', 'school_name' => 'SMA Negeri 75 Jakarta, Prov. D.K.I. Jakarta', 'rank_order' => 5, 'is_preview' => 0],
                    ['team_name' => 'Pace-X', 'school_name' => 'SMAS YPPK Tiga Raja Timika, Prov. Papua Tengah', 'rank_order' => 6, 'is_preview' => 0],
                    ['team_name' => 'NURANI CODE', 'school_name' => 'SMAS Daar EL Qolam 2, Prov. Banten', 'rank_order' => 7, 'is_preview' => 0],
                    ['team_name' => 'Tim Sangkuriang', 'school_name' => 'SMA Negeri 6 Bandung, Prov. Jawa Barat', 'rank_order' => 8, 'is_preview' => 0],
                    ['team_name' => 'TILUNA EDUKASI', 'school_name' => 'SMA Negeri 1 Bantarujeg, Prov. Jawa Barat', 'rank_order' => 9, 'is_preview' => 0],
                    ['team_name' => 'VIDYA NEXUS', 'school_name' => 'SMA Negeri 1 Belik, Prov. Jawa Tengah', 'rank_order' => 10, 'is_preview' => 0],
                ],
            ],
            [
                'title' => '10 TIM PESERTA',
                'subtitle' => 'LOLOS JENJANG SMK',
                'slug' => 'smk',
                'sort_order' => 5,
                'entries' => [
                    ['team_name' => 'SKATEL GAME SQUAD', 'school_name' => 'SMK Telkom Banjarbaru, Prov. Kalimantan Selatan', 'rank_order' => 1, 'is_preview' => 1],
                    ['team_name' => 'Level Up', 'school_name' => 'SMK-IT AS-SYIFA BOARDING SCHOOL, Prov. Jawa Barat', 'rank_order' => 2, 'is_preview' => 1],
                    ['team_name' => 'SIKANDAU G CENTER', 'school_name' => 'SMKN 2 MANDAU, Prov. Riau', 'rank_order' => 3, 'is_preview' => 1],
                    ['team_name' => 'SKEFOURS PULO 9', 'school_name' => 'SMKN 4 SINJAI, Prov. Sulawesi Selatan', 'rank_order' => 4, 'is_preview' => 0],
                    ['team_name' => 'SKAVENGERS', 'school_name' => 'SMKN 7 Makassar, Prov. Sulawesi Selatan', 'rank_order' => 5, 'is_preview' => 0],
                    ['team_name' => 'Kapan-Jo (SMK N 8 Purworejo)', 'school_name' => 'SMK N 8 Purworejo, Prov. Jawa Tengah', 'rank_order' => 6, 'is_preview' => 0],
                    ['team_name' => 'Logic Craft', 'school_name' => 'SMK Negeri 2 Bangkalan, Prov. Jawa Timur', 'rank_order' => 7, 'is_preview' => 0],
                    ['team_name' => 'Tim Gelombang Utara', 'school_name' => 'SMK NEGERI 1 BRONDONG, Prov. Jawa Timur', 'rank_order' => 8, 'is_preview' => 0],
                    ['team_name' => 'Tim Eduvators (Education Innovators)', 'school_name' => 'SMK NEGERI KABUH, Prov. Jawa Timur', 'rank_order' => 9, 'is_preview' => 0],
                    ['team_name' => 'Roda.net 54', 'school_name' => 'SMKN 54 JAKARTA, Prov. D.K.I. Jakarta', 'rank_order' => 10, 'is_preview' => 0],
                ],
            ],
        ];

        foreach ($lolosData as $groupData) {
            $entries = $groupData['entries'];
            unset($groupData['entries']);

            $group = PengumumanGroup::create([
                'pengumuman_id' => $lolos->id,
                'title' => $groupData['title'],
                'subtitle' => $groupData['subtitle'],
                'slug' => $groupData['slug'],
                'sort_order' => $groupData['sort_order'],
                'is_active' => 1,
            ]);

            foreach ($entries as $i => $entry) {
                PengumumanEntry::create([
                    'pengumuman_group_id' => $group->id,
                    'team_name' => $entry['team_name'],
                    'school_name' => $entry['school_name'],
                    'rank_order' => $entry['rank_order'],
                    'sort_order' => $i + 1,
                    'is_preview' => $entry['is_preview'],
                    'is_active' => 1,
                ]);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | PENGUMUMAN 3 BESAR
        |--------------------------------------------------------------------------
        */
        $tigaBesar = Pengumuman::create([
            'type' => 'tiga_besar',
            'title' => 'PENGUMUMAN 3 BESAR',
            'content' => 'Wujudkan Indonesia Cerdas',
            'sort_order' => 2,
            'is_active' => 1,
        ]);

        $tigaBesarData = [
            [
                'title' => '3 BESAR',
                'subtitle' => 'Paud / Sederajat',
                'slug' => 'paud-3besar',
                'sort_order' => 1,
                'entries' => [
                    ['team_name' => 'THE S.E.A PROJECT', 'school_name' => 'TK Surya Buana, Kota Malang, Jawa Timur', 'rank_order' => 1],
                    ['team_name' => 'Tim Bu Guru Ceria', 'school_name' => 'TAUD SaQu Al Umm Barabai, Hulu Sungai Tengah, Kalimantan Selatan', 'rank_order' => 2],
                    ['team_name' => 'Tim GPG', 'school_name' => 'TK IT Al-Busyra Hasyimiyah, Lombok Tengah, Nusa Tenggara Barat', 'rank_order' => 3],
                ],
            ],
            [
                'title' => '3 BESAR',
                'subtitle' => 'SD / Sederajat',
                'slug' => 'sd-3besar',
                'sort_order' => 2,
                'entries' => [
                    ['team_name' => 'THE S.E.A PROJECT', 'school_name' => 'SDN Sokaraja Kidul, Banyumas, Jawa Tengah', 'rank_order' => 1],
                    ['team_name' => 'Tim Bu Guru Ceria', 'school_name' => 'SD Negeri Kradenan 01, Kabupaten Semarang, Jawa Tengah', 'rank_order' => 2],
                    ['team_name' => 'Tim GPG', 'school_name' => 'SDN 3 Sukahurip, Ciamis', 'rank_order' => 3],
                ],
            ],
            [
                'title' => '3 BESAR',
                'subtitle' => 'SMP / Sederajat',
                'slug' => 'smp-3besar',
                'sort_order' => 3,
                'entries' => [
                    ['team_name' => 'THE S.E.A PROJECT', 'school_name' => 'SMP Islam As-Shofa, Pekanbaru, Riau', 'rank_order' => 1],
                    ['team_name' => 'Tim Bu Guru Ceria', 'school_name' => 'SMP Negeri 4 Satu Atap Kragan, Rembang, Jawa Tengah', 'rank_order' => 2],
                    ['team_name' => 'Tim GPG', 'school_name' => 'SMP Negeri 1 Nglipar, Gunungkidul, DI Yogyakarta', 'rank_order' => 3],
                ],
            ],
            [
                'title' => '3 BESAR',
                'subtitle' => 'SMA / Sederajat',
                'slug' => 'sma-3besar',
                'sort_order' => 4,
                'entries' => [
                    ['team_name' => 'THE S.E.A PROJECT', 'school_name' => 'SMA Negeri 75 Jakarta, Jakarta Utara, DKI Jakarta', 'rank_order' => 1],
                    ['team_name' => 'Tim Bu Guru Ceria', 'school_name' => 'SMAN 1 Bintan Pesisir, Bintan, Kepulauan Riau', 'rank_order' => 2],
                    ['team_name' => 'Tim GPG', 'school_name' => 'SMA Negeri 6 Bandung, Kota Bandung, Jawa Barat', 'rank_order' => 3],
                ],
            ],
            [
                'title' => '3 BESAR',
                'subtitle' => 'SMK / Sederajat',
                'slug' => 'smk-3besar',
                'sort_order' => 5,
                'entries' => [
                    ['team_name' => 'THE S.E.A PROJECT', 'school_name' => 'SMK-IT As-Syifa Boarding School, Subang, Jawa Barat', 'rank_order' => 1],
                    ['team_name' => 'Tim Bu Guru Ceria', 'school_name' => 'SMK Negeri 2 Bangkalan, Bangkalan, Jawa Timur', 'rank_order' => 2],
                    ['team_name' => 'Tim GPG', 'school_name' => 'SMK Telkom Banjarbaru, Banjarbaru, Kalimantan Selatan', 'rank_order' => 3],
                ],
            ],
        ];

        foreach ($tigaBesarData as $groupData) {
            $entries = $groupData['entries'];
            unset($groupData['entries']);

            $group = PengumumanGroup::create([
                'pengumuman_id' => $tigaBesar->id,
                'title' => $groupData['title'],
                'subtitle' => $groupData['subtitle'],
                'slug' => $groupData['slug'],
                'sort_order' => $groupData['sort_order'],
                'is_active' => 1,
            ]);

            foreach ($entries as $i => $entry) {
                PengumumanEntry::create([
                    'pengumuman_group_id' => $group->id,
                    'team_name' => $entry['team_name'],
                    'school_name' => $entry['school_name'],
                    'rank_order' => $entry['rank_order'],
                    'sort_order' => $i + 1,
                    'is_preview' => 1,
                    'is_active' => 1,
                ]);
            }
        }
    }
}