@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

@php
  // Full-bleed (keluar dari main container) untuk background section
  $bleed = 'w-screen relative left-1/2 right-1/2 -ml-[50vw] -mr-[50vw]';
  // Inner container untuk section full-bleed (biar isi tetap standar)
  $inner = 'mx-auto w-full max-w-6xl px-4 md:px-6';
@endphp

<!-- HERO VERSI 1: PARALLAX + SHIMMER -->
<section
  class="{{ $bleed }} relative overflow-hidden"
  id="hero-section"
  style="
    background-image: url('{{ asset('image/header/sekolah.jpg') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    will-change: background-position;
  "
>
  <div class="absolute inset-0 bg-black/55"></div>

  {{-- SHIMMER LINE --}}
  <div class="hero-shimmer"></div>

  <div class="relative min-h-[380px] md:min-h-[540px] lg:min-h-[580px]">

    {{-- MOBILE: center layout --}}
    <div class="flex md:hidden absolute inset-0 items-center justify-center px-6">
      <div class="text-white text-center max-w-sm">

        <h1 class="text-3xl font-extrabold tracking-wide drop-shadow leading-tight hero-anim" style="animation-delay:0ms">
          {!! e($setting->hero_title ? explode("\n", $setting->hero_title)[0] : "HACKATHON RUMAH") !!}
          <span class="block mt-1">
            {!! e($setting->hero_title ? (explode("\n", $setting->hero_title)[1] ?? '') : "PENDIDIKAN 2026") !!}
          </span>
        </h1>

        <div class="mt-3">
          <p class="text-base font-extrabold leading-snug drop-shadow hero-anim" style="animation-delay:200ms">
            {{ $setting->hero_subtitle ?? 'Wujudkan Indonesia Cerdas' }}
          </p>
          <p class="mt-1 text-xs font-semibold leading-snug opacity-90 drop-shadow hero-anim" style="animation-delay:300ms">
            "{{ $setting->hero_tagline ?? 'Gim Edukasi untuk Pembelajaran Seru' }}"
          </p>
        </div>

        <div class="hero-anim flex justify-center" style="animation-delay:420ms">
          <a href="{{ $setting->primary_button_url ?? route('registrasi') }}"
             class="inline-flex items-center justify-center mt-5 px-6 py-2.5
                    text-white text-sm font-bold rounded-full
                    transition-all duration-300 hero-btn btn-premium"
             style="background-color:#0072BC;">
            {{ $setting->primary_button_text ?? 'Registrasi' }}
          </a>
        </div>

      </div>
    </div>

    {{-- DESKTOP: left layout --}}
    <div class="hidden md:flex absolute inset-0 items-center">
      <div class="text-white max-w-2xl ml-16 lg:ml-24">

        <h1 class="text-5xl lg:text-6xl font-extrabold tracking-wide drop-shadow mt-6">
          <span class="block leading-tight hero-anim" style="animation-delay:0ms">
            {!! e($setting->hero_title ? explode("\n", $setting->hero_title)[0] : "HACKATHON RUMAH") !!}
          </span>
          <span class="block leading-tight mt-1 hero-anim" style="animation-delay:120ms">
            {!! e($setting->hero_title ? (explode("\n", $setting->hero_title)[1] ?? '') : "PENDIDIKAN 2026") !!}
          </span>
        </h1>

        <div class="mt-1">
          <p class="text-xl lg:text-2xl font-extrabold leading-snug drop-shadow hero-anim" style="animation-delay:260ms">
            {{ $setting->hero_subtitle ?? 'Wujudkan Indonesia Cerdas' }}
          </p>
          <p class="mt-1 text-base lg:text-lg font-semibold leading-snug opacity-90 drop-shadow hero-anim" style="animation-delay:360ms">
            "{{ $setting->hero_tagline ?? 'Gim Edukasi untuk Pembelajaran Seru' }}"
          </p>
        </div>

        <div class="hero-anim" style="animation-delay:480ms">
          <a href="{{ $setting->primary_button_url ?? route('registrasi') }}"
             class="inline-flex items-center justify-center mt-5 px-5 py-2
                    text-white text-sm font-bold rounded-full
                    transition-all duration-300 hero-btn btn-premium"
             style="background-color:#0072BC;">
            {{ $setting->primary_button_text ?? 'Registrasi' }}
          </a>
        </div>

      </div>
    </div>

  </div>

  <style>
    @keyframes heroFadeUp {
      from { opacity: 0; transform: translateY(28px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    @keyframes heroPulse {
      0%, 100% { box-shadow: 0 0 0 0 rgba(0,114,188,0.5); }
      50%       { box-shadow: 0 0 0 8px rgba(0,114,188,0); }
    }
    @keyframes heroShimmer {
      0%   { transform: translateX(-100%) skewX(-12deg); opacity: 0; }
      10%  { opacity: 1; }
      90%  { opacity: 1; }
      100% { transform: translateX(200vw) skewX(-12deg); opacity: 0; }
    }
    .hero-anim {
      opacity: 0;
      animation: heroFadeUp 0.65s cubic-bezier(0.22,1,0.36,1) forwards;
    }
    .hero-btn {
      animation: heroPulse 2.4s ease-in-out 1.2s infinite;
    }
    .hero-shimmer {
      position: absolute;
      top: 0; left: 0;
      width: 80px;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.07), transparent);
      animation: heroShimmer 1.8s cubic-bezier(0.4,0,0.2,1) 0.3s 1 forwards;
      pointer-events: none;
      z-index: 10;
    }
    .btn-premium {
      position: relative;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0,114,188,0.3);
    }
    .btn-premium::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(120deg, transparent 0%, rgba(255,255,255,0.15) 50%, transparent 100%);
      transform: translateX(-100%);
      transition: transform 0.5s ease;
    }
    .btn-premium:hover::after { transform: translateX(100%); }
    .btn-premium:hover {
      background-color: #005fa3 !important;
      box-shadow: 0 6px 20px rgba(0,114,188,0.45);
      transform: translateY(-1px);
    }
  </style>
