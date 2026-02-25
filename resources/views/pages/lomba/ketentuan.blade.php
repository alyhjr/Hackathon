@extends('layouts.app')

@section('title', 'Ketentuan Lomba')

@section('content')
<section class="ket-wrap py-14">
  <div class="max-w-6xl mx-auto px-4">


    <!-- Carousel -->
    <div class="mt-10 relative">

      <!-- VIEWPORT -->
      <div id="ketViewport" class="ket-viewport">
        <div id="ketTrack" class="ket-track">

          @php
            $slideW = "w-[320px] sm:w-[340px] md:w-[360px]";
            $slideH = "h-[500px] md:h-[520px]";

            $kategori = [
              ['label' => 'SD / Sederajat',  'img' => 'image/lomba/kategori-sd.png'],
              ['label' => 'SMP / Sederajat', 'img' => 'image/lomba/kategori-smp.png'],
              ['label' => 'SMA / Sederajat', 'img' => 'image/lomba/kategori-sma.png'],
              ['label' => 'SMK / Sederajat', 'img' => 'image/lomba/kategori-smk.png'],
              ['label' => 'SLB / Sederajat', 'img' => 'image/lomba/kategori-slb.png'],
              ['label' => 'PAUD / Sederajat','img' => 'image/lomba/kategori-paud.png'],
            ];
          @endphp

          <!-- Slide 1 -->
          <article class="ket-slide shrink-0 {{ $slideW }} {{ $slideH }}">
            <div class="ket-card h-full">
              <div class="ket-card-top">
                <div class="ket-title">Kategori</div>
                <div class="ket-line"></div>
              </div>

              <div class="ket-card-body">
                <div class="grid grid-cols-2 gap-4">
                  @foreach ($kategori as $k)
                    <div class="ket-mini">
                      <img
                        src="{{ asset($k['img']) }}"
                        alt="{{ $k['label'] }}"
                        class="h-10 w-full object-contain"
                        loading="lazy"
                      />
                      <span class="ket-chip">{{ $k['label'] }}</span>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </article>

          <!-- Slide 2 -->
          <article class="ket-slide shrink-0 {{ $slideW }} {{ $slideH }}">
            <div class="ket-card h-full">
              <div class="ket-card-top">
                <div class="ket-title">Persyaratan</div>
                <div class="ket-line"></div>
              </div>

              <div class="ket-card-body">
                <ul class="ket-list">
                  <li><span class="ket-dot"></span>Warga Negara Indonesia</li>
                  <li><span class="ket-dot"></span>Peserta bersifat tim terdiri dari 3 orang</li>
                  <li><span class="ket-dot"></span>Setiap peserta hanya boleh terdaftar pada 1 tim</li>
                  <li><span class="ket-dot"></span>Peserta aktif dibuktikan surat keterangan sekolah</li>
                  <li><span class="ket-dot"></span>Memiliki akun belajar.id</li>
                  <li><span class="ket-dot"></span>Satu sekolah boleh kirim lebih dari satu tim</li>
                </ul>
              </div>
            </div>
          </article>

          <!-- Slide 3 -->
          <article class="ket-slide shrink-0 {{ $slideW }} {{ $slideH }}">
            <div class="ket-card h-full">
              <div class="ket-card-top">
                <div class="ket-title">Pendaftaran</div>
                <div class="ket-line"></div>
              </div>

              <div class="ket-card-body">
                <ul class="ket-list">
                  <li><span class="ket-dot"></span>Tim melakukan pendaftaran melalui website resmi.</li>
                  <li><span class="ket-dot"></span>Tim terdaftar berhak mengikuti pelatihan.</li>
                </ul>
              </div>
            </div>
          </article>

        </div>
      </div>

      <!-- Bottom Navigation -->
      <div class="ket-bottom-nav">
        <button type="button" id="ketPrev" class="ket-nav-btn">
          ‹
        </button>
        <button type="button" id="ketNext" class="ket-nav-btn">
          ›
        </button>
      </div>

    </div>
  </div>

