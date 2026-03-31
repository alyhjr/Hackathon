<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login — Kemendikdasmen</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<style>
*{margin:0;padding:0;box-sizing:border-box}
:root{--bg:#020817;--border:rgba(255,255,255,.08);--blue:#1d6fff;}
body{font-family:'Plus Jakarta Sans',sans-serif;background:var(--bg);display:flex;align-items:center;justify-content:center;min-height:100vh;}
.modal{width:100%;max-width:780px;display:flex;border-radius:20px;overflow:hidden;box-shadow:0 24px 80px rgba(0,0,0,.6);}
.panel-left{width:42%;background:linear-gradient(145deg,#0d2a4a,#1a4a7a);display:flex;align-items:center;justify-content:center;flex-direction:column;gap:20px;padding:40px 28px;position:relative;overflow:hidden;}
.panel-left::before,.panel-left::after{content:'';position:absolute;border-radius:50%;background:rgba(255,255,255,.06);}
.panel-left::before{width:220px;height:220px;top:-60px;left:-60px}
.panel-left::after{width:180px;height:180px;bottom:-50px;right:-50px}
.panel-logo{font-size:13px;color:rgba(255,255,255,.7);letter-spacing:.5px;z-index:1;}
.panel-logo span{color:#f0a500;font-weight:600}
.panel-title{font-size:22px;font-weight:600;color:#fff;text-align:center;z-index:1;line-height:1.4;}
.panel-sub{font-size:12px;color:rgba(255,255,255,.55);text-align:center;z-index:1;line-height:1.6;}
.panel-right{flex:1;background:#fff;padding:40px 36px;position:relative;}
.close-btn{position:absolute;top:16px;right:16px;width:28px;height:28px;border-radius:50%;border:none;background:rgba(0,0,0,.06);color:#999;font-size:16px;cursor:pointer;display:flex;align-items:center;justify-content:center;}
.close-btn:hover{background:rgba(0,0,0,.1)}
.form-title{font-size:22px;font-weight:700;color:#111;margin-bottom:4px;}
.form-sub{font-size:13px;color:#888;margin-bottom:28px;line-height:1.5;}
label{font-size:11px;font-weight:600;color:#888;letter-spacing:.5px;display:block;margin-bottom:6px;}
input[type=email],input[type=password]{width:100%;padding:11px 14px;border:1.5px solid #e5e7eb;border-radius:10px;font-size:14px;color:#111;outline:none;background:#fff;transition:border-color .2s;}
input:focus{border-color:#1d6fff}
input::placeholder{color:#bbb}
.field{margin-bottom:16px;position:relative;}
.pw-wrap{position:relative}
.pw-wrap input{padding-right:42px}
.toggle-pw{position:absolute;right:12px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:#bbb;font-size:16px;}
.check-row{display:flex;align-items:center;gap:8px;margin-bottom:16px;}
.check-row input[type=checkbox]{width:16px;height:16px;accent-color:#1d6fff;cursor:pointer;}
.check-row span{font-size:13px;color:#555;}
.forgot{font-size:13px;color:#1d6fff;text-decoration:none;margin-left:auto;}
.forgot:hover{text-decoration:underline}
.captcha-wrap{margin-bottom:20px;}
.btn{width:100%;padding:13px;border:none;border-radius:10px;background:#1d6fff;color:#fff;font-size:15px;font-weight:600;cursor:pointer;transition:background .2s;}
.btn:hover{background:#155ee0}
.back-link{display:block;text-align:center;margin-top:16px;font-size:13px;color:#999;text-decoration:none;}
.back-link:hover{color:#1d6fff}
.alert{background:#fef2f2;border:1px solid #fecaca;border-radius:8px;padding:10px 12px;font-size:12px;color:#dc2626;margin-bottom:14px;}
.err{font-size:11px;color:#dc2626;margin-top:4px;}
</style>
</head>
<body>

<div class="modal">
  <div class="panel-left">
    <div class="panel-logo">Kemen<span>dikdasmen</span></div>
    <div class="panel-title">Admin Panel</div>
    <div class="panel-sub">Hackathon Rumah Pendidikan 2026<br>Masuk sebagai administrator</div>
  </div>

  <div class="panel-right">
    <a href="{{ url('/') }}" class="close-btn">×</a>

    <div class="form-title">Login Admin</div>
    <div class="form-sub">Masuk ke akun admin Hackathon Rumah Pendidikan</div>

    @if(session('error'))
    <div class="alert">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.login') }}">
    @csrf

    <div class="field">
      <label>EMAIL</label>
      <input type="email" name="email" placeholder="nama@email.com"
             value="{{ old('email') }}" required>
    </div>

    <div class="field">
      <label>KATA SANDI</label>
      <div class="pw-wrap">
        <input type="password" name="password" id="pw" placeholder="••••••••" required>
        <button type="button" class="toggle-pw" onclick="togglePw()">👁</button>
      </div>
    </div>

    <div class="check-row">
      <input type="checkbox" name="remember" id="remember">
      <span>Ingat saya</span>
      <a href="#" class="forgot">Lupa password?</a>
    </div>

    {{-- reCAPTCHA v2 --}}
    <div class="captcha-wrap">
      <div class="g-recaptcha"
           data-sitekey="{{ config('services.recaptcha.key') }}">
      </div>
      @if(session('captcha_error'))
      <div class="err">{{ session('captcha_error') }}</div>
      @endif
    </div>

    <button type="submit" class="btn">Masuk</button>
    </form>

    <a href="{{ url('/') }}" class="back-link">← Kembali ke beranda</a>
  </div>
</div>

<script>
function togglePw(){
  const pw=document.getElementById('pw');
  pw.type=pw.type==='password'?'text':'password';
}
</script>
</body>
</html>