</section>

<script>
  (function () {
    const hero = document.getElementById('hero-section');
    if (!hero) return;
    // Disable parallax on mobile (tidak efektif & bisa lambat)
    if (window.innerWidth < 768) return;
    let ticking = false;
    window.addEventListener('scroll', function () {
      if (!ticking) {
        requestAnimationFrame(function () {
          const scrollY = window.scrollY;
          const offset = scrollY * 0.25;
          hero.style.backgroundPosition = `center calc(50% + ${offset}px)`;
          ticking = false;
        });
        ticking = true;
      }
    });
  })();
</script>

<!-- DESKRIPSI -->
<section class="{{ $bleed ?? '' }} pt-16 pb-12 md:pt-20 md:pb-16">
  <div class="{{ $inner ?? '' }}">
    <div class="grid md:grid-cols-[1fr_0.75fr] gap-10 lg:gap-16 items-start">

      <!-- TEXT -->
      <div class="pt-5">
        <h2 class="desc-up text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900 leading-tight" style="--i:0">
          HACKATHON RUMAH PENDIDIKAN
        </h2>
        
        <h3 class="desc-up mt-1 text-xl md:text-2xl font-bold leading-tight" style="--i:1; color:#0072BC;">
          Wujudkan Indonesia Cerdas
        </h3>

        <p class="desc-up mt-5 text-sm font-extrabold text-slate-900" style="--i:2">
          "Gim Edukasi untuk Pembelajaran Seru"
        </p>

        <p class="desc-up mt-4 text-sm text-slate-800 leading-relaxed text-justify" style="--i:3">
          Hackathon Rumah Pendidikan 2026 ini menjadi wadah bagi berbagai
          kalangan untuk menciptakan ide, solusi, dan prototipe teknologi
          pendidikan yang berdampak nyata terhadap pengembangan Rumah
          Pendidikan.
        </p>

        <p class="desc-up mt-3 text-sm text-slate-800 leading-relaxed text-justify" style="--i:4">
          Hackathon Rumah Pendidikan 2026 tidak sekadar ajang kompetisi
          teknologi, tetapi juga ruang pembelajaran kolaboratif yang mendorong
          peserta untuk merancang, mengembangkan, dan mendemonstrasikan
          solusi pembelajaran berbasis teknologi.
        </p>

        <p class="desc-up mt-6 text-base font-extrabold text-slate-900" style="--i:5">
          Bapak Ibu Guru, saatnya berkreasi !
        </p>

        <p class="desc-up mt-2 text-sm text-slate-800 leading-relaxed" style="--i:6">
          Wujudkan ide pembelajaran interaktif lewat game buatan sendiri, seru,
          menyenangkan, dan bisa dipakai di kelas seluruh Indonesia.
        </p>
      </div>

      @php
        $homeImg1 = !empty($setting->home_image_1)
            ? asset('storage/'.$setting->home_image_1)
            : asset('image/header/gambar 1.png');
        $homeImg2 = !empty($setting->home_image_2)
            ? asset('storage/'.$setting->home_image_2)
            : asset('image/header/gambar 2.jpg');
        $homeImg3 = !empty($setting->home_image_3)
            ? asset('storage/'.$setting->home_image_3)
            : asset('image/header/gambar 3.png');
      @endphp

      <!-- IMAGES -->
      <div class="flex flex-col gap-2">
        <div class="grid grid-cols-2 gap-2">
          <div class="desc-up overflow-hidden rounded-xl shadow-sm" style="--i:2">
            <img src="{{ $homeImg1 }}" alt="Kegiatan 1"
              class="w-full object-cover aspect-square hover:scale-[1.05] transition duration-500 ease-out" loading="lazy"/>
          </div>
          <div class="desc-up overflow-hidden rounded-xl shadow-sm" style="--i:3">
            <img src="{{ $homeImg2 }}" alt="Kegiatan 2"
              class="w-full object-cover aspect-square hover:scale-[1.05] transition duration-500 ease-out" loading="lazy"/>
          </div>
        </div>
        <div class="desc-up overflow-hidden rounded-xl shadow-sm" style="--i:4">
          <img src="{{ $homeImg3 }}" alt="Kegiatan 3"
            class="w-full object-cover aspect-[16/7] hover:scale-[1.05] transition duration-500 ease-out" loading="lazy"/>
        </div>
      </div>

    </div>
  </div>
