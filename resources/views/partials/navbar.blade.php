<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@500;600;700;800&display=swap" rel="stylesheet">

<nav id="main-nav" class="sticky top-0 z-50 w-full nav-entrance" style="padding: 10px 24px;">
  <div id="nav-pill" class="max-w-7xl mx-auto px-5 transition-all duration-300 pill-white" style="border-radius: 9999px;">
    <div class="flex items-center h-14">

      {{-- LEFT --}}
      <div class="flex flex-1 items-center">
        <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0 nav-logo">
          <img
            src="{{ asset('image/header/kemendikdasmen.png') }}"
            alt="Kemendikdasmen"
            class="h-10 w-auto object-contain block nav-logo-kemendik"
          />
        </a>
      </div>

      {{-- CENTER --}}
      <div class="hidden md:flex flex-1 justify-center">
        <ul class="flex items-center gap-8 text-[14px] font-semibold">

          <li class="nav-item" style="--ni:0">
            <a href="{{ route('home') }}" class="nav-link transition">
              Beranda
            </a>
          </li>

          <li class="relative group nav-item" style="--ni:1">
            <button type="button"
              class="nav-link inline-flex items-center gap-2 transition focus:outline-none">
              Lomba
              <svg class="w-4 h-4 transition-transform duration-200 group-hover:rotate-180" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 011.08 1.04l-4.25 4.25a.75.75 0 01-1.06 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd"/>
              </svg>
            </button>
            <div class="absolute left-0 top-full z-50 pt-2
                        opacity-0 invisible translate-y-2
                        group-hover:opacity-100 group-hover:visible group-hover:translate-y-0
                        group-focus-within:opacity-100 group-focus-within:visible group-focus-within:translate-y-0
                        transition-all duration-200">
              <div class="w-64 rounded-xl bg-white border border-slate-200 shadow-md overflow-hidden">
                <a href="{{ route('lomba.ketentuan') }}" class="dropdown-item block px-4 py-3 text-sm text-slate-700 hover:bg-sky-50 hover:text-sky-700 transition-colors duration-150">
                  Ketentuan Lomba
                </a>
                <a href="{{ route('lomba.tahapan') }}" class="dropdown-item block px-4 py-3 text-sm text-slate-700 hover:bg-sky-50 hover:text-sky-700 transition-colors duration-150">
                  Tahapan Kegiatan Lomba
                </a>
              </div>
            </div>
          </li>

          <li class="relative group nav-item" style="--ni:2">
            <button type="button"
              class="nav-link inline-flex items-center gap-2 transition focus:outline-none">
              Pengumuman
              <svg class="w-4 h-4 transition-transform duration-200 group-hover:rotate-180" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 011.08 1.04l-4.25 4.25a.75.75 0 01-1.06 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd"/>
              </svg>
            </button>
            <div class="absolute left-0 top-full z-50 pt-2
                        opacity-0 invisible translate-y-2
                        group-hover:opacity-100 group-hover:visible group-hover:translate-y-0
                        group-focus-within:opacity-100 group-focus-within:visible group-focus-within:translate-y-0
                        transition-all duration-200">
              <div class="w-72 rounded-xl bg-white border border-slate-200 shadow-md overflow-hidden">
                <a href="{{ route('pengumuman.3besar') }}" class="dropdown-item block px-4 py-3 text-sm text-slate-700 hover:bg-sky-50 hover:text-sky-700 transition-colors duration-150">
                  Pengumuman 3 Besar
                </a>
                <a href="{{ route('pengumuman.lolos') }}" class="dropdown-item block px-4 py-3 text-sm text-slate-700 hover:bg-sky-50 hover:text-sky-700 transition-colors duration-150">
                  Lolos Seleksi Proposal
                </a>
              </div>
            </div>
          </li>

          <li class="nav-item" style="--ni:3">
            <a href="{{ route('faq') }}" class="nav-link transition">FAQ</a>
          </li>

        </ul>
      </div>

      {{-- RIGHT --}}
      <div class="hidden md:flex flex-1 items-center justify-end gap-3 whitespace-nowrap nav-item" style="--ni:4">

        {{-- Search --}}
        <form id="navSearchForm" action="#" method="GET" class="relative nav-search" autocomplete="off">
          <input
            id="navSearchInput"
            type="text"
            name="q"
            placeholder="Cari..."
            class="nav-search-input w-40 h-9 rounded-full px-4 pr-9 text-xs
                   focus:outline-none focus:ring-2
                   transition-all duration-300"
          />
          <button type="submit"
            class="nav-search-btn absolute right-3 top-1/2 -translate-y-1/2 transition-colors duration-150"
            aria-label="Cari">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <circle cx="11" cy="11" r="7"></circle>
              <path d="M21 21l-4.3-4.3"></path>
            </svg>
          </button>
        </form>

        {{-- Login Button / Nama User --}}
        @guest
          <button
            type="button"
            onclick="document.getElementById('loginModal').classList.remove('hidden')"
            class="nav-user-btn shrink-0 w-7 h-7 rounded-full flex items-center justify-center transition-all duration-150 active:scale-95"
            onmouseover="this.style.opacity='0.85'"
            onmouseout="this.style.opacity='1'"
            title="Masuk"
          >
            <svg viewBox="0 0 24 24" fill="currentColor" style="width:18px;height:18px;">
              <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
            </svg>
          </button>
        @endguest

        @auth
          <div class="relative group">
            <button type="button" class="nav-link inline-flex items-center gap-2 text-sm font-semibold transition focus:outline-none">
              <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                <circle cx="12" cy="7" r="4"/>
              </svg>
              {{ Auth::user()->nama }}
              <svg class="w-4 h-4 transition-transform duration-200 group-hover:rotate-180" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 011.08 1.04l-4.25 4.25a.75.75 0 01-1.06 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd"/>
              </svg>
            </button>
            <div class="absolute right-0 top-full z-50 pt-2
                        opacity-0 invisible translate-y-2
                        group-hover:opacity-100 group-hover:visible group-hover:translate-y-0
                        group-focus-within:opacity-100 group-focus-within:visible group-focus-within:translate-y-0
                        transition-all duration-200">
              <div class="w-48 rounded-xl bg-white border border-slate-200 shadow-md overflow-hidden">
                <a href="{{ route('peserta-submission.create') }}" class="dropdown-item flex items-center gap-2 px-4 py-3 text-sm text-slate-700 hover:bg-sky-50 hover:text-sky-700 transition-colors duration-150">
                  <svg class="w-4 h-4 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
                  Dashboard
                </a>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="dropdown-item flex w-full items-center gap-2 px-4 py-3 text-sm text-red-500 hover:bg-red-50 transition-colors duration-150">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                    Logout
                  </button>
                </form>
              </div>
            </div>
          </div>
        @endauth

        {{-- Rumah Pendidikan --}}
        <a href="#" class="shrink-0 flex items-center nav-logo">
          <img src="{{ asset('image/header/rumah-pendidikan.png') }}" alt="Rumah Pendidikan" class="h-8 w-auto object-contain block nav-logo-rumah" />
        </a>

      </div>

      {{-- Mobile Menu Button --}}
      <button
        type="button"
        class="nav-mobile-btn md:hidden inline-flex items-center justify-center p-2 rounded-lg transition"
        onclick="document.getElementById('mobileNav').classList.toggle('hidden')"
        aria-label="Buka Menu"
      >
        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>

    </div>

    {{-- MOBILE NAV --}}
    <div id="mobileNav" class="md:hidden hidden pb-4 px-2">
      <div class="space-y-2 pt-2">
        <a href="{{ route('home') }}" class="nav-link block py-2 font-semibold transition">Beranda</a>

        <div class="pt-1">
          <div class="nav-link font-semibold">Lomba</div>
          <div class="mt-1 pl-3 space-y-1 text-sm">
            <a href="{{ route('lomba.ketentuan') }}" class="nav-link-sub block py-1 transition">Ketentuan Lomba</a>
            <a href="{{ route('lomba.tahapan') }}" class="nav-link-sub block py-1 transition">Tahapan Kegiatan Lomba</a>
          </div>
        </div>

        <div class="pt-1">
          <div class="nav-link font-semibold">Pengumuman</div>
          <div class="mt-1 pl-3 space-y-1 text-sm">
            <a href="{{ route('pengumuman.3besar') }}" class="nav-link-sub block py-1 transition">Pengumuman 3 Besar</a>
            <a href="{{ route('pengumuman.lolos') }}" class="nav-link-sub block py-1 transition">Lolos Seleksi Proposal</a>
          </div>
        </div>

        <a href="{{ route('faq') }}" class="nav-link block py-2 font-semibold transition">FAQ</a>

        @guest
          <button
            type="button"
            onclick="document.getElementById('loginModal').classList.remove('hidden')"
            class="nav-link block py-2 font-semibold"
          >Masuk</button>
        @endguest

        @auth
          <div class="nav-link py-2 text-sm font-semibold">{{ Auth::user()->nama }}</div>
          <form method="POST" action="{{ route('logout') }}" class="">
            @csrf
            <button type="submit" class="text-sm text-red-500 font-semibold">Logout</button>
          </form>
        @endauth

        <div class="pt-2">
          <form id="mobileSearchForm" action="#" method="GET" class="relative" autocomplete="off">
            <input
              id="mobileSearchInput"
              type="text"
              name="q"
              placeholder="Cari..."
              class="w-full h-10 rounded-full border border-slate-300 bg-white px-4 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-sky-300"
            />
            <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-500" aria-label="Cari">
              <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="7"></circle>
                <path d="M21 21l-4.3-4.3"></path>
              </svg>
            </button>
          </form>
          <div class="mt-3">
            <img src="{{ asset('image/header/rumah-pendidikan.png') }}" alt="Rumah Pendidikan" class="h-8 w-auto object-contain block nav-logo-rumah" />
          </div>
        </div>
      </div>
    </div>

  </div>
