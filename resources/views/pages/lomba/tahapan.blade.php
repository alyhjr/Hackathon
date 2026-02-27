@extends('layouts.app')

@section('content')
<style>
  :root{
    --bg:#ffffff;
    --text:#111111;
    --muted:#334155;
    --shadow: 0 14px 34px rgba(0,0,0,.08);
    --navy:#0b2a5b;
    --line:#000000;
    --lineW:3px;
    --boxH:52px;
    --rowGap: 64px;
    --colGap: 34px;
  }

  .t-wrap{ background:var(--bg); padding:46px 16px 78px; display:flex; justify-content:center; }
  .t-shell{ width:min(1200px,100%); }
  .t-title{ text-align:center; font-weight:900; font-size:clamp(22px,2.2vw,32px); margin:0 0 6px; color:var(--text); }
  .t-sub{ text-align:center; font-size:13px; color:var(--muted); margin:0 0 34px; }

  .t-grid{
    position:relative;
    display:grid;
    grid-template-columns:repeat(3, 1fr);
    gap: var(--rowGap) var(--colGap);
    align-items:start;
  }

  .t-step{ position:relative; z-index:2; }

  .t-box{
    height:var(--boxH);
    border-radius:12px;
    background:var(--navy);
    color:#fff;
    box-shadow:var(--shadow);
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    font-weight:700;
    letter-spacing:.2px;
    position:relative;
    padding:0 16px;
    text-align:center;
  }

  .t-num{ font-size:15px; line-height:1; white-space:nowrap; font-weight:800; }
  .t-label{ font-size:15px; line-height:1.2; font-weight:800; word-break:break-word; }

  .t-desc{
    margin-top:12px;
    background:#fff;
    border-radius:12px;
    box-shadow:var(--shadow);
    border:1px solid rgba(0,0,0,.06);
    padding:12px 14px;
    font-size:13px;
    color:var(--text);
  }
  .t-desc ul{ margin:0; padding-left:20px; list-style:none; }
  .t-desc li{
    margin:0 0 6px;
    padding-left:4px;
    position:relative;
  }
  .t-desc li::before{
    content:"•";
    position:absolute;
    left:-16px;
    color:#0b2a5b;
    font-weight:900;
    font-size:14px;
  }

  /* Konektor horizontal 1->2 dan 2->3 */
  .top-1 .t-box::after,
  .top-2 .t-box::after{
    content:"";
    position:absolute;
    top:50%; right:calc(-1 * var(--colGap));
    width:var(--colGap);
    height:var(--lineW);
    background:var(--line);
    transform:translateY(-50%);
  }

  /* Konektor horizontal 6<-5 dan 5<-4 */
  .bot-6 .t-box::after,
  .bot-5 .t-box::after{
    content:"";
    position:absolute;
    top:50%; right:calc(-1 * var(--colGap));
    width:var(--colGap);
    height:var(--lineW);
    background:var(--line);
    transform:translateY(-50%);
  }

  #svg-connector{ position:absolute; top:0; left:0; pointer-events:none; z-index:1; overflow:visible; }

  @media(max-width:900px){
    .t-grid{ grid-template-columns:1fr; gap:22px; }
    .top-1 .t-box::after, .top-2 .t-box::after,
    .bot-6 .t-box::after, .bot-5 .t-box::after,
    #svg-connector{ display:none; }
    .t-num, .t-label{ font-size:14px; }
  }
</style>

<div class="t-wrap">
  <div class="t-shell">
    <h2 class="t-title">Tahapan Kegiatan</h2>
    <p class="t-sub">Urutan tahapan lomba dari awal hingga selesai</p>

    <div class="t-grid" id="tgrid">

      <div class="t-step top-1">
        <div class="t-box"><span class="t-num">1.</span><span class="t-label">Pendaftaran</span></div>
        <div class="t-desc"><ul><li>Pendaftaran melampirkan Surat Keterangan dari Kepala Sekolah</li></ul></div>
      </div>

      <div class="t-step top-2">
        <div class="t-box"><span class="t-num">2.</span><span class="t-label">Pelatihan</span></div>
        <div class="t-desc"><ul><li>Pelatihan secara daring</li><li>Difasilitasi Google for Education dan Canva</li></ul></div>
      </div>

      <div class="t-step top-3">
        <div class="t-box" id="box3"><span class="t-num">3.</span><span class="t-label">Proposal Ide Karya</span></div>
        <div class="t-desc"><ul><li>Unggah Proposal Ide Karya untuk 2 Gim Edukasi</li><li>Penilaian Proposal Ide Karya</li><li>Pengumuman 10 proposal terbaik tiap kategori</li></ul></div>
      </div>

      <div class="t-step bot-6">
        <div class="t-box"><span class="t-num">6.</span><span class="t-label">Pemberian Hadiah</span></div>
        <div class="t-desc"><ul><li>Pengumuman 3 pemenang tiap kategori</li><li>Pemberian hadiah</li></ul></div>
      </div>

      <div class="t-step bot-5">
        <div class="t-box"><span class="t-num">5.</span><span class="t-label">Penjurian</span></div>
        <div class="t-desc"><ul><li>Penilaian karya peserta</li><li>Presentasi karya 2 Gim Edukasi</li></ul></div>
      </div>

      <div class="t-step bot-4">
        <div class="t-box" id="box4"><span class="t-num">4.</span><span class="t-label">Inkubasi Peserta</span></div>
        <div class="t-desc"><ul><li>Inkubasi daring 10 peserta lolos tahap proposal tiap kategori</li><li>Unggah karya 2 Gim Edukasi</li></ul></div>
      </div>

    </div>
  </div>
</div>

<script>
function drawConnector3to4() {
  var grid = document.getElementById('tgrid');
  var box3 = document.getElementById('box3');
  var box4 = document.getElementById('box4');

  var old = document.getElementById('svg-connector');
  if (old) old.remove();

  if (window.innerWidth <= 900) return;

  var gridRect = grid.getBoundingClientRect();
  var box3Rect = box3.getBoundingClientRect();
  var box4Rect = box4.getBoundingClientRect();

  var x3     = box3Rect.right - gridRect.left;
  var y3     = box3Rect.top   - gridRect.top + box3Rect.height / 2;
  var x4     = box4Rect.right - gridRect.left;
  var y4     = box4Rect.top   - gridRect.top + box4Rect.height / 2;
  var xRight = Math.max(x3, x4) + 20;

  var svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
  svg.id = 'svg-connector';
  svg.setAttribute('width',  grid.offsetWidth + 40);
  svg.setAttribute('height', grid.offsetHeight);
  svg.style.cssText = 'position:absolute;top:0;left:0;width:' + (grid.offsetWidth+40) + 'px;height:' + grid.offsetHeight + 'px;pointer-events:none;z-index:1;overflow:visible;';

  var path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
  path.setAttribute('d', 'M ' + x3 + ' ' + y3 + ' L ' + xRight + ' ' + y3 + ' L ' + xRight + ' ' + y4 + ' L ' + x4 + ' ' + y4);
  path.setAttribute('fill', 'none');
  path.setAttribute('stroke', '#000000');
  path.setAttribute('stroke-width', '3');
  path.setAttribute('stroke-linecap', 'square');

  svg.appendChild(path);
  grid.appendChild(svg);
}

window.addEventListener('load', drawConnector3to4);
window.addEventListener('resize', drawConnector3to4);
</script>

@endsection