</section>

<style>
  .desc-up {
    opacity: 0;
    transform: translateY(32px);
    transition:
      opacity  0.7s cubic-bezier(0.16, 1, 0.3, 1) calc(var(--i, 0) * 90ms),
      transform 0.7s cubic-bezier(0.16, 1, 0.3, 1) calc(var(--i, 0) * 90ms);
  }
  .desc-up.in-view {
    opacity: 1;
    transform: translateY(0);
  }
</style>

<script>
  (function () {
    const targets = document.querySelectorAll('.desc-up');
    if (!targets.length) return;

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('in-view');
            observer.unobserve(entry.target);
          }
        });
      },
      {
        threshold: 0.08,
        rootMargin: '0px 0px -60px 0px'
      }
    );

    targets.forEach((el) => observer.observe(el));
  })();
</script>

<!-- INFORMASI PENTING -->
<section class="{{ $bleed }} py-24" style="background: linear-gradient(180deg, #ffffff 0%, #f2f8fd 35%, #eaf4fb 70%, #ffffff 100%);">
  <div class="{{ $inner }}">

    <!-- Heading -->
    <div class="text-center info-up" style="--i:0">
      <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900 inline-flex items-center justify-center gap-3">
        Informasi Penting
        <img
          src="{{ asset('image/header/perintah.png') }}"
          alt="Perintah"
          class="w-10 md:w-12 h-10 md:h-12 object-contain mt-1"
          loading="lazy"
        />
      </h2>
    </div>

    @php
      $defaultInformasiPenting = collect([
        (object) [
          'content' => 'Informasi lanjutan terkait pelatihan dan tahapan berikutnya telah dikirimkan melalui email kepada masing-masing Ketua Tim yang lolos.',
          'sort_order' => 1,
          'is_active' => true,
        ],
        (object) [
          'content' => 'Mohon segera melakukan pengecekan email (termasuk folder spam/promosi) agar tidak ada informasi terlewat.',
          'sort_order' => 2,
          'is_active' => true,
        ],
      ]);

      $infoItems = collect($informasiPentingItems ?? [])
        ->filter(fn ($item) => (int) ($item->is_active ?? 0) === 1 || ($item->is_active ?? false) === true)
        ->sortBy('sort_order')
        ->values();

      if ($infoItems->count() === 0) {
        $infoItems = $defaultInformasiPenting;
      }
    @endphp

    <!-- Content -->
    <div class="mt-16 max-w-6xl mx-auto">
     <div class="flex justify-center">

        <!-- Card Informasi -->
        <div class="info-up flex justify-center" style="--i:2">
          <div class="w-full max-w-xl bg-white rounded-3xl p-10 border border-slate-200
                      shadow-[0_10px_30px_rgba(0,0,0,0.06)]
                      transition duration-300
                      hover:shadow-[0_20px_50px_rgba(0,0,0,0.08)]">

            <div class="space-y-10">
              @foreach($infoItems as $index => $item)
                <div class="info-up flex gap-5" style="--i:{{ $index + 3 }}">
                  <div class="shrink-0">
                    <div class="w-14 h-14 rounded-2xl bg-sky-50 flex items-center justify-center border border-sky-100">
                      @if($index % 2 === 0)
                        <svg class="w-6 h-6 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                          <path d="M4 6h16v12H4z"/>
                          <path d="M4 8l8 5 8-5"/>
                        </svg>
                      @else
                        <svg class="w-6 h-6 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                          <path d="M3 10l9 5 9-5"/>
                          <path d="M21 10v10H3V10"/>
                          <path d="M3 10l9-6 9 6"/>
                        </svg>
                      @endif
                    </div>
                  </div>

                  <p class="text-slate-900 leading-relaxed font-medium">
                    {{ $item->content }}
                  </p>
                </div>

                @if(!$loop->last)
                  <div class="h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>
                @endif
              @endforeach
            </div>

          </div>
        </div>

      </div>
    </div>

  </div>
