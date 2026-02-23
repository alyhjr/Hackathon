@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

<!-- HERO SECTION -->
<section class="relative">
  <div class="h-[420px] bg-gray-300"></div>

  <div class="absolute inset-0 bg-black/50"></div>

  <div class="absolute inset-0 flex items-center">
    <div class="max-w-6xl mx-auto px-4 text-white">
      <h1 class="text-4xl md:text-5xl font-extrabold leading-tight">
        HACKATHON RUMAH <br> PENDIDIKAN 2025
      </h1>

      <p class="mt-4 text-lg">
        Wujudkan Indonesia Cerdas <br>
        “Gim Edukasi untuk Pembelajaran Seru”
      </p>

      <button class="mt-6 bg-white text-black px-6 py-2 rounded-full font-semibold">
        Info Selengkapnya
      </button>
    </div>
  </div>


</section>

<!-- DESKRIPSI SECTION -->
<section class="py-16 bg-white">
  <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">

    <!-- Text -->
    <div>
      <h2 class="text-2xl font-extrabold">
        HACKATHON RUMAH PENDIDIKAN 2025
      </h2>

      <p class="mt-4 text-gray-600 leading-relaxed">
        Hackathon Rumah Pendidikan 2025 ini menjadi wadah bagi berbagai
        konten guru untuk menunjukkan ide, solusi, dan potensi teknologi
        pendidikan yang berdampak nyata terhadap pengembangan Rumah Pendidikan.
      </p>

      <p class="mt-4 text-gray-600 leading-relaxed">
        Bapak Ibu Guru, saatnya berkreasi!
      </p>
    </div>

    <!-- Images -->
    <div class="grid grid-cols-2 gap-4">
      <div class="bg-gray-200 h-40 rounded-lg"></div>
      <div class="bg-gray-200 h-40 rounded-lg"></div>
      <div class="bg-gray-200 h-40 rounded-lg col-span-2"></div>
    </div>

  </div>
</section>

<!-- INFORMASI PENTING -->
<section class="py-20 bg-blue-50">
  <div class="max-w-6xl mx-auto px-4 text-center">

    <h2 class="text-3xl font-extrabold mb-12">
      Informasi Penting ❗
    </h2>

    <div class="grid md:grid-cols-2 gap-8 items-center">

      <!-- Ilustrasi -->
      <div class="bg-blue-100 h-64 rounded-xl flex items-center justify-center text-blue-600 font-semibold">
        Ilustrasi
      </div>

      <!-- Box Info -->
      <div class="bg-white p-8 rounded-xl shadow text-left space-y-6">

        <div>
          <h3 class="font-bold">📩 Informasi Lanjutan</h3>
          <p class="text-gray-600 text-sm mt-2">
            Informasi lanjutan terkait pelatihan dan tahapan berikutnya
            akan dikirimkan melalui email kepada masing-masing Ketua Tim.
          </p>
        </div>

        <div>
          <h3 class="font-bold">📬 Cek Email</h3>
          <p class="text-gray-600 text-sm mt-2">
            Mohon segera melakukan pengecekan email (termasuk folder spam/promosi)
            agar tidak ada informasi terlewat.
          </p>
        </div>

      </div>

    </div>

  </div>
</section>

<!-- TIMELINE -->
<section class="py-20 bg-white">
  <div class="max-w-6xl mx-auto px-4">

    <h2 class="text-3xl font-extrabold text-center mb-16">
      Timeline Kegiatan
    </h2>

    <div class="space-y-6">

      <div class="bg-yellow-300 rounded-full px-6 py-3 font-semibold">
        18 Nov 2025 — Kickoff Meeting
      </div>

      <div class="bg-yellow-300 rounded-full px-6 py-3 font-semibold">
        18 - 26 Nov 2025 — Pendaftaran Peserta
      </div>

      <div class="bg-yellow-300 rounded-full px-6 py-3 font-semibold">
        27 - 28 Nov 2025 — Pelatihan Peserta (Daring)
      </div>

      <div class="bg-yellow-300 rounded-full px-6 py-3 font-semibold">
        3 Des 2025 — Unggah Proposal Ide Karya
      </div>

      <div class="bg-yellow-300 rounded-full px-6 py-3 font-semibold">
        7 Des 2025 — Pengumuman Lolos Seleksi
      </div>

      <div class="bg-yellow-300 rounded-full px-6 py-3 font-semibold">
        10 Des 2025 — Presentasi & Penentuan Pemenang
      </div>

    </div>

  </div>