</nav>


{{-- ============================================================ --}}
{{-- MODAL LOGIN                                                   --}}
{{-- ============================================================ --}}
<div id="loginModal"
  class="hidden fixed inset-0 z-[999] flex items-center justify-center p-4"
  onclick="if(event.target===this) closeLoginModal()"
>
  <div class="absolute inset-0 bg-slate-950/60 backdrop-blur-md"></div>

  <div class="relative w-full max-w-3xl bg-white rounded-3xl shadow-[0_32px_80px_rgba(0,0,0,0.18)] overflow-visible flex"
       style="min-height:420px; animation: modalPop 0.25s cubic-bezier(0.34,1.56,0.64,1) both;">

    {{-- LEFT PANEL --}}
    <div class="hidden md:flex w-2/5 flex-col justify-center items-center relative overflow-hidden rounded-3xl"
      style="background: linear-gradient(160deg, #1a6bb5 0%, #2196F3 55%, #64B5F6 100%);">
      <div style="position:absolute;width:260px;height:260px;border-radius:50%;background:rgba(255,255,255,0.10);top:-80px;left:-80px;"></div>
      <div style="position:absolute;width:180px;height:180px;border-radius:50%;background:rgba(255,255,255,0.10);top:80px;left:40px;"></div>
      <div style="position:absolute;width:220px;height:220px;border-radius:50%;background:rgba(255,255,255,0.10);bottom:-90px;left:10px;"></div>
      <div style="position:absolute;width:140px;height:140px;border-radius:50%;background:rgba(255,255,255,0.08);bottom:80px;right:-40px;"></div>
      <div style="position:absolute;width:100px;height:100px;border-radius:50%;background:rgba(255,255,255,0.07);top:30px;right:20px;"></div>
    </div>

    {{-- RIGHT PANEL --}}