</section>

<style>
  .info-up {
    opacity: 0;
    transform: translateY(32px);
    transition:
      opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1) calc(var(--i, 0) * 90ms),
      transform 0.7s cubic-bezier(0.16, 1, 0.3, 1) calc(var(--i, 0) * 90ms);
  }
  .info-up.in-view {
    opacity: 1;
    transform: translateY(0);
  }
</style>

<script>
  (function () {
    const targets = document.querySelectorAll('.info-up');
    if (!targets.length) return;

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('in-view');
            observer.unobserve(entry.target);
          }
        });
      },
      {
        threshold: 0.08,
        rootMargin: '0px 0px -60px 0px'
      }
    );

    targets.forEach((el) => observer.observe(el));
  })();
</script>

<!-- TIMELINE -->
<section class="{{ $bleed ?? '' }} py-12 md:py-16 px-4">
<style>
 .tl-line {
  background: linear-gradient(to bottom, transparent, #1e293b 15%, #1e293b 85%, transparent);
  width: 1.5px;
}
.tl-dot {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background-color: #fff;
  border: 2px solid #1e293b;
  transition: transform 0.25s ease, background-color 0.25s ease;
  flex-shrink: 0;
}
.tl-group:hover .tl-dot {
  transform: scale(1.3);
  background-color: #f0f9ff;
}
.tl-card * {
  color: #ffffff !important;
}
.tl-card {
  background-color: #003049;
  border: 1px solid #7dd3fc;
  border-radius: 10px;
  padding: 10px 16px;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.tl-group:hover .tl-card {
  transform: translateX(3px);
  box-shadow: 0 4px 16px rgba(125,211,252,0.2);
}
  .tl-heading {
    opacity: 0;
    transform: translateY(24px);
    transition: opacity 0.7s cubic-bezier(0.16,1,0.3,1),
                transform 0.7s cubic-bezier(0.16,1,0.3,1);
  }
  .tl-heading.in-view {
    opacity: 1;
    transform: translateY(0);
  }

  .tl-item {
    opacity: 0;
    transform: translateY(24px);
    transition: opacity 0.6s cubic-bezier(0.16,1,0.3,1) var(--tl-delay, 0ms),
                transform 0.6s cubic-bezier(0.16,1,0.3,1) var(--tl-delay, 0ms);
  }
  .tl-item.in-view {
    opacity: 1;
    transform: translateY(0);
  }
</style>

  <div class="tl-heading text-center mb-10">
    <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight text-slate-9100">
      Timeline Kegiatan
    </h2>
    <p class="mt-3 text-xs text-slate-900 font-semibold">
      Jadwal dapat berubah sesuai ketentuan panitia.
    </p>
  </div>

  <div class="max-w-2xl mx-auto">
    @forelse(($timeline ?? collect()) as $i => $item)
      <div class="tl-group tl-item flex gap-4 items-stretch"
           style="--tl-delay: {{ $i * 80 }}ms">

        {{-- DATE --}}
        <div class="w-24 flex-shrink-0 flex items-center justify-end py-2">
          <span class="text-right text-xs font-bold leading-snug text-slate-900 whitespace-pre-line">
            {{ $item->date_label }}
          </span>
        </div>

        {{-- CONNECTOR --}}
        <div class="relative flex flex-col items-center flex-shrink-0" style="width: 20px;">
          <div class="tl-line flex-1"></div>
          <div class="tl-dot z-10"></div>
          <div class="tl-line flex-1"></div>
        </div>

        {{-- CARD --}}
        <div class="flex-1 py-1.5">
          <div class="tl-card">
            <div class="text-sm font-semibold text-slate-800 leading-snug">
              {{ $item->title }}
            </div>
            @if(!empty($item->description))
              <div class="mt-0.5 text-xs text-slate-500 leading-relaxed">
                {{ $item->description }}
              </div>
            @endif
          </div>
        </div>

      </div>
    @empty
      <div class="text-center text-sm text-slate-400 py-8">
        Belum ada data timeline.
      </div>
    @endforelse
  </div>

</section>

<script>
  (function () {
    const heading = document.querySelector('.tl-heading');
    const items = document.querySelectorAll('.tl-item');

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('in-view');
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.08, rootMargin: '0px 0px -50px 0px' }
    );

    if (heading) observer.observe(heading);
    items.forEach((el) => observer.observe(el));
  })();
