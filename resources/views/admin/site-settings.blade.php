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
              ['key'=>'youtube',     'label'=>'Beranda – YouTube', 'desc'=>'2 link video embed'],
              ['key'=>'timeline',    'label'=>'Timeline',          'desc'=>'Tahapan timeline beranda'],
              ['key'=>'faq',         'label'=>'FAQ',               'desc'=>'Pertanyaan & jawaban'],
              ['key'=>'lomba',       'label'=>'Lomba',             'desc'=>'Ketentuan & tahapan'],
              ['key'=>'pengumuman',  'label'=>'Pengumuman',        'desc'=>'3 Besar & Lolos Proposal'],
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
          <div class="card-sub">2 link embed YouTube untuk ditampilkan di beranda.</div>
          <hr class="section-divider">
          <div class="rounded-xl bg-slate-50 border border-slate-200 p-4 text-sm text-slate-600">
            Placeholder UI dulu. Setelah itu kita bikin field: <code class="font-mono bg-white border border-slate-200 px-1.5 py-0.5 rounded text-xs">youtube_video_1</code> & <code class="font-mono bg-white border border-slate-200 px-1.5 py-0.5 rounded text-xs">youtube_video_2</code>.
          </div>
        </div>
      </div>

      {{-- ===========================
          TAB: TIMELINE
      ============================ --}}
      <div x-show="tab==='timeline'" x-cloak class="tab-content">
        <div class="card">
          <div class="card-title">Timeline Kegiatan</div>
          <div class="card-sub">CRUD: tambah, edit, dan hapus urutan tahapan timeline.</div>
          <hr class="section-divider">
          <div class="rounded-xl bg-slate-50 border border-slate-200 p-4 text-sm text-slate-600">
            Paling optimal menggunakan tabel terpisah: <code class="font-mono bg-white border border-slate-200 px-1.5 py-0.5 rounded text-xs">timelines</code>.
          </div>
        </div>
      </div>

      {{-- ===========================
          TAB: FAQ
      ============================ --}}
      <div x-show="tab==='faq'" x-cloak class="tab-content"
           x-data="{
             mode: 'list',
             editId: null,
             form: { category:'', question:'', answer:'', sort_order:0, is_active:true }
           }">

        <div class="card">
          {{-- Header --}}
          <div class="flex items-start justify-between gap-4 flex-col sm:flex-row">
            <div>
              <div class="card-title">FAQ</div>
              <div class="card-sub">Kelola pertanyaan & jawaban per kategori.</div>
            </div>
            <div class="flex gap-2 shrink-0">
              <button type="button" class="btn-ghost" @click="mode='list'">
                Semua FAQ
              </button>
              <button type="button" class="btn-primary"
                @click="mode='add'; form={ category:'', question:'', answer:'', sort_order:0, is_active:true }">
                Tambah FAQ
              </button>
            </div>
          </div>

          <hr class="section-divider">

          {{-- MODE: ADD --}}
          <div x-show="mode==='add'" x-cloak class="tab-content">
            <div class="rounded-xl bg-slate-50 border border-slate-100 p-5">
              <div class="font-bold text-slate-900 mb-4">Tambah FAQ Baru</div>

              <form action="{{ route('admin.site-settings.faqs.store') }}" method="POST" class="space-y-4">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <div>
                    <label class="field-label">Kategori</label>
                    <select name="category" class="field-input" required>
                      <option value="">-- Pilih Kategori --</option>
                      @foreach(($faqCategories ?? []) as $cat)
                        <option value="{{ $cat }}">{{ $cat }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div>
                    <label class="field-label">Urutan</label>
                    <input type="number" name="sort_order" value="0" min="0" class="field-input">
                  </div>
                </div>

                <div>
                  <label class="field-label">Pertanyaan</label>
                  <input name="question" class="field-input" placeholder="Tulis pertanyaan..." required>
                </div>

                <div>
                  <label class="field-label">Jawaban</label>
                  <textarea name="answer" class="field-input min-h-[110px]" placeholder="Tulis jawaban..." required></textarea>
                </div>

                <label class="inline-flex items-center gap-2 cursor-pointer">
                  <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 accent-[#0072BC]">
                  <span class="text-sm text-slate-700 font-medium">Aktif</span>
                </label>

                <div class="flex gap-2 pt-1">
                  <button type="submit" class="btn-primary">Simpan</button>
                  <button type="button" class="btn-ghost" @click="mode='list'">Batal</button>
                </div>
              </form>
            </div>
          </div>

          {{-- MODE: LIST --}}
          @php $groupedFaqs = ($faqs ?? collect())->groupBy('category'); @endphp

          <div x-show="mode==='list'" x-cloak class="tab-content space-y-6">
            @forelse($groupedFaqs as $category => $items)
              <div class="rounded-xl border border-slate-200 overflow-hidden">
                <div class="px-4 py-3 bg-slate-50 border-b border-slate-200 flex items-center justify-between">
                  <div class="font-bold text-sm text-slate-900">{{ $category }}</div>
                  <span class="badge badge-count">{{ $items->count() }} FAQ</span>
                </div>

                <div class="divide-y divide-slate-100">
                  @foreach($items as $faq)
                    <div class="px-4 py-4 flex items-start justify-between gap-4 hover:bg-slate-50/50 transition-colors">
                      <div class="min-w-0 flex-1">
                        <div class="font-semibold text-sm text-slate-900">{{ $faq->question }}</div>
                        <div class="text-sm text-slate-500 mt-1 whitespace-pre-line line-clamp-2">{{ $faq->answer }}</div>
                        <div class="flex items-center gap-2 mt-2">
                          <span class="text-xs text-slate-400">Urutan: {{ $faq->sort_order }}</span>
                          <span class="badge {{ $faq->is_active ? 'badge-active' : 'badge-inactive' }}">
                            {{ $faq->is_active ? 'Aktif' : 'Nonaktif' }}
                          </span>
                        </div>
                      </div>

                      <div class="flex gap-2 shrink-0">
                        <button type="button" class="btn-edit"
                          @click="
                            mode='edit';
                            editId={{ $faq->id }};
                            form={
                              category:@js($faq->category),
                              question:@js($faq->question),
                              answer:@js($faq->answer),
                              sort_order:{{ (int)$faq->sort_order }},
                              is_active:{{ $faq->is_active ? 'true' : 'false' }}
                            };
                          ">
                          Edit
                        </button>

                        <form action="{{ route('admin.site-settings.faqs.destroy', $faq->id) }}" method="POST"
                              onsubmit="return confirm('Hapus FAQ ini?')">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn-danger">Hapus</button>
                        </form>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            @empty
              <div class="flex flex-col items-center justify-center py-12 text-center text-slate-400">
                <svg class="w-12 h-12 mb-3 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <div class="text-sm font-medium">Belum ada FAQ di database.</div>
                <button type="button" class="btn-primary mt-4"
                  @click="mode='add'; form={ category:'', question:'', answer:'', sort_order:0, is_active:true }">
                  Tambah FAQ Pertama
                </button>
              </div>
            @endforelse
          </div>

          {{-- MODE: EDIT --}}
          <div x-show="mode==='edit'" x-cloak class="tab-content">
            <div class="rounded-xl bg-slate-50 border border-slate-100 p-5">
              <div class="font-bold text-slate-900 mb-4">Edit FAQ</div>

              <form :action="`/admin/site-settings/faqs/${editId}`" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <div>
                    <label class="field-label">Kategori</label>
                    <input name="category" class="field-input" x-model="form.category" required>
                  </div>
                  <div>
                    <label class="field-label">Urutan</label>
                    <input type="number" name="sort_order" min="0" class="field-input" x-model="form.sort_order">
                  </div>
                </div>

                <div>
                  <label class="field-label">Pertanyaan</label>
                  <input name="question" class="field-input" x-model="form.question" required>
                </div>

                <div>
                  <label class="field-label">Jawaban</label>
                  <textarea name="answer" class="field-input min-h-[110px]" x-model="form.answer" required></textarea>
                </div>

                <label class="inline-flex items-center gap-2 cursor-pointer">
                  <input type="checkbox" name="is_active" value="1" class="w-4 h-4 accent-[#0072BC]"
                         :checked="form.is_active"
                         @change="form.is_active = $event.target.checked">
                  <span class="text-sm text-slate-700 font-medium">Aktif</span>
                </label>

                <div class="flex gap-2 pt-1">
                  <button type="submit" class="btn-primary">Simpan</button>
                  <button type="button" class="btn-ghost" @click="mode='list'">Batal</button>
                </div>
              </form>
            </div>
          </div>

        </div>{{-- end card --}}
      </div>

      {{-- ===========================
          TAB: LOMBA
      ============================ --}}
      <div x-show="tab==='lomba'" x-cloak class="tab-content">
        <div class="card">
          <div class="card-title">Lomba</div>
          <div class="card-sub">Konten ketentuan & tahapan lomba.</div>
          <hr class="section-divider">
          <div class="rounded-xl bg-slate-50 border border-slate-200 p-4 text-sm text-slate-600">
            Nanti bisa dibuat CMS per halaman: ketentuan & tahapan (atau satu tabel).
          </div>
        </div>
      </div>

      {{-- ===========================
          TAB: PENGUMUMAN
      ============================ --}}
      <div x-show="tab==='pengumuman'" x-cloak class="tab-content">
        <div class="card">
          <div class="card-title">Pengumuman</div>
          <div class="card-sub">Konten: 3 besar & lolos seleksi proposal.</div>
          <hr class="section-divider">
          <div class="rounded-xl bg-slate-50 border border-slate-200 p-4 text-sm text-slate-600">
            Biasanya dibuat tabel: <code class="font-mono bg-white border border-slate-200 px-1.5 py-0.5 rounded text-xs">announcements</code>
            dengan category: <code class="font-mono bg-white border border-slate-200 px-1.5 py-0.5 rounded text-xs">3besar</code> /
            <code class="font-mono bg-white border border-slate-200 px-1.5 py-0.5 rounded text-xs">lolos</code>.
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