<div class="flex-1 px-10 py-10 flex flex-col justify-center" style="font-family: 'Poppins', sans-serif;">

      <button type="button" onclick="window.location.href='{{ route('home') }}'"
        class="absolute top-5 right-5 z-9999 w-8 h-8 flex items-center justify-center rounded-full bg-slate-100 hover:bg-slate-200 text-slate-500 transition"
        aria-label="Tutup">
        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
          <path d="M18 6 6 18M6 6l12 12"/>
        </svg>
      </button>

      <div class="mb-7">
    <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight" style="font-family:'Poppins',sans-serif;">Login Peserta</h2>
        <p class="text-sm mt-1 font-normal whitespace-nowrap" style="font-family:'Poppins',sans-serif;color:#000;">Masuk ke akun peserta Hackathon Rumah Pendidikan</p>
      </div>

      @if($errors->any())
        <div class="mb-5 flex items-start gap-3 px-4 py-3 rounded-xl bg-red-50 border border-red-100">
          <svg class="w-4 h-4 text-red-500 mt-0.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="10"/><path d="M12 8v4m0 4h.01"/>
          </svg>
          <p class="text-sm text-red-600 font-medium">{{ $errors->first() }}</p>
        </div>
      @endif

      @if(session('status'))
        <div class="mb-5 flex items-start gap-3 px-4 py-3 rounded-xl bg-green-50 border border-green-100">
          <svg class="w-4 h-4 text-green-500 mt-0.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>
          </svg>
          <p class="text-sm text-green-700 font-medium">{{ session('status') }}</p>
        </div>
      @endif

      <form method="POST" action="{{ route('peserta.login.post') }}" id="loginForm">
        @csrf

        <div class="mb-4">
