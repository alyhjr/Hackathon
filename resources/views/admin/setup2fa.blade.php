<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Setup Google Authenticator</title>

<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=JetBrains+Mono:wght@600;700&display=swap" rel="stylesheet">

<style>
*{margin:0;padding:0;box-sizing:border-box}

body{
  background: ffffff;
  font-family:'DM Sans',sans-serif;
  display:flex;
  align-items:center;
  justify-content:center;
  min-height:100vh;
  padding:40px 20px;
}

.wrapper{max-width:900px;width:100%}

.top{display:none;}

h1{font-size:26px;font-weight:700;color:#1e293b}
.subtitle{color:#94a3b8;font-size:14px}

.grid{
  display:grid;
  grid-template-columns:1fr 1.2fr;
  border-radius:24px;
  overflow:hidden;
  box-shadow:0 20px 60px rgba(0,0,0,0.08);
  background:#fff;
}

/* LEFT PREMIUM (⬅️ NAIK KE ATAS) */
.card:first-child{
  background: linear-gradient(160deg,#1f3b64,#2b518a);
  color:#fff;
  padding:40px 30px;
  display:flex;
  flex-direction:column;
  justify-content:flex-start; /* ⬅️ FIX NAIK */
}

.card:first-child p{
  color:rgba(255,255,255,0.85);
  font-size:14px;
}

.card:first-child strong{color:#fff}

/* STEP */
.step{
  display:flex;
  align-items:flex-start;
  gap:14px;
  margin-bottom:18px;
}

.num{
  min-width:32px;
  height:32px;
  border-radius:50%;
  background:rgba(255,255,255,0.15);
  display:flex;
  align-items:center;
  justify-content:center;
  font-size:13px;
  font-weight:700;
  backdrop-filter: blur(6px);
}

/* RIGHT */
.card{
  padding:35px;
}

.qr-card{
  display:flex;
  flex-direction:column;
  align-items:center;
}

/* QR */
.qr-frame{
  background:#f8fafc;
  padding:16px;
  border-radius:18px;
  margin-bottom:18px;
  box-shadow: inset 0 0 0 1px #e2e8f0;
}

.qr-frame img{width:150px}

.qr-hint{font-size:12px;color:#94a3b8}

/* SECRET */
.secret-key{
  margin-top:12px;
  background:#f8fafc;
  padding:12px;
  border-radius:12px;
  font-family:'JetBrains Mono',monospace;
  cursor:pointer;
  transition:0.2s;
}

.secret-key:hover{
  background:#eef2ff;
}

.copy-hint{font-size:11px;color:#cbd5e1;margin-top:5px}
#copied{display:none;color:green;font-size:12px}

/* OTP */
.divider{
  width:100%;
  height:1px;
  background:#e2e8f0;
  margin:25px 0;
}

.otp-label{
  font-size:11px;
  color:#94a3b8;
  margin-bottom:15px;
  text-align:center;
}

.otp-row{
  display:flex;
  justify-content:center;
  gap:10px;
  margin-bottom:20px;
}

.otp-box{
  width:50px;
  height:58px;
  border-radius:14px;
  border:1px solid #e2e8f0;
  background:#f8fafc;
  text-align:center;
  font-size:22px;
  transition:0.2s;
}

.otp-box:focus{
  border-color:#2b518a;
  background:#eef2ff;
  outline:none;
  transform:translateY(-2px);
}

/* BUTTON */
.btn{
  width:100%;
  background:linear-gradient(135deg,#2b518a,#1f3b64);
  color:#fff;
  border:none;
  padding:14px;
  border-radius:14px;
  cursor:pointer;
  font-weight:600;
  transition:0.2s;
}

.btn:hover{
  transform:translateY(-1px);
  box-shadow:0 10px 20px rgba(43,81,138,0.25);
}

/* WARNING */
.warning{
  margin-top:18px;
  background:#fff7ed;
  padding:14px;
  border-radius:14px;
  font-size:13px;
  text-align:center;
  color:#9a3412;
}

.alert{
  margin-top:15px;
  background:#fee2e2;
  padding:12px;
  border-radius:10px;
  color:#dc2626;
}

@media(max-width:600px){
  .grid{grid-template-columns:1fr}
}
</style>
</head>

<body>
<div class="wrapper">

<div class="top">
<h1>Setup Google Authenticator</h1>
<p class="subtitle">Lakukan sekali saja — login berikutnya cukup input kode 6 digit</p>
</div>

<div class="grid">

<!-- LEFT -->
<div class="card">
<div class="card-label" style="margin-bottom:10px;">SECURITY SETUP</div>

<h1 style="font-size:24px; margin-bottom:6px; color:#fff;">
Setup Google Authenticator
</h1>

<p style="margin-bottom:20px;">
Lakukan sekali saja — login berikutnya cukup input kode 6 digit
</p>

<h2 style="margin-bottom:10px;">Aktifkan 2FA</h2>
<p style="margin-bottom:25px;">Lindungi akun admin dengan verifikasi dua langkah</p>

<div class="step"><div class="num">1</div><p>Install <strong>Google Authenticator</strong> atau <strong>Authy</strong></p></div>
<div class="step"><div class="num">2</div><p>Scan QR di kanan</p></div>
<div class="step"><div class="num">3</div><p>Masukkan kode 6 digit</p></div>

</div>

<!-- RIGHT -->
<div class="card qr-card">

<div class="qr-frame">
<img src="https://api.qrserver.com/v1/create-qr-code/?size=148x148&data={{ urlencode($qr_uri) }}">
</div>

<div class="qr-hint">Manual code:</div>
<div class="secret-key" onclick="copySecret(this)">{{ $secret }}</div>
<div class="copy-hint">klik untuk copy</div>
<div id="copied">✓ copied</div>

<div class="divider"></div>

<form method="POST" action="{{ route('admin.2fa.setup.post') }}">
@csrf

<div class="otp-label">Masukkan kode</div>

<div class="otp-row">
<input class="otp-box" id="d0" maxlength="1">
<input class="otp-box" id="d1" maxlength="1">
<input class="otp-box" id="d2" maxlength="1">
<input class="otp-box" id="d3" maxlength="1">
<input class="otp-box" id="d4" maxlength="1">
<input class="otp-box" id="d5" maxlength="1">
</div>

<input type="hidden" name="otp_code" id="otpFull">

<button class="btn" onclick="submitCode()">Aktifkan</button>
</form>

<div class="warning">
⚠ Simpan kode manual untuk backup
</div>

</div>

</div>

@if(session('error'))
<div class="alert">⚠ {{ session('error') }}</div>
@endif

</div>

<script>
const boxes=[0,1,2,3,4,5].map(i=>document.getElementById('d'+i));
boxes.forEach((b,i)=>{
b.addEventListener('input',()=>{
b.value=b.value.replace(/\D/g,'').slice(-1);
if(b.value&&i<5)boxes[i+1].focus();
});
b.addEventListener('keydown',e=>{
if(e.key==='Backspace'&&!b.value&&i>0)boxes[i-1].focus();
});
});
function submitCode(){
document.getElementById('otpFull').value=boxes.map(b=>b.value).join('');
}
function copySecret(el){
navigator.clipboard.writeText(el.innerText.trim()).then(()=>{
document.getElementById('copied').style.display='block';
setTimeout(()=>document.getElementById('copied').style.display='none',2000);
});
}
</script>

</body>
</html>