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
  <div class="absolute inset-0 bg-black/55"></div>

  <div class="relative min-h-[480px] md:min-h-[540px] lg:min-h-[580px]">
    <div class="absolute left-10 md:left-16 lg:left-24 top-1/2 -translate-y-1/2 text-white max-w-2xl">

      <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-wide drop-shadow">
        <span class="block leading-tight">{!! e($setting->hero_title ? explode("\n", $setting->hero_title)[0] : "HACKATHON RUMAH") !!}</span>
        <span class="block leading-tight mt-4">{!! e($setting->hero_title ? (explode("\n", $setting->hero_title)[1] ?? '') : "PENDIDIKAN 2026") !!}</span>
      </h1>

      <div class="mt-5">
        <p class="text-lg md:text-xl lg:text-2xl font-extrabold leading-snug drop-shadow">
          {{ $setting->hero_subtitle ?? 'Wujudkan Indonesia Cerdas' }}
        </p>
        <p class="mt-1 text-sm md:text-base lg:text-lg font-semibold leading-snug opacity-90 drop-shadow">
          "{{ $setting->hero_tagline ?? 'Gim Edukasi untuk Pembelajaran Seru' }}"
        </p>
      </div>

      <a href="{{ $setting->primary_button_url ?? route('registrasi') }}"
         class="inline-flex items-center justify-center mt-5 px-5 py-2
                text-white text-sm font-bold
                rounded-full shadow-sm hover:shadow-md
                transition-all duration-200"
         style="background-color:#0072BC;"
         onmouseover="this.style.backgroundColor='#005fa3'"
         onmouseout="this.style.backgroundColor='#0072BC'">
        {{ $setting->primary_button_text ?? 'Registrasi' }}
      </a>

    </div>
  </div>
</section>


<!-- DESKRIPSI -->
<section class="{{ $bleed ?? '' }} py-12 md:py-16">
  <div class="{{ $inner ?? '' }}">
    <div class="grid md:grid-cols-[1fr_0.75fr] gap-10 lg:gap-16 items-center">

    <!-- TEXT -->
    <div>

      <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight text-slate-900 leading-tight">
        HACKATHON RUMAH PENDIDIKAN 2026
      </h2>
      <h3 class="mt-1 text-xl md:text-2xl font-bold text-[#0072BC] leading-tight">
        Wujudkan Indonesia Cerdas
      </h3>

      <p class="mt-5 text-sm font-semibold text-slate-900">
        "Gim Edukasi untuk Pembelajaran Seru"
      </p>

      <p class="mt-5 mb-2 text-sm text-slate-600 leading-relaxed text-justify">
        Hackathon Rumah Pendidikan 2026 menjadi wadah bagi berbagai kalangan untuk
        menciptakan ide, solusi, dan prototipe teknologi pendidikan yang berdampak nyata
        terhadap pengembangan Rumah Pendidikan. Bukan sekadar ajang kompetisi teknologi,
        tetapi juga ruang pembelajaran kolaboratif yang mendorong peserta untuk merancang,
        mengembangkan, dan mendemonstrasikan solusi pembelajaran berbasis teknologi.
      </p>

      <p class="mt-4 mb-2 text-sm text-slate-600 leading-relaxed text-justify">
        Wujudkan ide pembelajaran interaktif lewat game buatan sendiri — seru,
        menyenangkan, dan bisa dipakai di kelas seluruh Indonesia.
      </p>

      <p class="mt-6 text-base font-extrabold text-slate-900">
        Bapak Ibu Guru, saatnya berkreasi!
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
    <div class="grid grid-cols-2 gap-2 max-w-sm mx-auto md:max-w-none">
      <div class="overflow-hidden rounded-xl shadow-sm">
        <img src="{{ $homeImg1 }}" alt="Kegiatan 1"
          class="w-full object-cover aspect-[4/3] hover:scale-[1.03] transition duration-300" loading="lazy"/>
      </div>
      <div class="overflow-hidden rounded-xl shadow-sm">
        <img src="{{ $homeImg2 }}" alt="Kegiatan 2"
          class="w-full object-cover aspect-[4/3] hover:scale-[1.03] transition duration-300" loading="lazy"/>
      </div>
      <div class="col-span-2 overflow-hidden rounded-xl shadow-sm">
        <img src="{{ $homeImg3 }}" alt="Kegiatan 3"
          class="w-full object-cover aspect-[16/6] hover:scale-[1.03] transition duration-300" loading="lazy"/>
      </div>
    </div>

    </div>{{-- end grid --}}
  </div>{{-- end inner --}}