<label for="modal_email" class="block text-xs font-bold uppercase tracking-widest mb-2" style="font-family:'Poppins',sans-serif;color:#000;font-size:11px;">Email</label>
          <input
            id="modal_email" type="email" name="email"
            value="{{ old('email') }}" required autofocus
            placeholder="nama@email.com"
            class="w-full h-11 rounded-xl border-2 bg-slate-50 px-4 text-sm text-slate-900 placeholder-slate-300 outline-none transition-all duration-150
                   {{ $errors->has('email') ? 'border-red-300 bg-red-50' : 'border-slate-100 focus:border-sky-400 focus:bg-white focus:shadow-[0_0_0_4px_rgba(56,189,248,0.1)]' }}"
          />
        </div>

        <div class="mb-5">
          <label for="modal_password" class="block font-bold uppercase tracking-widest mb-2" style="font-family:'Poppins',sans-serif;color:#000;font-size:11px;letter-spacing:0.07em;">PASSWORD</label>
          <div class="relative">
            <input
              id="modal_password" type="password" name="password"
              required placeholder="••••••••"
              class="w-full h-11 rounded-xl border-2 bg-slate-50 px-4 pr-11 text-sm text-slate-900 placeholder-slate-300 outline-none transition-all duration-150
                     {{ $errors->has('password') ? 'border-red-300 bg-red-50' : 'border-slate-100 focus:border-sky-400 focus:bg-white focus:shadow-[0_0_0_4px_rgba(56,189,248,0.1)]' }}"
            />
            <button type="button" onclick="toggleModalPwd()"
              class="absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-300 hover:text-slate-500 transition">
              <svg id="modalEyeOpen" style="width:18px;height:18px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
              </svg>
              <svg id="modalEyeClosed" style="width:18px;height:18px;display:none;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19m-6.72-1.07a3 3 0 11-4.24-4.24"/>
                <line x1="1" y1="1" x2="23" y2="23"/>
              </svg>
            </button>
          </div>
        </div>

        <div class="flex items-center gap-2 mb-4">
          <input type="checkbox" id="modal_remember" name="remember"
            class="w-4 h-4 rounded border-slate-200 accent-sky-500 cursor-pointer" />
          <label for="modal_remember" class="text-sm text-slate-900 cursor-pointer select-none">Ingat saya</label>
        </div>

        <div class="flex justify-end mb-3 -mt-8">
             <button type="button" onclick="openForgot(event)"
             class="text-xs text-sky-600 hover:text-sky-800 transition">
            Lupa Password?
          </button>
        </div>

        <div class="mb-5">
          <div class="g-recaptcha"
            data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"
            data-callback="onCaptchaSuccess"
            data-expired-callback="onCaptchaExpired">
          </div>
        </div>

        <button type="submit"
          id="btnMasuk"
          disabled
          class="w-full h-12 rounded-xl text-sm font-bold text-white transition-all duration-150 active:scale-[0.98] disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none"
          style="background: linear-gradient(135deg,#1565C0,#1e88e5); box-shadow:0 4px 16px rgba(21,101,192,0.35);"
          onmouseover="if(!this.disabled){this.style.boxShadow='0 6px 24px rgba(21,101,192,0.45)'; this.style.transform='translateY(-1px)'}"
          onmouseout="if(!this.disabled){this.style.boxShadow='0 4px 16px rgba(21,101,192,0.35)'; this.style.transform='translateY(0)'}">
          Masuk
        </button>

      </form>
    </div>
  </div>
