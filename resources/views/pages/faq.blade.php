@extends('layouts.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Bricolage+Grotesque:wght@700;800&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

@php
$faq = [
    ['category'=>'Pendaftaran','icon_fa'=>'fa-solid fa-clipboard-list','color'=>'#2563eb','bg'=>'#eff6ff','items'=>[
        ['q'=>'Bagaimana cara mendaftarnya?','a'=>'Kunjungi Superaplikasi Rumah Pendidikan, kemudian klik banner Hackathon Rumah Pendidikan 2025. Pilih "DAFTAR SEKARANG" dan isi formulir pendaftaran.'],
        ['q'=>'Apakah prosedur pendaftarannya dapat dibagikan ke grup komunitas?','a'=>'Diperbolehkan.'],
        ['q'=>'Apakah terdapat dokumen resmi terkait Hackathon yang dapat dipelajari, termasuk ketentuan format game?','a'=>'Dokumen resmi akan disediakan pada laman Hackathon Rumah Pendidikan 2025 di s.id/hackathon-rumdik.'],
    ]],
    ['category'=>'Proposal','icon_fa'=>'fa-solid fa-file-lines','color'=>'#d97706','bg'=>'#fffbeb','items'=>[
        ['q'=>'Apakah disediakan format khusus untuk proposal?','a'=>'Format proposal akan diinformasikan dan disediakan oleh panitia saat memasuki masa unggah proposal.'],
        ['q'=>'Berapa jumlah tim yang akan lolos pada tahap proposal ide?','a'=>'Sebanyak 10 tim dari tiap kategori.'],
        ['q'=>'Apakah dalam pengajuan proposal diperbolehkan mencantumkan lebih dari dua game?','a'=>'Setiap tim wajib membuat 2 karya: 1 karya menggunakan tools Google for Education dan 1 karya menggunakan Canva.'],
    ]],
    ['category'=>'Tim & Kualifikasi','icon_fa'=>'fa-solid fa-users','color'=>'#059669','bg'=>'#ecfdf5','items'=>[
        ['q'=>'Apakah dalam satu tim wajib terdiri dari tiga orang?','a'=>'Satu tim terdiri dari 3 guru dan/atau tenaga kependidikan dari sekolah yang sama.'],
        ['q'=>'Apakah anggota tim boleh berasal dari lintas mata pelajaran?','a'=>'Diperbolehkan.'],
        ['q'=>'Apakah anggota tim harus dari sekolah yang sama atau boleh dari sekolah yang berbeda?','a'=>'Anggota tim wajib berasal dari sekolah yang sama.'],
        ['q'=>'Apakah anggota tim boleh berasal dari kepala sekolah?','a'=>'Diperbolehkan.'],
        ['q'=>'Jika dalam satu tim terdapat guru yang bukan WNI, apakah diperbolehkan?','a'=>'Seluruh anggota tim wajib berstatus Warga Negara Indonesia.'],
    ]],
    ['category'=>'Akun belajar.id','icon_fa'=>'fa-solid fa-key','color'=>'#7c3aed','bg'=>'#f5f3ff','items'=>[
        ['q'=>'Bagaimana jika peserta tidak memiliki akun belajar.id karena berasal dari madrasah?','a'=>'Pendaftar dari Madrasah dapat menggunakan akun @madrasah.kemenag.go.id atau akun Gmail.'],
        ['q'=>'Apakah guru yang belum memiliki akun belajar.id boleh ikut dengan meminjam akun belajar.id guru lain?','a'=>'Disarankan menggunakan akun belajar.id milik sendiri.'],
        ['q'=>'Apakah guru madrasah diperbolehkan mengikuti kegiatan ini?','a'=>'Diperbolehkan.'],
        ['q'=>'Jika guru Kemenag memiliki akun kemenag.go.id, apakah mereka boleh berpartisipasi?','a'=>'Diperbolehkan.'],
        ['q'=>'Bagaimana solusi bagi guru atau tenaga kependidikan yang tidak memiliki akun belajar.id?','a'=>'Calon peserta sangat disarankan mengaktifkan akun belajar.id-nya terlebih dahulu.'],
        ['q'=>'Saya belum memiliki akun belajar.id karena masih dalam proses masuk ke Dapodik. Apakah saya boleh menggunakan akun program.belajar.id yang saya miliki saat PPG Prajabatan?','a'=>'Boleh menggunakan akun program.belajar.id selama seluruh anggota tim terdata sebagai guru aktif pada Dapodik sekolah masing-masing.'],
    ]],
    ['category'=>'Kategori & Jenjang','icon_fa'=>'fa-solid fa-school','color'=>'#dc2626','bg'=>'#fff1f2','items'=>[
        ['q'=>'Apakah guru SLB diperbolehkan mengikuti kegiatan ini?','a'=>'Diperbolehkan.'],
        ['q'=>'Jika guru SLB boleh ikut, apakah materi harus disesuaikan dengan jenjang SLB atau mengikuti jenjang umum?','a'=>'Materi dapat disesuaikan dengan jenjang di SLB-nya.'],
        ['q'=>'Apakah guru SMA boleh membuat game untuk kategori PAUD?','a'=>'Diwajibkan membuat game yang sesuai dengan jenjang yang diampu.'],
        ['q'=>'Saya guru Matematika di SMK. Apakah saya masuk kategori SMK atau SMA?','a'=>'Masuk kategori SMK.'],
        ['q'=>'Apakah terdapat pemilihan terbaik tingkat provinsi atau langsung tingkat nasional?','a'=>'Pemilihan proposal/karya terbaik dilakukan berdasarkan jenjang. Tidak ada pemilihan tingkat provinsi.'],
        ['q'=>'Apakah 10 kelompok terbaik dipilih per jenjang atau gabungan semua jenjang?','a'=>'10 kelompok terbaik ditetapkan per jenjang.'],
    ]],
    ['category'=>'Game / Media','icon_fa'=>'fa-solid fa-gamepad','color'=>'#0284c7','bg'=>'#f0f9ff','items'=>[
        ['q'=>'Apakah game edukasi wajib mendukung proses pembelajaran murid?','a'=>'Dianjurkan untuk mendukung pembelajaran dan relevan dengan kebutuhan peserta didik.'],
        ['q'=>'Apakah game edukasi termasuk media pembelajaran, dan apakah wajib menyertakan TP, ATP, dan evaluasi?','a'=>'Dianjurkan untuk menyertakan TP, ATP, dan evaluasi guna memperkuat kelayakan pembelajaran.'],
        ['q'=>'Apakah game yang dibuat harus dapat diakses oleh semua orang atau cukup melalui tautan tertentu?','a'=>'Karya yang dibuat harus dapat diakses menggunakan browser tanpa menggunakan tools tambahan tertentu.'],
        ['q'=>'Apakah game yang tidak menjadi juara akan dipublikasikan di website?','a'=>'Karya yang dipublikasikan merupakan 3 karya terbaik dari masing-masing kategori.'],
        ['q'=>'Apakah game harus berbasis HTML?','a'=>'Ya, game harus berbasis HTML.'],
        ['q'=>'Apakah akan diajarkan cara membuat game yang dapat diakses secara offline?','a'=>'Peserta wajib mengikuti pelatihan pada tanggal 27 - 28 November 2025.'],
        ['q'=>'Apakah game dapat berasal dari mata pelajaran apa pun, termasuk Agama, PJOK, atau Bahasa Daerah?','a'=>'Ya, diperbolehkan.'],
        ['q'=>'Apakah terdapat tema tertentu atau tema bebas?','a'=>'Tidak ada tema khusus; peserta dapat memilih tema secara bebas dan mendukung pembelajaran serta relevan dengan kebutuhan peserta didik.'],
    ]],
    ['category'=>'Platform','icon_fa'=>'fa-solid fa-laptop-code','color'=>'#0d9488','bg'=>'#f0fdfa','items'=>[
        ['q'=>'Apakah kolaborasi antara Gemini AI, Canva, dan H5P Lumi diperbolehkan?','a'=>'Diperbolehkan, sepanjang karya yang dihasilkan nantinya dapat dimainkan via browser tanpa menggunakan tools khusus.'],
        ['q'=>'Apakah karya harus berformat PDF atau HTML?','a'=>'Karya berupa game edukasi interaktif berbasis web (HTML).'],
        ['q'=>'Apakah wajib menggabungkan Canva dan Google, atau boleh memilih salah satu?','a'=>'Setiap tim wajib membuat 2 karya: 1 menggunakan tools dasar Google for Education dan 1 menggunakan tools dasar Canva.'],
        ['q'=>'Apakah aplikasi Google dan Canva harus digunakan secara bersamaan atau cukup salah satu?','a'=>'Setiap tim wajib membuat 2 karya: 1 menggunakan tools dasar Google for Education dan 1 menggunakan tools dasar Canva.'],
        ['q'=>'Bagaimana cara membuat game melalui Canva AI?','a'=>'Peserta wajib mengikuti pelatihan pada tanggal 27 November 2025.'],
    ]],
    ['category'=>'Status Peserta','icon_fa'=>'fa-solid fa-id-badge','color'=>'#ea580c','bg'=>'#fff7ed','items'=>[
        ['q'=>'Apakah guru yang sedang tugas belajar diperbolehkan ikut?','a'=>'Guru yang sedang tugas belajar diperbolehkan ikut selama status di Dapodik merupakan guru aktif.'],
        ['q'=>'Apakah kegiatan ini khusus untuk guru dan tendik yang terdaftar di Dapodik?','a'=>'Ya.'],
        ['q'=>'Apakah peserta lomba Game Edukasi wajib memiliki NUPTK?','a'=>'Persyaratan peserta Hackathon Rumah Pendidikan 2025 adalah guru aktif yang terdata di Dapodik. Kepemilikan NUPTK tidak menjadi syarat utama.'],
    ]],
    ['category'=>'Pelatihan & Kickoff','icon_fa'=>'fa-solid fa-satellite-dish','color'=>'#4f46e5','bg'=>'#eef2ff','items'=>[
        ['q'=>'Apakah pelatihan dapat dilakukan secara luring per kecamatan?','a'=>'Pelatihan diselenggarakan secara daring oleh panitia pada tanggal 27 November 2025.'],
        ['q'=>'Jika tidak dapat mengikuti Kick Off karena Zoom penuh, apa langkah selanjutnya?','a'=>'Rekaman Kick Off dapat disaksikan melalui Channel YouTube Rumah Pendidikan Kemendikdasmen atau Pusdatin Kemendikdasmen.'],
    ]],
    ['category'=>'Dukungan Kementerian','icon_fa'=>'fa-solid fa-landmark','color'=>'#be185d','bg'=>'#fdf2f8','items'=>[
        ['q'=>'Apakah kementerian dapat menyediakan template atau game edukasi yang siap pakai?','a'=>'Untuk pelaksanaan Hackathon Rumah Pendidikan 2025 ini, Kementerian belum menyediakan template atau game edukasi yang siap pakai.'],
    ]],
];
@endphp

<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
    --white: #ffffff;
    --gray-50: #f9fafb;
    --gray-100: #f3f4f6;
    --gray-200: #e5e7eb;
    --gray-300: #d1d5db;
    --gray-400: #9ca3af;
    --gray-500: #6b7280;
    --gray-700: #374151;
    --gray-900: #111827;
    --blue: #2563eb;
    --blue-light: #eff6ff;
    --shadow-sm: 0 1px 2px rgba(0,0,0,0.05);
    --shadow-md: 0 4px 16px rgba(0,0,0,0.07);
}

