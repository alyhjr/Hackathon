<x-guest-layout>

    {{-- Header --}}
    <div class="login-top">
        <div class="logo-wrap">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none">
                <rect x="1" y="1" width="9" height="9" rx="3" fill="#3B78F4"/>
                <rect x="12" y="1" width="9" height="9" rx="3" fill="#A8C4FA"/>
                <rect x="1" y="12" width="9" height="9" rx="3" fill="#A8C4FA"/>
                <rect x="12" y="12" width="9" height="9" rx="3" fill="#3B78F4"/>
            </svg>
        </div>
        <div class="app-name">Hackathon</div>
        <div class="app-sub">Silakan masuk untuk melanjutkan</div>
    </div>

    <div class="login-divider"></div>

    {{-- Session Status --}}
    <x-auth-session-status class="mb-4" :status="session('status')" />

    {{-- Error dari Laravel (kredensial salah, dll) --}}
    @if ($errors->any())
        <div class="laravel-error">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" id="loginForm">
        @csrf

        {{-- Email --}}
        <div class="login-field">
            <label for="email">Email</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="budi@gmail.com"
                autofocus
                autocomplete="username"
            >
            <div class="field-error-msg" id="email-error">Field harus terisi!</div>
        </div>

        {{-- Kata Sandi --}}
        <div class="login-field">
            <label for="password">Kata Sandi</label>
            <input
                id="password"
                type="password"
                name="password"
                placeholder="••••••••"
                autocomplete="current-password"
            >
            <div class="field-error-msg" id="password-error">Field harus terisi!</div>
        </div>

        {{-- Remember Me & Lupa Kata Sandi --}}
        <div class="login-row">
            <label class="remember-label">
                <input type="checkbox" name="remember"> Ingat saya
            </label>
            @if (Route::has('password.request'))
                <a class="forgot-link" href="{{ route('password.request') }}">Lupa kata sandi?</a>
            @endif
        </div>

        <button type="submit" class="login-btn">Masuk</button>

        <div class="login-footer">
            Gunakan akun yang telah didaftarkan oleh admin
        </div>
    </form>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            let valid = true;
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            const emailError = document.getElementById('email-error');
            const passwordError = document.getElementById('password-error');

            emailError.classList.remove('visible');
            passwordError.classList.remove('visible');
            email.classList.remove('input-error');
            password.classList.remove('input-error');

            if (!email.value.trim()) {
                emailError.classList.add('visible');
                email.classList.add('input-error');
                valid = false;
            }
            if (!password.value.trim()) {
                passwordError.classList.add('visible');
                password.classList.add('input-error');
                valid = false;
            }
            if (!valid) e.preventDefault();
        });
    </script>

</x-guest-layout>