@extends('layouts.peserta')

@section('content')
<style>
  @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');
  *{box-sizing:border-box;margin:0;padding:0;}
  body{margin:0;}
  .wrap{font-family:'Plus Jakarta Sans',sans-serif;min-height:100vh;background:#fff;display:flex;align-items:center;justify-content:center;padding:2rem;}
  .card{background:#fff;border-radius:24px;width:100%;max-width:800px;display:flex;overflow:hidden;box-shadow:0 20px 60px rgba(21,88,168,0.13);border:1px solid #E8F0FE;}
  .blob-side{width:280px;flex-shrink:0;position:relative;overflow:hidden;min-height:100%;}
  .blob-side svg{position:absolute;top:0;left:0;width:100%;height:100%;}
  .form-side{flex:1;padding:3rem 2.5rem;display:flex;flex-direction:column;justify-content:center;}
  .f-title{font-size:22px;font-weight:700;color:#0F172A;margin-bottom:4px;}
  .f-sub{font-size:13px;color:#94A3B8;margin-bottom:1.75rem;}
  .field{margin-bottom:1rem;position:relative;}
  .field label{display:block;font-size:11px;font-weight:700;color:#94A3B8;letter-spacing:0.07em;text-transform:uppercase;margin-bottom:6px;}
  .field input{width:100%;height:46px;border:none;border-radius:12px;background:#F1F5F9;padding:0 16px;font-size:14px;font-family:inherit;color:#0F172A;outline:none;transition:background 0.15s;}
  .field input:focus{background:#E8F0FE;}
  .field input::placeholder{color:#B0BEC5;}
  .field-err{font-size:11px;color:#DC2626;margin-top:4px;}
  .btn{width:100%;height:46px;border:none;border-radius:12px;background:linear-gradient(90deg,#1558A8,#1E90D6);color:#fff;font-size:14px;font-weight:700;font-family:inherit;cursor:pointer;margin-top:1.5rem;letter-spacing:0.02em;transition:opacity 0.15s;}
  .btn:hover{opacity:0.9;}
  .btn-outline{width:100%;height:46px;border:1.5px solid #E8F0FE;border-radius:12px;background:#fff;color:#1558A8;font-size:14px;font-weight:700;font-family:inherit;cursor:pointer;margin-top:0.75rem;transition:background 0.15s;}
  .btn-outline:hover{background:#F0F7FF;}
  .foot{text-align:center;font-size:12px;color:#94A3B8;margin-top:1.25rem;}
  .foot a{color:#1558A8;font-weight:600;text-decoration:none;}
  .alert-ok{background:#F0FDF4;border:1px solid #BBF7D0;border-radius:10px;padding:10px 14px;margin-bottom:1.25rem;font-size:12px;color:#15803D;line-height:1.5;}
  .alert-err{background:#FEF2F2;border:1px solid #FECACA;border-radius:10px;padding:10px 14px;margin-bottom:1.25rem;font-size:12px;color:#DC2626;line-height:1.5;}
  .data-box{background:#F8FAFF;border-radius:12px;padding:14px 16px;margin-bottom:1rem;}
  .data-row{display:flex;justify-content:space-between;padding:6px 0;border-bottom:1px solid #EEF2F7;font-size:13px;}
  .data-row:last-child{border-bottom:none;}
  .data-row span:first-child{color:#94A3B8;}
  .data-row span:last-child{color:#0F172A;font-weight:600;text-align:right;max-width:60%;}
  .info-box{background:#EFF6FF;border:1px solid #DBEAFE;border-radius:10px;padding:10px 14px;font-size:12px;color:#1D4ED8;margin-bottom:1rem;line-height:1.6;}
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
      <div class="f-title">Registrasi Peserta</div>
      <div class="f-sub">Verifikasi NUPTK dan tanggal lahir Anda</div>

      @if(session('gagal'))
        <div class="alert-err">{{ session('gagal') }}</div>
      @endif

      @if(!session('berhasil'))
        <form method="POST" action="{{ route('registrasi.cek') }}">
          @csrf
          <div class="field">
            <label>NUPTK</label>
            <input type="text" name="nuptk" value="{{ old('nuptk') }}" placeholder="16 digit NUPTK" maxlength="16" required>
            @error('nuptk')<p class="field-err">{{ $message }}</p>@enderror
          </div>
          <div class="field">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
            @error('tanggal_lahir')<p class="field-err">{{ $message }}</p>@enderror
          </div>
          <button type="submit" class="btn">Verifikasi Data</button>
        </form>
      @endif

      @if(session('berhasil') && session('peserta'))
        @php $p = session('peserta') @endphp
        <div class="alert-ok">Data ditemukan! Silakan konfirmasi data di bawah.</div>
        <div class="data-box">
          <div class="data-row"><span>Nama</span><span>{{ $p->nama }}</span></div>
          <div class="data-row"><span>Sekolah</span><span>{{ $p->sekolah }}</span></div>
          <div class="data-row"><span>Email</span><span>{{ $p->email }}</span></div>
          <div class="data-row"><span>Kota</span><span>{{ $p->kota ?? '-' }}</span></div>
          <div class="data-row"><span>Provinsi</span><span>{{ $p->provinsi ?? '-' }}</span></div>
        </div>
        <div class="info-box">
          Password login: tanggal lahir format <strong>ddmmyyyy</strong><br>
          Contoh: lahir 15 Mei 1990 → <strong>15051990</strong>
        </div>
        <form method="POST" action="{{ route('registrasi.submit') }}">
          @csrf
          <button type="submit" class="btn">Konfirmasi & Daftar</button>
        </form>
        <a href="{{ route('registrasi') }}">
          <button type="button" class="btn-outline">← Ulangi Verifikasi</button>
        </a>
      @endif

      <div class="foot">
        Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
      </div>
    </div>
  </div>
</div>
@endsection