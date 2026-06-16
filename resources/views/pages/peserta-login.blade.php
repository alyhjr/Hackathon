@extends('layouts.peserta')

@section('content')
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
  *{box-sizing:border-box;margin:0;padding:0;}
  body{margin:0;}
  .wrap{font-family:'Poppins',sans-serif;min-height:100vh;background:#fff;display:flex;align-items:center;justify-content:center;padding:2rem;}
  .card{background:#fff;border-radius:24px;width:100%;max-width:800px;display:flex;overflow:hidden;box-shadow:0 20px 60px rgba(21,88,168,0.13);border:1px solid #E8F0FE;}
  .blob-side{width:280px;flex-shrink:0;position:relative;overflow:hidden;min-height:420px;}
  .blob-side svg{position:absolute;top:0;left:0;width:100%;height:100%;}
  .form-side{flex:1;padding:3rem 2.5rem;display:flex;flex-direction:column;justify-content:center;}
  .f-title{font-size:30px;font:bold;font-weight:700;color:#0F172A;margin-bottom:4px;}
  .f-sub{font-size:13px;color:black;margin-bottom:1.75rem;}
  .field{margin-bottom:1rem;position:relative;}
  .field label{display:block;font-size:11px;font-weight:700;color:black;letter-spacing:0.07em;text-transform:uppercase;margin-bottom:6px;}
  .field input{width:100%;height:46px;border:none;border-radius:12px;background:#F1F5F9;padding:0 46px 0 16px;font-size:14px;font-family:inherit;color:#0F172A;outline:none;transition:background 0.15s;}
  .field input:focus{background:#E8F0FE;}
  .field input::placeholder{color:#B0BEC5;}
  .eye-btn{position:absolute;right:14px;top:34px;background:none;border:none;cursor:pointer;padding:0;display:flex;align-items:center;}
  .hint{font-size:11px;color:black;margin-top:5px;}
  .row-extras{display:flex;align-items:center;justify-content:space-between;margin-bottom:1rem;}
  .remember-label{display:flex;align-items:center;gap:8px;font-size:13px;color:#334155;cursor:pointer;user-select:none;}
  .remember-label input[type="checkbox"]{width:16px;height:16px;accent-color:#1558A8;cursor:pointer;}
  .forgot-link{font-size:13px;color:#1558A8;font-weight:600;text-decoration:none;}
  .forgot-link:hover{text-decoration:underline;}
  .recaptcha-box{border:1px solid #D1D5DB;border-radius:4px;background:#F9FAFB;padding:12px 14px;display:flex;align-items:center;justify-content:space-between;margin-bottom:1.25rem;}
  .recaptcha-left{display:flex;align-items:center;gap:12px;}
  .recaptcha-left input[type="checkbox"]{width:24px;height:24px;accent-color:#1558A8;cursor:pointer;flex-shrink:0;}
  .recaptcha-left span{font-size:14px;color:#333;}
  .recaptcha-right{display:flex;flex-direction:column;align-items:center;gap:2px;}
  .recaptcha-right img{width:32px;height:32px;}
  .recaptcha-right .rc-label{font-size:8px;color:#555;line-height:1.2;text-align:center;}
  .recaptcha-right .rc-links{font-size:7px;color:#999;text-align:center;}
  .btn{width:100%;height:46px;border:none;border-radius:12px;background:linear-gradient(90deg,#1558A8,#1E90D6);color:#fff;font-size:14px;font-weight:700;font-family:inherit;cursor:pointer;margin-top:0.5rem;letter-spacing:0.02em;transition:opacity 0.15s;}
  .btn:hover{opacity:0.9;}
  .foot{text-align:center;font-size:12px;color:black;margin-top:1.25rem;}
  .foot a{color:#1558A8;font-weight:600;text-decoration:none;}
  .alert-ok{background:#F0FDF4;border:1px solid #BBF7D0;border-radius:10px;padding:10px 14px;margin-bottom:1.25rem;font-size:12px;color:#15803D;line-height:1.5;}
  .alert-err{background:#FEF2F2;border:1px solid #FECACA;border-radius:10px;padding:10px 14px;margin-bottom:1.25rem;font-size:12px;color:#DC2626;line-height:1.5;}
</style>

<div class="wrap">
  <div class="card">
    <div class="blob-side">
      <svg viewBox="0 0 280 600" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
        <defs>
          <linearGradient id="g1" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" style="stop-color:#1E90D6"/>
            <stop offset="100%" style="stop-color:#0A2D6E"/>
          </linearGradient>
          <linearGradient id="g2" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" style="stop-color:#1558A8"/>
            <stop offset="100%" style="stop-color:#1E90D6"/>
          </linearGradient>
        </defs>
        <rect width="280" height="600" fill="url(#g1)"/>
        <path d="M280 0 Q180 80 200 200 Q220 320 160 400 Q100 480 180 600 L280 600 Z" fill="url(#g2)" opacity="0.5"/>
        <circle cx="200" cy="100" r="60" fill="rgba(255,255,255,0.08)"/>
        <circle cx="230" cy="140" r="35" fill="rgba(255,255,255,0.06)"/>
        <circle cx="160" cy="480" r="50" fill="rgba(255,255,255,0.07)"/>
        <circle cx="200" cy="520" r="28" fill="rgba(255,255,255,0.05)"/>
        <path d="M0 300 Q80 260 120 300 Q160 340 280 300 L280 600 L0 600 Z" fill="rgba(255,255,255,0.04)"/>
      </svg>
    </div>

    <div class="form-side">
      <div class="f-title">Login Peserta</div>
      <div class="f-sub">Masuk ke akun peserta Hackathon Rumah Pendidikan</div>

      @if(session('status'))
        <div class="alert-ok">{{ session('status') }}</div>
      @endif

      @if(session('gagal'))
        <div class="alert-err">{{ session('gagal') }}</div>
      @endif

      @if($errors->any())
        <div class="alert-err">{{ $errors->first() }}</div>
      @endif

      <form method="POST" action="{{ route('peserta.login.post') }}">
        @csrf

        <div class="field">
          <label>Email</label>
          <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required>
        </div>

        <div class="field">
          <label>Password</label>
          <input type="password" name="password" id="password" placeholder="••••••••" required>
          <button class="eye-btn" onclick="togglePass()" type="button">
            <svg id="eye-show" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#94A3B8" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            <svg id="eye-hide" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#94A3B8" stroke-width="2" style="display:none"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
          </button>
          <div class="hint">Format ddmmyyyy · contoh: 15051990</div>
        </div>

        {{-- Ingat Saya + Lupa Password --}}
        <div class="row-extras">
          <label class="remember-label">
            <input type="checkbox" name="remember">
            Ingat saya
          </label>
          <a href="{{ route('password.request') }}" class="forgot-link">Lupa Password?</a>
        </div>

        {{-- reCAPTCHA Visual (ganti dengan Google reCAPTCHA v2 jika sudah punya site key) --}}
        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.key') }}"></div>

        <button type="submit" class="btn">Masuk</button>
      </form>

      <div class="foot">
        Belum terdaftar? <a href="{{ route('registrasi') }}">Daftar di sini</a>
      </div>
    </div>
  </div>
</div>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
  function togglePass() {
    const input = document.getElementById('password');
    const showIcon = document.getElementById('eye-show');
    const hideIcon = document.getElementById('eye-hide');
    if (input.type === 'password') {
      input.type = 'text';
      showIcon.style.display = 'none';
      hideIcon.style.display = 'block';
    } else {
      input.type = 'password';
      showIcon.style.display = 'block';
      hideIcon.style.display = 'none';
    }
  }
</script>
@endsection