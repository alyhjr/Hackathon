@extends('layouts.peserta')

@section('title', 'CMS Peserta')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --blue:        #1d7cf2;
    --blue-dark:   #1565C0;
    --blue-soft:   #eef6ff;
    --blue-mid:    #bfdbfe;
    --text:        #0f172a;
    --text-2:      #334155;
    --text-3:      #64748b;
    --text-4:      #94a3b8;
    --border:      #e2e8f0;
    --green-light: #dcfce7;
    --green-mid:   #bbf7d0;
    --red:         #dc2626;
    --red-light:   #fef2f2;
    --red-mid:     #fecaca;
    --bg:          #f1f5f9;
    --font:        'Plus Jakarta Sans', sans-serif;
    --shadow:      0 4px 6px rgba(15,23,42,.04), 0 16px 48px rgba(15,23,42,.09);
  }

  [x-cloak] { display: none !important; }

  body { background: var(--bg); }

  .cms-page {
    min-height: 100vh;
    display: flex;
    align-items: flex-start;
    justify-content: center;
    font-family: var(--font);
    padding: 2.5rem 1.25rem 5rem;
  }

  /* ── SINGLE WHITE CARD ── */
  .cms-card {
    width: 100%;
    max-width: 980px;
    background: #fff;
    border-radius: 24px;
    border: 1px solid var(--border);
    box-shadow: var(--shadow);
    overflow: hidden;
  }

  /* ── CARD HEADER ── */
  .cms-card-header {
    padding: 1.6rem 2.2rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    border-bottom: 1px solid var(--border);
    background: #fff;
  }

  .cms-header-left {
    display: flex;
    align-items: center;
    gap: 1rem;
  }

  .cms-header-icon {
    width: 44px; height: 44px;
    border-radius: 14px;
    background: var(--blue);
    display: flex; align-items: center; justify-content: center;
    box-shadow: 0 6px 18px rgba(29,124,242,.28);
    flex-shrink: 0;
  }

  .cms-header-icon svg { color: #fff; }

  .cms-header-title {
    font-size: 1.15rem;
    font-weight: 800;
    color: var(--text);
    line-height: 1.2;
    
  }

  .cms-header-sub {
    font-size: .78rem;
    color: var(--text-3);
    font-weight: 500;
    margin-top: .1rem;
  }

  .cms-logout-btn {
    display: flex;
    align-items: center;
    gap: .5rem;
    border: 1.5px solid var(--red-mid);
    background: var(--red-light);
    color: var(--red);
    border-radius: 999px;
    padding: .5rem 1.1rem;
    font-size: .82rem;
    font-weight: 700;
    font-family: var(--font);
    cursor: pointer;
    transition: .18s;
    flex-shrink: 0;
    white-space: nowrap;
  }

  .cms-logout-btn:hover {
    background: #fee2e2;
    border-color: var(--red);
  }

  /* ── ALERT ── */
  .cms-alert {
    display: flex;
    gap: .75rem;
    padding: .9rem 2.2rem;
    font-size: .85rem;
    font-weight: 500;
    border-bottom: 1px solid transparent;
  }

  .cms-alert svg { width: 18px; height: 18px; flex-shrink: 0; margin-top: 2px; }

  .cms-alert-success {
    background: var(--green-light);
    border-bottom-color: var(--green-mid);
    color: #166534;
  }

  .cms-alert-error {
    background: var(--red-light);
    border-bottom-color: var(--red-mid);
    color: var(--red);
  }

  .cms-alert-error ul { margin: .35rem 0 0; padding-left: 1.1rem; }

  /* ── INFO STRIP ── */
  .cms-info-strip {
    background: var(--blue-soft);
    border-bottom: 1px solid var(--blue-mid);
    padding: 1rem 2.2rem;
  }

  .cms-info-strip-head {
    display: flex;
    align-items: center;
    gap: .5rem;
    font-size: .86rem;
    font-weight: 800;
    letter-spacing: .1em;
    text-transform: uppercase;
    color: var(--black);
    margin-bottom: .6rem;
  }

  .cms-info-strip-head svg { width: 14px; height: 14px; }

  .cms-info-list {
    display: flex;
    flex-direction: column;
    gap: .35rem;
  }

  .cms-info-row {
    display: flex;
    gap: .6rem;
    font-size: .84rem;
    color: var(--text-2);
    line-height: 1.5;
  }

  .cms-info-dot {
    width: 6px; height: 6px;
    border-radius: 50%;
    background: var(--blue);
    margin-top: 7px;
    flex-shrink: 0;
  }

  .cms-info-empty {
    font-size: .84rem;
    color: var(--text-3);
    font-style: italic;
  }

  /* ── FORM BODY ── */
  .cms-form-body {
    padding: 0;
  }

  /* ── SECTION ── */
  .cms-section {
    padding: 1.8rem 2.2rem;
    border-bottom: 1px solid var(--border);
  }

  .cms-section-head {
    display: flex;
    align-items: center;
    gap: .85rem;
    margin-bottom: 1.4rem;
  }

  .cms-section-num {
    width: 34px; height: 34px;
    border-radius: 10px;
    background: var(--blue-soft);
    border: 1.5px solid var(--blue-mid);
    display: flex; align-items: center; justify-content: center;
    font-size: .8rem;
    font-weight: 800;
    color: var(--blue);
    flex-shrink: 0;
  }

  .cms-section-title {
    font-size: 1rem;
    font-weight: 800;
    color: var(--text);
    line-height: 1.2;
  }

  .cms-section-sub {
    font-size: .76rem;
    color: var(--text-3);
    margin-top: .12rem;
    font-weight: 500;
  }

  /* ── GRID ── */
  .cms-grid-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
  }

  .cms-grid-3 {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 1rem;
  }

  /* ── FIELD ── */
  .cms-field {
    display: flex;
    flex-direction: column;
    gap: .38rem;
  }

  .cms-label {
    font-size: .79rem;
    font-weight: 700;
    color: var(--text-2);
  }

  .cms-label .req { color: var(--blue); margin-left: 2px; }

  .cms-input {
    width: 100%;
    border: 1.5px solid var(--border);
    border-radius: 11px;
    padding: .72rem 1rem;
    font-family: var(--font);
    font-size: .88rem;
    color: var(--text);
    background: #fff;
    outline: none;
    transition: border-color .18s, box-shadow .18s, background .18s;
    appearance: none;
    -webkit-appearance: none;
  }

  .cms-input::placeholder { color: var(--text-4); }

  .cms-input:focus {
    border-color: var(--blue);
    box-shadow: 0 0 0 3px rgba(29,124,242,.11);
    background: var(--blue-soft);
  }

  .cms-select-wrap { position: relative; }

  .cms-select-wrap::after {
    content: '';
    position: absolute;
    right: 13px; top: 50%;
    transform: translateY(-50%);
    width: 0; height: 0;
    border-left: 4px solid transparent;
    border-right: 4px solid transparent;
    border-top: 5px solid var(--text-3);
    pointer-events: none;
  }

  /* ── FILE BOX ── */
  .cms-file-box {
    border: 2px dashed var(--blue-mid);
    border-radius: 14px;
    background: var(--blue-soft);
    padding: 1.1rem 1.15rem .9rem;
    transition: border-color .18s;
  }

  .cms-file-box:hover { border-color: var(--blue); }

  .cms-file-icon {
    width: 36px; height: 36px;
    border-radius: 10px;
    background: #fff;
    border: 1.5px solid var(--blue-mid);
    display: flex; align-items: center; justify-content: center;
    margin-bottom: .75rem;
  }

  .cms-file-icon svg { color: var(--blue); }

  .cms-file-hint {
    font-size: .73rem;
    color: var(--text-3);
    margin-top: .35rem;
    font-weight: 500;
  }

  .cms-input[type="file"] {
    padding: .55rem .85rem;
    cursor: pointer;
    font-size: .82rem;
  }

  /* ── UPLOAD GRID side by side ── */
  .cms-upload-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0;
  }

  .cms-upload-grid .cms-section {
    border-bottom: none;
    border-right: 1px solid var(--border);
  }

  .cms-upload-grid .cms-section:last-child { border-right: none; }

  /* ── FOOTER / SUBMIT ── */
  .cms-footer {
    padding: 1.4rem 2.2rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    flex-wrap: wrap;
    border-top: 1px solid var(--border);
    background: #fafbfc;
    border-radius: 0 0 24px 24px;
  }

  .cms-footer-note {
    font-size: .79rem;
    color: var(--text-3);
    max-width: 400px;
    line-height: 1.5;
  }

  .cms-submit-btn {
    display: flex;
    align-items: center;
    gap: .55rem;
    border: 0;
    border-radius: 999px;
    background: var(--blue);
    color: #fff;
    padding: .85rem 1.8rem;
    font-size: .9rem;
    font-weight: 800;
    font-family: var(--font);
    cursor: pointer;
    transition: .18s;
    box-shadow: 0 8px 24px rgba(29,124,242,.22);
    white-space: nowrap;
  }

  .cms-submit-btn:hover {
    background: var(--blue-dark);
    transform: translateY(-1px);
    box-shadow: 0 12px 28px rgba(29,124,242,.3);
  }

  .cms-submit-btn svg { width: 17px; height: 17px; }

  /* ── MODAL ── */
  .cms-modal-backdrop {
    position: fixed; inset: 0;
    background: rgba(15,23,42,.45);
    backdrop-filter: blur(6px);
    display: flex; align-items: center; justify-content: center;
    z-index: 9999;
  }

  .cms-modal {
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 24px 64px rgba(15,23,42,.18);
    padding: 1.75rem;
    width: 100%;
    max-width: 370px;
  }

  .cms-modal-icon {
    width: 46px; height: 46px;
    border-radius: 13px;
    background: var(--red-light);
    display: flex; align-items: center; justify-content: center;
    margin-bottom: .9rem;
  }

  .cms-modal-icon svg { color: var(--red); width: 20px; height: 20px; }

  .cms-modal h3 {
    font-size: 1rem;
    font-weight: 800;
    color: var(--text);
    margin-bottom: .3rem;
  }

  .cms-modal p {
    font-size: .85rem;
    color: var(--text-3);
    line-height: 1.55;
    margin-bottom: 1.3rem;
  }

  .cms-modal-actions {
    display: flex;
    gap: .65rem;
    justify-content: flex-end;
  }

  .cms-modal-cancel {
    border: 1.5px solid var(--border);
    background: #fff;
    color: var(--text-2);
    border-radius: 11px;
    padding: .6rem 1.1rem;
    font-size: .86rem;
    font-weight: 600;
    font-family: var(--font);
    cursor: pointer;
    transition: .18s;
  }

  .cms-modal-cancel:hover { background: var(--bg); }

  .cms-modal-confirm {
    border: 0;
    background: var(--red);
    color: #fff;
    border-radius: 11px;
    padding: .6rem 1.2rem;
    font-size: .86rem;
    font-weight: 700;
    font-family: var(--font);
    cursor: pointer;
    transition: .18s;
    box-shadow: 0 6px 18px rgba(220,38,38,.22);
  }

  .cms-modal-confirm:hover { background: #b91c1c; }

  /* ── RESPONSIVE ── */
  @media (max-width: 768px) {
    .cms-page { padding: 1rem .75rem 4rem; }
    .cms-card-header { padding: 1.2rem 1.25rem; }
    .cms-section { padding: 1.4rem 1.25rem; }
    .cms-info-strip { padding: .9rem 1.25rem; }
    .cms-footer { padding: 1.1rem 1.25rem; }
    .cms-grid-2 { grid-template-columns: 1fr; }
    .cms-grid-3 { grid-template-columns: 1fr; }
    .cms-upload-grid { grid-template-columns: 1fr; }
    .cms-upload-grid .cms-section { border-right: none; border-bottom: 1px solid var(--border); }
    .cms-upload-grid .cms-section:last-child { border-bottom: none; }
    .cms-header-left { gap: .7rem; }
  }
</style>

@php
  $infoItems = collect($informasiPentingItems ?? [])->values();
@endphp

<div class="cms-page" x-data="{ showLogout: false }">

  <form action="{{ route('peserta-submission.store') }}" method="POST" enctype="multipart/form-data" style="width:100%;max-width:980px;">
    @csrf

    <div class="cms-card">

      {{-- ── HEADER ── --}}
      <div class="cms-card-header">
        <div class="cms-header-left">
          <div class="cms-header-icon">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M12 2L2 7l10 5 10-5-10-5z"/>
              <path d="M2 17l10 5 10-5"/>
              <path d="M2 12l10 5 10-5"/>
            </svg>
          </div>
          <div>
            <div class="cms-header-title">CMS Peserta</div>
            <div class="cms-header-sub">Panel Submission Hackathon</div>
          </div>
        </div>

        <button type="button" class="cms-logout-btn" @click="showLogout = true">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
            <polyline points="16 17 21 12 16 7"/>
            <line x1="21" y1="12" x2="9" y2="12"/>
          </svg>
          Logout
        </button>
      </div>

      {{-- ── SUCCESS / ERROR ALERT ── --}}
      @if(session('success'))
        <div class="cms-alert cms-alert-success">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
            <polyline points="22 4 12 14.01 9 11.01"/>
          </svg>
          <span>{{ session('success') }}</span>
        </div>
      @endif

      @if($errors->any())
        <div class="cms-alert cms-alert-error">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="10"/>
            <line x1="12" y1="8" x2="12" y2="12"/>
            <line x1="12" y1="16" x2="12.01" y2="16"/>
          </svg>
          <div>
            <div style="font-weight:700;margin-bottom:.25rem;">Terdapat kesalahan pada form:</div>
            <ul>
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        </div>
      @endif

      {{-- ── INFO STRIP ── --}}
      <div class="cms-info-strip">
        <div class="cms-info-strip-head">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"/>
            <line x1="12" y1="16" x2="12" y2="12"/>
            <line x1="12" y1="8" x2="12.01" y2="8"/>
          </svg>
          Informasi Penting dari Panitia
        </div>
        <div class="cms-info-list">
          @forelse($infoItems as $item)
            <div class="cms-info-row">
              <div class="cms-info-dot"></div>
              <span>{{ $item->content }}</span>
            </div>
          @empty
            <p class="cms-info-empty">Belum ada informasi penting dari admin.</p>
          @endforelse
        </div>
      </div>

      {{-- ── SECTION 01: INFO TIM ── --}}
      <div class="cms-section">
        <div class="cms-section-head">
          <div class="cms-section-num">01</div>
          <div>
            <div class="cms-section-title">Informasi Tim</div>
            <div class="cms-section-sub">Nama tim, kategori, asal sekolah, dan kota</div>
          </div>
        </div>

        <div class="cms-grid-2">
          <div class="cms-field">
            <label class="cms-label">Nama Tim <span class="req">*</span></label>
            <input type="text" name="nama_tim" class="cms-input"
              value="{{ old('nama_tim') }}" placeholder="Masukkan nama tim" required>
          </div>

          <div class="cms-field">
            <label class="cms-label">Kategori <span class="req">*</span></label>
            <div class="cms-select-wrap">
              <select name="kategori" class="cms-input" required>
                <option value="">Pilih Kategori</option>
                @foreach(['PAUD','SD','SMP','SMA','SMK'] as $kat)
                  <option value="{{ $kat }}" {{ old('kategori') == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="cms-field">
            <label class="cms-label">Asal Sekolah <span class="req">*</span></label>
            <input type="text" name="asal_sekolah" class="cms-input"
              value="{{ old('asal_sekolah') }}" placeholder="Contoh: SMKN 1 Bandung" required>
          </div>

          <div class="cms-field">
            <label class="cms-label">Kota / Kabupaten <span class="req">*</span></label>
            <input type="text" name="kota_kabupaten" class="cms-input"
              value="{{ old('kota_kabupaten') }}" placeholder="Contoh: Kota Bandung" required>
          </div>
        </div>
      </div>

      {{-- ── SECTION 02: ANGGOTA ── --}}
      <div class="cms-section">
        <div class="cms-section-head">
          <div class="cms-section-num">02</div>
          <div>
            <div class="cms-section-title">Anggota Tim</div>
            <div class="cms-section-sub">Ketua tim wajib diisi, anggota 2 & 3 opsional</div>
          </div>
        </div>

        <div class="cms-grid-3">
          <div class="cms-field">
            <label class="cms-label">Ketua Tim <span class="req">*</span></label>
            <input type="text" name="anggota_1" class="cms-input"
              value="{{ old('anggota_1') }}" placeholder="Nama ketua tim" required>
          </div>

          <div class="cms-field">
            <label class="cms-label">Anggota 2</label>
            <input type="text" name="anggota_2" class="cms-input"
              value="{{ old('anggota_2') }}" placeholder="Nama anggota kedua">
          </div>

          <div class="cms-field">
            <label class="cms-label">Anggota 3</label>
            <input type="text" name="anggota_3" class="cms-input"
              value="{{ old('anggota_3') }}" placeholder="Nama anggota ketiga">
          </div>
        </div>
      </div>

      {{-- ── SECTION 03 + 04: UPLOAD (side by side) ── --}}
      <div class="cms-upload-grid">

        <div class="cms-section">
          <div class="cms-section-head">
            <div class="cms-section-num">03</div>
            <div>
              <div class="cms-section-title">Upload Proposal</div>
              <div class="cms-section-sub">Opsional · PDF, DOC, DOCX · Maks 5 MB</div>
            </div>
          </div>
          <div class="cms-file-box">
            <div class="cms-file-icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                <polyline points="14 2 14 8 20 8"/>
                <line x1="12" y1="18" x2="12" y2="12"/>
                <line x1="9" y1="15" x2="15" y2="15"/>
              </svg>
            </div>
            <div class="cms-field">
              <label class="cms-label">File Proposal</label>
              <input type="file" name="proposal_file" class="cms-input" accept=".pdf,.doc,.docx">
              <div class="cms-file-hint">PDF, DOC, DOCX · Maksimal 5 MB</div>
            </div>
          </div>
        </div>

        <div class="cms-section">
          <div class="cms-section-head">
            <div class="cms-section-num">04</div>
            <div>
              <div class="cms-section-title">Upload Karya</div>
              <div class="cms-section-sub">Opsional · PDF, ZIP, RAR, DOC, DOCX · Maks 10 MB</div>
            </div>
          </div>
          <div class="cms-file-box">
            <div class="cms-file-icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="16 16 12 12 8 16"/>
                <line x1="12" y1="12" x2="12" y2="21"/>
                <path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"/>
              </svg>
            </div>
            <div class="cms-field">
              <label class="cms-label">File Karya</label>
              <input type="file" name="karya_file" class="cms-input" accept=".pdf,.zip,.rar,.doc,.docx">
              <div class="cms-file-hint">PDF, ZIP, RAR, DOC, DOCX · Maksimal 10 MB</div>
            </div>
          </div>
        </div>

      </div>{{-- end upload-grid --}}

      {{-- ── FOOTER SUBMIT ── --}}
      <div class="cms-footer">
        <p class="cms-footer-note">
          Pastikan semua data sudah benar sebelum mengirim. Upload proposal & karya harus sesuai dengan syarat dan ketentuan.
        </p>
        <button type="submit" class="cms-submit-btn">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="22" y1="2" x2="11" y2="13"/>
            <polygon points="22 2 15 22 11 13 2 9 22 2"/>
          </svg>
          Kirim Submission
        </button>
      </div>

    </div>{{-- end cms-card --}}
  </form>

  {{-- HIDDEN LOGOUT FORM --}}
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
    @csrf
  </form>

  {{-- LOGOUT MODAL --}}
  <div class="cms-modal-backdrop" x-show="showLogout" x-transition x-cloak>
    <div class="cms-modal">
      <div class="cms-modal-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
          <polyline points="16 17 21 12 16 7"/>
          <line x1="21" y1="12" x2="9" y2="12"/>
        </svg>
      </div>
      <h3>Konfirmasi Logout</h3>
      <p>Apakah kamu yakin ingin keluar dari panel peserta? Pastikan data sudah tersimpan sebelum logout.</p>
      <div class="cms-modal-actions">
        <button type="button" class="cms-modal-cancel" @click="showLogout = false">Batal</button>
        <button type="button" class="cms-modal-confirm" @click="document.getElementById('logout-form').submit()">Ya, Logout</button>
      </div>
    </div>
  </div>

</div>

@endsection