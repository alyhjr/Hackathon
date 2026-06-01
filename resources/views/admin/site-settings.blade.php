@extends('layouts.admin')

@section('title','CMS Admin')

@section('content')
<style>
  [x-cloak] { display: none !important; }

  .tab-content { animation: fadeUp 0.18s ease both; }
  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(6px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  .field-label {
    display: block;
    font-size: 0.75rem;
    font-weight: 700;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    color: #64748b;
    margin-bottom: 0.35rem;
  }
  .field-input {
    width: 100%;
    border: 1.5px solid #e2e8f0;
    border-radius: 0.75rem;
    padding: 0.65rem 1rem;
    font-size: 0.925rem;
    color: #0f172a;
    background: #fff;
    transition: border-color 0.15s, box-shadow 0.15s;
    outline: none;
  }
  .field-input:focus {
    border-color: #0072BC;
    box-shadow: 0 0 0 3px rgba(0,114,188,0.12);
  }
  textarea.field-input { resize: vertical; }

  .btn-primary {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.4rem;
    padding: 0.6rem 1.5rem;
    border-radius: 0.65rem;
    background: #0072BC;
    color: #fff;
    font-weight: 700;
    font-size: 0.875rem;
    border: none;
    cursor: pointer;
    transition: background 0.15s, box-shadow 0.15s;
  }
  .btn-primary:hover { background: #005fa3; box-shadow: 0 4px 12px rgba(0,114,188,0.25); }

  .btn-ghost {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.4rem;
    padding: 0.6rem 1.5rem;
    border-radius: 0.65rem;
    background: #f8fafc;
    color: #334155;
    font-weight: 700;
    font-size: 0.875rem;
    border: 1.5px solid #e2e8f0;
    cursor: pointer;
    transition: background 0.15s;
  }
  .btn-ghost:hover { background: #f1f5f9; }

  .btn-danger {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.45rem 0.9rem;
    border-radius: 0.55rem;
    background: #fff0f0;
    color: #dc2626;
    font-weight: 700;
    font-size: 0.8rem;
    border: 1.5px solid #fecaca;
    cursor: pointer;
    transition: background 0.15s;
  }
  .btn-danger:hover { background: #fee2e2; }

  .btn-edit {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.45rem 0.9rem;
    border-radius: 0.55rem;
    background: #0f172a;
    color: #fff;
    font-weight: 700;
    font-size: 0.8rem;
    border: none;
    cursor: pointer;
    transition: background 0.15s;
  }
  .btn-edit:hover { background: #1e293b; }

  .card {
    background: #fff;
    border: 1.5px solid #e2e8f0;
    border-radius: 1.1rem;
    padding: 1.75rem;
  }
  .card-title {
    font-size: 1.1rem;
    font-weight: 800;
    color: #0f172a;
    letter-spacing: -0.01em;
  }
  .card-sub {
    font-size: 0.83rem;
    color: #64748b;
    margin-top: 0.2rem;
  }

  .section-divider {
    border: none;
    border-top: 1.5px solid #f1f5f9;
    margin: 1.5rem 0;
  }

  .badge {
    display: inline-flex;
    align-items: center;
    padding: 0.2rem 0.65rem;
    border-radius: 99px;
    font-size: 0.72rem;
    font-weight: 700;
  }
  .badge-active   { background: #dcfce7; color: #15803d; }
  .badge-inactive { background: #f1f5f9; color: #64748b; }
  .badge-count    { background: #eff6ff; color: #1d4ed8; }
</style>

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-10">

{{-- ===== ADMIN HEADER ===== --}}
<div class="mb-5" x-data="{ openProfile: false }">

  <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4
              bg-white border border-slate-200 rounded-2xl px-6 py-4 shadow-sm">

    {{-- LEFT --}}
    <div class="flex items-center gap-3">
      <div>
        <div class="text-[10px] font-semibold tracking-widest uppercase text-slate-400 mb-0.5">
          Admin Panel
        </div>
        <h1 class="text-lg font-bold text-slate-900 leading-tight">
          CMS Informasi Website
        </h1>
        <p class="text-xs text-slate-400 mt-0.5">
          Kelola konten website & data peserta
        </p>
      </div>
    </div>

    {{-- RIGHT (ACCOUNT) --}}
    <div class="relative shrink-0" @click.away="openProfile=false">

      {{-- BUTTON --}}
      <button @click="openProfile = !openProfile"
        class="flex items-center justify-center w-9 h-9 rounded-full
               hover:bg-slate-100 transition-all duration-200">
        <div class="w-9 h-9 rounded-full
                    bg-gradient-to-br from-slate-400 to-slate-800
                    flex items-center justify-center
                    text-white text-sm font-semibold select-none">
          A
        </div>
      </button>

      {{-- DROPDOWN --}}
      <div x-show="openProfile"
           x-transition:enter="transition ease-out duration-150"
           x-transition:enter-start="opacity-0 translate-y-1 scale-95"
           x-transition:enter-end="opacity-100 translate-y-0 scale-100"
           x-transition:leave="transition ease-in duration-100"
           x-transition:leave-start="opacity-100"
           x-transition:leave-end="opacity-0 translate-y-1"
           class="absolute right-0 mt-2 w-48
                  bg-white border border-slate-200
                  rounded-xl shadow-md
                  overflow-hidden z-50"
           style="display:none">

        <div class="p-1.5 border-b border-slate-100">

          <button type="button"
              @click="openProfile = false; $dispatch('open-modal', 'modal-password')"
              class="w-full text-left flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm text-slate-600
                     hover:bg-slate-50 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
            </svg>
            Ubah Password
          </button>

          <button type="button"
              @click="openProfile = false; $dispatch('open-modal', 'modal-email')"
              class="w-full text-left flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm text-slate-600
                     hover:bg-slate-50 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-slate-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            Ubah Email
          </button>

        </div>

        <div class="p-1.5">
          {{-- Trigger logout confirm modal, bukan langsung submit --}}
          <button type="button"
              @click="openProfile = false; $dispatch('open-modal', 'modal-logout')"
              class="w-full text-left flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm text-red-500
                     hover:bg-red-50 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
            </svg>
            Logout
          </button>
        </div>

      </div>
    </div>

  </div>

  {{-- TOAST NOTIFICATION --}}
  @if(session('success') || $errors->any())
  <div
      x-data="{ show: true }"
      x-init="setTimeout(() => show = false, 8000)"
      x-show="show"
      x-transition:enter="transition ease-out duration-300"
      x-transition:enter-start="opacity-0 -translate-y-3"
      x-transition:enter-end="opacity-100 translate-y-0"
      x-transition:leave="transition ease-in duration-200"
      x-transition:leave-start="opacity-100 translate-y-0"
      x-transition:leave-end="opacity-0 -translate-y-3"
      class="fixed top-4 left-1/2 -translate-x-1/2 z-[200] w-full max-w-sm"
      style="display:none">

      @if(session('success'))
          <div class="flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700 shadow-sm">
              <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
              <span class="flex-1">{{ session('success') }}</span>
              <button @click="show = false" class="text-emerald-400 hover:text-emerald-600 transition">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                  </svg>
              </button>
          </div>
      @endif

      @if($errors->any())
          <div class="flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-600 shadow-sm">
              <svg class="w-4 h-4 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
              </svg>
              <div class="flex-1">
                  <div class="font-semibold mb-1">Ada error:</div>
                  <ul class="list-disc pl-4 space-y-0.5">
                      @foreach($errors->all() as $err)
                          <li>{{ $err }}</li>
                      @endforeach
                  </ul>
              </div>
              <button @click="show = false" class="text-red-400 hover:text-red-600 transition shrink-0">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                  </svg>
              </button>
          </div>
      @endif
  </div>
  @endif

</div>


{{-- ===== MODAL KONFIRMASI LOGOUT ===== --}}
<div x-data="{ show: false }"
     @open-modal.window="show = ($event.detail === 'modal-logout')"
     x-show="show"
     x-transition:enter="transition ease-out duration-200"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-150"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-[100] flex items-center justify-center bg-black/40 backdrop-blur-sm"
     style="display:none">

    <div @click.outside="show = false"
         class="bg-white rounded-2xl shadow-xl w-full max-w-sm mx-4 p-6">

        {{-- Icon --}}
        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-red-50 mx-auto mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
            </svg>
        </div>

        <h2 class="text-base font-semibold text-slate-800 text-center mb-1">Konfirmasi Logout</h2>
        <p class="text-sm text-slate-500 text-center mb-6">
            Apakah Anda yakin ingin keluar dari panel admin?
        </p>

        <div class="flex gap-3">
            <button type="button"
                @click="show = false"
                class="flex-1 px-4 py-2.5 rounded-xl border border-slate-200 text-sm font-medium text-slate-600 hover:bg-slate-50 transition">
                Batal
            </button>
            <form method="POST" action="{{ route('admin.logout') }}" class="flex-1">
                @csrf
                <button type="submit"
                    class="w-full px-4 py-2.5 rounded-xl bg-red-500 text-sm font-semibold text-white hover:bg-red-600 transition">
                    Ya, Logout
                </button>
            </form>
        </div>

    </div>
</div>


{{-- ===== MODAL GANTI PASSWORD ===== --}}
<div x-data="{ show: false }"
     @open-modal.window="show = ($event.detail === 'modal-password')"
     x-show="show"
     x-transition:enter="transition ease-out duration-200"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-150"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-[100] flex items-center justify-center bg-black/40 backdrop-blur-sm"
     style="display:none">

    <div @click.outside="show = false"
         class="bg-white rounded-2xl shadow-xl w-full max-w-md mx-4 p-6"
         x-data="{ showLama: false, showBaru: false, showKonfirmasi: false }">

        <div class="flex items-center justify-between mb-5">
            <h2 class="text-base font-semibold text-slate-800">Ubah Password</h2>
            <button @click="show = false" class="text-slate-400 hover:text-slate-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <form method="POST" action="{{ route('admin.ganti-password') }}" class="space-y-4">
            @csrf

            {{-- Password Lama --}}
            <div>
                <label class="field-label">Password Saat Ini</label>
                <div class="relative">
                    <input :type="showLama ? 'text' : 'password'" name="password_lama"
                        class="field-input pr-10" placeholder="••••••••" required>
                    <button type="button" @click="showLama = !showLama"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 transition">
                        <svg x-show="!showLama" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        <svg x-show="showLama" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                        </svg>
                    </button>
                </div>
                @error('password_lama')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password Baru --}}
            <div>
                <label class="field-label">Password Baru</label>
                <div class="relative">
                    <input :type="showBaru ? 'text' : 'password'" name="password_baru"
                        class="field-input pr-10" placeholder="••••••••" required>
                    <button type="button" @click="showBaru = !showBaru"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 transition">
                        <svg x-show="!showBaru" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        <svg x-show="showBaru" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                        </svg>
                    </button>
                </div>
                @error('password_baru')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Konfirmasi Password --}}
            <div>
                <label class="field-label">Konfirmasi Password Baru</label>
                <div class="relative">
                    <input :type="showKonfirmasi ? 'text' : 'password'" name="password_baru_confirmation"
                        class="field-input pr-10" placeholder="••••••••" required>
                    <button type="button" @click="showKonfirmasi = !showKonfirmasi"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 transition">
                        <svg x-show="!showKonfirmasi" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        <svg x-show="showKonfirmasi" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex justify-end gap-2 pt-1">
                <button type="button" @click="show = false" class="btn-ghost">Batal</button>
                <button type="submit" class="btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>


{{-- ===== MODAL GANTI EMAIL ===== --}}
<div x-data="{ show: false }"
     @open-modal.window="show = ($event.detail === 'modal-email')"
     x-show="show"
     x-transition:enter="transition ease-out duration-200"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-150"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-[100] flex items-center justify-center bg-black/40 backdrop-blur-sm"
     style="display:none">

    <div @click.outside="show = false"
         class="bg-white rounded-2xl shadow-xl w-full max-w-md mx-4 p-6"
         x-data="{ showPass: false }">

        <div class="flex items-center justify-between mb-5">
            <h2 class="text-base font-semibold text-slate-800">Ubah Email</h2>
            <button @click="show = false" class="text-slate-400 hover:text-slate-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <form method="POST" action="{{ route('admin.ganti-email') }}" class="space-y-4">
            @csrf

            {{-- Email Saat Ini --}}
            <div>
                <label class="field-label">Email Saat Ini</label>
                <input type="text" value="{{ optional(Auth::user())->email }}"
                    class="field-input bg-slate-50 text-slate-400" disabled>
            </div>

            {{-- Email Baru --}}
            <div>
                <label class="field-label">Email Baru</label>
                <input type="email" name="email_baru"
                    class="field-input" placeholder="email@baru.com" required>
                @error('email_baru')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Konfirmasi Password --}}
            <div>
                <label class="field-label">Konfirmasi Password</label>
                <div class="relative">
                    <input :type="showPass ? 'text' : 'password'" name="password"
                        class="field-input pr-10" placeholder="••••••••" required>
                    <button type="button" @click="showPass = !showPass"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 transition">
                        <svg x-show="!showPass" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        <svg x-show="showPass" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                        </svg>
                    </button>
                </div>
                @error('password')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-2 pt-1">
                <button type="button" @click="show = false" class="btn-ghost">Batal</button>
                <button type="submit" class="btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>


  {{-- ===== MAIN LAYOUT ===== --}}
  <div class="mt-8 grid grid-cols-1 lg:grid-cols-12 gap-6"
       x-data="{ tab: (localStorage.getItem('cms_tab') || 'hero') }"
       x-init="$watch('tab', v => localStorage.setItem('cms_tab', v))">

    {{-- ===== SIDEBAR ===== --}}
<aside class="lg:col-span-3">
  <div class="sticky top-6">
    <div class="rounded-xl border border-slate-200 bg-white shadow-sm overflow-hidden">

     

      @php
        $menu = [
          [
            'title' => 'Peserta',
            'items' => [
              [
                'key'=>'kelola-registrasi',
                'label'=>'Kelola Registrasi',
                'desc'=>'Aksi lolos/tidak lolos peserta'
              ],
              [
                'key'=>'peserta-submission',
                'label'=>'Kelola Peserta',
                'desc'=>'Nama Tim, Anggota & Submission'
              ],
            ]
          ],
          [
            'title' => 'Konten Website',
            'items' => [
              [
                'key'=>'hero',
                'label'=>'Beranda – Hero',
                'desc'=>'Judul, subtitle, tombol'
              ],
              [
                'key'=>'homeimg',
                'label'=>'Beranda – Gambar',
                'desc'=>'3 gambar beranda'
              ],
              [
                'key'=>'informasi-penting',
                'label'=>'Informasi Penting',
                'desc'=>'Highlight info utama'
              ],
              [
                'key'=>'lomba',
                'label'=>'Lomba',
                'desc'=>'Ketentuan & tahapan'
              ],
              [
                'key'=>'pengumuman',
                'label'=>'Pengumuman',
                'desc'=>'Hasil & info lomba'
              ],
              [
                'key'=>'timeline',
                'label'=>'Timeline',
                'desc'=>'Tahapan kegiatan'
              ],
              [
                'key'=>'faq',
                'label'=>'FAQ',
                'desc'=>'Pertanyaan umum'
              ],
              [
                'key'=>'youtube',
                'label'=>'Beranda – YouTube',
                'desc'=>'Embed video'
              ],
              ['key'=>'news', 'label'=>'Berita / News', 'desc'=>'Kelola artikel berita & info']
            ]
          ]
        ];
      @endphp

      {{-- NAV --}}
      <nav class="p-2 space-y-3">

        @foreach($menu as $section)

          {{-- SECTION TITLE --}}
          <div class="px-3 pt-2">
            <div class="text-[10px] font-black tracking-widest text-slate-400 uppercase">
              {{ $section['title'] }}
            </div>
          </div>

          {{-- MENU ITEMS --}}
          <div class="space-y-0.5">
            @foreach($section['items'] as $t)
              <button type="button"
                class="w-full text-left rounded-lg px-3 py-2.5 transition-all group"
                :class="tab === '{{ $t['key'] }}'
                  ? 'bg-[#0072BC] text-white shadow-sm'
                  : 'text-slate-700 hover:bg-slate-50'"
                @click="tab='{{ $t['key'] }}'">

                <div>
                  <div class="text-sm font-bold leading-tight">
                    {{ $t['label'] }}
                  </div>

                  <div class="text-[11px] mt-0.5 leading-tight"
                    :class="tab === '{{ $t['key'] }}'
                      ? 'text-white/70'
                      : 'text-slate-400'">
                    {{ $t['desc'] }}
                  </div>
                </div>

              </button>
            @endforeach
          </div>

        @endforeach

      </nav>

    </div>
  </div>
</aside>


    {{-- ===== CONTENT AREA ===== --}}
    <section class="lg:col-span-9 space-y-5">

      {{-- ===========================
          TAB: HERO
      ============================ --}}
      <div x-show="tab==='hero'" x-cloak class="tab-content">
        <div class="card">
          <div class="card-title">Beranda – Hero</div>
          <div class="card-sub">Edit teks utama, tombol registrasi, dan gambar hero di halaman beranda.</div>

          <hr class="section-divider">

          <form method="POST" action="{{ route('admin.site-settings.update') }}" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
              <label class="field-label">Hero Title</label>
              <textarea name="hero_title" rows="2" class="field-input"
                placeholder="Contoh: HACKATHON RUMAH PENDIDIKAN 2026">{{ old('hero_title', $setting->hero_title) }}</textarea>
              <p class="text-xs text-slate-400 mt-1">Tips: gunakan Enter untuk baris baru.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label class="field-label">Hero Subtitle</label>
                <input type="text" name="hero_subtitle" class="field-input"
                  value="{{ old('hero_subtitle', $setting->hero_subtitle) }}" placeholder="Subtitle singkat">
              </div>
              <div>
                <label class="field-label">Hero Tagline</label>
                <input type="text" name="hero_tagline" class="field-input"
                  value="{{ old('hero_tagline', $setting->hero_tagline) }}" placeholder="Tagline pendek">
              </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label class="field-label">Teks Tombol</label>
                <input type="text" name="primary_button_text" class="field-input"
                  value="{{ old('primary_button_text', $setting->primary_button_text) }}" placeholder="Daftar Sekarang">
              </div>
              <div>
                <label class="field-label">URL Tombol</label>
                <input type="text" name="primary_button_url" class="field-input"
                  value="{{ old('primary_button_url', $setting->primary_button_url) }}" placeholder="/registrasi">
              </div>
            </div>

            <hr class="section-divider">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
              <div>
                <label class="field-label">Upload Gambar Hero</label>
                <label class="mt-1 flex flex-col items-center justify-center gap-2 w-full border-2 border-dashed border-slate-200 rounded-xl px-4 py-6 cursor-pointer hover:border-[#0072BC] hover:bg-blue-50/30 transition-colors text-center">
                  <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/></svg>
                  <span class="text-sm text-slate-500">Klik untuk pilih gambar</span>
                  <span class="text-xs text-slate-400">JPG · PNG · WEBP</span>
                  <input type="file" name="hero_image" id="hero_image" class="hidden" accept="image/*">
                </label>
              </div>
              <div>
                <div class="field-label">Preview</div>
                @php
                  $heroPreview = $setting->hero_image
                    ? asset('storage/'.$setting->hero_image)
                    : asset('image/header/sekolah.jpg');
                @endphp
                <img id="hero_preview" src="{{ $heroPreview }}"
                     class="w-full h-[160px] object-cover rounded-xl border border-slate-200">
              </div>
            </div>

            <div class="pt-1">
              <button type="submit" class="btn-primary">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Simpan Hero
              </button>
            </div>
          </form>
        </div>
      </div>


{{-- ===========================
    TAB: KELOLA REGISTRASI
============================ --}}
<div x-show="tab==='kelola-registrasi'" x-cloak class="tab-content">
  <div class="card">
    <div class="card-title">Kelola Registrasi Peserta</div>
    <div class="card-sub">Tentukan status lolos atau tidak lolos untuk setiap peserta yang mendaftar.</div>

    <hr class="section-divider">

    @if(session('success'))
      <div class="flex items-center gap-2 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-800 text-sm font-semibold mb-4">
        <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
        </svg>
        {{ session('success') }}
      </div>
    @endif

    {{-- Stat Cards --}}
    @php
      $all        = $pesertaRegistrasi ?? collect();
      $total      = $all->count();
      $jmlPending = $all->where('status', 'pending')->count();
      $jmlLolos   = $all->where('status', 'lolos')->count();
      $jmlTolak   = $all->where('status', 'tidak_lolos')->count();
    @endphp

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(120px,1fr));gap:12px;margin-bottom:1.5rem;">
      <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;padding:1rem 1.1rem;">
        <div style="font-size:1.6rem;font-weight:800;color:#1565C0;line-height:1;">{{ $total }}</div>
        <div style="font-size:0.7rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.06em;margin-top:4px;">Total Peserta</div>
      </div>
      <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;padding:1rem 1.1rem;">
        <div style="font-size:1.6rem;font-weight:800;color:#b45309;line-height:1;">{{ $jmlPending }}</div>
        <div style="font-size:0.7rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.06em;margin-top:4px;">Pending</div>
      </div>
      <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;padding:1rem 1.1rem;">
        <div style="font-size:1.6rem;font-weight:800;color:#16a34a;line-height:1;">{{ $jmlLolos }}</div>
        <div style="font-size:0.7rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.06em;margin-top:4px;">Lolos</div>
      </div>
      <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;padding:1rem 1.1rem;">
        <div style="font-size:1.6rem;font-weight:800;color:#dc2626;line-height:1;">{{ $jmlTolak }}</div>
        <div style="font-size:0.7rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.06em;margin-top:4px;">Tidak Lolos</div>
      </div>
    </div>

    {{-- Tabel --}}
    <div class="overflow-x-auto">
      <table class="w-full text-sm" style="border-collapse:collapse;min-width:600px;">
        <thead>
          <tr style="background:#f8fafc;border-bottom:1.5px solid #e2e8f0;">
            <th class="text-left px-4 py-3 text-xs font-bold text-slate-400 uppercase tracking-wider">Nama</th>
            <th class="text-left px-4 py-3 text-xs font-bold text-slate-400 uppercase tracking-wider">Sekolah</th>
            <th class="text-left px-4 py-3 text-xs font-bold text-slate-400 uppercase tracking-wider">Email</th>
            <th class="text-left px-4 py-3 text-xs font-bold text-slate-400 uppercase tracking-wider">Tgl Daftar</th>
            <th class="text-left px-4 py-3 text-xs font-bold text-slate-400 uppercase tracking-wider">Status</th>
            <th class="text-left px-4 py-3 text-xs font-bold text-slate-400 uppercase tracking-wider">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($pesertaRegistrasi ?? collect() as $p)
            <tr style="border-bottom:1px solid #f1f5f9;" class="hover:bg-slate-50 transition">
              <td class="px-4 py-3 font-semibold text-slate-800">{{ $p->nama }}</td>
              <td class="px-4 py-3 text-slate-600">{{ $p->sekolah }}</td>
              <td class="px-4 py-3 text-slate-600">{{ $p->email }}</td>
              <td class="px-4 py-3 text-slate-500 text-xs">{{ $p->created_at?->format('d M Y') }}</td>
              <td class="px-4 py-3">
                @if($p->status === 'pending')
                  <span class="badge" style="background:#fef9c3;color:#854d0e;">Pending</span>
                @elseif($p->status === 'lolos')
                  <span class="badge badge-active">Lolos</span>
                @else
                  <span class="badge" style="background:#fee2e2;color:#991b1b;">Tidak Lolos</span>
                @endif
              </td>
              <td class="px-4 py-3">
                <form method="POST" action="{{ route('admin.peserta-registrasi.status', $p->id) }}" class="flex gap-2">
                  @csrf
                  @method('POST')
                  <select name="status" class="field-input" style="width:auto;padding:0.35rem 0.75rem;font-size:0.78rem;">
                    <option value="pending" {{ $p->status === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="lolos" {{ $p->status === 'lolos' ? 'selected' : '' }}>Lolos</option>
                    <option value="tidak_lolos" {{ $p->status === 'tidak_lolos' ? 'selected' : '' }}>Tidak Lolos</option>
                  </select>
                  <button type="submit" class="btn-primary" style="padding:0.35rem 0.9rem;font-size:0.78rem;">
                    Simpan
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="px-4 py-12 text-center">
                <div class="text-slate-400 text-sm">Belum ada peserta yang mendaftar.</div>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

  </div>
</div>

{{-- ===========================
   Kelola Peserta — Submission
   Blade Component (Alpine.js)
============================ --}}

@once
<style>
*{box-sizing:border-box;margin:0;padding:0}

.kp-wrap{padding:1.75rem 2rem;font-family:inherit;color:#0f172a;background:#fff;border-radius:16px;border:1px solid #e2e8f0}

/* ── Header ── */
.kp-hdr{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:1.25rem;flex-wrap:wrap;gap:10px}
.kp-hdr h1{font-size:18px;font-weight:600;color:var(--ps-text,#0f172a)}
.kp-hdr p{font-size:13px;color:#64748b;margin-top:2px}

/* ── Buttons ── */
.kp-btn-export{display:inline-flex;align-items:center;gap:6px;padding:7px 14px;border-radius:8px;background:#dcfce7;border:0.5px solid #86efac;color:#166534;font-size:13px;font-weight:600;cursor:pointer;transition:opacity .15s;text-decoration:none}
.kp-btn-export:hover{opacity:.75}

/* ── Alert ── */
.kp-alert{display:flex;align-items:center;gap:8px;background:#dcfce7;border:0.5px solid #86efac;border-radius:8px;padding:9px 13px;color:#166534;font-size:13px;font-weight:600;margin-bottom:14px}

/* ── Stats ── */
.kp-stats{display:grid;grid-template-columns:repeat(auto-fit,minmax(80px,1fr));gap:8px;margin-bottom:1.25rem}
.kp-sc{background:#f8fafc;border-radius:8px;padding:10px 12px;text-align:center;cursor:pointer;border:1.5px solid transparent;transition:border-color .15s}
.kp-sc:hover,.kp-sc.active{border-color:#93c5fd}
.kp-sc .n{font-size:20px;font-weight:700;color:#1d4ed8}
.kp-sc .l{font-size:11px;font-weight:600;color:#64748b;margin-top:3px;text-transform:uppercase;letter-spacing:.05em}

/* ── Toolbar ── */
.kp-toolbar{display:flex;gap:8px;margin-bottom:10px;align-items:center}
.kp-srch{position:relative;flex:1}
.kp-srch svg{position:absolute;left:9px;top:50%;transform:translateY(-50%);width:15px;height:15px;color:#94a3b8;pointer-events:none}
.kp-srch input{padding:7px 10px 7px 32px;font-size:13px;font-weight:500;width:100%;border-radius:8px;border:0.5px solid #cbd5e1;background:#fff;color:#0f172a;outline:none}
.kp-srch input:focus{border-color:#93c5fd}
.kp-toolbar select{padding:7px 10px;font-size:13px;font-weight:500;border-radius:8px;border:0.5px solid #cbd5e1;background:#fff;color:#0f172a;flex-shrink:0;outline:none;cursor:pointer}
.kp-toolbar select:focus{border-color:#93c5fd}

/* ── Table ── */
.kp-tw{border:0.5px solid #e2e8f0;border-radius:12px;overflow:hidden;overflow-x:auto}
.kp-tw table{width:100%;border-collapse:collapse;min-width:520px}
.kp-tw col.c0{width:36px}
.kp-tw col.c1{width:150px}
.kp-tw col.c2{width:90px}
.kp-tw col.c3{width:auto}
.kp-tw col.c4{width:100px}
.kp-tw col.c5{width:110px}
.kp-tw col.c6{width:80px}
.kp-tw thead tr{background:#f8fafc}
.kp-tw thead th{padding:9px 10px;text-align:left;font-size:11px;font-weight:700;color:#64748b;letter-spacing:.06em;text-transform:uppercase;border-bottom:0.5px solid #e2e8f0;white-space:nowrap}
.kp-tw tbody tr{border-bottom:0.5px solid #f1f5f9;transition:background .1s}
.kp-tw tbody tr:last-child{border-bottom:none}
.kp-tw tbody tr:hover{background:#f8fafc}
.kp-tw tbody td{padding:10px;font-size:13px;font-weight:600;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;vertical-align:middle;color:#334155}
.kp-tnm{font-weight:700;font-size:13px;color:#0f172a;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.kp-date-m{font-size:12px;font-weight:700;color:#334155}
.kp-date-t{font-size:11px;font-weight:500;color:#94a3b8}

/* ── Badges ── */
.kp-badge{display:inline-block;font-size:11px;font-weight:700;padding:2px 8px;border-radius:8px;white-space:nowrap}
.kp-bp{background:#FAEEDA;color:#854F0B}
.kp-bt{background:#E6F1FB;color:#185FA5}
.kp-bs{background:#EAF3DE;color:#3B6D11}
.kp-bm{background:#EEEDFE;color:#534AB7}
.kp-ba{background:#FBEAF0;color:#993556}
.kp-bk{background:#FCEBEB;color:#A32D2D}

/* ── Detail button ── */
.kp-btn-d{display:inline-flex;align-items:center;gap:4px;padding:5px 10px;border-radius:8px;border:0.5px solid #cbd5e1;background:transparent;font-size:12px;font-weight:600;cursor:pointer;color:#0f172a;transition:background .1s;white-space:nowrap}
.kp-btn-d:hover{background:#f1f5f9}

/* ── Pagination ── */
.kp-pgbar{display:flex;align-items:center;justify-content:space-between;margin-top:12px;flex-wrap:wrap;gap:8px}
.kp-pginfo{font-size:12px;font-weight:500;color:#64748b}
.kp-pgbtns{display:flex;gap:5px}
.kp-pb{padding:5px 10px;border-radius:8px;border:0.5px solid #cbd5e1;background:transparent;font-size:12px;font-weight:600;cursor:pointer;color:#0f172a;transition:background .1s}
.kp-pb:hover{background:#f1f5f9}
.kp-pb:disabled{opacity:.3;cursor:not-allowed}
.kp-pb.active{background:#dbeafe;border-color:#93c5fd;color:#1d4ed8}

/* ── Empty ── */
.kp-empty{text-align:center;padding:2.5rem;font-size:13px;font-weight:500;color:#64748b}

/* ── Modal backdrop ── */
.kp-ov{display:none;position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:9999;align-items:flex-start;justify-content:center;padding:40px 16px;overflow-y:auto}
.kp-ov.open{display:flex}
/* DIUBAH: max-width diperlebar ke 680px agar konten & tombol nav tidak perlu scroll */
.kp-mbox{background:#fff;border:0.5px solid #e2e8f0;border-radius:12px;width:100%;max-width:680px;overflow:hidden;margin:auto}

/* ── Modal top ── */
.kp-mtop{display:flex;align-items:center;justify-content:space-between;padding:14px 18px;border-bottom:0.5px solid #e2e8f0}
.kp-mtop-l{display:flex;align-items:center;gap:10px}
.kp-mav{width:38px;height:38px;border-radius:50%;background:#dbeafe;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;color:#1d4ed8;flex-shrink:0}
.kp-mname{font-size:15px;font-weight:700;color:#0f172a}
.kp-msub{font-size:12px;font-weight:500;color:#64748b;margin-top:2px}
.kp-mclose{background:none;border:none;cursor:pointer;color:#94a3b8;padding:4px;border-radius:8px;line-height:1;font-size:18px;display:flex;align-items:center;justify-content:center;transition:background .1s}
.kp-mclose:hover{color:#0f172a;background:#f1f5f9}

/* ── Modal body ── */
.kp-mbody{padding:18px}
.kp-msec{margin-bottom:18px}
.kp-msec:last-child{margin-bottom:0}
.kp-mschd{font-size:11px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.06em;margin-bottom:10px}
.kp-mgrid{display:grid;grid-template-columns:1fr 1fr;gap:8px}
.kp-mf{background:#f8fafc;border-radius:8px;padding:9px 11px}
.kp-mf .fl{font-size:11px;font-weight:500;color:#64748b;margin-bottom:3px}
.kp-mf .fv{font-size:13px;font-weight:700;color:#0f172a}
.kp-members{display:flex;flex-direction:column;gap:6px}
.kp-mem{display:flex;align-items:center;gap:9px;font-size:13px;font-weight:600;color:#334155}
.kp-memav{width:28px;height:28px;border-radius:50%;background:#dbeafe;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;color:#1d4ed8;flex-shrink:0}
.kp-ketua{font-size:11px;font-weight:500;color:#94a3b8;margin-left:2px}

/* ── File cards ── */
.kp-fcards{display:grid;grid-template-columns:1fr 1fr;gap:8px}
.kp-fc{border:0.5px solid #e2e8f0;border-radius:8px;padding:12px 13px;background:#f8fafc}
.kp-fctop{display:flex;align-items:center;gap:8px;margin-bottom:10px}
.kp-fcicon{width:32px;height:32px;border-radius:8px;background:#dbeafe;display:flex;align-items:center;justify-content:center;color:#1d4ed8;font-size:16px;flex-shrink:0}
.kp-fcname{font-size:13px;font-weight:700;color:#0f172a}
.kp-fctype{font-size:11px;font-weight:500;color:#64748b}
.kp-fc-empty .kp-fcicon{background:#f1f5f9;color:#94a3b8}
.kp-fc-empty .kp-fcname{color:#94a3b8}
.kp-fcbtns{display:flex;gap:6px}
.kp-btn-pv{display:inline-flex;align-items:center;gap:4px;padding:5px 11px;border-radius:8px;background:#dbeafe;border:0.5px solid #93c5fd;color:#1d4ed8;font-size:12px;font-weight:600;cursor:pointer;transition:opacity .15s;text-decoration:none}
.kp-btn-pv:hover{opacity:.75}
.kp-btn-dl{display:inline-flex;align-items:center;gap:4px;padding:5px 11px;border-radius:8px;background:transparent;border:0.5px solid #cbd5e1;color:#334155;font-size:12px;font-weight:600;cursor:pointer;transition:background .1s;text-decoration:none}
.kp-btn-dl:hover{background:#f1f5f9}

/* ── Modal nav ── */
.kp-mnav{display:flex;align-items:center;justify-content:space-between;padding:12px 18px;border-top:0.5px solid #e2e8f0}
.kp-mcounter{font-size:12px;font-weight:500;color:#64748b;text-align:center}
.kp-mcounter strong{font-weight:700;color:#0f172a}
.kp-btn-nav{display:inline-flex;align-items:center;gap:5px;padding:6px 14px;border-radius:8px;border:0.5px solid #cbd5e1;background:transparent;font-size:12px;font-weight:600;cursor:pointer;color:#0f172a;transition:background .1s;white-space:nowrap}
.kp-btn-nav:hover{background:#f1f5f9}
.kp-btn-nav:disabled{opacity:.3;cursor:not-allowed}
</style>
@endonce

{{-- ============================================================
     SECTION: Kelola Peserta
     Tampil saat tab aktif = 'peserta-submission'
============================================================ --}}
<div x-show="tab === 'peserta-submission'" x-cloak class="kp-wrap">

  {{-- ── Header ── --}}
  <div class="kp-hdr">
    <div>
      <h1>Kelola Peserta</h1>
      <p>Data tim peserta, proposal, dan karya</p>
    </div>
    <a href="{{ route('admin.site-settings.peserta-submission.export') }}" class="kp-btn-export">
      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 3v4a1 1 0 0 0 1 1h4"/><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"/><line x1="8" y1="17" x2="16" y2="17"/><line x1="9" y1="13" x2="10" y2="13"/><path d="M12 13v4"/></svg>
      Export Excel
    </a>
  </div>

  {{-- ── Alert session ── --}}
  @if(session('success'))
    <div class="kp-alert">
      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"/><path d="M9 12l2 2l4 -4"/></svg>
      {{ session('success') }}
    </div>
  @endif

  {{-- ── Stat cards ── --}}
  @php
    $all = $pesertaSubmissions ?? collect();
    $categories = ['PAUD','TK','SD','SMP','SMA','SMK'];
  @endphp

  <div class="kp-stats" id="kpStats">
    <div class="kp-sc" onclick="kpFilterCat('all')" id="kpStat-all">
      <div class="n">{{ $all->count() }}</div>
      <div class="l">Total</div>
    </div>
    @foreach($categories as $cat)
    <div class="kp-sc" onclick="kpFilterCat('{{ $cat }}')" id="kpStat-{{ $cat }}">
      <div class="n">{{ $all->where('kategori', $cat)->count() }}</div>
      <div class="l">{{ $cat }}</div>
    </div>
    @endforeach
  </div>

  {{-- ── Toolbar ── --}}
  <div class="kp-toolbar">
    <div class="kp-srch">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
      <input type="text" id="kpSearch" placeholder="Cari nama tim atau sekolah…" oninput="kpFilter()">
    </div>
    <select id="kpKat" onchange="kpFilter()">
      <option value="all">Semua kategori</option>
      @foreach($categories as $cat)
        <option value="{{ $cat }}">{{ $cat }}</option>
      @endforeach
    </select>
  </div>

  {{-- ── Table ── --}}
  <div class="kp-tw">
    <table>
      <colgroup>
        <col class="c0"><col class="c1"><col class="c2">
        <col class="c3"><col class="c4"><col class="c5"><col class="c6">
      </colgroup>
      <thead>
        <tr>
          <th>No.</th>
          <th>Nama tim</th>
          <th>Kategori</th>
          <th>Asal sekolah</th>
          <th>Kota</th>
          <th>Tanggal</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody id="kpTbody"></tbody>
    </table>
  </div>

  {{-- ── Pagination ── --}}
  <div class="kp-pgbar">
    <span class="kp-pginfo" id="kpPgInfo"></span>
    <div class="kp-pgbtns" id="kpPgBtns"></div>
  </div>

</div>{{-- end wrap --}}


{{-- ============================================================
     MODAL DETAIL PESERTA
============================================================ --}}
<div class="kp-ov" id="kpModal">
  <div class="kp-mbox">

    {{-- top bar --}}
    <div class="kp-mtop">
      <div class="kp-mtop-l">
        <div class="kp-mav" id="kpMAv"></div>
        <div>
          <div class="kp-mname" id="kpMName"></div>
          <div class="kp-msub" id="kpMSub"></div>
        </div>
      </div>
      <button class="kp-mclose" onclick="kpCloseModal()" aria-label="Tutup">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
    </div>

    {{-- body --}}
    <div class="kp-mbody" id="kpMBody"></div>

    {{-- nav --}}
    <div class="kp-mnav">
      <button class="kp-btn-nav" id="kpBPrev" onclick="kpNavModal(-1)">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
        Sebelumnya
      </button>
      <div class="kp-mcounter" id="kpMCounter"></div>
      <button class="kp-btn-nav" id="kpBNext" onclick="kpNavModal(1)">
        Selanjutnya
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
      </button>
    </div>

  </div>
</div>


{{-- ============================================================
     JAVASCRIPT
============================================================ --}}
<script>
(function(){

  /* ── Raw data dari Laravel ── */
  const kpRaw = @json($all);

  /* ── Konstanta ── */
  const KP_PER   = 10;
  const KP_BC    = { PAUD:'kp-bp', TK:'kp-bt', SD:'kp-bs', SMP:'kp-bm', SMA:'kp-ba', SMK:'kp-bk' };
  const KP_MONTH = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];

  /* ── State ── */
  let kpFiltered = [...kpRaw];
  let kpPage     = 1;
  let kpMIdx     = 0;

  /* ── Helpers ── */
  function kpInitials(name) {
    return (name || '').split(' ').slice(0, 2).map(w => w[0]).join('').toUpperCase();
  }

  function kpFmt(dt) {
    if (!dt) return { m: '-', t: '' };
    const d = new Date(dt);
    return {
      m: `${String(d.getDate()).padStart(2,'0')} ${KP_MONTH[d.getMonth()]} ${d.getFullYear()}`,
      t: `${String(d.getHours()).padStart(2,'0')}:${String(d.getMinutes()).padStart(2,'0')}`
    };
  }

  function kpBadge(kat) {
    const cls = KP_BC[kat] || '';
    return `<span class="kp-badge ${cls}">${kat || '-'}</span>`;
  }

  /* ── Filter ── */
  window.kpFilterCat = function(val) {
    document.getElementById('kpKat').value = val;
    kpFilter();
  };

  window.kpFilter = function() {
    const s   = (document.getElementById('kpSearch').value || '').toLowerCase();
    const kat = document.getElementById('kpKat').value;
    kpFiltered = kpRaw.filter(d =>
      (kat === 'all' || d.kategori === kat) &&
      (!s || (d.nama_tim || '').toLowerCase().includes(s) || (d.asal_sekolah || '').toLowerCase().includes(s))
    );
    kpPage = 1;
    kpRender();
  };

  /* ── Render table ── */
  function kpRender() {
    const tot   = kpFiltered.length;
    const pages = Math.max(1, Math.ceil(tot / KP_PER));
    const st    = (kpPage - 1) * KP_PER;
    const items = kpFiltered.slice(st, st + KP_PER);
    const tb    = document.getElementById('kpTbody');

    if (!items.length) {
      tb.innerHTML = `<tr><td colspan="7" class="kp-empty">Belum ada data peserta</td></tr>`;
    } else {
      tb.innerHTML = items.map((d, i) => {
        const dt = kpFmt(d.created_at);
        return `<tr>
          <td style="color:#94a3b8;font-size:12px;font-weight:500">${st + i + 1}</td>
          <td><div class="kp-tnm" title="${d.nama_tim || ''}">${d.nama_tim || '-'}</div></td>
          <td>${kpBadge(d.kategori)}</td>
          <td>${d.asal_sekolah || '-'}</td>
          <td>${d.kota_kabupaten || '-'}</td>
          <td>
            <div class="kp-date-m">${dt.m}</div>
            <div class="kp-date-t">${dt.t}</div>
          </td>
          <td>
            <button class="kp-btn-d" onclick="kpOpenModal(${d.id})">
              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
              Detail
            </button>
          </td>
        </tr>`;
      }).join('');
    }

    /* info */
    document.getElementById('kpPgInfo').textContent = tot
      ? `Menampilkan ${st + 1}–${Math.min(st + KP_PER, tot)} dari ${tot} peserta`
      : '0 peserta';

    /* pagination */
    const pb = document.getElementById('kpPgBtns');
    pb.innerHTML = '';
    const mk = (lbl, cb, dis, act) => {
      const b = document.createElement('button');
      b.className = 'kp-pb' + (act ? ' active' : '');
      b.textContent = lbl;
      b.disabled = dis;
      b.onclick = cb;
      pb.appendChild(b);
    };
    mk('←', () => { kpPage--; kpRender(); }, kpPage === 1, false);
    for (let p = 1; p <= pages; p++) {
      mk(p, ((pp) => () => { kpPage = pp; kpRender(); })(p), false, p === kpPage);
    }
    mk('→', () => { kpPage++; kpRender(); }, kpPage === pages, false);
  }

  /* ── Modal ── */
  function kpRenderModal() {
    const d = kpFiltered[kpMIdx];
    if (!d) return;

    document.getElementById('kpMAv').textContent    = kpInitials(d.nama_tim);
    document.getElementById('kpMName').textContent  = d.nama_tim || '-';
    document.getElementById('kpMSub').innerHTML     =
      `${kpBadge(d.kategori)} &nbsp;${d.asal_sekolah || ''} · ${d.kota_kabupaten || ''}`;
    document.getElementById('kpMCounter').innerHTML =
      `<strong>${kpMIdx + 1}</strong> / ${kpFiltered.length}`;
    document.getElementById('kpBPrev').disabled = kpMIdx === 0;
    document.getElementById('kpBNext').disabled = kpMIdx === kpFiltered.length - 1;

    const members = [d.anggota_1, d.anggota_2, d.anggota_3].filter(Boolean);
    const dt = kpFmt(d.created_at);

    /* file card helper */
    const fileCard = (label, path, svgPath) => {
      if (!path) return `
        <div class="kp-fc kp-fc-empty">
          <div class="kp-fctop">
            <div class="kp-fcicon">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 3v4a1 1 0 0 0 1 1h4"/><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"/><line x1="9" y1="17" x2="15" y2="17"/><line x1="9" y1="13" x2="13" y2="13"/></svg>
            </div>
            <div>
              <div class="kp-fcname">${label}</div>
              <div class="kp-fctype">Belum diupload</div>
            </div>
          </div>
        </div>`;

      const url = `/storage/${path}`;
      return `
        <div class="kp-fc">
          <div class="kp-fctop">
            <div class="kp-fcicon">${svgPath}</div>
            <div>
              <div class="kp-fcname">${label}</div>
              <div class="kp-fctype">PDF</div>
            </div>
          </div>
          <div class="kp-fcbtns">
            <a href="${url}" target="_blank" class="kp-btn-pv">
              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
              Preview
            </a>
            <a href="${url}" download class="kp-btn-dl">
              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2"/><polyline points="7 11 12 16 17 11"/><line x1="12" y1="4" x2="12" y2="16"/></svg>
              Unduh
            </a>
          </div>
        </div>`;
    };

    const iconProposal = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 3v4a1 1 0 0 0 1 1h4"/><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"/><line x1="9" y1="9" x2="10" y2="9"/><line x1="9" y1="13" x2="15" y2="13"/><line x1="9" y1="17" x2="15" y2="17"/></svg>`;
    const iconKarya    = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 3v4a1 1 0 0 0 1 1h4"/><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"/><line x1="9" y1="17" x2="15" y2="17"/><polyline points="9 13 11 15 15 11"/></svg>`;

    document.getElementById('kpMBody').innerHTML = `
      <div class="kp-msec">
        <div class="kp-mschd">Informasi tim</div>
        <div class="kp-mgrid">
          <div class="kp-mf">
            <div class="fl">Kategori</div>
            <div class="fv">${kpBadge(d.kategori)}</div>
          </div>
          <div class="kp-mf">
            <div class="fl">Kota</div>
            <div class="fv">${d.kota_kabupaten || '-'}</div>
          </div>
          <div class="kp-mf" style="grid-column:span 2">
            <div class="fl">Asal sekolah</div>
            <div class="fv">${d.asal_sekolah || '-'}</div>
          </div>
          <div class="kp-mf" style="grid-column:span 2">
            <div class="fl">Tanggal daftar</div>
            <div class="fv">${dt.m} · ${dt.t}</div>
          </div>
        </div>
      </div>

      <div class="kp-msec">
        <div class="kp-mschd">
          Anggota tim
          <span style="font-size:12px;font-weight:500;color:#94a3b8;margin-left:4px">${members.length} orang</span>
        </div>
        <div class="kp-members">
          ${members.map((m, i) => `
            <div class="kp-mem">
              <div class="kp-memav">${kpInitials(m)}</div>
              <span>${m}</span>
              ${i === 0 ? '<span class="kp-ketua">(Ketua)</span>' : ''}
            </div>`).join('')}
        </div>
      </div>

      <div class="kp-msec">
        <div class="kp-mschd">File submission</div>
        <div class="kp-fcards">
          ${fileCard('Proposal', d.proposal_file, iconProposal)}
          ${fileCard('Karya', d.karya_file, iconKarya)}
        </div>
      </div>`;
  }

  window.kpOpenModal = function(id) {
    kpMIdx = kpFiltered.findIndex(d => d.id === id);
    kpRenderModal();
    document.getElementById('kpModal').classList.add('open');
  };

  window.kpCloseModal = function() {
    document.getElementById('kpModal').classList.remove('open');
  };

  window.kpNavModal = function(dir) {
    kpMIdx = Math.max(0, Math.min(kpFiltered.length - 1, kpMIdx + dir));
    kpRenderModal();
  };

  /* close on backdrop click */
  document.getElementById('kpModal').addEventListener('click', function(e) {
    if (e.target === this) kpCloseModal();
  });

  /* close on Escape key */
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') kpCloseModal();
  });

  /* ── Init ── */
  kpFilter();

})();
</script>

      {{-- ===========================
          TAB: HOME IMAGES
      ============================ --}}
      <div x-show="tab==='homeimg'" x-cloak class="tab-content">
        <div class="card">
          <div class="card-title">Beranda – Gambar Konten</div>
          <div class="card-sub">Upload 3 gambar yang tampil di section deskripsi beranda.</div>

          <hr class="section-divider">

          <form method="POST" action="{{ route('admin.site-settings.update') }}" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            @php
              $img1 = $setting->home_image_1 ? asset('storage/'.$setting->home_image_1) : asset('image/header/gambar 1.png');
              $img2 = $setting->home_image_2 ? asset('storage/'.$setting->home_image_2) : asset('image/header/gambar 2.jpg');
              $img3 = $setting->home_image_3 ? asset('storage/'.$setting->home_image_3) : asset('image/header/gambar 3.png');
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
              {{-- Gambar 1 --}}
              <div class="rounded-xl border border-slate-200 p-4 space-y-3">
                <div>
                  <div class="font-bold text-sm text-slate-900">Gambar 1</div>
                  <div class="text-xs text-slate-400">Rasio 4:3 · kartu kecil kiri atas</div>
                </div>
                <label class="flex items-center gap-2 w-full border border-dashed border-slate-200 rounded-lg px-3 py-2.5 cursor-pointer hover:border-[#0072BC] hover:bg-blue-50/20 transition-colors text-sm text-slate-500">
                  <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/></svg>
                  Pilih gambar
                  <input type="file" name="home_image_1" id="home_image_1" class="hidden" accept="image/*">
                </label>
                <div class="overflow-hidden rounded-xl border border-slate-200">
                  <img id="preview_home_1" src="{{ $img1 }}" class="w-full object-cover aspect-[4/3]">
                </div>
              </div>

              {{-- Gambar 2 --}}
              <div class="rounded-xl border border-slate-200 p-4 space-y-3">
                <div>
                  <div class="font-bold text-sm text-slate-900">Gambar 2</div>
                  <div class="text-xs text-slate-400">Rasio 4:3 · kartu kecil kanan atas</div>
                </div>
                <label class="flex items-center gap-2 w-full border border-dashed border-slate-200 rounded-lg px-3 py-2.5 cursor-pointer hover:border-[#0072BC] hover:bg-blue-50/20 transition-colors text-sm text-slate-500">
                  <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/></svg>
                  Pilih gambar
                  <input type="file" name="home_image_2" id="home_image_2" class="hidden" accept="image/*">
                </label>
                <div class="overflow-hidden rounded-xl border border-slate-200">
                  <img id="preview_home_2" src="{{ $img2 }}" class="w-full object-cover aspect-[4/3]">
                </div>
              </div>

              {{-- Gambar 3 --}}
              <div class="md:col-span-2 rounded-xl border border-slate-200 p-4 space-y-3">
                <div>
                  <div class="font-bold text-sm text-slate-900">Gambar 3</div>
                  <div class="text-xs text-slate-400">Rasio 16:7 · gambar panjang bawah</div>
                </div>
                <label class="flex items-center gap-2 w-full border border-dashed border-slate-200 rounded-lg px-3 py-2.5 cursor-pointer hover:border-[#0072BC] hover:bg-blue-50/20 transition-colors text-sm text-slate-500">
                  <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/></svg>
                  Pilih gambar
                  <input type="file" name="home_image_3" id="home_image_3" class="hidden" accept="image/*">
                </label>
                <div class="overflow-hidden rounded-xl border border-slate-200">
                  <img id="preview_home_3" src="{{ $img3 }}" class="w-full object-cover aspect-[16/7]">
                </div>
              </div>
            </div>

            <div class="pt-1">
              <button type="submit" class="btn-primary">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Simpan Gambar Beranda
              </button>
            </div>
          </form>
        </div>
      </div>

     
    {{-- =========================== 
    TAB: INFORMASI PENTING
    ============================ --}}
<div x-show="tab==='informasi-penting'" x-cloak class="rounded-2xl border border-slate-200 bg-white shadow-sm p-6">
  @php
    $informasiPentingItems = $informasiPentingItems ?? collect();

    $usedSortOrders = $informasiPentingItems
        ->pluck('sort_order')
        ->filter(fn ($value) => $value !== null && $value !== '')
        ->map(fn ($value) => (int) $value)
        ->filter(fn ($value) => $value >= 1)
        ->unique()
        ->sort()
        ->values();

    $maxUsedSortOrder = (int) ($usedSortOrders->max() ?? 0);
    $maxSortOption = max($maxUsedSortOrder, $informasiPentingItems->count(), 1) + 5;
  @endphp

  <div>
    <h2 class="text-xl font-extrabold text-slate-900">Informasi Penting</h2>
    <p class="mt-1 text-sm text-slate-600">Kelola konten informasi penting yang tampil di beranda.</p>
  </div>

  {{-- FORM TAMBAH --}}
  <div class="mt-8 rounded-2xl border border-slate-200 bg-slate-50 p-5">
    <h3 class="text-lg font-extrabold text-slate-900">Tambah Informasi Penting</h3>

    <form action="{{ route('admin.site-settings.informasi-penting.store') }}" method="POST" class="mt-4 space-y-4">
      @csrf

      @php
        $firstAvailableSortOrder = null;
        for ($i = 1; $i <= $maxSortOption; $i++) {
            if (! $usedSortOrders->contains($i)) {
                $firstAvailableSortOrder = $i;
                break;
            }
        }

        $selectedCreateSortOrder = old('sort_order', $firstAvailableSortOrder);
      @endphp

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-bold mb-1">Urutan</label>
          <select name="sort_order" class="w-full border rounded-xl px-4 py-3" required>
            @for ($i = 1; $i <= $maxSortOption; $i++)
              @php
                $isUsed = $usedSortOrders->contains($i);
              @endphp

              <option
                value="{{ $i }}"
                {{ $isUsed ? 'disabled' : '' }}
                {{ (string) $selectedCreateSortOrder === (string) $i && ! $isUsed ? 'selected' : '' }}
              >
                {{ $i }}{{ $isUsed ? ' (used)' : '' }}
              </option>
            @endfor
          </select>
        </div>

        <div class="flex items-end">
          <label class="inline-flex items-center gap-2">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }} class="w-4 h-4">
            <span class="text-sm">Aktif</span>
          </label>
        </div>
      </div>

      <div>
        <label class="block text-sm font-bold mb-1">Isi Informasi</label>
        <textarea name="content" class="w-full border rounded-xl px-4 py-3 min-h-[120px]" required>{{ old('content') }}</textarea>
      </div>

      <div>
        <button type="submit" class="px-5 py-2.5 rounded-full text-white font-extrabold"
          style="background-color:#0072BC;"
          onmouseover="this.style.backgroundColor='#005fa3'"
          onmouseout="this.style.backgroundColor='#0072BC'">
          Tambah Informasi
        </button>
      </div>
    </form>
  </div>

  {{-- LIST DATA --}}
  <div class="mt-8 space-y-4">
    @forelse($informasiPentingItems as $item)
      @php
        $currentSortOrder = (int) $item->sort_order;
        $selectedEditSortOrder = old('sort_order', $currentSortOrder);
      @endphp

      <div class="rounded-xl border border-slate-200 p-4 bg-white">
        <form action="{{ route('admin.site-settings.informasi-penting.update', $item->id) }}" method="POST" class="space-y-3">
          @csrf
          @method('PUT')

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-xs font-bold mb-1">Urutan</label>
              <select name="sort_order" class="w-full border rounded-xl px-4 py-3" required>
                @for ($i = 1; $i <= $maxSortOption; $i++)
                  @php
                    $isUsedByOtherItem = $usedSortOrders->contains($i) && $i !== $currentSortOrder;
                  @endphp

                  <option
                    value="{{ $i }}"
                    {{ $isUsedByOtherItem ? 'disabled' : '' }}
                    {{ (string) $selectedEditSortOrder === (string) $i ? 'selected' : '' }}
                  >
                    {{ $i }}{{ $isUsedByOtherItem ? ' (used)' : '' }}
                  </option>
                @endfor
              </select>
            </div>

            <div class="flex items-end">
              <label class="inline-flex items-center gap-2">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $item->is_active) ? 'checked' : '' }} class="w-4 h-4">
                <span class="text-sm">Aktif</span>
              </label>
            </div>
          </div>

          <div>
            <label class="block text-xs font-bold mb-1">Isi Informasi</label>
            <textarea name="content" class="w-full border rounded-xl px-4 py-3 min-h-[120px]" required>{{ old('content', $item->content) }}</textarea>
          </div>

          <div class="flex justify-end gap-2">
            <button type="submit" class="px-4 py-2 rounded-xl bg-slate-900 text-white text-sm font-bold">
              Simpan
            </button>
        </form>

            <form action="{{ route('admin.site-settings.informasi-penting.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus informasi ini?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="px-4 py-2 rounded-xl bg-red-600 text-white text-sm font-bold">
                Hapus
              </button>
            </form>
          </div>
      </div>
    @empty
      <div class="text-sm text-slate-500">Belum ada data informasi penting.</div>
    @endforelse
  </div>
</div>


    {{-- ===========================
      TAB: YOUTUBE
============================ --}}
<div x-show="tab==='youtube'" x-cloak class="tab-content">
  <div class="card">
    <div class="card-title">Beranda – YouTube</div>
    <div class="card-sub">2 link video YouTube untuk ditampilkan di beranda.</div>

    <hr class="section-divider">

    <form method="POST" action="{{ route('admin.site-settings.update') }}">
      @csrf
      @method('PUT')

      <div class="grid md:grid-cols-2 gap-6">

        <!-- Video 1 -->
        <div>
          <label class="block text-sm font-semibold mb-2">
            YouTube Video 1
          </label>

          <input
            type="text"
            name="youtube_url_1"
            value="{{ old('youtube_url_1', $setting->youtube_url_1 ?? '') }}"
            placeholder="https://www.youtube.com/watch?v=..."
            class="w-full border border-slate-300 rounded-lg px-4 py-3"
          >

          <p class="text-xs text-slate-500 mt-1">
            Masukkan link YouTube video pertama
          </p>
        </div>

        <!-- Video 2 -->
        <div>
          <label class="block text-sm font-semibold mb-2">
            YouTube Video 2
          </label>

          <input
            type="text"
            name="youtube_url_2"
            value="{{ old('youtube_url_2', $setting->youtube_url_2 ?? '') }}"
            placeholder="https://www.youtube.com/watch?v=..."
            class="w-full border border-slate-300 rounded-lg px-4 py-3"
          >

          <p class="text-xs text-slate-500 mt-1">
            Masukkan link YouTube video kedua
          </p>
        </div>

      </div>

      <div class="mt-6">
        <button
          type="submit"
          class="px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition"
        >
          Simpan
        </button>
      </div>

    </form>
  </div>
</div>



{{-- ============================================================
     NEWS MANAGEMENT (FIXED + USED LABEL)
     ============================================================ --}}

<div x-show="tab==='news'" x-cloak class="tab-content bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">

  {{-- HEADER --}}
  <div class="flex items-center justify-between mb-6">
    <div>
      <h2 class="text-lg font-bold text-slate-800">Manajemen Berita</h2>
      <p class="text-sm text-slate-400">Kelola berita yang tampil di halaman utama</p>
    </div>
  </div>

  {{-- DATA --}}
  @php
    $newsAdmin = $news ?? collect();
    $usedOrders = $newsAdmin->pluck('sort_order')->filter()->toArray();
  @endphp

  {{-- FORM TAMBAH --}}
  <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 mb-8">
    @csrf

    <div class="grid md:grid-cols-2 gap-4">

      <div>
        <label class="field-label">Judul</label>
        <input type="text" name="title" class="field-input" required>
      </div>

      <div>
        <label class="field-label">Kategori</label>
        <select name="category" class="field-input">
          <option value="">-- Pilih --</option>
          @foreach(['Pengumuman','Kegiatan','Update','Tips','Info'] as $cat)
            <option value="{{ $cat }}">{{ $cat }}</option>
          @endforeach
        </select>
      </div>

    </div>

    <div>
      <label class="field-label">Excerpt</label>
      <textarea name="excerpt" class="field-input min-h-[80px]" required></textarea>
    </div>

    <div class="grid md:grid-cols-2 gap-4">

      <div>
        <label class="field-label">Link</label>
        <input type="url" name="source_url" class="field-input">
      </div>

      <div>
        <label class="field-label">Tanggal</label>
        <input type="date" name="published_at" class="field-input">
      </div>

    </div>

    {{-- 🔥 SORT ORDER + USED LABEL --}}
    <div>
      <label class="field-label">Nomor Urutan</label>
      <select name="sort_order" class="field-input">
        <option value="">-- Pilih Urutan --</option>
        @for($i=1; $i<=10; $i++)
          <option value="{{ $i }}">
            {{ $i }} {{ in_array($i, $usedOrders) ? '(USED)' : '' }}
          </option>
        @endfor
      </select>
    </div>

    <div>
      <label class="field-label">Gambar</label>
      <input type="file" name="image" class="field-input">
    </div>

    <div class="flex gap-5">
      <label><input type="checkbox" name="is_active" value="1" checked> Aktif</label>
      <label><input type="checkbox" name="is_featured" value="1"> Featured</label>
    </div>

    <button type="submit" class="btn-primary">+ Tambah Berita</button>

  </form>

  {{-- LIST --}}
  <div class="space-y-4">

    @forelse($newsAdmin->sortByDesc('is_featured')->sortBy('sort_order') as $item)

    <div class="news-item-card" x-data="{ edit:false }">

      {{-- VIEW --}}
      <div x-show="!edit" class="p-4 flex justify-between items-start">

        <div class="flex-1">
          <div class="flex items-center gap-2 mb-1">

            @if($item->category)
            <span class="news-badge-preview">{{ $item->category }}</span>
            @endif

            @if($item->is_featured)
            <span class="text-amber-500 text-xs font-bold">★ Featured</span>
            @endif

            {{-- 🔥 NOMOR --}}
            @if($item->sort_order)
            <span class="text-xs text-blue-600 font-semibold">
              #{{ $item->sort_order }}
            </span>
            @endif

          </div>

          <h3 class="font-semibold text-slate-800 text-sm">
            {{ $item->title }}
          </h3>

          <p class="text-xs text-slate-500 mt-1 line-clamp-2">
            {{ $item->excerpt }}
          </p>

          <div class="text-xs text-slate-400 mt-2">
            {{ $item->published_at ? \Carbon\Carbon::parse($item->published_at)->format('d M Y') : '-' }}
          </div>
        </div>

        <div class="flex gap-2 ml-4">
          <button @click="edit=true" class="btn-edit">Edit</button>
        </div>

      </div>

      {{-- EDIT --}}
      <div x-show="edit" class="news-item-body">

        <form action="{{ route('admin.news.update',$item->id) }}" method="POST" enctype="multipart/form-data" class="space-y-3">
          @csrf
          @method('PUT')

          <input type="text" name="title" value="{{ $item->title }}" class="field-input">
          <textarea name="excerpt" class="field-input">{{ $item->excerpt }}</textarea>

          {{-- 🔥 EDIT SORT --}}
          <select name="sort_order" class="field-input">
            @for($i=1; $i<=10; $i++)
              <option value="{{ $i }}" {{ $item->sort_order == $i ? 'selected' : '' }}>
                {{ $i }} {{ in_array($i, $usedOrders) && $item->sort_order != $i ? '(USED)' : '' }}
              </option>
            @endfor
          </select>

          <div class="flex gap-4">
            <label><input type="checkbox" name="is_active" value="1" {{ $item->is_active?'checked':'' }}> Aktif</label>
            <label><input type="checkbox" name="is_featured" value="1" {{ $item->is_featured?'checked':'' }}> Featured</label>
          </div>

          <div class="flex gap-2">
            <button type="button" @click="edit=false" class="btn-ghost">Batal</button>
            <button type="submit" class="btn-primary">Simpan</button>
          </div>

        </form>

        {{-- DELETE --}}
        <form action="{{ route('admin.news.destroy',$item->id) }}" method="POST" class="mt-2"
              onsubmit="return confirm('Hapus berita ini?')">
          @csrf
          @method('DELETE')
          <button class="btn-danger">Hapus</button>
        </form>

      </div>

    </div>

    @empty
      <div class="text-center text-slate-400 py-10">
        Belum ada berita
      </div>
    @endforelse

  </div>

</div>


    {{-- ===========================
    TAB: TIMELINE
============================ --}}
@php
  $timelineItems = $timelineItems ?? collect();

  $usedTimelineSortOrders = $timelineItems
      ->pluck('sort_order')
      ->filter(fn ($value) => $value !== null && $value !== '')
      ->map(fn ($value) => (int) $value)
      ->filter(fn ($value) => $value >= 1)
      ->unique()
      ->sort()
      ->values();

  $timelineMaxSortOption = max((int) ($usedTimelineSortOrders->max() ?? 0), $timelineItems->count(), 1) + 5;

  $timelineFirstAvailableSortOrder = 1;
  for ($i = 1; $i <= $timelineMaxSortOption; $i++) {
      if (! $usedTimelineSortOrders->contains($i)) {
          $timelineFirstAvailableSortOrder = $i;
          break;
      }
  }
@endphp

<div x-show="tab==='timeline'" x-cloak class="tab-content">
  <div class="card">

    {{-- ===== HEADER ===== --}}
    <div class="flex items-start justify-between gap-4 flex-wrap">
      <div>
        <div class="card-title">Timeline</div>
        <div class="card-sub">Kelola tahapan timeline yang tampil di beranda.</div>
      </div>
      <div class="text-xs text-slate-400">
        <span class="font-bold text-slate-700">{{ $timelineItems->count() }}</span> tahapan
      </div>
    </div>

    <hr class="section-divider">

    {{-- ===== FORM TAMBAH ===== --}}
    <div class="add-form-box mb-6">
      <div class="font-bold text-sm text-slate-900 mb-4">+ Tambah Timeline</div>
      <form action="{{ route('admin.site-settings.timeline.store') }}" method="POST" class="space-y-4">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="field-label">Judul</label>
            <input type="text" name="title" value="{{ old('title') }}" class="field-input" placeholder="Contoh: Pendaftaran Dibuka" required>
          </div>
          <div>
            <label class="field-label">Tanggal</label>
            <input type="text" name="date_label" value="{{ old('date_label') }}" class="field-input" placeholder="Contoh: 18 Nov 2025" required>
          </div>
        </div>

        <div>
          <label class="field-label">Deskripsi (opsional)</label>
          <textarea name="description" class="field-input min-h-[80px]" placeholder="Deskripsi singkat tahapan...">{{ old('description') }}</textarea>
        </div>

        <div class="flex items-center justify-between">
          <div class="flex items-center gap-4">
            <div class="w-32">
              <label class="field-label">Urutan</label>
              <select name="sort_order" class="field-input" required>
                @for ($i = 1; $i <= $timelineMaxSortOption; $i++)
                  @php $isUsed = $usedTimelineSortOrders->contains($i); @endphp
                  <option
                    value="{{ $i }}"
                    {{ $isUsed ? 'disabled' : '' }}
                    {{ (string) old('sort_order', $timelineFirstAvailableSortOrder) === (string) $i && ! $isUsed ? 'selected' : '' }}
                  >
                    {{ $i }}{{ $isUsed ? ' (used)' : '' }}
                  </option>
                @endfor
              </select>
            </div>

            <label class="inline-flex items-center gap-2 mt-5 cursor-pointer">
              <input type="checkbox" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }} class="w-4 h-4 accent-[#0072BC]">
              <span class="text-sm font-medium text-slate-700">Aktif</span>
            </label>
          </div>

          <button type="submit" class="btn-primary mt-5">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah
          </button>
        </div>
      </form>
    </div>

    {{-- ===== LIST TIMELINE ===== --}}
    <div class="space-y-2.5">
      @forelse($timelineItems->sortBy('sort_order') as $item)
        @php
          $currentSortOrder = (int) $item->sort_order;
        @endphp

        <div class="item-row" x-data="{ editing: false }">

          {{-- VIEW MODE --}}
          <div x-show="!editing">
            <div class="item-row-head">
              <span class="step-bubble shrink-0">{{ $item->sort_order }}</span>
              <div class="flex-1 min-w-0">
                <span class="font-bold text-sm text-slate-900">{{ $item->title }}</span>
                <span class="ml-2 text-xs text-slate-400 font-medium">· {{ $item->date_label }}</span>
              </div>
              <span class="badge {{ $item->is_active ? 'badge-active' : 'badge-inactive' }}">
                {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
              </span>
              <button type="button" class="btn-edit"
                style="padding:0.3rem 0.7rem;font-size:0.74rem;"
                @click="editing = true">Edit</button>
            </div>

            @if($item->description)
              <div class="px-4 py-2.5 text-xs text-slate-500 leading-relaxed bg-slate-50/60 border-t border-slate-100 line-clamp-2">
                {{ $item->description }}
              </div>
            @endif
          </div>

          {{-- EDIT MODE --}}
          <div x-show="editing" class="item-row-body">
            <form action="{{ route('admin.site-settings.timeline.update', $item->id) }}" method="POST" class="space-y-3">
              @csrf
              @method('PUT')

              <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <div>
                  <label class="field-label">Judul</label>
                  <input type="text" name="title" value="{{ $item->title }}" class="field-input" required>
                </div>
                <div>
                  <label class="field-label">Tanggal</label>
                  <input type="text" name="date_label" value="{{ $item->date_label }}" class="field-input" required>
                </div>
              </div>

              <div>
                <label class="field-label">Deskripsi</label>
                <textarea name="description" class="field-input min-h-[75px]">{{ $item->description }}</textarea>
              </div>

              <div class="flex items-center gap-3">
                <div class="w-32">
                  <label class="field-label">Urutan</label>
                  <select name="sort_order" class="field-input" required>
                    @for ($i = 1; $i <= $timelineMaxSortOption; $i++)
                      @php $isUsedByOther = $usedTimelineSortOrders->contains($i) && $i !== $currentSortOrder; @endphp
                      <option
                        value="{{ $i }}"
                        {{ $isUsedByOther ? 'disabled' : '' }}
                        {{ (string) $currentSortOrder === (string) $i ? 'selected' : '' }}
                      >
                        {{ $i }}{{ $isUsedByOther ? ' (used)' : '' }}
                      </option>
                    @endfor
                  </select>
                </div>

                <label class="inline-flex items-center gap-2 mt-5 cursor-pointer">
                  <input type="checkbox" name="is_active" value="1" {{ $item->is_active ? 'checked' : '' }} class="w-4 h-4 accent-[#0072BC]">
                  <span class="text-sm font-medium text-slate-700">Aktif</span>
                </label>

                <div class="ml-auto mt-5 flex gap-2">
                  <button type="button" class="btn-ghost"
                    style="padding:0.35rem 0.8rem;font-size:0.78rem;"
                    @click="editing = false">Batal</button>
                  <button type="submit" class="btn-primary"
                    style="padding:0.35rem 0.8rem;font-size:0.78rem;">Simpan</button>
                </div>
              </div>
            </form>

            <form action="{{ route('admin.site-settings.timeline.destroy', $item->id) }}" method="POST"
                  onsubmit="return confirm('Hapus timeline ini?')" class="mt-2.5">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn-danger">Hapus</button>
            </form>
          </div>

        </div>
      @empty
        <div class="empty-state">
          <svg class="w-9 h-9 text-slate-200 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
          </svg>
          <div class="text-sm font-medium text-slate-500">Belum ada timeline</div>
          <div class="text-xs text-slate-400 mt-1">Isi form di atas untuk menambahkan tahapan pertama</div>
        </div>
      @endforelse
    </div>

  </div>
</div>

    
{{-- ===========================
    TAB: FAQ
============================ --}}
@php
  $groupedFaqs = ($faqs ?? collect())->groupBy('category');
@endphp

<div x-show="tab==='faq'" x-cloak class="tab-content"
     x-data="{
       faqView: '',
       activeCategory: '',
       form: { category:'', question:'', answer:'', sort_order:1, is_active:true }
     }">

  <div class="card">

    {{-- ===== DYNAMIC HEADER ===== --}}
    <div class="flex items-center gap-3 mb-1">
      <button type="button"
        x-show="faqView !== ''"
        x-cloak
        class="back-btn"
        @click="faqView = ''; activeCategory = ''">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
        </svg>
        Kembali
      </button>
      <div>
        <div class="card-title"
          x-text="faqView === '' ? 'FAQ' : (faqView === 'add_cat' ? 'Tambah Kategori Baru' : 'FAQ – ' + activeCategory)">
        </div>
        <div class="card-sub"
          x-text="faqView === '' ? 'Pilih kategori untuk kelola pertanyaan & jawaban.' : (faqView === 'add_cat' ? 'Buat kategori FAQ baru.' : 'Kelola pertanyaan & jawaban di kategori ini.')">
        </div>
      </div>
    </div>

    <hr class="section-divider">

    {{-- ===== LANDING: GRID KATEGORI ===== --}}
    <div x-show="faqView === ''" class="lomba-fade">

      @if($groupedFaqs->isNotEmpty())
        <div class="text-xs text-slate-400 mb-4">
          <span class="font-bold text-slate-700">{{ $groupedFaqs->count() }}</span> kategori ·
          <span class="font-bold text-slate-700">{{ ($faqs ?? collect())->count() }}</span> total FAQ
        </div>
      @endif

      <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
        @forelse($groupedFaqs as $category => $items)
          <button type="button"
            class="flex flex-col items-center justify-center gap-2 rounded-xl border-2 border-slate-200 bg-white p-4 text-center hover:border-[#0072BC] hover:bg-blue-50/30 transition-all group"
            @click="faqView = 'list'; activeCategory = @js($category)">
            <div class="w-10 h-10 rounded-xl bg-slate-100 group-hover:bg-[#0072BC] flex items-center justify-center transition-colors">
              <svg class="w-5 h-5 text-slate-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
            </div>
            <div class="font-bold text-xs text-slate-800 group-hover:text-[#0072BC] transition-colors leading-tight">{{ $category }}</div>
            <div class="text-[10px] text-slate-400">{{ $items->count() }} pertanyaan</div>
          </button>
        @empty
          <div class="col-span-full">
            <div class="empty-state">
              <svg class="w-9 h-9 text-slate-200 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
              <div class="text-sm font-medium text-slate-500">Belum ada kategori FAQ</div>
              <div class="text-xs text-slate-400 mt-1">Mulai dengan tambah kategori baru</div>
            </div>
          </div>
        @endforelse

        <button type="button"
          class="flex flex-col items-center justify-center gap-2 rounded-xl border-2 border-dashed border-slate-200 bg-slate-50 p-4 text-center hover:border-[#0072BC] hover:bg-blue-50/20 transition-all group"
          @click="faqView = 'add_cat'">
          <div class="w-10 h-10 rounded-xl bg-white border border-slate-200 group-hover:bg-[#0072BC] flex items-center justify-center transition-colors">
            <svg class="w-5 h-5 text-slate-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
            </svg>
          </div>
          <div class="font-bold text-xs text-slate-500 group-hover:text-[#0072BC] transition-colors">Tambah Kategori</div>
        </button>
      </div>
    </div>

    {{-- ===== TAMBAH KATEGORI (FAQ BARU) ===== --}}
    <div x-show="faqView === 'add_cat'" x-cloak class="lomba-fade">
      <div class="add-form-box">
        <div class="font-bold text-sm text-slate-900 mb-3">+ FAQ dengan Kategori Baru</div>
        <form action="{{ route('admin.site-settings.faqs.store') }}" method="POST" class="space-y-4">
          @csrf

          @php
            $newCategoryMaxSortOption = 6;
          @endphp

          <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="md:col-span-2">
              <label class="field-label">Nama Kategori Baru</label>
              <input name="category" class="field-input" placeholder="Contoh: Pendaftaran, Teknis, Hadiah..." required>
            </div>
            <div>
              <label class="field-label">Urutan</label>
              <select name="sort_order" class="field-input" required>
                @for ($i = 1; $i <= $newCategoryMaxSortOption; $i++)
                  <option value="{{ $i }}" {{ $i === 1 ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
              </select>
            </div>
          </div>

          <div>
            <label class="field-label">Pertanyaan Pertama</label>
            <input name="question" class="field-input" placeholder="Tulis pertanyaan..." required>
          </div>

          <div>
            <label class="field-label">Jawaban</label>
            <textarea name="answer" class="field-input min-h-[100px]" placeholder="Tulis jawaban lengkap..." required></textarea>
          </div>

          <div class="flex items-center justify-between">
            <label class="inline-flex items-center gap-2 cursor-pointer">
              <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 accent-[#0072BC]">
              <span class="text-sm font-medium text-slate-700">Aktif</span>
            </label>
            <button type="submit" class="btn-primary">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
              </svg>
              Buat Kategori & Simpan
            </button>
          </div>
        </form>
      </div>
    </div>

    {{-- ===== LIST FAQ PER KATEGORI ===== --}}
    <div x-show="faqView === 'list'" x-cloak class="lomba-fade space-y-5">
      @foreach($groupedFaqs as $category => $items)
        @php
          $items = $items->sortBy('sort_order')->values();

          $usedFaqSortOrders = $items
              ->pluck('sort_order')
              ->filter(fn ($value) => $value !== null && $value !== '')
              ->map(fn ($value) => (int) $value)
              ->filter(fn ($value) => $value >= 1)
              ->unique()
              ->sort()
              ->values();

          $faqMaxSortOption = max((int) ($usedFaqSortOrders->max() ?? 0), $items->count(), 1) + 5;

          $faqFirstAvailableSortOrder = 1;
          for ($i = 1; $i <= $faqMaxSortOption; $i++) {
              if (! $usedFaqSortOrders->contains($i)) {
                  $faqFirstAvailableSortOrder = $i;
                  break;
              }
          }
        @endphp

        <div x-show="activeCategory === @js($category)">
          <div class="add-form-box mb-5">
            <div class="font-bold text-sm text-slate-900 mb-3">+ Tambah Pertanyaan</div>
            <form action="{{ route('admin.site-settings.faqs.store') }}" method="POST" class="space-y-4">
              @csrf
              <input type="hidden" name="category" value="{{ $category }}">

              <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="md:col-span-3">
                  <label class="field-label">Pertanyaan</label>
                  <input name="question" class="field-input" placeholder="Tulis pertanyaan baru..." required>
                </div>
                <div>
                  <label class="field-label">Urutan</label>
                  <select name="sort_order" class="field-input" required>
                    @for ($i = 1; $i <= $faqMaxSortOption; $i++)
                      @php $isUsed = $usedFaqSortOrders->contains($i); @endphp
                      <option
                        value="{{ $i }}"
                        {{ $isUsed ? 'disabled' : '' }}
                        {{ (string) $faqFirstAvailableSortOrder === (string) $i && ! $isUsed ? 'selected' : '' }}
                      >
                        {{ $i }}{{ $isUsed ? ' (used)' : '' }}
                      </option>
                    @endfor
                  </select>
                </div>
              </div>

              <div>
                <label class="field-label">Jawaban</label>
                <textarea name="answer" class="field-input min-h-[90px]" placeholder="Tulis jawaban..." required></textarea>
              </div>

              <div class="flex items-center justify-between">
                <label class="inline-flex items-center gap-2 cursor-pointer">
                  <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 accent-[#0072BC]">
                  <span class="text-sm font-medium text-slate-700">Aktif</span>
                </label>
                <button type="submit" class="btn-primary">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                  </svg>
                  Tambah
                </button>
              </div>
            </form>
          </div>

          <div class="text-xs text-slate-400 mb-3">
            <span class="font-bold text-slate-700">{{ $items->count() }}</span> pertanyaan di kategori ini
          </div>

          <div class="space-y-2.5">
            @forelse($items as $faq)
              @php
                $currentSortOrder = (int) $faq->sort_order;
              @endphp

              <div class="item-row" x-data="{ editing: false }">
                {{-- View mode --}}
                <div x-show="!editing">
                  <div class="item-row-head">
                    <span class="text-xs font-black text-slate-400">No.{{ $faq->sort_order }}</span>
                    <span class="font-semibold text-sm text-slate-800 truncate flex-1">{{ $faq->question }}</span>
                    <span class="badge {{ $faq->is_active ? 'badge-active' : 'badge-inactive' }}">
                      {{ $faq->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                    <button type="button" class="btn-edit" style="padding:0.3rem 0.7rem;font-size:0.74rem;"
                      @click="editing = true">Edit</button>
                  </div>
                  <div class="px-4 py-3 text-xs text-slate-500 leading-relaxed bg-slate-50/50 line-clamp-2">
                    {{ $faq->answer }}
                  </div>
                </div>

                {{-- Edit mode --}}
                <div x-show="editing" class="item-row-body">
                  <form action="{{ route('admin.site-settings.faqs.update', $faq->id) }}" method="POST" class="space-y-3">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="category" value="{{ $faq->category }}">

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
                      <div class="md:col-span-3">
                        <label class="field-label">Pertanyaan</label>
                        <input name="question" value="{{ $faq->question }}" class="field-input" required>
                      </div>
                      <div>
                        <label class="field-label">Urutan</label>
                        <select name="sort_order" class="field-input" required>
                          @for ($i = 1; $i <= $faqMaxSortOption; $i++)
                            @php $isUsedByOther = $usedFaqSortOrders->contains($i) && $i !== $currentSortOrder; @endphp
                            <option
                              value="{{ $i }}"
                              {{ $isUsedByOther ? 'disabled' : '' }}
                              {{ (string) $currentSortOrder === (string) $i ? 'selected' : '' }}
                            >
                              {{ $i }}{{ $isUsedByOther ? ' (used)' : '' }}
                            </option>
                          @endfor
                        </select>
                      </div>
                    </div>

                    <div>
                      <label class="field-label">Jawaban</label>
                      <textarea name="answer" class="field-input min-h-[90px]" required>{{ $faq->answer }}</textarea>
                    </div>

                    <div class="flex items-center gap-3">
                      <label class="inline-flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ $faq->is_active ? 'checked' : '' }} class="w-4 h-4 accent-[#0072BC]">
                        <span class="text-sm font-medium text-slate-700">Aktif</span>
                      </label>
                      <div class="ml-auto flex gap-2">
                        <button type="button" class="btn-ghost" style="padding:0.35rem 0.8rem;font-size:0.78rem;"
                          @click="editing = false">Batal</button>
                        <button type="submit" class="btn-primary" style="padding:0.35rem 0.8rem;font-size:0.78rem;">Simpan</button>
                      </div>
                    </div>
                  </form>

                  <form action="{{ route('admin.site-settings.faqs.destroy', $faq->id) }}" method="POST"
                        onsubmit="return confirm('Hapus FAQ ini?')" class="mt-2.5">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-danger">Hapus</button>
                  </form>
                </div>
              </div>
            @empty
              <div class="empty-state">
                <div class="text-sm font-medium text-slate-500">Belum ada pertanyaan di kategori ini</div>
              </div>
            @endforelse
          </div>
        </div>
      @endforeach
    </div>

  </div>
</div>

{{-- ===========================
    TAB: LOMBA
============================ --}}

<style>
  .lomba-fade {
    animation: lombaFadeIn 0.2s ease both;
  }
  @keyframes lombaFadeIn {
    from { opacity: 0; transform: translateY(8px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  .sub-pill {
    display: inline-flex;
    align-items: center;
    padding: 0.35rem 1rem;
    border-radius: 99px;
    font-size: 0.78rem;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.15s;
    border: 1.5px solid transparent;
  }
  .sub-pill-active {
    background: #0072BC;
    color: #fff;
    border-color: #0072BC;
    box-shadow: 0 2px 8px rgba(0,114,188,0.25);
  }
  .sub-pill-inactive {
    background: #f8fafc;
    color: #64748b;
    border-color: #e2e8f0;
  }
  .sub-pill-inactive:hover {
    border-color: #0072BC;
    color: #0072BC;
    background: #eff8ff;
  }

  .lomba-nav-card {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.25rem 1.5rem;
    border-radius: 1rem;
    border: 1.5px solid #e2e8f0;
    background: #fff;
    cursor: pointer;
    transition: all 0.18s;
    text-align: left;
    width: 100%;
  }
  .lomba-nav-card:hover {
    border-color: #0072BC;
    background: #f0f8ff;
    box-shadow: 0 4px 16px rgba(0,114,188,0.1);
    transform: translateY(-1px);
  }
  .lomba-nav-card:hover .lnc-icon {
    background: #0072BC;
    color: #fff;
  }
  .lomba-nav-card:hover .lnc-arrow {
    color: #0072BC;
    transform: translateX(3px);
  }
  .lnc-icon {
    flex-shrink: 0;
    width: 2.75rem;
    height: 2.75rem;
    border-radius: 0.75rem;
    background: #f1f5f9;
    color: #94a3b8;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.18s;
  }
  .lnc-arrow {
    margin-left: auto;
    color: #cbd5e1;
    transition: all 0.18s;
    flex-shrink: 0;
  }

  .back-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    font-size: 0.8rem;
    font-weight: 700;
    color: #94a3b8;
    cursor: pointer;
    padding: 0.4rem 0.75rem;
    border-radius: 0.5rem;
    border: 1.5px solid #e2e8f0;
    background: #f8fafc;
    transition: all 0.15s;
  }
  .back-btn:hover {
    color: #0072BC;
    border-color: #0072BC;
    background: #eff8ff;
  }

  .section-header-strip {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    padding-bottom: 1rem;
    margin-bottom: 1.25rem;
    border-bottom: 1.5px solid #f1f5f9;
    flex-wrap: wrap;
  }

  .add-form-box {
    background: linear-gradient(135deg, #f8fafc 0%, #f0f7ff 100%);
    border: 1.5px solid #e2e8f0;
    border-radius: 1rem;
    padding: 1.25rem;
    margin-bottom: 1.25rem;
  }

  .item-row {
    border: 1.5px solid #e2e8f0;
    border-radius: 0.875rem;
    background: #fff;
    overflow: hidden;
    transition: box-shadow 0.15s;
  }
  .item-row:hover {
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
  }
  .item-row-head {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.65rem 1rem;
    background: #f8fafc;
    border-bottom: 1.5px solid #f1f5f9;
  }
  .item-row-body {
    padding: 1rem;
  }

  .step-bubble {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 1.75rem;
    height: 1.75rem;
    border-radius: 50%;
    background: #0072BC;
    color: #fff;
    font-size: 0.72rem;
    font-weight: 900;
    flex-shrink: 0;
  }

  .empty-state {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 3rem 1rem;
    text-align: center;
    border: 1.5px dashed #e2e8f0;
    border-radius: 1rem;
    background: #fafbfc;
  }
</style>

@php
  $kt = $lombaKetentuan ?? collect();
  $selected = request('lomba_tab', 'kategori');
  if (!in_array($selected, ['kategori', 'persyaratan', 'pendaftaran'])) {
      $selected = 'kategori';
  }

  $kategoriItems = $kt['kategori'] ?? collect();
  $persyaratanItems = $kt['persyaratan'] ?? collect();
  $pendaftaranItems = $kt['pendaftaran'] ?? collect();
  $tahapanItems = $lombaTahapan ?? collect();

  $kategoriUsedSortOrders = $kategoriItems->pluck('sort_order')
      ->filter(fn ($value) => $value !== null && $value !== '')
      ->map(fn ($value) => (int) $value)
      ->filter(fn ($value) => $value >= 1)
      ->unique()
      ->sort()
      ->values();

  $persyaratanUsedSortOrders = $persyaratanItems->pluck('sort_order')
      ->filter(fn ($value) => $value !== null && $value !== '')
      ->map(fn ($value) => (int) $value)
      ->filter(fn ($value) => $value >= 1)
      ->unique()
      ->sort()
      ->values();

  $pendaftaranUsedSortOrders = $pendaftaranItems->pluck('sort_order')
      ->filter(fn ($value) => $value !== null && $value !== '')
      ->map(fn ($value) => (int) $value)
      ->filter(fn ($value) => $value >= 1)
      ->unique()
      ->sort()
      ->values();

  $usedStepNumbers = $tahapanItems->pluck('step_number')
      ->filter(fn ($value) => $value !== null && $value !== '')
      ->map(fn ($value) => (int) $value)
      ->filter(fn ($value) => $value >= 1)
      ->unique()
      ->sort()
      ->values();

  $usedSortOrdersTahapan = $tahapanItems->pluck('sort_order')
      ->filter(fn ($value) => $value !== null && $value !== '')
      ->map(fn ($value) => (int) $value)
      ->filter(fn ($value) => $value >= 1)
      ->unique()
      ->sort()
      ->values();

  $kategoriMaxSortOption = max((int) ($kategoriUsedSortOrders->max() ?? 0), $kategoriItems->count(), 1) + 5;
  $persyaratanMaxSortOption = max((int) ($persyaratanUsedSortOrders->max() ?? 0), $persyaratanItems->count(), 1) + 5;
  $pendaftaranMaxSortOption = max((int) ($pendaftaranUsedSortOrders->max() ?? 0), $pendaftaranItems->count(), 1) + 5;
  $maxStepNumberOption = max((int) ($usedStepNumbers->max() ?? 0), $tahapanItems->count(), 1) + 5;
  $maxSortOrderOptionTahapan = max((int) ($usedSortOrdersTahapan->max() ?? 0), $tahapanItems->count(), 1) + 5;

  $kategoriFirstAvailableSortOrder = 1;
  for ($i = 1; $i <= $kategoriMaxSortOption; $i++) {
      if (! $kategoriUsedSortOrders->contains($i)) {
          $kategoriFirstAvailableSortOrder = $i;
          break;
      }
  }

  $persyaratanFirstAvailableSortOrder = 1;
  for ($i = 1; $i <= $persyaratanMaxSortOption; $i++) {
      if (! $persyaratanUsedSortOrders->contains($i)) {
          $persyaratanFirstAvailableSortOrder = $i;
          break;
      }
  }

  $pendaftaranFirstAvailableSortOrder = 1;
  for ($i = 1; $i <= $pendaftaranMaxSortOption; $i++) {
      if (! $pendaftaranUsedSortOrders->contains($i)) {
          $pendaftaranFirstAvailableSortOrder = $i;
          break;
      }
  }

  $firstAvailableStepNumber = 1;
  for ($i = 1; $i <= $maxStepNumberOption; $i++) {
      if (! $usedStepNumbers->contains($i)) {
          $firstAvailableStepNumber = $i;
          break;
      }
  }

  $firstAvailableSortOrderTahapan = 1;
  for ($i = 1; $i <= $maxSortOrderOptionTahapan; $i++) {
      if (! $usedSortOrdersTahapan->contains($i)) {
          $firstAvailableSortOrderTahapan = $i;
          break;
      }
  }
@endphp

<div
  x-show="tab==='lomba'"
  x-cloak
  class="tab-content"
  x-data="{
    lombaSection: '{{ request()->has('lomba_tab') ? 'ketentuan' : '' }}',
    kTab: '{{ $selected }}'
  }"
>
  <div class="card">
    {{-- ===== CARD HEADER ===== --}}
    <div class="flex items-center gap-3 mb-1">
      <button
        type="button"
        x-show="lombaSection !== ''"
        x-cloak
        class="back-btn"
        @click="lombaSection = ''"
      >
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
        </svg>
        Kembali
      </button>

      <div>
        <div
          class="card-title"
          x-text="lombaSection === '' ? 'Lomba' : (lombaSection === 'ketentuan' ? 'Ketentuan Lomba' : 'Tahapan Lomba')"
        ></div>
        <div
          class="card-sub"
          x-text="lombaSection === '' ? 'Pilih bagian yang ingin dikelola.' : (lombaSection === 'ketentuan' ? 'Kelola kategori, persyaratan, & pendaftaran.' : 'Kelola langkah-langkah kegiatan lomba.')"
        ></div>
      </div>
    </div>

    <hr class="section-divider">

    {{-- ===== LANDING: 2 PILIHAN ===== --}}
    <div x-show="lombaSection === ''" class="lomba-fade grid grid-cols-1 sm:grid-cols-2 gap-4">
      <button type="button" class="lomba-nav-card" @click="lombaSection = 'ketentuan'">
        <div class="lnc-icon">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
          </svg>
        </div>
        <div class="flex-1 min-w-0">
          <div class="font-bold text-[0.9rem] text-slate-900">Ketentuan</div>
          <div class="text-xs text-slate-400 mt-0.5">Kategori · Persyaratan · Pendaftaran</div>
        </div>
        <svg class="lnc-arrow w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
      </button>

      <button type="button" class="lomba-nav-card" @click="lombaSection = 'tahapan'">
        <div class="lnc-icon">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
          </svg>
        </div>
        <div class="flex-1 min-w-0">
          <div class="font-bold text-[0.9rem] text-slate-900">Tahapan</div>
          <div class="text-xs text-slate-400 mt-0.5">Langkah-langkah kegiatan lomba</div>
        </div>
        <svg class="lnc-arrow w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
      </button>
    </div>

    {{-- =========================
        SECTION: KETENTUAN
    ========================= --}}
    <div x-show="lombaSection === 'ketentuan'" x-cloak class="lomba-fade">
      <div class="section-header-strip">
        <div class="flex gap-1.5 flex-wrap">
          <button
            type="button"
            class="sub-pill"
            :class="kTab === 'kategori' ? 'sub-pill-active' : 'sub-pill-inactive'"
            @click="kTab = 'kategori'"
          >
            Kategori
          </button>
          <button
            type="button"
            class="sub-pill"
            :class="kTab === 'persyaratan' ? 'sub-pill-active' : 'sub-pill-inactive'"
            @click="kTab = 'persyaratan'"
          >
            Persyaratan
          </button>
          <button
            type="button"
            class="sub-pill"
            :class="kTab === 'pendaftaran' ? 'sub-pill-active' : 'sub-pill-inactive'"
            @click="kTab = 'pendaftaran'"
          >
            Pendaftaran
          </button>
        </div>

        <div class="text-xs text-slate-400">
          Pilih bagian lalu isi form di bawah
        </div>
      </div>

     {{-- ---- KATEGORI ---- --}}
<div x-show="kTab === 'kategori'" x-cloak class="lomba-fade space-y-4">
  
  <div class="add-form-box">
    <div class="font-bold text-sm text-slate-900 mb-3">+ Tambah Kategori</div>

    <form action="{{ route('admin.site-settings.lomba.ketentuan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
      @csrf
      <input type="hidden" name="tab" value="kategori">

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        {{-- TITLE --}}
        <div>
          <label class="field-label">Title</label>
          <input
            name="title"
            value="{{ old('tab') === 'kategori' ? old('title') : '' }}"
            class="field-input"
            placeholder="Contoh: PAUD / Sederajat"
          >
        </div>

        {{-- GAMBAR + PREVIEW --}}
        <div x-data="{ preview: null }">
          <label class="field-label">Gambar (opsional)</label>

          <label class="flex flex-col items-center justify-center gap-2 w-full border border-dashed border-slate-200 rounded-lg px-3 py-3 cursor-pointer hover:border-[#0072BC] hover:bg-blue-50/20 transition text-sm text-slate-500 bg-white">

            <template x-if="!preview">
              <div class="text-xs">Klik untuk upload</div>
            </template>

            <template x-if="preview">
              <img :src="preview" class="h-20 object-contain rounded">
            </template>

            <input type="file" name="image" class="hidden" accept="image/*"
              @change="
                const file = $event.target.files[0];
                if (file) preview = URL.createObjectURL(file)
              ">
          </label>
        </div>

      </div>

      {{-- SORT + STATUS --}}
      <div class="flex items-center gap-4">

        <div class="w-32">
          <label class="field-label">Urutan</label>
          <select name="sort_order" class="field-input" required>
            @for ($i = 1; $i <= $kategoriMaxSortOption; $i++)
              @php $isUsed = $kategoriUsedSortOrders->contains($i); @endphp
              <option
                value="{{ $i }}"
                {{ $isUsed ? 'disabled' : '' }}
                {{ (string) (old('tab') === 'kategori' ? old('sort_order', $kategoriFirstAvailableSortOrder) : $kategoriFirstAvailableSortOrder) === (string) $i && ! $isUsed ? 'selected' : '' }}
              >
                {{ $i }}{{ $isUsed ? ' (used)' : '' }}
              </option>
            @endfor
          </select>
        </div>

        <label class="inline-flex items-center gap-2 mt-5 cursor-pointer">
          <input
            type="checkbox"
            name="is_active"
            value="1"
            {{ old('tab') === 'kategori' ? (old('is_active', 1) ? 'checked' : '') : 'checked' }}
            class="w-4 h-4 accent-[#0072BC]"
          >
          <span class="text-sm font-medium text-slate-700">Aktif</span>
        </label>

        <div class="mt-5 ml-auto">
          <button type="submit" class="btn-primary">
            Tambah
          </button>
        </div>

      </div>
    </form>
  </div>

  {{-- LIST --}}
  <div class="text-xs text-slate-400 mb-2">
    <span class="font-bold text-slate-700">{{ $kategoriItems->count() }}</span> item
  </div>

  <div class="space-y-2.5">
    @forelse($kategoriItems as $item)
      @php $currentSortOrder = (int) $item->sort_order; @endphp

      <div class="item-row">

        <div class="item-row-head">
          <span class="text-xs font-black text-slate-400">#{{ $item->id }}</span>
          <span class="text-sm font-semibold text-slate-700">{{ $item->title }}</span>

          <span class="badge ml-auto {{ $item->is_active ? 'badge-active' : 'badge-inactive' }}">
            {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
          </span>

          <span class="text-xs text-slate-400">Urut: {{ $item->sort_order }}</span>
        </div>

        <div class="item-row-body">

          <form action="{{ route('admin.site-settings.lomba.ketentuan.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="space-y-3">
            @csrf
            @method('PUT')
            <input type="hidden" name="tab" value="kategori">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">

              {{-- TITLE --}}
              <div class="md:col-span-2">
                <label class="field-label">Title</label>
                <input name="title" value="{{ $item->title }}" class="field-input">
              </div>

              {{-- SORT --}}
              <div>
                <label class="field-label">Urutan</label>
                <select name="sort_order" class="field-input" required>
                  @for ($i = 1; $i <= $kategoriMaxSortOption; $i++)
                    @php $isUsedByOtherItem = $kategoriUsedSortOrders->contains($i) && $i !== $currentSortOrder; @endphp
                    <option
                      value="{{ $i }}"
                      {{ $isUsedByOtherItem ? 'disabled' : '' }}
                      {{ (string) $currentSortOrder === (string) $i ? 'selected' : '' }}
                    >
                      {{ $i }}{{ $isUsedByOtherItem ? ' (used)' : '' }}
                    </option>
                  @endfor
                </select>
              </div>

            </div>

            {{-- PREVIEW EDIT --}}
            <div x-data="{ preview: '{{ $item->image ? asset('storage/'.$item->image) : '' }}' }">
              <label class="field-label">Gambar</label>

              <label class="flex flex-col items-center justify-center gap-2 w-full border border-dashed border-slate-200 rounded-lg px-3 py-3 cursor-pointer">

                <template x-if="preview">
                  <img :src="preview" class="h-20 object-contain rounded">
                </template>

                <template x-if="!preview">
                  <div class="text-xs text-slate-400">Belum ada gambar</div>
                </template>

                <input type="file" name="image" class="hidden" accept="image/*"
                  @change="
                    const file = $event.target.files[0];
                    if (file) preview = URL.createObjectURL(file)
                  ">
              </label>
            </div>

            <div class="flex items-center gap-3">
              <label class="inline-flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="is_active" value="1" {{ $item->is_active ? 'checked' : '' }} class="w-4 h-4 accent-[#0072BC]">
                <span class="text-sm font-medium text-slate-700">Aktif</span>
              </label>

              <button type="submit" class="btn-primary ml-auto" style="padding:0.4rem 1rem;font-size:0.78rem;">
                Simpan
              </button>
            </div>
          </form>

          <form action="{{ route('admin.site-settings.lomba.ketentuan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus?')" class="mt-2.5">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-danger">Hapus</button>
          </form>

        </div>
      </div>

    @empty
      <div class="empty-state">
        <div class="text-sm font-medium text-slate-500">Belum ada kategori</div>
      </div>
    @endforelse
  </div>
</div>

      {{-- ---- PERSYARATAN ---- --}}
      <div x-show="kTab === 'persyaratan'" x-cloak class="lomba-fade space-y-4">
        <div class="add-form-box">
          <div class="font-bold text-sm text-slate-900 mb-3">+ Tambah Persyaratan</div>

          <form action="{{ route('admin.site-settings.lomba.ketentuan.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="tab" value="persyaratan">

            <div>
              <label class="field-label">Title (opsional)</label>
              <input name="title" value="{{ old('tab') === 'persyaratan' ? old('title') : '' }}" class="field-input" placeholder="Opsional">
            </div>

            <div>
              <label class="field-label">Konten</label>
              <textarea name="content" required class="field-input min-h-[80px]" placeholder="Contoh: Peserta merupakan siswa aktif...">{{ old('tab') === 'persyaratan' ? old('content') : '' }}</textarea>
            </div>

            <div class="flex items-center gap-4">
              <div class="w-32">
                <label class="field-label">Urutan</label>
                <select name="sort_order" class="field-input" required>
                  @for ($i = 1; $i <= $persyaratanMaxSortOption; $i++)
                    @php $isUsed = $persyaratanUsedSortOrders->contains($i); @endphp
                    <option
                      value="{{ $i }}"
                      {{ $isUsed ? 'disabled' : '' }}
                      {{ (string) (old('tab') === 'persyaratan' ? old('sort_order', $persyaratanFirstAvailableSortOrder) : $persyaratanFirstAvailableSortOrder) === (string) $i && ! $isUsed ? 'selected' : '' }}
                    >
                      {{ $i }}{{ $isUsed ? ' (used)' : '' }}
                    </option>
                  @endfor
                </select>
              </div>

              <label class="inline-flex items-center gap-2 mt-5 cursor-pointer">
                <input
                  type="checkbox"
                  name="is_active"
                  value="1"
                  {{ old('tab') === 'persyaratan' ? (old('is_active', 1) ? 'checked' : '') : 'checked' }}
                  class="w-4 h-4 accent-[#0072BC]"
                >
                <span class="text-sm font-medium text-slate-700">Aktif</span>
              </label>

              <div class="mt-5 ml-auto">
                <button type="submit" class="btn-primary">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                  </svg>
                  Tambah
                </button>
              </div>
            </div>
          </form>
        </div>

        <div class="text-xs text-slate-400 mb-2"><span class="font-bold text-slate-700">{{ $persyaratanItems->count() }}</span> item</div>

        <div class="space-y-2.5">
          @forelse($persyaratanItems as $item)
            @php $currentSortOrder = (int) $item->sort_order; @endphp

            <div class="item-row">
              <div class="item-row-head">
                <span class="text-xs font-black text-slate-400">#{{ $item->id }}</span>
                @if($item->title)
                  <span class="text-sm font-semibold text-slate-700">{{ $item->title }}</span>
                @endif
                <span class="badge ml-auto {{ $item->is_active ? 'badge-active' : 'badge-inactive' }}">
                  {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                </span>
                <span class="text-xs text-slate-400">Urut: {{ $item->sort_order }}</span>
              </div>

              <div class="item-row-body">
                <form action="{{ route('admin.site-settings.lomba.ketentuan.update', $item->id) }}" method="POST" class="space-y-3">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="tab" value="persyaratan">

                  <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <div class="md:col-span-2">
                      <label class="field-label">Title</label>
                      <input name="title" value="{{ $item->title }}" class="field-input">
                    </div>

                    <div>
                      <label class="field-label">Urutan</label>
                      <select name="sort_order" class="field-input" required>
                        @for ($i = 1; $i <= $persyaratanMaxSortOption; $i++)
                          @php $isUsedByOtherItem = $persyaratanUsedSortOrders->contains($i) && $i !== $currentSortOrder; @endphp
                          <option
                            value="{{ $i }}"
                            {{ $isUsedByOtherItem ? 'disabled' : '' }}
                            {{ (string) $currentSortOrder === (string) $i ? 'selected' : '' }}
                          >
                            {{ $i }}{{ $isUsedByOtherItem ? ' (used)' : '' }}
                          </option>
                        @endfor
                      </select>
                    </div>
                  </div>

                  <div>
                    <label class="field-label">Konten</label>
                    <textarea name="content" required class="field-input min-h-[60px]">{{ $item->content }}</textarea>
                  </div>

                  <div class="flex items-center gap-3">
                    <label class="inline-flex items-center gap-2 cursor-pointer">
                      <input type="checkbox" name="is_active" value="1" {{ $item->is_active ? 'checked' : '' }} class="w-4 h-4 accent-[#0072BC]">
                      <span class="text-sm font-medium text-slate-700">Aktif</span>
                    </label>

                    <button type="submit" class="btn-primary ml-auto" style="padding:0.4rem 1rem;font-size:0.78rem;">
                      Simpan
                    </button>
                  </div>
                </form>

                <form action="{{ route('admin.site-settings.lomba.ketentuan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus?')" class="mt-2.5">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn-danger">Hapus</button>
                </form>
              </div>
            </div>
          @empty
            <div class="empty-state">
              <svg class="w-9 h-9 text-slate-200 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
              </svg>
              <div class="text-sm font-medium text-slate-500">Belum ada persyaratan</div>
            </div>
          @endforelse
        </div>
      </div>

      {{-- ---- PENDAFTARAN ---- --}}
      <div x-show="kTab === 'pendaftaran'" x-cloak class="lomba-fade space-y-4">
        <div class="add-form-box">
          <div class="font-bold text-sm text-slate-900 mb-3">+ Tambah Pendaftaran</div>

          <form action="{{ route('admin.site-settings.lomba.ketentuan.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="tab" value="pendaftaran">

            <div>
              <label class="field-label">Title (opsional)</label>
              <input name="title" value="{{ old('tab') === 'pendaftaran' ? old('title') : '' }}" class="field-input" placeholder="Opsional">
            </div>

            <div>
              <label class="field-label">Konten</label>
              <textarea name="content" required class="field-input min-h-[80px]" placeholder="Contoh: Pendaftaran dibuka mulai...">{{ old('tab') === 'pendaftaran' ? old('content') : '' }}</textarea>
            </div>

            <div class="flex items-center gap-4">
              <div class="w-32">
                <label class="field-label">Urutan</label>
                <select name="sort_order" class="field-input" required>
                  @for ($i = 1; $i <= $pendaftaranMaxSortOption; $i++)
                    @php $isUsed = $pendaftaranUsedSortOrders->contains($i); @endphp
                    <option
                      value="{{ $i }}"
                      {{ $isUsed ? 'disabled' : '' }}
                      {{ (string) (old('tab') === 'pendaftaran' ? old('sort_order', $pendaftaranFirstAvailableSortOrder) : $pendaftaranFirstAvailableSortOrder) === (string) $i && ! $isUsed ? 'selected' : '' }}
                    >
                      {{ $i }}{{ $isUsed ? ' (used)' : '' }}
                    </option>
                  @endfor
                </select>
              </div>

              <label class="inline-flex items-center gap-2 mt-5 cursor-pointer">
                <input
                  type="checkbox"
                  name="is_active"
                  value="1"
                  {{ old('tab') === 'pendaftaran' ? (old('is_active', 1) ? 'checked' : '') : 'checked' }}
                  class="w-4 h-4 accent-[#0072BC]"
                >
                <span class="text-sm font-medium text-slate-700">Aktif</span>
              </label>

              <div class="mt-5 ml-auto">
                <button type="submit" class="btn-primary">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                  </svg>
                  Tambah
                </button>
              </div>
            </div>
          </form>
        </div>

        <div class="text-xs text-slate-400 mb-2"><span class="font-bold text-slate-700">{{ $pendaftaranItems->count() }}</span> item</div>

        <div class="space-y-2.5">
          @forelse($pendaftaranItems as $item)
            @php $currentSortOrder = (int) $item->sort_order; @endphp

            <div class="item-row">
              <div class="item-row-head">
                <span class="text-xs font-black text-slate-400">#{{ $item->id }}</span>
                @if($item->title)
                  <span class="text-sm font-semibold text-slate-700">{{ $item->title }}</span>
                @endif
                <span class="badge ml-auto {{ $item->is_active ? 'badge-active' : 'badge-inactive' }}">
                  {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                </span>
                <span class="text-xs text-slate-400">Urut: {{ $item->sort_order }}</span>
              </div>

              <div class="item-row-body">
                <form action="{{ route('admin.site-settings.lomba.ketentuan.update', $item->id) }}" method="POST" class="space-y-3">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="tab" value="pendaftaran">

                  <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <div class="md:col-span-2">
                      <label class="field-label">Title</label>
                      <input name="title" value="{{ $item->title }}" class="field-input">
                    </div>

                    <div>
                      <label class="field-label">Urutan</label>
                      <select name="sort_order" class="field-input" required>
                        @for ($i = 1; $i <= $pendaftaranMaxSortOption; $i++)
                          @php $isUsedByOtherItem = $pendaftaranUsedSortOrders->contains($i) && $i !== $currentSortOrder; @endphp
                          <option
                            value="{{ $i }}"
                            {{ $isUsedByOtherItem ? 'disabled' : '' }}
                            {{ (string) $currentSortOrder === (string) $i ? 'selected' : '' }}
                          >
                            {{ $i }}{{ $isUsedByOtherItem ? ' (used)' : '' }}
                          </option>
                        @endfor
                      </select>
                    </div>
                  </div>

                  <div>
                    <label class="field-label">Konten</label>
                    <textarea name="content" required class="field-input min-h-[60px]">{{ $item->content }}</textarea>
                  </div>

                  <div class="flex items-center gap-3">
                    <label class="inline-flex items-center gap-2 cursor-pointer">
                      <input type="checkbox" name="is_active" value="1" {{ $item->is_active ? 'checked' : '' }} class="w-4 h-4 accent-[#0072BC]">
                      <span class="text-sm font-medium text-slate-700">Aktif</span>
                    </label>

                    <button type="submit" class="btn-primary ml-auto" style="padding:0.4rem 1rem;font-size:0.78rem;">
                      Simpan
                    </button>
                  </div>
                </form>

                <form action="{{ route('admin.site-settings.lomba.ketentuan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus?')" class="mt-2.5">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn-danger">Hapus</button>
                </form>
              </div>
            </div>
          @empty
            <div class="empty-state">
              <svg class="w-9 h-9 text-slate-200 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
              </svg>
              <div class="text-sm font-medium text-slate-500">Belum ada item pendaftaran</div>
            </div>
          @endforelse
        </div>
      </div>
    </div>

    {{-- =========================
        SECTION: TAHAPAN
    ========================= --}}
    <div x-show="lombaSection === 'tahapan'" x-cloak class="lomba-fade">
      <div class="add-form-box">
        <div class="font-bold text-sm text-slate-900 mb-3">+ Tambah Tahapan</div>

        <form action="{{ route('admin.site-settings.lomba.tahapan.store') }}" method="POST" class="space-y-4">
          @csrf

          <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
            <div>
              <label class="field-label">Step</label>
              <select name="step_number" class="field-input" required>
                @for ($i = 1; $i <= $maxStepNumberOption; $i++)
                  @php $isUsed = $usedStepNumbers->contains($i); @endphp
                  <option
                    value="{{ $i }}"
                    {{ $isUsed ? 'disabled' : '' }}
                    {{ (string) old('step_number', $firstAvailableStepNumber) === (string) $i && ! $isUsed ? 'selected' : '' }}
                  >
                    {{ $i }}{{ $isUsed ? ' (used)' : '' }}
                  </option>
                @endfor
              </select>
            </div>

            <div class="md:col-span-2">
              <label class="field-label">Judul</label>
              <input
                type="text"
                name="title"
                value="{{ old('title') }}"
                class="field-input"
                placeholder="Contoh: Pendaftaran"
                required
              >
            </div>

            <div>
              <label class="field-label">Urutan</label>
              <select name="sort_order" class="field-input" required>
                @for ($i = 1; $i <= $maxSortOrderOptionTahapan; $i++)
                  @php $isUsed = $usedSortOrdersTahapan->contains($i); @endphp
                  <option
                    value="{{ $i }}"
                    {{ $isUsed ? 'disabled' : '' }}
                    {{ (string) old('sort_order', $firstAvailableSortOrderTahapan) === (string) $i && ! $isUsed ? 'selected' : '' }}
                  >
                    {{ $i }}{{ $isUsed ? ' (used)' : '' }}
                  </option>
                @endfor
              </select>
            </div>
          </div>

          <div>
            <label class="field-label">Deskripsi (opsional)</label>
            <textarea
              name="description"
              class="w-full border rounded-xl px-3 py-2 min-h-[70px]"
              placeholder="1 baris = 1 bullet"
            >{{ old('description') }}</textarea>
          </div>

          <div class="flex items-center gap-4">
            <label class="inline-flex items-center gap-2 cursor-pointer">
              <input
                type="checkbox"
                name="is_active"
                value="1"
                {{ old('is_active', 1) ? 'checked' : '' }}
                class="w-4 h-4 accent-[#0072BC]"
              >
              <span class="text-sm font-medium text-slate-700">Aktif</span>
            </label>

            <div class="ml-auto">
              <button type="submit" class="btn-primary">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Tahapan
              </button>
            </div>
          </div>
        </form>
      </div>

      <div class="space-y-4 mt-6">
        @forelse($tahapanItems as $step)
          @php
            $currentStepNumber = (int) $step->step_number;
            $currentSortOrder = (int) $step->sort_order;
            $bulletsText = is_array($step->bullets) && count($step->bullets) ? implode("\n", $step->bullets) : '';
          @endphp

          <div class="rounded-xl border p-4 bg-white">
            <form method="POST" action="{{ route('admin.site-settings.lomba.tahapan.update', $step->id) }}" class="space-y-3">
              @csrf
              @method('PUT')

              <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
                <div>
                  <label class="field-label">Step</label>
                  <select name="step_number" class="w-full border rounded-xl px-3 py-2" required>
                    @for ($i = 1; $i <= $maxStepNumberOption; $i++)
                      @php $isUsedByOther = $usedStepNumbers->contains($i) && $i !== $currentStepNumber; @endphp
                      <option
                        value="{{ $i }}"
                        {{ $isUsedByOther ? 'disabled' : '' }}
                        {{ (string) $currentStepNumber === (string) $i ? 'selected' : '' }}
                      >
                        {{ $i }}{{ $isUsedByOther ? ' (used)' : '' }}
                      </option>
                    @endfor
                  </select>
                </div>

                <div class="md:col-span-2">
                  <label class="field-label">Judul</label>
                  <input
                    type="text"
                    name="title"
                    value="{{ $step->title }}"
                    class="w-full border rounded-xl px-3 py-2"
                    required
                  >
                </div>

                <div>
                  <label class="field-label">Urutan</label>
                  <select name="sort_order" class="w-full border rounded-xl px-3 py-2" required>
                    @for ($i = 1; $i <= $maxSortOrderOptionTahapan; $i++)
                      @php $isUsedByOther = $usedSortOrdersTahapan->contains($i) && $i !== $currentSortOrder; @endphp
                      <option
                        value="{{ $i }}"
                        {{ $isUsedByOther ? 'disabled' : '' }}
                        {{ (string) $currentSortOrder === (string) $i ? 'selected' : '' }}
                      >
                        {{ $i }}{{ $isUsedByOther ? ' (used)' : '' }}
                      </option>
                    @endfor
                  </select>
                </div>
              </div>

              <div>
                <label class="field-label">Deskripsi (opsional)</label>
                <textarea
                  name="description"
                  class="w-full border rounded-xl px-3 py-2 min-h-[70px]"
                  placeholder="1 baris = 1 bullet"
                >{{ $bulletsText }}</textarea>
              </div>

              <div class="flex items-center gap-3">
                <label class="inline-flex items-center gap-2 cursor-pointer">
                  <input
                    type="checkbox"
                    name="is_active"
                    value="1"
                    {{ $step->is_active ? 'checked' : '' }}
                    class="w-4 h-4 accent-[#0072BC]"
                  >
                  <span class="text-sm font-medium text-slate-700">Aktif</span>
                </label>

                <button type="submit" class="btn-primary ml-auto" style="padding:0.4rem 1rem;font-size:0.78rem;">
                  Simpan
                </button>
              </div>
            </form>

            <form method="POST" action="{{ route('admin.site-settings.lomba.tahapan.destroy', $step->id) }}" class="mt-2.5">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn-danger">Hapus</button>
            </form>
          </div>
        @empty
          <div class="empty-state">
            <svg class="w-9 h-9 text-slate-200 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <div class="text-sm font-medium text-slate-500">Belum ada tahapan</div>
          </div>
        @endforelse
      </div>
    </div>
  </div>
</div>

     
   {{-- ===========================
    TAB: PENGUMUMAN
============================ --}}
@php
  $tigaBesar  = ($pengumuman ?? collect())->where('type', 'tiga_besar')->first();
  $lolosItem  = ($pengumuman ?? collect())->where('type', 'lolos')->first();

  $allGroups   = $pengumumanGroups ?? collect();
  $allEntries  = $pengumumanEntries ?? collect();

  $groupsTB    = $allGroups->where('pengumuman_id', optional($tigaBesar)->id)->values();
  $groupsLolos = $allGroups->where('pengumuman_id', optional($lolosItem)->id)->values();

  $groupsTBUsedSortOrders = $groupsTB->pluck('sort_order')
      ->filter(fn ($value) => $value !== null && $value !== '')
      ->map(fn ($value) => (int) $value)
      ->filter(fn ($value) => $value >= 1)
      ->unique()
      ->sort()
      ->values();

  $groupsLolosUsedSortOrders = $groupsLolos->pluck('sort_order')
      ->filter(fn ($value) => $value !== null && $value !== '')
      ->map(fn ($value) => (int) $value)
      ->filter(fn ($value) => $value >= 1)
      ->unique()
      ->sort()
      ->values();

  $groupsTBMaxSortOption = max((int) ($groupsTBUsedSortOrders->max() ?? 0), $groupsTB->count(), 1) + 5;
  $groupsLolosMaxSortOption = max((int) ($groupsLolosUsedSortOrders->max() ?? 0), $groupsLolos->count(), 1) + 5;

  $groupsTBFirstAvailableSortOrder = 1;
  for ($i = 1; $i <= $groupsTBMaxSortOption; $i++) {
      if (! $groupsTBUsedSortOrders->contains($i)) {
          $groupsTBFirstAvailableSortOrder = $i;
          break;
      }
  }

  $groupsLolosFirstAvailableSortOrder = 1;
  for ($i = 1; $i <= $groupsLolosMaxSortOption; $i++) {
      if (! $groupsLolosUsedSortOrders->contains($i)) {
          $groupsLolosFirstAvailableSortOrder = $i;
          break;
      }
  }
@endphp

<div x-show="tab==='pengumuman'" x-cloak class="tab-content"
     x-data="{
       pgSection: '',
       pgView: '',
       activeGroupId: null,
       activeGroupName: ''
     }">
  <div class="card">

    {{-- ===== DYNAMIC HEADER ===== --}}
    <div class="flex items-center gap-3 mb-1">
      <button type="button"
        x-show="pgSection !== ''"
        x-cloak
        class="back-btn"
        @click="pgView = ''; activeGroupId = null; activeGroupName = ''; pgSection = pgView === 'entries' ? pgSection : ''">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
        </svg>
        Kembali
      </button>
      <div>
        <div class="card-title" x-text="
          pgView === 'entries' || pgView === 'entries_lolos' ? activeGroupName :
          pgSection === 'tiga_besar' ? 'Pengumuman – 3 Besar' :
          pgSection === 'lolos' ? 'Pengumuman – Lolos Seleksi Proposal' :
          'Pengumuman'
        "></div>
        <div class="card-sub" x-text="
          pgView === 'entries' || pgView === 'entries_lolos' ? 'Kelola daftar tim di jenjang ini.' :
          pgSection !== '' ? 'Pilih bagian yang ingin dikelola.' :
          'Pilih jenis pengumuman yang ingin dikelola.'
        "></div>
      </div>
    </div>

    <hr class="section-divider">

    {{-- ===== LANDING: 2 PILIHAN ===== --}}
    <div x-show="pgSection === ''" class="lomba-fade grid grid-cols-1 sm:grid-cols-2 gap-4">
      <button type="button" class="lomba-nav-card" @click="pgSection = 'tiga_besar'; pgView = 'main'">
        <div class="lnc-icon">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
          </svg>
        </div>
        <div class="flex-1 min-w-0">
          <div class="font-bold text-[0.9rem] text-slate-900">3 Besar</div>
          <div class="text-xs text-slate-400 mt-0.5">Data pemenang & finalis terbaik</div>
        </div>
        <svg class="lnc-arrow w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
      </button>

      <button type="button" class="lomba-nav-card" @click="pgSection = 'lolos'; pgView = 'main'">
        <div class="lnc-icon">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
        </div>
        <div class="flex-1 min-w-0">
          <div class="font-bold text-[0.9rem] text-slate-900">Lolos Seleksi Proposal</div>
          <div class="text-xs text-slate-400 mt-0.5">Tim yang lolos tahap seleksi proposal</div>
        </div>
        <svg class="lnc-arrow w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
      </button>
    </div>

    {{-- ====== 3 BESAR - MAIN VIEW ====== --}}
    <div x-show="pgSection === 'tiga_besar' && pgView === 'main'" x-cloak class="lomba-fade space-y-5">

      {{-- 1. EDIT JUDUL HALAMAN --}}
      <div class="rounded-xl border-2 border-dashed border-slate-200 bg-slate-50/50 p-5">
        <div class="flex items-center gap-2 mb-4">
          <div class="w-7 h-7 rounded-lg bg-amber-100 flex items-center justify-center shrink-0">
            <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
          </div>
          <div>
            <div class="font-bold text-sm text-slate-900">Judul Halaman</div>
            <div class="text-xs text-slate-400">Teks yang tampil sebagai judul besar di halaman publik</div>
          </div>
        </div>

        @if($tigaBesar)
          <form action="{{ route('admin.site-settings.pengumuman.update', $tigaBesar->id) }}" method="POST" class="space-y-3">
            @csrf @method('PUT')
            <input type="hidden" name="type" value="tiga_besar">
            <input type="hidden" name="sort_order" value="{{ $tigaBesar->sort_order }}">
            <input type="hidden" name="is_active" value="{{ $tigaBesar->is_active ? '1' : '0' }}">
            <div>
              <label class="field-label">Judul Utama</label>
              <input type="text" name="title" value="{{ $tigaBesar->title }}" class="field-input" placeholder="Contoh: PENGUMUMAN 3 BESAR" required>
            </div>
            <div>
              <label class="field-label">Subjudul / Deskripsi</label>
              <textarea name="content" class="field-input min-h-[70px]" placeholder="Contoh: Wujudkan Indonesia Cerdas">{{ $tigaBesar->content }}</textarea>
            </div>
            <button type="submit" class="btn-primary" style="padding:0.45rem 1rem;font-size:0.8rem;">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
              Simpan Judul
            </button>
          </form>
        @else
          <form action="{{ route('admin.site-settings.pengumuman.store') }}" method="POST" class="space-y-3">
            @csrf
            <input type="hidden" name="type" value="tiga_besar">
            <input type="hidden" name="sort_order" value="1">
            <input type="hidden" name="is_active" value="1">
            <div>
              <label class="field-label">Judul Utama</label>
              <input type="text" name="title" class="field-input" placeholder="Contoh: PENGUMUMAN 3 BESAR" required>
            </div>
            <div>
              <label class="field-label">Subjudul / Deskripsi</label>
              <textarea name="content" class="field-input min-h-[70px]" placeholder="Contoh: Wujudkan Indonesia Cerdas"></textarea>
            </div>
            <button type="submit" class="btn-primary" style="padding:0.45rem 1rem;font-size:0.8rem;">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
              Buat Judul
            </button>
          </form>
        @endif
      </div>

      <hr class="section-divider">

      {{-- 2. JENJANG / GROUP --}}
      <div>
        <div class="flex items-center justify-between mb-4">
          <div>
            <div class="font-bold text-sm text-slate-900">Jenjang</div>
            <div class="text-xs text-slate-400 mt-0.5">Klik jenjang untuk kelola daftar tim</div>
          </div>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 mb-4">
          @foreach($groupsTB as $group)
            <button type="button"
              class="flex flex-col items-center justify-center gap-2 rounded-xl border-2 border-slate-200 bg-white p-4 text-center hover:border-[#0072BC] hover:bg-blue-50/30 transition-all group"
              @click="pgView = 'entries'; activeGroupId = {{ $group->id }}; activeGroupName = '{{ addslashes($group->subtitle) }}'">
              <div class="w-10 h-10 rounded-xl bg-slate-100 group-hover:bg-[#0072BC] flex items-center justify-center transition-colors">
                <svg class="w-5 h-5 text-slate-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
              </div>
              <div class="font-bold text-xs text-slate-800 group-hover:text-[#0072BC] transition-colors leading-tight">{{ $group->subtitle }}</div>
              <div class="text-[10px] text-slate-400">
                {{ $allEntries->where('pengumuman_group_id', $group->id)->count() }} tim
              </div>
            </button>
          @endforeach

          <button type="button"
            class="flex flex-col items-center justify-center gap-2 rounded-xl border-2 border-dashed border-slate-200 bg-slate-50 p-4 text-center hover:border-[#0072BC] hover:bg-blue-50/20 transition-all group"
            @click="pgView = 'add_group'">
            <div class="w-10 h-10 rounded-xl bg-white border border-slate-200 group-hover:bg-[#0072BC] flex items-center justify-center transition-colors">
              <svg class="w-5 h-5 text-slate-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
              </svg>
            </div>
            <div class="font-bold text-xs text-slate-500 group-hover:text-[#0072BC] transition-colors">Tambah Jenjang</div>
          </button>
        </div>
      </div>
    </div>

    {{-- ====== 3 BESAR - TAMBAH JENJANG ====== --}}
    <div x-show="pgSection === 'tiga_besar' && pgView === 'add_group'" x-cloak class="lomba-fade">
      <div class="flex items-center gap-2 mb-4">
        <button type="button" class="back-btn" @click="pgView = 'main'">
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
          Kembali
        </button>
        <span class="text-sm font-bold text-slate-700">Tambah Jenjang Baru</span>
      </div>

      <div class="add-form-box">
        <form action="{{ route('admin.site-settings.pengumuman-groups.store') }}" method="POST" class="space-y-4">
          @csrf
          <input type="hidden" name="pengumuman_id" value="{{ optional($tigaBesar)->id }}">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="field-label">Nama Jenjang (Subtitle)</label>
              <input type="text" name="subtitle" class="field-input" placeholder="Contoh: PAUD / SD / SMP / SMK" required>
            </div>
            <div>
              <label class="field-label">Title (opsional)</label>
              <input type="text" name="title" class="field-input" placeholder="Contoh: 10 TIM PESERTA">
            </div>
          </div>
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="field-label">Slug</label>
              <input type="text" name="slug" class="field-input" placeholder="Contoh: paud" required>
            </div>
            <div>
              <label class="field-label">Urutan</label>
              <select name="sort_order" class="field-input" required>
                @for ($i = 1; $i <= $groupsTBMaxSortOption; $i++)
                  @php $isUsed = $groupsTBUsedSortOrders->contains($i); @endphp
                  <option
                    value="{{ $i }}"
                    {{ $isUsed ? 'disabled' : '' }}
                    {{ (string) $groupsTBFirstAvailableSortOrder === (string) $i && ! $isUsed ? 'selected' : '' }}
                  >
                    {{ $i }}{{ $isUsed ? ' (used)' : '' }}
                  </option>
                @endfor
              </select>
            </div>
          </div>
          <div class="flex items-center justify-between">
            <label class="inline-flex items-center gap-2 cursor-pointer">
              <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 accent-[#0072BC]">
              <span class="text-sm font-medium text-slate-700">Aktif</span>
            </label>
            <button type="submit" class="btn-primary">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
              Tambah Jenjang
            </button>
          </div>
        </form>
      </div>
    </div>

    {{-- ====== 3 BESAR - LIST TIM PER JENJANG ====== --}}
    <div x-show="pgSection === 'tiga_besar' && pgView === 'entries'" x-cloak class="lomba-fade space-y-5">
      <div class="flex items-center gap-2 mb-1">
        <button type="button" class="back-btn" @click="pgView = 'main'; activeGroupId = null; activeGroupName = ''">
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
          Kembali ke Jenjang
        </button>
      </div>

      <div class="add-form-box">
        <div class="font-bold text-sm text-slate-900 mb-3">+ Tambah Tim</div>
        <form action="{{ route('admin.site-settings.pengumuman-entries.store') }}" method="POST" class="space-y-4">
          @csrf
          <input type="hidden" name="pengumuman_group_id" :value="activeGroupId">

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="field-label">Nama Tim</label>
              <input type="text" name="team_name" class="field-input" required>
            </div>
            <div>
              <label class="field-label">Nama Sekolah</label>
              <input type="text" name="school_name" class="field-input" required>
            </div>
          </div>

          <template x-for="group in {{ \Illuminate\Support\Js::from($groupsTB->map(function ($group) use ($allEntries) {
              $entries = $allEntries->where('pengumuman_group_id', $group->id)->values();

              $usedRankOrders = $entries->pluck('rank_order')
                  ->filter(fn ($value) => $value !== null && $value !== '')
                  ->map(fn ($value) => (int) $value)
                  ->filter(fn ($value) => $value >= 1)
                  ->unique()
                  ->sort()
                  ->values();

              $usedSortOrders = $entries->pluck('sort_order')
                  ->filter(fn ($value) => $value !== null && $value !== '')
                  ->map(fn ($value) => (int) $value)
                  ->filter(fn ($value) => $value >= 1)
                  ->unique()
                  ->sort()
                  ->values();

              $maxRankOption = max((int) ($usedRankOrders->max() ?? 0), $entries->count(), 1) + 5;
              $maxSortOption = max((int) ($usedSortOrders->max() ?? 0), $entries->count(), 1) + 5;

              return [
                  'id' => $group->id,
                  'rankOptions' => collect(range(1, $maxRankOption))->map(fn ($i) => [
                      'value' => $i,
                      'used' => $usedRankOrders->contains($i),
                  ])->values(),
                  'sortOptions' => collect(range(1, $maxSortOption))->map(fn ($i) => [
                      'value' => $i,
                      'used' => $usedSortOrders->contains($i),
                  ])->values(),
              ];
          })->values()) }}" :key="group.id">
            <div x-show="activeGroupId === group.id" class="grid grid-cols-3 gap-4">
              <div>
                <label class="field-label">Rank</label>
                <select name="rank_order" class="field-input" required>
                  <template x-for="option in group.rankOptions" :key="'rank-' + group.id + '-' + option.value">
                    <option :value="option.value" :disabled="option.used" x-text="option.value + (option.used ? ' (used)' : '')"></option>
                  </template>
                </select>
              </div>

              <div>
                <label class="field-label">Urutan</label>
                <select name="sort_order" class="field-input" required>
                  <template x-for="option in group.sortOptions" :key="'sort-' + group.id + '-' + option.value">
                    <option :value="option.value" :disabled="option.used" x-text="option.value + (option.used ? ' (used)' : '')"></option>
                  </template>
                </select>
              </div>

              <div class="flex flex-col justify-end pb-1 gap-2">
                <label class="inline-flex items-center gap-2 cursor-pointer">
                  <input type="checkbox" name="is_preview" value="1" class="w-4 h-4 accent-[#0072BC]">
                  <span class="text-xs font-medium text-slate-700">Preview</span>
                </label>
                <label class="inline-flex items-center gap-2 cursor-pointer">
                  <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 accent-[#0072BC]">
                  <span class="text-xs font-medium text-slate-700">Aktif</span>
                </label>
              </div>
            </div>
          </template>

          <div class="flex justify-end">
            <button type="submit" class="btn-primary">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
              Tambah Tim
            </button>
          </div>
        </form>
      </div>

      @foreach($groupsTB as $group)
        @php
          $groupEntries = $allEntries->where('pengumuman_group_id', $group->id)->values();

          $usedRankOrders = $groupEntries->pluck('rank_order')
              ->filter(fn ($value) => $value !== null && $value !== '')
              ->map(fn ($value) => (int) $value)
              ->filter(fn ($value) => $value >= 1)
              ->unique()
              ->sort()
              ->values();

          $usedSortOrders = $groupEntries->pluck('sort_order')
              ->filter(fn ($value) => $value !== null && $value !== '')
              ->map(fn ($value) => (int) $value)
              ->filter(fn ($value) => $value >= 1)
              ->unique()
              ->sort()
              ->values();

          $maxRankOption = max((int) ($usedRankOrders->max() ?? 0), $groupEntries->count(), 1) + 5;
          $maxSortOption = max((int) ($usedSortOrders->max() ?? 0), $groupEntries->count(), 1) + 5;
        @endphp

        <div x-show="activeGroupId === {{ $group->id }}">
          <div class="text-xs text-slate-400 mb-3">
            <span class="font-bold text-slate-700">{{ $groupEntries->count() }}</span> tim di jenjang <span class="font-bold text-[#0072BC]">{{ $group->subtitle }}</span>
          </div>

          <div class="space-y-2.5">
            @forelse($groupEntries as $entry)
              @php
                $currentRankOrder = (int) $entry->rank_order;
                $currentSortOrder = (int) $entry->sort_order;
              @endphp

              <div class="item-row">
                <div class="item-row-head">
                  <span class="step-bubble">{{ $entry->rank_order }}</span>
                  <span class="font-semibold text-sm text-slate-800">{{ $entry->team_name }}</span>
                  <span class="text-xs text-slate-400 truncate">{{ $entry->school_name }}</span>
                  <span class="badge ml-auto {{ $entry->is_active ? 'badge-active' : 'badge-inactive' }}">{{ $entry->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                </div>

                <div class="item-row-body">
                  <form action="{{ route('admin.site-settings.pengumuman-entries.update', $entry->id) }}" method="POST" class="space-y-3">
                    @csrf @method('PUT')
                    <input type="hidden" name="pengumuman_group_id" value="{{ $entry->pengumuman_group_id }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                      <div>
                        <label class="field-label">Nama Tim</label>
                        <input type="text" name="team_name" value="{{ $entry->team_name }}" class="field-input" required>
                      </div>
                      <div>
                        <label class="field-label">Nama Sekolah</label>
                        <input type="text" name="school_name" value="{{ $entry->school_name }}" class="field-input" required>
                      </div>
                    </div>

                    <div class="grid grid-cols-3 gap-3">
                      <div>
                        <label class="field-label">Rank</label>
                        <select name="rank_order" class="field-input" required>
                          @for ($i = 1; $i <= $maxRankOption; $i++)
                            @php $isUsedByOther = $usedRankOrders->contains($i) && $i !== $currentRankOrder; @endphp
                            <option
                              value="{{ $i }}"
                              {{ $isUsedByOther ? 'disabled' : '' }}
                              {{ (string) $currentRankOrder === (string) $i ? 'selected' : '' }}
                            >
                              {{ $i }}{{ $isUsedByOther ? ' (used)' : '' }}
                            </option>
                          @endfor
                        </select>
                      </div>

                      <div>
                        <label class="field-label">Urutan</label>
                        <select name="sort_order" class="field-input" required>
                          @for ($i = 1; $i <= $maxSortOption; $i++)
                            @php $isUsedByOther = $usedSortOrders->contains($i) && $i !== $currentSortOrder; @endphp
                            <option
                              value="{{ $i }}"
                              {{ $isUsedByOther ? 'disabled' : '' }}
                              {{ (string) $currentSortOrder === (string) $i ? 'selected' : '' }}
                            >
                              {{ $i }}{{ $isUsedByOther ? ' (used)' : '' }}
                            </option>
                          @endfor
                        </select>
                      </div>

                      <div class="flex flex-col justify-end pb-1 gap-1.5">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                          <input type="checkbox" name="is_preview" value="1" {{ $entry->is_preview ? 'checked' : '' }} class="w-4 h-4 accent-[#0072BC]">
                          <span class="text-xs font-medium text-slate-700">Preview</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                          <input type="checkbox" name="is_active" value="1" {{ $entry->is_active ? 'checked' : '' }} class="w-4 h-4 accent-[#0072BC]">
                          <span class="text-xs font-medium text-slate-700">Aktif</span>
                        </label>
                      </div>
                    </div>

                    <div class="flex justify-end">
                      <button type="submit" class="btn-primary" style="padding:0.4rem 1rem;font-size:0.78rem;">Simpan</button>
                    </div>
                  </form>

                  <form action="{{ route('admin.site-settings.pengumuman-entries.destroy', $entry->id) }}" method="POST" onsubmit="return confirm('Hapus tim ini?')" class="mt-2.5">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn-danger">Hapus</button>
                  </form>
                </div>
              </div>
            @empty
              <div class="empty-state">
                <svg class="w-9 h-9 text-slate-200 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                <div class="text-sm font-medium text-slate-500">Belum ada tim di jenjang ini</div>
              </div>
            @endforelse
          </div>
        </div>
      @endforeach
    </div>

    {{-- LOLOS - MAIN VIEW --}}
    <div x-show="pgSection === 'lolos' && pgView === 'main'" x-cloak class="lomba-fade space-y-5">
      <div class="rounded-xl border-2 border-dashed border-slate-200 bg-slate-50/50 p-5">
        <div class="flex items-center gap-2 mb-4">
          <div class="w-7 h-7 rounded-lg bg-amber-100 flex items-center justify-center shrink-0">
            <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
          </div>
          <div>
            <div class="font-bold text-sm text-slate-900">Judul Halaman</div>
            <div class="text-xs text-slate-400">Teks yang tampil sebagai judul besar di halaman publik</div>
          </div>
        </div>

        @if($lolosItem)
          <form action="{{ route('admin.site-settings.pengumuman.update', $lolosItem->id) }}" method="POST" class="space-y-3">
            @csrf @method('PUT')
            <input type="hidden" name="type" value="lolos">
            <input type="hidden" name="sort_order" value="{{ $lolosItem->sort_order }}">
            <input type="hidden" name="is_active" value="{{ $lolosItem->is_active ? '1' : '0' }}">
            <div>
              <label class="field-label">Judul Utama</label>
              <input type="text" name="title" value="{{ $lolosItem->title }}" class="field-input" placeholder="Contoh: Pengumuman Peserta Lolos Seleksi Proposal" required>
            </div>
            <div>
              <label class="field-label">Subjudul / Deskripsi</label>
              <textarea name="content" class="field-input min-h-[70px]" placeholder="Deskripsi singkat...">{{ $lolosItem->content }}</textarea>
            </div>
            <button type="submit" class="btn-primary" style="padding:0.45rem 1rem;font-size:0.8rem;">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
              Simpan Judul
            </button>
          </form>
        @else
          <form action="{{ route('admin.site-settings.pengumuman.store') }}" method="POST" class="space-y-3">
            @csrf
            <input type="hidden" name="type" value="lolos">
            <input type="hidden" name="sort_order" value="1">
            <input type="hidden" name="is_active" value="1">
            <div>
              <label class="field-label">Judul Utama</label>
              <input type="text" name="title" class="field-input" placeholder="Contoh: Pengumuman Peserta Lolos Seleksi Proposal" required>
            </div>
            <div>
              <label class="field-label">Subjudul / Deskripsi</label>
              <textarea name="content" class="field-input min-h-[70px]" placeholder="Deskripsi singkat..."></textarea>
            </div>
            <button type="submit" class="btn-primary" style="padding:0.45rem 1rem;font-size:0.8rem;">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
              Buat Judul
            </button>
          </form>
        @endif
      </div>

      <hr class="section-divider">

      <div>
        <div class="flex items-center justify-between mb-4">
          <div>
            <div class="font-bold text-sm text-slate-900">Jenjang</div>
            <div class="text-xs text-slate-400 mt-0.5">Klik jenjang untuk kelola daftar tim</div>
          </div>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 mb-4">
          @foreach($groupsLolos as $group)
            <button type="button"
              class="flex flex-col items-center justify-center gap-2 rounded-xl border-2 border-slate-200 bg-white p-4 text-center hover:border-[#0072BC] hover:bg-blue-50/30 transition-all group"
              @click="pgView = 'entries_lolos'; activeGroupId = {{ $group->id }}; activeGroupName = '{{ addslashes($group->subtitle) }}'">
              <div class="w-10 h-10 rounded-xl bg-slate-100 group-hover:bg-[#0072BC] flex items-center justify-center transition-colors">
                <svg class="w-5 h-5 text-slate-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
              </div>
              <div class="font-bold text-xs text-slate-800 group-hover:text-[#0072BC] transition-colors leading-tight">{{ $group->subtitle }}</div>
              <div class="text-[10px] text-slate-400">
                {{ $allEntries->where('pengumuman_group_id', $group->id)->count() }} tim
              </div>
            </button>
          @endforeach

          <button type="button"
            class="flex flex-col items-center justify-center gap-2 rounded-xl border-2 border-dashed border-slate-200 bg-slate-50 p-4 text-center hover:border-[#0072BC] hover:bg-blue-50/20 transition-all group"
            @click="pgView = 'add_group_lolos'">
            <div class="w-10 h-10 rounded-xl bg-white border border-slate-200 group-hover:bg-[#0072BC] flex items-center justify-center transition-colors">
              <svg class="w-5 h-5 text-slate-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
              </svg>
            </div>
            <div class="font-bold text-xs text-slate-500 group-hover:text-[#0072BC] transition-colors">Tambah Jenjang</div>
          </button>
        </div>
      </div>
    </div>

    {{-- LOLOS - TAMBAH JENJANG --}}
    <div x-show="pgSection === 'lolos' && pgView === 'add_group_lolos'" x-cloak class="lomba-fade">
      <div class="flex items-center gap-2 mb-4">
        <button type="button" class="back-btn" @click="pgView = 'main'">
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
          Kembali
        </button>
        <span class="text-sm font-bold text-slate-700">Tambah Jenjang Baru</span>
      </div>

      <div class="add-form-box">
        <form action="{{ route('admin.site-settings.pengumuman-groups.store') }}" method="POST" class="space-y-4">
          @csrf
          <input type="hidden" name="pengumuman_id" value="{{ optional($lolosItem)->id }}">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="field-label">Nama Jenjang (Subtitle)</label>
              <input type="text" name="subtitle" class="field-input" placeholder="Contoh: PAUD / SD / SMP / SMK" required>
            </div>
            <div>
              <label class="field-label">Title (opsional)</label>
              <input type="text" name="title" class="field-input" placeholder="Contoh: 10 TIM PESERTA">
            </div>
          </div>
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="field-label">Slug</label>
              <input type="text" name="slug" class="field-input" placeholder="Contoh: paud" required>
            </div>
            <div>
              <label class="field-label">Urutan</label>
              <select name="sort_order" class="field-input" required>
                @for ($i = 1; $i <= $groupsLolosMaxSortOption; $i++)
                  @php $isUsed = $groupsLolosUsedSortOrders->contains($i); @endphp
                  <option
                    value="{{ $i }}"
                    {{ $isUsed ? 'disabled' : '' }}
                    {{ (string) $groupsLolosFirstAvailableSortOrder === (string) $i && ! $isUsed ? 'selected' : '' }}
                  >
                    {{ $i }}{{ $isUsed ? ' (used)' : '' }}
                  </option>
                @endfor
              </select>
            </div>
          </div>
          <div class="flex items-center justify-between">
            <label class="inline-flex items-center gap-2 cursor-pointer">
              <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 accent-[#0072BC]">
              <span class="text-sm font-medium text-slate-700">Aktif</span>
            </label>
            <button type="submit" class="btn-primary">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
              Tambah Jenjang
            </button>
          </div>
        </form>
      </div>
    </div>

    {{-- LOLOS - LIST TIM PER JENJANG --}}
    <div x-show="pgSection === 'lolos' && pgView === 'entries_lolos'" x-cloak class="lomba-fade space-y-5">
      <div class="flex items-center gap-2 mb-1">
        <button type="button" class="back-btn" @click="pgView = 'main'; activeGroupId = null; activeGroupName = ''">
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
          Kembali ke Jenjang
        </button>
      </div>

      <div class="add-form-box">
        <div class="font-bold text-sm text-slate-900 mb-3">+ Tambah Tim</div>
        <form action="{{ route('admin.site-settings.pengumuman-entries.store') }}" method="POST" class="space-y-4">
          @csrf
          <input type="hidden" name="pengumuman_group_id" :value="activeGroupId">

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="field-label">Nama Tim</label>
              <input type="text" name="team_name" class="field-input" required>
            </div>
            <div>
              <label class="field-label">Nama Sekolah</label>
              <input type="text" name="school_name" class="field-input" required>
            </div>
          </div>

          <template x-for="group in {{ \Illuminate\Support\Js::from($groupsLolos->map(function ($group) use ($allEntries) {
              $entries = $allEntries->where('pengumuman_group_id', $group->id)->values();

              $usedRankOrders = $entries->pluck('rank_order')
                  ->filter(fn ($value) => $value !== null && $value !== '')
                  ->map(fn ($value) => (int) $value)
                  ->filter(fn ($value) => $value >= 1)
                  ->unique()
                  ->sort()
                  ->values();

              $usedSortOrders = $entries->pluck('sort_order')
                  ->filter(fn ($value) => $value !== null && $value !== '')
                  ->map(fn ($value) => (int) $value)
                  ->filter(fn ($value) => $value >= 1)
                  ->unique()
                  ->sort()
                  ->values();

              $maxRankOption = max((int) ($usedRankOrders->max() ?? 0), $entries->count(), 1) + 5;
              $maxSortOption = max((int) ($usedSortOrders->max() ?? 0), $entries->count(), 1) + 5;

              return [
                  'id' => $group->id,
                  'rankOptions' => collect(range(1, $maxRankOption))->map(fn ($i) => [
                      'value' => $i,
                      'used' => $usedRankOrders->contains($i),
                  ])->values(),
                  'sortOptions' => collect(range(1, $maxSortOption))->map(fn ($i) => [
                      'value' => $i,
                      'used' => $usedSortOrders->contains($i),
                  ])->values(),
              ];
          })->values()) }}" :key="group.id">
            <div x-show="activeGroupId === group.id" class="grid grid-cols-3 gap-4">
              <div>
                <label class="field-label">Rank</label>
                <select name="rank_order" class="field-input" required>
                  <template x-for="option in group.rankOptions" :key="'rank-lolos-' + group.id + '-' + option.value">
                    <option :value="option.value" :disabled="option.used" x-text="option.value + (option.used ? ' (used)' : '')"></option>
                  </template>
                </select>
              </div>

              <div>
                <label class="field-label">Urutan</label>
                <select name="sort_order" class="field-input" required>
                  <template x-for="option in group.sortOptions" :key="'sort-lolos-' + group.id + '-' + option.value">
                    <option :value="option.value" :disabled="option.used" x-text="option.value + (option.used ? ' (used)' : '')"></option>
                  </template>
                </select>
              </div>

              <div class="flex flex-col justify-end pb-1 gap-2">
                <label class="inline-flex items-center gap-2 cursor-pointer">
                  <input type="checkbox" name="is_preview" value="1" class="w-4 h-4 accent-[#0072BC]">
                  <span class="text-xs font-medium text-slate-700">Preview</span>
                </label>
                <label class="inline-flex items-center gap-2 cursor-pointer">
                  <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 accent-[#0072BC]">
                  <span class="text-xs font-medium text-slate-700">Aktif</span>
                </label>
              </div>
            </div>
          </template>

          <div class="flex justify-end">
            <button type="submit" class="btn-primary">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
              Tambah Tim
            </button>
          </div>
        </form>
      </div>

      @foreach($groupsLolos as $group)
        @php
          $groupEntries = $allEntries->where('pengumuman_group_id', $group->id)->values();

          $usedRankOrders = $groupEntries->pluck('rank_order')
              ->filter(fn ($value) => $value !== null && $value !== '')
              ->map(fn ($value) => (int) $value)
              ->filter(fn ($value) => $value >= 1)
              ->unique()
              ->sort()
              ->values();

          $usedSortOrders = $groupEntries->pluck('sort_order')
              ->filter(fn ($value) => $value !== null && $value !== '')
              ->map(fn ($value) => (int) $value)
              ->filter(fn ($value) => $value >= 1)
              ->unique()
              ->sort()
              ->values();

          $maxRankOption = max((int) ($usedRankOrders->max() ?? 0), $groupEntries->count(), 1) + 5;
          $maxSortOption = max((int) ($usedSortOrders->max() ?? 0), $groupEntries->count(), 1) + 5;
        @endphp

        <div x-show="activeGroupId === {{ $group->id }}">
          <div class="text-xs text-slate-400 mb-3">
            <span class="font-bold text-slate-700">{{ $groupEntries->count() }}</span> tim di jenjang <span class="font-bold text-[#0072BC]">{{ $group->subtitle }}</span>
          </div>

          <div class="space-y-2.5">
            @forelse($groupEntries as $entry)
              @php
                $currentRankOrder = (int) $entry->rank_order;
                $currentSortOrder = (int) $entry->sort_order;
              @endphp

              <div class="item-row">
                <div class="item-row-head">
                  <span class="step-bubble">{{ $entry->rank_order }}</span>
                  <span class="font-semibold text-sm text-slate-800">{{ $entry->team_name }}</span>
                  <span class="text-xs text-slate-400 truncate">{{ $entry->school_name }}</span>
                  <span class="badge ml-auto {{ $entry->is_active ? 'badge-active' : 'badge-inactive' }}">{{ $entry->is_active ? 'Aktif' : 'Nonaktif' }}</span>
                </div>

                <div class="item-row-body">
                  <form action="{{ route('admin.site-settings.pengumuman-entries.update', $entry->id) }}" method="POST" class="space-y-3">
                    @csrf @method('PUT')
                    <input type="hidden" name="pengumuman_group_id" value="{{ $entry->pengumuman_group_id }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                      <div>
                        <label class="field-label">Nama Tim</label>
                        <input type="text" name="team_name" value="{{ $entry->team_name }}" class="field-input" required>
                      </div>
                      <div>
                        <label class="field-label">Nama Sekolah</label>
                        <input type="text" name="school_name" value="{{ $entry->school_name }}" class="field-input" required>
                      </div>
                    </div>

                    <div class="grid grid-cols-3 gap-3">
                      <div>
                        <label class="field-label">Rank</label>
                        <select name="rank_order" class="field-input" required>
                          @for ($i = 1; $i <= $maxRankOption; $i++)
                            @php $isUsedByOther = $usedRankOrders->contains($i) && $i !== $currentRankOrder; @endphp
                            <option
                              value="{{ $i }}"
                              {{ $isUsedByOther ? 'disabled' : '' }}
                              {{ (string) $currentRankOrder === (string) $i ? 'selected' : '' }}
                            >
                              {{ $i }}{{ $isUsedByOther ? ' (used)' : '' }}
                            </option>
                          @endfor
                        </select>
                      </div>

                      <div>
                        <label class="field-label">Urutan</label>
                        <select name="sort_order" class="field-input" required>
                          @for ($i = 1; $i <= $maxSortOption; $i++)
                            @php $isUsedByOther = $usedSortOrders->contains($i) && $i !== $currentSortOrder; @endphp
                            <option
                              value="{{ $i }}"
                              {{ $isUsedByOther ? 'disabled' : '' }}
                              {{ (string) $currentSortOrder === (string) $i ? 'selected' : '' }}
                            >
                              {{ $i }}{{ $isUsedByOther ? ' (used)' : '' }}
                            </option>
                          @endfor
                        </select>
                      </div>

                      <div class="flex flex-col justify-end pb-1 gap-1.5">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                          <input type="checkbox" name="is_preview" value="1" {{ $entry->is_preview ? 'checked' : '' }} class="w-4 h-4 accent-[#0072BC]">
                          <span class="text-xs font-medium text-slate-700">Preview</span>
                        </label>
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                          <input type="checkbox" name="is_active" value="1" {{ $entry->is_active ? 'checked' : '' }} class="w-4 h-4 accent-[#0072BC]">
                          <span class="text-xs font-medium text-slate-700">Aktif</span>
                        </label>
                      </div>
                    </div>

                    <div class="flex justify-end">
                      <button type="submit" class="btn-primary" style="padding:0.4rem 1rem;font-size:0.78rem;">Simpan</button>
                    </div>
                  </form>

                  <form action="{{ route('admin.site-settings.pengumuman-entries.destroy', $entry->id) }}" method="POST" onsubmit="return confirm('Hapus tim ini?')" class="mt-2.5">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn-danger">Hapus</button>
                  </form>
                </div>
              </div>
            @empty
              <div class="empty-state">
                <svg class="w-9 h-9 text-slate-200 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                <div class="text-sm font-medium text-slate-500">Belum ada tim di jenjang ini</div>
              </div>
            @endforelse
          </div>
        </div>
      @endforeach
    </div>

  </div>
</div>

{{-- PREVIEW JS (hero + 3 home images) --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
  // hero preview
  (function(){
    const input = document.getElementById('hero_image');
    const preview = document.getElementById('hero_preview');
    if (!input || !preview) return;
    input.addEventListener('change', function (e) {
      const file = e.target.files && e.target.files[0];
      if (!file) return;
      preview.src = URL.createObjectURL(file);
    });
  })();

  // home images preview
  function bindPreview(inputId, imgId) {
    const input = document.getElementById(inputId);
    const img = document.getElementById(imgId);
    if (!input || !img) return;
    input.addEventListener('change', function(e){
      const f = e.target.files && e.target.files[0];
      if(!f) return;
      img.src = URL.createObjectURL(f);
    });
  }
  bindPreview('home_image_1', 'preview_home_1');
  bindPreview('home_image_2', 'preview_home_2');
  bindPreview('home_image_3', 'preview_home_3');
});
</script>
@endsection