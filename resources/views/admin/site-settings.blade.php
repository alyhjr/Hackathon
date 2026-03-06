@extends('layouts.app')

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

  {{-- ===== PAGE HEADER ===== --}}
  <div class="flex items-start justify-between gap-4 flex-col sm:flex-row mb-2">
    <div>
      <div class="text-xs font-bold tracking-widest text-slate-400 uppercase mb-1">Admin Panel</div>
      <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">CMS Informasi Website</h1>
      <p class="mt-1 text-sm text-slate-500">Kelola konten Beranda, FAQ, Timeline, Lomba, Pengumuman, dan navigasi.</p>
    </div>

    {{-- Flash messages --}}
    <div class="w-full sm:w-auto min-w-[260px]">
      @if(session('success'))
        <div class="flex items-center gap-2 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-800 text-sm font-semibold">
          <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
          {{ session('success') }}
        </div>
      @endif

      @if($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-800 text-sm">
          <div class="font-bold mb-1">Ada error:</div>
          <ul class="list-disc ml-5 space-y-0.5">
            @foreach($errors->all() as $err)
              <li>{{ $err }}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </div>
  </div>

  {{-- ===== MAIN LAYOUT ===== --}}
  <div class="mt-8 grid grid-cols-1 lg:grid-cols-12 gap-6"
       x-data="{ tab: (localStorage.getItem('cms_tab') || 'hero') }"
       x-init="$watch('tab', v => localStorage.setItem('cms_tab', v))">

    {{-- ===== SIDEBAR ===== --}}
    <aside class="lg:col-span-3">
      <div class="sticky top-6">
        <div class="rounded-xl border border-slate-200 bg-white shadow-sm overflow-hidden">
          <div class="px-4 py-3 border-b border-slate-100 bg-slate-50">
            <span class="text-[10px] font-black tracking-widest text-slate-400 uppercase">Menu CMS</span>
          </div>

          @php
            $tabs = [
              ['key'=>'hero',        'label'=>'Beranda – Hero',    'desc'=>'Judul, subtitle, tombol, gambar'],
              ['key'=>'homeimg',     'label'=>'Beranda – Gambar',  'desc'=>'3 gambar konten beranda'],
              ['key'=>'lomba',       'label'=>'Lomba',             'desc'=>'Ketentuan & tahapan'],
              ['key'=>'pengumuman',  'label'=>'Pengumuman',        'desc'=>'3 Besar & Lolos Proposal'],
              ['key'=>'timeline',    'label'=>'Timeline',          'desc'=>'Tahapan timeline beranda'],
              ['key'=>'faq',         'label'=>'FAQ',               'desc'=>'Pertanyaan & jawaban'],
              ['key'=>'youtube',     'label'=>'Beranda – YouTube', 'desc'=>'2 link video embed'],
            ];
          @endphp

          <nav class="p-2 space-y-0.5">
            @foreach($tabs as $t)
              <button type="button"
                class="w-full text-left rounded-lg px-3 py-2.5 transition-all group"
                :class="tab === '{{ $t['key'] }}'
                  ? 'bg-[#0072BC] text-white shadow-sm'
                  : 'text-slate-700 hover:bg-slate-50'"
                @click="tab='{{ $t['key'] }}'">
                <div class="flex items-center gap-2.5">
                  <div>
                    <div class="text-sm font-bold leading-tight">{{ $t['label'] }}</div>
                    <div class="text-[11px] mt-0.5 leading-tight"
                         :class="tab === '{{ $t['key'] }}' ? 'text-white/70' : 'text-slate-400'">
                      {{ $t['desc'] }}
                    </div>
                  </div>
                </div>
              </button>
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
<div x-show="tab==='timeline'" x-cloak class="tab-content">
  <div class="card">

    {{-- ===== HEADER ===== --}}
    <div class="flex items-start justify-between gap-4 flex-wrap">
      <div>
        <div class="card-title">Timeline</div>
        <div class="card-sub">Kelola tahapan timeline yang tampil di beranda.</div>
      </div>
      <div class="text-xs text-slate-400">
        <span class="font-bold text-slate-700">{{ ($timelineItems ?? collect())->count() }}</span> tahapan
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
            <input type="text" name="title" class="field-input" placeholder="Contoh: Pendaftaran Dibuka" required>
          </div>
          <div>
            <label class="field-label">Tanggal</label>
            <input type="text" name="date_label" class="field-input" placeholder="Contoh: 18 Nov 2025" required>
          </div>
        </div>

        <div>
          <label class="field-label">Deskripsi (opsional)</label>
          <textarea name="description" class="field-input min-h-[80px]" placeholder="Deskripsi singkat tahapan..."></textarea>
        </div>

        <div class="flex items-center justify-between">
          <div class="flex items-center gap-4">
            <div class="w-24">
              <label class="field-label">Urutan</label>
              <input type="number" name="sort_order" value="1" min="1" class="field-input">
            </div>
            <label class="inline-flex items-center gap-2 mt-5 cursor-pointer">
              <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 accent-[#0072BC]">
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
      @forelse(($timelineItems ?? collect())->sortBy('sort_order') as $item)
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
              @csrf @method('PUT')

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
                <div class="w-24">
                  <label class="field-label">Urutan</label>
                  <input type="number" name="sort_order" value="{{ $item->sort_order }}" min="1" class="field-input">
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
              @csrf @method('DELETE')
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
    @php
      $groupedFaqs = ($faqs ?? collect())->groupBy('category');
    @endphp

    <div x-show="faqView === ''" class="lomba-fade">

      {{-- Summary --}}
      @if($groupedFaqs->isNotEmpty())
        <div class="text-xs text-slate-400 mb-4">
          <span class="font-bold text-slate-700">{{ $groupedFaqs->count() }}</span> kategori ·
          <span class="font-bold text-slate-700">{{ ($faqs ?? collect())->count() }}</span> total FAQ
        </div>
      @endif

      <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">

        {{-- Kartu per kategori --}}
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

        {{-- Tombol tambah kategori baru --}}
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
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="md:col-span-2">
              <label class="field-label">Nama Kategori Baru</label>
              <input name="category" class="field-input" placeholder="Contoh: Pendaftaran, Teknis, Hadiah..." required>
            </div>
            <div>
              <label class="field-label">Urutan</label>
              <input type="number" name="sort_order" value="1" min="1" class="field-input">
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

      {{-- Form tambah FAQ di kategori ini --}}
      @foreach($groupedFaqs as $category => $items)
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
                  <input type="number" name="sort_order" value="{{ $items->max('sort_order') + 1 }}" min="1" class="field-input">
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

          {{-- List FAQ --}}
          <div class="text-xs text-slate-400 mb-3">
            <span class="font-bold text-slate-700">{{ $items->count() }}</span> pertanyaan di kategori ini
          </div>

          <div class="space-y-2.5">
            @forelse($items->sortBy('sort_order') as $faq)
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
                    @csrf @method('PUT')
                    <input type="hidden" name="category" value="{{ $faq->category }}">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
                      <div class="md:col-span-3">
                        <label class="field-label">Pertanyaan</label>
                        <input name="question" value="{{ $faq->question }}" class="field-input" required>
                      </div>
                      <div>
                        <label class="field-label">Urutan</label>
                        <input type="number" name="sort_order" value="{{ $faq->sort_order }}" min="1" class="field-input">
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
                    @csrf @method('DELETE')
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
    TAB: LOMBA — Full Alpine, no page reload
============================ --}}

