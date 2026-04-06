<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lupa Password - Admin</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box}
:root{--bg:#020817;--blue:#1d6fff;}
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
input[type=email]{width:100%;padding:11px 14px;border:1.5px solid #e5e7eb;border-radius:10px;font-size:14px;color:#111;outline:none;background:#fff;transition:border-color .2s;}
input:focus{border-color:#1d6fff}
input::placeholder{color:#bbb}
.field{margin-bottom:20px;}
.btn{width:100%;padding:13px;border:none;border-radius:10px;background:#1d6fff;color:#fff;font-size:15px;font-weight:600;cursor:pointer;transition:background .2s;}
.btn:hover{background:#155ee0}
.back-link{display:block;text-align:center;margin-top:16px;font-size:13px;color:#999;text-decoration:none;}
.back-link:hover{color:#1d6fff}
.alert-error{background:#fef2f2;border:1px solid #fecaca;border-radius:8px;padding:10px 12px;font-size:12px;color:#dc2626;margin-bottom:14px;}
.alert-success{background:#f0fdf4;border:1px solid #86efac;border-radius:8px;padding:12px 14px;font-size:13px;color:#16a34a;margin-bottom:14px;line-height:1.6;}
.alert-success strong{display:block;font-size:14px;margin-bottom:4px;}
</style>
</head>
<body>
<div class="modal">
  <div class="panel-left">
    <div class="panel-logo">Kemen<span>dikdasmen</span></div>
    <div class="panel-title">Reset Password</div>
    <div class="panel-sub">Masukkan email admin Anda untuk mereset password</div>
  </div>

  <div class="panel-right">
   <a href="#" class="forgot" onclick="openForgot(event)">Lupa password?</a>

    <div class="form-title">Lupa Password?</div>
    <div class="form-sub">Masukkan email admin dan password baru akan digenerate otomatis.</div>

    @if(session('error'))
    <div class="alert-error">{{ session('error') }}</div>
    @endif

    @if(session('success'))
    <div class="alert-success">
      <strong>✅ Berhasil!</strong>
      {{ session('success') }}
    </div>
    @endif

   @if(!session('success'))
<form method="POST" action="{{ route('admin.forgot.post') }}">
  @csrf
  <div class="field">
    <label>EMAIL ADMIN</label>
     <input type="email" name="email" placeholder="" required>
      </div>
           value="{{ old('email') }}" required>
  </div>
  <div class="field">
    <label>PASSWORD BARU</label>
    <input type="password" name="password" placeholder="••••••••" required>
  </div>
  <div class="field">
    <label>KONFIRMASI PASSWORD BARU</label>
    <input type="password" name="password_confirmation" placeholder="••••••••" required>
  </div>
  <button type="submit" class="btn">Reset Password</button>
</form>
@endif

    <a href="{{ route('admin.login') }}" class="back-link">← Kembali ke Login</a>
  </div>
</div>
</body>
</html>