</section>

<!-- TOOLS SECTION -->
<section class="py-20 bg-gray-50 text-center">
  <div class="max-w-6xl mx-auto px-4">

    <h2 class="text-2xl font-extrabold">
      Setiap Tim akan membuat 2 Gim Edukasi
    </h2>

    <p class="mt-3 text-gray-600">
      Tools yang wajib digunakan:
    </p>

    <div class="mt-12 flex justify-center gap-16 flex-wrap">

      <!-- Google -->
      <div class="flex flex-col items-center">
        <div class="w-40 h-40 bg-white rounded-full shadow flex items-center justify-center text-lg font-bold text-blue-600">
          Google
        </div>
        <p class="mt-4 font-semibold">Google for Education</p>
      </div>

      <!-- Canva -->
      <div class="flex flex-col items-center">
        <div class="w-40 h-40 bg-white rounded-full shadow flex items-center justify-center text-lg font-bold text-purple-600">
          Canva
        </div>
        <p class="mt-4 font-semibold">Canva</p>
      </div>

    </div>

  </div>
</section>

<!-- FAQ + PANDUAN -->
<section class="py-20 bg-blue-50">
  <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-10 items-start">

    <!-- FAQ -->
    <div>
      <h2 class="text-2xl font-extrabold mb-8">
        Pertanyaan yang Sering Diajukan (FAQ)
      </h2>

      <div class="space-y-4">
        <div class="bg-white p-4 rounded-xl shadow font-semibold">
          Bagaimana cara mendaftarkan diri pada kegiatan ini?
        </div>

        <div class="bg-white p-4 rounded-xl shadow font-semibold">
          Apakah guru SLB diperbolehkan mengikuti Hackathon?
        </div>

        <div class="bg-white p-4 rounded-xl shadow font-semibold">
          Apakah terdapat format proposal ide karya yang harus digunakan?
        </div>

        <div class="bg-white p-4 rounded-xl shadow font-semibold">
          Berapa jumlah anggota dalam 1 tim?
        </div>

        <div class="bg-white p-4 rounded-xl shadow font-semibold">
          Apakah setiap tim wajib membuat 2 gim edukasi?
        </div>
      </div>
    </div>

    <!-- Panduan -->
    <div class="bg-white p-8 rounded-2xl shadow">
      <h3 class="text-xl font-extrabold">Butuh Panduan?</h3>
      <p class="mt-3 text-gray-600 leading-relaxed">
        Kamu bisa membaca pedoman kegiatan, format proposal, dan aturan lomba
        melalui tombol di bawah ini.
      </p>

      <button class="mt-6 bg-yellow-300 px-6 py-3 rounded-full font-bold hover:bg-yellow-400 transition">
        Lihat Panduan
      </button>
    </div>

  </div>
</section>

<!-- YOUTUBE SECTION -->
<section class="py-20 bg-white">
  <div class="max-w-6xl mx-auto px-4">

    <h2 class="text-2xl font-extrabold mb-8">
      Simak Kick-off Hackathon Rumah Pendidikan
    </h2>

    <div class="grid md:grid-cols-2 gap-8">

      <!-- Video 1 -->
      <div class="aspect-video bg-gray-200 rounded-xl flex items-center justify-center font-semibold text-gray-600">
        Youtube Video 1
      </div>

      <!-- Video 2 -->
      <div class="aspect-video bg-gray-200 rounded-xl flex items-center justify-center font-semibold text-gray-600">
        Youtube Video 2
      </div>

    </div>

  </div>
</section>
@endsection