@extends('layouts.app')

@section('content')

{{-- ============================================================
     FONTS
     ============================================================ --}}
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

{{-- ============================================================
     DATA FAQ
     ============================================================ --}}
@php
$faq = [

    /* ---------- PENDAFTARAN ---------- */
    [
        'category' => 'Pendaftaran',
        'icon'     => '📋',
        'color'    => '#dce8f0',
        'accent'   => '#4a90b8',
        'items'    => [
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

    /* ---------- PROPOSAL ---------- */
    [
        'category' => 'Proposal',
        'icon'     => '📄',
        'color'    => '#fef9e7',
        'accent'   => '#d4a017',
        'items'    => [
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

    /* ---------- TIM & KUALIFIKASI ---------- */
    [
        'category' => 'Tim & Kualifikasi',
        'icon'     => '👥',
        'color'    => '#e8f5e9',
        'accent'   => '#2e7d32',
        'items'    => [
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

    /* ---------- AKUN BELAJAR.ID ---------- */
    [
        'category' => 'Akun belajar.id',
        'icon'     => '🔑',
        'color'    => '#f3e5f5',
        'accent'   => '#7b1fa2',
        'items'    => [
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

    /* ---------- KATEGORI & JENJANG ---------- */
    [
        'category' => 'Kategori & Jenjang',
        'icon'     => '🏫',
        'color'    => '#fce4ec',
        'accent'   => '#c62828',
        'items'    => [
            [
                'q' => 'Apakah guru SLB diperbolehkan mengikuti kegiatan ini?',
                'a' => 'Diperbolehkan.',
            ],
            [
                'q' => 'Jika guru SLB boleh ikut, apakah materi harus disesuaikan dengan jenjang SLB atau mengikuti jenjang umum?',
                'a' => 'Materi dapat disesuaikan dengan jenjang di SLB-nya.',
            ],
            [
                'q' => 'Apakah guru SMA boleh membuat game untuk kategori PAUD?',
                'a' => 'Diwajibkan membuat game yang sesuai dengan jenjang yang diampu.',
            ],
            [
                'q' => 'Saya guru Matematika di SMK. Apakah saya masuk kategori SMK atau SMA?',
                'a' => 'Masuk kategori SMK.',
            ],
            [
                'q' => 'Apakah terdapat pemilihan terbaik tingkat provinsi atau langsung tingkat nasional?',
                'a' => 'Pemilihan proposal/karya terbaik dilakukan berdasarkan jenjang. Tidak ada pemilihan tingkat provinsi.',
            ],
            [
                'q' => 'Apakah 10 kelompok terbaik dipilih per jenjang atau gabungan semua jenjang?',
                'a' => '10 kelompok terbaik ditetapkan per jenjang.',
            ],
        ],
    ],

    /* ---------- GAME / MEDIA ---------- */
    [
        'category' => 'Game / Media',
        'icon'     => '🎮',
        'color'    => '#e8f4fd',
        'accent'   => '#1a73e8',
        'items'    => [
            [
                'q' => 'Apakah game edukasi wajib mendukung proses pembelajaran murid?',
                'a' => 'Dianjurkan untuk mendukung pembelajaran dan relevan dengan kebutuhan peserta didik.',
            ],
            [
                'q' => 'Apakah game edukasi termasuk media pembelajaran, dan apakah wajib menyertakan TP, ATP, dan evaluasi?',
                'a' => 'Dianjurkan untuk menyertakan TP, ATP, dan evaluasi guna memperkuat kelayakan pembelajaran.',
            ],
            [
                'q' => 'Apakah game yang dibuat harus dapat diakses oleh semua orang atau cukup melalui tautan tertentu?',
                'a' => 'Karya yang dibuat harus dapat diakses menggunakan browser tanpa menggunakan tools tambahan tertentu.',
            ],
            [
                'q' => 'Apakah game yang tidak menjadi juara akan dipublikasikan di website?',
                'a' => 'Karya yang dipublikasikan merupakan 3 karya terbaik dari masing-masing kategori.',
            ],
            [
                'q' => 'Apakah game harus berbasis HTML?',
                'a' => 'Ya, game harus berbasis HTML.',
            ],
            [
                'q' => 'Apakah akan diajarkan cara membuat game yang dapat diakses secara offline?',
                'a' => 'Peserta wajib mengikuti pelatihan pada tanggal 27 - 28 November 2025.',
            ],
            [
                'q' => 'Apakah game dapat berasal dari mata pelajaran apa pun, termasuk Agama, PJOK, atau Bahasa Daerah?',
                'a' => 'Ya, diperbolehkan.',
            ],
            [
                'q' => 'Apakah terdapat tema tertentu atau tema bebas?',
                'a' => 'Tidak ada tema khusus; peserta dapat memilih tema secara bebas dan mendukung pembelajaran serta relevan dengan kebutuhan peserta didik, serta sesuai dengan kurikulum yang berlaku.',
            ],
        ],
    ],

    /* ---------- PLATFORM ---------- */
    [
        'category' => 'Platform',
        'icon'     => '💻',
        'color'    => '#e3f2fd',
        'accent'   => '#0277bd',
        'items'    => [
            [
                'q' => 'Apakah kolaborasi antara Gemini AI, Canva, dan H5P Lumi diperbolehkan?',
                'a' => 'Diperbolehkan, sepanjang karya yang dihasilkan nantinya dapat dimainkan via browser tanpa menggunakan tools khusus untuk memainkannya.',
            ],
            [
                'q' => 'Apakah karya harus berformat PDF atau HTML?',
                'a' => 'Karya berupa game edukasi interaktif berbasis web (HTML).',
            ],
            [
                'q' => 'Apakah wajib menggabungkan Canva dan Google, atau boleh memilih salah satu?',
                'a' => 'Setiap tim wajib membuat 2 karya: 1 menggunakan tools dasar Google for Education dan 1 menggunakan tools dasar Canva.',
            ],
            [
                'q' => 'Apakah aplikasi Google dan Canva harus digunakan secara bersamaan atau cukup salah satu?',
                'a' => 'Setiap tim wajib membuat 2 karya: 1 menggunakan tools dasar Google for Education dan 1 menggunakan tools dasar Canva.',
            ],
            [
                'q' => 'Bagaimana cara membuat game melalui Canva AI?',
                'a' => 'Peserta wajib mengikuti pelatihan pada tanggal 27 November 2025.',
            ],
        ],
    ],

    /* ---------- STATUS PESERTA ---------- */
    [
        'category' => 'Status Peserta',
        'icon'     => '🪪',
        'color'    => '#fff8e1',
        'accent'   => '#f57f17',
        'items'    => [
            [
                'q' => 'Apakah guru yang sedang tugas belajar diperbolehkan ikut?',
                'a' => 'Guru yang sedang tugas belajar diperbolehkan ikut selama status di Dapodik merupakan guru aktif.',
            ],
            [
                'q' => 'Apakah kegiatan ini khusus untuk guru dan tendik yang terdaftar di Dapodik?',
                'a' => 'Ya.',
            ],
            [
                'q' => 'Apakah peserta lomba Game Edukasi wajib memiliki NUPTK?',
                'a' => 'Persyaratan peserta Hackathon Rumah Pendidikan 2025 adalah guru aktif yang terdata di Dapodik. Kepemilikan NUPTK tidak menjadi syarat utama.',
            ],
        ],
    ],

    /* ---------- PELATIHAN & KICKOFF ---------- */
    [
        'category' => 'Pelatihan & Kickoff',
        'icon'     => '📡',
        'color'    => '#e8f5e9',
        'accent'   => '#388e3c',
        'items'    => [
            [
                'q' => 'Apakah pelatihan dapat dilakukan secara luring per kecamatan?',
                'a' => 'Pelatihan diselenggarakan secara daring oleh panitia pada tanggal 27 November 2025.',
            ],
            [
                'q' => 'Jika tidak dapat mengikuti Kick Off karena Zoom penuh, apa langkah selanjutnya?',
                'a' => 'Rekaman Kick Off dapat disaksikan melalui Channel YouTube Rumah Pendidikan Kemendikdasmen atau Pusdatin Kemendikdasmen.',
            ],
        ],
    ],

    /* ---------- DUKUNGAN KEMENTERIAN ---------- */
    [
        'category' => 'Dukungan Kementerian',
        'icon'     => '🏛️',
        'color'    => '#fce4ec',
        'accent'   => '#ad1457',
        'items'    => [
            [
                'q' => 'Apakah kementerian dapat menyediakan template atau game edukasi yang siap pakai?',
                'a' => 'Untuk pelaksanaan Hackathon Rumah Pendidikan 2025 ini, Kementerian belum menyediakan template atau game edukasi yang siap pakai.',
            ],
        ],
    ],

];
@endphp

{{-- ============================================================
     STYLES
     ============================================================ --}}
<style>
    :root {
        --font-heading: 'Poppins', sans-serif;
        --font-body:    'Plus Jakarta Sans', sans-serif;
        --color-dark:   #0f172a;
        --color-mid:    #1e293b;
        --color-muted:  #64748b;
        --color-line:   #e2e8f0;
    }

    /* ---- Layout ---- */
    .faq-wrap {
        font-family: var(--font-body);
        max-width: 860px;
        margin: 0 auto;
        padding: 72px 24px 96px;
    }

    /* ---- Header ---- */
    .faq-header {
        text-align: center;
        margin-bottom: 56px;
    }
    .faq-badge {
        display: inline-block;
        background: #FFF9BF;
        color: var(--color-mid);
        font-family: var(--font-heading);
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        padding: 6px 18px;
        border-radius: 999px;
        margin-bottom: 20px;
        border: 1.5px solid #e8d84a;
    }
    .faq-title {
        font-family: var(--font-heading);
        font-size: 42px;
        font-weight: 900;
        color: var(--color-dark);
        line-height: 1.15;
        margin: 0 0 14px;
    }
    .faq-subtitle {
        font-size: 16px;
        color: var(--color-muted);
        font-weight: 500;
        margin: 0;
        line-height: 1.7;
    }

    /* ---- Category pill nav ---- */
    .faq-nav {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        justify-content: center;
        margin-bottom: 52px;
    }
    .faq-nav-pill {
        display: flex;
        align-items: center;
        gap: 6px;
        padding: 7px 16px;
        border-radius: 999px;
        border: 1.5px solid var(--color-line);
        background: #fff;
        font-family: var(--font-heading);
        font-size: 12px;
        font-weight: 700;
        color: var(--color-muted);
        cursor: pointer;
        text-decoration: none;
    }
    .faq-nav-pill:hover {
        border-color: #b8d4e0;
        color: var(--color-dark);
        background: #f8fafc;
    }
    .faq-nav-pill .pill-icon { font-size: 14px; }
    .faq-nav-pill .pill-count {
        background: var(--color-line);
        color: var(--color-muted);
        font-size: 10px;
        font-weight: 800;
        padding: 1px 7px;
        border-radius: 999px;
    }

    /* ---- Category block ---- */
    .faq-category {
        margin-bottom: 44px;
        scroll-margin-top: 80px;
    }
    .faq-cat-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 16px;
        padding: 14px 18px;
        border-radius: 14px;
        background: #f8fafc;
        border: 1.5px solid var(--color-line);
    }
    .faq-cat-icon {
        width: 42px;
        height: 42px;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        flex-shrink: 0;
    }
    .faq-cat-title {
        font-family: var(--font-heading);
        font-size: 16px;
        font-weight: 800;
        color: var(--color-dark);
        margin: 0;
    }
    .faq-cat-count {
        margin-left: auto;
        font-family: var(--font-heading);
        font-size: 11px;
        font-weight: 700;
        color: var(--color-muted);
        background: #fff;
        border: 1.5px solid var(--color-line);
        padding: 3px 11px;
        border-radius: 999px;
    }

    /* ---- Accordion item ---- */
    .faq-item {
        border: 1.5px solid var(--color-line);
        border-radius: 12px;
        margin-bottom: 7px;
        overflow: hidden;
        background: #fff;
    }
    .faq-item.open {
        border-color: #b8d4e0;
        box-shadow: 0 2px 12px rgba(74,144,184,0.08);
    }

    .faq-question {
        width: 100%;
        background: none;
        border: none;
        padding: 17px 18px;
        display: flex;
        align-items: flex-start;
        gap: 12px;
        cursor: pointer;
        text-align: left;
        font-family: var(--font-body);
    }
    .faq-question:hover { background: #f8fafc; }

    /* Nomor urut per kategori */
    .faq-num {
        font-family: var(--font-heading);
        font-size: 11px;
        font-weight: 800;
        color: #94a3b8;
        background: #f1f5f9;
        min-width: 26px;
        height: 26px;
        border-radius: 7px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        margin-top: 1px;
    }
    .faq-item.open .faq-num {
        background: #dce8f0;
        color: #4a90b8;
    }

    .faq-q-text {
        flex: 1;
        font-size: 14px;
        font-weight: 700;
        color: var(--color-dark);
        line-height: 1.55;
    }
    .faq-chevron {
        width: 26px;
        height: 26px;
        border-radius: 7px;
        background: #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        margin-top: 1px;
    }
    .faq-chevron svg {
        width: 13px;
        height: 13px;
        stroke: #94a3b8;
        transition: transform 0.25s ease;
    }
    .faq-item.open .faq-chevron { background: #dce8f0; }
    .faq-item.open .faq-chevron svg {
        transform: rotate(180deg);
        stroke: #4a90b8;
    }

    /* ---- Answer ---- */
    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.32s ease;
    }
    .faq-item.open .faq-answer { max-height: 400px; }

    .faq-answer-inner {
        display: flex;
        gap: 12px;
        padding: 0 18px 18px 18px;
        border-top: 1.5px solid #f1f5f9;
        padding-top: 14px;
        margin-top: 0;
    }
    .faq-answer-bar {
        width: 3px;
        border-radius: 3px;
        background: #b8d4e0;
        flex-shrink: 0;
        align-self: stretch;
        min-height: 100%;
    }
    .faq-a-text {
        font-size: 14px;
        color: var(--color-muted);
        line-height: 1.75;
        margin: 0;
        font-weight: 500;
    }

    /* ---- Divider between categories ---- */
    .faq-divider {
        height: 1px;
        background: var(--color-line);
        margin: 0 0 44px;
        display: none;
    }
</style>

{{-- ============================================================
     WRAPPER
     ============================================================ --}}
<div class="faq-wrap">

    {{-- Header --}}
    <div class="faq-header">
        <div class="faq-badge">Pertanyaan Umum</div>
        <h1 class="faq-title">FAQ</h1>
        <p class="faq-subtitle">Temukan jawaban atas pertanyaan yang sering diajukan seputar<br>Hackathon Rumah Pendidikan 2025</p>
    </div>

    {{-- Pill nav — navigasi cepat per kategori --}}
    <div class="faq-nav">
        @foreach($faq as $catIndex => $cat)
        <a class="faq-nav-pill" href="#cat-{{ $catIndex }}">
            <span class="pill-icon">{{ $cat['icon'] }}</span>
            {{ $cat['category'] }}
            <span class="pill-count">{{ count($cat['items']) }}</span>
        </a>
        @endforeach
    </div>

    {{-- FAQ per kategori --}}
    @foreach($faq as $catIndex => $cat)
    <div class="faq-category" id="cat-{{ $catIndex }}">

        {{-- Category header --}}
        <div class="faq-cat-header">
            <div class="faq-cat-icon" style="background:{{ $cat['color'] }};">
                {{ $cat['icon'] }}
            </div>
            <p class="faq-cat-title">{{ $cat['category'] }}</p>
            <span class="faq-cat-count">{{ count($cat['items']) }} pertanyaan</span>
        </div>

        {{-- Items --}}
        @foreach($cat['items'] as $itemIndex => $item)
        <div class="faq-item" id="item-{{ $catIndex }}-{{ $itemIndex }}">

            <button class="faq-question" onclick="toggleFaq('item-{{ $catIndex }}-{{ $itemIndex }}')">
                <span class="faq-num">{{ $itemIndex + 1 }}</span>
                <span class="faq-q-text">{{ $item['q'] }}</span>
                <span class="faq-chevron">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </span>
            </button>

            <div class="faq-answer">
                <div class="faq-answer-inner">
                    <div class="faq-answer-bar"></div>
                    <p class="faq-a-text">{{ $item['a'] }}</p>
                </div>
            </div>

        </div>
        @endforeach

    </div>
    @endforeach

</div>

{{-- ============================================================
     JAVASCRIPT
     ============================================================ --}}
<script>
    function toggleFaq(id) {
        const item = document.getElementById(id);
        const isOpen = item.classList.contains('open');

        // Tutup semua yang terbuka
        document.querySelectorAll('.faq-item.open').forEach(el => el.classList.remove('open'));

        // Buka yang diklik (kecuali sudah terbuka)
        if (!isOpen) item.classList.add('open');
    }
</script>

@endsection