<style>
  .lomba-fade {
    animation: lombaFadeIn 0.2s ease both;
  }
  @keyframes lombaFadeIn {
    from { opacity: 0; transform: translateY(8px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  /* Sub-tab pill */
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

  /* Section card */
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

  /* Breadcrumb back button */
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

  /* Section header strip */
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

  /* Add form box */
  .add-form-box {
    background: linear-gradient(135deg, #f8fafc 0%, #f0f7ff 100%);
    border: 1.5px solid #e2e8f0;
    border-radius: 1rem;
    padding: 1.25rem;
    margin-bottom: 1.25rem;
  }

  /* Item row */
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

  /* Step bubble */
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

  /* Empty state */
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
  $kt       = $lombaKetentuan ?? collect();
  $selected = request('lomba_tab', 'kategori');
  if (!in_array($selected, ['kategori','persyaratan','pendaftaran'])) $selected = 'kategori';
  $items    = $kt[$selected] ?? collect();
@endphp

<div x-show="tab==='lomba'" x-cloak class="tab-content"
     x-data="{
       lombaSection: '{{ request()->has('lomba_tab') ? 'ketentuan' : '' }}',
       kTab: '{{ $selected }}'
     }">
  <div class="card">

    {{-- ===== CARD HEADER ===== --}}
    <div class="flex items-center gap-3 mb-1">
      {{-- Back button (shown inside section) --}}
      <button type="button"
        x-show="lombaSection !== ''"
        x-cloak
        class="back-btn"
        @click="lombaSection = ''">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
        </svg>
        Kembali
      </button>

      <div>
        <div class="card-title" x-text="lombaSection === '' ? 'Lomba' : (lombaSection === 'ketentuan' ? 'Ketentuan Lomba' : 'Tahapan Lomba')"></div>
        <div class="card-sub" x-text="lombaSection === '' ? 'Pilih bagian yang ingin dikelola.' : (lombaSection === 'ketentuan' ? 'Kelola kategori, persyaratan, & pendaftaran.' : 'Kelola langkah-langkah kegiatan lomba.')"></div>
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

      {{-- Sub-tab pills (pure Alpine, no page reload) --}}
      <div class="section-header-strip">
        <div class="flex gap-1.5 flex-wrap">
          <button type="button"
            class="sub-pill"
            :class="kTab === 'kategori' ? 'sub-pill-active' : 'sub-pill-inactive'"
            @click="kTab = 'kategori'">
            Kategori
          </button>
          <button type="button"
            class="sub-pill"
            :class="kTab === 'persyaratan' ? 'sub-pill-active' : 'sub-pill-inactive'"
            @click="kTab = 'persyaratan'">
            Persyaratan
          </button>
          <button type="button"
            class="sub-pill"
            :class="kTab === 'pendaftaran' ? 'sub-pill-active' : 'sub-pill-inactive'"
            @click="kTab = 'pendaftaran'">
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
                <input name="title" class="field-input" placeholder="Contoh: PAUD / Sederajat">
              </div>
              <div>
                <label class="field-label">Gambar (opsional)</label>
                <label class="flex items-center gap-2 w-full border border-dashed border-slate-200 rounded-lg px-3 py-2.5 cursor-pointer hover:border-[#0072BC] hover:bg-blue-50/20 transition-colors text-sm text-slate-500 bg-white">
                  <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/></svg>
                  Pilih gambar
                  <input type="file" name="image" class="hidden" accept="image/*">
                </label>
              </div>
            </div>
            <div>
              <label class="field-label">Deskripsi / Konten</label>
              <textarea name="content" required class="field-input min-h-[80px]" placeholder="Deskripsi singkat kategori..."></textarea>
            </div>
            <div class="flex items-center gap-4">
              <div class="w-24">
                <label class="field-label">Urutan</label>
                <input type="number" name="sort_order" value="1" min="1" class="field-input">
              </div>
              <label class="inline-flex items-center gap-2 mt-5 cursor-pointer">
                <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 accent-[#0072BC]">
                <span class="text-sm font-medium text-slate-700">Aktif</span>
              </label>
              <div class="mt-5 ml-auto">
                <button type="submit" class="btn-primary">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                  Tambah
                </button>
              </div>
            </div>
          </form>
        </div>

        {{-- List Kategori --}}
        @php $kItems = $kt['kategori'] ?? collect(); @endphp
        <div class="text-xs text-slate-400 mb-2"><span class="font-bold text-slate-700">{{ $kItems->count() }}</span> item</div>
        <div class="space-y-2.5">
          @forelse($kItems as $item)
            <div class="item-row">
              <div class="item-row-head">
                <span class="text-xs font-black text-slate-400">#{{ $item->id }}</span>
                @if($item->title)<span class="text-sm font-semibold text-slate-700">{{ $item->title }}</span>@endif
                <span class="badge ml-auto {{ $item->is_active ? 'badge-active' : 'badge-inactive' }}">{{ $item->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                <span class="text-xs text-slate-400">Urut: {{ $item->sort_order }}</span>
              </div>
              <div class="item-row-body">
                <form action="{{ route('admin.site-settings.lomba.ketentuan.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="space-y-3">
                  @csrf @method('PUT')
                  <input type="hidden" name="tab" value="kategori">
                  <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <div class="md:col-span-2">
                      <label class="field-label">Title</label>
                      <input name="title" value="{{ $item->title }}" class="field-input">
                    </div>
                    <div>
                      <label class="field-label">Urutan</label>
                      <input type="number" name="sort_order" value="{{ $item->sort_order }}" min="1" class="field-input">
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
                    <button type="submit" class="btn-primary ml-auto" style="padding:0.4rem 1rem;font-size:0.78rem;">Simpan</button>
                  </div>
                </form>
                <form action="{{ route('admin.site-settings.lomba.ketentuan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus?')" class="mt-2.5">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn-danger">Hapus</button>
                </form>
              </div>
            </div>
          @empty
            <div class="empty-state">
              <svg class="w-9 h-9 text-slate-200 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
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
              <input name="title" class="field-input" placeholder="Opsional">
            </div>
            <div>
              <label class="field-label">Konten</label>
              <textarea name="content" required class="field-input min-h-[80px]" placeholder="Contoh: Peserta merupakan siswa aktif..."></textarea>
            </div>
            <div class="flex items-center gap-4">
              <div class="w-24">
                <label class="field-label">Urutan</label>
                <input type="number" name="sort_order" value="1" min="1" class="field-input">
              </div>
              <label class="inline-flex items-center gap-2 mt-5 cursor-pointer">
                <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 accent-[#0072BC]">
                <span class="text-sm font-medium text-slate-700">Aktif</span>
              </label>
              <div class="mt-5 ml-auto">
                <button type="submit" class="btn-primary">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                  Tambah
                </button>
              </div>
            </div>
          </form>
        </div>

        @php $pItems = $kt['persyaratan'] ?? collect(); @endphp
        <div class="text-xs text-slate-400 mb-2"><span class="font-bold text-slate-700">{{ $pItems->count() }}</span> item</div>
        <div class="space-y-2.5">
          @forelse($pItems as $item)
            <div class="item-row">
              <div class="item-row-head">
                <span class="text-xs font-black text-slate-400">#{{ $item->id }}</span>
                @if($item->title)<span class="text-sm font-semibold text-slate-700">{{ $item->title }}</span>@endif
                <span class="badge ml-auto {{ $item->is_active ? 'badge-active' : 'badge-inactive' }}">{{ $item->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                <span class="text-xs text-slate-400">Urut: {{ $item->sort_order }}</span>
              </div>
              <div class="item-row-body">
                <form action="{{ route('admin.site-settings.lomba.ketentuan.update', $item->id) }}" method="POST" class="space-y-3">
                  @csrf @method('PUT')
                  <input type="hidden" name="tab" value="persyaratan">
                  <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <div class="md:col-span-2">
                      <label class="field-label">Title</label>
                      <input name="title" value="{{ $item->title }}" class="field-input">
                    </div>
                    <div>
                      <label class="field-label">Urutan</label>
                      <input type="number" name="sort_order" value="{{ $item->sort_order }}" min="1" class="field-input">
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
                    <button type="submit" class="btn-primary ml-auto" style="padding:0.4rem 1rem;font-size:0.78rem;">Simpan</button>
                  </div>
                </form>
                <form action="{{ route('admin.site-settings.lomba.ketentuan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus?')" class="mt-2.5">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn-danger">Hapus</button>
                </form>
              </div>
            </div>
          @empty
            <div class="empty-state">
              <svg class="w-9 h-9 text-slate-200 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
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
              <input name="title" class="field-input" placeholder="Opsional">
            </div>
            <div>
              <label class="field-label">Konten</label>
              <textarea name="content" required class="field-input min-h-[80px]" placeholder="Contoh: Pendaftaran dibuka mulai..."></textarea>
            </div>
            <div class="flex items-center gap-4">
              <div class="w-24">
                <label class="field-label">Urutan</label>
                <input type="number" name="sort_order" value="1" min="1" class="field-input">
              </div>
              <label class="inline-flex items-center gap-2 mt-5 cursor-pointer">
                <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 accent-[#0072BC]">
                <span class="text-sm font-medium text-slate-700">Aktif</span>
              </label>
              <div class="mt-5 ml-auto">
                <button type="submit" class="btn-primary">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                  Tambah
                </button>
              </div>
            </div>
          </form>
        </div>

        @php $dItems = $kt['pendaftaran'] ?? collect(); @endphp
        <div class="text-xs text-slate-400 mb-2"><span class="font-bold text-slate-700">{{ $dItems->count() }}</span> item</div>
        <div class="space-y-2.5">
          @forelse($dItems as $item)
            <div class="item-row">
              <div class="item-row-head">
                <span class="text-xs font-black text-slate-400">#{{ $item->id }}</span>
                @if($item->title)<span class="text-sm font-semibold text-slate-700">{{ $item->title }}</span>@endif
                <span class="badge ml-auto {{ $item->is_active ? 'badge-active' : 'badge-inactive' }}">{{ $item->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                <span class="text-xs text-slate-400">Urut: {{ $item->sort_order }}</span>
              </div>
              <div class="item-row-body">
                <form action="{{ route('admin.site-settings.lomba.ketentuan.update', $item->id) }}" method="POST" class="space-y-3">
                  @csrf @method('PUT')
                  <input type="hidden" name="tab" value="pendaftaran">
                  <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <div class="md:col-span-2">
                      <label class="field-label">Title</label>
                      <input name="title" value="{{ $item->title }}" class="field-input">
                    </div>
                    <div>
                      <label class="field-label">Urutan</label>
                      <input type="number" name="sort_order" value="{{ $item->sort_order }}" min="1" class="field-input">
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
                    <button type="submit" class="btn-primary ml-auto" style="padding:0.4rem 1rem;font-size:0.78rem;">Simpan</button>
                  </div>
                </form>
                <form action="{{ route('admin.site-settings.lomba.ketentuan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus?')" class="mt-2.5">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn-danger">Hapus</button>
                </form>
              </div>
            </div>
          @empty
            <div class="empty-state">
              <svg class="w-9 h-9 text-slate-200 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
              <div class="text-sm font-medium text-slate-500">Belum ada item pendaftaran</div>
            </div>
          @endforelse
        </div>
      </div>

    </div>{{-- end ketentuan --}}

    {{-- =========================
        SECTION: TAHAPAN
    ========================= --}}
    <div x-show="lombaSection === 'tahapan'" x-cloak class="lomba-fade">

      {{-- Form tambah tahapan --}}
      <div class="add-form-box">
        <div class="font-bold text-sm text-slate-900 mb-3">+ Tambah Tahapan</div>
        <form action="{{ route('admin.site-settings.lomba.tahapan.store') }}" method="POST" class="space-y-4">
          @csrf
          <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
            <div>
              <label class="field-label">Step</label>
              <input type="number" name="step_number" value="1" min="1" class="field-input" required>
            </div>
            <div class="md:col-span-2">
              <label class="field-label">Judul</label>
              <input name="title" class="field-input" placeholder="Contoh: Pendaftaran" required>
            </div>
            <div>
              <label class="field-label">Urutan</label>
              <input type="number" name="sort_order" value="1" min="1" class="field-input">
            </div>
          </div>
        <div>
  <label class="field-label">Deskripsi (opsional)</label>
  <textarea
    name="bullets_text"
    class="w-full border rounded-xl px-3 py-2 min-h-[70px]"
    placeholder="1 baris = 1 bullet"
  >{{ old('bullets_text', '') }}</textarea>
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

      {{-- LIST TAHAPAN --}}
<div class="space-y-4 mt-6">

@foreach($lombaTahapan as $step)

<div class="rounded-xl border p-4 bg-white">

<form method="POST" action="{{ route('admin.site-settings.lomba.tahapan.update', $step->id) }}">
@csrf
@method('PUT')

<div class="grid grid-cols-3 gap-3">

<div>
<label class="field-label">Step</label>
<input type="number"
name="step_number"
value="{{ $step->step_number }}"
class="w-full border rounded-xl px-3 py-2">
</div>

<div class="col-span-2">
<label class="field-label">Judul</label>
<input
name="title"
value="{{ $step->title }}"
class="w-full border rounded-xl px-3 py-2">
</div>

</div>


<div class="mt-3">

<label class="field-label">Deskripsi (opsional)</label>

<textarea
  name="description"
  class="w-full border rounded-xl px-3 py-2 min-h-[70px]"
  placeholder="1 baris = 1 bullet">{{ old('description') }}</textarea>

</div>


<div class="flex items-center gap-3 mt-3">

<label class="flex items-center gap-2">
<input type="checkbox"
name="is_active"
value="1"
{{ $step->is_active ? 'checked' : '' }}>
<span>Aktif</span>
</label>

<button
type="submit"
class="px-4 py-2 bg-blue-600 text-white rounded-xl">
Simpan
</button>

</form>


<form method="POST"
action="{{ route('admin.site-settings.lomba.tahapan.destroy',$step->id) }}">
@csrf
@method('DELETE')

<button
class="px-4 py-2 bg-red-600 text-white rounded-xl">
Hapus
</button>

</form>

</div>

</div>

@endforeach

</div>

    </div>{{-- end tahapan --}}

  </div>
</div>

     
    {{-- ===========================
    TAB: PENGUMUMAN
============================ --}}
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
          pgView === 'entries' ? activeGroupName :
          pgSection === 'tiga_besar' ? 'Pengumuman – 3 Besar' :
          pgSection === 'lolos' ? 'Pengumuman – Lolos Seleksi Proposal' :
          'Pengumuman'
        "></div>
        <div class="card-sub" x-text="
          pgView === 'entries' ? 'Kelola daftar tim di jenjang ini.' :
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

    {{-- ============================================================
        SECTION UTAMA — dipakai untuk TIGA BESAR & LOLOS (template sama)
        x-show dikondisikan per type di dalam masing-masing blok
    ============================================================ --}}

    @php
      $tigaBesar  = ($pengumuman ?? collect())->where('type','tiga_besar')->first();
      $lolosItem  = ($pengumuman ?? collect())->where('type','lolos')->first();

      $allGroups   = $pengumumanGroups  ?? collect();
      $allEntries  = $pengumumanEntries ?? collect();

      $groupsTB    = $allGroups->where('pengumuman_id', optional($tigaBesar)->id);
      $groupsLolos = $allGroups->where('pengumuman_id', optional($lolosItem)->id);
    @endphp

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

        {{-- Grid jenjang --}}
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

          {{-- Tombol tambah jenjang --}}
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
              <input type="number" name="sort_order" value="1" min="1" class="field-input">
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

      {{-- Form tambah tim --}}
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
          <div class="grid grid-cols-3 gap-4">
            <div>
              <label class="field-label">Rank</label>
              <input type="number" name="rank_order" value="1" min="1" class="field-input">
            </div>
            <div>
              <label class="field-label">Urutan</label>
              <input type="number" name="sort_order" value="1" min="1" class="field-input">
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
          <div class="flex justify-end">
            <button type="submit" class="btn-primary">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
              Tambah Tim
            </button>
          </div>
        </form>
      </div>

      {{-- List tim per group --}}
      @foreach($groupsTB as $group)
        <div x-show="activeGroupId === {{ $group->id }}">
          @php $groupEntries = $allEntries->where('pengumuman_group_id', $group->id); @endphp
          <div class="text-xs text-slate-400 mb-3">
            <span class="font-bold text-slate-700">{{ $groupEntries->count() }}</span> tim di jenjang <span class="font-bold text-[#0072BC]">{{ $group->subtitle }}</span>
          </div>

          <div class="space-y-2.5">
            @forelse($groupEntries as $entry)
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
                        <input type="number" name="rank_order" value="{{ $entry->rank_order }}" min="1" class="field-input">
                      </div>
                      <div>
                        <label class="field-label">Urutan</label>
                        <input type="number" name="sort_order" value="{{ $entry->sort_order }}" min="1" class="field-input">
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

    {{-- ==================================================
        LOLOS SELEKSI — struktur identik dengan 3 Besar
    ================================================== --}}

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
              <input type="number" name="sort_order" value="1" min="1" class="field-input">
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
          <div class="grid grid-cols-3 gap-4">
            <div>
              <label class="field-label">Rank</label>
              <input type="number" name="rank_order" value="1" min="1" class="field-input">
            </div>
            <div>
              <label class="field-label">Urutan</label>
              <input type="number" name="sort_order" value="1" min="1" class="field-input">
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
          <div class="flex justify-end">
            <button type="submit" class="btn-primary">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
              Tambah Tim
            </button>
          </div>
        </form>
      </div>

      @foreach($groupsLolos as $group)
        <div x-show="activeGroupId === {{ $group->id }}">
          @php $groupEntries = $allEntries->where('pengumuman_group_id', $group->id); @endphp
          <div class="text-xs text-slate-400 mb-3">
            <span class="font-bold text-slate-700">{{ $groupEntries->count() }}</span> tim di jenjang <span class="font-bold text-[#0072BC]">{{ $group->subtitle }}</span>
          </div>
          <div class="space-y-2.5">
            @forelse($groupEntries as $entry)
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
                        <input type="number" name="rank_order" value="{{ $entry->rank_order }}" min="1" class="field-input">
                      </div>
                      <div>
                        <label class="field-label">Urutan</label>
                        <input type="number" name="sort_order" value="{{ $entry->sort_order }}" min="1" class="field-input">
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

    </section>
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