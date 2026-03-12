<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Admin Login — Hackathon Rumah Pendidikan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #0a1628 0%, #0d2444 50%, #0a1628 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 1.5rem;
            padding: 2.5rem;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.4);
        }
        .input-field {
            width: 100%;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 0.75rem;
            padding: 0.75rem 1rem 0.75rem 2.75rem;
            color: white;
            font-size: 0.875rem;
            transition: all 0.2s;
            outline: none;
        }
        .input-field::placeholder { color: rgba(255,255,255,0.35); }
        .input-field:focus {
            border-color: #0072BC;
            background: rgba(0,114,188,0.1);
            box-shadow: 0 0 0 3px rgba(0,114,188,0.2);
        }
        .btn-submit {
            width: 100%;
            padding: 0.875rem;
            background: #0072BC;
            color: white;
            font-weight: 700;
            font-size: 0.875rem;
            border-radius: 0.75rem;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 4px 15px rgba(0,114,188,0.4);
        }
        .btn-submit:hover {
            background: #005fa3;
            box-shadow: 0 6px 20px rgba(0,114,188,0.5);
            transform: translateY(-1px);
        }
        .btn-submit:active { transform: translateY(0); }
        label {
            display: block;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: rgba(255,255,255,0.5);
            margin-bottom: 0.5rem;
        }
        .error-box {
            background: rgba(239,68,68,0.15);
            border: 1px solid rgba(239,68,68,0.3);
            border-radius: 0.75rem;
            padding: 0.75rem 1rem;
            color: #fca5a5;
            font-size: 0.8rem;
            margin-bottom: 1.25rem;
        }
        .field-error {
            color: #fca5a5;
            font-size: 0.75rem;
            margin-top: 0.375rem;
        }
    </style>
</head>
<body>
    <div class="card">
        {{-- Logo & Header --}}
        <div class="text-center mb-8">
            <img src="{{ asset('image/header/kemendikdasmen.png') }}" alt="Kemendikdasmen"
                 class="h-12 w-auto object-contain mx-auto mb-4"/>
            <div class="inline-flex items-center gap-2 bg-red-500/20 border border-red-500/30 rounded-full px-3 py-1 mb-3">
                <span class="w-1.5 h-1.5 bg-red-400 rounded-full"></span>
                <span class="text-red-300 text-xs font-bold uppercase tracking-wider">Admin Panel</span>
            </div>
            <h1 class="text-2xl font-extrabold text-white">Masuk sebagai Admin</h1>
            <p class="mt-1 text-sm text-white/40">Hackathon Rumah Pendidikan 2026</p>
        </div>

        {{-- Error --}}
        @if ($errors->any())
            <div class="error-box flex items-center gap-2">
                <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                </svg>
                {{ $errors->first() }}
            </div>
        @endif

        {{-- Session Status --}}
        @if (session('status'))
            <div class="error-box" style="background:rgba(34,197,94,0.15);border-color:rgba(34,197,94,0.3);color:#86efac;">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login') }}" id="adminLoginForm">
            @csrf

            <div class="mb-5">
                <label>Email</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-white/30">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/>
                        </svg>
                    </span>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                        placeholder="admin@email.com"
                        class="input-field" autofocus autocomplete="username"/>
                </div>
                <span id="email-error" class="field-error hidden">Field harus terisi!</span>
            </div>

            <div class="mb-6">
                <label>Kata Sandi</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-white/30">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                        </svg>
                    </span>
                    <input id="password" type="password" name="password"
                        placeholder="••••••••"
                        class="input-field pr-11" autocomplete="current-password"/>
                    <button type="button" id="togglePassword"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-white/30 hover:text-white/60 transition">
                        <svg id="eyeIcon" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                        </svg>
                    </button>
                </div>
                <span id="password-error" class="field-error hidden">Field harus terisi!</span>
            </div>

            <button type="submit" class="btn-submit">Masuk ke Panel Admin</button>
        </form>

        <div class="mt-6 text-center">
            <a href="{{ route('home') }}" class="text-xs text-white/30 hover:text-white/60 transition">
                ← Kembali ke beranda
            </a>
        </div>
    </div>

    <script>
    document.getElementById('togglePassword').addEventListener('click', function() {
        const pwd = document.getElementById('password');
        const icon = document.getElementById('eyeIcon');
        if (pwd.type === 'password') {
            pwd.type = 'text';
            icon.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/>';
        } else {
            pwd.type = 'password';
            icon.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>';
        }
    });

    document.getElementById('adminLoginForm').addEventListener('submit', function(e) {
        let valid = true;
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const emailError = document.getElementById('email-error');
        const passwordError = document.getElementById('password-error');
        emailError.classList.add('hidden');
        passwordError.classList.add('hidden');
        if (!email.value.trim()) { emailError.classList.remove('hidden'); valid = false; }
        if (!password.value.trim()) { passwordError.classList.remove('hidden'); valid = false; }
        if (!valid) e.preventDefault();
    });
    </script>
</body>
</html>