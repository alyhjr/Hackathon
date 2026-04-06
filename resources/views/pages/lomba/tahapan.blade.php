@extends('layouts.app')

@section('content')
<style>
:root{
  --primary:#003049;
  --primary2:#1d4e63;
  --primary3:#4f6d7a;
  --bg:#f8fafc;
  --text:#0f172a;
  --muted:#64748b;
}

/* WRAPPER */
.timeline-wrap{
  padding:70px 20px;
}

.timeline-container{
  max-width:1100px;
  margin:auto;
}

.timeline-title{
  text-align:center;
  font-size:30px;
  font-weight:900;
  color:var(--text);
}

.timeline-sub{
  text-align:center;
  color:var(--muted);
  margin-bottom:50px;
  font-size:14px;
}

/* MAIN LINE */
.timeline{
  position:relative;
}

.timeline::before{
  content:'';
  position:absolute;
  left:50%;
  transform:translateX(-50%);
  width:4px;
  height:100%;
  background:linear-gradient(to bottom, #003049, #4f6d7a);
  box-shadow:0 0 6px rgba(0,48,73,0.15);
}

/* ITEM */
.timeline-item{
  display:flex;
  justify-content:space-between;
  align-items:center;
  margin-bottom:40px;
  position:relative;
}

/* LEFT RIGHT */
.timeline-item:nth-child(odd){
  flex-direction:row;
}

.timeline-item:nth-child(even){
  flex-direction:row-reverse;
}

/* CARD (SUDAH FIX - TANPA KOTAK BIRU) */
.timeline-card{
  width:42%;
  background:#ffffff; /* SOLID PUTIH */
  padding:16px 18px;
  border-radius:14px;
  box-shadow:0 12px 30px rgba(0,0,0,0.1);
  border:1px solid rgba(0,0,0,0.05);
  border-left:3px solid #003049;
  transition:all .35s ease;
  opacity:0;
  transform:translateY(30px);
}

.timeline-card.show{
  opacity:1;
  transform:translateY(0);
}

.timeline-card:hover{
  transform:translateY(-4px);
  box-shadow:0 18px 40px rgba(0,0,0,0.12);
}

.timeline-title-step{
  font-weight:800;
  color:var(--primary);
  margin-bottom:6px;
  font-size:15px;
}

.timeline-desc{
  font-size:13px;
  color:var(--text);
}

.timeline-desc ul{
  margin:0;
  padding-left:18px;
}

.timeline-desc li{
  margin-bottom:4px;
}

/* DOT */
.timeline-dot{
  position:absolute;
  left:50%;
  transform:translate(-50%, -50%);
  top:50%;
  width:32px;
  height:32px;
  border-radius:50%;
  background:linear-gradient(135deg, #003049, #1d4e63);
  color:#fff;
  display:flex;
  align-items:center;
  justify-content:center;
  font-weight:800;
  font-size:13px;
  box-shadow:0 6px 14px rgba(0,0,0,0.2);
  z-index:2;
}

/* RESPONSIVE */
@media(max-width:768px){
  .timeline::before{
    left:20px;
  }

  .timeline-item{
    flex-direction:column !important;
    align-items:flex-start;
  }

  .timeline-card{
    width:100%;
    margin-left:50px;
  }

  .timeline-dot{
    left:20px;
    top:20px;
    transform:none;
  }
}
</style>

<div class="timeline-wrap">
  <div class="timeline-container">

    <h2 class="timeline-title">Tahapan Kegiatan</h2>
    <p class="timeline-sub">Alur kegiatan dari awal hingga selesai</p>

    <div class="timeline">
      @foreach(($steps ?? collect())->sortBy('step_number') as $s)
        <div class="timeline-item">
          
          <div class="timeline-card">
            <div class="timeline-title-step">
              {{ $s->step_number }}. {{ $s->title }}
            </div>

            @if(!empty($s->bullets))
            <div class="timeline-desc">
              <ul>
                @foreach($s->bullets as $b)
                  <li>{{ $b }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          </div>

          <div class="timeline-dot">
            {{ $s->step_number }}
          </div>

        </div>
      @endforeach
    </div>

  </div>
</div>

<script>
// animasi muncul saat scroll
const observer = new IntersectionObserver((entries)=>{
  entries.forEach(entry=>{
    if(entry.isIntersecting){
      entry.target.classList.add('show');
    }
  });
},{ threshold:0.2 });

document.querySelectorAll('.timeline-card').forEach(el=>{
  observer.observe(el);
});
</script>

@endsection