body {
    font-family: 'Inter', sans-serif;
    background: var(--gray-50);
    color: var(--gray-900);
    -webkit-font-smoothing: antialiased;
}

/* ===== HERO ===== */
.faq-hero {
    background: var(--white);
    border-bottom: 1px solid var(--gray-200);
    padding: 72px 24px 60px;
    text-align: center;
}
.faq-hero-tag {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--blue-light);
    color: var(--blue);
    font-size: 12px;
    font-weight: 600;
    letter-spacing: .03em;
    padding: 5px 14px;
    border-radius: 999px;
    margin-bottom: 24px;
    border: 1px solid #bfdbfe;
}
.faq-hero-tag .live-dot {
    width: 6px; height: 6px;
    background: var(--blue);
    border-radius: 50%;
    animation: livepulse 2s ease infinite;
}
@keyframes livepulse { 0%,100%{opacity:1;transform:scale(1);} 50%{opacity:.4;transform:scale(.75);} }

.faq-hero h1 {
    font-family: 'Bricolage Grotesque', sans-serif;
    font-size: clamp(34px, 5.5vw, 56px);
    font-weight: 800;
    line-height: 1.1;
    letter-spacing: -.025em;
    color: var(--gray-900);
    margin-bottom: 16px;
}
.faq-hero h1 em {
    font-style: normal;
    color: var(--blue);
}
.faq-hero p {
    font-size: 16px;
    color: var(--gray-500);
    line-height: 1.7;
    max-width: 420px;
    margin: 0 auto;
}