</script>

<!-- TOOLS (BALANCED LOGO SIZE) -->
<section class="{{ $bleed }} py-20 md:py-24 bg-white-100">
  <div class="{{ $inner }} text-center">

    <h2 class="tools-up text-2xl md:text-3xl font-extrabold tracking-tight text-slate-900" style="--i:0">
      Setiap Tim akan membuat 2 Gim Edukasi
    </h2>
    <p class="tools-up mt-3 text-slate-900 font-semibold" style="--i:1">
      Tools yang wajib digunakan:
    </p>

    <div class="mt-14 flex justify-center gap-12 md:gap-16 flex-wrap">

      <!-- Google for Education -->
      <a href="https://edu.google.com/" target="_blank" rel="noopener noreferrer"
         class="tools-card group flex flex-col items-center" style="--i:2">
        <div class="w-40 h-40 md:w-48 md:h-48 rounded-full flex items-center justify-center tools-circle">
          <img src="{{ asset('image/header/google edu.png') }}" alt="Google for Education"
               class="w-32 md:w-36 object-contain transition duration-500 group-hover:scale-110" loading="lazy"/>
        </div>
        <p class="mt-5 font-semibold text-slate-900">Google for Education</p>
        <p class="mt-1 text-sm text-slate-500 group-hover:text-[#0072BC] transition duration-300">Kunjungi halaman</p>
      </a>

      <!-- Canva -->
      <a href="https://www.canva.com/" target="_blank" rel="noopener noreferrer"
         class="tools-card group flex flex-col items-center" style="--i:3">
        <div class="w-40 h-40 md:w-48 md:h-48 rounded-full flex items-center justify-center tools-circle">
          <img src="{{ asset('image/header/canva.png') }}" alt="Canva"
               class="w-28 md:w-32 object-contain transition duration-500 group-hover:scale-110" loading="lazy"/>
        </div>
        <p class="mt-5 font-semibold text-slate-900">Canva</p>
        <p class="mt-1 text-sm text-slate-500 group-hover:text-[#0072BC] transition duration-300">Kunjungi halaman</p>
      </a>

    </div>
  </div>
</section>

