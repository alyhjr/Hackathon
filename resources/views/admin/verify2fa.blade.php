<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verifikasi 2FA</title>
  <style>
    * { margin:0; padding:0; box-sizing:border-box; }
    body {
      background: ffffff;
      min-height:100vh;
      display:flex; align-items:center; justify-content:center;
      font-family:'Segoe UI',sans-serif;
    }
    .card {
  background: linear-gradient(160deg, #1f3b64, #2b518a);
  border:1px solid rgba(255,255,255,0.08);
  border-radius:16px;
  padding:40px 36px;
  width:400px;
  max-width:95%;
  text-align:center;
}
    .icon { font-size:44px; margin-bottom:14px; display:block; }
    h1 { color:#fff; font-size:22px; font-weight:700; margin-bottom:8px; }
    .sub { color:rgba(255,255,255,0.4); font-size:13px; line-height:1.6; margin-bottom:24px; }
    .sub strong { color:rgba(255,255,255,0.75); }
    .alert {
      background:rgba(220,53,69,0.15);
      border:1px solid rgba(220,53,69,0.3);
      color:#ff7b88;
      padding:12px 14px; border-radius:8px;
      font-size:13px; margin-bottom:16px;
      text-align:left;
    }
    label {
      display:block; font-size:11px; font-weight:600;
      color:rgba(255,255,255,0.4); letter-spacing:1px;
      text-transform:uppercase; margin-bottom:10px;
      text-align:left;
    }
    .otp-row { display:flex; justify-content:center; gap:10px; margin-bottom:10px; }
    .otp-box {
      width:52px; height:58px;
      background:rgba(255,255,255,0.05);
      border:2px solid rgba(255,255,255,0.12);
      border-radius:10px;
      color:#fff; font-size:22px; font-weight:700;
      text-align:center;
      font-family:'Courier New',monospace;
      outline:none; transition:all 0.2s;
    }
    .otp-box:focus {
      border-color:#4da6ff;
      background:rgba(77,166,255,0.1);
      box-shadow:0 0 0 3px rgba(77,166,255,0.2);
    }
    .otp-box.filled { border-color:rgba(77,166,255,0.5); }
    .timer {
      display:flex; align-items:center; justify-content:center;
      gap:10px; margin:14px 0 22px;
    }
    .timer-circle { position:relative; width:40px; height:40px; }
    .timer-circle svg { transform:rotate(-90deg); }
    .timer-circle circle { fill:none; stroke-width:3; stroke-linecap:round; }
    .ring-bg { stroke:rgba(255,255,255,0.1); }
    .ring-fill { stroke:#4da6ff; stroke-dasharray:107; transition:stroke-dashoffset 1s linear, stroke 0.3s; }
    .timer-num {
      position:absolute; inset:0;
      display:flex; align-items:center; justify-content:center;
      font-size:11px; font-weight:700; color:#fff;
      font-family:'Courier New',monospace;
    }
    .timer-info { font-size:12px; color:rgba(255,255,255,0.35); text-align:left; line-height:1.5; }
    .timer-info strong { color:rgba(255,255,255,0.65); }
    .btn {
      width:100%;
      background:linear-gradient(90deg,#1a7fe8,#0d5dbf);
      color:#fff; border:none;
      padding:14px; border-radius:10px;
      font-size:15px; font-weight:700;
      cursor:pointer; transition:all 0.2s;
    }
    .btn:hover { filter:brightness(1.1); transform:translateY(-1px); }
    .back {
      display:block; margin-top:14px;
      font-size:13px; color:rgba(255,255,255,0.3);
      text-decoration:none;
    }
    .back:hover { color:rgba(255,255,255,0.6); }
    .tip {
      background:rgba(77,166,255,0.07);
      border:1px solid rgba(77,166,255,0.15);
      border-radius:8px; padding:12px;
      font-size:12px; color:rgba(255,255,255,0.4);
      margin-top:16px; text-align:left; line-height:1.6;
    }
    .tip strong { color:rgba(255,255,255,0.7); }
  </style>
</head>
<body>
<div class="card">

  <h1>Verifikasi 2 Langkah</h1>
  <p class="sub">
    Buka <strong>Google Authenticator</strong> di HP kamu<br>
    lalu masukkan kode 6 digit untuk<br>
    <strong>{{ $masked_email ?? '' }}</strong>
  </p>

  @if(session('error'))
  <div class="alert">⚠ {{ session('error') }}</div>
  @endif

  <form method="POST" action="{{ route('admin.2fa.verify.post') }}">
    @csrf
    <label>Kode dari Google Authenticator</label>
    <div class="otp-row">
      <input class="otp-box" type="text" id="d0" maxlength="1" inputmode="numeric" autocomplete="one-time-code">
      <input class="otp-box" type="text" id="d1" maxlength="1" inputmode="numeric" autocomplete="off">
      <input class="otp-box" type="text" id="d2" maxlength="1" inputmode="numeric" autocomplete="off">
      <input class="otp-box" type="text" id="d3" maxlength="1" inputmode="numeric" autocomplete="off">
      <input class="otp-box" type="text" id="d4" maxlength="1" inputmode="numeric" autocomplete="off">
      <input class="otp-box" type="text" id="d5" maxlength="1" inputmode="numeric" autocomplete="off">
    </div>
    <input type="hidden" name="otp_code" id="otpFull">

    <div class="timer">
      <div class="timer-circle">
        <svg viewBox="0 0 36 36" width="40" height="40">
          <circle class="ring-bg" cx="18" cy="18" r="17"/>
          <circle class="ring-fill" id="ring" cx="18" cy="18" r="17"/>
        </svg>
        <div class="timer-num" id="tNum">30</div>
      </div>
      <div class="timer-info">
        Kode berlaku <strong>30 detik</strong><br>
        Sisa: <strong id="tSec">30</strong> detik
      </div>
    </div>

    <button type="submit" class="btn" onclick="submitOTP()">
      Verifikasi & Masuk
    </button>
  </form>

  <a href="{{ route('admin.login') }}" class="back">← Kembali ke Login</a>

  <div class="tip">
  Pastikan waktu HP sinkron otomatis. Kode hanya berlaku <strong>30 detik</strong> dan tidak bisa dipakai dua kali.
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

  function submitOTP() {
    document.getElementById('otpFull').value = boxes.map(b => b.value).join('');
  }

  (function() {
    const C = 2 * Math.PI * 17;
    const ring = document.getElementById('ring');
    const tNum = document.getElementById('tNum');
    const tSec = document.getElementById('tSec');
    ring.style.strokeDasharray = C;
    setInterval(() => {
      const r = 30 - (Math.floor(Date.now()/1000) % 30);
      tNum.textContent = r;
      tSec.textContent = r;
      ring.style.strokeDashoffset = C * (1 - r/30);
      ring.style.stroke = r <= 5 ? '#ff4757' : r <= 10 ? '#ffa502' : '#4da6ff';
    }, 1000);
  })();
</script>
</body>
</html>