/* ===== BODY LAYOUT ===== */
.faq-body-wrap {
    max-width: 960px;
    margin: 0 auto;
    padding: 48px 24px 96px;
    display: grid;
    grid-template-columns: 210px 1fr;
    gap: 40px;
    align-items: start;
}

/* ===== SIDEBAR ===== */
.faq-sidebar {
    position: sticky;
    top: 24px;
}
.faq-sidebar-title {
    font-size: 11px;
    font-weight: 700;
    letter-spacing: .08em;
    text-transform: uppercase;
    color: var(--gray-400);
    margin-bottom: 10px;
    padding: 0 4px;
}
.faq-sidebar-nav {
    display: flex;
    flex-direction: column;
    gap: 2px;
}
.faq-sidebar-link {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px 12px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 500;
    color: var(--gray-500);
    text-decoration: none;
    transition: all .15s ease;
    border-left: 2.5px solid transparent;
}
.faq-sidebar-link:hover {
    background: var(--white);
    color: var(--gray-900);
    box-shadow: var(--shadow-sm);
}
.faq-sidebar-link.active {
    background: var(--white);
    color: var(--blue);
    font-weight: 600;
    box-shadow: var(--shadow-sm);
    border-left-color: var(--blue);
}
.faq-sidebar-link i { font-size: 12px; width: 16px; text-align: center; }
.faq-sidebar-badge {
    margin-left: auto;
    font-size: 10px;
    font-weight: 700;
    background: var(--gray-100);
    color: var(--gray-400);
    padding: 1px 7px;
    border-radius: 999px;
}