<style>
/* Background kembali ke putih elegan */
.ket-wrap{
  background: linear-gradient(to bottom, #ffffff, #f1f7ff);
}

.ket-h1{
  font-size: 22px;
  font-weight: 800;
  color: #0f172a;
}
.ket-sub{
  margin-top: 6px;
  font-size: 13px;
  color: #64748b;
}

.ket-viewport{
  overflow-x: hidden;
  overflow-y: visible;
  padding: 28px 56px 70px;
}

.ket-track{
  display: flex;
  gap: 28px;
  align-items: stretch;
  transition: transform .75s cubic-bezier(.16,1,.3,1);
}

/* Card biru lembut */
.ket-card{
  border-radius: 20px;
  background: #eaf3ff;
  border: 1px solid #dbeafe;
  box-shadow: 0 18px 50px rgba(0,0,0,.08);

  transform: scale(.90);
  opacity: .75;
  transition: all .45s cubic-bezier(.16,1,.3,1);
}

.is-active .ket-card{
  transform: scale(1);
  opacity: 1;
  box-shadow: 0 30px 70px rgba(0,0,0,.15);
}

.ket-card-top{
  padding: 20px 20px 0;
  text-align: center;
}
.ket-title{
  font-size: 14px;
  font-weight: 800;
  color: #0f172a;
}
.ket-line{
  margin-top: 12px;
  height: 3px;
  width: 100%;
  background: #1e293b;
  border-radius: 999px;
}

.ket-card-body{
  padding: 18px 20px 24px;
}

.ket-mini{
  border-radius: 16px;
  background: #ffffff;
  border: 1px solid #e2e8f0;
  padding: 14px;
  text-align: center;
  box-shadow: 0 6px 16px rgba(0,0,0,.05);
}

.ket-chip{
  display: inline-flex;
  margin-top: 10px;
  font-size: 11px;
  font-weight: 600;
  color: #475569;
  background: #f1f5f9;
  border-radius: 999px;
  padding: 6px 10px;
}

.ket-list{
  list-style: none;
  padding: 0;
  margin: 0;
  display: grid;
  gap: 12px;
  font-size: 13px;
  color: #334155;
}
.ket-list li{
  display: flex;
  gap: 10px;
}
.ket-dot{
  margin-top: 7px;
  width: 6px;
  height: 6px;
  border-radius: 999px;
  background: #1e293b;
}

.ket-bottom-nav{
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  bottom: 16px;
  display: flex;
  gap: 18px;
}

.ket-nav-btn{
  width: 40px;
  height: 40px;
  border-radius: 999px;
  background: #ffffff;
  border: 1px solid #e2e8f0;
  font-size: 20px;
  font-weight: 700;
  color: #0f172a;
  box-shadow: 0 10px 30px rgba(0,0,0,.08);
  transition: .2s;
}
.ket-nav-btn:hover{
  background: #f8fafc;
}
.ket-nav-btn:active{
  transform: scale(.95);
}
</style>

<script>
(function () {
  const viewport = document.getElementById('ketViewport');
  const track = document.getElementById('ketTrack');
  const slides = Array.from(track.querySelectorAll('.ket-slide'));
  const prev = document.getElementById('ketPrev');
  const next = document.getElementById('ketNext');

  let current = 1;

  function clamp(n, min, max) { return Math.max(min, Math.min(max, n)); }

  function update() {
    const slide = slides[current];
    const viewportWidth = viewport.clientWidth;
    const slideWidth = slide.getBoundingClientRect().width;
    const slideCenter = slide.offsetLeft + slideWidth / 2;
    const viewportCenter = viewportWidth / 2;
    const translate = viewportCenter - slideCenter;
    track.style.transform = `translateX(${translate}px)`;

    slides.forEach((s,i)=>s.classList.toggle('is-active',i===current));
  }

  function goTo(i){
    current = clamp(i,0,slides.length-1);
    update();
  }

  prev.onclick=()=>goTo(current-1);
  next.onclick=()=>goTo(current+1);

  window.addEventListener('resize',update);
  requestAnimationFrame(update);
})();
</script>

</section>
@endsection