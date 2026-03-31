<nav class="sticky top-0 z-50 w-full border-b border-sky-100 bg-sky-50 shadow-sm nav-entrance">
  <div class="max-w-7xl mx-auto px-6">
    <div class="flex items-center h-20">

      {{-- LEFT --}}
      <div class="flex flex-1 items-center">
        <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0 nav-logo">
          <img
            src="{{ asset('image/header/kemendikdasmen.png') }}"
            alt="Kemendikdasmen"
            class="h-12 w-auto object-contain block"
          />
        </a>
      </div>

      {{-- CENTER --}}
      <div class="hidden md:flex flex-1 justify-center">
        <ul class="flex items-center gap-8 text-[15px] font-semibold text-slate-900">

          <li class="nav-item" style="--ni:0">
            <a href="{{ route('home') }}" class="nav-link hover:text-sky-700 transition">
              Beranda
            </a>
          </li>

          <li class="relative group nav-item" style="--ni:1">
            <button type="button"
              class="nav-link inline-flex items-center gap-2 hover:text-sky-700 transition focus:outline-none">
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
              class="nav-link inline-flex items-center gap-2 hover:text-sky-700 transition focus:outline-none">
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
            <a href="{{ route('faq') }}" class="nav-link hover:text-sky-700 transition">FAQ</a>
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
            class="w-40 h-9 rounded-full border border-slate-200 bg-white/80 px-4 pr-9 text-xs
                   focus:outline-none focus:ring-2 focus:ring-sky-300
                   transition-all duration-300"
          />
          <button type="submit"
            class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-sky-600 transition-colors duration-150"
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
            class="shrink-0 w-7 h-7 rounded-full flex items-center justify-center transition-all duration-150 active:scale-95"
            style="background:linear-gradient(135deg,#0369a1,#0ea5e9);"
            onmouseover="this.style.opacity='0.85'"
            onmouseout="this.style.opacity='1'"
            title="Masuk"
          >
            <svg viewBox="0 0 24 24" fill="white" style="width:18px;height:18px;">
              <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
            </svg>
          </button>
        @endguest

        @auth
          {{-- Dropdown user saat sudah login --}}
          <div class="relative group">
            <button type="button" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-700 hover:text-sky-700 transition focus:outline-none">
              <svg class="w-5 h-5 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
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
                <a href="{{ route('dashboard') }}" class="dropdown-item flex items-center gap-2 px-4 py-3 text-sm text-slate-700 hover:bg-sky-50 hover:text-sky-700 transition-colors duration-150">
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
          <img src="{{ asset('image/header/rumah-pendidikan.png') }}" alt="Rumah Pendidikan" class="h-8 w-auto object-contain block" />
        </a>

      </div>

      {{-- Mobile Menu Button --}}
      <button
        type="button"
        class="md:hidden inline-flex items-center justify-center p-2 rounded-lg hover:bg-sky-200 transition"
        onclick="document.getElementById('mobileNav').classList.toggle('hidden')"
        aria-label="Buka Menu"
      >
        <svg class="w-6 h-6 text-slate-800" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>

    </div>

    {{-- MOBILE NAV --}}
    <div id="mobileNav" class="md:hidden hidden pb-4">
      <div class="space-y-2">
        <a href="{{ route('home') }}" class="block px-2 py-2 font-semibold text-slate-900 hover:text-sky-700 transition">Beranda</a>

        <div class="px-2 pt-2">
          <div class="font-semibold text-slate-900">Lomba</div>
          <div class="mt-1 pl-3 space-y-1 text-sm text-slate-700">
            <a href="{{ route('lomba.ketentuan') }}" class="block py-1 hover:text-sky-700 transition">Ketentuan Lomba</a>
            <a href="{{ route('lomba.tahapan') }}" class="block py-1 hover:text-sky-700 transition">Tahapan Kegiatan Lomba</a>
          </div>
        </div>

        <div class="px-2 pt-2">
          <div class="font-semibold text-slate-900">Pengumuman</div>
          <div class="mt-1 pl-3 space-y-1 text-sm text-slate-700">
            <a href="{{ route('pengumuman.3besar') }}" class="block py-1 hover:text-sky-700 transition">Pengumuman 3 Besar</a>
            <a href="{{ route('pengumuman.lolos') }}" class="block py-1 hover:text-sky-700 transition">Lolos Seleksi Proposal</a>
          </div>
        </div>

        <a href="{{ route('faq') }}" class="block px-2 py-2 font-semibold text-slate-900 hover:text-sky-700 transition">FAQ</a>

        @guest
          <button
            type="button"
            onclick="document.getElementById('loginModal').classList.remove('hidden')"
            class="block w-full text-left px-2 py-2 font-semibold text-slate-900"
          >
            Masuk
          </button>
        @endguest

        @auth
          <div class="px-2 py-2 text-sm font-semibold text-slate-700">{{ Auth::user()->nama }}</div>
          <form method="POST" action="{{ route('logout') }}" class="px-2">
            @csrf
            <button type="submit" class="text-sm text-red-600 font-semibold">Logout</button>
          </form>
        @endauth

        <div class="px-2 pt-2">
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
            <img src="{{ asset('image/header/rumah-pendidikan.png') }}" alt="Rumah Pendidikan" class="h-8 w-auto object-contain block" />
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

  <div class="relative w-full max-w-3xl bg-white rounded-3xl shadow-[0_32px_80px_rgba(0,0,0,0.18)] overflow-hidden flex"
       style="min-height:420px; animation: modalPop 0.25s cubic-bezier(0.34,1.56,0.64,1) both;">

    {{-- LEFT PANEL --}}
    <div class="hidden md:flex w-2/5 flex-col justify-center items-center relative overflow-hidden"
         style="background: linear-gradient(160deg, #1a6bb5 0%, #2196F3 55%, #64B5F6 100%);">
      <div style="position:absolute;width:260px;height:260px;border-radius:50%;background:rgba(255,255,255,0.10);top:-80px;left:-80px;"></div>
      <div style="position:absolute;width:180px;height:180px;border-radius:50%;background:rgba(255,255,255,0.10);top:80px;left:40px;"></div>
      <div style="position:absolute;width:220px;height:220px;border-radius:50%;background:rgba(255,255,255,0.10);bottom:-90px;left:10px;"></div>
      <div style="position:absolute;width:140px;height:140px;border-radius:50%;background:rgba(255,255,255,0.08);bottom:80px;right:-40px;"></div>
      <div style="position:absolute;width:100px;height:100px;border-radius:50%;background:rgba(255,255,255,0.07);top:30px;right:20px;"></div>
    </div>

    {{-- RIGHT PANEL --}}
    <div class="flex-1 px-10 py-10 flex flex-col justify-center">

      <button type="button" onclick="closeLoginModal()"
        class="absolute top-5 right-5 z-10 w-8 h-8 flex items-center justify-center rounded-full bg-slate-100 hover:bg-slate-200 text-slate-500 transition"
        aria-label="Tutup">
        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
          <path d="M18 6 6 18M6 6l12 12"/>
        </svg>
      </button>

      <div class="mb-7">
        <h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Login Peserta</h2>
        <p class="text-sm text-slate-400 mt-1 font-medium">Masuk ke akun peserta Hackathon Rumah Pendidikan</p>
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

      {{-- FORM LOGIN --}}
      <form method="POST" action="{{ route('login') }}" id="loginForm">
        @csrf

        {{-- Email --}}
        <div class="mb-4">
          <label for="modal_email" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Email</label>
          <input
            id="modal_email" type="email" name="email"
            value="{{ old('email') }}" required autofocus
            placeholder="nama@email.com"
            class="w-full h-11 rounded-xl border-2 bg-slate-50 px-4 text-sm text-slate-900 placeholder-slate-300 outline-none transition-all duration-150
                   {{ $errors->has('email') ? 'border-red-300 bg-red-50' : 'border-slate-100 focus:border-sky-400 focus:bg-white focus:shadow-[0_0_0_4px_rgba(56,189,248,0.1)]' }}"
          />
        </div>

        {{-- Password --}}
        <div class="mb-5">
          <label for="modal_password" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Kata Sandi</label>
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

        {{-- Remember Me --}}
        <div class="flex items-center gap-2 mb-4">
          <input type="checkbox" id="modal_remember" name="remember"
            class="w-4 h-4 rounded border-slate-200 accent-sky-500 cursor-pointer" />
          <label for="modal_remember" class="text-sm text-slate-500 cursor-pointer select-none">Ingat saya</label>
        </div>

        {{-- ===== CAPTCHA "I'm not a robot" ===== --}}
        <div id="captchaBox"
          onclick="doCaptcha()"
          class="flex items-center gap-3 mb-5 px-4 py-3 rounded-xl border-2 border-slate-100 bg-slate-50 cursor-pointer select-none transition-all duration-200"
          style="min-height:52px;">

          {{-- Spinner (saat verifying) --}}
          <div id="captchaSpinner" style="display:none;">
            <svg class="animate-spin" style="width:20px;height:20px;color:#0ea5e9;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"/>
            </svg>
          </div>

          {{-- Checkbox --}}
          <div id="captchaCheckbox"
            style="width:22px;height:22px;border:2px solid #cbd5e1;border-radius:3px;background:white;display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:all .25s;">
            <svg id="captchaCheck" style="display:none;width:13px;height:10px;" viewBox="0 0 13 10" fill="none">
              <path d="M1.5 5L5 8.5L11.5 1.5" stroke="white" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>

          {{-- Label --}}
          <span id="captchaLabel" class="flex-1 text-sm font-medium text-slate-700">Saya bukan robot</span>

          {{-- reCAPTCHA branding --}}
          <div class="flex flex-col items-center gap-0.5 flex-shrink-0">
            <div style="width:28px;height:28px;border-radius:50%;background:linear-gradient(135deg,#4285F4,#34A853,#FBBC05,#EA4335);display:flex;align-items:center;justify-content:center;">
              <svg style="width:16px;height:16px;" viewBox="0 0 64 64" fill="none">
                <path d="M32 8C18.7 8 8 18.7 8 32s10.7 24 24 24 24-10.7 24-24S45.3 8 32 8z" fill="white" opacity=".9"/>
                <path d="M32 16c-8.8 0-16 7.2-16 16s7.2 16 16 16 16-7.2 16-16-7.2-16-16-16zm0 6c5.5 0 10 4.5 10 10s-4.5 10-10 10-10-4.5-10-10 4.5-10 10-10z" fill="#4285F4"/>
              </svg>
            </div>
            <span style="font-size:8px;color:#94a3b8;line-height:1.2;text-align:center;">reCAPTCHA<br>Privasi · Syarat</span>
          </div>
        </div>
        {{-- ===== END CAPTCHA ===== --}}

        {{-- Tombol Masuk --}}
        <button type="submit"
          id="btnMasuk"
          disabled
          class="w-full h-12 rounded-xl text-sm font-bold text-white transition-all duration-200 active:scale-[0.98] disabled:cursor-not-allowed disabled:transform-none"
          style="background: linear-gradient(135deg, #64B5F6, #2196F3); box-shadow: 0 4px 16px rgba(33,150,243,0.3);"
          onmouseover="if(!this.disabled){this.style.boxShadow='0 6px 24px rgba(21,101,192,0.45)'; this.style.transform='translateY(-1px)'}"
          onmouseout="if(!this.disabled){this.style.boxShadow='0 4px 16px rgba(21,101,192,0.35)'; this.style.transform='translateY(0)'}">
          Masuk
        </button>

      </form>
    </div>
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

  /* ── Nav link underline on hover ── */
  .nav-link {
    position: relative;
    padding-bottom: 2px;
  }
  .nav-link::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 0;
    height: 2px;
    background: #0072BC;
    border-radius: 99px;
    transition: width 0.25s cubic-bezier(0.22,1,0.36,1);
  }
  .nav-link:hover::after { width: 100%; }

  /* ── Dropdown item left border accent ── */
  .dropdown-item {
    position: relative;
    padding-left: 1rem !important;
  }
  .dropdown-item::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%) scaleY(0);
    width: 3px;
    height: 60%;
    background: #0072BC;
    border-radius: 99px;
    transition: transform 0.2s ease;
  }
  .dropdown-item:hover::before { transform: translateY(-50%) scaleY(1); }

  /* ── Search expand on focus ── */
  .nav-search input:focus { width: 13rem; }

  /* ── Modal ── */
  @keyframes modalPop {
    from { opacity: 0; transform: scale(0.94) translateY(12px); }
    to   { opacity: 1; transform: scale(1) translateY(0); }
  }

  /* ── Captcha hover ── */
  #captchaBox:hover {
    border-color: #7dd3fc !important;
    background-color: #f0f9ff !important;
  }
  #captchaBox.captcha-verified {
    border-color: #86efac !important;
    background-color: #f0fdf4 !important;
    cursor: default;
  }

  /* ── Spinner spin ── */
  @keyframes spin {
    from { transform: rotate(0deg); }
    to   { transform: rotate(360deg); }
  }
  .animate-spin { animation: spin 0.7s linear infinite; }
