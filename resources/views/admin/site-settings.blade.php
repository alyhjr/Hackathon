@extends('layouts.admin')

@section('title','CMS - Site Settings')

@section('content')
<style>
  [x-cloak] { display: none !important; }

  .tab-content { animation: fadeUp 0.18s ease both; }
  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(6px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  .field-label {
    display: block;
    font-size: 0.75rem;
    font-weight: 700;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    color: #64748b;
    margin-bottom: 0.35rem;
  }
  .field-input {
    width: 100%;
    border: 1.5px solid #e2e8f0;
    border-radius: 0.75rem;
    padding: 0.65rem 1rem;
    font-size: 0.925rem;
    color: #0f172a;
    background: #fff;
    transition: border-color 0.15s, box-shadow 0.15s;
    outline: none;
  }
  .field-input:focus {
    border-color: #0072BC;
    box-shadow: 0 0 0 3px rgba(0,114,188,0.12);
  }
  textarea.field-input { resize: vertical; }

  .btn-primary {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.4rem;
    padding: 0.6rem 1.5rem;
    border-radius: 0.65rem;
    background: #0072BC;
    color: #fff;
    font-weight: 700;
    font-size: 0.875rem;
    border: none;
    cursor: pointer;
    transition: background 0.15s, box-shadow 0.15s;
  }
  .btn-primary:hover { background: #005fa3; box-shadow: 0 4px 12px rgba(0,114,188,0.25); }

  .btn-ghost {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.4rem;
    padding: 0.6rem 1.5rem;
    border-radius: 0.65rem;
    background: #f8fafc;
    color: #334155;
    font-weight: 700;
    font-size: 0.875rem;
    border: 1.5px solid #e2e8f0;
    cursor: pointer;
    transition: background 0.15s;
  }
  .btn-ghost:hover { background: #f1f5f9; }

  .btn-danger {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.45rem 0.9rem;
    border-radius: 0.55rem;
    background: #fff0f0;
    color: #dc2626;
    font-weight: 700;
    font-size: 0.8rem;
    border: 1.5px solid #fecaca;
    cursor: pointer;
    transition: background 0.15s;
  }
  .btn-danger:hover { background: #fee2e2; }

  .btn-edit {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.45rem 0.9rem;
    border-radius: 0.55rem;
    background: #0f172a;
    color: #fff;
    font-weight: 700;
    font-size: 0.8rem;
    border: none;
    cursor: pointer;
    transition: background 0.15s;
  }
  .btn-edit:hover { background: #1e293b; }

  .card {
    background: #fff;
    border: 1.5px solid #e2e8f0;
    border-radius: 1.1rem;
    padding: 1.75rem;
  }
  .card-title {
    font-size: 1.1rem;
    font-weight: 800;
    color: #0f172a;
    letter-spacing: -0.01em;
  }
  .card-sub {
    font-size: 0.83rem;
    color: #64748b;
    margin-top: 0.2rem;
  }

  .section-divider {
    border: none;
    border-top: 1.5px solid #f1f5f9;
    margin: 1.5rem 0;
  }

  .badge {
    display: inline-flex;
    align-items: center;
    padding: 0.2rem 0.65rem;
    border-radius: 99px;
    font-size: 0.72rem;
    font-weight: 700;
  }
  .badge-active   { background: #dcfce7; color: #15803d; }
  .badge-inactive { background: #f1f5f9; color: #64748b; }
  .badge-count    { background: #eff6ff; color: #1d4ed8; }
</style>

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-10">

{{-- ===== PAGE HEADER (PREMIUM + ACCOUNT PANEL) ===== --}}
<div class="mb-5" x-data="{ openProfile: false }">

  <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 
              bg-white border border-slate-200 rounded-2xl px-6 py-5 shadow-sm">

    {{-- LEFT --}}
    <div class="flex items-center gap-4">

      

      {{-- TEXT --}}
      <div>
        <div class="text-[10px] font-semibold tracking-widest uppercase text-slate-800 mb-1">
          Admin Panel
        </div>

        <h1 class="text-xl font-bold text-slate-900">
          CMS Informasi Website
        </h1>

        <p class="text-sm text-slate-500">
          Kelola konten website & data peserta
        </p>
      </div>

    </div>

    {{-- RIGHT (ACCOUNT - ULTRA CLEAN) --}}
<div class="relative" @click.away="openProfile=false">

  {{-- BUTTON --}}
  <button @click="openProfile = !openProfile"
    class="flex items-center justify-center w-10 h-10 rounded-full
           hover:bg-slate-100/70 transition-all duration-200">

    {{-- AVATAR --}}
    <div class="w-9 h-9 rounded-full 
                bg-gradient-to-br from-slate-400 to-slate-600 
                flex items-center justify-center 
                text-white text-sm font-medium">
      A
    </div>

  </button>


  {{-- DROPDOWN --}}
  <div x-show="openProfile"
       x-transition:enter="transition ease-out duration-200"
       x-transition:enter-start="opacity-0 translate-y-2 scale-95"
       x-transition:enter-end="opacity-100 translate-y-0 scale-100"
       x-transition:leave="transition ease-in duration-150"
       x-transition:leave-start="opacity-100"
       x-transition:leave-end="opacity-0 translate-y-1"

    class="absolute right-0 mt-3 w-52 
           bg-white/90 backdrop-blur-xl
           border border-slate-200/50
           rounded-xl shadow-lg
           overflow-hidden z-50">

    <div class="p-2">

      <a href="#"
        class="block px-3 py-2 rounded-lg text-sm text-slate-600
               hover:bg-slate-100/70 transition">
        Edit Profil
      </a>

      <a href="#"
        class="block px-3 py-2 rounded-lg text-sm text-slate-600
               hover:bg-slate-100/70 transition">
        Ganti Password
      </a>

      <a href="#"
        class="block px-3 py-2 rounded-lg text-sm text-slate-600
               hover:bg-slate-100/70 transition">
        Ganti Email
      </a>

    </div>

    <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit"
        class="w-full text-left px-3 py-2 rounded-lg text-sm text-red-500 hover:bg-red-50 transition">
        Logout
    </button>
</form>

  </div>

</div>

  </div>

  {{-- SUCCESS --}}
  @if(session('success'))
    <div class="mt-3 flex items-center gap-2 rounded-xl border border-emerald-200 
                bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
      {{ session('success') }}
    </div>
  @endif

  {{-- ERROR --}}
  @if($errors->any())
    <div class="mt-3 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-600">
      <div class="font-semibold mb-1">Ada error:</div>
      <ul class="list-disc pl-5 space-y-0.5">
        @foreach($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  @endif

</div>


  {{-- ===== MAIN LAYOUT ===== --}}
  <div class="mt-8 grid grid-cols-1 lg:grid-cols-12 gap-6"
       x-data="{ tab: (localStorage.getItem('cms_tab') || 'hero') }"
       x-init="$watch('tab', v => localStorage.setItem('cms_tab', v))">

    {{-- ===== SIDEBAR ===== --}}
<aside class="lg:col-span-3">
  <div class="sticky top-6">
    <div class="rounded-xl border border-slate-200 bg-white shadow-sm overflow-hidden">

     

      @php
        $menu = [
          [
            'title' => 'Peserta',
            'items' => [
              [
                'key'=>'kelola-registrasi',
                'label'=>'Kelola Registrasi',
                'desc'=>'Aksi lolos/tidak lolos peserta'
              ],
              [
                'key'=>'peserta-submission',
                'label'=>'Kelola Peserta',
                'desc'=>'Nama Tim, Anggota & Submission'
              ],
            ]
          ],
          [
            'title' => 'Konten Website',
            'items' => [
              [
                'key'=>'hero',
                'label'=>'Beranda – Hero',
                'desc'=>'Judul, subtitle, tombol'
              ],
              [
                'key'=>'homeimg',
                'label'=>'Beranda – Gambar',
                'desc'=>'3 gambar beranda'
              ],
              [
                'key'=>'informasi-penting',
                'label'=>'Informasi Penting',
                'desc'=>'Highlight info utama'
              ],
              [
                'key'=>'lomba',
                'label'=>'Lomba',
                'desc'=>'Ketentuan & tahapan'
              ],
              [
                'key'=>'pengumuman',
                'label'=>'Pengumuman',
                'desc'=>'Hasil & info lomba'
              ],
              [
                'key'=>'timeline',
                'label'=>'Timeline',
                'desc'=>'Tahapan kegiatan'
              ],
              [
                'key'=>'faq',
                'label'=>'FAQ',
                'desc'=>'Pertanyaan umum'
              ],
              [
                'key'=>'youtube',
                'label'=>'Beranda – YouTube',
                'desc'=>'Embed video'
              ],
            ]
          ]
        ];
      @endphp

      {{-- NAV --}}
      <nav class="p-2 space-y-3">

        @foreach($menu as $section)

          {{-- SECTION TITLE --}}
          <div class="px-3 pt-2">
            <div class="text-[10px] font-black tracking-widest text-slate-400 uppercase">
              {{ $section['title'] }}
            </div>
          </div>

          {{-- MENU ITEMS --}}
          <div class="space-y-0.5">
            @foreach($section['items'] as $t)
              <button type="button"
                class="w-full text-left rounded-lg px-3 py-2.5 transition-all group"
                :class="tab === '{{ $t['key'] }}'
                  ? 'bg-[#0072BC] text-white shadow-sm'
                  : 'text-slate-700 hover:bg-slate-50'"
                @click="tab='{{ $t['key'] }}'">

                <div>
                  <div class="text-sm font-bold leading-tight">
                    {{ $t['label'] }}
                  </div>

                  <div class="text-[11px] mt-0.5 leading-tight"
                    :class="tab === '{{ $t['key'] }}'
                      ? 'text-white/70'
                      : 'text-slate-400'">
                    {{ $t['desc'] }}
                  </div>
                </div>

              </button>
            @endforeach
          </div>

        @endforeach

      </nav>

    </div>
  </div>
</aside>


    {{-- ===== CONTENT AREA ===== --}}
    <section class="lg:col-span-9 space-y-5">

      {{-- ===========================
          TAB: HERO
      ============================ --}}
      <div x-show="tab==='hero'" x-cloak class="tab-content">
        <div class="card">
          <div class="card-title">Beranda – Hero</div>
          <div class="card-sub">Edit teks utama, tombol registrasi, dan gambar hero di halaman beranda.</div>

          <hr class="section-divider">

          <form method="POST" action="{{ route('admin.site-settings.update') }}" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
              <label class="field-label">Hero Title</label>
              <textarea name="hero_title" rows="2" class="field-input"
                placeholder="Contoh: HACKATHON RUMAH PENDIDIKAN 2026">{{ old('hero_title', $setting->hero_title) }}</textarea>
              <p class="text-xs text-slate-400 mt-1">Tips: gunakan Enter untuk baris baru.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label class="field-label">Hero Subtitle</label>
                <input type="text" name="hero_subtitle" class="field-input"
                  value="{{ old('hero_subtitle', $setting->hero_subtitle) }}" placeholder="Subtitle singkat">
              </div>
              <div>
                <label class="field-label">Hero Tagline</label>
                <input type="text" name="hero_tagline" class="field-input"
                  value="{{ old('hero_tagline', $setting->hero_tagline) }}" placeholder="Tagline pendek">
              </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label class="field-label">Teks Tombol</label>
                <input type="text" name="primary_button_text" class="field-input"
                  value="{{ old('primary_button_text', $setting->primary_button_text) }}" placeholder="Daftar Sekarang">
              </div>
              <div>
                <label class="field-label">URL Tombol</label>
                <input type="text" name="primary_button_url" class="field-input"
                  value="{{ old('primary_button_url', $setting->primary_button_url) }}" placeholder="/registrasi">
              </div>
            </div>

            <hr class="section-divider">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
              <div>
                <label class="field-label">Upload Gambar Hero</label>
                <label class="mt-1 flex flex-col items-center justify-center gap-2 w-full border-2 border-dashed border-slate-200 rounded-xl px-4 py-6 cursor-pointer hover:border-[#0072BC] hover:bg-blue-50/30 transition-colors text-center">
                  <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/></svg>
                  <span class="text-sm text-slate-500">Klik untuk pilih gambar</span>
                  <span class="text-xs text-slate-400">JPG · PNG · WEBP</span>
                  <input type="file" name="hero_image" id="hero_image" class="hidden" accept="image/*">
                </label>
              </div>
              <div>
                <div class="field-label">Preview</div>
                @php
                  $heroPreview = $setting->hero_image
                    ? asset('storage/'.$setting->hero_image)
                    : asset('image/header/sekolah.jpg');
                @endphp
                <img id="hero_preview" src="{{ $heroPreview }}"
                     class="w-full h-[160px] object-cover rounded-xl border border-slate-200">
              </div>
            </div>

            <div class="pt-1">
              <button type="submit" class="btn-primary">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Simpan Hero
              </button>
            </div>
          </form>
        </div>
      </div>


{{-- ===========================
    TAB: KELOLA REGISTRASI
============================ --}}
<div x-show="tab==='kelola-registrasi'" x-cloak class="tab-content">
  <div class="card">
    <div class="card-title">Kelola Registrasi Peserta</div>
    <div class="card-sub">Tentukan status lolos atau tidak lolos untuk setiap peserta yang mendaftar.</div>

    <hr class="section-divider">

    @if(session('success'))
      <div class="flex items-center gap-2 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-800 text-sm font-semibold mb-4">
        <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
        {{ session('success') }}
      </div>
    @endif

    <div class="overflow-x-auto">
      <table class="w-full text-sm" style="border-collapse:collapse;min-width:600px;">
        <thead>
          <tr style="background:#f8fafc;border-bottom:1.5px solid #e2e8f0;">
            <th class="text-left px-4 py-3 text-xs font-bold text-slate-400 uppercase tracking-wider">Nama</th>
            <th class="text-left px-4 py-3 text-xs font-bold text-slate-400 uppercase tracking-wider">Sekolah</th>
            <th class="text-left px-4 py-3 text-xs font-bold text-slate-400 uppercase tracking-wider">Email</th>
            <th class="text-left px-4 py-3 text-xs font-bold text-slate-400 uppercase tracking-wider">Tgl Daftar</th>
            <th class="text-left px-4 py-3 text-xs font-bold text-slate-400 uppercase tracking-wider">Status</th>
            <th class="text-left px-4 py-3 text-xs font-bold text-slate-400 uppercase tracking-wider">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($pesertaRegistrasi ?? collect() as $p)
            <tr style="border-bottom:1px solid #f1f5f9;" class="hover:bg-slate-50 transition">
              <td class="px-4 py-3 font-semibold text-slate-800">{{ $p->nama }}</td>
              <td class="px-4 py-3 text-slate-600">{{ $p->sekolah }}</td>
              <td class="px-4 py-3 text-slate-600">{{ $p->email }}</td>
              <td class="px-4 py-3 text-slate-500 text-xs">{{ $p->created_at?->format('d M Y') }}</td>
              <td class="px-4 py-3">
                @if($p->status === 'pending')
                  <span class="badge" style="background:#fef9c3;color:#854d0e;">Pending</span>
                @elseif($p->status === 'lolos')
                  <span class="badge badge-active">Lolos</span>
                @else
                  <span class="badge" style="background:#fee2e2;color:#991b1b;">Tidak Lolos</span>
                @endif
              </td>
              <td class="px-4 py-3">
                <form method="POST" action="{{ route('admin.peserta-registrasi.status', $p->id) }}" class="flex gap-2">
                  @csrf
                  @method('POST')
                  <select name="status" class="field-input" style="width:auto;padding:0.35rem 0.75rem;font-size:0.78rem;">
                    <option value="pending" {{ $p->status === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="lolos" {{ $p->status === 'lolos' ? 'selected' : '' }}>Lolos</option>
                    <option value="tidak_lolos" {{ $p->status === 'tidak_lolos' ? 'selected' : '' }}>Tidak Lolos</option>
                  </select>
                  <button type="submit" class="btn-primary" style="padding:0.35rem 0.9rem;font-size:0.78rem;">
                    Simpan
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="px-4 py-12 text-center">
                <div class="text-slate-400 text-sm">Belum ada peserta yang mendaftar.</div>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

  </div>
</div>

{{-- ===========================
    TAB: PESERTA SUBMISSION
    Design: Premium Clean — selaras tema biru/hijau existing
============================ --}}

@once
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>
  :root {
    --ps-blue:        #1565C0;
    --ps-blue-mid:    #1976D2;
    --ps-blue-light:  #E3F0FF;
    --ps-blue-soft:   #EEF5FF;
    --ps-green:       #16a34a;
    --ps-green-light: #dcfce7;
    --ps-green-mid:   #bbf7d0;
    --ps-text:        #0f172a;
    --ps-text-2:      #334155;
    --ps-text-3:      #64748b;
    --ps-text-4:      #94a3b8;
    --ps-border:      #e2e8f0;
    --ps-border-2:    #f1f5f9;
    --ps-bg:          #ffffff;
    --ps-bg-2:        #f8fafc;
    --ps-red:         #dc2626;
    --ps-red-light:   #fef2f2;
    --ps-red-mid:     #fecaca;
    --ps-shadow:      0 1px 3px rgba(15,23,42,0.08), 0 4px 16px rgba(15,23,42,0.06);
    --ps-shadow-md:   0 4px 24px rgba(15,23,42,0.10), 0 1px 4px rgba(15,23,42,0.06);
    --ps-font:        'Plus Jakarta Sans', sans-serif;
    --ps-radius:      16px;
    --ps-radius-sm:   10px;
  }

  .ps-wrap * { box-sizing: border-box; }

  .ps-wrap {
    font-family: var(--ps-font);
    background: var(--ps-bg);
    border: 1px solid var(--ps-border);
    border-radius: var(--ps-radius);
    padding: 2rem 2rem 2.25rem;
    box-shadow: var(--ps-shadow);
    animation: ps-in 0.45s cubic-bezier(.22,1,.36,1) both;
  }

  @keyframes ps-in {
    from { opacity: 0; transform: translateY(10px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  /* ── Header ── */
  .ps-header {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid var(--ps-border);
    margin-bottom: 1.5rem;
  }

  @media (min-width: 640px) {
    .ps-header { flex-direction: row; align-items: center; justify-content: space-between; }
  }

  .ps-title {
    font-size: 1.35rem;
    font-weight: 800;
    color: var(--ps-text);
    margin: 0 0 0.2rem;
    letter-spacing: -0.025em;
    line-height: 1.2;
  }

  .ps-subtitle {
    font-size: 0.82rem;
    color: var(--ps-text-3);
    margin: 0;
    font-weight: 400;
  }

  /* ── Export Button ── */
  .ps-export-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.45rem;
    padding: 0.6rem 1.3rem;
    border-radius: 99px;
    background: var(--ps-green);
    color: #fff;
    font-family: var(--ps-font);
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 0.01em;
    text-decoration: none;
    border: none;
    cursor: pointer;
    white-space: nowrap;
    transition: background 0.2s, box-shadow 0.2s, transform 0.15s;
    box-shadow: 0 2px 10px rgba(22,163,74,0.25);
  }

  .ps-export-btn:hover {
    background: #15803d;
    box-shadow: 0 4px 18px rgba(22,163,74,0.35);
    transform: translateY(-1px);
  }

  .ps-export-btn svg { width: 14px; height: 14px; flex-shrink: 0; }

  /* ── Alert ── */
  .ps-alert {
    display: flex;
    align-items: center;
    gap: 0.6rem;
    background: var(--ps-green-light);
    border: 1px solid var(--ps-green-mid);
    border-radius: var(--ps-radius-sm);
    padding: 0.7rem 1rem;
    color: #166534;
    font-size: 0.82rem;
    font-weight: 500;
    margin-bottom: 1.25rem;
    animation: ps-in 0.35s ease both;
  }

  .ps-alert svg { width: 15px; height: 15px; flex-shrink: 0; }

  /* ── Stats ── */
  .ps-stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 0.75rem;
    margin-bottom: 1.5rem;
  }

  @media (max-width: 640px) {
    .ps-stats { grid-template-columns: repeat(2, 1fr); }
  }

  .ps-stat {
    background: var(--ps-bg-2);
    border: 1px solid var(--ps-border);
    border-radius: var(--ps-radius-sm);
    padding: 1rem 1.1rem;
    position: relative;
    overflow: hidden;
    transition: box-shadow 0.2s, transform 0.2s;
  }

  .ps-stat:hover {
    box-shadow: var(--ps-shadow-md);
    transform: translateY(-2px);
  }

  .ps-stat::after {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--ps-blue-mid), var(--ps-blue));
    border-radius: 99px 99px 0 0;
    opacity: 0;
    transition: opacity 0.2s;
  }

  .ps-stat:hover::after { opacity: 1; }

  .ps-stat-num {
    font-size: 1.75rem;
    font-weight: 800;
    color: var(--ps-blue);
    line-height: 1;
    letter-spacing: -0.03em;
  }

  .ps-stat-label {
    font-size: 0.7rem;
    font-weight: 600;
    color: var(--ps-text-3);
    letter-spacing: 0.05em;
    text-transform: uppercase;
    margin-top: 0.3rem;
  }

  /* ── Table Wrapper ── */
  .ps-table-wrap {
    border: 1px solid var(--ps-border);
    border-radius: var(--ps-radius-sm);
    overflow: hidden;
    overflow-x: auto;
  }

  .ps-table-wrap::-webkit-scrollbar { height: 4px; }
  .ps-table-wrap::-webkit-scrollbar-track { background: var(--ps-bg-2); }
  .ps-table-wrap::-webkit-scrollbar-thumb { background: var(--ps-border); border-radius: 99px; }

  /* ── Table ── */
  .ps-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 700px;
  }

  .ps-table thead tr {
    background: var(--ps-bg-2);
    border-bottom: 1px solid var(--ps-border);
  }

  .ps-table thead th {
    padding: 0.8rem 1rem;
    text-align: left;
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: var(--ps-text-3);
    white-space: nowrap;
  }

  .ps-table tbody tr {
    border-bottom: 1px solid var(--ps-border-2);
    transition: background 0.15s;
    animation: ps-row-in 0.38s cubic-bezier(.22,1,.36,1) both;
  }

  @keyframes ps-row-in {
    from { opacity: 0; transform: translateY(5px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  .ps-table tbody tr:nth-child(1) { animation-delay: 0.04s; }
  .ps-table tbody tr:nth-child(2) { animation-delay: 0.08s; }
  .ps-table tbody tr:nth-child(3) { animation-delay: 0.12s; }
  .ps-table tbody tr:nth-child(4) { animation-delay: 0.16s; }
  .ps-table tbody tr:nth-child(n+5) { animation-delay: 0.20s; }

  .ps-table tbody tr:last-child { border-bottom: none; }
  .ps-table tbody tr:hover { background: var(--ps-blue-soft); }

  .ps-table td {
    padding: 0.9rem 1rem;
    vertical-align: top;
    font-size: 0.82rem;
    color: var(--ps-text-2);
  }

  /* ── Team name ── */
  .ps-team-name {
    font-size: 0.875rem;
    font-weight: 700;
    color: var(--ps-text);
  }

  .ps-badge {
    display: inline-block;
    font-size: 0.62rem;
    font-weight: 700;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    background: var(--ps-blue-light);
    color: var(--ps-blue);
    padding: 0.15rem 0.55rem;
    border-radius: 99px;
    margin-top: 0.25rem;
  }

  /* ── Members ── */
  .ps-member {
    display: flex;
    align-items: center;
    gap: 0.35rem;
    color: var(--ps-text-2);
    font-size: 0.8rem;
    margin-bottom: 0.12rem;
    font-weight: 400;
  }

  .ps-member-dot {
    width: 5px; height: 5px;
    border-radius: 50%;
    background: var(--ps-blue-mid);
    opacity: 0.4;
    flex-shrink: 0;
  }

  /* ── File link ── */
  .ps-file-link {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    padding: 0.3rem 0.7rem;
    border-radius: 7px;
    background: var(--ps-blue-light);
    color: var(--ps-blue);
    font-size: 0.75rem;
    font-weight: 600;
    text-decoration: none;
    border: 1px solid rgba(21,101,192,0.12);
    transition: all 0.18s;
    white-space: nowrap;
  }

  .ps-file-link:hover {
    background: var(--ps-blue-mid);
    color: #fff;
    border-color: var(--ps-blue-mid);
    text-decoration: none;
    box-shadow: 0 3px 10px rgba(21,101,192,0.2);
  }

  .ps-file-link svg { width: 12px; height: 12px; flex-shrink: 0; }

  .ps-file-none {
    color: var(--ps-text-4);
    font-size: 0.78rem;
    font-style: italic;
  }

  /* ── Date ── */
  .ps-date-main {
    font-size: 0.8rem;
    font-weight: 500;
    color: var(--ps-text-2);
  }

  .ps-date-time {
    font-size: 0.72rem;
    color: var(--ps-text-4);
    font-weight: 400;
    margin-top: 0.1rem;
  }

  /* ── Delete ── */
  .ps-delete-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    padding: 0.38rem 0.85rem;
    border-radius: 8px;
    background: var(--ps-red-light);
    border: 1px solid var(--ps-red-mid);
    color: var(--ps-red);
    font-family: var(--ps-font);
    font-size: 0.75rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.18s;
    white-space: nowrap;
  }

  .ps-delete-btn:hover {
    background: var(--ps-red);
    border-color: var(--ps-red);
    color: #fff;
    box-shadow: 0 3px 12px rgba(220,38,38,0.25);
    transform: translateY(-1px);
  }

  .ps-delete-btn svg { width: 12px; height: 12px; }

  /* ── Empty ── */
  .ps-empty-cell {
    text-align: center;
    padding: 3.5rem 1rem !important;
  }

  .ps-empty-inner {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
  }

  .ps-empty-icon {
    width: 40px; height: 40px;
    color: var(--ps-text-4);
    opacity: 0.5;
    margin-bottom: 0.25rem;
  }

  .ps-empty-title {
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--ps-text-3);
  }

  .ps-empty-desc {
    font-size: 0.76rem;
    color: var(--ps-text-4);
  }
</style>
@endonce

<div x-show="tab==='peserta-submission'" x-cloak class="ps-wrap">

  {{-- Header --}}
  <div class="ps-header">
    <div>
      <h2 class="ps-title">Kelola Peserta</h2>
      <p class="ps-subtitle">Daftar tim peserta beserta proposal dan karya yang diupload.</p>
    </div>
    <a href="{{ route('admin.site-settings.peserta-submission.export') }}" class="ps-export-btn">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
        <polyline points="7 10 12 15 17 10"/>
        <line x1="12" y1="15" x2="12" y2="3"/>
      </svg>
      Export Excel
    </a>
  </div>

  {{-- Alert --}}
  @if(session('success'))
    <div class="ps-alert">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>
      </svg>
      {{ session('success') }}
    </div>
  @endif

  {{-- Stats --}}
  @php
    $all       = $pesertaSubmissions ?? collect();
    $total     = $all->count();
    $pProposal = $all->whereNotNull('proposal_file')->count();
    $pKarya    = $all->whereNotNull('karya_file')->count();
    $pct       = $total > 0 ? round(($pKarya / $total) * 100) : 0;
  @endphp
  <div class="ps-stats">
    <div class="ps-stat">
      <div class="ps-stat-num">{{ $total }}</div>
      <div class="ps-stat-label">Total Tim</div>
    </div>
    <div class="ps-stat">
      <div class="ps-stat-num">{{ $pProposal }}</div>
      <div class="ps-stat-label">Total Proposal</div>
    </div>
    <div class="ps-stat">
      <div class="ps-stat-num">{{ $pKarya }}</div>
      <div class="ps-stat-label">Total Karya</div>
    </div>
    <div class="ps-stat">
      <div class="ps-stat-num">{{ $pct }}%</div>
      <div class="ps-stat-label">Submission Lengkap</div>
    </div>
  </div>

  {{-- Table --}}
  <div class="ps-table-wrap">
    <table class="ps-table">
      <thead>
        <tr>
          <th>Nama Tim</th>
          <th>Anggota</th>
          <th>Proposal</th>
          <th>Karya</th>
          <th>Tanggal</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse(($pesertaSubmissions ?? collect()) as $item)
          <tr>
            <td>
              <div class="ps-team-name">{{ $item->nama_tim }}</div>
              <span class="ps-badge">Tim</span>
            </td>

            <td>
              <div class="ps-member">
                <span class="ps-member-dot"></span>{{ $item->anggota_1 }}
              </div>
              @if($item->anggota_2)
                <div class="ps-member">
                  <span class="ps-member-dot"></span>{{ $item->anggota_2 }}
                </div>
              @endif
              @if($item->anggota_3)
                <div class="ps-member">
                  <span class="ps-member-dot"></span>{{ $item->anggota_3 }}
                </div>
              @endif
            </td>

            <td>
              @if($item->proposal_file)
                <a href="{{ asset('storage/' . $item->proposal_file) }}" target="_blank" class="ps-file-link">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                    <polyline points="14 2 14 8 20 8"/>
                  </svg>
                  Lihat / Download
                </a>
              @else
                <span class="ps-file-none">Belum diupload</span>
              @endif
            </td>

            <td>
              @if($item->karya_file)
                <a href="{{ asset('storage/' . $item->karya_file) }}" target="_blank" class="ps-file-link">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="12 2 2 7 12 12 22 7 12 2"/>
                    <polyline points="2 17 12 22 22 17"/>
                    <polyline points="2 12 12 17 22 12"/>
                  </svg>
                  Lihat / Download
                </a>
              @else
                <span class="ps-file-none">Belum diupload</span>
              @endif
            </td>

            <td>
              <div class="ps-date-main">{{ $item->created_at?->format('d M Y') }}</div>
              <div class="ps-date-time">{{ $item->created_at?->format('H:i') }} WIB</div>
            </td>

            <td>
              <form action="{{ route('admin.site-settings.peserta-submission.destroy', $item->id) }}"
                    method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus submission peserta ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="ps-delete-btn">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="3 6 5 6 21 6"/>
                    <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
                    <path d="M10 11v6"/><path d="M14 11v6"/>
                    <path d="M9 6V4h6v2"/>
                  </svg>
                  Hapus
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="ps-empty-cell">
              <div class="ps-empty-inner">
                <svg class="ps-empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                  <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5.586a1 1 0 0 1 .707.293l5.414 5.414a1 1 0 0 1 .293.707V19a2 2 0 0 1-2 2z"/>
                </svg>
                <div class="ps-empty-title">Belum ada submission peserta</div>
                <div class="ps-empty-desc">Data akan muncul setelah peserta mengupload karya mereka.</div>
              </div>
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

</div>

      {{-- ===========================
          TAB: HOME IMAGES
      ============================ --}}
      <div x-show="tab==='homeimg'" x-cloak class="tab-content">
        <div class="card">
          <div class="card-title">Beranda – Gambar Konten</div>
          <div class="card-sub">Upload 3 gambar yang tampil di section deskripsi beranda.</div>

          <hr class="section-divider">

          <form method="POST" action="{{ route('admin.site-settings.update') }}" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            @php
              $img1 = $setting->home_image_1 ? asset('storage/'.$setting->home_image_1) : asset('image/header/gambar 1.png');
              $img2 = $setting->home_image_2 ? asset('storage/'.$setting->home_image_2) : asset('image/header/gambar 2.jpg');
              $img3 = $setting->home_image_3 ? asset('storage/'.$setting->home_image_3) : asset('image/header/gambar 3.png');
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
              {{-- Gambar 1 --}}
              <div class="rounded-xl border border-slate-200 p-4 space-y-3">
                <div>
                  <div class="font-bold text-sm text-slate-900">Gambar 1</div>
                  <div class="text-xs text-slate-400">Rasio 4:3 · kartu kecil kiri atas</div>
                </div>
                <label class="flex items-center gap-2 w-full border border-dashed border-slate-200 rounded-lg px-3 py-2.5 cursor-pointer hover:border-[#0072BC] hover:bg-blue-50/20 transition-colors text-sm text-slate-500">
                  <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/></svg>
                  Pilih gambar
                  <input type="file" name="home_image_1" id="home_image_1" class="hidden" accept="image/*">
                </label>
                <div class="overflow-hidden rounded-xl border border-slate-200">
                  <img id="preview_home_1" src="{{ $img1 }}" class="w-full object-cover aspect-[4/3]">
                </div>
              </div>

              {{-- Gambar 2 --}}
              <div class="rounded-xl border border-slate-200 p-4 space-y-3">
                <div>
                  <div class="font-bold text-sm text-slate-900">Gambar 2</div>
                  <div class="text-xs text-slate-400">Rasio 4:3 · kartu kecil kanan atas</div>
                </div>
                <label class="flex items-center gap-2 w-full border border-dashed border-slate-200 rounded-lg px-3 py-2.5 cursor-pointer hover:border-[#0072BC] hover:bg-blue-50/20 transition-colors text-sm text-slate-500">
                  <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/></svg>
                  Pilih gambar
                  <input type="file" name="home_image_2" id="home_image_2" class="hidden" accept="image/*">
                </label>
                <div class="overflow-hidden rounded-xl border border-slate-200">
                  <img id="preview_home_2" src="{{ $img2 }}" class="w-full object-cover aspect-[4/3]">
                </div>
              </div>

              {{-- Gambar 3 --}}
              <div class="md:col-span-2 rounded-xl border border-slate-200 p-4 space-y-3">
                <div>
                  <div class="font-bold text-sm text-slate-900">Gambar 3</div>
                  <div class="text-xs text-slate-400">Rasio 16:7 · gambar panjang bawah</div>
                </div>
                <label class="flex items-center gap-2 w-full border border-dashed border-slate-200 rounded-lg px-3 py-2.5 cursor-pointer hover:border-[#0072BC] hover:bg-blue-50/20 transition-colors text-sm text-slate-500">
                  <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/></svg>
                  Pilih gambar
                  <input type="file" name="home_image_3" id="home_image_3" class="hidden" accept="image/*">
                </label>
                <div class="overflow-hidden rounded-xl border border-slate-200">
                  <img id="preview_home_3" src="{{ $img3 }}" class="w-full object-cover aspect-[16/7]">
                </div>
              </div>
            </div>

            <div class="pt-1">
              <button type="submit" class="btn-primary">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Simpan Gambar Beranda
              </button>
            </div>
          </form>
        </div>
      </div>

     
    {{-- =========================== 
    TAB: INFORMASI PENTING
    ============================ --}}
<div x-show="tab==='informasi-penting'" x-cloak class="rounded-2xl border border-slate-200 bg-white shadow-sm p-6">
  @php
    $informasiPentingItems = $informasiPentingItems ?? collect();

    $usedSortOrders = $informasiPentingItems
        ->pluck('sort_order')
        ->filter(fn ($value) => $value !== null && $value !== '')
        ->map(fn ($value) => (int) $value)
        ->filter(fn ($value) => $value >= 1)
        ->unique()
        ->sort()
        ->values();

    $maxUsedSortOrder = (int) ($usedSortOrders->max() ?? 0);
    $maxSortOption = max($maxUsedSortOrder, $informasiPentingItems->count(), 1) + 5;
  @endphp

  <div>
    <h2 class="text-xl font-extrabold text-slate-900">Informasi Penting</h2>
    <p class="mt-1 text-sm text-slate-600">Kelola konten informasi penting yang tampil di beranda.</p>
  </div>

  {{-- FORM TAMBAH --}}
  <div class="mt-8 rounded-2xl border border-slate-200 bg-slate-50 p-5">
    <h3 class="text-lg font-extrabold text-slate-900">Tambah Informasi Penting</h3>

    <form action="{{ route('admin.site-settings.informasi-penting.store') }}" method="POST" class="mt-4 space-y-4">
      @csrf

      @php
        $firstAvailableSortOrder = null;
        for ($i = 1; $i <= $maxSortOption; $i++) {
            if (! $usedSortOrders->contains($i)) {
                $firstAvailableSortOrder = $i;
                break;
            }
        }

        $selectedCreateSortOrder = old('sort_order', $firstAvailableSortOrder);
      @endphp

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-bold mb-1">Urutan</label>
          <select name="sort_order" class="w-full border rounded-xl px-4 py-3" required>
            @for ($i = 1; $i <= $maxSortOption; $i++)
              @php
                $isUsed = $usedSortOrders->contains($i);
              @endphp

              <option
                value="{{ $i }}"
                {{ $isUsed ? 'disabled' : '' }}
                {{ (string) $selectedCreateSortOrder === (string) $i && ! $isUsed ? 'selected' : '' }}
              >
                {{ $i }}{{ $isUsed ? ' (used)' : '' }}
              </option>
            @endfor
          </select>
        </div>

        <div class="flex items-end">
          <label class="inline-flex items-center gap-2">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }} class="w-4 h-4">
            <span class="text-sm">Aktif</span>
          </label>
        </div>
      </div>

      <div>
        <label class="block text-sm font-bold mb-1">Isi Informasi</label>
        <textarea name="content" class="w-full border rounded-xl px-4 py-3 min-h-[120px]" required>{{ old('content') }}</textarea>
      </div>

      <div>
        <button type="submit" class="px-5 py-2.5 rounded-full text-white font-extrabold"
          style="background-color:#0072BC;"
          onmouseover="this.style.backgroundColor='#005fa3'"
          onmouseout="this.style.backgroundColor='#0072BC'">
          Tambah Informasi
        </button>
      </div>
    </form>
  </div>

  {{-- LIST DATA --}}
  <div class="mt-8 space-y-4">
    @forelse($informasiPentingItems as $item)
      @php
        $currentSortOrder = (int) $item->sort_order;
        $selectedEditSortOrder = old('sort_order', $currentSortOrder);
      @endphp

      <div class="rounded-xl border border-slate-200 p-4 bg-white">
        <form action="{{ route('admin.site-settings.informasi-penting.update', $item->id) }}" method="POST" class="space-y-3">
          @csrf
          @method('PUT')

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-xs font-bold mb-1">Urutan</label>
              <select name="sort_order" class="w-full border rounded-xl px-4 py-3" required>
                @for ($i = 1; $i <= $maxSortOption; $i++)
                  @php
                    $isUsedByOtherItem = $usedSortOrders->contains($i) && $i !== $currentSortOrder;
                  @endphp

                  <option
                    value="{{ $i }}"
                    {{ $isUsedByOtherItem ? 'disabled' : '' }}
                    {{ (string) $selectedEditSortOrder === (string) $i ? 'selected' : '' }}
                  >
                    {{ $i }}{{ $isUsedByOtherItem ? ' (used)' : '' }}
                  </option>
                @endfor
              </select>
            </div>

            <div class="flex items-end">
              <label class="inline-flex items-center gap-2">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $item->is_active) ? 'checked' : '' }} class="w-4 h-4">
                <span class="text-sm">Aktif</span>
              </label>
            </div>
          </div>

          <div>
            <label class="block text-xs font-bold mb-1">Isi Informasi</label>
            <textarea name="content" class="w-full border rounded-xl px-4 py-3 min-h-[120px]" required>{{ old('content', $item->content) }}</textarea>
          </div>

          <div class="flex justify-end gap-2">
            <button type="submit" class="px-4 py-2 rounded-xl bg-slate-900 text-white text-sm font-bold">
              Simpan
            </button>
        </form>

            <form action="{{ route('admin.site-settings.informasi-penting.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus informasi ini?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="px-4 py-2 rounded-xl bg-red-600 text-white text-sm font-bold">
                Hapus
              </button>
            </form>
          </div>
      </div>
    @empty
      <div class="text-sm text-slate-500">Belum ada data informasi penting.</div>
    @endforelse
  </div>
</div>


    {{-- ===========================
      TAB: YOUTUBE
============================ --}}
<div x-show="tab==='youtube'" x-cloak class="tab-content">
  <div class="card">
    <div class="card-title">Beranda – YouTube</div>
    <div class="card-sub">2 link video YouTube untuk ditampilkan di beranda.</div>

    <hr class="section-divider">

    <form method="POST" action="{{ route('admin.site-settings.update') }}">
      @csrf
      @method('PUT')

      <div class="grid md:grid-cols-2 gap-6">

        <!-- Video 1 -->
        <div>
          <label class="block text-sm font-semibold mb-2">
            YouTube Video 1
          </label>

          <input
            type="text"
            name="youtube_url_1"
            value="{{ old('youtube_url_1', $setting->youtube_url_1 ?? '') }}"
            placeholder="https://www.youtube.com/watch?v=..."
            class="w-full border border-slate-300 rounded-lg px-4 py-3"
          >

          <p class="text-xs text-slate-500 mt-1">
            Masukkan link YouTube video pertama
          </p>
        </div>

        <!-- Video 2 -->
        <div>
          <label class="block text-sm font-semibold mb-2">
            YouTube Video 2
          </label>

          <input
            type="text"
            name="youtube_url_2"
            value="{{ old('youtube_url_2', $setting->youtube_url_2 ?? '') }}"
            placeholder="https://www.youtube.com/watch?v=..."
            class="w-full border border-slate-300 rounded-lg px-4 py-3"
          >

          <p class="text-xs text-slate-500 mt-1">
            Masukkan link YouTube video kedua
          </p>
        </div>

      </div>

      <div class="mt-6">
        <button
          type="submit"
          class="px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition"
        >
          Simpan
        </button>
      </div>

    </form>
  </div>
</div>

    {{-- ===========================
    TAB: TIMELINE
============================ --}}
@php
  $timelineItems = $timelineItems ?? collect();

  $usedTimelineSortOrders = $timelineItems
      ->pluck('sort_order')
      ->filter(fn ($value) => $value !== null && $value !== '')
      ->map(fn ($value) => (int) $value)
      ->filter(fn ($value) => $value >= 1)
      ->unique()
      ->sort()
      ->values();

  $timelineMaxSortOption = max((int) ($usedTimelineSortOrders->max() ?? 0), $timelineItems->count(), 1) + 5;

  $timelineFirstAvailableSortOrder = 1;
  for ($i = 1; $i <= $timelineMaxSortOption; $i++) {
      if (! $usedTimelineSortOrders->contains($i)) {
          $timelineFirstAvailableSortOrder = $i;
          break;
      }
  }
@endphp

<div x-show="tab==='timeline'" x-cloak class="tab-content">
  <div class="card">

    {{-- ===== HEADER ===== --}}
    <div class="flex items-start justify-between gap-4 flex-wrap">
      <div>
        <div class="card-title">Timeline</div>
        <div class="card-sub">Kelola tahapan timeline yang tampil di beranda.</div>
      </div>
      <div class="text-xs text-slate-400">
        <span class="font-bold text-slate-700">{{ $timelineItems->count() }}</span> tahapan
      </div>
    </div>

    <hr class="section-divider">

    {{-- ===== FORM TAMBAH ===== --}}
    <div class="add-form-box mb-6">
      <div class="font-bold text-sm text-slate-900 mb-4">+ Tambah Timeline</div>
      <form action="{{ route('admin.site-settings.timeline.store') }}" method="POST" class="space-y-4">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="field-label">Judul</label>
            <input type="text" name="title" value="{{ old('title') }}" class="field-input" placeholder="Contoh: Pendaftaran Dibuka" required>
          </div>
          <div>
            <label class="field-label">Tanggal</label>
            <input type="text" name="date_label" value="{{ old('date_label') }}" class="field-input" placeholder="Contoh: 18 Nov 2025" required>
          </div>
        </div>

        <div>
          <label class="field-label">Deskripsi (opsional)</label>
          <textarea name="description" class="field-input min-h-[80px]" placeholder="Deskripsi singkat tahapan...">{{ old('description') }}</textarea>
        </div>

        <div class="flex items-center justify-between">
          <div class="flex items-center gap-4">
            <div class="w-32">
              <label class="field-label">Urutan</label>
              <select name="sort_order" class="field-input" required>
                @for ($i = 1; $i <= $timelineMaxSortOption; $i++)
                  @php $isUsed = $usedTimelineSortOrders->contains($i); @endphp
                  <option
                    value="{{ $i }}"
                    {{ $isUsed ? 'disabled' : '' }}
                    {{ (string) old('sort_order', $timelineFirstAvailableSortOrder) === (string) $i && ! $isUsed ? 'selected' : '' }}
                  >
                    {{ $i }}{{ $isUsed ? ' (used)' : '' }}
                  </option>
                @endfor
              </select>
            </div>

            <label class="inline-flex items-center gap-2 mt-5 cursor-pointer">
              <input type="checkbox" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }} class="w-4 h-4 accent-[#0072BC]">
              <span class="text-sm font-medium text-slate-700">Aktif</span>
            </label>
          </div>

          <button type="submit" class="btn-primary mt-5">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah
          </button>
        </div>
      </form>
    </div>

    {{-- ===== LIST TIMELINE ===== --}}
    <div class="space-y-2.5">
      @forelse($timelineItems->sortBy('sort_order') as $item)
        @php
          $currentSortOrder = (int) $item->sort_order;
        @endphp

        <div class="item-row" x-data="{ editing: false }">

          {{-- VIEW MODE --}}
          <div x-show="!editing">
            <div class="item-row-head">
              <span class="step-bubble shrink-0">{{ $item->sort_order }}</span>
              <div class="flex-1 min-w-0">
                <span class="font-bold text-sm text-slate-900">{{ $item->title }}</span>
                <span class="ml-2 text-xs text-slate-400 font-medium">· {{ $item->date_label }}</span>
              </div>
              <span class="badge {{ $item->is_active ? 'badge-active' : 'badge-inactive' }}">
                {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
              </span>
              <button type="button" class="btn-edit"
                style="padding:0.3rem 0.7rem;font-size:0.74rem;"
                @click="editing = true">Edit</button>
            </div>

            @if($item->description)
              <div class="px-4 py-2.5 text-xs text-slate-500 leading-relaxed bg-slate-50/60 border-t border-slate-100 line-clamp-2">
                {{ $item->description }}
              </div>
            @endif
          </div>

          {{-- EDIT MODE --}}
          <div x-show="editing" class="item-row-body">
            <form action="{{ route('admin.site-settings.timeline.update', $item->id) }}" method="POST" class="space-y-3">
              @csrf
              @method('PUT')

              <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <div>
                  <label class="field-label">Judul</label>
                  <input type="text" name="title" value="{{ $item->title }}" class="field-input" required>
                </div>
                <div>
                  <label class="field-label">Tanggal</label>
                  <input type="text" name="date_label" value="{{ $item->date_label }}" class="field-input" required>
                </div>
              </div>

              <div>
                <label class="field-label">Deskripsi</label>
                <textarea name="description" class="field-input min-h-[75px]">{{ $item->description }}</textarea>
              </div>

              <div class="flex items-center gap-3">
                <div class="w-32">
                  <label class="field-label">Urutan</label>
                  <select name="sort_order" class="field-input" required>
                    @for ($i = 1; $i <= $timelineMaxSortOption; $i++)
                      @php $isUsedByOther = $usedTimelineSortOrders->contains($i) && $i !== $currentSortOrder; @endphp
                      <option
                        value="{{ $i }}"
                        {{ $isUsedByOther ? 'disabled' : '' }}
                        {{ (string) $currentSortOrder === (string) $i ? 'selected' : '' }}
                      >
                        {{ $i }}{{ $isUsedByOther ? ' (used)' : '' }}
                      </option>
                    @endfor
                  </select>
                </div>

                <label class="inline-flex items-center gap-2 mt-5 cursor-pointer">
                  <input type="checkbox" name="is_active" value="1" {{ $item->is_active ? 'checked' : '' }} class="w-4 h-4 accent-[#0072BC]">
                  <span class="text-sm font-medium text-slate-700">Aktif</span>
                </label>

                <div class="ml-auto mt-5 flex gap-2">
                  <button type="button" class="btn-ghost"
                    style="padding:0.35rem 0.8rem;font-size:0.78rem;"
                    @click="editing = false">Batal</button>
                  <button type="submit" class="btn-primary"
                    style="padding:0.35rem 0.8rem;font-size:0.78rem;">Simpan</button>
                </div>
              </div>
            </form>

            <form action="{{ route('admin.site-settings.timeline.destroy', $item->id) }}" method="POST"
                  onsubmit="return confirm('Hapus timeline ini?')" class="mt-2.5">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn-danger">Hapus</button>
            </form>
          </div>

        </div>
      @empty
        <div class="empty-state">
          <svg class="w-9 h-9 text-slate-200 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
          </svg>
          <div class="text-sm font-medium text-slate-500">Belum ada timeline</div>
          <div class="text-xs text-slate-400 mt-1">Isi form di atas untuk menambahkan tahapan pertama</div>
        </div>
      @endforelse
    </div>

  </div>
</div>

    
{{-- ===========================
    TAB: FAQ
============================ --}}
@php
  $groupedFaqs = ($faqs ?? collect())->groupBy('category');
@endphp

<div x-show="tab==='faq'" x-cloak class="tab-content"
     x-data="{
       faqView: '',
       activeCategory: '',
       form: { category:'', question:'', answer:'', sort_order:1, is_active:true }
     }">

  <div class="card">

    {{-- ===== DYNAMIC HEADER ===== --}}
    <div class="flex items-center gap-3 mb-1">
      <button type="button"
        x-show="faqView !== ''"
        x-cloak
        class="back-btn"
        @click="faqView = ''; activeCategory = ''">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
        </svg>
        Kembali
      </button>
      <div>
        <div class="card-title"
          x-text="faqView === '' ? 'FAQ' : (faqView === 'add_cat' ? 'Tambah Kategori Baru' : 'FAQ – ' + activeCategory)">
        </div>
        <div class="card-sub"
          x-text="faqView === '' ? 'Pilih kategori untuk kelola pertanyaan & jawaban.' : (faqView === 'add_cat' ? 'Buat kategori FAQ baru.' : 'Kelola pertanyaan & jawaban di kategori ini.')">
        </div>
      </div>
    </div>

    <hr class="section-divider">

    {{-- ===== LANDING: GRID KATEGORI ===== --}}
    <div x-show="faqView === ''" class="lomba-fade">

      @if($groupedFaqs->isNotEmpty())
        <div class="text-xs text-slate-400 mb-4">
          <span class="font-bold text-slate-700">{{ $groupedFaqs->count() }}</span> kategori ·
          <span class="font-bold text-slate-700">{{ ($faqs ?? collect())->count() }}</span> total FAQ
        </div>
      @endif

      <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
        @forelse($groupedFaqs as $category => $items)
          <button type="button"
            class="flex flex-col items-center justify-center gap-2 rounded-xl border-2 border-slate-200 bg-white p-4 text-center hover:border-[#0072BC] hover:bg-blue-50/30 transition-all group"
            @click="faqView = 'list'; activeCategory = @js($category)">
            <div class="w-10 h-10 rounded-xl bg-slate-100 group-hover:bg-[#0072BC] flex items-center justify-center transition-colors">
              <svg class="w-5 h-5 text-slate-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
            </div>
            <div class="font-bold text-xs text-slate-800 group-hover:text-[#0072BC] transition-colors leading-tight">{{ $category }}</div>
            <div class="text-[10px] text-slate-400">{{ $items->count() }} pertanyaan</div>
          </button>
        @empty
          <div class="col-span-full">
            <div class="empty-state">
              <svg class="w-9 h-9 text-slate-200 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
              <div class="text-sm font-medium text-slate-500">Belum ada kategori FAQ</div>
              <div class="text-xs text-slate-400 mt-1">Mulai dengan tambah kategori baru</div>
            </div>
          </div>
        @endforelse

        <button type="button"
          class="flex flex-col items-center justify-center gap-2 rounded-xl border-2 border-dashed border-slate-200 bg-slate-50 p-4 text-center hover:border-[#0072BC] hover:bg-blue-50/20 transition-all group"
          @click="faqView = 'add_cat'">
          <div class="w-10 h-10 rounded-xl bg-white border border-slate-200 group-hover:bg-[#0072BC] flex items-center justify-center transition-colors">
            <svg class="w-5 h-5 text-slate-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
            </svg>
          </div>
          <div class="font-bold text-xs text-slate-500 group-hover:text-[#0072BC] transition-colors">Tambah Kategori</div>
        </button>
      </div>
    </div>

    {{-- ===== TAMBAH KATEGORI (FAQ BARU) ===== --}}
    <div x-show="faqView === 'add_cat'" x-cloak class="lomba-fade">
      <div class="add-form-box">
        <div class="font-bold text-sm text-slate-900 mb-3">+ FAQ dengan Kategori Baru</div>
        <form action="{{ route('admin.site-settings.faqs.store') }}" method="POST" class="space-y-4">
          @csrf

          @php
            $newCategoryMaxSortOption = 6;
          @endphp

          <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="md:col-span-2">
              <label class="field-label">Nama Kategori Baru</label>
              <input name="category" class="field-input" placeholder="Contoh: Pendaftaran, Teknis, Hadiah..." required>
            </div>
            <div>
              <label class="field-label">Urutan</label>
              <select name="sort_order" class="field-input" required>
                @for ($i = 1; $i <= $newCategoryMaxSortOption; $i++)
                  <option value="{{ $i }}" {{ $i === 1 ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
              </select>
            </div>
          </div>

          <div>
            <label class="field-label">Pertanyaan Pertama</label>
            <input name="question" class="field-input" placeholder="Tulis pertanyaan..." required>
          </div>

          <div>
            <label class="field-label">Jawaban</label>
            <textarea name="answer" class="field-input min-h-[100px]" placeholder="Tulis jawaban lengkap..." required></textarea>
          </div>

          <div class="flex items-center justify-between">
            <label class="inline-flex items-center gap-2 cursor-pointer">
              <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 accent-[#0072BC]">
              <span class="text-sm font-medium text-slate-700">Aktif</span>
            </label>
            <button type="submit" class="btn-primary">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
              </svg>
              Buat Kategori & Simpan
            </button>
          </div>
        </form>
      </div>
    </div>

    {{-- ===== LIST FAQ PER KATEGORI ===== --}}
    <div x-show="faqView === 'list'" x-cloak class="lomba-fade space-y-5">
      @foreach($groupedFaqs as $category => $items)
        @php
          $items = $items->sortBy('sort_order')->values();

          $usedFaqSortOrders = $items
              ->pluck('sort_order')
              ->filter(fn ($value) => $value !== null && $value !== '')
              ->map(fn ($value) => (int) $value)
              ->filter(fn ($value) => $value >= 1)
              ->unique()
              ->sort()
              ->values();

          $faqMaxSortOption = max((int) ($usedFaqSortOrders->max() ?? 0), $items->count(), 1) + 5;

          $faqFirstAvailableSortOrder = 1;
          for ($i = 1; $i <= $faqMaxSortOption; $i++) {
              if (! $usedFaqSortOrders->contains($i)) {
                  $faqFirstAvailableSortOrder = $i;
                  break;
              }
          }
        @endphp

        <div x-show="activeCategory === @js($category)">
          <div class="add-form-box mb-5">
            <div class="font-bold text-sm text-slate-900 mb-3">+ Tambah Pertanyaan</div>
            <form action="{{ route('admin.site-settings.faqs.store') }}" method="POST" class="space-y-4">
              @csrf
              <input type="hidden" name="category" value="{{ $category }}">

              <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="md:col-span-3">
                  <label class="field-label">Pertanyaan</label>
                  <input name="question" class="field-input" placeholder="Tulis pertanyaan baru..." required>
                </div>
                <div>
                  <label class="field-label">Urutan</label>
                  <select name="sort_order" class="field-input" required>
                    @for ($i = 1; $i <= $faqMaxSortOption; $i++)
                      @php $isUsed = $usedFaqSortOrders->contains($i); @endphp
                      <option
                        value="{{ $i }}"
                        {{ $isUsed ? 'disabled' : '' }}
                        {{ (string) $faqFirstAvailableSortOrder === (string) $i && ! $isUsed ? 'selected' : '' }}
                      >
                        {{ $i }}{{ $isUsed ? ' (used)' : '' }}
                      </option>
                    @endfor
                  </select>
                </div>
              </div>

              <div>
                <label class="field-label">Jawaban</label>
                <textarea name="answer" class="field-input min-h-[90px]" placeholder="Tulis jawaban..." required></textarea>
              </div>

              <div class="flex items-center justify-between">
                <label class="inline-flex items-center gap-2 cursor-pointer">
                  <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 accent-[#0072BC]">
                  <span class="text-sm font-medium text-slate-700">Aktif</span>
                </label>
                <button type="submit" class="btn-primary">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                  </svg>
                  Tambah
                </button>
              </div>
            </form>
          </div>

          <div class="text-xs text-slate-400 mb-3">
            <span class="font-bold text-slate-700">{{ $items->count() }}</span> pertanyaan di kategori ini
          </div>

          <div class="space-y-2.5">
            @forelse($items as $faq)
              @php
                $currentSortOrder = (int) $faq->sort_order;
              @endphp

              <div class="item-row" x-data="{ editing: false }">
                {{-- View mode --}}
                <div x-show="!editing">
                  <div class="item-row-head">
                    <span class="text-xs font-black text-slate-400">No.{{ $faq->sort_order }}</span>
                    <span class="font-semibold text-sm text-slate-800 truncate flex-1">{{ $faq->question }}</span>
                    <span class="badge {{ $faq->is_active ? 'badge-active' : 'badge-inactive' }}">
                      {{ $faq->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                    <button type="button" class="btn-edit" style="padding:0.3rem 0.7rem;font-size:0.74rem;"
                      @click="editing = true">Edit</button>
                  </div>
                  <div class="px-4 py-3 text-xs text-slate-500 leading-relaxed bg-slate-50/50 line-clamp-2">
                    {{ $faq->answer }}
                  </div>
                </div>

                {{-- Edit mode --}}
                <div x-show="editing" class="item-row-body">
                  <form action="{{ route('admin.site-settings.faqs.update', $faq->id) }}" method="POST" class="space-y-3">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="category" value="{{ $faq->category }}">

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
                      <div class="md:col-span-3">
                        <label class="field-label">Pertanyaan</label>
                        <input name="question" value="{{ $faq->question }}" class="field-input" required>
                      </div>
                      <div>
                        <label class="field-label">Urutan</label>
                        <select name="sort_order" class="field-input" required>
                          @for ($i = 1; $i <= $faqMaxSortOption; $i++)
                            @php $isUsedByOther = $usedFaqSortOrders->contains($i) && $i !== $currentSortOrder; @endphp
                            <option
                              value="{{ $i }}"
                              {{ $isUsedByOther ? 'disabled' : '' }}
                              {{ (string) $currentSortOrder === (string) $i ? 'selected' : '' }}
                            >
                              {{ $i }}{{ $isUsedByOther ? ' (used)' : '' }}
                            </option>
                          @endfor
                        </select>
                      </div>
                    </div>

                    <div>
                      <label class="field-label">Jawaban</label>
                      <textarea name="answer" class="field-input min-h-[90px]" required>{{ $faq->answer }}</textarea>
                    </div>

                    <div class="flex items-center gap-3">
                      <label class="inline-flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ $faq->is_active ? 'checked' : '' }} class="w-4 h-4 accent-[#0072BC]">
                        <span class="text-sm font-medium text-slate-700">Aktif</span>
                      </label>
                      <div class="ml-auto flex gap-2">
                        <button type="button" class="btn-ghost" style="padding:0.35rem 0.8rem;font-size:0.78rem;"
                          @click="editing = false">Batal</button>
                        <button type="submit" class="btn-primary" style="padding:0.35rem 0.8rem;font-size:0.78rem;">Simpan</button>
                      </div>
                    </div>
                  </form>

                  <form action="{{ route('admin.site-settings.faqs.destroy', $faq->id) }}" method="POST"
                        onsubmit="return confirm('Hapus FAQ ini?')" class="mt-2.5">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-danger">Hapus</button>
                  </form>
                </div>
              </div>
            @empty
              <div class="empty-state">
                <div class="text-sm font-medium text-slate-500">Belum ada pertanyaan di kategori ini</div>
              </div>
            @endforelse
          </div>
        </div>
      @endforeach
    </div>

  </div>
</div>

{{-- ===========================
    TAB: LOMBA
============================ --}}

<style>
  .lomba-fade {
    animation: lombaFadeIn 0.2s ease both;
  }
  @keyframes lombaFadeIn {
    from { opacity: 0; transform: translateY(8px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  .sub-pill {
    display: inline-flex;
    align-items: center;
    padding: 0.35rem 1rem;
    border-radius: 99px;
    font-size: 0.78rem;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.15s;
    border: 1.5px solid transparent;
  }
  .sub-pill-active {
    background: #0072BC;
    color: #fff;
    border-color: #0072BC;
    box-shadow: 0 2px 8px rgba(0,114,188,0.25);
  }
  .sub-pill-inactive {
    background: #f8fafc;
    color: #64748b;
    border-color: #e2e8f0;
  }
  .sub-pill-inactive:hover {
    border-color: #0072BC;
    color: #0072BC;
    background: #eff8ff;
  }

  .lomba-nav-card {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.25rem 1.5rem;
    border-radius: 1rem;
    border: 1.5px solid #e2e8f0;
    background: #fff;
    cursor: pointer;
    transition: all 0.18s;
    text-align: left;
    width: 100%;
  }
  .lomba-nav-card:hover {
    border-color: #0072BC;
    background: #f0f8ff;
    box-shadow: 0 4px 16px rgba(0,114,188,0.1);
    transform: translateY(-1px);
  }
  .lomba-nav-card:hover .lnc-icon {
    background: #0072BC;
    color: #fff;
  }
  .lomba-nav-card:hover .lnc-arrow {
    color: #0072BC;
    transform: translateX(3px);
  }
  .lnc-icon {
    flex-shrink: 0;
    width: 2.75rem;
    height: 2.75rem;
    border-radius: 0.75rem;
    background: #f1f5f9;
    color: #94a3b8;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.18s;
  }
  .lnc-arrow {
    margin-left: auto;
    color: #cbd5e1;
    transition: all 0.18s;
    flex-shrink: 0;
  }

  .back-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    font-size: 0.8rem;
    font-weight: 700;
    color: #94a3b8;
    cursor: pointer;
    padding: 0.4rem 0.75rem;
    border-radius: 0.5rem;
    border: 1.5px solid #e2e8f0;
    background: #f8fafc;
    transition: all 0.15s;
  }
  .back-btn:hover {
    color: #0072BC;
    border-color: #0072BC;
    background: #eff8ff;
  }

  .section-header-strip {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    padding-bottom: 1rem;
    margin-bottom: 1.25rem;
    border-bottom: 1.5px solid #f1f5f9;
    flex-wrap: wrap;
  }

  .add-form-box {
    background: linear-gradient(135deg, #f8fafc 0%, #f0f7ff 100%);
    border: 1.5px solid #e2e8f0;
    border-radius: 1rem;
    padding: 1.25rem;
    margin-bottom: 1.25rem;
  }

  .item-row {
    border: 1.5px solid #e2e8f0;
    border-radius: 0.875rem;
    background: #fff;
    overflow: hidden;
    transition: box-shadow 0.15s;
  }
  .item-row:hover {
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
  }
  .item-row-head {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.65rem 1rem;
    background: #f8fafc;
    border-bottom: 1.5px solid #f1f5f9;
  }
  .item-row-body {
    padding: 1rem;
  }

  .step-bubble {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 1.75rem;
    height: 1.75rem;
    border-radius: 50%;
    background: #0072BC;
    color: #fff;
    font-size: 0.72rem;
    font-weight: 900;
    flex-shrink: 0;
  }

  .empty-state {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 3rem 1rem;
    text-align: center;
    border: 1.5px dashed #e2e8f0;
    border-radius: 1rem;
    background: #fafbfc;
  }
</style>

@php
  $kt = $lombaKetentuan ?? collect();
  $selected = request('lomba_tab', 'kategori');
  if (!in_array($selected, ['kategori', 'persyaratan', 'pendaftaran'])) {
      $selected = 'kategori';
  }

  $kategoriItems = $kt['kategori'] ?? collect();
  $persyaratanItems = $kt['persyaratan'] ?? collect();
  $pendaftaranItems = $kt['pendaftaran'] ?? collect();
  $tahapanItems = $lombaTahapan ?? collect();

  $kategoriUsedSortOrders = $kategoriItems->pluck('sort_order')
      ->filter(fn ($value) => $value !== null && $value !== '')
      ->map(fn ($value) => (int) $value)
      ->filter(fn ($value) => $value >= 1)
      ->unique()
      ->sort()
      ->values();

  $persyaratanUsedSortOrders = $persyaratanItems->pluck('sort_order')
      ->filter(fn ($value) => $value !== null && $value !== '')
      ->map(fn ($value) => (int) $value)
      ->filter(fn ($value) => $value >= 1)
      ->unique()
      ->sort()
      ->values();

  $pendaftaranUsedSortOrders = $pendaftaranItems->pluck('sort_order')
      ->filter(fn ($value) => $value !== null && $value !== '')
      ->map(fn ($value) => (int) $value)
      ->filter(fn ($value) => $value >= 1)
      ->unique()
      ->sort()
      ->values();

  $usedStepNumbers = $tahapanItems->pluck('step_number')
      ->filter(fn ($value) => $value !== null && $value !== '')
      ->map(fn ($value) => (int) $value)
      ->filter(fn ($value) => $value >= 1)
      ->unique()
      ->sort()
      ->values();

  $usedSortOrdersTahapan = $tahapanItems->pluck('sort_order')
      ->filter(fn ($value) => $value !== null && $value !== '')
      ->map(fn ($value) => (int) $value)
      ->filter(fn ($value) => $value >= 1)
      ->unique()
      ->sort()
      ->values();

  $kategoriMaxSortOption = max((int) ($kategoriUsedSortOrders->max() ?? 0), $kategoriItems->count(), 1) + 5;
  $persyaratanMaxSortOption = max((int) ($persyaratanUsedSortOrders->max() ?? 0), $persyaratanItems->count(), 1) + 5;
  $pendaftaranMaxSortOption = max((int) ($pendaftaranUsedSortOrders->max() ?? 0), $pendaftaranItems->count(), 1) + 5;
  $maxStepNumberOption = max((int) ($usedStepNumbers->max() ?? 0), $tahapanItems->count(), 1) + 5;
  $maxSortOrderOptionTahapan = max((int) ($usedSortOrdersTahapan->max() ?? 0), $tahapanItems->count(), 1) + 5;

  $kategoriFirstAvailableSortOrder = 1;
  for ($i = 1; $i <= $kategoriMaxSortOption; $i++) {
      if (! $kategoriUsedSortOrders->contains($i)) {
          $kategoriFirstAvailableSortOrder = $i;
          break;
      }
  }

  $persyaratanFirstAvailableSortOrder = 1;
  for ($i = 1; $i <= $persyaratanMaxSortOption; $i++) {
      if (! $persyaratanUsedSortOrders->contains($i)) {
          $persyaratanFirstAvailableSortOrder = $i;
          break;
      }
  }

  $pendaftaranFirstAvailableSortOrder = 1;
  for ($i = 1; $i <= $pendaftaranMaxSortOption; $i++) {
      if (! $pendaftaranUsedSortOrders->contains($i)) {
          $pendaftaranFirstAvailableSortOrder = $i;
          break;
      }
  }

  $firstAvailableStepNumber = 1;
  for ($i = 1; $i <= $maxStepNumberOption; $i++) {
      if (! $usedStepNumbers->contains($i)) {
          $firstAvailableStepNumber = $i;
          break;
      }
  }

  $firstAvailableSortOrderTahapan = 1;
  for ($i = 1; $i <= $maxSortOrderOptionTahapan; $i++) {
      if (! $usedSortOrdersTahapan->contains($i)) {
          $firstAvailableSortOrderTahapan = $i;
          break;
      }
  }
@endphp

<div
  x-show="tab==='lomba'"
  x-cloak
  class="tab-content"
  x-data="{
    lombaSection: '{{ request()->has('lomba_tab') ? 'ketentuan' : '' }}',
    kTab: '{{ $selected }}'
  }"
>
  <div class="card">
    {{-- ===== CARD HEADER ===== --}}
    <div class="flex items-center gap-3 mb-1">
      <button
        type="button"
        x-show="lombaSection !== ''"
        x-cloak
        class="back-btn"
        @click="lombaSection = ''"
      >
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
        </svg>
        Kembali
      </button>

      <div>
        <div
          class="card-title"
          x-text="lombaSection === '' ? 'Lomba' : (lombaSection === 'ketentuan' ? 'Ketentuan Lomba' : 'Tahapan Lomba')"
        ></div>
        <div
          class="card-sub"
          x-text="lombaSection === '' ? 'Pilih bagian yang ingin dikelola.' : (lombaSection === 'ketentuan' ? 'Kelola kategori, persyaratan, & pendaftaran.' : 'Kelola langkah-langkah kegiatan lomba.')"
        ></div>
      </div>
    </div>

    <hr class="section-divider">

    {{-- ===== LANDING: 2 PILIHAN ===== --}}
    <div x-show="lombaSection === ''" class="lomba-fade grid grid-cols-1 sm:grid-cols-2 gap-4">
      <button type="button" class="lomba-nav-card" @click="lombaSection = 'ketentuan'">
        <div class="lnc-icon">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
          </svg>
        </div>
        <div class="flex-1 min-w-0">
          <div class="font-bold text-[0.9rem] text-slate-900">Ketentuan</div>
          <div class="text-xs text-slate-400 mt-0.5">Kategori · Persyaratan · Pendaftaran</div>
        </div>
        <svg class="lnc-arrow w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
      </button>

      <button type="button" class="lomba-nav-card" @click="lombaSection = 'tahapan'">
        <div class="lnc-icon">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
          </svg>
        </div>
        <div class="flex-1 min-w-0">
          <div class="font-bold text-[0.9rem] text-slate-900">Tahapan</div>
          <div class="text-xs text-slate-400 mt-0.5">Langkah-langkah kegiatan lomba</div>
        </div>
        <svg class="lnc-arrow w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
      </button>
    </div>

    {{-- =========================
        SECTION: KETENTUAN
    ========================= --}}
    <div x-show="lombaSection === 'ketentuan'" x-cloak class="lomba-fade">
      <div class="section-header-strip">
        <div class="flex gap-1.5 flex-wrap">
          <button
            type="button"
            class="sub-pill"
            :class="kTab === 'kategori' ? 'sub-pill-active' : 'sub-pill-inactive'"
            @click="kTab = 'kategori'"
          >
            Kategori
          </button>
          <button
            type="button"
            class="sub-pill"
            :class="kTab === 'persyaratan' ? 'sub-pill-active' : 'sub-pill-inactive'"
            @click="kTab = 'persyaratan'"
          >
            Persyaratan
          </button>
          <button
            type="button"
            class="sub-pill"
            :class="kTab === 'pendaftaran' ? 'sub-pill-active' : 'sub-pill-inactive'"
            @click="kTab = 'pendaftaran'"
          >
            Pendaftaran
          </button>
        </div>

        <div class="text-xs text-slate-400">
          Pilih bagian lalu isi form di bawah
        </div>
      </div>

      {{-- ---- KATEGORI ---- --}}
      <div x-show="kTab === 'kategori'" x-cloak class="lomba-fade space-y-4">
        <div class="add-form-box">
          <div class="font-bold text-sm text-slate-900 mb-3">+ Tambah Kategori</div>

          <form action="{{ route('admin.site-settings.lomba.ketentuan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <input type="hidden" name="tab" value="kategori">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label class="field-label">Title</label>
                <input
                  name="title"
                  value="{{ old('tab') === 'kategori' ? old('title') : '' }}"
                  class="field-input"
                  placeholder="Contoh: PAUD / Sederajat"
                >
              </div>

              <div>
                <label class="field-label">Gambar (opsional)</label>
                <label class="flex items-center gap-2 w-full border border-dashed border-slate-200 rounded-lg px-3 py-2.5 cursor-pointer hover:border-[#0072BC] hover:bg-blue-50/20 transition-colors text-sm text-slate-500 bg-white">
                  <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/>
                  </svg>
                  Pilih gambar
                  <input type="file" name="image" class="hidden" accept="image/*">
                </label>
              </div>
            </div>

            <div>
              <label class="field-label">Deskripsi / Konten</label>
              <textarea name="content" required class="field-input min-h-[80px]" placeholder="Deskripsi singkat kategori...">{{ old('tab') === 'kategori' ? old('content') : '' }}</textarea>
            </div>

            <div class="flex items-center gap-4">
              <div class="w-32">
                <label class="field-label">Urutan</label>
                <select name="sort_order" class="field-input" required>
                  @for ($i = 1; $i <= $kategoriMaxSortOption; $i++)
                    @php $isUsed = $kategoriUsedSortOrders->contains($i); @endphp
                    <option
                      value="{{ $i }}"
                      {{ $isUsed ? 'disabled' : '' }}
                      {{ (string) (old('tab') === 'kategori' ? old('sort_order', $kategoriFirstAvailableSortOrder) : $kategoriFirstAvailableSortOrder) === (string) $i && ! $isUsed ? 'selected' : '' }}
                    >
                      {{ $i }}{{ $isUsed ? ' (used)' : '' }}
                    </option>
                  @endfor
                </select>
              </div>

              <label class="inline-flex items-center gap-2 mt-5 cursor-pointer">
                <input
                  type="checkbox"
                  name="is_active"
                  value="1"
                  {{ old('tab') === 'kategori' ? (old('is_active', 1) ? 'checked' : '') : 'checked' }}
                  class="w-4 h-4 accent-[#0072BC]"
                >
                <span class="text-sm font-medium text-slate-700">Aktif</span>
              </label>

              <div class="mt-5 ml-auto">
                <button type="submit" class="btn-primary">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                  </svg>
                  Tambah
                </button>
              </div>
            </div>
          </form>
        </div>

        <div class="text-xs text-slate-400 mb-2"><span class="font-bold text-slate-700">{{ $kategoriItems->count() }}</span> item</div>

        <div class="space-y-2.5">
          @forelse($kategoriItems as $item)
            @php $currentSortOrder = (int) $item->sort_order; @endphp

            <div class="item-row">
              <div class="item-row-head">
                <span class="text-xs font-black text-slate-400">#{{ $item->id }}</span>
                @if($item->title)
                  <span class="text-sm font-semibold text-slate-700">{{ $item->title }}</span>
                @endif
                <span class="badge ml-auto {{ $item->is_active ? 'badge-active' : 'badge-inactive' }}">
                  {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                </span>
                <span class="text-xs text-slate-400">Urut: {{ $item->sort_order }}</span>
              </div>

              <div class="item-row-body">
                <form action="{{ route('admin.site-settings.lomba.ketentuan.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="space-y-3">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="tab" value="kategori">

                  <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <div class="md:col-span-2">
                      <label class="field-label">Title</label>
                      <input name="title" value="{{ $item->title }}" class="field-input">
                    </div>

                    <div>
                      <label class="field-label">Urutan</label>
                      <select name="sort_order" class="field-input" required>
                        @for ($i = 1; $i <= $kategoriMaxSortOption; $i++)
                          @php $isUsedByOtherItem = $kategoriUsedSortOrders->contains($i) && $i !== $currentSortOrder; @endphp
                          <option
                            value="{{ $i }}"
                            {{ $isUsedByOtherItem ? 'disabled' : '' }}
                            {{ (string) $currentSortOrder === (string) $i ? 'selected' : '' }}
                          >
                            {{ $i }}{{ $isUsedByOtherItem ? ' (used)' : '' }}
                          </option>
                        @endfor
                      </select>
                    </div>
                  </div>

                  <div>
                    <label class="field-label">Konten</label>
                    <textarea name="content" required class="field-input min-h-[60px]">{{ $item->content }}</textarea>
                  </div>

                  <div class="flex items-center gap-3">
                    <label class="inline-flex items-center gap-2 cursor-pointer">
                      <input type="checkbox" name="is_active" value="1" {{ $item->is_active ? 'checked' : '' }} class="w-4 h-4 accent-[#0072BC]">
                      <span class="text-sm font-medium text-slate-700">Aktif</span>
                    </label>

                    <button type="submit" class="btn-primary ml-auto" style="padding:0.4rem 1rem;font-size:0.78rem;">
                      Simpan
                    </button>
                  </div>
                </form>

                <form action="{{ route('admin.site-settings.lomba.ketentuan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus?')" class="mt-2.5">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn-danger">Hapus</button>
                </form>
              </div>
            </div>
          @empty
            <div class="empty-state">
              <svg class="w-9 h-9 text-slate-200 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
              </svg>
              <div class="text-sm font-medium text-slate-500">Belum ada kategori</div>
            </div>
          @endforelse
        </div>
      </div>

      {{-- ---- PERSYARATAN ---- --}}
      <div x-show="kTab === 'persyaratan'" x-cloak class="lomba-fade space-y-4">
        <div class="add-form-box">
          <div class="font-bold text-sm text-slate-900 mb-3">+ Tambah Persyaratan</div>

          <form action="{{ route('admin.site-settings.lomba.ketentuan.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="tab" value="persyaratan">

            <div>
              <label class="field-label">Title (opsional)</label>
              <input name="title" value="{{ old('tab') === 'persyaratan' ? old('title') : '' }}" class="field-input" placeholder="Opsional">
            </div>

            <div>
              <label class="field-label">Konten</label>
              <textarea name="content" required class="field-input min-h-[80px]" placeholder="Contoh: Peserta merupakan siswa aktif...">{{ old('tab') === 'persyaratan' ? old('content') : '' }}</textarea>
            </div>

            <div class="flex items-center gap-4">
              <div class="w-32">
                <label class="field-label">Urutan</label>
                <select name="sort_order" class="field-input" required>
                  @for ($i = 1; $i <= $persyaratanMaxSortOption; $i++)
                    @php $isUsed = $persyaratanUsedSortOrders->contains($i); @endphp
                    <option
                      value="{{ $i }}"
                      {{ $isUsed ? 'disabled' : '' }}
                      {{ (string) (old('tab') === 'persyaratan' ? old('sort_order', $persyaratanFirstAvailableSortOrder) : $persyaratanFirstAvailableSortOrder) === (string) $i && ! $isUsed ? 'selected' : '' }}
                    >
                      {{ $i }}{{ $isUsed ? ' (used)' : '' }}
                    </option>
                  @endfor
                </select>
              </div>

              <label class="inline-flex items-center gap-2 mt-5 cursor-pointer">
                <input
                  type="checkbox"
                  name="is_active"
                  value="1"
                  {{ old('tab') === 'persyaratan' ? (old('is_active', 1) ? 'checked' : '') : 'checked' }}
                  class="w-4 h-4 accent-[#0072BC]"
                >
                <span class="text-sm font-medium text-slate-700">Aktif</span>
              </label>

              <div class="mt-5 ml-auto">
                <button type="submit" class="btn-primary">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                  </svg>
                  Tambah
                </button>
              </div>
            </div>
          </form>
        </div>

        <div class="text-xs text-slate-400 mb-2"><span class="font-bold text-slate-700">{{ $persyaratanItems->count() }}</span> item</div>

        <div class="space-y-2.5">
          @forelse($persyaratanItems as $item)
            @php $currentSortOrder = (int) $item->sort_order; @endphp

            <div class="item-row">
              <div class="item-row-head">
                <span class="text-xs font-black text-slate-400">#{{ $item->id }}</span>
                @if($item->title)
                  <span class="text-sm font-semibold text-slate-700">{{ $item->title }}</span>
                @endif
                <span class="badge ml-auto {{ $item->is_active ? 'badge-active' : 'badge-inactive' }}">
                  {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                </span>
                <span class="text-xs text-slate-400">Urut: {{ $item->sort_order }}</span>
              </div>

              <div class="item-row-body">
                <form action="{{ route('admin.site-settings.lomba.ketentuan.update', $item->id) }}" method="POST" class="space-y-3">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="tab" value="persyaratan">

                  <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <div class="md:col-span-2">
                      <label class="field-label">Title</label>
                      <input name="title" value="{{ $item->title }}" class="field-input">
                    </div>

                    <div>
                      <label class="field-label">Urutan</label>
                      <select name="sort_order" class="field-input" required>
                        @for ($i = 1; $i <= $persyaratanMaxSortOption; $i++)
                          @php $isUsedByOtherItem = $persyaratanUsedSortOrders->contains($i) && $i !== $currentSortOrder; @endphp
                          <option
                            value="{{ $i }}"
                            {{ $isUsedByOtherItem ? 'disabled' : '' }}
                            {{ (string) $currentSortOrder === (string) $i ? 'selected' : '' }}
                          >
                            {{ $i }}{{ $isUsedByOtherItem ? ' (used)' : '' }}
                          </option>
                        @endfor
                      </select>
                    </div>
                  </div>

                  <div>
                    <label class="field-label">Konten</label>
                    <textarea name="content" required class="field-input min-h-[60px]">{{ $item->content }}</textarea>
                  </div>

                  <div class="flex items-center gap-3">
                    <label class="inline-flex items-center gap-2 cursor-pointer">
                      <input type="checkbox" name="is_active" value="1" {{ $item->is_active ? 'checked' : '' }} class="w-4 h-4 accent-[#0072BC]">
                      <span class="text-sm font-medium text-slate-700">Aktif</span>
                    </label>

                    <button type="submit" class="btn-primary ml-auto" style="padding:0.4rem 1rem;font-size:0.78rem;">
                      Simpan
                    </button>
                  </div>
                </form>

                <form action="{{ route('admin.site-settings.lomba.ketentuan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus?')" class="mt-2.5">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn-danger">Hapus</button>
                </form>
              </div>
            </div>
          @empty
            <div class="empty-state">
              <svg class="w-9 h-9 text-slate-200 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
              </svg>
              <div class="text-sm font-medium text-slate-500">Belum ada persyaratan</div>
            </div>
          @endforelse
        </div>
      </div>

      {{-- ---- PENDAFTARAN ---- --}}
      <div x-show="kTab === 'pendaftaran'" x-cloak class="lomba-fade space-y-4">
        <div class="add-form-box">
          <div class="font-bold text-sm text-slate-900 mb-3">+ Tambah Pendaftaran</div>

          <form action="{{ route('admin.site-settings.lomba.ketentuan.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="tab" value="pendaftaran">

            <div>
              <label class="field-label">Title (opsional)</label>
              <input name="title" value="{{ old('tab') === 'pendaftaran' ? old('title') : '' }}" class="field-input" placeholder="Opsional">
            </div>

            <div>
              <label class="field-label">Konten</label>
              <textarea name="content" required class="field-input min-h-[80px]" placeholder="Contoh: Pendaftaran dibuka mulai...">{{ old('tab') === 'pendaftaran' ? old('content') : '' }}</textarea>
            </div>

            <div class="flex items-center gap-4">
              <div class="w-32">
                <label class="field-label">Urutan</label>
                <select name="sort_order" class="field-input" required>
                  @for ($i = 1; $i <= $pendaftaranMaxSortOption; $i++)
                    @php $isUsed = $pendaftaranUsedSortOrders->contains($i); @endphp
                    <option
                      value="{{ $i }}"
                      {{ $isUsed ? 'disabled' : '' }}
                      {{ (string) (old('tab') === 'pendaftaran' ? old('sort_order', $pendaftaranFirstAvailableSortOrder) : $pendaftaranFirstAvailableSortOrder) === (string) $i && ! $isUsed ? 'selected' : '' }}
                    >
                      {{ $i }}{{ $isUsed ? ' (used)' : '' }}
                    </option>
                  @endfor
                </select>
              </div>

              <label class="inline-flex items-center gap-2 mt-5 cursor-pointer">
                <input
                  type="checkbox"
                  name="is_active"
                  value="1"
                  {{ old('tab') === 'pendaftaran' ? (old('is_active', 1) ? 'checked' : '') : 'checked' }}
                  class="w-4 h-4 accent-[#0072BC]"
                >
                <span class="text-sm font-medium text-slate-700">Aktif</span>
              </label>

              <div class="mt-5 ml-auto">
                <button type="submit" class="btn-primary">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                  </svg>
                  Tambah
                </button>
              </div>
            </div>
          </form>
        </div>

        <div class="text-xs text-slate-400 mb-2"><span class="font-bold text-slate-700">{{ $pendaftaranItems->count() }}</span> item</div>

        <div class="space-y-2.5">
          @forelse($pendaftaranItems as $item)
            @php $currentSortOrder = (int) $item->sort_order; @endphp

            <div class="item-row">
              <div class="item-row-head">
                <span class="text-xs font-black text-slate-400">#{{ $item->id }}</span>
                @if($item->title)
                  <span class="text-sm font-semibold text-slate-700">{{ $item->title }}</span>
                @endif
                <span class="badge ml-auto {{ $item->is_active ? 'badge-active' : 'badge-inactive' }}">
                  {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                </span>
                <span class="text-xs text-slate-400">Urut: {{ $item->sort_order }}</span>
              </div>

              <div class="item-row-body">
                <form action="{{ route('admin.site-settings.lomba.ketentuan.update', $item->id) }}" method="POST" class="space-y-3">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="tab" value="pendaftaran">

                  <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <div class="md:col-span-2">
                      <label class="field-label">Title</label>
                      <input name="title" value="{{ $item->title }}" class="field-input">
                    </div>

                    <div>
                      <label class="field-label">Urutan</label>
                      <select name="sort_order" class="field-input" required>
                        @for ($i = 1; $i <= $pendaftaranMaxSortOption; $i++)
                          @php $isUsedByOtherItem = $pendaftaranUsedSortOrders->contains($i) && $i !== $currentSortOrder; @endphp
                          <option
                            value="{{ $i }}"
                            {{ $isUsedByOtherItem ? 'disabled' : '' }}
                            {{ (string) $currentSortOrder === (string) $i ? 'selected' : '' }}
                          >
                            {{ $i }}{{ $isUsedByOtherItem ? ' (used)' : '' }}
                          </option>
                        @endfor
                      </select>
                    </div>
                  </div>

                  <div>
                    <label class="field-label">Konten</label>
                    <textarea name="content" required class="field-input min-h-[60px]">{{ $item->content }}</textarea>
                  </div>

                  <div class="flex items-center gap-3">
                    <label class="inline-flex items-center gap-2 cursor-pointer">
                      <input type="checkbox" name="is_active" value="1" {{ $item->is_active ? 'checked' : '' }} class="w-4 h-4 accent-[#0072BC]">
                      <span class="text-sm font-medium text-slate-700">Aktif</span>
                    </label>

                    <button type="submit" class="btn-primary ml-auto" style="padding:0.4rem 1rem;font-size:0.78rem;">
                      Simpan
                    </button>
                  </div>
                </form>

                <form action="{{ route('admin.site-settings.lomba.ketentuan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus?')" class="mt-2.5">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn-danger">Hapus</button>
                </form>
              </div>
            </div>
          @empty
            <div class="empty-state">
              <svg class="w-9 h-9 text-slate-200 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
              </svg>
              <div class="text-sm font-medium text-slate-500">Belum ada item pendaftaran</div>
            </div>
          @endforelse
        </div>
      </div>
    </div>

    {{-- =========================
        SECTION: TAHAPAN
    ========================= --}}
    <div x-show="lombaSection === 'tahapan'" x-cloak class="lomba-fade">
      <div class="add-form-box">
        <div class="font-bold text-sm text-slate-900 mb-3">+ Tambah Tahapan</div>

        <form action="{{ route('admin.site-settings.lomba.tahapan.store') }}" method="POST" class="space-y-4">
          @csrf

          <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
            <div>
              <label class="field-label">Step</label>
              <select name="step_number" class="field-input" required>
                @for ($i = 1; $i <= $maxStepNumberOption; $i++)
                  @php $isUsed = $usedStepNumbers->contains($i); @endphp
                  <option
                    value="{{ $i }}"
                    {{ $isUsed ? 'disabled' : '' }}
                    {{ (string) old('step_number', $firstAvailableStepNumber) === (string) $i && ! $isUsed ? 'selected' : '' }}
                  >
                    {{ $i }}{{ $isUsed ? ' (used)' : '' }}
                  </option>
                @endfor
              </select>
            </div>

            <div class="md:col-span-2">
              <label class="field-label">Judul</label>
              <input
                type="text"
                name="title"
                value="{{ old('title') }}"
                class="field-input"
                placeholder="Contoh: Pendaftaran"
                required
              >
            </div>

            <div>
              <label class="field-label">Urutan</label>
              <select name="sort_order" class="field-input" required>
                @for ($i = 1; $i <= $maxSortOrderOptionTahapan; $i++)
                  @php $isUsed = $usedSortOrdersTahapan->contains($i); @endphp
                  <option
                    value="{{ $i }}"
                    {{ $isUsed ? 'disabled' : '' }}
                    {{ (string) old('sort_order', $firstAvailableSortOrderTahapan) === (string) $i && ! $isUsed ? 'selected' : '' }}
                  >
                    {{ $i }}{{ $isUsed ? ' (used)' : '' }}
                  </option>
                @endfor
              </select>
            </div>
          </div>

          <div>
            <label class="field-label">Deskripsi (opsional)</label>
            <textarea
              name="description"
              class="w-full border rounded-xl px-3 py-2 min-h-[70px]"
              placeholder="1 baris = 1 bullet"
            >{{ old('description') }}</textarea>
          </div>

          <div class="flex items-center gap-4">
            <label class="inline-flex items-center gap-2 cursor-pointer">
              <input
                type="checkbox"
                name="is_active"
                value="1"
                {{ old('is_active', 1) ? 'checked' : '' }}
                class="w-4 h-4 accent-[#0072BC]"
              >
              <span class="text-sm font-medium text-slate-700">Aktif</span>
            </label>

            <div class="ml-auto">
              <button type="submit" class="btn-primary">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Tahapan
              </button>
            </div>
          </div>
        </form>
      </div>

      <div class="space-y-4 mt-6">
        @forelse($tahapanItems as $step)
          @php
            $currentStepNumber = (int) $step->step_number;
            $currentSortOrder = (int) $step->sort_order;
            $bulletsText = is_array($step->bullets) && count($step->bullets) ? implode("\n", $step->bullets) : '';
          @endphp

          <div class="rounded-xl border p-4 bg-white">
            <form method="POST" action="{{ route('admin.site-settings.lomba.tahapan.update', $step->id) }}" class="space-y-3">
              @csrf
              @method('PUT')

              <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
                <div>
                  <label class="field-label">Step</label>
                  <select name="step_number" class="w-full border rounded-xl px-3 py-2" required>
                    @for ($i = 1; $i <= $maxStepNumberOption; $i++)
                      @php $isUsedByOther = $usedStepNumbers->contains($i) && $i !== $currentStepNumber; @endphp
                      <option
                        value="{{ $i }}"
                        {{ $isUsedByOther ? 'disabled' : '' }}
                        {{ (string) $currentStepNumber === (string) $i ? 'selected' : '' }}
                      >
                        {{ $i }}{{ $isUsedByOther ? ' (used)' : '' }}
                      </option>
                    @endfor
                  </select>
                </div>

                <div class="md:col-span-2">
                  <label class="field-label">Judul</label>
                  <input
                    type="text"
                    name="title"
                    value="{{ $step->title }}"
                    class="w-full border rounded-xl px-3 py-2"
                    required
                  >
                </div>

                <div>
                  <label class="field-label">Urutan</label>
                  <select name="sort_order" class="w-full border rounded-xl px-3 py-2" required>
                    @for ($i = 1; $i <= $maxSortOrderOptionTahapan; $i++)
                      @php $isUsedByOther = $usedSortOrdersTahapan->contains($i) && $i !== $currentSortOrder; @endphp
                      <option
                        value="{{ $i }}"
                        {{ $isUsedByOther ? 'disabled' : '' }}
                        {{ (string) $currentSortOrder === (string) $i ? 'selected' : '' }}
                      >
                        {{ $i }}{{ $isUsedByOther ? ' (used)' : '' }}
                      </option>
                    @endfor
                  </select>
                </div>
              </div>

              <div>
                <label class="field-label">Deskripsi (opsional)</label>
                <textarea
                  name="description"
                  class="w-full border rounded-xl px-3 py-2 min-h-[70px]"
                  placeholder="1 baris = 1 bullet"
                >{{ $bulletsText }}</textarea>
              </div>

              <div class="flex items-center gap-3">
                <label class="inline-flex items-center gap-2 cursor-pointer">
                  <input
                    type="checkbox"
                    name="is_active"
                    value="1"
                    {{ $step->is_active ? 'checked' : '' }}
                    class="w-4 h-4 accent-[#0072BC]"
                  >
                  <span class="text-sm font-medium text-slate-700">Aktif</span>
                </label>

                <button type="submit" class="btn-primary ml-auto" style="padding:0.4rem 1rem;font-size:0.78rem;">
                  Simpan
                </button>
              </div>
            </form>

            <form method="POST" action="{{ route('admin.site-settings.lomba.tahapan.destroy', $step->id) }}" class="mt-2.5">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn-danger">Hapus</button>
            </form>
          </div>
        @empty
          <div class="empty-state">
            <svg class="w-9 h-9 text-slate-200 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <div class="text-sm font-medium text-slate-500">Belum ada tahapan</div>
          </div>
        @endforelse
      </div>
    </div>
  </div>
</div>

     
   {{-- ===========================
    TAB: PENGUMUMAN
============================ --}}
@php
  $tigaBesar  = ($pengumuman ?? collect())->where('type', 'tiga_besar')->first();
  $lolosItem  = ($pengumuman ?? collect())->where('type', 'lolos')->first();

  $allGroups   = $pengumumanGroups ?? collect();
  $allEntries  = $pengumumanEntries ?? collect();

  $groupsTB    = $allGroups->where('pengumuman_id', optional($tigaBesar)->id)->values();
  $groupsLolos = $allGroups->where('pengumuman_id', optional($lolosItem)->id)->values();

  $groupsTBUsedSortOrders = $groupsTB->pluck('sort_order')
      ->filter(fn ($value) => $value !== null && $value !== '')
      ->map(fn ($value) => (int) $value)
      ->filter(fn ($value) => $value >= 1)
      ->unique()
      ->sort()
      ->values();

  $groupsLolosUsedSortOrders = $groupsLolos->pluck('sort_order')
      ->filter(fn ($value) => $value !== null && $value !== '')
      ->map(fn ($value) => (int) $value)
      ->filter(fn ($value) => $value >= 1)
      ->unique()
      ->sort()
      ->values();

  $groupsTBMaxSortOption = max((int) ($groupsTBUsedSortOrders->max() ?? 0), $groupsTB->count(), 1) + 5;
  $groupsLolosMaxSortOption = max((int) ($groupsLolosUsedSortOrders->max() ?? 0), $groupsLolos->count(), 1) + 5;

  $groupsTBFirstAvailableSortOrder = 1;
  for ($i = 1; $i <= $groupsTBMaxSortOption; $i++) {
      if (! $groupsTBUsedSortOrders->contains($i)) {
          $groupsTBFirstAvailableSortOrder = $i;
          break;
      }
  }

  $groupsLolosFirstAvailableSortOrder = 1;
  for ($i = 1; $i <= $groupsLolosMaxSortOption; $i++) {
      if (! $groupsLolosUsedSortOrders->contains($i)) {
          $groupsLolosFirstAvailableSortOrder = $i;
          break;
      }
  }
@endphp

<div x-show="tab==='pengumuman'" x-cloak class="tab-content"
     x-data="{
       pgSection: '',
       pgView: '',
       activeGroupId: null,
       activeGroupName: ''
     }">
  <div class="card">

    {{-- ===== DYNAMIC HEADER ===== --}}
    <div class="flex items-center gap-3 mb-1">
      <button type="button"
        x-show="pgSection !== ''"
        x-cloak
        class="back-btn"
        @click="pgView = ''; activeGroupId = null; activeGroupName = ''; pgSection = pgView === 'entries' ? pgSection : ''">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
        </svg>
        Kembali
      </button>
      <div>
        <div class="card-title" x-text="
          pgView === 'entries' || pgView === 'entries_lolos' ? activeGroupName :
          pgSection === 'tiga_besar' ? 'Pengumuman – 3 Besar' :
          pgSection === 'lolos' ? 'Pengumuman – Lolos Seleksi Proposal' :
          'Pengumuman'
        "></div>
        <div class="card-sub" x-text="
          pgView === 'entries' || pgView === 'entries_lolos' ? 'Kelola daftar tim di jenjang ini.' :
          pgSection !== '' ? 'Pilih bagian yang ingin dikelola.' :
          'Pilih jenis pengumuman yang ingin dikelola.'
        "></div>
      </div>
    </div>

    <hr class="section-divider">

    {{-- ===== LANDING: 2 PILIHAN ===== --}}
    <div x-show="pgSection === ''" class="lomba-fade grid grid-cols-1 sm:grid-cols-2 gap-4">
      <button type="button" class="lomba-nav-card" @click="pgSection = 'tiga_besar'; pgView = 'main'">
        <div class="lnc-icon">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
          </svg>
        </div>
        <div class="flex-1 min-w-0">
          <div class="font-bold text-[0.9rem] text-slate-900">3 Besar</div>
          <div class="text-xs text-slate-400 mt-0.5">Data pemenang & finalis terbaik</div>
        </div>
        <svg class="lnc-arrow w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
      </button>

      <button type="button" class="lomba-nav-card" @click="pgSection = 'lolos'; pgView = 'main'">
        <div class="lnc-icon">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
        </div>
        <div class="flex-1 min-w-0">
          <div class="font-bold text-[0.9rem] text-slate-900">Lolos Seleksi Proposal</div>
          <div class="text-xs text-slate-400 mt-0.5">Tim yang lolos tahap seleksi proposal</div>
        </div>
        <svg class="lnc-arrow w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
      </button>
    </div>

    {{-- ====== 3 BESAR - MAIN VIEW ====== --}}
    <div x-show="pgSection === 'tiga_besar' && pgView === 'main'" x-cloak class="lomba-fade space-y-5">

      {{-- 1. EDIT JUDUL HALAMAN --}}
      <div class="rounded-xl border-2 border-dashed border-slate-200 bg-slate-50/50 p-5">
        <div class="flex items-center gap-2 mb-4">
          <div class="w-7 h-7 rounded-lg bg-amber-100 flex items-center justify-center shrink-0">
            <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
          </div>
          <div>
            <div class="font-bold text-sm text-slate-900">Judul Halaman</div>
            <div class="text-xs text-slate-400">Teks yang tampil sebagai judul besar di halaman publik</div>
          </div>
        </div>

        @if($tigaBesar)
          <form action="{{ route('admin.site-settings.pengumuman.update', $tigaBesar->id) }}" method="POST" class="space-y-3">
            @csrf @method('PUT')
            <input type="hidden" name="type" value="tiga_besar">
            <input type="hidden" name="sort_order" value="{{ $tigaBesar->sort_order }}">
            <input type="hidden" name="is_active" value="{{ $tigaBesar->is_active ? '1' : '0' }}">
            <div>
              <label class="field-label">Judul Utama</label>
              <input type="text" name="title" value="{{ $tigaBesar->title }}" class="field-input" placeholder="Contoh: PENGUMUMAN 3 BESAR" required>
            </div>
            <div>
              <label class="field-label">Subjudul / Deskripsi</label>
              <textarea name="content" class="field-input min-h-[70px]" placeholder="Contoh: Wujudkan Indonesia Cerdas">{{ $tigaBesar->content }}</textarea>
            </div>
            <button type="submit" class="btn-primary" style="padding:0.45rem 1rem;font-size:0.8rem;">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
              Simpan Judul
            </button>
          </form>
        @else
          <form action="{{ route('admin.site-settings.pengumuman.store') }}" method="POST" class="space-y-3">
            @csrf
            <input type="hidden" name="type" value="tiga_besar">
            <input type="hidden" name="sort_order" value="1">
            <input type="hidden" name="is_active" value="1">
            <div>
              <label class="field-label">Judul Utama</label>
              <input type="text" name="title" class="field-input" placeholder="Contoh: PENGUMUMAN 3 BESAR" required>
            </div>
            <div>
              <label class="field-label">Subjudul / Deskripsi</label>
              <textarea name="content" class="field-input min-h-[70px]" placeholder="Contoh: Wujudkan Indonesia Cerdas"></textarea>
            </div>
            <button type="submit" class="btn-primary" style="padding:0.45rem 1rem;font-size:0.8rem;">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
              Buat Judul
            </button>
          </form>
        @endif
      </div>

      <hr class="section-divider">

      {{-- 2. JENJANG / GROUP --}}
      <div>
        <div class="flex items-center justify-between mb-4">
          <div>
            <div class="font-bold text-sm text-slate-900">Jenjang</div>
            <div class="text-xs text-slate-400 mt-0.5">Klik jenjang untuk kelola daftar tim</div>
          </div>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 mb-4">
          @foreach($groupsTB as $group)
            <button type="button"
              class="flex flex-col items-center justify-center gap-2 rounded-xl border-2 border-slate-200 bg-white p-4 text-center hover:border-[#0072BC] hover:bg-blue-50/30 transition-all group"
              @click="pgView = 'entries'; activeGroupId = {{ $group->id }}; activeGroupName = '{{ addslashes($group->subtitle) }}'">
              <div class="w-10 h-10 rounded-xl bg-slate-100 group-hover:bg-[#0072BC] flex items-center justify-center transition-colors">
                <svg class="w-5 h-5 text-slate-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
              </div>
              <div class="font-bold text-xs text-slate-800 group-hover:text-[#0072BC] transition-colors leading-tight">{{ $group->subtitle }}</div>
              <div class="text-[10px] text-slate-400">
                {{ $allEntries->where('pengumuman_group_id', $group->id)->count() }} tim
              </div>
            </button>
          @endforeach

          <button type="button"
            class="flex flex-col items-center justify-center gap-2 rounded-xl border-2 border-dashed border-slate-200 bg-slate-50 p-4 text-center hover:border-[#0072BC] hover:bg-blue-50/20 transition-all group"
            @click="pgView = 'add_group'">
            <div class="w-10 h-10 rounded-xl bg-white border border-slate-200 group-hover:bg-[#0072BC] flex items-center justify-center transition-colors">
              <svg class="w-5 h-5 text-slate-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
              </svg>
            </div>
            <div class="font-bold text-xs text-slate-500 group-hover:text-[#0072BC] transition-colors">Tambah Jenjang</div>
          </button>
        </div>
      </div>
    </div>

    {{-- ====== 3 BESAR - TAMBAH JENJANG ====== --}}
    <div x-show="pgSection === 'tiga_besar' && pgView === 'add_group'" x-cloak class="lomba-fade">
      <div class="flex items-center gap-2 mb-4">
        <button type="button" class="back-btn" @click="pgView = 'main'">
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
          Kembali
        </button>
        <span class="text-sm font-bold text-slate-700">Tambah Jenjang Baru</span>
      </div>

      <div class="add-form-box">
        <form action="{{ route('admin.site-settings.pengumuman-groups.store') }}" method="POST" class="space-y-4">
          @csrf
          <input type="hidden" name="pengumuman_id" value="{{ optional($tigaBesar)->id }}">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="field-label">Nama Jenjang (Subtitle)</label>
              <input type="text" name="subtitle" class="field-input" placeholder="Contoh: PAUD / SD / SMP / SMK" required>
            </div>
            <div>
              <label class="field-label">Title (opsional)</label>
              <input type="text" name="title" class="field-input" placeholder="Contoh: 10 TIM PESERTA">
            </div>
          </div>
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="field-label">Slug</label>
              <input type="text" name="slug" class="field-input" placeholder="Contoh: paud" required>
            </div>
            <div>
              <label class="field-label">Urutan</label>
              <select name="sort_order" class="field-input" required>
                @for ($i = 1; $i <= $groupsTBMaxSortOption; $i++)
                  @php $isUsed = $groupsTBUsedSortOrders->contains($i); @endphp
                  <option
                    value="{{ $i }}"
                    {{ $isUsed ? 'disabled' : '' }}
                    {{ (string) $groupsTBFirstAvailableSortOrder === (string) $i && ! $isUsed ? 'selected' : '' }}
                  >
                    {{ $i }}{{ $isUsed ? ' (used)' : '' }}
                  </option>
                @endfor
              </select>
            </div>
          </div>
          <div class="flex items-center justify-between">
            <label class="inline-flex items-center gap-2 cursor-pointer">
              <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 accent-[#0072BC]">
              <span class="text-sm font-medium text-slate-700">Aktif</span>
            </label>
            <button type="submit" class="btn-primary">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
              Tambah Jenjang
            </button>
          </div>
        </form>
      </div>
    </div>

    {{-- ====== 3 BESAR - LIST TIM PER JENJANG ====== --}}
    <div x-show="pgSection === 'tiga_besar' && pgView === 'entries'" x-cloak class="lomba-fade space-y-5">
      <div class="flex items-center gap-2 mb-1">
        <button type="button" class="back-btn" @click="pgView = 'main'; activeGroupId = null; activeGroupName = ''">
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
          Kembali ke Jenjang
        </button>
      </div>

      <div class="add-form-box">
        <div class="font-bold text-sm text-slate-900 mb-3">+ Tambah Tim</div>
        <form action="{{ route('admin.site-settings.pengumuman-entries.store') }}" method="POST" class="space-y-4">
          @csrf
          <input type="hidden" name="pengumuman_group_id" :value="activeGroupId">

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="field-label">Nama Tim</label>
              <input type="text" name="team_name" class="field-input" required>
            </div>
            <div>
              <label class="field-label">Nama Sekolah</label>
              <input type="text" name="school_name" class="field-input" required>
            </div>
          </div>

          <template x-for="group in {{ \Illuminate\Support\Js::from($groupsTB->map(function ($group) use ($allEntries) {
              $entries = $allEntries->where('pengumuman_group_id', $group->id)->values();

              $usedRankOrders = $entries->pluck('rank_order')
                  ->filter(fn ($value) => $value !== null && $value !== '')
                  ->map(fn ($value) => (int) $value)
                  ->filter(fn ($value) => $value >= 1)
                  ->unique()
                  ->sort()
                  ->values();

              $usedSortOrders = $entries->pluck('sort_order')
                  ->filter(fn ($value) => $value !== null && $value !== '')
                  ->map(fn ($value) => (int) $value)
                  ->filter(fn ($value) => $value >= 1)
                  ->unique()
                  ->sort()
                  ->values();

              $maxRankOption = max((int) ($usedRankOrders->max() ?? 0), $entries->count(), 1) + 5;
              $maxSortOption = max((int) ($usedSortOrders->max() ?? 0), $entries->count(), 1) + 5;

              return [
                  'id' => $group->id,
                  'rankOptions' => collect(range(1, $maxRankOption))->map(fn ($i) => [
                      'value' => $i,
                      'used' => $usedRankOrders->contains($i),
                  ])->values(),
                  'sortOptions' => collect(range(1, $maxSortOption))->map(fn ($i) => [
                      'value' => $i,
                      'used' => $usedSortOrders->contains($i),
                  ])->values(),
              ];
          })->values()) }}" :key="group.id">
            <div x-show="activeGroupId === group.id" class="grid grid-cols-3 gap-4">
              <div>
                <label class="field-label">Rank</label>
                <select name="rank_order" class="field-input" required>
                  <template x-for="option in group.rankOptions" :key="'rank-' + group.id + '-' + option.value">
                    <option :value="option.value" :disabled="option.used" x-text="option.value + (option.used ? ' (used)' : '')"></option>
                  </template>
                </select>
              </div>

              <div>
                <label class="field-label">Urutan</label>
                <select name="sort_order" class="field-input" required>
                  <template x-for="option in group.sortOptions" :key="'sort-' + group.id + '-' + option.value">
                    <option :value="option.value" :disabled="option.used" x-text="option.value + (option.used ? ' (used)' : '')"></option>
                  </template>
                </select>
              </div>

              <div class="flex flex-col justify-end pb-1 gap-2">
                <label class="inline-flex items-center gap-2 cursor-pointer">
                  <input type="checkbox" name="is_preview" value="1" class="w-4 h-4 accent-[#0072BC]">
                  <span class="text-xs font-medium text-slate-700">Preview</span>
                </label>
                <label class="inline-flex items-center gap-2 cursor-pointer">
                  <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 accent-[#0072BC]">
                  <span class="text-xs font-medium text-slate-700">Aktif</span>
                </label>
              </div>
            </div>
          </template>

          <div class="flex justify-end">
            <button type="submit" class="btn-primary">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
              Tambah Tim
            </button>
          </div>
        </form>
      </div>

      @foreach($groupsTB as $group)
        @php
          $groupEntries = $allEntries->where('pengumuman_group_id', $group->id)->values();

          $usedRankOrders = $groupEntries->pluck('rank_order')
              ->filter(fn ($value) => $value !== null && $value !== '')
              ->map(fn ($value) => (int) $value)
              ->filter(fn ($value) => $value >= 1)
              ->unique()
              ->sort()
              ->values();

          $usedSortOrders = $groupEntries->pluck('sort_order')
              ->filter(fn ($value) => $value !== null && $value !== '')
              ->map(fn ($value) => (int) $value)
              ->filter(fn ($value) => $value >= 1)
              ->unique()
              ->sort()
              ->values();

          $maxRankOption = max((int) ($usedRankOrders->max() ?? 0), $groupEntries->count(), 1) + 5;
          $maxSortOption = max((int) ($usedSortOrders->max() ?? 0), $groupEntries->count(), 1) + 5;
        @endphp

        <div x-show="activeGroupId === {{ $group->id }}">
          <div class="text-xs text-slate-400 mb-3">
            <span class="font-bold text-slate-700">{{ $groupEntries->count() }}</span> tim di jenjang <span class="font-bold text-[#0072BC]">{{ $group->subtitle }}</span>
          </div>

          <div class="space-y-2.5">
            @forelse($groupEntries as $entry)
              @php
                $currentRankOrder = (int) $entry->rank_order;
                $currentSortOrder = (int) $entry->sort_order;
              @endphp

              <div class="item-row">
                <div class="item-row-head">
                  <span class="step-bubble">{{ $entry->rank_order }}</span>
                  <span class="font-semibold text-sm text-slate-800">{{ $entry->team_name }}</span>
                  <span class="text-xs text-slate-400 truncate">{{ $entry->school_name }}</span>
                  <span class="badge ml-auto {{ $entry->is_active ? 'badge-active' : 'badge-inactive' }}">{{ $entry->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                </div>

                <div class="item-row-body">
                  <form action="{{ route('admin.site-settings.pengumuman-entries.update', $entry->id) }}" method="POST" class="space-y-3">
                    @csrf @method('PUT')
                    <input type="hidden" name="pengumuman_group_id" value="{{ $entry->pengumuman_group_id }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                      <div>
                        <label class="field-label">Nama Tim</label>
                        <input type="text" name="team_name" value="{{ $entry->team_name }}" class="field-input" required>
                      </div>
                      <div>
                        <label class="field-label">Nama Sekolah</label>
                        <input type="text" name="school_name" value="{{ $entry->school_name }}" class="field-input" required>
                      </div>
                    </div>

                    <div class="grid grid-cols-3 gap-3">
                      <div>
                        <label class="field-label">Rank</label>
                        <select name="rank_order" class="field-input" required>
                          @for ($i = 1; $i <= $maxRankOption; $i++)
                            @php $isUsedByOther = $usedRankOrders->contains($i) && $i !== $currentRankOrder; @endphp
                            <option
                              value="{{ $i }}"
                              {{ $isUsedByOther ? 'disabled' : '' }}
                              {{ (string) $currentRankOrder === (string) $i ? 'selected' : '' }}
                            >
                              {{ $i }}{{ $isUsedByOther ? ' (used)' : '' }}
                            </option>
                          @endfor
                        </select>
                      </div>

                      <div>
                        <label class="field-label">Urutan</label>
                        <select name="sort_order" class="field-input" required>
                          @for ($i = 1; $i <= $maxSortOption; $i++)
                            @php $isUsedByOther = $usedSortOrders->contains($i) && $i !== $currentSortOrder; @endphp
                            <option
                              value="{{ $i }}"
                              {{ $isUsedByOther ? 'disabled' : '' }}
                              {{ (string) $currentSortOrder === (string) $i ? 'selected' : '' }}
                            >
                              {{ $i }}{{ $isUsedByOther ? ' (used)' : '' }}
                            </option>
                          @endfor
                        </select>
                      </div>

                      <div class="flex flex-col justify-end pb-1 gap-1.5">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                          <input type="checkbox" name="is_preview" value="1" {{ $entry->is_preview ? 'checked' : '' }} class="w-4 h-4 accent-[#0072BC]">
                          <span class="text-xs font-medium text-slate-700">Preview</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                          <input type="checkbox" name="is_active" value="1" {{ $entry->is_active ? 'checked' : '' }} class="w-4 h-4 accent-[#0072BC]">
                          <span class="text-xs font-medium text-slate-700">Aktif</span>
                        </label>
                      </div>
                    </div>

                    <div class="flex justify-end">
                      <button type="submit" class="btn-primary" style="padding:0.4rem 1rem;font-size:0.78rem;">Simpan</button>
                    </div>
                  </form>

                  <form action="{{ route('admin.site-settings.pengumuman-entries.destroy', $entry->id) }}" method="POST" onsubmit="return confirm('Hapus tim ini?')" class="mt-2.5">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn-danger">Hapus</button>
                  </form>
                </div>
              </div>
            @empty
              <div class="empty-state">
                <svg class="w-9 h-9 text-slate-200 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                <div class="text-sm font-medium text-slate-500">Belum ada tim di jenjang ini</div>
              </div>
            @endforelse
          </div>
        </div>
      @endforeach
    </div>

    {{-- LOLOS - MAIN VIEW --}}
    <div x-show="pgSection === 'lolos' && pgView === 'main'" x-cloak class="lomba-fade space-y-5">
      <div class="rounded-xl border-2 border-dashed border-slate-200 bg-slate-50/50 p-5">
        <div class="flex items-center gap-2 mb-4">
          <div class="w-7 h-7 rounded-lg bg-amber-100 flex items-center justify-center shrink-0">
            <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
          </div>
          <div>
            <div class="font-bold text-sm text-slate-900">Judul Halaman</div>
            <div class="text-xs text-slate-400">Teks yang tampil sebagai judul besar di halaman publik</div>
          </div>
        </div>

        @if($lolosItem)
          <form action="{{ route('admin.site-settings.pengumuman.update', $lolosItem->id) }}" method="POST" class="space-y-3">
            @csrf @method('PUT')
            <input type="hidden" name="type" value="lolos">
            <input type="hidden" name="sort_order" value="{{ $lolosItem->sort_order }}">
            <input type="hidden" name="is_active" value="{{ $lolosItem->is_active ? '1' : '0' }}">
            <div>
              <label class="field-label">Judul Utama</label>
              <input type="text" name="title" value="{{ $lolosItem->title }}" class="field-input" placeholder="Contoh: Pengumuman Peserta Lolos Seleksi Proposal" required>
            </div>
            <div>
              <label class="field-label">Subjudul / Deskripsi</label>
              <textarea name="content" class="field-input min-h-[70px]" placeholder="Deskripsi singkat...">{{ $lolosItem->content }}</textarea>
            </div>
            <button type="submit" class="btn-primary" style="padding:0.45rem 1rem;font-size:0.8rem;">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
              Simpan Judul
            </button>
          </form>
        @else
          <form action="{{ route('admin.site-settings.pengumuman.store') }}" method="POST" class="space-y-3">
            @csrf
            <input type="hidden" name="type" value="lolos">
            <input type="hidden" name="sort_order" value="1">
            <input type="hidden" name="is_active" value="1">
            <div>
              <label class="field-label">Judul Utama</label>
              <input type="text" name="title" class="field-input" placeholder="Contoh: Pengumuman Peserta Lolos Seleksi Proposal" required>
            </div>
            <div>
              <label class="field-label">Subjudul / Deskripsi</label>
              <textarea name="content" class="field-input min-h-[70px]" placeholder="Deskripsi singkat..."></textarea>
            </div>
            <button type="submit" class="btn-primary" style="padding:0.45rem 1rem;font-size:0.8rem;">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
              Buat Judul
            </button>
          </form>
        @endif
      </div>

      <hr class="section-divider">

      <div>
        <div class="flex items-center justify-between mb-4">
          <div>
            <div class="font-bold text-sm text-slate-900">Jenjang</div>
            <div class="text-xs text-slate-400 mt-0.5">Klik jenjang untuk kelola daftar tim</div>
          </div>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 mb-4">
          @foreach($groupsLolos as $group)
            <button type="button"
              class="flex flex-col items-center justify-center gap-2 rounded-xl border-2 border-slate-200 bg-white p-4 text-center hover:border-[#0072BC] hover:bg-blue-50/30 transition-all group"
              @click="pgView = 'entries_lolos'; activeGroupId = {{ $group->id }}; activeGroupName = '{{ addslashes($group->subtitle) }}'">
              <div class="w-10 h-10 rounded-xl bg-slate-100 group-hover:bg-[#0072BC] flex items-center justify-center transition-colors">
                <svg class="w-5 h-5 text-slate-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
              </div>
              <div class="font-bold text-xs text-slate-800 group-hover:text-[#0072BC] transition-colors leading-tight">{{ $group->subtitle }}</div>
              <div class="text-[10px] text-slate-400">
                {{ $allEntries->where('pengumuman_group_id', $group->id)->count() }} tim
              </div>
            </button>
          @endforeach

          <button type="button"
            class="flex flex-col items-center justify-center gap-2 rounded-xl border-2 border-dashed border-slate-200 bg-slate-50 p-4 text-center hover:border-[#0072BC] hover:bg-blue-50/20 transition-all group"
            @click="pgView = 'add_group_lolos'">
            <div class="w-10 h-10 rounded-xl bg-white border border-slate-200 group-hover:bg-[#0072BC] flex items-center justify-center transition-colors">
              <svg class="w-5 h-5 text-slate-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
              </svg>
            </div>
            <div class="font-bold text-xs text-slate-500 group-hover:text-[#0072BC] transition-colors">Tambah Jenjang</div>
          </button>
        </div>
      </div>
    </div>

    {{-- LOLOS - TAMBAH JENJANG --}}
    <div x-show="pgSection === 'lolos' && pgView === 'add_group_lolos'" x-cloak class="lomba-fade">
      <div class="flex items-center gap-2 mb-4">
        <button type="button" class="back-btn" @click="pgView = 'main'">
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
          Kembali
        </button>
        <span class="text-sm font-bold text-slate-700">Tambah Jenjang Baru</span>
      </div>

      <div class="add-form-box">
        <form action="{{ route('admin.site-settings.pengumuman-groups.store') }}" method="POST" class="space-y-4">
          @csrf
          <input type="hidden" name="pengumuman_id" value="{{ optional($lolosItem)->id }}">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="field-label">Nama Jenjang (Subtitle)</label>
              <input type="text" name="subtitle" class="field-input" placeholder="Contoh: PAUD / SD / SMP / SMK" required>
            </div>
            <div>
              <label class="field-label">Title (opsional)</label>
              <input type="text" name="title" class="field-input" placeholder="Contoh: 10 TIM PESERTA">
            </div>
          </div>
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="field-label">Slug</label>
              <input type="text" name="slug" class="field-input" placeholder="Contoh: paud" required>
            </div>
            <div>
              <label class="field-label">Urutan</label>
              <select name="sort_order" class="field-input" required>
                @for ($i = 1; $i <= $groupsLolosMaxSortOption; $i++)
                  @php $isUsed = $groupsLolosUsedSortOrders->contains($i); @endphp
                  <option
                    value="{{ $i }}"
                    {{ $isUsed ? 'disabled' : '' }}
                    {{ (string) $groupsLolosFirstAvailableSortOrder === (string) $i && ! $isUsed ? 'selected' : '' }}
                  >
                    {{ $i }}{{ $isUsed ? ' (used)' : '' }}
                  </option>
                @endfor
              </select>
            </div>
          </div>
          <div class="flex items-center justify-between">
            <label class="inline-flex items-center gap-2 cursor-pointer">
              <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 accent-[#0072BC]">
              <span class="text-sm font-medium text-slate-700">Aktif</span>
            </label>
            <button type="submit" class="btn-primary">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
              Tambah Jenjang
            </button>
          </div>
        </form>
      </div>
    </div>

    {{-- LOLOS - LIST TIM PER JENJANG --}}
    <div x-show="pgSection === 'lolos' && pgView === 'entries_lolos'" x-cloak class="lomba-fade space-y-5">
      <div class="flex items-center gap-2 mb-1">
        <button type="button" class="back-btn" @click="pgView = 'main'; activeGroupId = null; activeGroupName = ''">
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
          Kembali ke Jenjang
        </button>
      </div>

      <div class="add-form-box">
        <div class="font-bold text-sm text-slate-900 mb-3">+ Tambah Tim</div>
        <form action="{{ route('admin.site-settings.pengumuman-entries.store') }}" method="POST" class="space-y-4">
          @csrf
          <input type="hidden" name="pengumuman_group_id" :value="activeGroupId">

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="field-label">Nama Tim</label>
              <input type="text" name="team_name" class="field-input" required>
            </div>
            <div>
              <label class="field-label">Nama Sekolah</label>
              <input type="text" name="school_name" class="field-input" required>
            </div>
          </div>

          <template x-for="group in {{ \Illuminate\Support\Js::from($groupsLolos->map(function ($group) use ($allEntries) {
              $entries = $allEntries->where('pengumuman_group_id', $group->id)->values();

              $usedRankOrders = $entries->pluck('rank_order')
                  ->filter(fn ($value) => $value !== null && $value !== '')
                  ->map(fn ($value) => (int) $value)
                  ->filter(fn ($value) => $value >= 1)
                  ->unique()
                  ->sort()
                  ->values();

              $usedSortOrders = $entries->pluck('sort_order')
                  ->filter(fn ($value) => $value !== null && $value !== '')
                  ->map(fn ($value) => (int) $value)
                  ->filter(fn ($value) => $value >= 1)
                  ->unique()
                  ->sort()
                  ->values();

              $maxRankOption = max((int) ($usedRankOrders->max() ?? 0), $entries->count(), 1) + 5;
              $maxSortOption = max((int) ($usedSortOrders->max() ?? 0), $entries->count(), 1) + 5;

              return [
                  'id' => $group->id,
                  'rankOptions' => collect(range(1, $maxRankOption))->map(fn ($i) => [
                      'value' => $i,
                      'used' => $usedRankOrders->contains($i),
                  ])->values(),
                  'sortOptions' => collect(range(1, $maxSortOption))->map(fn ($i) => [
                      'value' => $i,
                      'used' => $usedSortOrders->contains($i),
                  ])->values(),
              ];
          })->values()) }}" :key="group.id">
            <div x-show="activeGroupId === group.id" class="grid grid-cols-3 gap-4">
              <div>
                <label class="field-label">Rank</label>
                <select name="rank_order" class="field-input" required>
                  <template x-for="option in group.rankOptions" :key="'rank-lolos-' + group.id + '-' + option.value">
                    <option :value="option.value" :disabled="option.used" x-text="option.value + (option.used ? ' (used)' : '')"></option>
                  </template>
                </select>
              </div>

              <div>
                <label class="field-label">Urutan</label>
                <select name="sort_order" class="field-input" required>
                  <template x-for="option in group.sortOptions" :key="'sort-lolos-' + group.id + '-' + option.value">
                    <option :value="option.value" :disabled="option.used" x-text="option.value + (option.used ? ' (used)' : '')"></option>
                  </template>
                </select>
              </div>

              <div class="flex flex-col justify-end pb-1 gap-2">
                <label class="inline-flex items-center gap-2 cursor-pointer">
                  <input type="checkbox" name="is_preview" value="1" class="w-4 h-4 accent-[#0072BC]">
                  <span class="text-xs font-medium text-slate-700">Preview</span>
                </label>
                <label class="inline-flex items-center gap-2 cursor-pointer">
                  <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 accent-[#0072BC]">
                  <span class="text-xs font-medium text-slate-700">Aktif</span>
                </label>
              </div>
            </div>
          </template>

          <div class="flex justify-end">
            <button type="submit" class="btn-primary">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
              Tambah Tim
            </button>
          </div>
        </form>
      </div>

      @foreach($groupsLolos as $group)
        @php
          $groupEntries = $allEntries->where('pengumuman_group_id', $group->id)->values();

          $usedRankOrders = $groupEntries->pluck('rank_order')
              ->filter(fn ($value) => $value !== null && $value !== '')
              ->map(fn ($value) => (int) $value)
              ->filter(fn ($value) => $value >= 1)
              ->unique()
              ->sort()
              ->values();

          $usedSortOrders = $groupEntries->pluck('sort_order')
              ->filter(fn ($value) => $value !== null && $value !== '')
              ->map(fn ($value) => (int) $value)
              ->filter(fn ($value) => $value >= 1)
              ->unique()
              ->sort()
              ->values();

          $maxRankOption = max((int) ($usedRankOrders->max() ?? 0), $groupEntries->count(), 1) + 5;
          $maxSortOption = max((int) ($usedSortOrders->max() ?? 0), $groupEntries->count(), 1) + 5;
        @endphp

        <div x-show="activeGroupId === {{ $group->id }}">
          <div class="text-xs text-slate-400 mb-3">
            <span class="font-bold text-slate-700">{{ $groupEntries->count() }}</span> tim di jenjang <span class="font-bold text-[#0072BC]">{{ $group->subtitle }}</span>
          </div>

          <div class="space-y-2.5">
            @forelse($groupEntries as $entry)
              @php
                $currentRankOrder = (int) $entry->rank_order;
                $currentSortOrder = (int) $entry->sort_order;
              @endphp

              <div class="item-row">
                <div class="item-row-head">
                  <span class="step-bubble">{{ $entry->rank_order }}</span>
                  <span class="font-semibold text-sm text-slate-800">{{ $entry->team_name }}</span>
                  <span class="text-xs text-slate-400 truncate">{{ $entry->school_name }}</span>
                  <span class="badge ml-auto {{ $entry->is_active ? 'badge-active' : 'badge-inactive' }}">{{ $entry->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                </div>

                <div class="item-row-body">
                  <form action="{{ route('admin.site-settings.pengumuman-entries.update', $entry->id) }}" method="POST" class="space-y-3">
                    @csrf @method('PUT')
                    <input type="hidden" name="pengumuman_group_id" value="{{ $entry->pengumuman_group_id }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                      <div>
                        <label class="field-label">Nama Tim</label>
                        <input type="text" name="team_name" value="{{ $entry->team_name }}" class="field-input" required>
                      </div>
                      <div>
                        <label class="field-label">Nama Sekolah</label>
                        <input type="text" name="school_name" value="{{ $entry->school_name }}" class="field-input" required>
                      </div>
                    </div>

                    <div class="grid grid-cols-3 gap-3">
                      <div>
                        <label class="field-label">Rank</label>
                        <select name="rank_order" class="field-input" required>
                          @for ($i = 1; $i <= $maxRankOption; $i++)
                            @php $isUsedByOther = $usedRankOrders->contains($i) && $i !== $currentRankOrder; @endphp
                            <option
                              value="{{ $i }}"
                              {{ $isUsedByOther ? 'disabled' : '' }}
                              {{ (string) $currentRankOrder === (string) $i ? 'selected' : '' }}
                            >
                              {{ $i }}{{ $isUsedByOther ? ' (used)' : '' }}
                            </option>
                          @endfor
                        </select>
                      </div>

                      <div>
                        <label class="field-label">Urutan</label>
                        <select name="sort_order" class="field-input" required>
                          @for ($i = 1; $i <= $maxSortOption; $i++)
                            @php $isUsedByOther = $usedSortOrders->contains($i) && $i !== $currentSortOrder; @endphp
                            <option
                              value="{{ $i }}"
                              {{ $isUsedByOther ? 'disabled' : '' }}
                              {{ (string) $currentSortOrder === (string) $i ? 'selected' : '' }}
                            >
                              {{ $i }}{{ $isUsedByOther ? ' (used)' : '' }}
                            </option>
                          @endfor
                        </select>
                      </div>

                      <div class="flex flex-col justify-end pb-1 gap-1.5">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                          <input type="checkbox" name="is_preview" value="1" {{ $entry->is_preview ? 'checked' : '' }} class="w-4 h-4 accent-[#0072BC]">
                          <span class="text-xs font-medium text-slate-700">Preview</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                          <input type="checkbox" name="is_active" value="1" {{ $entry->is_active ? 'checked' : '' }} class="w-4 h-4 accent-[#0072BC]">
                          <span class="text-xs font-medium text-slate-700">Aktif</span>
                        </label>
                      </div>
                    </div>

                    <div class="flex justify-end">
                      <button type="submit" class="btn-primary" style="padding:0.4rem 1rem;font-size:0.78rem;">Simpan</button>
                    </div>
                  </form>

                  <form action="{{ route('admin.site-settings.pengumuman-entries.destroy', $entry->id) }}" method="POST" onsubmit="return confirm('Hapus tim ini?')" class="mt-2.5">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn-danger">Hapus</button>
                  </form>
                </div>
              </div>
            @empty
              <div class="empty-state">
                <svg class="w-9 h-9 text-slate-200 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                <div class="text-sm font-medium text-slate-500">Belum ada tim di jenjang ini</div>
              </div>
            @endforelse
          </div>
        </div>
      @endforeach
    </div>

  </div>
</div>

{{-- PREVIEW JS (hero + 3 home images) --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
  // hero preview
  (function(){
    const input = document.getElementById('hero_image');
    const preview = document.getElementById('hero_preview');
    if (!input || !preview) return;
    input.addEventListener('change', function (e) {
      const file = e.target.files && e.target.files[0];
      if (!file) return;
      preview.src = URL.createObjectURL(file);
    });
  })();

  // home images preview
  function bindPreview(inputId, imgId) {
    const input = document.getElementById(inputId);
    const img = document.getElementById(imgId);
    if (!input || !img) return;
    input.addEventListener('change', function(e){
      const f = e.target.files && e.target.files[0];
      if(!f) return;
      img.src = URL.createObjectURL(f);
    });
  }
  bindPreview('home_image_1', 'preview_home_1');
  bindPreview('home_image_2', 'preview_home_2');
  bindPreview('home_image_3', 'preview_home_3');
});
</script>
@endsection