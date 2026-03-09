<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registrasi Berhasil</title>
  <style>
    * { margin:0; padding:0; box-sizing:border-box; }
    body { background:#f0f4f8; font-family: 'Segoe UI', Arial, sans-serif; color:#1e293b; }
    .wrap { max-width:600px; margin:32px auto; background:#fff; border-radius:16px; overflow:hidden; box-shadow:0 4px 24px rgba(0,0,0,0.08); }
    .header { background:linear-gradient(135deg,#0072BC,#005fa3); padding:40px 36px 32px; text-align:center; }
    .header img { height:48px; margin-bottom:16px; }
    .header h1 { color:#fff; font-size:22px; font-weight:800; letter-spacing:-0.3px; }
    .header p  { color:rgba(255,255,255,0.85); font-size:14px; margin-top:6px; }
    .badge { display:inline-block; background:#FFF9BF; color:#92400e; font-size:12px; font-weight:700; padding:4px 14px; border-radius:99px; margin-top:14px; }
    .body  { padding:36px; }
    .greeting { font-size:16px; font-weight:700; color:#0f172a; margin-bottom:8px; }
    .intro { font-size:14px; color:#475569; line-height:1.7; margin-bottom:28px; }
    .card { background:#f8fafc; border:1px solid #e2e8f0; border-radius:12px; padding:24px; margin-bottom:28px; }
    .card h3 { font-size:13px; font-weight:700; text-transform:uppercase; letter-spacing:0.8px; color:#94a3b8; margin-bottom:16px; }
    .row { display:flex; justify-content:space-between; align-items:flex-start; padding:10px 0; border-bottom:1px solid #f1f5f9; font-size:14px; }
    .row:last-child { border-bottom:none; padding-bottom:0; }
    .row .label { color:#64748b; font-weight:500; min-width:110px; }
    .row .value { color:#0f172a; font-weight:600; text-align:right; }
    .info-box { background:#eff6ff; border-left:4px solid #0072BC; border-radius:0 8px 8px 0; padding:14px 18px; font-size:13px; color:#1e40af; line-height:1.6; margin-bottom:28px; }
    .btn-wrap { text-align:center; margin-bottom:28px; }
    .btn { display:inline-block; background:#0072BC; color:#fff; text-decoration:none; padding:13px 32px; border-radius:99px; font-size:14px; font-weight:700; }
    .footer { background:#f8fafc; border-top:1px solid #e2e8f0; padding:24px 36px; text-align:center; font-size:12px; color:#94a3b8; line-height:1.7; }
    .footer a { color:#0072BC; text-decoration:none; }
  </style>
</head>
<body>
<div class="wrap">

  <!-- HEADER -->
  <div class="header">
    <h1>🎉 Registrasi Berhasil!</h1>
    <p>Hackathon Rumah Pendidikan 2026</p>
    <span class="badge">Wujudkan Indonesia Cerdas</span>
  </div>

  <!-- BODY -->
  <div class="body">
    <p class="greeting">Halo, {{ $registrasi->nama }}!</p>
    <p class="intro">
      Selamat! Pendaftaran Anda untuk <strong>Hackathon Rumah Pendidikan 2026</strong> telah berhasil dicatat dalam sistem kami.
      Berikut adalah detail registrasi Anda:
    </p>

    <!-- Detail Card -->
    <div class="card">
      <h3>📋 Detail Registrasi</h3>
      <div class="row">
        <span class="label">NUPTK</span>
        <span class="value">{{ $registrasi->nuptk }}</span>
      </div>
      <div class="row">
        <span class="label">Nama Lengkap</span>
        <span class="value">{{ $registrasi->nama }}</span>
      </div>
      <div class="row">
        <span class="label">Sekolah</span>
        <span class="value">{{ $registrasi->sekolah }}</span>
      </div>
      <div class="row">
        <span class="label">Provinsi</span>
        <span class="value">{{ $registrasi->provinsi }}</span>
      </div>
      <div class="row">
        <span class="label">No. Telepon</span>
        <span class="value">{{ $registrasi->no_tlp }}</span>
      </div>
      <div class="row">
        <span class="label">Email</span>
        <span class="value">{{ $registrasi->email }}</span>
      </div>
    </div>

    <!-- Info Box -->
    <div class="info-box">
      ℹ️ Pantau terus informasi selanjutnya mengenai jadwal, pengumuman, dan tahapan berikutnya melalui website resmi dan email ini.
    </div>

    <!-- CTA -->
    <div class="btn-wrap">
      <a href="{{ url('/') }}" class="btn">Kunjungi Website</a>
    </div>
  </div>

  <!-- FOOTER -->
  <div class="footer">
    <p>Email ini dikirim otomatis oleh sistem Hackathon Rumah Pendidikan 2026.</p>
    <p>Mohon tidak membalas email ini.</p>
    <p style="margin-top:8px;">
      Pertanyaan? Hubungi kami di
      <a href="mailto:hackathon.rumdik@kemendikdasmen.go.id">hackathon.rumdik@kemendikdasmen.go.id</a>
    </p>
  </div>

</div>
</body>
</html>