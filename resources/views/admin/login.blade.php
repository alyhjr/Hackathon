<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://www.google.com/recaptcha/api.js?hl=id"></script>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    :root { --border: rgba(255,255,255,.08); --blue: #1d6fff; }

    body {
      font-family: 'Inter', sans-serif;
      background: #ffffff;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }

    .modal {
  width: 100%;
  max-width: 780px;
  min-height: 480px;
  display: flex;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: none;
  border: 1px solid #e5e7eb;

}
#forgotModal label {
  font-size: 11.5px;
  font-weight: 700;
  color: #888;
  letter-spacing: 0;
}
#forgotModal .pw-wrap:focus-within {
  border-color: #e5e7eb;
}
#forgotModal .pw-wrap {
  min-height: 44px;
  padding: 0;
  align-items: center;
}

#forgotModal .pw-wrap input {
  padding: 11px 14px !important;
  line-height: normal !important;
  height: 44px;
}

    /* Panel Kiri */
    .panel-left {
      width: 42%;
      background: linear-gradient(145deg, #0d2a4a, #1a4a7a);
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      gap: 20px;
      padding: 40px 28px;
      position: relative;
      overflow: hidden;
    }
    .panel-left::before,
    .panel-left::after {
      content: '';
      position: absolute;
      border-radius: 50%;
      background: rgba(255,255,255,.06);
    }
    .panel-left::before { width: 220px; height: 220px; top: -60px; left: -60px; }
    .panel-left::after  { width: 180px; height: 180px; bottom: -50px; right: -50px; }

    .panel-logo       { font-size: 13px; color: rgba(255,255,255,.7); letter-spacing: .5px; z-index: 1; }
    .panel-logo span  { color: #f0a500; font-weight: 600; }
    .panel-title      { font-size: 22px; font-weight: 600; color: #fff; text-align: center; z-index: 1; line-height: 1.4; }
    .panel-sub        { font-size: 12px; color: rgba(255,255,255,.55); text-align: center; z-index: 1; line-height: 1.6; }

    /* Panel Kanan */
    .panel-right { flex: 1; background: #fff; padding: 40px 36px; position: relative; }

    .close-btn {
  position: absolute;
  top: 16px; right: 16px;
  width: 32px; height: 32px;
  border-radius: 50%;
  border: none;
  background: #f1f5f9;
  color: #94a3b8;
  font-size: 18px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  line-height: 1;
  text-decoration: none;
}
.close-btn:hover { background: #f1f5f9; color: #94a3b8; }

   .form-title { font-size: 30px; font-weight: 800; color: #000; margin-bottom: 4px; }
   .form-sub { font-size: 14px; color: #111; margin-bottom: 28px; line-height: 1.5; }
    label {
  font-size: 11.5px;
  font-weight: 700;
  color: #111;
  letter-spacing: 0;
  display: block;
  margin-bottom: 6px;
}

    input[type=email],
    input[type=password] {
      width: 100%;
      padding: 11px 14px;
      border: 1px solid #e5e7eb;
      border-radius: 10px;
      font-size: 14px;
      color: #111;
      outline: none;
      background: #f9fafb;
      transition: border-color .2s;
    }
    input:focus        { border-color: #1d4e8f; }
    input::placeholder { color: #bbb; }

    .field   { margin-bottom: 16px; position: relative; }

   .pw-wrap {
  display: flex;
  align-items: center;
  background: #f9fafb;
  border: 1px solid #e5e7eb;
  border-radius: 10px;
  transition: border-color .2s;
  min-height: 44px;
}
    .pw-wrap:focus-within { border-color: #1d4e8f; }
   .pw-wrap input {
  border: none !important;
  background: transparent;
  flex: 1;
  outline: none !important;
  padding: 11px 14px !important;
  line-height: normal !important;
}

    .toggle-pw {
      position: static;
      transform: none;
      padding: 0 12px;
      flex-shrink: 0;
      background: none;
      border: none;
      cursor: pointer;
      color: #bbb;
    }

    .check-row { display: flex; align-items: center; gap: 8px; margin-bottom: 16px; }
    .check-row input[type=checkbox] { width: 16px; height: 16px; accent-color: #1d6fff; cursor: pointer; }
    .check-row span { font-size: 13px; color: #555; }

    .forgot { font-size: 13px; color: #1d6fff; text-decoration: none; margin-left: auto; }
    .forgot:hover { text-decoration: none; }
    .captcha-wrap { margin-bottom: 20px; }

    .btn { width: 100%; padding: 13px; border: none; border-radius: 10px; background: #1d4e8f; color: #fff; font-size: 15px; font-weight: 600; cursor: pointer; transition: background .2s; }
    .btn:hover { background: #163d70; }

    .back-link { display: block; text-align: center; margin-top: 16px; font-size: 13px; color: #999; text-decoration: none; }
    .back-link:hover { color: #163d70;}

    .alert { background: #fef2f2; border: 1px solid #fecaca; border-radius: 8px; padding: 10px 12px; font-size: 12px; color: #dc2626; margin-bottom: 14px; }
    .err   { font-size: 11px; color: #dc2626; margin-top: 4px; }
  </style>
</head>
<body>

<div class="modal">

  {{-- Panel Kiri --}}
  <div class="panel-left">
    <div class="panel-logo">Kemen<span>dikdasmen</span></div>
    <div class="panel-title">Admin Panel</div>
    <div class="panel-sub">Hackathon Rumah Pendidikan 2026<br>Masuk sebagai administrator</div>
  </div>

  {{-- Panel Kanan --}}
  <div class="panel-right">
    <a href="{{ url('/') }}" class="close-btn">×</a>

    <div class="form-title">Login Admin</div>
    <div class="form-sub">Masuk ke akun admin Hackathon Rumah Pendidikan</div>

    @if(session('error'))
      <div class="alert">{{ session('error') }}</div>
    @endif

    @if(session('captcha_error'))
      <div class="alert">{{ session('captcha_error') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.login.post') }}">
      @csrf

      <div class="field">
        <label>EMAIL</label>
        <input type="email" name="email" placeholder="nama@email.com"
               value="{{ old('email') }}" required>
      </div>

      <div class="field">
        <label>PASSWORD</label>
        <div class="pw-wrap">
          <input type="password" name="password" id="pw" placeholder="••••••••" required>
          <button type="button" class="toggle-pw" onclick="togglePw()">
            <svg id="pwIcon" viewBox="0 0 24 24" width="18" height="18"
                 fill="none" stroke="currentColor" stroke-width="1.7"
                 stroke-linecap="round" stroke-linejoin="round">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
              <circle cx="12" cy="12" r="3"/>
            </svg>
          </button>
        </div>
      </div>

      <div class="check-row">
        <input type="checkbox" name="remember" id="remember">
        <span>Ingat saya</span>
        <a href="#" class="forgot" onclick="openForgot(event)">Lupa password?</a>
      </div>

      <div class="captcha-wrap">
        <div class="g-recaptcha"
             data-sitekey="{{ config('services.recaptcha.key') }}"
             data-theme="light"
             data-size="normal">
        </div>
      </div>

      <button type="submit" class="btn">Masuk</button>
    </form>

    <a href="{{ url('/') }}" class="back-link"> Kembali ke beranda</a>
  </div>
</div>

{{-- Modal Lupa Password --}}
<div id="forgotModal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,.6); z-index:999; align-items:center; justify-content:center;">
  <div style="background:#fff; border-radius:20px; width:100%; max-width:440px; padding:36px; position:relative;">

    <button onclick="closeForgot()" style="position:absolute; top:14px; right:14px; width:28px; height:28px; border-radius:50%; border:none; background:rgba(0,0,0,.06); color:#999; font-size:16px; cursor:pointer;">×</button>

    <div style="font-size:22px; font-weight:700; color:#111; margin-bottom:4px;">Lupa Password?</div>
   <div style="font-size:14px; color:#111; margin-bottom:24px;">Masukkan email dan password baru Anda.</div>

    <div id="forgotError"   style="display:none; background:#fef2f2; border:1px solid #fecaca; border-radius:8px; padding:10px 12px; font-size:12px; color:#dc2626; margin-bottom:14px;"></div>
    <div id="forgotSuccess" style="display:none; background:#f0fdf4; border:1px solid #86efac; border-radius:8px; padding:10px 12px; font-size:13px; color:#16a34a; margin-bottom:14px;"></div>

    <form method="POST" action="{{ route('admin.forgot.post') }}">
      @csrf

      <div style="margin-bottom:14px;">
        <label>EMAIL ADMIN</label>
        <input type="email" name="email" placeholder="" required>
      </div>

      <div style="margin-bottom:14px;">
  <label>PASSWORD BARU</label>
  <div class="pw-wrap">
    <input type="password" name="password" id="fp1" placeholder="••••••••" required>
    <button type="button" onclick="toggleFp('fp1','icon1')" class="toggle-pw">
      <svg id="icon1" viewBox="0 0 24 24" width="18" height="18"
           fill="none" stroke="currentColor" stroke-width="1.7"
           stroke-linecap="round" stroke-linejoin="round">
        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
        <circle cx="12" cy="12" r="3"/>
      </svg>
    </button>
  </div>
</div>

      <div style="margin-bottom:20px;">
  <label>KONFIRMASI PASSWORD BARU</label>
  <div class="pw-wrap">
    <input type="password" name="password_confirmation" id="fp2" placeholder="••••••••" required>
    <button type="button" onclick="toggleFp('fp2','icon2')" class="toggle-pw">
      <svg id="icon2" viewBox="0 0 24 24" width="18" height="18"
           fill="none" stroke="currentColor" stroke-width="1.7"
           stroke-linecap="round" stroke-linejoin="round">
        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
        <circle cx="12" cy="12" r="3"/>
      </svg>
    </button>
  </div>
</div>

      <div style="display:flex; gap:10px; justify-content:flex-end; margin-top:4px;">
  <button type="button" onclick="closeForgot()"
    style="padding:11px 24px; border:1px solid #e5e7eb; border-radius:10px; background:#fff; color:#111; font-size:14px; font-weight:600; cursor:pointer;">
    Batal
  </button>
  <button type="submit"
    style="padding:11px 24px; border:none; border-radius:10px; background:#1a3a5c; color:#fff; font-size:14px; font-weight:600; cursor:pointer;">
    Simpan
  </button>
</div>
    </form>

  </div>
</div>

<script>
  const eyeOpen = `<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>`;
  const eyeOff  = `<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>`;

  function togglePw() {
    const pw   = document.getElementById('pw');
    const icon = document.getElementById('pwIcon');
    pw.type    = pw.type === 'password' ? 'text' : 'password';
    icon.innerHTML = pw.type === 'text' ? eyeOff : eyeOpen;
  }

  function toggleFp(id, iconId) {
    const el   = document.getElementById(id);
    const icon = document.getElementById(iconId);
    el.type    = el.type === 'password' ? 'text' : 'password';
    icon.innerHTML = el.type === 'text' ? eyeOff : eyeOpen;
  }

  function openForgot(e) {
    e.preventDefault();
    document.getElementById('forgotModal').style.display = 'flex';
  }

  function closeForgot() {
    document.getElementById('forgotModal').style.display = 'none';
  }

  @if(session('status'))
  document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('forgotSuccess').style.display  = 'block';
    document.getElementById('forgotSuccess').innerText      = '{{ session('status') }}';
    document.getElementById('forgotModal').style.display    = 'flex';
  });
  @endif
</script>

</body>
</html>