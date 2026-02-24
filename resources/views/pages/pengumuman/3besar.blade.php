@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full bg-white-100 py-25 px-12">

    {{-- Title --}}
    <div class="text-center mb-16">
        <h1 class="text-5xl font-extrabold text-gray-900 mb-4">
            PENGUMUMAN 3 BESAR
        </h1>
        <h2 class="text-2xl font-semibold text-gray-800">
            Hackathon Rumah Pendidikan 2026
        </h2>
        <p class="text-lg font-medium text-gray-700 mt-2">
            Wujudkan Indonesia Cerdas
        </p>
    </div>

    {{-- Cards --}}
<div id="cardContainer"
     class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 max-w-[1400px] mx-auto">

    {{-- PAUD --}}
    <div class="card bg-[#C9D8DF] rounded-3xl h-[360px] p-8 cursor-pointer
                transition-transform duration-500 ease-in-out relative group flex flex-col justify-between items-center
                border border-gray-200 shadow-sm hover:shadow-lg">

       <h3 class="absolute inset-0 flex items-center justify-center
               text-xl font-bold text-center
               transition-all duration-500
               group-hover:top-6 group-hover:items-start">
        Paud/Sederajat
    </h3>
        {{-- Hidden content --}}
       <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 mt-3 text-[14px] text-gray-700">
    <div class="space-y-3 text-center">
        <div>
            <p class="font-semibold text-gray-900">1. THE S.E.A PROJECT</p>
            <p class="text-gray-600">TK Surya Buana, Kota Malang</p>
        </div>

        <div>
            <p class="font-semibold text-gray-900">2. Tim Bu Guru Ceria</p>
            <p class="text-gray-600">TAUD SaQu Al Umm Barabai</p>
        </div>

        <div>
            <p class="font-semibold text-gray-900">3. Tim GPG</p>
            <p class="text-gray-600">TK IT Al-Busyra Hasyimiyah</p>
        </div>
    </div>
</div>
        {{-- Button --}}
        <button class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 mt-3 px-4 py-1 text-sm bg-blue-600 text-white rounded-full self-center">
            Lihat Detail
        </button>
    </div>

    {{-- SD --}}
    <div class="card bg-[#C9D8DF] rounded-3xl h-[360px] p-8 flex flex-col justify-between items-center
                transition-transform duration-500 ease-in-out relative group cursor-pointer
                border border-gray-200 shadow-sm hover:shadow-lg">
       <h3 class="absolute inset-0 flex items-center justify-center
               text-xl font-bold text-center
               transition-all duration-500
               group-hover:top-6 group-hover:items-start">
        SD/Sederajat
    </h3>
        <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 mt-2 text-[14px] leading-snug space-y-2 text-gray-700 text-center">
            <p>Juara akan diumumkan saat acara</p>
        </div>
        <button class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 mt-3 px-4 py-1 text-sm bg-blue-600 text-white rounded-full self-center">
            Lihat Detail
        </button>
    </div>

    {{-- SMP --}}
    <div class="card bg-[#C9D8DF] rounded-3xl h-[360px] p-8 flex flex-col justify-between items-center
                transition-transform duration-500 ease-in-out relative group cursor-pointer
                border border-gray-200 shadow-sm hover:shadow-lg">
        <h3 class="absolute inset-0 flex items-center justify-center
               text-xl font-bold text-center
               transition-all duration-500
               group-hover:top-6 group-hover:items-start">
        SMP/Sederajat
    </h3>
        <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 mt-2 text-[14px] leading-snug space-y-2 text-gray-700 text-center">
            <p>Juara akan diumumkan saat acara</p>
        </div>
        <button class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 mt-3 px-4 py-1 text-sm bg-blue-600 text-white rounded-full self-center">
            Lihat Detail
        </button>
    </div>

    {{-- SMA --}}
    <div class="card bg-[#C9D8DF] rounded-3xl h-[360px] p-8 flex flex-col justify-between items-center
                transition-transform duration-500 ease-in-out relative group cursor-pointer
                border border-gray-200 shadow-sm hover:shadow-lg">
        <h3 class="absolute inset-0 flex items-center justify-center
               text-xl font-bold text-center
               transition-all duration-500
               group-hover:top-6 group-hover:items-start">
        SMA/Sederajat
    </h3>
        <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 mt-2 text-[14px] leading-snug space-y-2 text-gray-700 text-center">
            <p>Juara akan diumumkan saat acara</p>
        </div>
        <button class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 mt-3 px-4 py-1 text-sm bg-blue-600 text-white rounded-full self-center">
            Lihat Detail
        </button>
    </div>

    {{-- SMK --}}
    <div class="card bg-[#C9D8DF] rounded-3xl h-[360px] p-8 flex flex-col justify-between items-center
                transition-transform duration-500 ease-in-out relative group cursor-pointer
                border border-gray-200 shadow-sm hover:shadow-lg">
        <h3 class="absolute inset-0 flex items-center justify-center
               text-xl font-bold text-center
               transition-all duration-500
               group-hover:top-6 group-hover:items-start">
        SMK/Sederajat
    </h3>
        <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 mt-2 text-[14px] leading-snug space-y-2 text-gray-700 text-center">
            <p>Juara akan diumumkan saat acara</p>
        </div>
        <button class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 mt-3 px-4 py-1 text-sm bg-blue-600 text-white rounded-full self-center">
            Lihat Detail
        </button>
    </div>

</div>
<style>
    #cardContainer {
        perspective: 1000px;
    }

    .card {
        transform-style: preserve-3d;
    }

    /* Hover effect maju & menjorok */
    .card:hover {
        transform: scale(1.05) translateZ(40px);
        z-index: 10;
    }

    /* Kotak lain tetap sedikit masuk */
    #cardContainer .card:not(:hover) {
        transform: scale(0.95) translateZ(-20px);
    }
</style>

@endsection