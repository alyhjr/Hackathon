@extends('layouts.app')

@section('content')
<style>
  :root{
    --bg: #ffffff;
    --card: #eaf6ff;
    --text: #111111;
    --shadow: 0 14px 34px rgba(0,0,0,.08);
    --radius: 18px;
  }

  .k-wrap{
    padding: 56px 16px 90px; /* ditambah dikit biar panah bawah ga kepotong */
    background: var(--bg);
    display:flex;
    justify-content:center;
  }

  .k-shell{
    width: min(1100px, 100%);
    position: relative;
  }

  .k-stage{
    position: relative;
    display:flex;
    justify-content:center;
    align-items:center;
    gap: 14px;
    margin-top: 18px;
    user-select: none;
    -webkit-user-select: none;
    touch-action: pan-y;
  }

  /* ===== CARD ===== */
  .k-card{
    width: 270px;
    height: 440px;
    border-radius: var(--radius);
    background: var(--card);
    box-shadow: var(--shadow);
    padding: 18px 16px;
    text-align:left;
    display:flex;
    flex-direction: column;
    transition: all .35s cubic-bezier(.2,.8,.2,1);
  }

  .k-card:not(.is-center){
    transform: scale(.92);
    opacity: .55;
    filter: blur(2px);
  }

  .k-card.is-center{
    transform: scale(1);
    opacity: 1;
    filter: blur(0);
  }

  .k-head{
    font-size: 18px;
    font-weight: 800;
    margin-bottom: 12px;
    border-bottom: 3px solid #111;
    padding-bottom: 8px;
    text-align: center;
    color: var(--text);
    flex: 0 0 auto;
  }

  .k-body{
    font-size: 13px;
    color: var(--text);
    line-height: 1.55;
    flex: 1 1 auto;
  }

  .k-body ol{
    counter-reset: item;
    padding-left: 0;
    margin: 0;
    list-style: none;
  }

  .k-body li{
    counter-increment: item;
    margin-bottom: 10px;
    position: relative;
    padding-left: 22px;
  }

  .k-body li::before{
    content: counter(item) ".";
    position: absolute;
    left: 0;
    font-weight: 700;
  }

  /* ===== PANAH (DESKTOP) ===== */
  .k-arrow{
    position:absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 46px;
    height: 46px;
    border-radius: 50%;
    border: 2px solid #111;
    background:#fff;
    font-size: 22px;
    cursor:pointer;
    transition: .18s ease;
    display:flex;
    align-items:center;
    justify-content:center;
    z-index: 5;
  }

  .k-arrow:hover{
    background:#111;
    color:#fff;
  }

  .k-arrow.left{ left: -10px; }
  .k-arrow.right{ right: -10px; }

  /* ✅ WRAPPER PANAH MOBILE */
  .k-arrows-mobile{
    display:none;
  }

  /* ===== KATEGORI ===== */
  .k-cat-grid{
    display:grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    justify-items: center;
  }

  .k-cat-item{
    width: 100%;
    max-width: 170px;
    display:flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    text-align:center;
  }

  .k-cat-img{
    height: 70px;
    width: 100%;
    display:flex;
    align-items:center;
    justify-content:center;
    background: rgba(255,255,255,.6);
    border-radius: 12px;
  }

  .k-cat-img img{
    max-width:100%;
    max-height:100%;
    object-fit:contain;
  }

  .k-cat-pill{
    background:#0f172a;
    color:#fff;
    font-size: 9px;
    padding: 6px 10px;
    border-radius: 999px;
    width: 100%;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .k-cat-item.full{
    grid-column: 1 / -1;
    max-width: 180px;
  }

  /* ===== MOBILE ===== */
  @media(max-width:900px){
    .k-card{ display:none; }

    .k-card.is-center{
      display:flex;
      width: min(92%, 360px);
      height: 460px;
      filter: none;
      opacity:1;
      transform: scale(1);
    }

    /* desktop arrows disembunyiin */
    .k-arrow{
      display:none;
    }

    /* panah versi mobile muncul */
    .k-arrows-mobile{
      display:flex;
      gap: 14px;
      justify-content:center;
      margin-top: 18px;
    }

    .k-arrows-mobile .k-arrow{
      display:flex;
      position: static;
      transform:none;
    }
  }

</style>

<div class="k-wrap">
  <div class="k-shell">

    <!-- PANAH DESKTOP -->
    <button class="k-arrow left" id="btnPrev" aria-label="Sebelumnya">&#8249;</button>
    <button class="k-arrow right" id="btnNext" aria-label="Berikutnya">&#8250;</button>

    <div class="k-stage">
      <div class="k-card" id="cardLeft"></div>
      <div class="k-card is-center" id="cardCenter"></div>
      <div class="k-card" id="cardRight"></div>
    </div>

    <!-- ✅ PANAH MOBILE -->
    <div class="k-arrows-mobile">
      <button class="k-arrow" id="btnPrevMobile" aria-label="Sebelumnya">&#8249;</button>
      <button class="k-arrow" id="btnNextMobile" aria-label="Berikutnya">&#8250;</button>
    </div>

  </div>
</div>

<script>
  const slides = [
    {
      title: "Kategori",
      content: `
        <div class="k-cat-grid">
          <div class="k-cat-item">
            <div class="k-cat-img"><img src="/image/kategori/paud.png"></div>
            <div class="k-cat-pill">PAUD / Sederajat</div>
          </div>

          <div class="k-cat-item">
            <div class="k-cat-img"><img src="/image/kategori/sd.png"></div>
            <div class="k-cat-pill">SD / Sederajat</div>
          </div>

          <div class="k-cat-item">
            <div class="k-cat-img"><img src="/image/kategori/smp.png"></div>
            <div class="k-cat-pill">SMP / Sederajat</div>
          </div>

          <div class="k-cat-item">
            <div class="k-cat-img"><img src="/image/kategori/sma.png"></div>
            <div class="k-cat-pill">SMA / Sederajat</div>
          </div>

          <div class="k-cat-item full">
            <div class="k-cat-img"><img src="/image/kategori/smk.png"></div>
            <div class="k-cat-pill">SMK / Sederajat</div>
          </div>
        </div>
      `
    },
    {
      title: "Persyaratan",
      content: `
        <ol>
          <li>Warga Negara Indonesia</li>
          <li>Peserta bersifat tim: 1 tim terdiri dari 3 orang dari satu sekolah yang sama</li>
          <li>Setiap orang peserta hanya dapat terdaftar pada 1 tim</li>
          <li>Peserta (tim) merupakan pendidik/tenaga kependidikan aktif dibuktikan surat keterangan Kepala Sekolah</li>
          <li>Seluruh anggota tim diutamakan memiliki akun belajar.id</li>
          <li>Satu sekolah dapat mengirim lebih dari satu tim</li>
        </ol>
      `
    },
    {
      title: "Pendaftaran",
      content: `
        <ol>
          <li>Tim (perwakilan) mendaftar via superaplikasi Rumah Pendidikan + unggah surat keterangan Kepala Sekolah</li>
          <li>Tim yang telah mendaftar berhak mengikuti pelatihan yang diselenggarakan oleh Pusdatin</li>
        </ol>
      `
    }
  ];

  let active = 0;

  const left = document.getElementById("cardLeft");
  const center = document.getElementById("cardCenter");
  const right = document.getElementById("cardRight");

  function idx(i){ return (i + slides.length) % slides.length; }

  function render(){
    const l = slides[idx(active - 1)];
    const c = slides[idx(active)];
    const r = slides[idx(active + 1)];

    left.innerHTML   = `<div class="k-head">${l.title}</div><div class="k-body">${l.content}</div>`;
    center.innerHTML = `<div class="k-head">${c.title}</div><div class="k-body">${c.content}</div>`;
    right.innerHTML  = `<div class="k-head">${r.title}</div><div class="k-body">${r.content}</div>`;
  }

  function next(){ active = idx(active + 1); render(); }
  function prev(){ active = idx(active - 1); render(); }

  // desktop btn
  document.getElementById("btnNext").onclick = next;
  document.getElementById("btnPrev").onclick = prev;

  // mobile btn
  document.getElementById("btnNextMobile").onclick = next;
  document.getElementById("btnPrevMobile").onclick = prev;

  render();
</script>
@endsection