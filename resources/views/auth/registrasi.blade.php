@extends('layouts.app')

@section('content')

<section class="min-h-screen bg-sky-50 py-16 px-4">
  <div class="max-w-xl mx-auto">

    <!-- Header -->
    <div class="text-center mb-10 reg-up" style="--r:0">
      <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Registrasi Peserta</h1>
      <p class="mt-2 text-sm text-slate-500">Hackathon Rumah Pendidikan 2026</p>
    </div>

    <!-- STEP 1: Cek NUPTK -->
    <div id="step-1" class="reg-up" style="--r:1">
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8">
        <h2 class="text-base font-extrabold text-slate-900 mb-1">Verifikasi Data Dapodik</h2>
        <p class="text-sm text-slate-500 mb-6">Masukkan NUPTK dan tanggal lahir untuk mengambil data Anda.</p>

        <div class="space-y-4">
          <div>
            <label class="block text-xs font-semibold text-slate-600 mb-1.5">NUPTK <span class="text-red-500">*</span></label>
            <input id="inp-nuptk" type="text" inputmode="numeric" maxlength="16"
              placeholder="16 digit NUPTK"
              class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sky-400 transition"/>
            <p id="err-nuptk" class="text-xs text-red-500 mt-1 hidden"></p>
          </div>
          <div>
            <label class="block text-xs font-semibold text-slate-600 mb-1.5">Tanggal Lahir <span class="text-red-500">*</span></label>
            <input id="inp-tgl" type="date"
              class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sky-400 transition"/>
            <p id="err-tgl" class="text-xs text-red-500 mt-1 hidden"></p>
          </div>
        </div>

        <button id="btn-cek"
          onclick="cekNuptk()"
          class="mt-6 w-full py-2.5 rounded-full text-sm font-extrabold text-white transition"
          style="background-color:#0072BC;"
          onmouseover="this.style.backgroundColor='#005fa3'"
          onmouseout="this.style.backgroundColor='#0072BC'">
          Cek Data
        </button>

        <div id="cek-loading" class="hidden mt-4 text-center text-sm text-slate-400">
          <svg class="inline w-4 h-4 animate-spin mr-1 text-sky-500" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"/>
          </svg>
          Menghubungi server Dapodik...
        </div>
        <div id="cek-error" class="hidden mt-4 p-3 bg-red-50 border border-red-200 rounded-lg text-sm text-red-600"></div>
      </div>
    </div>

    <!-- STEP 2: Konfirmasi + Edit data -->
    <div id="step-2" class="hidden">
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8 reg-up" style="--r:0">

        <!-- Data dari Dapodik -->
        <div class="mb-6 p-4 bg-sky-50 border border-sky-100 rounded-xl">
          <p class="text-xs font-bold text-sky-700 uppercase tracking-wide mb-3">✅ Data Dapodik Ditemukan</p>
          <div class="space-y-1.5 text-sm">
            <div class="flex justify-between"><span class="text-slate-500">Nama</span><span class="font-semibold text-slate-900" id="disp-nama">—</span></div>
            <div class="flex justify-between"><span class="text-slate-500">NUPTK</span><span class="font-semibold text-slate-900" id="disp-nuptk">—</span></div>
            <div class="flex justify-between"><span class="text-slate-500">Sekolah</span><span class="font-semibold text-slate-900" id="disp-sekolah">—</span></div>
            <div class="flex justify-between"><span class="text-slate-500">Provinsi</span><span class="font-semibold text-slate-900" id="disp-provinsi">—</span></div>
            <div class="flex justify-between"><span class="text-slate-500">Jabatan</span><span class="font-semibold text-slate-900" id="disp-jabatan">—</span></div>
          </div>
        </div>

        <h2 class="text-base font-extrabold text-slate-900 mb-1">Lengkapi Kontak</h2>
        <p class="text-sm text-slate-500 mb-5">Isi nomor telepon dan email untuk menerima notifikasi.</p>

        <div class="space-y-4">
          <div>
            <label class="block text-xs font-semibold text-slate-600 mb-1.5">No. Telepon / WhatsApp <span class="text-red-500">*</span></label>
            <input id="inp-tlp" type="tel" placeholder="08xxxxxxxxxx"
              class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sky-400 transition"/>
            <p id="err-tlp" class="text-xs text-red-500 mt-1 hidden"></p>
          </div>
          <div>
            <label class="block text-xs font-semibold text-slate-600 mb-1.5">Email Aktif <span class="text-red-500">*</span></label>
            <input id="inp-email" type="email" placeholder="email@contoh.com"
              class="w-full border border-slate-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-sky-400 transition"/>
            <p id="err-email" class="text-xs text-red-500 mt-1 hidden"></p>
          </div>
        </div>

        <p class="mt-4 text-xs text-slate-400">
          Notifikasi konfirmasi akan dikirim via <strong>Email</strong> dan <strong>WhatsApp</strong>.
        </p>

        <div class="mt-6 flex gap-3">
          <button onclick="kembali()"
            class="flex-1 py-2.5 rounded-full text-sm font-bold text-slate-600 bg-slate-100 hover:bg-slate-200 transition">
            ← Kembali
          </button>
          <button id="btn-daftar" onclick="daftar()"
            class="flex-1 py-2.5 rounded-full text-sm font-extrabold text-white transition"
            style="background-color:#0072BC;"
            onmouseover="this.style.backgroundColor='#005fa3'"
            onmouseout="this.style.backgroundColor='#0072BC'">
            Daftar Sekarang
          </button>
        </div>

        <div id="daftar-loading" class="hidden mt-4 text-center text-sm text-slate-400">
          <svg class="inline w-4 h-4 animate-spin mr-1 text-sky-500" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"/>
          </svg>
          Menyimpan dan mengirim notifikasi...
        </div>
        <div id="daftar-error" class="hidden mt-4 p-3 bg-red-50 border border-red-200 rounded-lg text-sm text-red-600"></div>
      </div>
    </div>

    <!-- STEP 3: Sukses -->
    <div id="step-3" class="hidden">
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-10 text-center reg-up" style="--r:0">
        <div class="w-16 h-16 rounded-full bg-green-50 border border-green-100 flex items-center justify-center mx-auto mb-5">
          <svg class="w-8 h-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
          </svg>
        </div>
        <h2 class="text-xl font-extrabold text-slate-900 mb-2">Registrasi Berhasil!</h2>
        <p class="text-sm text-slate-500 leading-relaxed mb-6">
          Notifikasi konfirmasi telah dikirim ke <strong id="disp-email-sukses"></strong>
          dan WhatsApp <strong id="disp-tlp-sukses"></strong>.
        </p>
        <a href="/"
          class="inline-flex items-center justify-center px-6 py-2.5 rounded-full text-sm font-bold text-white transition"
          style="background-color:#0072BC;">
          Kembali ke Beranda
        </a>
      </div>
    </div>

  </div>
