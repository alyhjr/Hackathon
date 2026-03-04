<x-guest-layout>

    {{-- Judul --}}
    <div class="mb-6 text-center">
        <h1 style="font-family:'Poppins',sans-serif;font-size:22px;font-weight:900;color:#0f172a;">
            Masuk ke Akun
        </h1>
        <p class="text-sm text-slate-500 mt-1">Hackathon Rumah Pendidikan 2026</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-semibold text-slate-700 mb-1">Email</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required autofocus autocomplete="username"
                class="w-full h-11 rounded-xl border border-slate-300 px-4 text-sm
                       focus:outline-none focus:ring-2 focus:ring-sky-400 focus:border-sky-400 transition"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="block text-sm font-semibold text-slate-700 mb-1">Password</label>
            <input
                id="password"
                type="password"
                name="password"
                required autocomplete="current-password"
                class="w-full h-11 rounded-xl border border-slate-300 px-4 text-sm
                       focus:outline-none focus:ring-2 focus:ring-sky-400 focus:border-sky-400 transition"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="mt-4 flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center gap-2 cursor-pointer">
                <input
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                    class="rounded border-slate-300 text-sky-500 shadow-sm focus:ring-sky-400"
                />
                <span class="text-sm text-slate-600">Ingat saya</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                   class="text-sm text-sky-600 hover:text-sky-800 font-semibold transition">
                    Lupa password?
                </a>
            @endif
        </div>

        <!-- Tombol Login -->
        <div class="mt-6">
            <button
                type="submit"
                class="w-full h-11 rounded-xl font-bold text-sm text-slate-800 transition"
                style="background:#FFF9BF;"
                onmouseover="this.style.background='#FFF9BF'"
                onmouseout="this.style.background='#FFF9BF'"
            >
                Masuk
            </button>
        </div>

    </form>

    {{-- Kembali ke beranda --}}
    <div class="mt-5 text-center">
        <a href="{{ route('home') }}" class="text-xs text-slate-400 hover:text-sky-600 transition">
            ← Kembali ke Beranda
        </a>
    </div>

</x-guest-layout>