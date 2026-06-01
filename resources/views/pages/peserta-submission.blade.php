@extends('layouts.peserta')

@section('title', 'CMS Peserta')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>
  :root {
    --pf-blue: #1d7cf2;
    --pf-blue-dark: #1565C0;
    --pf-blue-soft: #eef6ff;
    --pf-text: #0f172a;
    --pf-text-2: #334155;
    --pf-text-3: #64748b;
    --pf-text-4: #94a3b8;
    --pf-border: #e2e8f0;
    --pf-green: #16a34a;
    --pf-green-light: #dcfce7;
    --pf-green-mid: #bbf7d0;
    --pf-red: #dc2626;
    --pf-red-light: #fef2f2;
    --pf-red-mid: #fecaca;
    --pf-bg: #ffffff;
    --pf-bg-soft: #f8fafc;
    --pf-font: 'Plus Jakarta Sans', sans-serif;
    --pf-shadow: 0 1px 3px rgba(15,23,42,0.07), 0 8px 24px rgba(15,23,42,0.06);
  }

  [x-cloak] { display: none !important; }

  .ps-page * { box-sizing: border-box; }

  .ps-page {
    max-width: 1220px;
    margin: 0 auto;
    padding: 2.5rem 1.25rem 4rem;
    font-family: var(--pf-font);
  }

  .ps-header {
    margin-bottom: 1.8rem;
    color: black;
  }

  .ps-eyebrow {
    font-size: .72rem;
    font-weight: 800;
    letter-spacing: .14em;
    text-transform: uppercase;
    color: var(--pf-text-4);
    margin-bottom: .35rem;
  }

  .ps-title {
    font-size: 2.2rem;
    line-height: 1.15;
    font-weight: 800;
    color: var(--pf-text);
    margin: 0 0 .45rem;
  }

  .ps-desc {
    margin: 0;
    font-size: .92rem;
    color: black;
    font: bold;
  }

  .ps-alert {
    display: flex;
    gap: .75rem;
    border-radius: 14px;
    padding: .9rem 1rem;
    font-size: .85rem;
    font-weight: 500;
    margin-bottom: 1.2rem;
  }

  .ps-alert svg {
    width: 18px;
    height: 18px;
    flex-shrink: 0;
    margin-top: 2px;
  }

  .ps-alert-success {
    background: var(--pf-green-light);
    border: 1px solid var(--pf-green-mid);
    color: #166534;
  }

  .ps-alert-error {
    background: var(--pf-red-light);
    border: 1px solid var(--pf-red-mid);
    color: var(--pf-red);
  }

  .ps-alert-error ul {
    margin: .35rem 0 0;
    padding-left: 1rem;
  }

  .ps-layout {
    display: grid;
    grid-template-columns: 320px 1fr;
    gap: 1.5rem;
    align-items: start;
  }

  .ps-sidebar,
  .ps-content {
    background: #fff;
    border: 1px solid var(--pf-border);
    border-radius: 22px;
    box-shadow: var(--pf-shadow);
  }

  .ps-sidebar {
    padding: 1rem;
    position: sticky;
    top: 100px;
  }

  .ps-content {
    padding: 1.5rem;
  }

  .ps-menu-label {
    font-size: .72rem;
    font-weight: 800;
    letter-spacing: .12em;
    text-transform: uppercase;
    color: black;
    margin: .2rem 0 1rem;
    padding: 0 .3rem;
  }

  .ps-menu-item {
    display: block;
    width: 100%;
    text-align: left;
    border: 0;
    background: transparent;
    border-radius: 16px;
    padding: .95rem 1rem;
    cursor: pointer;
    transition: .2s ease;
    margin-bottom: .4rem;
  }

  .ps-menu-item:hover {
    background: #f8fbff;
  }

  .ps-menu-item.active {
    background: linear-gradient(180deg, #1d7cf2 0%, #1565C0 100%);
    color: #fff;
    box-shadow: 0 8px 20px rgba(21,101,192,.18);
  }

  .ps-menu-title {
    font-size: 1rem;
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: .18rem;
  }

  .ps-menu-logout {
    margin-bottom: 0;
    color: var(--pf-red);
  }
  .ps-menu-logout .ps-menu-sub {
    color: #fca5a5;
  }
  .ps-menu-logout:hover {
    background: var(--pf-red-light);
  }

  .ps-menu-sub {
    font-size: .77rem;
    line-height: 1.35;
    color: var(--pf-text-4);
  }

  .ps-menu-item.active .ps-menu-sub {
    color: rgba(255,255,255,.88);
  }

  .ps-section-title {
    font-size: 1.7rem;
    font-weight: 800;
    color: var(--pf-text);
    margin: 0 0 .35rem;
    letter-spacing: -.02em;
  }

  .ps-section-desc {
    color: var(--pf-text-3);
    font-size: .9rem;
    margin: 0 0 1.3rem;
  }

  .ps-card {
    border: 1px solid var(--pf-border);
    background: var(--pf-bg-soft);
    border-radius: 18px;
    padding: 1rem 1.1rem;
    margin-bottom: 1rem;
  }

  .ps-card:last-child {
    margin-bottom: 0;
  }

  .ps-card-text {
    font-size: .9rem;
    line-height: 1.8;
    color: black;
    font: bold;
  }

  .ps-block {
    margin-bottom: 1.2rem;
  }

  .ps-label {
    display: block;
    font-size: .84rem;
    font-weight: 700;
    color: var(--pf-text-2);
    margin-bottom: .45rem;
  }

  .ps-input {
    width: 100%;
    border: 1px solid var(--pf-border);
    border-radius: 12px;
    padding: .8rem 1rem;
    font-family: var(--pf-font);
    font-size: .9rem;
    color: var(--pf-text);
    background: #fff;
    outline: none;
    transition: .2s;
  }

  .ps-input:focus {
    border-color: var(--pf-blue);
    box-shadow: 0 0 0 3px rgba(29,124,242,.12);
    background: var(--pf-blue-soft);
  }

  .ps-file-box {
    border: 1.5px dashed #c9def8;
    border-radius: 18px;
    background: #f8fbff;
    padding: 1rem;
  }

  .ps-file-hint {
    font-size: .78rem;
    color: var(--pf-text-3);
    margin-top: .4rem;
  }

  /* FIX SCROLL FORM */
.ps-content {
  max-height: 75vh;
  overflow-y: auto;
  scroll-behavior: smooth;
  padding-right: 6px;
}

/* biar scroll ga loncat pas klik input */
.ps-content:focus-within {
  scroll-behavior: smooth;
}

/* custom scrollbar biar lebih premium */
.ps-content::-webkit-scrollbar {
  width: 6px;
}

.ps-content::-webkit-scrollbar-thumb {
  background: #cbd5f5;
  border-radius: 10px;
}
  .ps-submit-wrap {
    margin-top: 1.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    flex-wrap: wrap;
    padding-top: 1rem;
    border-top: 1px solid var(--pf-border);
  }

  .ps-submit-btn {
    border: 0;
    border-radius: 999px;
    background: var(--pf-blue);
    color: #fff;
    padding: .85rem 1.5rem;
    font-size: .9rem;
    font-weight: 800;
    cursor: pointer;
    transition: .2s;
    box-shadow: 0 8px 20px rgba(29,124,242,.18);
  }

  .ps-submit-btn:hover {
    background: var(--pf-blue-dark);
    transform: translateY(-1px);
  }

  .ps-submit-note {
    color: var(--pf-text-4);
    font-size: .8rem;
  }

  @media (max-width: 1024px) {
    .ps-layout {
      grid-template-columns: 1fr;
    }

    .ps-sidebar {
      position: static;
    }
  }

  @media (max-width: 640px) {
    .ps-title {
      font-size: 1.8rem;
    }

    .ps-sidebar,
    .ps-content {
      padding: 1rem;
    }
  }
</style>

@php
  $infoItems = collect($informasiPentingItems ?? [])->values();
@endphp

<div class="ps-page" x-data="{ tab: 'informasi' }">

  <div class="ps-header">
    <div class="ps-eyebrow">Peserta Hackathon</div>
    <h1 class="ps-title">CMS Peserta</h1>
    <p class="ps-desc">Kelola informasi penting, anggota tim, upload proposal, dan upload karya dari panel peserta.</p>
  </div>

  @if(session('success'))
    <div class="ps-alert ps-alert-success">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
        <polyline points="22 4 12 14.01 9 11.01"></polyline>
      </svg>
      <span>{{ session('success') }}</span>
    </div>
  @endif

  @if($errors->any())
    <div class="ps-alert ps-alert-error">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <circle cx="12" cy="12" r="10"></circle>
        <line x1="12" y1="8" x2="12" y2="12"></line>
        <line x1="12" y1="16" x2="12.01" y2="16"></line>
      </svg>
      <div>
        <div>Terdapat kesalahan pada form:</div>
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    </div>
  @endif

  <form action="{{ route('peserta-submission.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="ps-layout">

      {{-- Sidebar kiri --}}
      <div class="ps-sidebar">
        <div class="ps-menu-label">Menu Peserta</div>

        <button type="button" class="ps-menu-item" :class="{ 'active': tab === 'informasi' }" @click="tab='informasi'">
          <div class="ps-menu-title">Informasi</div>
          <div class="ps-menu-sub">Informasi penting dari Panitia</div>
        </button>

        <button type="button" class="ps-menu-item" :class="{ 'active': tab === 'anggota' }" @click="tab='anggota'">
          <div class="ps-menu-title">Tim</div>
          <div class="ps-menu-sub">Isi nama tim dan anggota tim</div>
        </button>

        <button type="button" class="ps-menu-item" :class="{ 'active': tab === 'proposal' }" @click="tab='proposal'">
          <div class="ps-menu-title">Upload Proposal</div>
          <div class="ps-menu-sub">Upload file proposal tim</div>
        </button>

        <button type="button" class="ps-menu-item" :class="{ 'active': tab === 'karya' }" @click="tab='karya'">
          <div class="ps-menu-title">Upload Karya</div>
          <div class="ps-menu-sub">Upload file karya tim</div>
        </button>

        {{-- Logout --}}
        <div style="margin-top:.8rem; padding-top:.8rem; border-top:1px solid var(--pf-border);">
          <button type="button" class="ps-menu-item ps-menu-logout"
            onclick="document.getElementById('logout-form').submit()">
              <div style="display:flex; align-items:center; gap:.6rem;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;">
                  <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                  <polyline points="16 17 21 12 16 7"></polyline>
                  <line x1="21" y1="12" x2="9" y2="12"></line>
                </svg>
                <div>
                  <div class="ps-menu-title">Logout</div>
                  <div class="ps-menu-sub">Keluar dari akun peserta</div>
                </div>
              </div>
          </button>
        </div>
      </div>

      {{-- Content kanan --}}
      <div class="ps-content">

        {{-- Informasi --}}
        <div x-show="tab==='informasi'" x-cloak>
          <h2 class="ps-section-title">Informasi Penting</h2>

          @forelse($infoItems as $item)
            <div class="ps-card">
              <div class="ps-card-text">{{ $item->content }}</div>
            </div>
          @empty
            <div class="ps-card">
              <div class="ps-card-text">Belum ada informasi penting dari admin.</div>
            </div>
          @endforelse
        </div>

       {{-- Informasi Tim --}}
<div x-show="tab==='anggota'" x-cloak>
    <h2 class="ps-section-title">Informasi Tim</h2>
    <p class="ps-section-desc">
        Lengkapi data tim, sekolah, kategori, dan anggota sebelum mengunggah berkas.
    </p>

    {{-- Nama Tim --}}
    <div class="ps-block">
        <label class="ps-label">Nama Tim</label>
        <input
            type="text"
            name="nama_tim"
            value="{{ old('nama_tim') }}"
            class="ps-input"
            placeholder="Masukkan nama tim"
            required>
    </div>

    {{-- Kategori --}}
    <div class="ps-block">
        <label class="ps-label">Kategori</label>
        <select name="kategori" class="ps-input" required>
            <option value="">Pilih Kategori</option>
            <option value="PAUD" {{ old('kategori') == 'PAUD' ? 'selected' : '' }}>PAUD</option>
            <option value="SD" {{ old('kategori') == 'SD' ? 'selected' : '' }}>SD</option>
            <option value="SMP" {{ old('kategori') == 'SMP' ? 'selected' : '' }}>SMP</option>
            <option value="SMA" {{ old('kategori') == 'SMA' ? 'selected' : '' }}>SMA</option>
            <option value="SMK" {{ old('kategori') == 'SMK' ? 'selected' : '' }}>SMK</option>
        </select>
    </div>

    {{-- Asal Sekolah --}}
    <div class="ps-block">
        <label class="ps-label">Asal Sekolah</label>
        <input
            type="text"
            name="asal_sekolah"
            value="{{ old('asal_sekolah') }}"
            class="ps-input"
            placeholder="Contoh: SMKN 1 Bandung"
            required>
    </div>

    {{-- Kota / Kabupaten --}}
    <div class="ps-block">
        <label class="ps-label">Kota / Kabupaten</label>
        <input
            type="text"
            name="kota_kabupaten"
            value="{{ old('kota_kabupaten') }}"
            class="ps-input"
            placeholder="Contoh: Kota Bandung"
            required>
    </div>

    {{-- Ketua Tim --}}
    <div class="ps-block">
        <label class="ps-label">Ketua Tim</label>
        <input
            type="text"
            name="anggota_1"
            value="{{ old('anggota_1') }}"
            class="ps-input"
            placeholder="Masukkan nama ketua tim"
            required>
    </div>

    {{-- Anggota 2 --}}
    <div class="ps-block">
        <label class="ps-label">Anggota Tim 2</label>
        <input
            type="text"
            name="anggota_2"
            value="{{ old('anggota_2') }}"
            class="ps-input"
            placeholder="Masukkan nama anggota kedua">
    </div>

    {{-- Anggota 3 --}}
    <div class="ps-block">
        <label class="ps-label">Anggota Tim 3</label>
        <input
            type="text"
            name="anggota_3"
            value="{{ old('anggota_3') }}"
            class="ps-input"
            placeholder="Masukkan nama anggota ketiga">
    </div>
</div>

        {{-- Proposal --}}
        <div x-show="tab==='proposal'" x-cloak>
          <h2 class="ps-section-title">Upload Proposal</h2>
          <p class="ps-section-desc">Unggah file proposal tim sesuai format yang ditentukan.</p>

          <div class="ps-file-box">
            <div class="ps-block" style="margin-bottom:0;">
              <label class="ps-label">File Proposal</label>
              <input type="file" name="proposal_file" class="ps-input">
              <div class="ps-file-hint">Format: PDF, DOC, DOCX — Maksimal 5 MB</div>
            </div>
          </div>
        </div>

        {{-- Karya --}}
        <div x-show="tab==='karya'" x-cloak>
          <h2 class="ps-section-title">Upload Karya</h2>
          <p class="ps-section-desc">Unggah file karya tim yang akan dinilai admin/juri.</p>

          <div class="ps-file-box">
            <div class="ps-block" style="margin-bottom:0;">
              <label class="ps-label">File Karya</label>
              <input type="file" name="karya_file" class="ps-input">
              <div class="ps-file-hint">Format: PDF, ZIP, RAR, DOC, DOCX — Maksimal 10 MB</div>
            </div>
          </div>
        </div>

        <div class="ps-submit-wrap" x-show="tab !== 'informasi'" x-cloak>
  <button type="submit" class="ps-submit-btn">Kirim Submission</button>
  <span class="ps-submit-note">Semua data tetap tersimpan ke submission peserta yang sama.</span>
</div>
      </div>
    </div>
 </form>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
    @csrf
  </form>

</div>

@endsection