/* ===== MAIN ===== */
.faq-main { min-width: 0; }

.faq-category {
    margin-bottom: 32px;
    scroll-margin-top: 32px;
}

.faq-cat-label {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 12px;
    padding-bottom: 12px;
    border-bottom: 1px solid var(--gray-200);
}
.faq-cat-icon {
    width: 34px; height: 34px;
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: 14px;
    flex-shrink: 0;
}
.faq-cat-name {
    font-family: 'Bricolage Grotesque', sans-serif;
    font-size: 16px;
    font-weight: 700;
    color: var(--gray-900);
    flex: 1;
}
.faq-cat-num {
    font-size: 11px;
    font-weight: 600;
    color: var(--gray-400);
    background: var(--gray-100);
    padding: 2px 9px;
    border-radius: 999px;
}

/* ===== ACCORDION ===== */
.faq-item {
    background: var(--white);
    border: 1px solid var(--gray-200);
    border-radius: 12px;
    margin-bottom: 5px;
    overflow: hidden;
    transition: border-color .15s, box-shadow .15s;
}
.faq-item:hover {
    border-color: var(--gray-300);
    box-shadow: var(--shadow-sm);
}
.faq-item.open {
    border-color: var(--item-color, var(--blue));
    box-shadow: 0 0 0 3px color-mix(in srgb, var(--item-color, var(--blue)) 8%, transparent), var(--shadow-sm);
}

.faq-question {
    width: 100%; background: none; border: none;
    padding: 15px 18px;
    display: flex; align-items: center;
    gap: 14px; cursor: pointer; text-align: left;
}
.faq-question:hover .faq-q-text { color: var(--item-color, var(--blue)); }

