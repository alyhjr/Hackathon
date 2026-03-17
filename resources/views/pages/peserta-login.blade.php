@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-16 bg-sky-50">
  <div class="w-full max-w-md">

    <div class="text-center mb-8">
      <img src="{{ asset('image/header/kemendikdasmen.png') }}" alt="Kemendikdasmen" class="h-12 w-auto object-contain mx-auto mb-5" />
      <h1 class="text-2xl font-extrabold text-slate-900">Login Peserta</h1>
      <p class="text-sm text-slate-500 mt-1">Masuk ke akun peserta Hackathon Rumah Pendidikan</p>
    </div>

    @if(session('status'))
      <div class="mb-5 flex items-start gap-3 px-4 py-3 rounded-xl bg-green-50 border border-green-100">
        <svg class="w-4 h-4 text-green-500 mt-0.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>
        </svg>
        <p class="text-sm text-green-700 font-medium">{{ session('status') }}</p>
      </div>
    @endif

    @if(session('gagal'))
      <div class="mb-5 flex items-start gap-3 px-4 py-3 rounded-xl bg-red-50 border border-red-100">
        <svg class="w-4 h-4 text-red-500 mt-0.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="12" cy="12" r="10"/><path d="M12 8v4m0 4h.01"/>
        </svg>
        <p class="text-sm text-red-600 font-medium">{{ session('gagal') }}</p>
      </div>
    @endif

    <div class="bg-white rounded-2xl border border-sky-100 shadow-sm p-8">
      <form method="POST" action="{{ route('peserta.login.post') }}">
        @csrf

        <div class="mb-4">
          <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Email</label>
          <input type="email" name="email" value="{{ old('email') }}" required
            placeholder="nama@email.com"
            class="w-full h-11 rounded-xl border-2 border-slate-100 bg-slate-50 px-4 text-sm text-slate-900 outline-none focus:border-sky-400 focus:bg-white transition-all duration-150" />
        </div>

        <div class="mb-6">
          <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Password</label>
          <input type="password" name="password" required
            placeholder="••••••••"
            class="w-full h-11 rounded-xl border-2 border-slate-100 bg-slate-50 px-4 text-sm text-slate-900 outline-none focus:border-sky-400 focus:bg-white transition-all duration-150" />
          <p class="mt-1.5 text-xs text-slate-400">Password: tanggal lahir format ddmmyyyy</p>
        </div>

        <button type="submit"
          class="w-full h-12 rounded-xl text-sm font-bold text-white transition-all duration-150 active:scale-[0.98]"
          style="background:linear-gradient(135deg,#0369a1,#0ea5e9); box-shadow:0 4px 16px rgba(3,105,161,0.3);">
          Masuk
        </button>

      </form>
    </div>

    <p class="text-center text-xs text-slate-400 mt-6">
      Belum terdaftar?
      <a href="{{ route('registrasi') }}" class="text-sky-600 font-semibold hover:text-sky-700 transition">Daftar di sini</a>
    </p>

  </div>
</div>
@endsection