@extends('layouts.app')

@section('title', 'Ketentuan Lomba')

@section('content')
<style>
  .kb-wrap{
    padding: 56px 16px 90px;
    background: #fff;
    display: flex;
    justify-content: center;
  }

  .kb-shell{
    width: min(960px, 100%);
  }

  .kb-title{
    text-align: center !important;
    font-weight: 900 !important;
    font-size: clamp(22px,2.2vw,32px) !important;
    margin: 0 0 6px !important;
    color: #111 !important;
  }

  .kb-sub{
    text-align: center !important;
    font-size: 13px !important;
    color: #111 !important;
    margin: 0 0 36px !important;
  }

  /* TAB NAV */
  .kb-tabs{
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-bottom: 32px;
    flex-wrap: wrap;
  }

  .kb-tab{
    padding: 8px 22px;
    border-radius: 999px;
    border: 1.5px solid #e2e8f0;
    background: #fff;
    font-size: 13px;
    font-weight: 600;
    color: #64748b;
    cursor: pointer;
    transition: all .2s ease;
  }

  .kb-tab:hover{
    border-color: #94a3b8;
    color: #111;
  }

  .kb-tab.active{
    background: #0b2a5b;
    border-color: #0b2a5b;
    color: #fff;
  }

  /* CARD */
  .kb-panel{
    display: none;
    animation: kb-fadeIn .3s ease;
  }

  .kb-panel.active{
    display: block;
  }

  @keyframes kb-fadeIn{
    from{ opacity:0; transform:translateY(6px); }
    to{ opacity:1; transform:translateY(0); }
  }

  .kb-card{
    background: #f8fafc;
    border: 1.5px solid #e2e8f0;
    border-radius: 20px;
    padding: 36px 40px;
    max-width: 680px;
    margin: 0 auto;
  }

  .kb-card-title{
    font-size: 18px;
    font-weight: 800;
    color: #0b2a5b;
    margin: 0 0 20px;
    padding-bottom: 14px;
    border-bottom: 2px solid #e2e8f0;
  }

  .kb-list{
    list-style: none;
    padding: 0;
    margin: 0;
    counter-reset: item;
  }

  .kb-list li{
    counter-increment: item;
    display: flex;
    gap: 14px;
    align-items: flex-start;
    padding: 12px 0;
    border-bottom: 1px solid #f1f5f9;
    font-size: 14px;
    color: #334155;
    line-height: 1.6;
  }

  .kb-list li:last-child{
    border-bottom: none;
  }

  .kb-list li::before{
    content: counter(item);
    min-width: 26px;
    height: 26px;
    background: #0b2a5b;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    font-weight: 800;
    flex-shrink: 0;
    margin-top: 1px;
  }

  /* KATEGORI GRID */
  .kb-cat-grid{
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 14px;
  }

  .kb-cat-item{
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    padding: 16px 12px;
    background: #fff;
    border: 1.5px solid #e2e8f0;
    border-radius: 14px;
    transition: border-color .2s, box-shadow .2s;
  }

  .kb-cat-item:hover{
    border-color: #93c5fd;
    box-shadow: 0 4px 14px rgba(14,116,144,0.08);
  }

  .kb-cat-img{
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .kb-cat-img img{
    max-height: 60px;
    max-width: 100%;
    object-fit: contain;
  }

  .kb-cat-label{
    font-size: 11px;
    font-weight: 700;
    color: #0b2a5b;
    text-align: center;
    line-height: 1.3;
  }

  .kb-cat-item.full{
    grid-column: 2 / 3;
  }

  .kb-empty{
    font-size: 13px;
    color: #64748b;
    background: #fff;
    border: 1.5px dashed #cbd5e1;
    border-radius: 14px;
    padding: 14px;
    text-align: center;
  }

  @media(max-width:600px){
    .kb-card{ padding: 24px 20px; }
    .kb-cat-grid{ grid-template-columns: repeat(2, 1fr); }
    .kb-cat-item.full{ grid-column: 1 / -1; }
  }
</style>

@php
  $kategori = $kategori ?? collect();
  $persyaratan = $persyaratan ?? collect();
  $pendaftaran = $pendaftaran ?? collect();
@endphp

<div class="kb-wrap">
  <div class="kb-shell">

    <h2 class="kb-title">Ketentuan Lomba</h2>
    <p class="kb-sub">Baca ketentuan secara lengkap sebelum mendaftar</p>

    <!-- TABS -->
    <div class="kb-tabs">
      <button class="kb-tab active" onclick="switchTab(0, this)">Kategori</button>
      <button class="kb-tab" onclick="switchTab(1, this)">Persyaratan</button>
      <button class="kb-tab" onclick="switchTab(2, this)">Pendaftaran</button>
    </div>

    <!-- PANEL: Kategori -->
    <div class="kb-panel active" id="panel-0">
      <div class="kb-card">
        <div class="kb-card-title">Kategori Lomba</div>

        @if($kategori->count())
          <div class="kb-cat-grid">
            @foreach($kategori as $item)
              <div class="kb-cat-item">
                <div class="kb-cat-img">
                  @if(!empty($item->image))
                    <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title ?? 'Kategori' }}">
                  @else
                    {{-- kalau ga ada gambar, biarin kosong tapi layout aman --}}
                    <span style="font-size:12px;color:#94a3b8;">(tanpa gambar)</span>
                  @endif
                </div>

                <div class="kb-cat-label">
                  {{ $item->title ?? '-' }}
                </div>

                {{-- content kategori opsional (kalau kamu isi) --}}
                @if(!empty($item->content))
                  <div style="font-size:12px;color:#64748b;text-align:center;line-height:1.4;">
                    {{ $item->content }}
                  </div>
                @endif
              </div>
            @endforeach
          </div>
        @else
          <div class="kb-empty">Belum ada data kategori. Tambahkan dari CMS (menu Lomba &gt; Ketentuan).</div>
        @endif
      </div>
    </div>

    <!-- PANEL: Persyaratan -->
    <div class="kb-panel" id="panel-1">
      <div class="kb-card">
        <div class="kb-card-title">Persyaratan Peserta</div>

        @if($persyaratan->count())
          <ul class="kb-list">
            @foreach($persyaratan as $item)
              <li>{{ $item->content }}</li>
            @endforeach
          </ul>
        @else
          <div class="kb-empty">Belum ada data persyaratan. Tambahkan dari CMS (menu Lomba &gt; Ketentuan).</div>
        @endif
      </div>
    </div>

    <!-- PANEL: Pendaftaran -->
    <div class="kb-panel" id="panel-2">
      <div class="kb-card">
        <div class="kb-card-title">Cara Pendaftaran</div>

        @if($pendaftaran->count())
          <ul class="kb-list">
            @foreach($pendaftaran as $item)
              <li>{{ $item->content }}</li>
            @endforeach
          </ul>
        @else
          <div class="kb-empty">Belum ada data pendaftaran. Tambahkan dari CMS (menu Lomba &gt; Ketentuan).</div>
        @endif
      </div>
    </div>

  </div>
</div>

<script>
  function switchTab(index, el) {
    document.querySelectorAll('.kb-panel').forEach(p => p.classList.remove('active'));
    document.querySelectorAll('.kb-tab').forEach(t => t.classList.remove('active'));
    document.getElementById('panel-' + index).classList.add('active');
    el.classList.add('active');
  }
</script>
@endsection