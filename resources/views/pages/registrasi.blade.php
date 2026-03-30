@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-16 bg-sky-50">
  <div class="w-full max-w-md">

    <div class="text-center mb-8">
      <img src="{{ asset('image/header/kemendikdasmen.png') }}" alt="Kemendikdasmen" class="h-12 w-auto object-contain mx-auto mb-5" />
      <h1 class="text-2xl font-extrabold text-slate-900">Registrasi Peserta</h1>
      <p class="text-sm text-slate-500 mt-1">Masukkan NUPTK dan tanggal lahir untuk verifikasi data</p>
    </div>

    {{-- ALERT GAGAL --}}
    @if(session('gagal'))
      <div class="mb-5 flex items-start gap-3 px-4 py-3 rounded-xl bg-red-50 border border-red-100">
        <svg class="w-4 h-4 text-red-500 mt-0.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="12" cy="12" r="10"/><path d="M12 8v4m0 4h.01"/>
        </svg>
        <p class="text-sm text-red-600 font-medium">{{ session('gagal') }}</p>
      </div>
    @endif

    {{-- FORM CEK NUPTK --}}
    @if(!session('berhasil'))
    <div class="bg-white rounded-2xl border border-sky-100 shadow-sm p-8">
      <form method="POST" action="{{ route('registrasi.cek') }}">
        @csrf

        <div class="mb-5">
          <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">NUPTK</label>
          <input
            type="text"
            name="nuptk"
            maxlength="16"
            placeholder="Masukkan 16 digit NUPTK"
            value="{{ old('nuptk') }}"
            class="w-full h-11 rounded-xl border-2 border-slate-100 bg-slate-50 px-4 text-sm text-slate-900 outline-none
                   focus:border-sky-400 focus:bg-white transition-all duration-150
                   {{ $errors->has('nuptk') ? 'border-red-300 bg-red-50' : '' }}"
          />
          @error('nuptk')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Tanggal Lahir</label>
          <input
            type="date"
            name="tanggal_lahir"
            value="{{ old('tanggal_lahir') }}"
            class="w-full h-11 rounded-xl border-2 border-slate-100 bg-slate-50 px-4 text-sm text-slate-900 outline-none
                   focus:border-sky-400 focus:bg-white transition-all duration-150
                   {{ $errors->has('tanggal_lahir') ? 'border-red-300 bg-red-50' : '' }}"
          />
          @error('tanggal_lahir')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
          @enderror
        </div>

        <button type="submit"
          class="w-full h-12 rounded-xl text-sm font-bold text-white transition-all duration-150 active:scale-[0.98]"
          style="background:linear-gradient(135deg,#0369a1,#0ea5e9); box-shadow:0 4px 16px rgba(3,105,161,0.3);"
          onmouseover="this.style.transform='translateY(-1px)'"
          onmouseout="this.style.transform='translateY(0)'">
          Verifikasi Data
        </button>

      </form>
    </div>
    @endif

    {{-- DATA MUNCUL SETELAH VERIFIKASI BERHASIL --}}
    @if(session('berhasil') && session('peserta'))
      @php $p = session('peserta') @endphp

      <div class="bg-white rounded-2xl border border-sky-100 shadow-sm p-8">

        {{-- Header sukses --}}
        <div class="flex items-center gap-2 mb-6 pb-4 border-b border-slate-100">
          <div class="w-8 h-8 rounded-full bg-green-50 flex items-center justify-center">
            <svg class="w-4 h-4 text-green-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
              <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>
            </svg>
          </div>
          <p class="text-sm font-bold text-green-600">Data ditemukan! Konfirmasi data Anda</p>
        </div>

        {{-- Data peserta --}}
        <div class="space-y-3 mb-6">
          @foreach([
            'Nama Lengkap' => $p->nama,
            'Sekolah'      => $p->sekolah,
            'Email'        => $p->email,
            'Kota'         => $p->kota,
            'Provinsi'     => $p->provinsi,
          ] as $label => $value)
            <div class="flex justify-between items-center text-sm py-2 border-b border-slate-50">
              <span class="text-slate-400 font-medium">{{ $label }}</span>
              <span class="text-slate-900 font-semibold text-right max-w-[60%]">{{ $value ?? '-' }}</span>
            </div>
          @endforeach
        </div>

        {{-- Info password --}}
        <div class="mb-6 px-4 py-3 rounded-xl bg-sky-50 border border-sky-100">
          <p class="text-xs text-sky-700 font-medium">
            💡 Password login Anda adalah tanggal lahir dengan format <strong>ddmmyyyy</strong>.
            Contoh: lahir 15 Mei 1990 → password: <strong>15051990</strong>
          </p>
        </div>

        {{-- Tombol konfirmasi --}}
        <form method="POST" action="{{ route('registrasi.submit') }}">
          @csrf
          <button type="submit"
            class="w-full h-12 rounded-xl text-sm font-bold text-white transition-all duration-150 active:scale-[0.98]"
            style="background:linear-gradient(135deg,#0369a1,#0ea5e9); box-shadow:0 4px 16px rgba(3,105,161,0.3);"
            onmouseover="this.style.transform='translateY(-1px)'"
            onmouseout="this.style.transform='translateY(0)'">
            Konfirmasi & Daftar Sekarang
          </button>
        </form>

        {{-- Link kembali --}}
        <button
          onclick="window.location='{{ route('registrasi') }}'"
          class="w-full mt-3 h-10 rounded-xl text-sm font-semibold text-slate-500 hover:text-slate-700 transition">
          ← Ulangi Verifikasi
        </button>

      </div>
    @endif

    <p class="text-center text-xs text-slate-400 mt-6">
      Sudah punya akun?
      <a href="{{ route('login') }}" class="text-sky-600 font-semibold hover:text-sky-700 transition">Masuk di sini</a>
    </p>

  </div>
</div>
@endsection