<style>
  .tools-circle {
    background: linear-gradient(135deg, #ffffff 0%, #f2f8fd 50%, #eaf4fb 100%);
    border: 1px solid rgba(0, 114, 188, 0.12);
    box-shadow:
      0 4px 20px rgba(0, 114, 188, 0.08),
      inset 0 1px 0 rgba(255,255,255,0.9);
    transition: transform 0.4s cubic-bezier(0.16,1,0.3,1),
                box-shadow 0.4s cubic-bezier(0.16,1,0.3,1);
  }
  .tools-card:hover .tools-circle {
    transform: translateY(-8px);
    box-shadow:
      0 20px 50px rgba(0, 114, 188, 0.18),
      0 8px 20px rgba(0, 114, 188, 0.10),
      inset 0 1px 0 rgba(255,255,255,0.9);
  }

  .tools-up {
    opacity: 0;
    transform: translateY(28px);
    transition:
      opacity  0.7s cubic-bezier(0.16,1,0.3,1) calc(var(--i,0) * 100ms),
      transform 0.7s cubic-bezier(0.16,1,0.3,1) calc(var(--i,0) * 100ms);
  }
  .tools-up.in-view { opacity: 1; transform: translateY(0); }

  .tools-card {
    opacity: 0;
    transform: translateY(40px) scale(0.92);
    transition:
      opacity  0.75s cubic-bezier(0.16,1,0.3,1) calc(var(--i,0) * 120ms),
      transform 0.75s cubic-bezier(0.16,1,0.3,1) calc(var(--i,0) * 120ms);
  }
  .tools-card.in-view { opacity: 1; transform: translateY(0) scale(1); }

  @keyframes tools-glow {
    0%, 100% { box-shadow: 0 4px 20px rgba(0,114,188,0.08), inset 0 1px 0 rgba(255,255,255,0.9); }
    50%       { box-shadow: 0 4px 28px rgba(0,114,188,0.18), inset 0 1px 0 rgba(255,255,255,0.9); }
  }
  .tools-card.in-view .tools-circle {
    animation: tools-glow 3s ease-in-out infinite;
    animation-delay: calc(var(--i, 0) * 300ms);
  }
</style>

<script>
  (function () {
    const els = document.querySelectorAll('.tools-up, .tools-card');
    if (!els.length) return;
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('in-view');
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.1, rootMargin: '0px 0px -60px 0px' }
    );
    els.forEach((el) => observer.observe(el));
  })();
</script>