</section>

<style>
  .reg-up {
    opacity: 0;
    transform: translateY(24px);
    transition: opacity 0.6s cubic-bezier(0.16,1,0.3,1) calc(var(--r,0) * 100ms),
                transform 0.6s cubic-bezier(0.16,1,0.3,1) calc(var(--r,0) * 100ms);
  }
  .reg-up.in-view { opacity: 1; transform: translateY(0); }
</style>

<script>
  // Animasi masuk
  document.querySelectorAll('.reg-up').forEach(el => {
    requestAnimationFrame(() => el.classList.add('in-view'));
  });

  const CSRF = document.querySelector('meta[name="csrf-token"]')?.content ?? '';
  let dapodikData = {};

  // ---- Helpers ----
  function show(id)  { document.getElementById(id)?.classList.remove('hidden'); }
  function hide(id)  { document.getElementById(id)?.classList.add('hidden'); }
  function setErr(id, msg) {
    const el = document.getElementById(id);
    if (!el) return;
    el.textContent = msg;
    msg ? el.classList.remove('hidden') : el.classList.add('hidden');
  }
  function triggerAnim(stepId) {
    document.querySelectorAll(`#${stepId} .reg-up`).forEach(el => {
      el.classList.remove('in-view');
      requestAnimationFrame(() => requestAnimationFrame(() => el.classList.add('in-view')));
    });
  }

  // ---- Step 1: Cek NUPTK ----
  async function cekNuptk() {
    const nuptk   = document.getElementById('inp-nuptk').value.trim();
    const tglLahir = document.getElementById('inp-tgl').value;

    setErr('err-nuptk', ''); setErr('err-tgl', ''); hide('cek-error');

    let valid = true;
    if (!/^\d{16}$/.test(nuptk))   { setErr('err-nuptk', 'NUPTK harus 16 digit angka.'); valid = false; }
    if (!tglLahir)                  { setErr('err-tgl', 'Tanggal lahir wajib diisi.'); valid = false; }
    if (!valid) return;

    show('cek-loading');
    document.getElementById('btn-cek').disabled = true;

    try {
      const res = await fetch('{{ route("registrasi.cek") }}', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
        body: JSON.stringify({ nuptk, tgl_lahir: tglLahir }),
      });
      const json = await res.json();

      if (!res.ok || json.status === 'not_found') {
        document.getElementById('cek-error').textContent = json.message ?? 'Data tidak ditemukan.';
        show('cek-error');
        return;
      }
      if (json.status === 'error') {
        document.getElementById('cek-error').textContent = json.message;
        show('cek-error');
        return;
      }
      if (json.sudah_daftar) {
        document.getElementById('cek-error').textContent = 'NUPTK ini sudah terdaftar.';
        show('cek-error');
        return;
      }

      // Simpan data & tampilkan step 2
      dapodikData = json.data;
      document.getElementById('disp-nama').textContent     = json.data.nama;
      document.getElementById('disp-nuptk').textContent    = json.data.nuptk;
      document.getElementById('disp-sekolah').textContent  = json.data.sekolah;
      document.getElementById('disp-provinsi').textContent = json.data.provinsi;
      document.getElementById('disp-jabatan').textContent  = json.data.jabatan;

      hide('step-1');
      show('step-2');
      triggerAnim('step-2');

    } catch (e) {
      document.getElementById('cek-error').textContent = 'Terjadi kesalahan jaringan.';
      show('cek-error');
    } finally {
      hide('cek-loading');
      document.getElementById('btn-cek').disabled = false;
    }
  }

  // ---- Step 2: Daftar ----
  async function daftar() {
    const noTlp = document.getElementById('inp-tlp').value.trim();
    const email = document.getElementById('inp-email').value.trim();

    setErr('err-tlp', ''); setErr('err-email', ''); hide('daftar-error');

    let valid = true;
    if (!/^[0-9+\-\s]{9,15}$/.test(noTlp)) { setErr('err-tlp', 'Nomor telepon tidak valid.'); valid = false; }
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) { setErr('err-email', 'Format email tidak valid.'); valid = false; }
    if (!valid) return;

    show('daftar-loading');
    document.getElementById('btn-daftar').disabled = true;

    try {
      const nuptk    = document.getElementById('inp-nuptk').value.trim();
      const tglLahir = document.getElementById('inp-tgl').value;

      const res = await fetch('{{ route("registrasi.sumbit") }}', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
        body: JSON.stringify({
          nuptk,
          tgl_lahir : tglLahir,
          nama      : dapodikData.nama,
          sekolah   : dapodikData.sekolah,
          provinsi  : dapodikData.provinsi,
          no_tlp    : noTlp,
          email,
        }),
      });
      const json = await res.json();

      if (!res.ok || json.status === 'error') {
        document.getElementById('daftar-error').textContent = json.message ?? 'Gagal mendaftar.';
        show('daftar-error');
        return;
      }

      document.getElementById('disp-email-sukses').textContent = email;
      document.getElementById('disp-tlp-sukses').textContent   = noTlp;
      hide('step-2'); show('step-3'); triggerAnim('step-3');

    } catch (e) {
      document.getElementById('daftar-error').textContent = 'Terjadi kesalahan jaringan.';
      show('daftar-error');
    } finally {
      hide('daftar-loading');
      document.getElementById('btn-daftar').disabled = false;
    }
  }

  // ---- Kembali ke step 1 ----
  function kembali() {
    hide('step-2'); show('step-1');
  }
</script>

@endsection