</div>

{{-- ============================================================ --}}
{{-- MODAL LUPA PASSWORD PESERTA                                   --}}
{{-- ============================================================ --}}
<div id="forgotModal"
  class="hidden fixed inset-0 z-[1000] flex items-center justify-center p-4"
  onclick="if(event.target===this) closeForgot()"
>
  <div class="absolute inset-0 bg-slate-950/60 backdrop-blur-md"></div>

  <div class="relative w-full max-w-md bg-white rounded-3xl shadow-[0_32px_80px_rgba(0,0,0,0.18)] overflow-hidden p-10"
       style="animation: modalPop 0.25s cubic-bezier(0.34,1.56,0.64,1) both;">

    <button type="button" onclick="closeForgot()"
      class="absolute top-5 right-5 w-8 h-8 flex items-center justify-center rounded-full bg-slate-100 hover:bg-slate-200 text-slate-500 transition"
      aria-label="Tutup">
      <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
        <path d="M18 6 6 18M6 6l12 12"/>
      </svg>
    </button>

    <div class="mb-7">
      <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight" style="font-family:'Plus Jakarta Sans',sans-serif;">Lupa Password?</h2>
      <p class="text-sm mt-1 font-medium text-slate-500" style="font-family:'Plus Jakarta Sans',sans-serif;">Masukkan email dan password baru Anda.</p>
    </div>

    <form method="POST" action="{{ route('peserta.password.reset') }}">
      @csrf

      <div class="mb-4">
        <label class="block text-xs font-bold uppercase tracking-widest mb-2" style="font-family:'Plus Jakarta Sans',sans-serif;color:#000;font-size:11px;">EMAIL PESERTA</label>
        <input type="email" name="email" required placeholder="nama@email.com"
          class="w-full h-11 rounded-xl border-2 border-slate-100 bg-slate-50 px-4 text-sm text-slate-900 placeholder-slate-300 outline-none transition-all duration-150 focus:border-sky-400 focus:bg-white focus:shadow-[0_0_0_4px_rgba(56,189,248,0.1)]" />
      </div>

      <div class="mb-4">
        <label class="block text-xs font-bold uppercase tracking-widest mb-2" style="font-family:'Plus Jakarta Sans',sans-serif;color:#000;font-size:11px;">PASSWORD BARU</label>
        <div class="relative">
          <input id="forgot_password" type="password" name="password" required placeholder="••••••••"
            class="w-full h-11 rounded-xl border-2 border-slate-100 bg-slate-50 px-4 pr-11 text-sm text-slate-900 placeholder-slate-300 outline-none transition-all duration-150 focus:border-sky-400 focus:bg-white focus:shadow-[0_0_0_4px_rgba(56,189,248,0.1)]" />
          <button type="button" onclick="toggleForgotPwd('forgot_password','forgotEyeOpen','forgotEyeClosed')"
            class="absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-300 hover:text-slate-500 transition">
            <svg id="forgotEyeOpen" style="width:18px;height:18px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
            </svg>
            <svg id="forgotEyeClosed" style="width:18px;height:18px;display:none;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19m-6.72-1.07a3 3 0 11-4.24-4.24"/>
              <line x1="1" y1="1" x2="23" y2="23"/>
            </svg>
          </button>
        </div>
      </div>

      <div class="mb-7">
        <label class="block text-xs font-bold uppercase tracking-widest mb-2" style="font-family:'Plus Jakarta Sans',sans-serif;color:#000;font-size:11px;">KONFIRMASI PASSWORD BARU</label>
        <div class="relative">
          <input id="forgot_confirm" type="password" name="password_confirmation" required placeholder="••••••••"
            class="w-full h-11 rounded-xl border-2 border-slate-100 bg-slate-50 px-4 pr-11 text-sm text-slate-900 placeholder-slate-300 outline-none transition-all duration-150 focus:border-sky-400 focus:bg-white focus:shadow-[0_0_0_4px_rgba(56,189,248,0.1)]" />
          <button type="button" onclick="toggleForgotPwd('forgot_confirm','forgotEyeOpen2','forgotEyeClosed2')"
            class="absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-300 hover:text-slate-500 transition">
            <svg id="forgotEyeOpen2" style="width:18px;height:18px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
            </svg>
            <svg id="forgotEyeClosed2" style="width:18px;height:18px;display:none;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19m-6.72-1.07a3 3 0 11-4.24-4.24"/>
              <line x1="1" y1="1" x2="23" y2="23"/>
            </svg>
          </button>
        </div>
      </div>

      <div class="flex gap-3">
        <button type="button" onclick="closeForgot()"
          class="flex-1 h-12 rounded-xl text-sm font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 transition">
          Batal
        </button>
        <button type="submit"
          class="flex-1 h-12 rounded-xl text-sm font-bold text-white transition-all duration-150 active:scale-[0.98]"
          style="background: linear-gradient(135deg,#1565C0,#1e88e5); box-shadow:0 4px 16px rgba(21,101,192,0.35);">
          Simpan
        </button>
      </div>

    </form>
  </div>