<!-- FAQ + PANDUAN -->
<section class="{{ $bleed }} pt-16 pb-12 md:pt-20 md:pb-14" style="background: linear-gradient(180deg, #ffffff 0%, #f2f8fd 35%, #eaf4fb 70%, #ffffff 100%);">
  <div class="{{ $inner }}">
    <div class="grid md:grid-cols-2 gap-8 items-start">

      <!-- LEFT: FAQ -->
      <div>
        <h2 class="faq-up text-3xl font-black tracking-tight text-slate-900 leading-tight max-w-sm" style="--i:0">
          Pertanyaan yang Sering Diajukan (FAQ).
        </h2>
        <p class="faq-up mt-3 text-slate-500 text-sm leading-relaxed" style="--i:1">
          Beberapa pertanyaan yang paling sering ditanyakan peserta.
        </p>

        @php
          $faqItems = $faqs ?? collect();
          if ($faqItems->count() === 0) {
            $faqItems = collect([
              ['question' => 'Bagaimana cara mendaftarnya?', 'answer' => 'Kunjungi Superaplikasi Rumah Pendidikan, kemudian klik banner Hackathon Rumah Pendidikan 2026. Pilih "DAFTAR SEKARANG" dan isi formulir pendaftaran.'],
              ['question' => 'Apakah disediakan format khusus untuk proposal?', 'answer' => 'Format proposal akan diinformasikan dan disediakan oleh panitia saat memasuki masa unggah proposal.'],
              ['question' => 'Apakah dalam satu tim wajib terdiri dari tiga orang?', 'answer' => 'Satu tim terdiri dari 3 guru dan/atau tenaga kependidikan dari sekolah yang sama.'],
              ['question' => 'Bagaimana jika peserta tidak memiliki akun belajar.id karena berasal dari madrasah?', 'answer' => 'Pendaftar dari Madrasah dapat menggunakan akun @madrasah.kemenag.go.id atau akun Gmail.'],
              ['question' => 'Apakah guru SLB diperbolehkan mengikuti kegiatan ini?', 'answer' => 'Diperbolehkan.'],
            ]);
          }
        @endphp

        <div class="mt-5 space-y-2.5">
          @foreach ($faqItems as $item)
            @php
              $question = is_array($item) ? $item['question'] : $item->question;
              $answer   = is_array($item) ? $item['answer']   : $item->answer;
              $fi = $loop->index + 2;
            @endphp

            <div class="faq-up" style="--i:{{ $fi }}">
              <details class="group bg-white rounded-lg border border-slate-200 transition hover:border-slate-300">
                <summary class="list-none cursor-pointer select-none flex items-center justify-between gap-3 px-4 py-3 text-sm font-semibold text-slate-900">
                  <span class="leading-snug">{{ $question }}</span>
                  <span class="shrink-0 grid place-items-center w-6 h-6 rounded-md border border-slate-200 bg-slate-50 transition group-open:bg-[#FEFBD0] group-open:border-[#ddd880]" aria-hidden="true">
                    <svg class="w-3 h-3 text-slate-700 group-open:hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 5v14M5 12h14" stroke-linecap="round"/></svg>
                    <svg class="w-3 h-3 text-slate-700 hidden group-open:block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14" stroke-linecap="round"/></svg>
                  </span>
                </summary>
                <div class="px-4 pb-4 text-sm font-medium text-slate-800 leading-7 tracking-wide">
                  <div class="pt-3 border-t border-slate-100 animate-[faqDown_200ms_ease-out]">
                    {{ $answer }}
                  </div>
                </div>
              </details>
            </div>
          @endforeach

        <div class="faq-up" style="--i:{{ ($faqItems instanceof \Illuminate\Support\Collection ? $faqItems->count() : count($faqItems)) + 2 }}">
    <a href="/faq"
       class="inline-flex mt-3 items-center justify-center rounded-full px-5 py-2 text-sm font-extrabold text-white transition-all duration-300 btn-premium"
       style="background-color:#0072BC;">
      Pertanyaan lainnya
    </a>
  </div>
</div>
      </div>

      <!-- RIGHT: PANDUAN + KONTAK -->
      <div class="space-y-3 md:pl-4" style="padding-top: 8rem">

        <div class="faq-right" style="--j:0">
          <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 md:p-7">
            <h3 class="text-base md:text-lg font-extrabold text-slate-900">Butuh Pedoman?</h3>
            <p class="mt-2 text-sm text-slate-700 leading-relaxed">
              Berbagi informasi dan pedoman resmi untuk mendukung partisipasi Anda.
            </p>
            <p class="mt-2 text-sm font-bold text-slate-900 leading-relaxed">
              Akses pedoman resmi dan informasi lainnya di sini, ya!
            </p>
            <a href="https://drive.google.com/file/d/1LuQ8j2MEuPMePAEccTWSw-7OQaS5GAyS/view"
               target="_blank" rel="noopener noreferrer"
               class="inline-flex mt-4 items-center justify-center rounded-full px-5 py-2 text-sm font-extrabold text-white transition-all duration-300 btn-premium"
               style="background-color:#0072BC;">
              Lihat Pedoman
            </a>
          </div>
        </div>

        <div class="faq-right" style="--j:1">
          <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 md:p-7">
            <h3 class="text-base md:text-lg font-extrabold text-slate-900">Kontak Kami</h3>
            <p class="mt-2 text-sm text-slate-600">
              Surel :<br>
              <span class="font-semibold text-slate-900">hackathon.rumdik@kemendikdasmen.go.id</span>
            </p>
          </div>
        </div>

      </div>

    </div>
  </div>

  <style>
    @keyframes faqDown {
      from { opacity: 0; transform: translateY(-4px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .faq-up {
      opacity: 0;
      transform: translateX(-20px);
      transition:
        opacity  0.65s cubic-bezier(0.16,1,0.3,1) calc(var(--i,0) * 70ms),
        transform 0.65s cubic-bezier(0.16,1,0.3,1) calc(var(--i,0) * 70ms);
    }
    .faq-up.in-view { opacity: 1; transform: translateX(0); }

    .faq-right {
      opacity: 0;
      transform: translateX(24px);
      transition:
        opacity  0.7s cubic-bezier(0.16,1,0.3,1) calc(var(--j,0) * 120ms + 200ms),
        transform 0.7s cubic-bezier(0.16,1,0.3,1) calc(var(--j,0) * 120ms + 200ms);
    }
    .faq-right.in-view { opacity: 1; transform: translateX(0); }

    .btn-premium {
      position: relative;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0,114,188,0.3);
    }
    .btn-premium::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(120deg, transparent 0%, rgba(255,255,255,0.15) 50%, transparent 100%);
      transform: translateX(-100%);
      transition: transform 0.5s ease;
    }
    .btn-premium:hover::after {
      transform: translateX(100%);
    }
    .btn-premium:hover {
      background-color: #005fa3 !important;
      box-shadow: 0 6px 20px rgba(0,114,188,0.45);
      transform: translateY(-1px);
    }
    .btn-premium:active {
      transform: translateY(0px);
      box-shadow: 0 3px 10px rgba(0,114,188,0.3);
    }
  </style>
</section>

<script>
  (function () {
    const all = document.querySelectorAll('.faq-up, .faq-right');
    if (!all.length) return;
    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((e) => {
          if (e.isIntersecting) {
            e.target.classList.add('in-view');
            io.unobserve(e.target);
          }
        });
      },
      { threshold: 0.07, rootMargin: '0px 0px -50px 0px' }
    );
    all.forEach((el) => io.observe(el));
  })();