</section>

<!-- INFORMASI PENTING -->
<section class="{{ $bleed }} py-24 bg-gradient-to-b from-sky-50 to-sky-100/40">
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
                  <div class="w-14 h-14 rounded-2xl bg-sky-50 flex items-center justify-center border border-sky-100">
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
                  <div class="w-14 h-14 rounded-2xl bg-sky-50 flex items-center justify-center border border-sky-100">
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

  

  </div>
</section>


<!-- TIMELINE -->
<section class="py-20 md:py-24 px-4">
<style>
  .tl-line {
    background: linear-gradient(to bottom, transparent, #c8c27e 8%, #c8c27e 92%, transparent);
    width: 2px;
  }
  .tl-dot {
    width: 18px;
    height: 18px;
    border-radius: 50%;
    background-color: #FFF9BF;
    border: 2px solid #c8c27e;
    box-shadow: 0 0 0 4px rgba(255, 249, 191, 0.4);
    transition: box-shadow 0.3s ease, transform 0.3s ease;
  }
  .tl-group:hover .tl-dot {
    box-shadow: 0 0 0 6px rgba(255, 249, 191, 0.6);
    transform: scale(1.2);
  }
  .tl-card {
    background-color: #FFF9BF;
    border: 1.5px solid #ddd880;
    border-radius: 14px;
    padding: 16px 24px;
    box-shadow: 2px 3px 12px rgba(180, 174, 60, 0.15);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    isolation: isolate;
  }
  .tl-group:hover .tl-card {
    transform: translateY(-3px);
    box-shadow: 2px 8px 24px rgba(180, 174, 60, 0.22);
  }
  @keyframes tl-fadeUp {
    from { opacity: 0; transform: translateY(12px); }
    to   { opacity: 1; transform: translateY(0); }
  }
  .tl-item {
    animation: tl-fadeUp 0.5s ease both;
  }
</style>

  <div class="text-center mb-14">
    <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900">
      Timeline Kegiatan
    </h2>
    <p class="mt-2 text-sm text-slate-500">
      Jadwal dapat berubah sesuai ketentuan panitia.
    </p>
  </div>

  <div class="max-w-3xl mx-auto">
    @forelse(($timeline ?? collect()) as $i => $item)
      <div class="tl-group tl-item flex gap-6 items-stretch"
           style="animation-delay: {{ $i * 0.06 }}s">

        <div class="w-28 flex-shrink-0 flex items-center justify-end py-3">
          <span class="text-right text-sm font-extrabold leading-snug whitespace-pre-line" style="color:#1c1917;">
            {{ $item->date_label }}
          </span>
        </div>

        <div class="relative flex flex-col items-center flex-shrink-0" style="width:28px;">
          <div class="tl-line flex-1"></div>
          <div class="tl-dot flex-shrink-0 my-1 z-10"></div>
          <div class="tl-line flex-1"></div>
        </div>

        <div class="flex-1 py-2">
          <div class="tl-card">
            <div class="text-base font-bold text-slate-900 leading-snug">
              {{ $item->title }}
            </div>
            @if(!empty($item->description))
              <div class="mt-1 text-sm font-medium leading-relaxed text-slate-700">
                {{ $item->description }}
              </div>
            @endif
          </div>
        </div>

      </div>
    @empty
      <div class="text-center text-slate-500">
        Belum ada data timeline.
      </div>
    @endforelse
  </div>
</section>

<!-- TOOLS (BALANCED LOGO SIZE) -->
<section class="{{ $bleed }} py-20 md:py-24 bg-white-100">
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
                bg-sky-50 border border-sky-100
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
                 bg-sky-50 border border-sky-100
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
<section class="{{ $bleed }} py-14 md:py-16 bg-sky-50">
  <div class="{{ $inner }}">
    <div class="grid md:grid-cols-2 gap-10 items-start">

      <!-- LEFT: FAQ -->
      <div>
        <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight text-slate-900">
          Pertanyaan yang Sering Diajukan (FAQ).
        </h2>
        <p class="mt-2 text-slate-600 text-sm md:text-base">
          Beberapa pertanyaan yang paling sering ditanyakan peserta.
        </p>

        @php
          // ambil FAQ dari database (dikirim dari HomeController)
          $faqItems = $faqs ?? collect();

          // fallback kalau database kosong
          if ($faqItems->count() === 0) {
            $faqItems = collect([
              [
                'question' => 'Bagaimana cara mendaftarnya?',
                'answer' => 'Kunjungi Superaplikasi Rumah Pendidikan, kemudian klik banner Hackathon Rumah Pendidikan 2026. Pilih “DAFTAR SEKARANG” dan isi formulir pendaftaran.'
              ],
              [
                'question' => 'Apakah disediakan format khusus untuk proposal?',
                'answer' => 'Format proposal akan diinformasikan dan disediakan oleh panitia saat memasuki masa unggah proposal.'
              ],
              [
                'question' => 'Apakah dalam satu tim wajib terdiri dari tiga orang?',
                'answer' => 'Satu tim terdiri dari 3 guru dan/atau tenaga kependidikan dari sekolah yang sama.'
              ],
              [
                'question' => 'Bagaimana jika peserta tidak memiliki akun belajar.id karena berasal dari madrasah?',
                'answer' => 'Pendaftar dari Madrasah dapat menggunakan akun @madrasah.kemenag.go.id atau akun Gmail.'
              ],
              [
                'question' => 'Apakah guru SLB diperbolehkan mengikuti kegiatan ini?',
                'answer' => 'Diperbolehkan.'
              ],
            ]);
          }
        @endphp

        <div class="mt-6 space-y-3">
          @foreach ($faqItems as $item)

            @php
              // support array fallback & object dari database
              $question = is_array($item) ? $item['question'] : $item->question;
              $answer   = is_array($item) ? $item['answer'] : $item->answer;
            @endphp

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
                  {{ $question }}
                </span>

                <!-- tombol + / - -->
                <span
                  class="shrink-0 grid place-items-center
                         w-7 h-7 rounded-lg
                         border border-slate-200 bg-slate-50
                         transition
                         group-open:border-slate-900"
                  aria-hidden="true"
                >
                  <!-- plus -->
                  <svg class="w-4 h-4 text-slate-900 group-open:hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 5v14M5 12h14" stroke-linecap="round"/>
                  </svg>

                  <!-- minus -->
                  <svg class="w-4 h-4 text-slate-900 hidden group-open:block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14" stroke-linecap="round"/>
                  </svg>
                </span>

              </summary>

              <!-- jawaban -->
              <div class="px-4 pb-4 text-sm text-slate-600 leading-relaxed">
                <div class="pt-2 border-t border-slate-100 animate-[faqDown_200ms_ease-out]">
                  {{ $answer }}
                </div>
              </div>
            </details>

          @endforeach

          <!-- Button Pertanyaan Lainnya -->
          <a href="/faq"
             class="inline-flex mt-3 items-center justify-center
                    rounded-full
                    px-5 py-2
                    text-sm font-extrabold text-slate-900
                    transition"
             style="background-color:#FFF9BF;"
             onmouseover="this.style.backgroundColor='#f5ef9a'"
             onmouseout="this.style.backgroundColor='#FFF9BF'">
            Pertanyaan lainnya
          </a>
        </div>
      </div>

      <!-- RIGHT: PANDUAN + KONTAK -->
      <div class="space-y-5 md:pl-6 md:mt-32">

        <!-- Butuh Panduan -->
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 md:p-7">
          <h3 class="text-lg md:text-xl font-extrabold text-slate-900">
            Butuh Pedoman?
          </h3>
          <p class="mt-2 text-sm md:text-base text-slate-700 leading-relaxed">
            Akses pedoman resmi dan informasi penting lainnya di sini.
          </p>

          <a href="https://drive.google.com/file/d/1LuQ8j2MEuPMePAEccTWSw-7OQaS5GAyS/view"
   target="_blank"
   rel="noopener noreferrer"
   class="inline-flex mt-4 items-center justify-center
          rounded-full
          px-5 py-2
          text-sm font-extrabold text-slate-900
          transition"
   style="background-color:#FFF9BF;"
   onmouseover="this.style.backgroundColor='#f5ef9a'"
   onmouseout="this.style.backgroundColor='#FFF9BF'">
  Lihat Pedoman
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
    details[open] summary span[aria-hidden] {
      background-color: #FFF9BF;
      border-color: #c8c27e;
    }
  </style>
</section>


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