</div>

{{-- ============================================================ --}}
{{-- STYLES                                                        --}}
{{-- ============================================================ --}}
<style>
  /* ── Navbar entrance ── */
  @keyframes navSlideDown {
    from { opacity: 0; transform: translateY(-100%); }
    to   { opacity: 1; transform: translateY(0); }
  }
  .nav-entrance {
    animation: navSlideDown 0.5s cubic-bezier(0.22,1,0.36,1) forwards;
  }

  /* ── Logo pop in ── */
  @keyframes navLogoIn {
    from { opacity: 0; transform: scale(0.88); }
    to   { opacity: 1; transform: scale(1); }
  }
  .nav-logo {
    animation: navLogoIn 0.6s cubic-bezier(0.22,1,0.36,1) 0.2s both;
  }

  /* ── Nav items stagger in ── */
  @keyframes navItemIn {
    from { opacity: 0; transform: translateY(-8px); }
    to   { opacity: 1; transform: translateY(0); }
  }
  .nav-item {
    animation: navItemIn 0.5s cubic-bezier(0.22,1,0.36,1) calc(0.15s + var(--ni, 0) * 0.07s) both;
  }

  /* ── Nav link underline hover ── */
  .nav-link {
    position: relative;
    padding-bottom: 2px;
  }
  .nav-link::after {
    content: '';
    position: absolute;
    bottom: -2px; left: 0;
    width: 0; height: 2px;
    border-radius: 99px;
    transition: width 0.25s cubic-bezier(0.22,1,0.36,1);
  }
  .nav-link:hover::after { width: 100%; }

  /* ── Dropdown item accent ── */
  .dropdown-item {
    position: relative;
    padding-left: 1rem !important;
  }
  .dropdown-item::before {
    content: '';
    position: absolute;
    left: 0; top: 50%;
    transform: translateY(-50%) scaleY(0);
    width: 3px; height: 60%;
    background: #0072BC;
    border-radius: 99px;
    transition: transform 0.2s ease;
  }
  .dropdown-item:hover::before { transform: translateY(-50%) scaleY(1); }

  /* ── Modal ── */
  @keyframes modalPop {
    from { opacity: 0; transform: scale(0.94) translateY(12px); }
    to   { opacity: 1; transform: scale(1) translateY(0); }
  }

  /* ── Logo transition ── */
  .nav-logo-kemendik,
  .nav-logo-rumah {
    transition: filter 0.3s ease;
  }

  /* ══════════════════════════════════════
     PILL STATES
  ══════════════════════════════════════ */

  /* WHITE STATE */
  #nav-pill.pill-white {
    background: #ffffff;
    border: 1px solid rgba(0,0,0,0.08);
    box-shadow: 0 2px 20px rgba(0,0,0,0.08);
  }
  #nav-pill.pill-white .nav-link        { color: #334155; font-family: 'Sora', system-ui, sans-serif; }
  #nav-pill.pill-white .nav-link:hover  { color: #0f172a; }
  #nav-pill.pill-white .nav-link::after { background: #0072BC; }
  #nav-pill.pill-white .nav-search-input {
    border: 1px solid #e2e8f0;
    background: #f8fafc;
    color: #334155;
  }
  #nav-pill.pill-white .nav-search-input::placeholder { color: #94a3b8; }
  #nav-pill.pill-white .nav-search-btn  { color: #94a3b8; }
  #nav-pill.pill-white .nav-search-btn:hover { color: #0369a1; }
  #nav-pill.pill-white .nav-user-btn    { background: linear-gradient(135deg,#0369a1,#0ea5e9); color: white; }
  #nav-pill.pill-white .nav-mobile-btn  { color: #1e293b; }
  #nav-pill.pill-white .nav-mobile-btn:hover { background: #f1f5f9; }
  /* Logo normal di white */
  #nav-pill.pill-white .nav-logo-rumah    { filter: none; }
  #nav-pill.pill-white .nav-logo-kemendik { filter: none; }

  /* NAVY STATE */
  #nav-pill.pill-navy {
    background: rgba(3, 8, 26, 0.85);
    border: 1px solid rgba(255,255,255,0.08);
    box-shadow: 0 4px 24px rgba(0,0,0,0.35);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
  }
  #nav-pill.pill-navy .nav-link        { color: rgba(255,255,255,0.80); font-family: 'Sora', system-ui, sans-serif; }
  #nav-pill.pill-navy .nav-link:hover  { color: #ffffff; }
  #nav-pill.pill-navy .nav-link::after { background: #60a5fa; }
  #nav-pill.pill-navy .nav-search-input {
    border: 1px solid rgba(255,255,255,0.1);
    background: rgba(255,255,255,0.06);
    color: rgba(255,255,255,0.85);
  }
  #nav-pill.pill-navy .nav-search-input::placeholder { color: rgba(255,255,255,0.28); }
  #nav-pill.pill-navy .nav-search-btn  { color: rgba(255,255,255,0.45); }
  #nav-pill.pill-navy .nav-search-btn:hover { color: rgba(255,255,255,0.9); }
  #nav-pill.pill-navy .nav-user-btn    { background: rgba(255,255,255,0.12); color: white; }
  #nav-pill.pill-navy .nav-mobile-btn  { color: #ffffff; }
  #nav-pill.pill-navy .nav-mobile-btn:hover { background: rgba(255,255,255,0.08); }
  /* Logo jadi putih di navy */
 #nav-pill.pill-navy .nav-logo-rumah    { filter: none; }
 #nav-pill.pill-navy .nav-logo-kemendik { filter: none; }
  /* Mobile nav sub link warna */
  #nav-pill.pill-white .nav-link-sub { color: #64748b; }
  #nav-pill.pill-white .nav-link-sub:hover { color: #0369a1; }
  #nav-pill.pill-navy  .nav-link-sub { color: rgba(255,255,255,0.55); }
  #nav-pill.pill-navy  .nav-link-sub:hover { color: #fff; }

  /* Search expand on focus */
  .nav-search input:focus { width: 13rem; }