.faq-q-icon {
    width: 28px; height: 28px;
    border-radius: 7px;
    background: var(--gray-100);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    font-size: 11px;
    color: var(--gray-400);
    font-weight: 700;
    transition: all .15s;
}
.faq-item.open .faq-q-icon {
    background: var(--item-bg, #eff6ff);
    color: var(--item-color, var(--blue));
}

.faq-q-text {
    flex: 1;
    font-size: 14px;
    font-weight: 600;
    color: var(--gray-700);
    line-height: 1.55;
    transition: color .15s;
}
.faq-item.open .faq-q-text { color: var(--gray-900); }

.faq-toggle {
    width: 28px; height: 28px;
    border-radius: 7px;
    background: var(--gray-100);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    transition: all .2s ease;
}
.faq-toggle svg {
    width: 13px; height: 13px;
    stroke: var(--gray-400);
    transition: transform .25s ease, stroke .15s;
}
.faq-item.open .faq-toggle {
    background: var(--item-bg, #eff6ff);
}
.faq-item.open .faq-toggle svg {
    transform: rotate(180deg);
    stroke: var(--item-color, var(--blue));
}

.faq-answer {
    max-height: 0; overflow: hidden;
    transition: max-height .3s cubic-bezier(.4,0,.2,1);
}
.faq-item.open .faq-answer { max-height: 500px; }

.faq-answer-body {
    display: flex;
    gap: 14px;
    padding: 12px 18px 18px 18px;
    border-top: 1px solid var(--gray-100);
}
.faq-answer-line {
    width: 2px;
    border-radius: 2px;
    background: var(--item-color, var(--blue));
    flex-shrink: 0;
    opacity: .35;
    align-self: stretch;
}
.faq-a-text {
    font-size: 13.5px;
    color: var(--gray-500);
    line-height: 1.8;
    font-weight: 400;
}

/* ===== RESPONSIVE ===== */
@media (max-width: 700px) {
    .faq-body-wrap { grid-template-columns: 1fr; padding: 32px 16px 80px; }
    .faq-sidebar {
        position: static;
        display: flex; flex-wrap: wrap; gap: 6px;
    }
    .faq-sidebar-title { width: 100%; }
    .faq-sidebar-nav { flex-direction: row; flex-wrap: wrap; gap: 6px; }
    .faq-sidebar-link {
        border: 1px solid var(--gray-200);
        border-radius: 999px;
        border-left: 1px solid var(--gray-200);
        padding: 5px 12px;
        font-size: 12px;
    }
    .faq-sidebar-link.active {
        border-color: var(--blue);
        border-left-color: var(--blue);
        background: var(--blue-light);
    }
    .faq-sidebar-badge { display: none; }
}
</style>

{{-- HERO --}}
<div class="faq-hero">
    <div class="faq-hero-tag">
        <span class="live-dot"></span>
        Hackathon Rumah Pendidikan 2026
    </div>
    <h1>Pertanyaan yang<br><em>Sering Ditanyakan</em></h1>
    <p>Temukan jawaban atas pertanyaan seputar Hackathon Rumah Pendidikan 2026.</p>
</div>

{{-- BODY --}}
<div class="faq-body-wrap">

    {{-- Sidebar --}}
    <aside class="faq-sidebar">
        <p class="faq-sidebar-title">Kategori</p>
        <nav class="faq-sidebar-nav">
            @foreach($faq as $i => $cat)
            <a class="faq-sidebar-link {{ $i === 0 ? 'active' : '' }}"
               href="#cat-{{ $i }}"
               data-cat="{{ $i }}">
                <i class="{{ $cat['icon_fa'] }}" style="color:{{ $cat['color'] }}"></i>
                {{ $cat['category'] }}
                <span class="faq-sidebar-badge">{{ count($cat['items']) }}</span>
            </a>
            @endforeach
        </nav>
    </aside>

    {{-- Main --}}
    <main class="faq-main">
        @foreach($faq as $ci => $cat)
        <div class="faq-category"
             id="cat-{{ $ci }}"
             style="--item-color:{{ $cat['color'] }};--item-bg:{{ $cat['bg'] }};">

            <div class="faq-cat-label">
                <div class="faq-cat-icon" style="background:{{ $cat['bg'] }};color:{{ $cat['color'] }};">
                    <i class="{{ $cat['icon_fa'] }}"></i>
                </div>
                <span class="faq-cat-name">{{ $cat['category'] }}</span>
                <span class="faq-cat-num">{{ count($cat['items']) }}</span>
            </div>

            @foreach($cat['items'] as $ii => $item)
            <div class="faq-item"
                 id="item-{{ $ci }}-{{ $ii }}"
                 style="--item-color:{{ $cat['color'] }};--item-bg:{{ $cat['bg'] }};">

                <button class="faq-question" onclick="toggleFaq('item-{{ $ci }}-{{ $ii }}')">
                    <span class="faq-q-icon">{{ $ii + 1 }}</span>
                    <span class="faq-q-text">{{ $item['q'] }}</span>
                    <span class="faq-toggle">
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </span>
                </button>

                <div class="faq-answer">
                    <div class="faq-answer-body">
                        <div class="faq-answer-line"></div>
                        <p class="faq-a-text">{{ $item['a'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        @endforeach
    </main>

</div>

{{-- ============================================================
     JAVASCRIPT
     ============================================================ --}}
<script>
function toggleFaq(id) {
    const item = document.getElementById(id);
    const isOpen = item.classList.contains('open');
    document.querySelectorAll('.faq-item.open').forEach(el => el.classList.remove('open'));
    if (!isOpen) item.classList.add('open');
}

const links = document.querySelectorAll('.faq-sidebar-link');
const cats  = document.querySelectorAll('.faq-category');
const observer = new IntersectionObserver(entries => {
    entries.forEach(e => {
        if (e.isIntersecting) {
            const id = e.target.id.replace('cat-', '');
            links.forEach(l => l.classList.toggle('active', l.dataset.cat === id));
        }
    });
}, { rootMargin: '-30% 0px -60% 0px' });
cats.forEach(c => observer.observe(c));
</script>

@endsection