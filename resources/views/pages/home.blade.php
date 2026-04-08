@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

@php
  // Full-bleed (keluar dari main container) untuk background section
  $bleed = 'w-screen relative left-1/2 right-1/2 -ml-[50vw] -mr-[50vw]';
  // Inner container untuk section full-bleed (biar isi tetap standar)
  $inner = 'mx-auto w-full max-w-6xl px-4 md:px-6';
@endphp

{{-- ============================================================
     HERO SECTION — NAVY SPOTLIGHT FINAL
     - Top center spotlight beam
     - Canvas stars dengan sine twinkle (top 45%)
     - Animasi: floating particles + beam breathe
     - Button: oval, compact, shimmer glow
     - Font: Sora (Google Fonts) — clean & premium
     ============================================================ --}}

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800;900&display=swap" rel="stylesheet">

<section
  id="hero-section"
  class="{{ $bleed }} relative overflow-hidden"
  style="background:#03081a; min-height:85vh;"
>

  {{-- ── STAR CANVAS ── --}}
  <canvas id="hero-canvas"
    style="position:absolute;inset:0;width:100%;height:100%;pointer-events:none;z-index:0;">
  </canvas>

  {{-- ── FLOATING PARTICLES CANVAS ── --}}
  <canvas id="hero-particles"
    style="position:absolute;inset:0;width:100%;height:100%;pointer-events:none;z-index:1;">
  </canvas>

  {{-- ── BEAM: TOP CENTER SPOTLIGHT ── --}}
  <div id="hero-beam" style="
    position:absolute;inset:0;z-index:2;pointer-events:none;
    background:
      radial-gradient(ellipse 55% 90% at 50% -5%,
        rgba(29,78,216,0.82) 0%,
        rgba(29,78,216,0.20) 40%,
        transparent 68%),
      radial-gradient(ellipse 32% 42% at 50% 0%,
        rgba(147,197,253,0.20) 0%,
        transparent 58%);
  "></div>

  {{-- ── VIGNETTE SIDES ── --}}
  <div style="
    position:absolute;inset:0;z-index:2;pointer-events:none;
    background:
      linear-gradient(to right, rgba(3,8,26,0.55) 0%, transparent 22%, transparent 78%, rgba(3,8,26,0.55) 100%);
  "></div>

  {{-- ── VIGNETTE BOTTOM ── --}}
  <div style="
    position:absolute;bottom:0;left:0;right:0;height:30%;z-index:2;pointer-events:none;
    background:linear-gradient(to top, rgba(3,8,26,0.88) 0%, transparent 100%);
  "></div>

  {{-- ── CONTENT ── --}}
  <div style="
    position:relative;z-index:10;
    display:flex;flex-direction:column;align-items:center;
    justify-content:center;text-align:center;
    padding:7rem 1.5rem 6rem;
    min-height:85vh;
    font-family:'Sora',system-ui,sans-serif;
  ">

    {{-- EVENT LABEL --}}
    <div class="h-anim" style="--d:0ms; margin-bottom:1.1rem;">
      <span style="
        display:inline-flex;align-items:center;gap:8px;
        color:#60a5fa;font-size:clamp(12px,1.6vw,15px);font-weight:700;
        letter-spacing:0.22em;text-transform:uppercase;
        font-family:'Sora',system-ui,sans-serif;
      ">
        <span style="
          display:inline-block;width:7px;height:7px;border-radius:50%;
          background:#60a5fa;animation:dotPulse 2.2s ease-in-out infinite;
        "></span>
        {{ $setting->hero_event_label
            ?? ($setting->hero_title
                ? strtoupper(str_replace("\n",' ',$setting->hero_title))
                : 'HACKATHON RUMAH PENDIDIKAN 2026') }}
      </span>
    </div>

    {{-- HEADLINE --}}
    @php
      $line1 = 'Wujudkan';
      $line2 = 'Indonesia Cerdas';
      if (!empty($setting->hero_subtitle)) {
        $parts = explode(' ', $setting->hero_subtitle, 2);
        $line1 = $parts[0] ?? 'Wujudkan';
        $line2 = $parts[1] ?? 'Indonesia Cerdas';
      }
    @endphp

    <h1 class="h-anim" style="
      --d:160ms;
      font-family:'Sora',system-ui,sans-serif;
      font-weight:900;line-height:1.06;
      font-size:clamp(2.8rem,8.5vw,5.8rem);
      letter-spacing:-0.03em;
      max-width:860px;margin:0;
    ">
      <span style="display:block;color:#ffffff;">{{ $line1 }}</span>
      <span class="hero-grad-text" style="display:block;">{{ $line2 }}</span>
    </h1>

    {{-- TAGLINE --}}
    <p class="h-anim" style="
      --d:300ms;
      font-family:'Sora',system-ui,sans-serif;
      font-weight:500;
      color:rgba(255,255,255,0.38);
      font-size:clamp(0.78rem,1.5vw,0.92rem);
      max-width:380px;line-height:1.7;
      letter-spacing:0.05em;
      margin:0.65rem 0 0;
    ">{{ $setting->hero_tagline ?? 'Gim Edukasi untuk Pembelajaran Seru' }}</p>

    {{-- DIVIDER --}}
    <div class="h-anim" style="--d:400ms; margin:1.0rem 0 0;">
      <div style="
        width:36px;height:1px;margin:0 auto;
        background:linear-gradient(90deg,transparent,rgba(99,179,237,0.5),transparent);
      "></div>
    </div>

    {{-- CTA BUTTON --}}
    <div class="h-anim" style="--d:520ms; margin-top:1.0rem;">
      <a href="{{ $setting->primary_button_url ?? route('registrasi') }}" id="hero-cta">
        <span class="hero-cta-label">
          {{ $setting->primary_button_text ?? 'Daftar Sekarang' }}
        </span>
      </a>
    </div>

  </div>

  {{-- ═══════════════ STYLES ═══════════════ --}}
  <style>
    /* ── Entry animation ── */
    @keyframes hFadeUp {
      from { opacity:0; transform:translateY(26px); }
      to   { opacity:1; transform:translateY(0); }
    }
    .h-anim {
      opacity:0;
      animation:hFadeUp 0.85s cubic-bezier(0.16,1,0.3,1) var(--d,0ms) forwards;
    }

    /* ── Headline gradient shimmer ── */
    @keyframes gradFlow {
      0%,100% { background-position:0% 50%; }
      50%      { background-position:100% 50%; }
    }
    .hero-grad-text {
      background:linear-gradient(110deg,
        #5baee8 0%, #93c5fd 30%, #c2ecff 52%, #7ec8f4 72%, #4a9edc 100%);
      background-size:240% 240%;
      -webkit-background-clip:text;
      -webkit-text-fill-color:transparent;
      background-clip:text;
      animation:gradFlow 8s ease infinite;
    }

    /* ── Beam breathe ── */
    @keyframes beamBreathe {
      0%,100% { opacity:1; }
      50%      { opacity:0.75; }
    }
    #hero-beam {
      animation:beamBreathe 7s ease-in-out infinite;
    }

    /* ── Badge dot pulse ── */
    @keyframes dotPulse {
      0%,100% { opacity:1; transform:scale(1); }
      50%      { opacity:0.35; transform:scale(0.7); }
    }

    /* ── Button ── */
    @keyframes btnGlow {
      0%,100% { box-shadow:0 0 0px 0px rgba(147,197,253,0.0), 0 4px 18px rgba(0,0,0,0.25); }
      50%      { box-shadow:0 0 18px 6px rgba(147,197,253,0.18), 0 4px 18px rgba(0,0,0,0.25); }
    }
    @keyframes btnShine {
      0%       { transform:translateX(-200%) skewX(-22deg); opacity:0; }
      5%        { opacity:1; }
      40%,100% { transform:translateX(320%)  skewX(-22deg); opacity:0; }
    }
    #hero-cta {
      position:relative;
      display:inline-flex;
      align-items:center;
      justify-content:center;
      padding:10px 30px;
      border-radius:9999px;
      background:rgba(255,255,255,0.90);
      text-decoration:none;
      overflow:hidden;
      transition:transform 0.22s ease, background 0.22s ease, box-shadow 0.22s ease;
      animation:btnGlow 3.5s ease-in-out 2s infinite;
    }
    #hero-cta:hover {
      background:rgba(255,255,255,1);
      transform:translateY(-2px);
      box-shadow:0 8px 28px rgba(29,78,216,0.35);
    }
    #hero-cta:active { transform:translateY(0); }
    #hero-cta::before {
      content:'';
      position:absolute;top:0;left:0;
      width:30%;height:100%;
      background:linear-gradient(90deg,transparent,rgba(255,255,255,0.5),transparent);
      animation:btnShine 4.5s ease-in-out 2.5s infinite;
      pointer-events:none;
    }
    .hero-cta-label {
      position:relative;z-index:1;
      color:#03081a;
      font-family:'Sora',system-ui,sans-serif;
      font-size:0.82rem;
      font-weight:700;
      letter-spacing:0.06em;
      white-space:nowrap;
    }
  </style>