</style>


{{-- ============================================================ --}}
{{-- SCRIPTS                                                       --}}
{{-- ============================================================ --}}
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
(function () {

  const pill     = document.getElementById('nav-pill');
  const isHome   = {{ request()->routeIs('home') ? 'true' : 'false' }};
  const SCROLL_Y = 60;

  function applyState() {
    const scrolled = window.scrollY > SCROLL_Y;

    if (isHome) {
      pill.classList.remove('pill-navy');
      pill.classList.add('pill-white');
    } else {
      if (scrolled) {
        pill.classList.remove('pill-white');
        pill.classList.add('pill-navy');
      } else {
        pill.classList.remove('pill-navy');
        pill.classList.add('pill-white');
      }
    }
  }

  applyState();
  window.addEventListener('scroll', applyState, { passive: true });

  /* ── Search ── */
  var pages = [
    { title: 'Beranda',                url: '{{ route("home") }}',               tags: ['beranda','home','utama','depan'] },
    { title: 'FAQ',                    url: '{{ route("faq") }}',                tags: ['faq','pertanyaan','tanya','jawab','frequently','asked'] },
    { title: 'Ketentuan Lomba',        url: '{{ route("lomba.ketentuan") }}',    tags: ['ketentuan','lomba','syarat','aturan','persyaratan'] },
    { title: 'Tahapan Kegiatan Lomba', url: '{{ route("lomba.tahapan") }}',      tags: ['tahapan','kegiatan','lomba','jadwal','alur','proses','pendaftaran'] },
    { title: 'Pengumuman 3 Besar',     url: '{{ route("pengumuman.3besar") }}',  tags: ['pengumuman','3 besar','tiga besar','pemenang','juara'] },
    { title: 'Lolos Seleksi Proposal', url: '{{ route("pengumuman.lolos") }}',   tags: ['lolos','seleksi','proposal','pengumuman','finalis'] },
  ];

  function doSearch(query) {
    var q = query.trim().toLowerCase();
    if (q === '') return;
    var matched = null, bestScore = 0;
    for (var i = 0; i < pages.length; i++) {
      var page = pages[i], score = 0;
      for (var j = 0; j < page.tags.length; j++) {
        var tag = page.tags[j].toLowerCase();
        if (tag === q) score += 10;
        else if (tag.includes(q) || q.includes(tag)) score += 5;
      }
      if (page.title.toLowerCase().includes(q)) score += 7;
      if (score > bestScore) { bestScore = score; matched = page; }
    }
    if (matched) {
      if (matched.url.startsWith('#')) {
        var el = document.querySelector(matched.url);
        if (el) el.scrollIntoView({ behavior: 'smooth' });
      } else {
        window.location.href = matched.url;
      }
    }
  }

  ['navSearchForm','mobileSearchForm'].forEach(function (id) {
    var form = document.getElementById(id);
    if (!form) return;
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var input = form.querySelector('input[name="q"]');
      if (input) doSearch(input.value);
    });
  });

})();

