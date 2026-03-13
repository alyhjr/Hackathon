<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <style>
    *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }

    body {
      min-height: 100vh;
      display: flex; align-items: center; justify-content: center;
      font-family: 'Segoe UI', system-ui, sans-serif;
      background: linear-gradient(135deg, #1a2a4a 0%, #0d2137 100%);
      padding: 20px;
    }

    .modal {
      background: #fff;
      border-radius: 20px;
      padding: 36px 32px;
      width: 100%;
      max-width: 420px;
      box-shadow: 0 24px 60px rgba(0,0,0,0.25);
      position: relative;
    }

    .modal-logo {
      display: flex; align-items: center; gap: 10px;
      margin-bottom: 24px;
    }
    .modal-logo img { height: 36px; }
    .modal-logo-text { font-size: 18px; font-weight: 800; color: #1a1a2e; }
    .modal-logo-text span { color: #f0a500; }

    .modal h1 { font-size: 24px; font-weight: 800; color: #1a1a2e; margin-bottom: 6px; }
    .modal .subtitle { font-size: 13px; color: #888; margin-bottom: 28px; line-height: 1.5; }

    .alert {
      padding: 11px 14px; border-radius: 10px;
      font-size: 13px; margin-bottom: 18px;
      display: flex; align-items: center; gap: 8px;
    }
    .alert-error { background: #fff0f0; border: 1px solid #ffd0d0; color: #cc3333; }
    .alert-success { background: #f0fff4; border: 1px solid #b2f5c8; color: #227a45; }

    .field { margin-bottom: 16px; }
    .field-label {
      display: flex; justify-content: space-between; align-items: center;
      font-size: 11px; font-weight: 700; color: #555;
      letter-spacing: 1px; text-transform: uppercase; margin-bottom: 8px;
    }
    .input-wrap { position: relative; }
    input[type="email"], input[type="password"] {
      width: 100%;
      background: #f5f7fa;
      border: 1.5px solid #e8eaf0;
      color: #1a1a2e;
      padding: 13px 16px;
      border-radius: 10px; font-size: 14px; outline: none;
      transition: all .2s; font-family: inherit;
    }
    input[type="email"]:focus, input[type="password"]:focus {
      border-color: #1a7fe8;
      background: #fff;
      box-shadow: 0 0 0 3px rgba(26,127,232,.1);
    }
    input::placeholder { color: #bbb; }
    .toggle-pw {
      position: absolute; right: 14px; top: 50%; transform: translateY(-50%);
      background: none; border: none; color: #aaa;
      cursor: pointer; font-size: 16px; padding: 0; transition: color .2s;
    }
    .toggle-pw:hover { color: #555; }

    /* Robot checkbox */
    .robot-wrap {
      display: flex; align-items: center; gap: 10px;
      padding: 13px 16px;
      background: #f5f7fa;
      border: 1.5px solid #e8eaf0;
      border-radius: 10px;
      cursor: pointer; transition: all .2s; user-select: none;
    }
    .robot-wrap:hover { border-color: #1a7fe8; }
    .robot-wrap.checked { border-color: #1a7fe8; background: #f0f6ff; }
    .robot-tick {
      width: 20px; height: 20px; flex-shrink: 0;
      border: 2px solid #ccc; border-radius: 4px;
      display: flex; align-items: center; justify-content: center;
      font-size: 12px; color: #fff; transition: all .2s;
    }
    .robot-wrap.checked .robot-tick { background: #1a7fe8; border-color: #1a7fe8; }
    .robot-text { font-size: 14px; color: #444; flex: 1; }
    .robot-logo { font-size: 20px; opacity: .4; }
    .robot-err { color: #cc3333; font-size: 12px; margin-top: 6px; display: none; }

    .btn-submit {
      width: 100%; margin-top: 8px;
      background: linear-gradient(90deg, #1a7fe8, #0d5dbf);
      color: #fff; border: none; padding: 14px;
      border-radius: 10px; font-size: 15px; font-weight: 700;
      cursor: pointer; transition: all .2s; font-family: inherit;
    }
    .btn-submit:hover {
      background: linear-gradient(90deg, #2a8ff8, #1d6de0);
      transform: translateY(-1px);
      box-shadow: 0 8px 24px rgba(26,127,232,.3);
    }
    .btn-submit:active { transform: translateY(0); }

    .form-footer {
      text-align: center; margin-top: 20px;
    }
    .form-footer a {
      font-size: 13px; color: #aaa; text-decoration: none; transition: color .2s;
    }
    .form-footer a:hover { color: #1a7fe8; }

    .security-row {
      display: flex; justify-content: center; gap: 12px;
      margin-top: 20px; padding-top: 16px;
      border-top: 1px solid #f0f0f0;
    }
    .sbadge {
      font-size: 10px; color: #bbb;
      background: #f5f7fa; border: 1px solid #e8eaf0;
      padding: 3px 10px; border-radius: 20px;
    }
  </style>
</head>
<body>

<div class="modal">

  <div class="modal-logo">
    <img src="{{ asset('images/logo-kemendikdasmen.png') }}" alt="Logo"
         onerror="this.style.display='none'">
    <div class="modal-logo-text">Kemen<span>dikdasmen</span></div>
  </div>

  <h1>Selamat datang</h1>
  <p class="subtitle">Masuk ke Hackathon Rumah Pendidikan 2026</p>

  @if(session('success'))
    <div class="alert alert-success">✅ {{ session('success') }}</div>
  @endif
  @if(session('error'))
    <div class="alert alert-error">⚠ {{ session('error') }}</div>
  @endif

  <form method="POST" action="{{ route('admin.login.post') }}" id="loginForm">
    @csrf

    <div class="field">
      <div class="field-label"><span>Email</span></div>
      <div class="input-wrap">
        <input type="email" name="email"
               value="{{ old('email') }}"
               placeholder="nama@email.com"
               required autofocus autocomplete="username">
      </div>
      @error('email')
        <div style="color:#cc3333;font-size:12px;margin-top:5px;">{{ $message }}</div>
      @enderror
    </div>

    <div class="field">
      <div class="field-label">
        <span>Kata Sandi</span>
      </div>
      <div class="input-wrap">
        <input type="password" name="password" id="pwInput"
               placeholder="••••••••"
               required autocomplete="current-password">
        <button type="button" class="toggle-pw" onclick="togglePW()" id="toggleBtn">👁</button>
      </div>
    </div>

    <div class="field">
      <div class="robot-wrap" id="robotBox" onclick="toggleRobot()">
        <div class="robot-tick" id="robotTick"></div>
        <span class="robot-text">Saya bukan robot</span>
        <span class="robot-logo">🤖</span>
      </div>
      <div class="robot-err" id="robotErr">⚠ Centang verifikasi terlebih dahulu</div>
      <input type="hidden" name="robot_checked" id="robotInput" value="0">
    </div>

    <button type="submit" class="btn-submit" onclick="return validateForm()">
      Masuk
    </button>
  </form>

  <div class="form-footer">
    <a href="{{ url('/') }}">← Kembali ke beranda</a>
  </div>

  <div class="security-row">
    <span class="sbadge">🔐 2FA</span>
    <span class="sbadge">🔒 SSL</span>
    <span class="sbadge">🛡 CSRF</span>
  </div>

</div>

<script>
function togglePW() {
  const inp = document.getElementById('pwInput');
  const btn = document.getElementById('toggleBtn');
  inp.type = inp.type === 'password' ? 'text' : 'password';
  btn.textContent = inp.type === 'password' ? '👁' : '🙈';
}

let robotChecked = false;
function toggleRobot() {
  robotChecked = !robotChecked;
  document.getElementById('robotBox').classList.toggle('checked', robotChecked);
  document.getElementById('robotTick').textContent = robotChecked ? '✓' : '';
  document.getElementById('robotInput').value = robotChecked ? '1' : '0';
  if (robotChecked) document.getElementById('robotErr').style.display = 'none';
}

function validateForm() {
  if (!robotChecked) {
    document.getElementById('robotErr').style.display = 'block';
    return false;
  }
  return true;
}
</script>

</body>
</html>