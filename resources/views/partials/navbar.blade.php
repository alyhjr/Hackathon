<nav class="sticky top-0 z-50 w-full border-b border-sky-200 bg-sky-100/85 backdrop-blur supports-[backdrop-filter]:bg-sky-100/75">
  <div class="max-w-7xl mx-auto px-6">
    <div class="flex items-center h-20">

      {{-- LEFT --}}
      <div class="flex flex-1 items-center">
        <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0">
          <img
            src="{{ asset('image/header/kemendikdasmen.png') }}"
            alt="Kemendikdasmen"
            class="h-12 w-auto object-contain block"
          />
        </a>
      </div>

      {{-- CENTER (BENAR-BENAR CENTER) --}}
      <div class="hidden md:flex flex-1 justify-center">
        <ul class="flex items-center gap-8 text-[15px] font-semibold text-slate-900">

          {{-- Beranda --}}
          <li>
            <a href="{{ route('home') }}" class="hover:text-sky-700 transition">
              Beranda
            </a>
          </li>

          {{-- Lomba Dropdown (FIX ANTI ILANG) --}}
          <li class="relative group">
            <button
              type="button"
              class="inline-flex items-center gap-2 hover:text-sky-700 transition focus:outline-none"
            >
              Lomba
              <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                  d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 011.08 1.04l-4.25 4.25a.75.75 0 01-1.06 0L5.21 8.27a.75.75 0 01.02-1.06z"
                  clip-rule="evenodd" />
              </svg>
            </button>

            {{-- Dropdown WRAPPER + "bridge" --}}
            <div
              class="absolute left-0 top-full z-50 pt-2
                     opacity-0 invisible translate-y-1
                     group-hover:opacity-100 group-hover:visible group-hover:translate-y-0
                     group-focus-within:opacity-100 group-focus-within:visible group-focus-within:translate-y-0
                     transition-all duration-150"
            >
              <div class="w-64 rounded-xl bg-white border border-slate-200 shadow-lg overflow-hidden">
                <a href="{{ route('lomba.ketentuan') }}"
                  class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50">
                  Panduan Lomba
                </a>
                <a href="{{ route('lomba.tahapan') }}"
                  class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50">
                  Tahapan Kegiatan Lomba
                </a>
              </div>
            </div>
          </li>

          {{-- Pengumuman Dropdown (FIX ANTI ILANG) --}}
          <li class="relative group">
            <button
              type="button"
              class="inline-flex items-center gap-2 hover:text-sky-700 transition focus:outline-none"
            >
              Pengumuman
              <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                  d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 011.08 1.04l-4.25 4.25a.75.75 0 01-1.06 0L5.21 8.27a.75.75 0 01.02-1.06z"
                  clip-rule="evenodd" />
              </svg>
            </button>

            <div
              class="absolute left-0 top-full z-50 pt-2
                     opacity-0 invisible translate-y-1
                     group-hover:opacity-100 group-hover:visible group-hover:translate-y-0
                     group-focus-within:opacity-100 group-focus-within:visible group-focus-within:translate-y-0
                     transition-all duration-150"
            >
              <div class="w-72 rounded-xl bg-white border border-slate-200 shadow-lg overflow-hidden">
                <a href="{{ route('pengumuman.3besar') }}"
                  class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50">
                  Pengumuman 3 Besar
                </a>
                <a href="{{ route('pengumuman.lolos') }}"
                  class="block px-4 py-3 text-sm text-slate-700 hover:bg-slate-50">
                  Lolos Seleksi Proposal
                </a>
              </div>
            </div>
          </li>

          {{-- FAQ --}}
          <li>
            <a href="{{ route('faq') }}" class="hover:text-sky-700 transition">
              FAQ
            </a>
          </li>

        </ul>
      </div>

      {{-- RIGHT --}}
      <div class="hidden md:flex flex-1 items-center justify-end gap-3 whitespace-nowrap">

        {{-- Search (kecil) --}}
        <form action="#" method="GET" class="relative">
          <input
            type="text"
            name="q"
            placeholder="Cari..."
            class="w-40 h-9 rounded-full border border-slate-300 bg-white px-4 pr-9 text-xs
                   focus:outline-none focus:ring-2 focus:ring-sky-300"
          />
          <button
            type="submit"
            class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-500 hover:text-slate-700"
            aria-label="Cari"
          >
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <circle cx="11" cy="11" r="7"></circle>
              <path d="M21 21l-4.3-4.3"></path>
            </svg>
          </button>
        </form>

        {{-- Rumah Pendidikan --}}
        <a href="#" class="shrink-0 flex items-center">
          <img
            src="{{ asset('image/header/rumah-pendidikan.png') }}"
            alt="Rumah Pendidikan"
            class="h-8 w-auto object-contain block"
          />
        </a>

      </div>

      {{-- Mobile Menu Button --}}
      <button
        type="button"
        class="md:hidden inline-flex items-center justify-center p-2 rounded-lg hover:bg-sky-200"
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
        <a href="{{ route('home') }}" class="block px-2 py-2 font-semibold text-slate-900">Beranda</a>

        <div class="px-2 pt-2">
          <div class="font-semibold text-slate-900">Lomba</div>
          <div class="mt-1 pl-3 space-y-1 text-sm text-slate-700">
            <a href="{{ route('lomba.ketentuan') }}" class="block py-1">Ketentuan Lomba</a>
            <a href="{{ route('lomba.tahapan') }}" class="block py-1">Tahapan Kegiatan Lomba</a>
          </div>
        </div>

        <div class="px-2 pt-2">
          <div class="font-semibold text-slate-900">Pengumuman</div>
          <div class="mt-1 pl-3 space-y-1 text-sm text-slate-700">
            <a href="{{ route('pengumuman.3besar') }}" class="block py-1">Pengumuman 3 Besar</a>
            <a href="{{ route('pengumuman.lolos') }}" class="block py-1">Lolos Seleksi Proposal</a>
          </div>
        </div>

        <a href="{{ route('faq') }}" class="block px-2 py-2 font-semibold text-slate-900">FAQ</a>

        <div class="px-2 pt-2">
          <form action="#" method="GET" class="relative">
            <input
              type="text"
              name="q"
              placeholder="Cari..."
              class="w-full h-10 rounded-full border border-slate-300 bg-white px-4 pr-10 text-sm
                     focus:outline-none focus:ring-2 focus:ring-sky-300"
            />
            <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-500" aria-label="Cari">
              <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="7"></circle>
                <path d="M21 21l-4.3-4.3"></path>
              </svg>
            </button>
          </form>

          <div class="mt-3">
            <img
              src="{{ asset('image/header/rumah-pendidikan.png') }}"
              alt="Rumah Pendidikan"
              class="h-8 w-auto object-contain block"
            />
          </div>
        </div>
      </div>
    </div>

  </div>
</nav>