function closeLoginModal() {
  document.getElementById('loginModal').classList.add('hidden');
}

function toggleModalPwd() {
  var input  = document.getElementById('modal_password');
  var open   = document.getElementById('modalEyeOpen');
  var closed = document.getElementById('modalEyeClosed');
  if (input.type === 'password') {
    input.type = 'text';
    open.style.display   = 'none';
    closed.style.display = 'block';
  } else {
    input.type = 'password';
    open.style.display   = 'block';
    closed.style.display = 'none';
  }
}

function onCaptchaSuccess()  { document.getElementById('btnMasuk').disabled = false; }
function onCaptchaExpired()  { document.getElementById('btnMasuk').disabled = true;  }

document.addEventListener('keydown', function (e) {
  if (e.key === 'Escape') closeLoginModal();
});
function openForgot(e) {
   e.preventDefault();
  document.getElementById('forgotModal').classList.remove('hidden');
}
function closeForgot() {
  document.getElementById('forgotModal').classList.add('hidden');
}
function toggleForgotPwd(inputId, eyeOpenId, eyeClosedId) {
  var input  = document.getElementById(inputId);
  var open   = document.getElementById(eyeOpenId);
  var closed = document.getElementById(eyeClosedId);
  if (input.type === 'password') {
    input.type = 'text';
    open.style.display   = 'none';
    closed.style.display = 'block';
  } else {
    input.type = 'password';
    open.style.display   = 'block';
    closed.style.display = 'none';
  }
}
@if($errors->any())
  document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('loginModal').classList.remove('hidden');
  });
@endif
</script>