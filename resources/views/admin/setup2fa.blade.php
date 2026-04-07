<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Setup Google Authenticator</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    * { margin:0; padding:0; box-sizing:border-box; }
  body {
  background: #ffffff;
  min-height: 100vh;
  display: flex; align-items: center; justify-content: center;
  font-family: 'Inter', sans-serif;
  padding: 40px 20px;
  overflow-y: auto;
}
  .card {
  background: #ffffff;
  border: 1px solid #e5e7eb;
  border-radius: 24px;
  padding: 20px 40px 40px;
  width: 860px;
  max-width: 100%;
  margin: auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-rows: auto;
  gap: 0 32px;
}
.top { grid-column: 1 / -1; }
.steps { grid-column: 1; }
.qr-box { grid-column: 2; }
form { grid-column: 1 / -1; }
.warning { grid-column: 1 / -1; }
  .top { text-align:center; margin-bottom:28px; margin-top:0; }
    .icon { font-size:40px; margin-bottom:12px; display:block; }
    h1 { color:#111; font-size:22px; font-weight:800; margin-bottom:6px; }
    p { color:#888; font-size:13px; }
    .steps {
      background: #f8fafc;
      border: 1px solid #e5e7eb;
      border-radius:12px;
      padding:16px;
      margin-bottom:20px;
    }
    .step { display:flex; gap:12px; align-items:flex-start; margin-bottom:10px; }
    .step:last-child { margin-bottom:0; }
    .num {
      background: rgba(29,78,143,0.1);
      color:#1d4e8f;
      border-radius:50%;
      width:24px; height:24px;
      display:flex; align-items:center; justify-content:center;
      font-size:12px; font-weight:700; flex-shrink:0;
    }
    .step p { color:#555; font-size:13px; line-height:1.5; margin:0; }
    .step p strong { color:#111; }
    .qr-box {
      text-align:center;
      background: #f8fafc;
      border:1px solid #e5e7eb;
      border-radius:12px;
      padding:20px;
      margin-bottom:20px;
    }
    .qr-box img {
      width:170px; height:170px;
      border-radius:8px;
      border:4px solid white;
      background:white;
      display:block;
      margin: 0 auto 14px;
    }
    .qr-box .label { color:#888; font-size:12px; margin-bottom:8px; }
    .secret-key {
      display:inline-block;
      font-family:'Courier New',monospace;
      font-size:15px; font-weight:700;
      color:#1d4e8f;
      background:rgba(29,78,143,0.08);
      border:1px solid rgba(29,78,143,0.2);
      padding:8px 16px;
      border-radius:8px;
      letter-spacing:2px;
      cursor:pointer;
      word-break:break-all;
    }
    .secret-key:hover { background:rgba(29,78,143,0.15); }
    .copy-hint { font-size:11px; color:#bbb; margin-top:6px; }
    #copied { display:none; color:#16a34a; font-size:12px; margin-top:4px; }
    .alert {
      background:#fef2f2;
      border:1px solid #fecaca;
      color:#dc2626;
      padding:12px 14px;
      border-radius:8px;
      font-size:13px;
      margin-bottom:16px;
    }
   label {
  display:block;
  font-size:11.5px; font-weight:700;
  color:#111;
  letter-spacing:0; text-transform:uppercase;
  margin-bottom:10px;
  text-align:center;
}
    .otp-row { display:flex; justify-content:center; gap:10px; margin-bottom:20px; }
    .otp-box {
      width:52px; height:58px;
      background:#f9fafb;
      border:1.5px solid #e5e7eb;
      border-radius:10px;
      color:#111; font-size:22px; font-weight:700;
      text-align:center;
      font-family:'Courier New',monospace;
      outline:none; transition:all 0.2s;
    }
    .otp-box:focus {
      border-color:#1d4e8f;
      background:#fff;
      box-shadow:0 0 0 3px rgba(29,78,143,0.1);
    }
    .otp-box.filled { border-color:#1d4e8f; }
   .btn {
  width: auto;
  min-width: 320px;
  max-width: 320px;
  display: block;
  margin: 0 auto;
  background:#1d4e8f;
  color:#fff; border:none;
  padding:14px; border-radius:12px;
  font-size:15px; font-weight:700;
  cursor:pointer; transition:all 0.2s;
  letter-spacing:0.3px;
}
    .warning {
  background:#fffbeb;
  border:1px solid #fde68a;
  border-radius:10px;
  padding:14px; font-size:12px;
  color:#92400e;
  margin-top:16px; line-height:1.7;
  max-width: 320px;
  margin-left: auto;
  margin-right: auto;
}
  </style>
</head>
<body>
<div class="card">
  <div class="top">
    <h1>Setup Google Authenticator</h1>
    <p>Lakukan sekali saja, login berikutnya cukup input kode 6 digit</p>
  </div>

  <div class="steps">
    <div class="step">
      <div class="num">1</div>
      <p>Install <strong>Google Authenticator</strong> atau <strong>Authy</strong> di HP kamu</p>
    </div>
    <div class="step">
      <div class="num">2</div>
      <p>Tap <strong>+</strong> → pilih <strong>Scan kode QR</strong>, lalu scan gambar di bawah</p>
    </div>
    <div class="step">
      <div class="num">3</div>
      <p>Masukkan <strong>6 digit kode</strong> yang muncul di aplikasi untuk konfirmasi</p>
    </div>
  </div>

  <div class="qr-box">
    <img src="https://api.qrserver.com/v1/create-qr-code/?size=170x170&data={{ urlencode($qr_uri) }}" alt="QR Code 2FA">
    <div class="label">Tidak bisa scan? Masukkan kode ini secara manual:</div>
    <div class="secret-key" onclick="copySecret(this)" title="Klik untuk copy">{{ $secret }}</div>
    <div class="copy-hint">klik untuk menyalin</div>
    <div id="copied"> Kode berhasil disalin!</div>
  </div>

  @if(session('error'))
  <div class="alert">⚠ {{ session('error') }}</div>
  @endif

  <form method="POST" action="{{ route('admin.2fa.setup.post') }}">
    @csrf
    <label>Masukkan Kode dari Aplikasi (6 digit)</label>
    <div class="otp-row">
      <input class="otp-box" type="text" id="d0" maxlength="1" inputmode="numeric" autocomplete="off">
      <input class="otp-box" type="text" id="d1" maxlength="1" inputmode="numeric" autocomplete="off">
      <input class="otp-box" type="text" id="d2" maxlength="1" inputmode="numeric" autocomplete="off">
      <input class="otp-box" type="text" id="d3" maxlength="1" inputmode="numeric" autocomplete="off">
      <input class="otp-box" type="text" id="d4" maxlength="1" inputmode="numeric" autocomplete="off">
      <input class="otp-box" type="text" id="d5" maxlength="1" inputmode="numeric" autocomplete="off">
    </div>
    <input type="hidden" name="otp_code" id="otpFull">
    <button type="submit" class="btn" onclick="submitCode()">
       Aktifkan Google Authenticator
    </button>
  </form>

  <div class="warning">
    ⚠️ <strong>Simpan kode manual di tempat aman.</strong>
    Jika HP hilang, kode ini dibutuhkan untuk pemulihan akses.
  </div>
</div>

<script>
  const boxes = [0,1,2,3,4,5].map(i => document.getElementById('d'+i));
  boxes.forEach((box, i) => {
    box.addEventListener('input', () => {
      box.value = box.value.replace(/\D/g,'').slice(-1);
      box.classList.toggle('filled', !!box.value);
      if (box.value && i < 5) boxes[i+1].focus();
    });
    box.addEventListener('keydown', e => {
      if (e.key === 'Backspace' && !box.value && i > 0) {
        boxes[i-1].value = '';
        boxes[i-1].classList.remove('filled');
        boxes[i-1].focus();
      }
    });
    box.addEventListener('paste', e => {
      e.preventDefault();
      const txt = (e.clipboardData||window.clipboardData).getData('text').replace(/\D/g,'').slice(0,6);
      txt.split('').forEach((ch,j) => { boxes[j].value=ch; boxes[j].classList.add('filled'); });
    });
  });
  boxes[0].focus();

  function submitCode() {
    document.getElementById('otpFull').value = boxes.map(b => b.value).join('');
  }

  function copySecret(el) {
    navigator.clipboard.writeText(el.innerText.trim()).then(() => {
      document.getElementById('copied').style.display = 'block';
      setTimeout(() => document.getElementById('copied').style.display = 'none', 2000);
    });
  }
</script>
</body>
</html>