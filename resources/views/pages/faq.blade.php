@extends('layouts.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">



@php
$faq = [
    ['category'=>'Pendaftaran','items'=>[
        ['q'=>'Bagaimana cara mendaftarnya?','a'=>'Kunjungi Superaplikasi Rumah Pendidikan, kemudian klik banner Hackathon Rumah Pendidikan 2025. Pilih "DAFTAR SEKARANG" dan isi formulir pendaftaran.'],
        ['q'=>'Apakah prosedur pendaftarannya dapat dibagikan ke grup komunitas?','a'=>'Diperbolehkan.'],
        ['q'=>'Apakah terdapat dokumen resmi terkait Hackathon yang dapat dipelajari, termasuk ketentuan format game?','a'=>'Dokumen resmi akan disediakan pada laman Hackathon Rumah Pendidikan 2025 di s.id/hackathon-rumdik.'],
    ]],
    ['category'=>'Proposal','items'=>[
        ['q'=>'Apakah disediakan format khusus untuk proposal?','a'=>'Format proposal akan diinformasikan dan disediakan oleh panitia saat memasuki masa unggah proposal.'],
        ['q'=>'Berapa jumlah tim yang akan lolos pada tahap proposal ide?','a'=>'Sebanyak 10 tim dari tiap kategori.'],
        ['q'=>'Apakah dalam pengajuan proposal diperbolehkan mencantumkan lebih dari dua game?','a'=>'Setiap tim wajib membuat 2 karya: 1 karya menggunakan tools Google for Education dan 1 karya menggunakan Canva.'],
    ]],
    ['category'=>'Tim & Kualifikasi','items'=>[
        ['q'=>'Apakah dalam satu tim wajib terdiri dari tiga orang?','a'=>'Satu tim terdiri dari 3 guru dan/atau tenaga kependidikan dari sekolah yang sama.'],
        ['q'=>'Apakah anggota tim boleh berasal dari lintas mata pelajaran?','a'=>'Diperbolehkan.'],
        ['q'=>'Apakah anggota tim harus dari sekolah yang sama atau boleh dari sekolah yang berbeda?','a'=>'Anggota tim wajib berasal dari sekolah yang sama.'],
        ['q'=>'Apakah anggota tim boleh berasal dari kepala sekolah?','a'=>'Diperbolehkan.'],
        ['q'=>'Jika dalam satu tim terdapat guru yang bukan WNI, apakah diperbolehkan?','a'=>'Seluruh anggota tim wajib berstatus Warga Negara Indonesia.'],
    ]],
    ['category'=>'Akun belajar.id','items'=>[
        ['q'=>'Bagaimana jika peserta tidak memiliki akun belajar.id karena berasal dari madrasah?','a'=>'Pendaftar dari Madrasah dapat menggunakan akun @madrasah.kemenag.go.id atau akun Gmail.'],
        ['q'=>'Apakah guru yang belum memiliki akun belajar.id boleh ikut dengan meminjam akun belajar.id guru lain?','a'=>'Disarankan menggunakan akun belajar.id milik sendiri.'],
        ['q'=>'Apakah guru madrasah diperbolehkan mengikuti kegiatan ini?','a'=>'Diperbolehkan.'],
        ['q'=>'Jika guru Kemenag memiliki akun kemenag.go.id, apakah mereka boleh berpartisipasi?','a'=>'Diperbolehkan.'],
        ['q'=>'Bagaimana solusi bagi guru atau tenaga kependidikan yang tidak memiliki akun belajar.id?','a'=>'Calon peserta sangat disarankan mengaktifkan akun belajar.id-nya terlebih dahulu.'],
        ['q'=>'Saya belum memiliki akun belajar.id karena masih dalam proses masuk ke Dapodik. Apakah saya boleh menggunakan akun program.belajar.id yang saya miliki saat PPG Prajabatan?','a'=>'Boleh menggunakan akun program.belajar.id selama seluruh anggota tim terdata sebagai guru aktif pada Dapodik sekolah masing-masing.'],
    ]],
    ['category'=>'Kategori & Jenjang','items'=>[
        ['q'=>'Apakah guru SLB diperbolehkan mengikuti kegiatan ini?','a'=>'Diperbolehkan.'],
        ['q'=>'Jika guru SLB boleh ikut, apakah materi harus disesuaikan dengan jenjang SLB atau mengikuti jenjang umum?','a'=>'Materi dapat disesuaikan dengan jenjang di SLB-nya.'],
        ['q'=>'Apakah guru SMA boleh membuat game untuk kategori PAUD?','a'=>'Diwajibkan membuat game yang sesuai dengan jenjang yang diampu.'],
        ['q'=>'Saya guru Matematika di SMK. Apakah saya masuk kategori SMK atau SMA?','a'=>'Masuk kategori SMK.'],
        ['q'=>'Apakah terdapat pemilihan terbaik tingkat provinsi atau langsung tingkat nasional?','a'=>'Pemilihan proposal/karya terbaik dilakukan berdasarkan jenjang. Tidak ada pemilihan tingkat provinsi.'],
        ['q'=>'Apakah 10 kelompok terbaik dipilih per jenjang atau gabungan semua jenjang?','a'=>'10 kelompok terbaik ditetapkan per jenjang.'],
    ]],
    ['category'=>'Game / Media','items'=>[
        ['q'=>'Apakah game edukasi wajib mendukung proses pembelajaran murid?','a'=>'Dianjurkan untuk mendukung pembelajaran dan relevan dengan kebutuhan peserta didik.'],
        ['q'=>'Apakah game edukasi termasuk media pembelajaran, dan apakah wajib menyertakan TP, ATP, dan evaluasi?','a'=>'Dianjurkan untuk menyertakan TP, ATP, dan evaluasi guna memperkuat kelayakan pembelajaran.'],
        ['q'=>'Apakah game yang dibuat harus dapat diakses oleh semua orang atau cukup melalui tautan tertentu?','a'=>'Karya yang dibuat harus dapat diakses menggunakan browser tanpa menggunakan tools tambahan tertentu.'],
        ['q'=>'Apakah game yang tidak menjadi juara akan dipublikasikan di website?','a'=>'Karya yang dipublikasikan merupakan 3 karya terbaik dari masing-masing kategori.'],
        ['q'=>'Apakah game harus berbasis HTML?','a'=>'Ya, game harus berbasis HTML.'],
        ['q'=>'Apakah akan diajarkan cara membuat game yang dapat diakses secara offline?','a'=>'Peserta wajib mengikuti pelatihan pada tanggal 27 - 28 November 2025.'],
        ['q'=>'Apakah game dapat berasal dari mata pelajaran apa pun, termasuk Agama, PJOK, atau Bahasa Daerah?','a'=>'Ya, diperbolehkan.'],
        ['q'=>'Apakah terdapat tema tertentu atau tema bebas?','a'=>'Tidak ada tema khusus; peserta dapat memilih tema secara bebas dan mendukung pembelajaran serta relevan dengan kebutuhan peserta didik.'],
    ]],
    ['category'=>'Platform','items'=>[
        ['q'=>'Apakah kolaborasi antara Gemini AI, Canva, dan H5P Lumi diperbolehkan?','a'=>'Diperbolehkan, sepanjang karya yang dihasilkan nantinya dapat dimainkan via browser tanpa menggunakan tools khusus.'],
        ['q'=>'Apakah karya harus berformat PDF atau HTML?','a'=>'Karya berupa game edukasi interaktif berbasis web (HTML).'],
        ['q'=>'Apakah wajib menggabungkan Canva dan Google, atau boleh memilih salah satu?','a'=>'Setiap tim wajib membuat 2 karya: 1 menggunakan tools dasar Google for Education dan 1 menggunakan tools dasar Canva.'],
        ['q'=>'Apakah aplikasi Google dan Canva harus digunakan secara bersamaan atau cukup salah satu?','a'=>'Setiap tim wajib membuat 2 karya: 1 menggunakan tools dasar Google for Education dan 1 menggunakan tools dasar Canva.'],
        ['q'=>'Bagaimana cara membuat game melalui Canva AI?','a'=>'Peserta wajib mengikuti pelatihan pada tanggal 27 November 2025.'],
    ]],
    ['category'=>'Status Peserta','items'=>[
        ['q'=>'Apakah guru yang sedang tugas belajar diperbolehkan ikut?','a'=>'Guru yang sedang tugas belajar diperbolehkan ikut selama status di Dapodik merupakan guru aktif.'],
        ['q'=>'Apakah kegiatan ini khusus untuk guru dan tendik yang terdaftar di Dapodik?','a'=>'Ya.'],
        ['q'=>'Apakah peserta lomba Game Edukasi wajib memiliki NUPTK?','a'=>'Persyaratan peserta Hackathon Rumah Pendidikan 2025 adalah guru aktif yang terdata di Dapodik. Kepemilikan NUPTK tidak menjadi syarat utama.'],
    ]],
    ['category'=>'Pelatihan & Kickoff','items'=>[
        ['q'=>'Apakah pelatihan dapat dilakukan secara luring per kecamatan?','a'=>'Pelatihan diselenggarakan secara daring oleh panitia pada tanggal 27 November 2025.'],
        ['q'=>'Jika tidak dapat mengikuti Kick Off karena Zoom penuh, apa langkah selanjutnya?','a'=>'Rekaman Kick Off dapat disaksikan melalui Channel YouTube Rumah Pendidikan Kemendikdasmen atau Pusdatin Kemendikdasmen.'],
    ]],
    ['category'=>'Dukungan Kementerian','items'=>[
        ['q'=>'Apakah kementerian dapat menyediakan template atau game edukasi yang siap pakai?','a'=>'Untuk pelaksanaan Hackathon Rumah Pendidikan 2025 ini, Kementerian belum menyediakan template atau game edukasi yang siap pakai.'],
    ]],
];
@endphp

<style>
/* ✅ PERBAIKAN: Scoped ke .faq-page saja agar tidak merusak navbar & footer */
.faq-page *, .faq-page *::before, .faq-page *::after { box-sizing: border-box; margin: 0; padding: 0; }

.faq-page {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: #fff;
    color: #0f172a;
}

.fhero {
    background: #fff;
    border-bottom: 1px solid #e2e8f0;
    padding: 28px 24px 24px;
    text-align: center;
}
.fhero-badge {
    display: inline-block;
    background: #f1f5f9;
    color: #475569;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .06em;
    text-transform: uppercase;
    padding: 3px 12px;
    border-radius: 999px;
    border: 1px solid #e2e8f0;
    margin-bottom: 10px;
}
.fhero h1 {
    font-size: clamp(18px, 2.2vw, 26px);
    font-weight: 800;
    line-height: 1.2;
    letter-spacing: -.02em;
    color: #0f172a;
    margin-bottom: 4px;
}
.fhero h1 span { color: #2563eb; }
.fhero p { font-size: 12.5px; color: #64748b; }

.fwrap {
    max-width: 1040px;
    margin: 0 auto;
    padding: 28px 24px 64px;
    display: grid;
    grid-template-columns: 185px 1fr;
    gap: 28px;
    align-items: start;
}

.fside {
    position: sticky;
    top: 90px;
    z-index: 10;
}
.fside-label {
    font-size: 9.5px;
    font-weight: 700;
    letter-spacing: .1em;
    text-transform: uppercase;
    color: #94a3b8;
    padding: 0 8px;
    margin-bottom: 6px;
}
.fside-nav { display: flex; flex-direction: column; gap: 1px; }
.fside-link {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 7px 10px;
    border-radius: 7px;
    font-size: 12px;
    font-weight: 500;
    color: #64748b;
    text-decoration: none;
    transition: background .12s, color .12s;
    border-left: 2px solid transparent;
}
.fside-link:hover { background: #f8fafc; color: #1e293b; }
.fside-link.active {
    background: #f8fafc;
    color: #2563eb;
    font-weight: 700;
    border-left-color: #2563eb;
    box-shadow: 0 1px 3px rgba(0,0,0,.06);
}
.fside-count {
    font-size: 9.5px;
    font-weight: 700;
    color: #cbd5e1;
    background: #f1f5f9;
    padding: 1px 6px;
    border-radius: 999px;
    flex-shrink: 0;
}

.fmain { min-width: 0; }

.fcat {
    margin-bottom: 20px;
    scroll-margin-top: 110px;
}
.fcat-head {
    display: flex;
    align-items: center;
    padding-bottom: 8px;
    margin-bottom: 6px;
    border-bottom: 1px solid #e2e8f0;
}
.fcat-name { font-size: 13.5px; font-weight: 700; color: #1e293b; flex: 1; }
.fcat-num  { font-size: 11px; font-weight: 600; color: #94a3b8; }

.facc {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    margin-bottom: 3px;
    overflow: hidden;
    transition: border-color .15s;
}
.facc:hover { border-color: #cbd5e1; }
.facc.open { border-color: #93c5fd; }

.facc-btn {
    width: 100%; background: none; border: none;
    padding: 12px 14px;
    display: flex; align-items: center; gap: 10px;
    cursor: pointer; text-align: left;
}
.facc-num {
    width: 22px; height: 22px;
    border-radius: 5px;
    background: #f1f5f9;
    display: flex; align-items: center; justify-content: center;
    font-size: 10px; font-weight: 700; color: #94a3b8;
    flex-shrink: 0;
    transition: background .15s, color .15s;
}
.facc.open .facc-num { background: #dbeafe; color: #2563eb; }

.facc-q {
    flex: 1;
    font-size: 12.5px; font-weight: 600;
    color: #374151; line-height: 1.5;
}
.facc.open .facc-q { color: #1e293b; }

.facc-chevron {
    flex-shrink: 0;
    width: 22px; height: 22px;
    border-radius: 5px;
    background: #f1f5f9;
    display: flex; align-items: center; justify-content: center;
    transition: background .15s, transform .24s ease;
}
.facc.open .facc-chevron { background: #dbeafe; transform: rotate(180deg); }
.facc-chevron svg { width: 11px; height: 11px; stroke: #94a3b8; transition: stroke .15s; }
.facc.open .facc-chevron svg { stroke: #2563eb; }

.facc-body {
    display: grid;
    grid-template-rows: 0fr;
    transition: grid-template-rows .24s cubic-bezier(.4,0,.2,1);
}
.facc.open .facc-body { grid-template-rows: 1fr; }
.facc-inner { overflow: hidden; }
.facc-ans {
    padding: 8px 14px 12px 46px;
    font-size: 12.5px;
    color: #64748b;
    line-height: 1.75;
    border-top: 1px solid #f1f5f9;
}

@media (max-width: 680px) {
    .fwrap { grid-template-columns: 1fr; padding: 16px 14px 48px; gap: 16px; }
    .fside { position: static; }
    .fside-nav { flex-direction: row; flex-wrap: wrap; gap: 4px; }
    .fside-link {
        border-left: none;
        border: 1px solid #e2e8f0;
        border-radius: 999px;
        padding: 4px 10px;
        font-size: 11px;
    }
    .fside-link.active { border-color: #93c5fd; background: #eff6ff; }
    .fside-count { display: none; }
    .fcat { scroll-margin-top: 16px; }
    .facc-ans { padding-left: 14px; }
}
</style>

<div class="faq-page">

<div class="fhero">
    <div class="fhero-badge">Hackathon Rumah Pendidikan 2026</div>
    <h1>Pertanyaan yang <span>Sering Ditanyakan</span></h1>
    <p>Temukan jawaban seputar Hackathon Rumah Pendidikan 2026.</p>
</div>

<div class="fwrap">
    <aside class="fside">
        <p class="fside-label">Kategori</p>
        <nav class="fside-nav">
            @foreach($faq as $i => $cat)
            <a class="fside-link {{ $i === 0 ? 'active' : '' }}"
               href="#cat-{{ $i }}" data-cat="{{ $i }}">
                {{ $cat['category'] }}
                <span class="fside-count">{{ count($cat['items']) }}</span>
            </a>
            @endforeach
        </nav>
    </aside>

    <main class="fmain">
        @foreach($faq as $ci => $cat)
        <div class="fcat" id="cat-{{ $ci }}">
            <div class="fcat-head">
                <span class="fcat-name">{{ $cat['category'] }}</span>
                <span class="fcat-num">{{ count($cat['items']) }} pertanyaan</span>
            </div>
            @foreach($cat['items'] as $ii => $item)
            <div class="facc" id="item-{{ $ci }}-{{ $ii }}">
                <button class="facc-btn" onclick="toggleFaq('item-{{ $ci }}-{{ $ii }}')">
                    <span class="facc-num">{{ $ii + 1 }}</span>
                    <span class="facc-q">{{ $item['q'] }}</span>
                    <span class="facc-chevron">
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"
                             stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"/>
                        </svg>
                    </span>
                </button>
                <div class="facc-body">
                    <div class="facc-inner">
                        <div class="facc-ans">{{ $item['a'] }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </main>
</div>

</div>{{-- .faq-page --}}

<script>
function toggleFaq(id) {
    const el = document.getElementById(id);
    const isOpen = el.classList.contains('open');
    document.querySelectorAll('.facc.open').forEach(e => e.classList.remove('open'));
    if (!isOpen) el.classList.add('open');
}
const links = document.querySelectorAll('.fside-link');
const cats  = document.querySelectorAll('.fcat');
const obs = new IntersectionObserver(entries => {
    entries.forEach(e => {
        if (e.isIntersecting) {
            const id = e.target.id.replace('cat-', '');
            links.forEach(l => l.classList.toggle('active', l.dataset.cat === id));
        }
    });
}, { rootMargin: '-15% 0px -70% 0px' });
cats.forEach(c => obs.observe(c));
</script>

@endsection