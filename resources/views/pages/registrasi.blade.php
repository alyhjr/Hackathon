@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-10 max-w-xl">

    <h1 class="text-2xl font-bold mb-6">Registrasi Calon Peserta</h1>

    @if(session('success'))
        <div class="p-3 mb-4 rounded bg-green-100 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="p-3 mb-4 rounded bg-red-100 text-red-800">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- STEP 1 --}}
    <form method="POST" action="{{ route('registrasi.cek') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium mb-1">NUPTK</label>
            <input
                name="nuptk"
                value="{{ old('nuptk', $nuptk ?? '') }}"
                class="w-full border rounded px-3 py-2"
                placeholder="Masukkan NUPTK"
            />
        </div>

        <div>
            <label class="block font-medium mb-1">Tanggal Lahir</label>
            <input
                type="date"
                name="tanggal_lahir"
                value="{{ old('tanggal_lahir', $tanggal_lahir ?? '') }}"
                class="w-full border rounded px-3 py-2"
            />
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Cek Data Dapodik
        </button>
    </form>

    {{-- STEP 2 --}}
    @if(isset($hasil))
        <hr class="my-8"/>

        <h2 class="text-xl font-semibold mb-4">Data Ditemukan</h2>

        <div class="p-4 border rounded mb-6 space-y-1">
            <p><b>Nama:</b> {{ $hasil['nama'] }}</p>
            <p><b>NPSN:</b> {{ $hasil['npsn'] ?? '-' }}</p>
            <p><b>Sekolah:</b> {{ $hasil['sekolah'] ?? '-' }}</p>
        </div>

        <form method="POST" action="{{ route('registrasi.simpan') }}" class="space-y-4">
            @csrf

            <input type="hidden" name="nuptk" value="{{ $nuptk }}">
            <input type="hidden" name="tanggal_lahir" value="{{ $tanggal_lahir }}">
            <input type="hidden" name="nama" value="{{ $hasil['nama'] }}">
            <input type="hidden" name="npsn" value="{{ $hasil['npsn'] ?? '' }}">

            <div>
                <label class="block font-medium mb-1">No. Telp</label>
                <input
                    name="no_telp"
                    value="{{ old('no_telp') }}"
                    class="w-full border rounded px-3 py-2"
                    placeholder="08xxxxxxxxxx"
                />
            </div>

            <div>
                <label class="block font-medium mb-1">Email</label>
                <input
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full border rounded px-3 py-2"
                    placeholder="nama@email.com"
                />
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">
                Kirim Registrasi
            </button>
        </form>
    @endif

</div>
@endsection