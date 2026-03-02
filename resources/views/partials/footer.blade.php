<footer class="mt-16 border-t border-slate-300 bg-[#EAF6FF]">
  <div class="max-w-7xl mx-auto px-8 lg:px-16 py-12">

    <div class="grid md:grid-cols-[0.7fr_1.3fr] gap-20 items-start">

      <!-- ================= LEFT (LOGO) ================= -->
      <div>
        <img
          src="{{ asset('image/header/kemendikdasmen.png') }}"
          alt="Kemendikdasmen"
          class="h-12 sm:h-14 w-auto object-contain"
        />

       
      </div>

      <!-- ================= RIGHT ================= -->
      <div class="grid md:grid-cols-[1.6fr_0.8fr] gap-x-20">

        <!-- ===== KONTAK (LEBIH LEBAR) ===== -->
        <div>
          <h3 class="text-base font-semibold text-slate-900 mb-6">
            Kontak Kami
          </h3>

          <div class="space-y-5 text-sm text-slate-800">

            <!-- Lokasi -->
            <div class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg"
                   class="h-5 w-5 mt-1 shrink-0 text-slate-900"
                   viewBox="0 0 24 24" fill="none"
                   stroke="currentColor" stroke-width="2.2"
                   stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 21s-6-5.33-6-10a6 6 0 1 1 12 0c0 4.67-6 10-6 10z" />
                <circle cx="12" cy="11" r="2.5" />
              </svg>

              <p class="leading-relaxed">
                Kompleks Kementerian Pendidikan dan Kebudayaan, Senayan, Jakarta Pusat, 10270.
              </p>
            </div>

            <!-- Email -->
            <div class="flex items-center gap-3">
              <svg xmlns="http://www.w3.org/2000/svg"
                   class="h-5 w-5 shrink-0 text-slate-900"
                   viewBox="0 0 24 24" fill="none"
                   stroke="currentColor" stroke-width="2.2"
                   stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 6h16v12H4z" />
                <path d="M4 7l8 6 8-6" />
              </svg>

              <a href="mailto:hackathon.rumdik@kemendikdasmen.go.id"
                 class="hover:underline">
                hackathon.rumdik@kemendikdasmen.go.id
              </a>
            </div>

          </div>
        </div>

        <!-- ===== SOSIAL (LEBIH SEMPIT & KE KANAN) ===== -->
        <div>
          <h3 class="text-base font-semibold text-slate-900 mb-6">
            Sosial Media
          </h3>

          <div class="space-y-5 text-sm text-slate-800">

            <a href="#" class="flex items-center gap-3 hover:underline">
  <svg xmlns="http://www.w3.org/2000/svg"
       class="h-5 w-5 shrink-0 text-slate-900"
       viewBox="0 0 24 24" fill="currentColor">
    <path d="M19.6 3.2c1.8.4 3.2 1.8 3.6 3.6.8 3.2.8 6.2.8 6.2s0 3-.8 6.2c-.4 1.8-1.8 3.2-3.6 3.6-3.2.8-7.6.8-7.6.8s-4.4 0-7.6-.8c-1.8-.4-3.2-1.8-3.6-3.6C0 16 0 13 0 13s0-3 .8-6.2c.4-1.8 1.8-3.2 3.6-3.6C7.6 2.4 12 2.4 12 2.4s4.4 0 7.6.8zM9.6 15.5l6-3.5-6-3.5v7z"/>
  </svg>

  <span class="whitespace-nowrap">
    Hackathon Rumah Pendidikan
  </span>
</a>

            <a href="#" class="flex items-center gap-3 hover:underline">
              <svg xmlns="http://www.w3.org/2000/svg"
                   class="h-5 w-5 shrink-0 text-slate-900"
                   viewBox="0 0 24 24" fill="none"
                   stroke="currentColor" stroke-width="2.2"
                   stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="3" width="18" height="18" rx="5" />
                <circle cx="12" cy="12" r="4" />
                <circle cx="17" cy="7" r="1" />
              </svg>
              Kemendikdasmen
            </a>

            <a href="#" class="flex items-center gap-3 hover:underline">
              <svg xmlns="http://www.w3.org/2000/svg"
                   class="h-5 w-5 shrink-0 text-slate-900"
                   viewBox="0 0 24 24" fill="currentColor">
                <path d="M16 2h3a4 4 0 0 0 4 4v3a7 7 0 0 1-4-1.3V15a5 5 0 1 1-5-5c.3 0 .6 0 .9.1v3a2 2 0 1 0 2 2V2z"/>
              </svg>
              Rumah Pendidikan
            </a>

          </div>
        </div>

      </div>
    </div>

    <!-- Bottom -->
    <div class="mt-12 pt-6 border-t border-slate-400/40">
      <p class="text-center text-xs text-slate-800 tracking-wide">
        © 2026 Hackathon Rumah Pendidikan |
        Pusat Data dan Teknologi Informasi Kementerian Pendidikan Dasar dan Menengah
      </p>
    </div>

  </div>
</footer>