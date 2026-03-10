<nav class="sticky top-0 z-50 w-full border-b border-sky-200 bg-sky-100/85 backdrop-blur supports-[backdrop-filter]:bg-sky-100/75 nav-entrance">
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
            <a href="{{ route('home') }}" class="nav-link hover:text-sky-700 transition relative">
              Beranda
            </a>
          </li>

          <li class="relative group nav-item" style="--ni:1">
            <button type="button"
              class="nav-link inline-flex items-center gap-2 hover:text-sky-700 transition focus:outline-none">
              Lomba
              <svg class="w-4 h-4 transition-transform duration-200 group-hover:rotate-180" viewBox="0 0 20 20" fill="currentColor">
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
              <svg class="w-4 h-4 transition-transform duration-200 group-hover:rotate-180" viewBox="0 0 20 20" fill="currentColor">
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
            <a href="{{ route('faq') }}" class="nav-link hover:text-sky-700 transition">
              FAQ
            </a>
          </li>

        </ul>
      </div>

      {{-- RIGHT --}}
      <div class="hidden md:flex flex-1 items-center justify-end gap-3 whitespace-nowrap nav-item" style="--ni:4">
        <form id="navSearchForm" action="#" method="GET" class="relative nav-search" autocomplete="off">
          <input
            id="navSearchInput"
            type="text"
            name="q"
            placeholder="Cari..."
            class="w-40 h-9 rounded-full border border-slate-200 bg-white/80 px-4 pr-9 text-xs
                   focus:outline-none focus:ring-2 focus:ring-sky-300 focus:w-52
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

        <a href="#" class="shrink-0 flex items-center nav-logo">
          <img src="{{ asset('image/header/rumah-pendidikan.png') }}" alt="Rumah Pendidikan"
               class="h-8 w-auto object-contain block"/>
        </a>
      </div>

      {{-- Mobile Menu Button --}}
      <button
        type="button"
        class="md:hidden inline-flex items-center justify-center p-2 rounded-lg hover:bg-sky-200 transition"
        onclick="document.getElementById('mobileNav').classList.toggle('hidden')"
        aria-label="Buka Menu">
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

        <div class="px-2 pt-2">
          <form id="mobileSearchForm" action="#" method="GET" class="relative" autocomplete="off">
            <input id="mobileSearchInput" type="text" name="q" placeholder="Cari..."
              class="w-full h-10 rounded-full border border-slate-300 bg-white px-4 pr-10 text-sm
                     focus:outline-none focus:ring-2 focus:ring-sky-300"/>
            <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-500" aria-label="Cari">
              <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="7"></circle>
                <path d="M21 21l-4.3-4.3"></path>
              </svg>
            </button>
          </form>
          <div class="mt-3">
            <img src="{{ asset('image/header/rumah-pendidikan.png') }}" alt="Rumah Pendidikan"
                 class="h-8 w-auto object-contain block"/>
          </div>
        </div>
      </div>
    </div>

  </div>
</nav>

<style>
  /* ── Entrance: navbar turun dari atas saat load ── */
  @keyframes navSlideDown {
    from { opacity: 0; transform: translateY(-100%); }
    to   { opacity: 1; transform: translateY(0); }
  }
  .nav-entrance {
    animation: navSlideDown 0.5s cubic-bezier(0.22,1,0.36,1) forwards;
  }

  /* ── Logo fade+scale ── */
  @keyframes navLogoIn {
    from { opacity: 0; transform: scale(0.88); }
    to   { opacity: 1; transform: scale(1); }
  }
  .nav-logo {
    animation: navLogoIn 0.6s cubic-bezier(0.22,1,0.36,1) 0.2s both;
  }

  /* ── Nav items stagger fade up ── */
  @keyframes navItemIn {
    from { opacity: 0; transform: translateY(-8px); }
    to   { opacity: 1; transform: translateY(0); }
  }
  .nav-item {
    animation: navItemIn 0.5s cubic-bezier(0.22,1,0.36,1) calc(0.15s + var(--ni, 0) * 0.07s) both;
  }

  /* ── Active underline on hover ── */
  .nav-link {
    position: relative;
    padding-bottom: 2px;
  }
  .nav-link::after {
    content: '';
    position: absolute;
    bottom: -2px; left: 0;
    width: 0; height: 2px;
    background: #0072BC;
    border-radius: 99px;
    transition: width 0.25s cubic-bezier(0.22,1,0.36,1);
  }
  .nav-link:hover::after { width: 100%; }

  /* ── Dropdown item slide in ── */
  .dropdown-item {
    position: relative;
    padding-left: 1rem;
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

  /* ── Search expand on focus ── */
  .nav-search input:focus { width: 13rem; }
</style>

<script>
(function () {
  var pages = [
    { title:'Beranda', url:'{{ route("home") }}', tags:['beranda','home','utama','depan'] },
    { title:'FAQ', url:'{{ route("faq") }}', tags:['faq','pertanyaan','tanya','jawab','frequently','asked'] },
    { title:'Ketentuan Lomba', url:'{{ route("lomba.ketentuan") }}', tags:['ketentuan','lomba','syarat','aturan','persyaratan','peraturan'] },
    { title:'Tahapan Kegiatan Lomba', url:'{{ route("lomba.tahapan") }}', tags:['tahapan','kegiatan','lomba','jadwal','alur','proses','pendaftaran','pelatihan','proposal','inkubasi','penjurian','hadiah'] },
    { title:'Pengumuman 3 Besar', url:'{{ route("pengumuman.3besar") }}', tags:['pengumuman','3 besar','tiga besar','pemenang','juara','winner'] },
    { title:'Lolos Seleksi Proposal', url:'{{ route("pengumuman.lolos") }}', tags:['lolos','seleksi','proposal','pengumuman','finalis'] },
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

  ['navSearchForm','mobileSearchForm'].forEach(function(formId) {
    var form = document.getElementById(formId);
    if (!form) return;
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      var input = form.querySelector('input[name="q"]');
      if (input) doSearch(input.value);
    });
  });
})();
</script>