</style>

{{-- ============================================================ --}}
{{-- SCRIPTS                                                       --}}
{{-- ============================================================ --}}
<script>
(function () {
  var pages = [
    { title: 'Beranda',                 url: '{{ route("home") }}',                tags: ['beranda', 'home', 'utama', 'depan'] },
    { title: 'FAQ',                     url: '{{ route("faq") }}',                 tags: ['faq', 'pertanyaan', 'tanya', 'jawab', 'frequently', 'asked'] },
    { title: 'Ketentuan Lomba',         url: '{{ route("lomba.ketentuan") }}',     tags: ['ketentuan', 'lomba', 'syarat', 'aturan', 'persyaratan', 'peraturan'] },
    { title: 'Tahapan Kegiatan Lomba',  url: '{{ route("lomba.tahapan") }}',       tags: ['tahapan', 'kegiatan', 'lomba', 'jadwal', 'alur', 'proses', 'pendaftaran', 'pelatihan', 'proposal', 'inkubasi', 'penjurian', 'hadiah'] },
    { title: 'Pengumuman 3 Besar',      url: '{{ route("pengumuman.3besar") }}',   tags: ['pengumuman', '3 besar', 'tiga besar', 'pemenang', 'juara', 'winner'] },
    { title: 'Lolos Seleksi Proposal',  url: '{{ route("pengumuman.lolos") }}',    tags: ['lolos', 'seleksi', 'proposal', 'pengumuman', 'finalis'] },
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
    if (matched) window.location.href = matched.url;
  }

  ['navSearchForm', 'mobileSearchForm'].forEach(function (formId) {
    var form = document.getElementById(formId);
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
    open.style.display = 'none';
    closed.style.display = 'block';
  } else {
    input.type = 'password';
    open.style.display = 'block';
    closed.style.display = 'none';
  }
}

/* ===== CAPTCHA ===== */
var captchaDone = false;

function doCaptcha() {
  if (captchaDone) return;

  var box      = document.getElementById('captchaBox');
  var spinner  = document.getElementById('captchaSpinner');
  var checkbox = document.getElementById('captchaCheckbox');
  var check    = document.getElementById('captchaCheck');
  var label    = document.getElementById('captchaLabel');
  var btn      = document.getElementById('btnMasuk');

  checkbox.style.display = 'none';
  spinner.style.display  = 'block';
  label.textContent      = 'Memverifikasi...';
  box.style.cursor       = 'default';

  setTimeout(function () {
    spinner.style.display      = 'none';
    checkbox.style.display     = 'flex';
    checkbox.style.background  = '#22c55e';
    checkbox.style.borderColor = '#22c55e';
    check.style.display        = 'block';
    label.textContent          = 'Verifikasi berhasil';
    box.classList.add('captcha-verified');

    captchaDone  = true;
    btn.disabled = false;
    btn.style.background  = 'linear-gradient(135deg, #1565C0, #1e88e5)';
    btn.style.boxShadow   = '0 4px 16px rgba(21,101,192,0.35)';
  }, 1400);
}

document.addEventListener('keydown', function (e) {
  if (e.key === 'Escape') closeLoginModal();
});

@if($errors->any())
  document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('loginModal').classList.remove('hidden');
  });
@endif
</script>