</section>

{{-- ═══════════════ SCRIPTS ═══════════════ --}}
<script>
(function () {

  /* ── 1. TWINKLING STARS ── */
  const starCanvas = document.getElementById('hero-canvas');
  if (starCanvas) {
    const ctx = starCanvas.getContext('2d');
    let W, H, stars = [];

    function resizeStar() {
      W = starCanvas.width  = starCanvas.offsetWidth;
      H = starCanvas.height = starCanvas.offsetHeight;
    }
    function rand(a, b) { return Math.random() * (b - a) + a; }
    function initStars() {
      stars = [];
      const n = Math.min(Math.floor(W * 0.14), 180);
      for (let i = 0; i < n; i++) {
        const base = rand(0.08, 0.70);
        stars.push({
          x      : rand(0, W),
          y      : rand(0, H * 0.48),
          r      : rand(0.10, 1.2),
          base   : base,
          a      : base,
          period : rand(4500, 13000),
          offset : rand(0, Math.PI * 2),
        });
      }
    }
    function drawStars(ts) {
      ctx.clearRect(0, 0, W, H);
      for (const s of stars) {
        const sin = Math.sin(((ts / s.period) + s.offset) * Math.PI * 2);
        s.a = s.base * (0.10 + 0.90 * ((sin + 1) / 2));
        ctx.beginPath();
        ctx.arc(s.x, s.y, s.r, 0, Math.PI * 2);
        ctx.fillStyle = `rgba(210,232,255,${s.a.toFixed(3)})`;
        ctx.fill();
      }
      requestAnimationFrame(drawStars);
    }
    resizeStar(); initStars();
    requestAnimationFrame(drawStars);
    new ResizeObserver(() => { resizeStar(); initStars(); }).observe(starCanvas.parentElement);
  }

  /* ── 2. FLOATING PARTICLES ── */
  const pCanvas = document.getElementById('hero-particles');
  if (pCanvas) {
    const ctx2 = pCanvas.getContext('2d');
    let PW, PH, particles = [];

    function resizeP() {
      PW = pCanvas.width  = pCanvas.offsetWidth;
      PH = pCanvas.height = pCanvas.offsetHeight;
    }
    function rand2(a, b) { return Math.random() * (b - a) + a; }
    function initParticles() {
      particles = [];
      /* Hanya 18 partikel — subtle, tidak ganggu */
      for (let i = 0; i < 18; i++) {
        particles.push({
          x    : rand2(PW * 0.15, PW * 0.85),
          y    : rand2(PH * 0.15, PH * 0.80),
          r    : rand2(0.6, 1.8),
          vx   : rand2(-0.08, 0.08),
          vy   : rand2(-0.18, -0.06),   /* naik perlahan */
          a    : rand2(0.06, 0.22),
          life : rand2(0, 1),           /* fase awal acak */
        });
      }
    }
    function drawParticles() {
      ctx2.clearRect(0, 0, PW, PH);
      for (const p of particles) {
        p.life += 0.003;
        if (p.life > 1) {
          /* reset ke bawah area beam */
          p.x    = rand2(PW * 0.2, PW * 0.8);
          p.y    = rand2(PH * 0.55, PH * 0.80);
          p.life = 0;
          p.vx   = rand2(-0.08, 0.08);
          p.vy   = rand2(-0.18, -0.06);
        }
        /* fade in & out sepanjang life */
        const fade = Math.sin(p.life * Math.PI);
        p.x += p.vx;
        p.y += p.vy;
        ctx2.beginPath();
        ctx2.arc(p.x, p.y, p.r, 0, Math.PI * 2);
        ctx2.fillStyle = `rgba(147,197,253,${(p.a * fade).toFixed(3)})`;
        ctx2.fill();
      }
      requestAnimationFrame(drawParticles);
    }
    resizeP(); initParticles();
    requestAnimationFrame(drawParticles);
    new ResizeObserver(() => { resizeP(); initParticles(); }).observe(pCanvas.parentElement);
  }

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
<section class="{{ $bleed }} py-24 md:py-32" style="background: linear-gradient(180deg, #ffffff 0%, #f2f8fd 35%, #eaf4fb 70%, #ffffff 100%);">
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

              if (preg_match('/youtu\.be\/([^\?&]+)/', $url, $match)) return $match[1];
              if (preg_match('/watch\?v=([^\?&]+)/', $url, $match)) return $match[1];
              if (preg_match('/live\/([^\?&]+)/', $url, $match)) return $match[1];
              if (preg_match('/embed\/([^\?&]+)/', $url, $match)) return $match[1];

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

{{-- ============================================================
     NEWS / BERITA SECTION
     ============================================================ --}}

<section id="news-section" class="news-full">
    <div class="news-inner">

        {{-- HEADER --}}
        <div class="news-header">
            <h2 class="news-title">Berita & Informasi</h2>
            <p class="news-desc">Update terbaru seputar Hackathon Rumah Pendidikan</p>
        </div>

        {{-- DATA --}}
        @php
            $displayNews = (isset($newsItems) && $newsItems->count())
                ? $newsItems
                : collect([]);

            $badgeClass = [
                'Pengumuman' => 'b-pengumuman',
                'Kegiatan'   => 'b-kegiatan',
                'Update'     => 'b-update',
                'Tips'       => 'b-tips',
                'Info'       => 'b-info',
            ];
        @endphp

        {{-- GRID --}}
        <div class="news-grid">

            @forelse($displayNews->take(3) as $news)
            <div class="news-card">

                {{-- IMAGE --}}
                <div class="news-img">
                    @if(!empty($news->image))
                        <img src="{{ asset('storage/'.$news->image) }}" alt="{{ $news->title }}">
                    @else
                        <div class="news-img-empty"></div>
                    @endif
                </div>

                <div class="news-body">

                    {{-- BADGE --}}
                    @if(!empty($news->category))
                    <span class="news-badge {{ $badgeClass[$news->category] ?? 'b-default' }}">
                        {{ $news->category }}
                    </span>
                    @endif

                    {{-- TITLE (NO HOVER LAGI) --}}
                    <h3 class="news-card-title">{{ $news->title }}</h3>

                    {{-- EXCERPT --}}
                    @if(!empty($news->excerpt))
                    <p class="news-excerpt">
                        {{ $news->excerpt }}
                    </p>
                    @endif

                    {{-- FOOTER --}}
                    <div class="news-footer">
                        @if(!empty($news->published_at))
                        <span class="news-date">
                            {{ \Carbon\Carbon::parse($news->published_at)->translatedFormat('d M Y') }}
                        </span>
                        @endif

                        @if(!empty($news->source_url))
                        <a href="{{ $news->source_url }}" target="_blank" class="news-link">
                            Selengkapnya →
                        </a>
                        @endif
                    </div>

                </div>
            </div>
            @empty
                <div class="news-empty">
                    <p>Belum ada berita</p>
                </div>
            @endforelse

        </div>
    </div>
</section>

<style>
/* ── SECTION ── */
.news-full {
    position: relative;
    left: 50%;
    right: 50%;
    margin-left: -50vw;
    margin-right: -50vw;
    width: 100vw;
    background: #080f1e;
}

.news-inner {
    max-width: 1000px;
    margin: 0 auto;
    padding: 60px 28px;
}

/* ── HEADER ── */
.news-header {
    text-align: center;
    margin-bottom: 32px;
}

.news-title {
    font-size: 31px;
    font-weight: 800;
    color: #f0f4ff;
}

.news-desc {
    font-size: 13px;
    color: white;
    font: bold;
}

/* ── GRID ── */
.news-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 18px;
}

@media (max-width: 768px) {
    .news-grid { grid-template-columns: 1fr 1fr; }
}

@media (max-width: 480px) {
    .news-grid { grid-template-columns: 1fr; }
}

/* ── CARD PREMIUM GLOW ── */
.news-card {
    background: #ffffff;
    border-radius: 16px;
    overflow: hidden;
    position: relative;
    transition: all 0.35s cubic-bezier(.16,1,.3,1);

    /* 🔥 glow dasar */
    box-shadow: 
        0 6px 18px rgba(0,0,0,0.08),
        0 2px 6px rgba(0,0,0,0.05);
}

.news-card:hover {
    transform: translateY(-6px) scale(1.01);

    /* 🔥 efek "ngambang + sinar" */
    box-shadow: 
        0 20px 40px rgba(0,0,0,0.18),
        0 0 0 1px rgba(59,130,246,0.08),
        0 0 25px rgba(59,130,246,0.15);
}

/* ── IMAGE ── */
.news-img {
    height: 150px;
    overflow: hidden;
}

.news-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s;
}

