@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

@php
  // Full-bleed (keluar dari main container) untuk background section
  $bleed = 'w-screen relative left-1/2 right-1/2 -ml-[50vw] -mr-[50vw]';
  // Inner container untuk section full-bleed (biar isi tetap standar)
  $inner = 'mx-auto w-full max-w-6xl px-4 md:px-6';
@endphp

<!-- HERO (FULL BLEED, FEEL PROTOTYPE) -->
<section
  class="{{ $bleed }} relative overflow-hidden"
  style="
    background-image: url('{{ asset('image/header/sekolah.jpg') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  "
>
  <div class="abs<section id="hero"> ... </section>
  <div class="relative min-h-[520px] md:min-h-[580px] lg:min-h-[640px]">
    <div class="absolute left-6 md:left-10 lg:left-14 top-1/2 -translate-y-1/2 text-white max-w-2xl">
      <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold leading-tight drop-shadow">
        HACKATHON RUMAH<br>
        PENDIDIKAN 2026
      </h1>

      <p class="mt-3 text-lg md:text-xl lg:text-2xl font-extrabold leading-tight drop-shadow">
        Wujudkan Indonesia Cerdas
      </p>

      <p class="mt-1 text-sm md:text-base lg:text-lg font-semibold leading-snug opacity-95 drop-shadow">
        “<span class="font-extrabold">Gim Edukasi untuk Pembelajaran Seru</span>”
      </p>

      
    </div>
  </div>
</section>


<!-- DESKRIPSI -->
<section class="py-20 md:py-24">
  <div class="grid md:grid-cols-2 gap-12 lg:gap-16 items-center">

    <!-- TEXT -->
    <div>

      <h2 class="text-2xl md:text-2xl font-extrabold tracking-tight text-slate-900">
        HACKATHON RUMAH PENDIDIKAN 2026
      </h2>

      <h3 class="mt-2 text-xl md:text-2xl font-bold text-slate-900">
         Wujudkan Indonesia Cerdas
      </h3>

      <p class="mt-6 text-lg font-bold text-slate-900">
  “Gim Edukasi untuk Pembelajaran Seru”
</p>

      <p class="mt-3 text-slate-900 leading-relaxed">
        Hackathon Rumah Pendidikan 2025 ini menjadi wadah bagi berbagai kalangan
        untuk menciptakan ide, solusi, dan prototipe teknologi pendidikan yang
        berdampak nyata terhadap pengembangan Rumah Pendidikan.
      </p>

      <p class="mt-3 text-slate-900 leading-relaxed">
        Hackathon Rumah Pendidikan 2025 tidak sekadar ajang kompetisi teknologi,
        tetapi juga ruang pembelajaran kolaboratif yang mendorong peserta untuk
        merancang, mengembangkan, dan mendemonstrasikan solusi pembelajaran berbasis teknologi.
      </p>

      <p class="mt-3 text-lg font-bold text-slate-900 leading-relaxed">
  Bapak Ibu Guru, saatnya berkreasi !
</p>

      <p class="mt-3 text-slate-900 leading-relaxed">
        Wujudkan ide pembelajaran interaktif lewat game buatan sendiri, seru,
        menyenangkan, dan bisa dipakai di kelas seluruh Indonesia.
      </p>

    </div>

    <!-- IMAGES -->
    <div class="grid grid-cols-2 gap-5">

      <!-- Gambar 1 -->
      <div class="overflow-hidden rounded-2xl border border-slate-200 shadow-sm">
        <img
          src="{{ asset('image/header/gambar 1.png') }}"
          alt="Kegiatan 1"
          class="w-full h-full object-cover aspect-[4/3] hover:scale-[1.03] transition duration-300"
          loading="lazy"
        />
      </div>

      <!-- Gambar 2 -->
      <div class="overflow-hidden rounded-2xl border border-slate-200 shadow-sm">
        <img
          src="{{ asset('image/header/gambar 2.jpg') }}"
          alt="Kegiatan 2"
          class="w-full h-full object-cover aspect-[4/3] hover:scale-[1.03] transition duration-300"
          loading="lazy"
        />
      </div>

      <!-- Gambar 3 (Full Width) -->
      <div class="col-span-2 overflow-hidden rounded-2xl border border-slate-200 shadow-sm">
        <img
          src="{{ asset('image/header/gambar 3.png') }}"
          alt="Kegiatan 3"
          class="w-full h-full object-cover aspect-[16/7] hover:scale-[1.03] transition duration-300"
          loading="lazy"
        />
      </div>
    </div>
  </div>
</section>

<!-- INFORMASI PENTING -->
<section class="{{ $bleed }} py-24 bg-gradient-to-b from-blue-50 to-blue-100/40">
  <div class="{{ $inner }}">

    <!-- Heading -->
    <div class="text-center">
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

    <!-- Content (dibatasi biar center & nggak ketarik ke kanan) -->
    <div class="mt-16 max-w-6xl mx-auto">
      <div class="grid md:grid-cols-2 gap-14 items-start">

        <!-- Ilustrasi kiri -->
        <div class="flex justify-center md:justify-center">
          <img
            src="{{ asset('image/header/pengumuman.png') }}"
            alt="Ilustrasi Informasi Penting"
            class="w-full max-w-xs md:max-w-sm object-contain
                   md:-mt-16
                   drop-shadow-[0_20px_40px_rgba(0,0,0,0.08)]"
            loading="lazy"
          />
        </div>

        <!-- Card Informasi -->
        <div class="flex justify-center">
          <div class="w-full max-w-xl bg-white rounded-3xl p-10 border border-slate-200
                      shadow-[0_10px_30px_rgba(0,0,0,0.06)]
                      transition duration-300
                      hover:shadow-[0_20px_50px_rgba(0,0,0,0.08)]">

            <div class="space-y-10">

              <!-- Item 1 -->
              <div class="flex gap-5">
                <div class="shrink-0">
                  <div class="w-14 h-14 rounded-2xl bg-blue-50 flex items-center justify-center border border-blue-100">
                    <!-- Email tertutup -->
                    <svg class="w-6 h-6 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M4 6h16v12H4z"/>
                      <path d="M4 8l8 5 8-5"/>
                    </svg>
                  </div>
                </div>

                <p class="text-slate-900 leading-relaxed font-medium">
                  Informasi lanjutan terkait pelatihan dan tahapan berikutnya telah dikirimkan melalui email kepada
                  masing-masing Ketua Tim yang lolos.
                </p>
              </div>

              <div class="h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>

              <!-- Item 2 -->
              <div class="flex gap-5">
                <div class="shrink-0">
                  <div class="w-14 h-14 rounded-2xl bg-blue-50 flex items-center justify-center border border-blue-100">
                    <!-- Email terbuka -->
                    <svg class="w-6 h-6 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M3 10l9 5 9-5"/>
                      <path d="M21 10v10H3V10"/>
                      <path d="M3 10l9-6 9 6"/>
                    </svg>
                  </div>
                </div>

                <p class="text-slate-900 leading-relaxed font-medium">
                  Mohon segera melakukan pengecekan email (termasuk folder spam/promosi)
                  agar tidak ada informasi terlewat.
                </p>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Footer text -->
    <p class="mt-10 text-center text-lg md:text-xl font-extrabold text-slate-900 tracking-tight">
      Selamat kepada seluruh tim terpilih dan tetap semangat untuk tahapan selanjutnya!
    </p>

  </div>
</section>

<!-- TIMELINE (FIX: DOT DI DALAM GARIS + ANIMASI) -->
<section class="py-20 md:py-24">
  <!-- Heading -->
  <div class="text-center">
    <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900">
      Timeline Kegiatan
    </h2>
    <p class="mt-3 text-slate-800">
      Jadwal dapat berubah sesuai ketentuan panitia.
    </p>
  </div>

  @php
    $timeline = [
      ['date' => "18\nNov, 2025",         'title' => 'Kickoff Meeting'],
      ['date' => "18 - 25\nNov, 2025",    'title' => 'Pendaftaran Peserta'],
      ['date' => "27 - 28\nNov, 2025",    'title' => 'Pelatihan Peserta dengan Tools (daring)', 'desc' => 'Cek email (yang terdaftar) untuk mendapatkan tautan zoom'],
      ['date' => "28 Nov -\n3 Des, 2025", 'title' => 'Unggah Proposal Ide Karya'],
      ['date' => "5 - 6\nDes, 2025",      'title' => 'Penilaian Proposal Ide Karya'],
      ['date' => "7\nDes, 2025",          'title' => 'Pengumuman Peserta Lolos Seleksi Proposal'],
      ['date' => "9\nDes, 2025",          'title' => 'Inkubasi Peserta (daring)'],
      ['date' => "10\nDes, 2025",         'title' => 'Unggah Karya Peserta'],
      ['date' => "12 - 13\nDes, 2025",    'title' => 'Presentasi Karya', 'desc' => 'Penilaian dan Penentuan Pemenang'],
    ];
  @endphp

  <div class="mt-14 max-w-5xl mx-auto">
    <div class="space-y-6">

      @foreach ($timeline as $i => $item)
        <div class="group grid grid-cols-[92px_40px_1fr] md:grid-cols-[130px_44px_1fr] gap-4 md:gap-6 items-stretch">

          <!-- DATE -->
          <div class="text-right flex items-center justify-end">
            <div class="text-xs md:text-sm font-extrabold text-slate-900 leading-tight whitespace-pre-line">
              {{ $item['date'] }}
            </div>
          </div>

          <!-- DOT + GARIS (SATU KOLOM YANG SAMA => PASTI SEGARIS) -->
          <div class="relative flex items-stretch justify-center">
            <!-- garis hitam -->
            <span class="absolute top-0 bottom-0 left-1/2 -translate-x-1/2 w-[6px] rounded-full bg-slate-900"></span>

            <!-- dot kuning (tengah tiap kotak) -->
            <div class="relative z-10 flex items-center justify-center w-full">
              <!-- glow/ping halus saat hover -->
              <span class="absolute w-6 h-6 rounded-full bg-yellow-300/30 opacity-0 group-hover:opacity-100 group-hover:animate-ping"></span>

              <!-- dot utama -->
              <span class="w-3.5 h-3.5 rounded-full bg-yellow-300 border-2 border-slate-900 shadow-sm"></span>
            </div>
          </div>

          <!-- CARD -->
          <div>
            <div class="rounded-2xl bg-yellow-300/95 border border-yellow-400/60 px-6 py-4
                        shadow-[0_10px_22px_rgba(0,0,0,0.06)]
                        transition duration-200
                        group-hover:-translate-y-[2px]
                        group-hover:shadow-[0_16px_32px_rgba(0,0,0,0.10)]">
              <div class="font-extrabold text-slate-900">
                {{ $item['title'] }}
              </div>

              @if(!empty($item['desc']))
                <div class="mt-1 text-sm font-semibold text-slate-900/80">
                  {{ $item['desc'] }}
                </div>
              @endif
            </div>
          </div>

        </div>
      @endforeach

    </div>
  </div>
</section>


<!-- TOOLS (BALANCED LOGO SIZE) -->
<section class="{{ $bleed }} py-20 md:py-24 bg-slate-50">
  <div class="{{ $inner }} text-center">

    <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight text-slate-900">
      Setiap Tim akan membuat 2 Gim Edukasi
    </h2>
    <p class="mt-3 text-slate-00">
      Tools yang wajib digunakan:
    </p>

    <div class="mt-14 flex justify-center gap-12 md:gap-16 flex-wrap">

      <!-- Google for Education -->
      <a
        href="https://edu.google.com/"
        target="_blank"
        rel="noopener noreferrer"
        class="group flex flex-col items-center"
      >
        <div
          class="w-40 h-40 md:w-48 md:h-48
                 bg-blue-50 border border-blue-100
                 rounded-full
                 shadow-sm flex items-center justify-center
                 transition duration-300
                 group-hover:-translate-y-1
                 group-hover:shadow-md"
        >
          <img
            src="{{ asset('image/header/google edu.png') }}"
            alt="Google for Education"
            class="w-32 md:w-36 object-contain"
            loading="lazy"
          />
        </div>

        <p class="mt-5 font-semibold text-slate-900">
          Google for Education
        </p>
        <p class="mt-1 text-sm text-slate-500 group-hover:text-slate-700 transition">
          Kunjungi halaman
        </p>
      </a>

      <!-- Canva -->
      <a
        href="https://www.canva.com/"
        target="_blank"
        rel="noopener noreferrer"
        class="group flex flex-col items-center"
      >
        <div
          class="w-40 h-40 md:w-48 md:h-48
                 bg-blue-50 border border-blue-100
                 rounded-full
                 shadow-sm flex items-center justify-center
                 transition duration-300
                 group-hover:-translate-y-1
                 group-hover:shadow-md"
        >
          <img
            src="{{ asset('image/header/canva.png') }}"
            alt="Canva"
            class="w-28 md:w-32 object-contain"
            loading="lazy"
          />
        </div>

        <p class="mt-5 font-semibold text-slate-900">
          Canva
        </p>
        <p class="mt-1 text-sm text-slate-500 group-hover:text-slate-700 transition">
          Kunjungi halaman
        </p>
      </a>

    </div>
  </div>
</section>


<!-- FAQ + PANDUAN (FULL BLEED BG) -->
<section class="{{ $bleed }} py-16 md:py-20 bg-blue-50">
  <div class="{{ $inner }}">
    <div class="grid md:grid-cols-2 gap-10 items-start">

      <!-- LEFT: FAQ -->
      <div>
        <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight text-slate-900">
          Pertanyaan yang Sering Diajukan
          <span class="text-yellow-400">(FAQ)</span>.
        </h2>
        <p class="mt-2 text-slate-600 text-sm md:text-base">
          Beberapa pertanyaan yang paling sering ditanyakan peserta.
        </p>

        @php
          $faqs = [
            [
              'q' => 'Bagaimana cara mendaftarkan diri pada kegiatan ini?',
              'a' => 'Pendaftaran dilakukan melalui halaman resmi kegiatan. Pastikan Anda mengisi data dengan benar dan mengikuti instruksi pendaftaran.'
            ],
            [
              'q' => 'Apakah guru SLB diperbolehkan mengikuti Hackathon?',
              'a' => 'Diperbolehkan.'
            ],
            [
              'q' => 'Apakah terdapat format proposal ide karya yang harus digunakan?',
              'a' => 'Ya, format proposal tersedia pada menu Panduan. Silakan unduh dan ikuti struktur yang ditetapkan.'
            ],
            [
              'q' => 'Berapa jumlah anggota dalam 1 tim?',
              'a' => 'Jumlah anggota mengikuti ketentuan yang tercantum dalam dokumen Panduan.'
            ],
            [
              'q' => 'Apakah setiap tim wajib membuat 2 gim edukasi?',
              'a' => 'Ya, setiap tim diwajibkan membuat 2 gim edukasi sesuai ketentuan.'
            ],
          ];
        @endphp

        <div class="mt-6 space-y-3">
          @foreach ($faqs as $item)
            <details
              class="group bg-white rounded-xl border border-slate-200
                     shadow-sm transition hover:border-slate-300"
            >
              <summary
                class="list-none cursor-pointer select-none
                       flex items-center justify-between gap-4
                       px-4 py-3
                       text-sm md:text-base font-semibold text-slate-900"
              >
                <span class="leading-snug">
                  {{ $item['q'] }}
                </span>

                <!-- tombol + / - -->
                <span
                  class="shrink-0 grid place-items-center
                         w-7 h-7 rounded-lg
                         border border-slate-200 bg-slate-50
                         transition
                         group-open:bg-slate-900 group-open:border-slate-900"
                  aria-hidden="true"
                >
                  <!-- plus -->
                  <svg class="w-4 h-4 text-slate-900 group-open:hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 5v14M5 12h14" stroke-linecap="round"/>
                  </svg>
                  <!-- minus -->
                  <svg class="w-4 h-4 text-white hidden group-open:block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14" stroke-linecap="round"/>
                  </svg>
                </span>
              </summary>

              <!-- jawaban -->
              <div class="px-4 pb-4 text-sm text-slate-600 leading-relaxed">
                <div class="pt-2 border-t border-slate-100 animate-[faqDown_200ms_ease-out]">
                  {{ $item['a'] }}
                </div>
              </div>
            </details>
          @endforeach

          <!-- Button Pertanyaan Lainnya -->
          <a href="#"
             class="inline-flex mt-3 items-center justify-center
                    rounded-full bg-yellow-300
                    px-5 py-2
                    text-sm font-extrabold text-slate-900
                    hover:bg-yellow-400 transition">
            Pertanyaan lainnya
          </a>
        </div>
      </div>

      <!-- RIGHT: PANDUAN + KONTAK (TURUNIN BIAR DI TENGAH, TETAP STABIL) -->
      <div class="space-y-5 md:pl-6 md:mt-32">
        {{-- kalau masih kurang turun, ganti md:mt-10 jadi md:mt-12 / md:mt-14 --}}

        <!-- Butuh Panduan -->
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 md:p-7">
          <h3 class="text-lg md:text-xl font-extrabold text-slate-900">
            Butuh Panduan?
          </h3>
          <p class="mt-2 text-sm md:text-base text-slate-600 leading-relaxed">
            Akses pedoman resmi dan informasi penting lainnya di sini.
          </p>

          <a href="#"
             class="inline-flex mt-4 items-center justify-center
                    rounded-full bg-yellow-300
                    px-5 py-2
                    text-sm font-extrabold text-slate-900
                    hover:bg-yellow-400 transition">
            Lihat Panduan
          </a>
        </div>

        <!-- Kontak Kami -->
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 md:p-7">
          <h3 class="text-base md:text-lg font-extrabold text-slate-900">
            Kontak Kami
          </h3>
          <p class="mt-2 text-sm text-slate-600">
            Surel :<br>
            <span class="font-semibold text-slate-900">
              hackathon.rumdik@kemendikdasmen.go.id
            </span>
          </p>
        </div>
      </div>

    </div>
  </div>

  <style>
    @keyframes faqDown {
      from { opacity: 0; transform: translateY(-4px); }
      to   { opacity: 1; transform: translateY(0); }
    }
  </style>
</section>


<!-- YOUTUBE (ALIGNED VERSION - RAPIH & SEJAJAR) -->
<section class="{{ $bleed }} py-20 md:py-24 bg-white">
  <div class="{{ $inner }}">

    <div class="grid lg:grid-cols-2 gap-14 items-start">

      <!-- LEFT: Image (TINGGI IKUT KANAN) -->
      <div class="h-full">
        <div class="h-full overflow-hidden rounded-2xl">
          <img
            src="{{ asset('image/header/sekolah.jpg') }}"
            alt="Kick-off Hackathon Rumah Pendidikan"
            class="w-full h-full object-cover"
            loading="lazy"
          />
        </div>
      </div>

      <!-- RIGHT: Title + Youtube -->
      <div class="flex flex-col">

        <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight text-slate-900 leading-tight">
          Simak Kick-off<br>
          Hackathon Rumah Pendidikan 2025<br>
          Wujudkan Indonesia Cerdas.
        </h2>

        <div class="mt-10 space-y-8 flex-1">

          <!-- Video 1 -->
          <div class="aspect-video rounded-2xl overflow-hidden shadow-sm">
            <iframe
              class="w-full h-full"
              src="https://www.youtube.com/embed/VIDEO_ID_1"
              title="Kick-off Hackathon Rumah Pendidikan - Video 1"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              allowfullscreen>
            </iframe>
          </div>

          <!-- Video 2 -->
          <div class="aspect-video rounded-2xl overflow-hidden shadow-sm">
            <iframe
              class="w-full h-full"
              src="https://www.youtube.com/embed/VIDEO_ID_2"
              title="Kick-off Hackathon Rumah Pendidikan - Video 2"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              allowfullscreen>
            </iframe>
          </div>

        </div>

      </div>

    </div>

  </div>
</section>

@endsection