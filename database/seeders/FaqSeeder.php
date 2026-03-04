<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faq = [
            [
                'category' => 'Pendaftaran',
                'items' => [
                    [
                        'q' => 'Bagaimana cara mendaftarnya?',
                        'a' => 'Kunjungi Superaplikasi Rumah Pendidikan, kemudian klik banner Hackathon Rumah Pendidikan 2025. Pilih "DAFTAR SEKARANG" dan isi formulir pendaftaran.',
                    ],
                    [
                        'q' => 'Apakah prosedur pendaftarannya dapat dibagikan ke grup komunitas?',
                        'a' => 'Diperbolehkan.',
                    ],
                    [
                        'q' => 'Apakah terdapat dokumen resmi terkait Hackathon yang dapat dipelajari, termasuk ketentuan format game?',
                        'a' => 'Dokumen resmi akan disediakan pada laman Hackathon Rumah Pendidikan 2025 di s.id/hackathon-rumdik.',
                    ],
                ],
            ],
            [
                'category' => 'Proposal',
                'items' => [
                    [
                        'q' => 'Apakah disediakan format khusus untuk proposal?',
                        'a' => 'Format proposal akan diinformasikan dan disediakan oleh panitia saat memasuki masa unggah proposal.',
                    ],
                    [
                        'q' => 'Berapa jumlah tim yang akan lolos pada tahap proposal ide?',
                        'a' => 'Sebanyak 10 tim dari tiap kategori.',
                    ],
                    [
                        'q' => 'Apakah dalam pengajuan proposal diperbolehkan mencantumkan lebih dari dua game?',
                        'a' => 'Setiap tim wajib membuat 2 karya: 1 karya menggunakan tools Google for Education dan 1 karya menggunakan Canva. Kedua karya dapat berupa game yang berbeda.',
                    ],
                ],
            ],
            [
                'category' => 'Tim & Kualifikasi',
                'items' => [
                    [
                        'q' => 'Apakah dalam satu tim wajib terdiri dari tiga orang?',
                        'a' => 'Satu tim terdiri dari 3 guru dan/atau tenaga kependidikan dari sekolah yang sama.',
                    ],
                    [
                        'q' => 'Apakah anggota tim boleh berasal dari lintas mata pelajaran?',
                        'a' => 'Diperbolehkan.',
                    ],
                    [
                        'q' => 'Apakah anggota tim harus dari sekolah yang sama atau boleh dari sekolah yang berbeda?',
                        'a' => 'Anggota tim wajib berasal dari sekolah yang sama.',
                    ],
                    [
                        'q' => 'Apakah anggota tim boleh berasal dari kepala sekolah?',
                        'a' => 'Diperbolehkan.',
                    ],
                    [
                        'q' => 'Jika dalam satu tim terdapat guru yang bukan WNI, apakah diperbolehkan?',
                        'a' => 'Seluruh anggota tim wajib berstatus Warga Negara Indonesia.',
                    ],
                ],
            ],
            [
                'category' => 'Akun belajar.id',
                'items' => [
                    [
                        'q' => 'Bagaimana jika peserta tidak memiliki akun belajar.id karena berasal dari madrasah?',
                        'a' => 'Pendaftar dari Madrasah dapat menggunakan akun @madrasah.kemenag.go.id atau akun Gmail.',
                    ],
                    [
                        'q' => 'Apakah guru yang belum memiliki akun belajar.id boleh ikut dengan meminjam akun belajar.id guru lain?',
                        'a' => 'Disarankan menggunakan akun belajar.id milik sendiri.',
                    ],
                    [
                        'q' => 'Apakah guru madrasah diperbolehkan mengikuti kegiatan ini?',
                        'a' => 'Diperbolehkan.',
                    ],
                    [
                        'q' => 'Jika guru Kemenag memiliki akun kemenag.go.id, apakah mereka boleh berpartisipasi?',
                        'a' => 'Diperbolehkan.',
                    ],
                    [
                        'q' => 'Bagaimana solusi bagi guru atau tenaga kependidikan yang tidak memiliki akun belajar.id?',
                        'a' => 'Calon peserta sangat disarankan mengaktifkan akun belajar.id-nya terlebih dahulu.',
                    ],
                    [
                        'q' => 'Saya belum memiliki akun belajar.id karena masih dalam proses masuk ke Dapodik. Apakah saya boleh menggunakan akun program.belajar.id yang saya miliki saat PPG Prajabatan?',
                        'a' => 'Boleh menggunakan akun program.belajar.id selama seluruh anggota tim terdata sebagai guru aktif pada Dapodik sekolah masing-masing.',
                    ],
                ],
            ],
            [
                'category' => 'Kategori & Jenjang',
                'items' => [
                    ['q'=>'Apakah guru SLB diperbolehkan mengikuti kegiatan ini?','a'=>'Diperbolehkan.'],
                    ['q'=>'Jika guru SLB boleh ikut, apakah materi harus disesuaikan dengan jenjang SLB atau mengikuti jenjang umum?','a'=>'Materi dapat disesuaikan dengan jenjang di SLB-nya.'],
                    ['q'=>'Apakah guru SMA boleh membuat game untuk kategori PAUD?','a'=>'Diwajibkan membuat game yang sesuai dengan jenjang yang diampu.'],
                    ['q'=>'Saya guru Matematika di SMK. Apakah saya masuk kategori SMK atau SMA?','a'=>'Masuk kategori SMK.'],
                    ['q'=>'Apakah terdapat pemilihan terbaik tingkat provinsi atau langsung tingkat nasional?','a'=>'Pemilihan proposal/karya terbaik dilakukan berdasarkan jenjang. Tidak ada pemilihan tingkat provinsi.'],
                    ['q'=>'Apakah 10 kelompok terbaik dipilih per jenjang atau gabungan semua jenjang?','a'=>'10 kelompok terbaik ditetapkan per jenjang.'],
                ],
            ],
            [
                'category' => 'Game / Media',
                'items' => [
                    ['q'=>'Apakah game edukasi wajib mendukung proses pembelajaran murid?','a'=>'Dianjurkan untuk mendukung pembelajaran dan relevan dengan kebutuhan peserta didik.'],
                    ['q'=>'Apakah game edukasi termasuk media pembelajaran, dan apakah wajib menyertakan TP, ATP, dan evaluasi?','a'=>'Dianjurkan untuk menyertakan TP, ATP, dan evaluasi guna memperkuat kelayakan pembelajaran.'],
                    ['q'=>'Apakah game yang dibuat harus dapat diakses oleh semua orang atau cukup melalui tautan tertentu?','a'=>'Karya yang dibuat harus dapat diakses menggunakan browser tanpa menggunakan tools tambahan tertentu.'],
                    ['q'=>'Apakah game yang tidak menjadi juara akan dipublikasikan di website?','a'=>'Karya yang dipublikasikan merupakan 3 karya terbaik dari masing-masing kategori.'],
                    ['q'=>'Apakah game harus berbasis HTML?','a'=>'Ya, game harus berbasis HTML.'],
                    ['q'=>'Apakah akan diajarkan cara membuat game yang dapat diakses secara offline?','a'=>'Peserta wajib mengikuti pelatihan pada tanggal 27 - 28 November 2025.'],
                    ['q'=>'Apakah game dapat berasal dari mata pelajaran apa pun, termasuk Agama, PJOK, atau Bahasa Daerah?','a'=>'Ya, diperbolehkan.'],
                    ['q'=>'Apakah terdapat tema tertentu atau tema bebas?','a'=>'Tidak ada tema khusus; peserta dapat memilih tema secara bebas dan mendukung pembelajaran serta relevan dengan kebutuhan peserta didik, serta sesuai dengan kurikulum yang berlaku.'],
                ],
            ],
            [
                'category' => 'Platform',
                'items' => [
                    ['q'=>'Apakah kolaborasi antara Gemini AI, Canva, dan H5P Lumi diperbolehkan?','a'=>'Diperbolehkan, sepanjang karya yang dihasilkan nantinya dapat dimainkan via browser tanpa menggunakan tools khusus untuk memainkannya.'],
                    ['q'=>'Apakah karya harus berformat PDF atau HTML?','a'=>'Karya berupa game edukasi interaktif berbasis web (HTML).'],
                    ['q'=>'Apakah wajib menggabungkan Canva dan Google, atau boleh memilih salah satu?','a'=>'Setiap tim wajib membuat 2 karya: 1 menggunakan tools dasar Google for Education dan 1 menggunakan tools dasar Canva.'],
                    ['q'=>'Apakah aplikasi Google dan Canva harus digunakan secara bersamaan atau cukup salah satu?','a'=>'Setiap tim wajib membuat 2 karya: 1 menggunakan tools dasar Google for Education dan 1 menggunakan tools dasar Canva.'],
                    ['q'=>'Bagaimana cara membuat game melalui Canva AI?','a'=>'Peserta wajib mengikuti pelatihan pada tanggal 27 November 2025.'],
                ],
            ],
            [
                'category' => 'Status Peserta',
                'items' => [
                    ['q'=>'Apakah guru yang sedang tugas belajar diperbolehkan ikut?','a'=>'Guru yang sedang tugas belajar diperbolehkan ikut selama status di Dapodik merupakan guru aktif.'],
                    ['q'=>'Apakah kegiatan ini khusus untuk guru dan tendik yang terdaftar di Dapodik?','a'=>'Ya.'],
                    ['q'=>'Apakah peserta lomba Game Edukasi wajib memiliki NUPTK?','a'=>'Persyaratan peserta Hackathon Rumah Pendidikan 2025 adalah guru aktif yang terdata di Dapodik. Kepemilikan NUPTK tidak menjadi syarat utama.'],
                ],
            ],
            [
                'category' => 'Pelatihan & Kickoff',
                'items' => [
                    ['q'=>'Apakah pelatihan dapat dilakukan secara luring per kecamatan?','a'=>'Pelatihan diselenggarakan secara daring oleh panitia pada tanggal 27 November 2025.'],
                    ['q'=>'Jika tidak dapat mengikuti Kick Off karena Zoom penuh, apa langkah selanjutnya?','a'=>'Rekaman Kick Off dapat disaksikan melalui Channel YouTube Rumah Pendidikan Kemendikdasmen atau Pusdatin Kemendikdasmen.'],
                ],
            ],
            [
                'category' => 'Dukungan Kementerian',
                'items' => [
                    ['q'=>'Apakah kementerian dapat menyediakan template atau game edukasi yang siap pakai?','a'=>'Untuk pelaksanaan Hackathon Rumah Pendidikan 2025 ini, Kementerian belum menyediakan template atau game edukasi yang siap pakai.'],
                ],
            ],
        ];

        foreach ($faq as $cat) {
            $order = 0;
            foreach ($cat['items'] as $item) {
                Faq::updateOrCreate(
                    [
                        'category' => $cat['category'],
                        'question' => $item['q'],
                    ],
                    [
                        'answer'     => $item['a'],
                        'sort_order' => $order++,
                        'is_active'  => true,
                    ]
                );
            }
        }
    }
}