.news-card:hover .news-img img {
    transform: scale(1.06);
}

.news-img-empty {
    width: 100%;
    height: 100%;
    background: #e2e8f0;
}

/* ── BODY ── */
.news-body {
    padding: 16px;
}

/* 🔥 BADGE LEBIH GEDE & PREMIUM */
.news-badge {
    font-size: 11px;
    font-weight: 700;
    padding: 5px 12px;
    border-radius: 999px;
    margin-bottom: 10px;
    display: inline-block;
    letter-spacing: 0.03em;
}

.b-pengumuman { background: #fee2e2; color: #dc2626; }
.b-kegiatan   { background: #dcfce7; color: #16a34a; }
.b-update     { background: #e0f2fe; color: #0284c7; }
.b-tips       { background: #fef9c3; color: #ca8a04; }
.b-info       { background: #ede9fe; color: #7c3aed; }
.b-default    { background: #f1f5f9; color: #64748b; }

/* ── TITLE (NO HOVER) ── */
.news-card-title {
    font-size: 15px;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 6px;
    line-height: 1.4;

    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* ── EXCERPT ── */
.news-excerpt {
    font-size: 12.5px;
    color: #64748b;
    line-height: 1.55;
    margin-bottom: 12px;

    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* ── FOOTER ── */
.news-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 1px solid #f1f5f9;
    padding-top: 10px;
}

.news-date {
    font-size: 11px;
    color: #94a3b8;
}

/* 🔥 BALIKIN OVAL HOVER */
.news-link {
    font-size: 11px;
    font-weight: 600;
    color: #2563eb;
    text-decoration: none;

    padding: 5px 12px;
    border-radius: 999px;
    border: 1px solid transparent;

    transition: all 0.25s ease;
}

.news-link:hover {
    background: #eff6ff;
    border-color: #bfdbfe;
    box-shadow: 0 4px 10px rgba(37,99,235,0.15);
}

/* ── EMPTY ── */
.news-empty {
    grid-column: 1 / -1;
    text-align: center;
    padding: 48px;
    color: #475569;
}
</style>
      
@endsection