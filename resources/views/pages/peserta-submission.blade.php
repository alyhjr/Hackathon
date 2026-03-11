@extends('layouts.app')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>
  :root {
    --f-blue:         #1565C0;
    --f-blue-mid:     #1976D2;
    --f-blue-light:   #E3F0FF;
    --f-blue-soft:    #F0F6FF;
    --f-green:        #16a34a;
    --f-green-light:  #dcfce7;
    --f-green-mid:    #bbf7d0;
    --f-red:          #dc2626;
    --f-red-light:    #fef2f2;
    --f-red-mid:      #fecaca;
    --f-text:         #0f172a;
    --f-text-2:       #334155;
    --f-text-3:       #64748b;
    --f-text-4:       #94a3b8;
    --f-border:       #e2e8f0;
    --f-border-focus: #1976D2;
    --f-bg:           #ffffff;
    --f-bg-2:         #f8fafc;
    --f-font:         'Plus Jakarta Sans', sans-serif;
    --f-radius:       14px;
    --f-shadow:       0 1px 3px rgba(15,23,42,0.07), 0 8px 24px rgba(15,23,42,0.06);
  }

  .pf-page * { box-sizing: border-box; }

  .pf-page {
    font-family: var(--f-font);
    max-width: 680px;
    margin: 0 auto;
    padding: 3rem 1.25rem 5rem;
    animation: pf-in 0.45s cubic-bezier(.22,1,.36,1) both;
  }

  @keyframes pf-in {
    from { opacity: 0; transform: translateY(12px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  /* ── Page Header ── */
  .pf-page-header {
    margin-bottom: 2rem;
  }

  .pf-eyebrow {
    font-size: 0.68rem;
    font-weight: 700;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: var(--f-blue);
    margin-bottom: 0.4rem;
  }

  .pf-page-title {
    font-size: 1.75rem;
    font-weight: 800;
    color: var(--f-text);
    letter-spacing: -0.03em;
    line-height: 1.2;
    margin: 0 0 0.4rem;
  }

  .pf-page-desc {
    font-size: 0.83rem;
    color: var(--f-text-3);
    font-weight: 400;
    margin: 0;
  }

  /* ── Alerts ── */
  .pf-alert {
    display: flex;
    align-items: flex-start;
    gap: 0.65rem;
    border-radius: 10px;
    padding: 0.85rem 1rem;
    font-size: 0.82rem;
    font-weight: 500;
    margin-bottom: 1.25rem;
    animation: pf-in 0.3s ease both;
  }

  .pf-alert svg { width: 16px; height: 16px; flex-shrink: 0; margin-top: 1px; }

  .pf-alert-success {
    background: var(--f-green-light);
    border: 1px solid var(--f-green-mid);
    color: #166534;
  }

  .pf-alert-error {
    background: var(--f-red-light);
    border: 1px solid var(--f-red-mid);
    color: var(--f-red);
  }

  .pf-alert-error ul {
    margin: 0.35rem 0 0;
    padding-left: 1.1rem;
    font-weight: 400;
    line-height: 1.7;
  }

  /* ── Form Card ── */
  .pf-card {
    background: var(--f-bg);
    border: 1px solid var(--f-border);
    border-radius: 20px;
    padding: 2rem;
    box-shadow: var(--f-shadow);
  }

  /* ── Section divider ── */
  .pf-section {
    margin-bottom: 1.75rem;
  }

  .pf-section-label {
    font-size: 0.65rem;
    font-weight: 700;
    letter-spacing: 0.14em;
    text-transform: uppercase;
    color: var(--f-text-4);
    padding-bottom: 0.75rem;
    border-bottom: 1px solid var(--f-border);
    margin-bottom: 1.25rem;
  }

  .pf-fields { display: flex; flex-direction: column; gap: 1.1rem; }

  /* ── Field ── */
  .pf-field {}

  .pf-label {
    display: flex;
    align-items: center;
    gap: 0.3rem;
    font-size: 0.8rem;
    font-weight: 600;
    color: var(--f-text-2);
    margin-bottom: 0.45rem;
  }

  .pf-required {
    color: var(--f-blue);
    font-size: 0.85rem;
    line-height: 1;
  }

  .pf-optional {
    font-size: 0.68rem;
    font-weight: 500;
    color: var(--f-text-4);
    background: var(--f-bg-2);
    border: 1px solid var(--f-border);
    border-radius: 99px;
    padding: 0.1rem 0.5rem;
    letter-spacing: 0.03em;
  }

  /* ── Text input ── */
  .pf-input {
    width: 100%;
    border: 1px solid var(--f-border);
    border-radius: 10px;
    padding: 0.7rem 0.95rem;
    font-family: var(--f-font);
    font-size: 0.85rem;
    font-weight: 400;
    color: var(--f-text);
    background: var(--f-bg);
    outline: none;
    transition: border-color 0.18s, box-shadow 0.18s, background 0.18s;
    -webkit-appearance: none;
  }

  .pf-input::placeholder { color: var(--f-text-4); }

  .pf-input:hover { border-color: #c0cfe0; }

  .pf-input:focus {
    border-color: var(--f-border-focus);
    box-shadow: 0 0 0 3px rgba(25,118,210,0.12);
    background: var(--f-blue-soft);
  }

  /* ── File input wrapper ── */
  .pf-file-wrap {
    position: relative;
  }

  .pf-file-input {
    position: absolute;
    inset: 0;
    opacity: 0;
    cursor: pointer;
    width: 100%;
    height: 100%;
    z-index: 2;
  }

  .pf-file-ui {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    border: 1.5px dashed var(--f-border);
    border-radius: 10px;
    padding: 0.85rem 1rem;
    background: var(--f-bg-2);
    transition: border-color 0.18s, background 0.18s;
    cursor: pointer;
  }

  .pf-file-wrap:hover .pf-file-ui,
  .pf-file-wrap:focus-within .pf-file-ui {
    border-color: var(--f-blue-mid);
    background: var(--f-blue-soft);
  }

  .pf-file-icon {
    width: 34px; height: 34px;
    border-radius: 8px;
    background: var(--f-blue-light);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
  }

  .pf-file-icon svg { width: 16px; height: 16px; color: var(--f-blue); }

  .pf-file-text {}

  .pf-file-cta {
    font-size: 0.8rem;
    font-weight: 600;
    color: var(--f-blue);
  }

  .pf-file-hint {
    font-size: 0.72rem;
    color: var(--f-text-4);
    margin-top: 0.1rem;
  }

  /* ── File preview ── */
  .pf-file-preview {
    display: none;
    align-items: center;
    gap: 0.75rem;
    margin-top: 0.6rem;
    padding: 0.7rem 0.9rem;
    background: var(--f-green-light);
    border: 1px solid var(--f-green-mid);
    border-radius: 10px;
    animation: pf-preview-in 0.25s cubic-bezier(.22,1,.36,1) both;
  }

  .pf-file-preview.visible { display: flex; }

  @keyframes pf-preview-in {
    from { opacity: 0; transform: translateY(-4px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  .pf-preview-icon {
    width: 32px; height: 32px;
    border-radius: 7px;
    background: #fff;
    border: 1px solid var(--f-green-mid);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
  }

  .pf-preview-icon svg { width: 15px; height: 15px; color: var(--f-green); }

  .pf-preview-info { flex: 1; min-width: 0; }

  .pf-preview-name {
    font-size: 0.8rem;
    font-weight: 600;
    color: #166534;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 340px;
  }

  .pf-preview-meta {
    font-size: 0.7rem;
    color: #4ade80;
    color: #22863a;
    margin-top: 0.1rem;
    font-weight: 400;
  }

  .pf-preview-check {
    width: 20px; height: 20px;
    border-radius: 50%;
    background: var(--f-green);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
  }

  .pf-preview-check svg { width: 11px; height: 11px; color: #fff; }

  .pf-preview-remove {
    background: none;
    border: none;
    cursor: pointer;
    padding: 0.2rem;
    color: #4a7c59;
    border-radius: 5px;
    display: flex; align-items: center;
    transition: color 0.15s, background 0.15s;
    flex-shrink: 0;
  }

  .pf-preview-remove:hover { color: var(--f-red); background: var(--f-red-light); }
  .pf-preview-remove svg { width: 14px; height: 14px; }

  /* when file selected — restyle the drop zone */
  .pf-file-wrap.has-file .pf-file-ui {
    border-color: var(--f-green);
    border-style: solid;
    background: #f0fdf4;
  }

  .pf-file-wrap.has-file .pf-file-icon {
    background: var(--f-green-light);
  }

  .pf-file-wrap.has-file .pf-file-icon svg { color: var(--f-green); }
  .pf-file-wrap.has-file .pf-file-cta { color: var(--f-green); }

  /* ── Divider ── */
  .pf-divider {
    border: none;
    border-top: 1px solid var(--f-border);
    margin: 1.75rem 0;
  }

  /* ── Submit ── */
  .pf-submit-row {
    display: flex;
    align-items: center;
    gap: 1rem;
    flex-wrap: wrap;
  }

  .pf-submit-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.7rem 1.75rem;
    border-radius: 99px;
    background: var(--f-blue);
    color: #fff;
    font-family: var(--f-font);
    font-size: 0.85rem;
    font-weight: 700;
    letter-spacing: 0.01em;
    border: none;
    cursor: pointer;
    transition: background 0.2s, box-shadow 0.2s, transform 0.15s;
    box-shadow: 0 2px 10px rgba(21,101,192,0.25);
  }

  .pf-submit-btn:hover {
    background: var(--f-blue-mid);
    box-shadow: 0 4px 18px rgba(21,101,192,0.35);
    transform: translateY(-1px);
  }

  .pf-submit-btn svg { width: 15px; height: 15px; }

  .pf-submit-note {
    font-size: 0.75rem;
    color: var(--f-text-4);
    font-weight: 400;
  }
</style>

<div class="pf-page">

  {{-- Page Header --}}
  <div class="pf-page-header">
    <p class="pf-eyebrow">Kompetisi</p>
    <h1 class="pf-page-title">Form Submission Peserta</h1>
    <p class="pf-page-desc">Isi data tim dan upload berkas submission kamu di bawah ini.</p>
  </div>

  {{-- Success Alert --}}
  @if(session('success'))
    <div class="pf-alert pf-alert-success">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>
      </svg>
      <span>{{ session('success') }}</span>
    </div>
  @endif

  {{-- Error Alert --}}
  @if($errors->any())
    <div class="pf-alert pf-alert-error">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
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

  {{-- Form Card --}}
  <form action="{{ route('peserta-submission.store') }}" method="POST" enctype="multipart/form-data" class="pf-card">
    @csrf

    {{-- Section: Data Tim --}}
    <div class="pf-section">
      <div class="pf-section-label">Data Tim</div>
      <div class="pf-fields">

        <div class="pf-field">
          <label class="pf-label">
            Nama Tim <span class="pf-required">*</span>
          </label>
          <input type="text" name="nama_tim" value="{{ old('nama_tim') }}"
                 placeholder="Masukkan nama tim" class="pf-input" required>
        </div>

        <div class="pf-field">
          <label class="pf-label">
            Nama Anggota 1 <span class="pf-required">*</span>
          </label>
          <input type="text" name="anggota_1" value="{{ old('anggota_1') }}"
                 placeholder="Nama lengkap anggota pertama" class="pf-input" required>
        </div>

        <div class="pf-field">
          <label class="pf-label">
            Nama Anggota 2 <span class="pf-optional">Opsional</span>
          </label>
          <input type="text" name="anggota_2" value="{{ old('anggota_2') }}"
                 placeholder="Nama lengkap anggota kedua" class="pf-input">
        </div>

        <div class="pf-field">
          <label class="pf-label">
            Nama Anggota 3 <span class="pf-optional">Opsional</span>
          </label>
          <input type="text" name="anggota_3" value="{{ old('anggota_3') }}"
                 placeholder="Nama lengkap anggota ketiga" class="pf-input">
        </div>

      </div>
    </div>

    <hr class="pf-divider">

    {{-- Section: Upload Berkas --}}
    <div class="pf-section">
      <div class="pf-section-label">Upload Berkas</div>
      <div class="pf-fields">

        <div class="pf-field">
          <label class="pf-label">Upload Proposal</label>
          <div class="pf-file-wrap" id="wrap-proposal">
            <input type="file" name="proposal_file" class="pf-file-input"
                   id="input-proposal" onchange="pfPreview(this, 'wrap-proposal', 'preview-proposal')">
            <div class="pf-file-ui">
              <div class="pf-file-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                  <polyline points="14 2 14 8 20 8"/>
                </svg>
              </div>
              <div class="pf-file-text">
                <div class="pf-file-cta">Pilih file atau seret ke sini</div>
                <div class="pf-file-hint">PDF, DOC, DOCX — Maks. 5 MB</div>
              </div>
            </div>
          </div>
          {{-- Preview --}}
          <div class="pf-file-preview" id="preview-proposal">
            <div class="pf-preview-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                <polyline points="14 2 14 8 20 8"/>
              </svg>
            </div>
            <div class="pf-preview-info">
              <div class="pf-preview-name" id="preview-proposal-name">—</div>
              <div class="pf-preview-meta" id="preview-proposal-meta">—</div>
            </div>
            <div class="pf-preview-check">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12"/>
              </svg>
            </div>
            <button type="button" class="pf-preview-remove"
                    onclick="pfRemove('input-proposal', 'wrap-proposal', 'preview-proposal')" title="Hapus file">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
              </svg>
            </button>
          </div>
        </div>

        <div class="pf-field">
          <label class="pf-label">Upload Karya</label>
          <div class="pf-file-wrap" id="wrap-karya">
            <input type="file" name="karya_file" class="pf-file-input"
                   id="input-karya" onchange="pfPreview(this, 'wrap-karya', 'preview-karya')">
            <div class="pf-file-ui">
              <div class="pf-file-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <polygon points="12 2 2 7 12 12 22 7 12 2"/>
                  <polyline points="2 17 12 22 22 17"/>
                  <polyline points="2 12 12 17 22 12"/>
                </svg>
              </div>
              <div class="pf-file-text">
                <div class="pf-file-cta">Pilih file atau seret ke sini</div>
                <div class="pf-file-hint">PDF, ZIP, RAR, DOC, DOCX — Maks. 10 MB</div>
              </div>
            </div>
          </div>
          {{-- Preview --}}
          <div class="pf-file-preview" id="preview-karya">
            <div class="pf-preview-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polygon points="12 2 2 7 12 12 22 7 12 2"/>
                <polyline points="2 17 12 22 22 17"/>
                <polyline points="2 12 12 17 22 12"/>
              </svg>
            </div>
            <div class="pf-preview-info">
              <div class="pf-preview-name" id="preview-karya-name">—</div>
              <div class="pf-preview-meta" id="preview-karya-meta">—</div>
            </div>
            <div class="pf-preview-check">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12"/>
              </svg>
            </div>
            <button type="button" class="pf-preview-remove"
                    onclick="pfRemove('input-karya', 'wrap-karya', 'preview-karya')" title="Hapus file">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
              </svg>
            </button>
          </div>
        </div>

      </div>
    </div>

    <hr class="pf-divider">

    {{-- Submit --}}
    <div class="pf-submit-row">
      <button type="submit" class="pf-submit-btn">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
          <line x1="22" y1="2" x2="11" y2="13"/>
          <polygon points="22 2 15 22 11 13 2 9 22 2"/>
        </svg>
        Kirim Submission
      </button>
      <span class="pf-submit-note">Pastikan semua data sudah benar sebelum mengirim.</span>
    </div>

  </form>
</div>

@endsection

<script>
  function pfFormatSize(bytes) {
    if (bytes < 1024) return bytes + ' B';
    if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + ' KB';
    return (bytes / (1024 * 1024)).toFixed(2) + ' MB';
  }

  function pfPreview(input, wrapId, previewId) {
    const wrap    = document.getElementById(wrapId);
    const preview = document.getElementById(previewId);
    const file    = input.files[0];

    if (!file) {
      pfRemove(input.id, wrapId, previewId);
      return;
    }

    document.getElementById(previewId + '-name').textContent = file.name;
    document.getElementById(previewId + '-meta').textContent =
      pfFormatSize(file.size) + '  ·  ' + (file.name.split('.').pop().toUpperCase());

    preview.classList.add('visible');
    wrap.classList.add('has-file');
  }

  function pfRemove(inputId, wrapId, previewId) {
    const input   = document.getElementById(inputId);
    const wrap    = document.getElementById(wrapId);
    const preview = document.getElementById(previewId);

    input.value = '';
    preview.classList.remove('visible');
    wrap.classList.remove('has-file');
  }
</script>