</script>

<!-- YOUTUBE -->
<section class="{{ $bleed }} py-24 md:py-32 bg-white">
  <div class="{{ $inner }}">

    <div class="mb-8">
      <p class="text-xs font-semibold tracking-widest uppercase text-slate-400 mb-2">
        Dokumentasi Kegiatan
      </p>
      <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight text-slate-900 leading-snug">
        Simak Kick-off Hackathon Rumah Pendidikan 2025<br>
        Wujudkan Indonesia Cerdas.
      </h2>
    </div>

    @php
      if (!function_exists('extractYoutubeIdSimple')) {
          function extractYoutubeIdSimple($url) {
              if (!$url) return null;

              if (preg_match('/youtu\.be\/([^\?&]+)/', $url, $match)) {
                  return $match[1];
              }

              if (preg_match('/watch\?v=([^\?&]+)/', $url, $match)) {
                  return $match[1];
              }

              if (preg_match('/live\/([^\?&]+)/', $url, $match)) {
                  return $match[1];
              }

              if (preg_match('/embed\/([^\?&]+)/', $url, $match)) {
                  return $match[1];
              }

              return null;
          }
      }

      $video1 = extractYoutubeIdSimple($setting->youtube_url_1 ?? null);
      $video2 = extractYoutubeIdSimple($setting->youtube_url_2 ?? null);
    @endphp

    @if($video1 || $video2)
      <div class="grid md:grid-cols-2 gap-6 items-start">

        @if($video1)
          <div class="aspect-video rounded-2xl overflow-hidden shadow-lg ring-1 ring-slate-200">
            <iframe
              class="w-full h-full"
              src="https://www.youtube.com/embed/{{ $video1 }}"
              title="Kick-off Hackathon Rumah Pendidikan - Video 1"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              allowfullscreen>
            </iframe>
          </div>
        @endif

        @if($video2)
          <div class="aspect-video rounded-2xl overflow-hidden shadow-lg ring-1 ring-slate-200">
            <iframe
              class="w-full h-full"
              src="https://www.youtube.com/embed/{{ $video2 }}"
              title="Kick-off Hackathon Rumah Pendidikan - Video 2"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              allowfullscreen>
            </iframe>
          </div>
        @endif

      </div>
    @else
      <div class="max-w-4xl mx-auto rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-6 py-12 text-center">
        <p class="text-slate-500 font-medium">
          Video YouTube belum diatur di CMS.
        </p>
      </div>
    @endif

  </div>
</section>
      
@endsection