<nav class="w-full bg-sky-100 border-b border-sky-200">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center justify-between h-16">

            <!-- LEFT : LOGO -->
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <img src="{{ asset('images/logo-kemendikdasmen.png') }}"
                     alt="Kemendikdasmen"
                     class="h-10 w-auto">

                <span class="text-2xl font-bold text-sky-800">
                    Kemendikdasmen
                </span>
            </a>

            <!-- CENTER : MENU -->
            <div class="hidden md:flex items-center gap-10 font-semibold text-black">

                <a href="{{ route('home') }}" class="hover:text-sky-700 transition">
                    Beranda
                </a>

                <!-- DROPDOWN LOMBA -->
                <div class="relative group">
                    <button class="hover:text-sky-700 transition flex items-center gap-1">
                        Lomba
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div class="absolute left-0 mt-3 w-52 bg-white shadow-lg rounded-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition">
                        <a href="{{ route('lomba.panduan') }}"
                           class="block px-4 py-3 text-sm hover:bg-gray-100 rounded-t-xl">
                            Panduan Lomba
                        </a>
                        <a href="{{ route('lomba.tahapan') }}"
                           class="block px-4 py-3 text-sm hover:bg-gray-100 rounded-b-xl">
                            Tahapan Kegiatan
                        </a>
                    </div>
                </div>

                <!-- DROPDOWN PENGUMUMAN -->
                <div class="relative group">
                    <button class="hover:text-sky-700 transition flex items-center gap-1">
                        Pengumuman
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div class="absolute left-0 mt-3 w-60 bg-white shadow-lg rounded-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition">
                        <a href="{{ route('pengumuman.3besar') }}"
                           class="block px-4 py-3 text-sm hover:bg-gray-100 rounded-t-xl">
                            Pengumuman 3 Besar
                        </a>
                        <a href="{{ route('pengumuman.lolos') }}"
                           class="block px-4 py-3 text-sm hover:bg-gray-100 rounded-b-xl">
                            Lolos Seleksi Proposal
                        </a>
                    </div>
                </div>

                <a href="{{ route('faq') }}" class="hover:text-sky-700 transition">
                    FAQ
                </a>
            </div>

            <!-- RIGHT : SEARCH -->
            <div class="hidden md:block">
                <form action="#" method="GET" class="relative">
                    <input
                        type="text"
                        name="q"
                        class="w-64 h-10 rounded-full border-2 border-gray-400 bg-white pl-6 pr-12 focus:outline-none focus:ring-2 focus:ring-sky-300 transition"
                    />
                    <button type="submit"
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-black">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="2">
                            <circle cx="11" cy="11" r="8" />
                            <line x1="21" y1="21" x2="16.65" y2="16.65" />
                        </svg>
                    </button>
                </form>
            </div>

        </div>
    </div>
</nav>