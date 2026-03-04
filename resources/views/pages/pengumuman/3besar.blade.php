@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Poppins:wght@700;900&display=swap" rel="stylesheet">

<div class="min-h-screen w-full bg-white py-20 px-8" style="font-family:'Plus Jakarta Sans',sans-serif;">

    {{-- Title --}}
    <div class="text-center mb-16">
        <h1 style="font-family:'Poppins',sans-serif;font-size:37px;font-weight:900;color:#000000;margin-bottom:1rem;">
            PENGUMUMAN 3 BESAR
        </h1>
        <h2 style="font-family:'Poppins',sans-serif;font-size:22px;font-weight:600;color:#1e293b;margin-bottom:0.5rem;">
            Hackathon Rumah Pendidikan 2026
        </h2>
        <p style="font-family:'Poppins',sans-serif;font-size:16px;font-weight:500;color:#475569;">
            Wujudkan Indonesia Cerdas
        </p>
    </div>

    {{-- Cards --}}
    <div class="pg-grid max-w-7xl mx-auto px-4" id="pgGrid">

        @php
        $categories = [
            ['label' => 'Paud / Sederajat', 'teams' => [
                ['name' => 'TIM GPG (GURU PAUD GACOR)', 'school' => 'TK IT AL-BUSYRA HASYIMIYAH, Prov. Nusa Tenggara Barat'],
                ['name' => 'PIONER DIGITAL',             'school' => 'TK Cendekia, Prov. Jawa Barat'],
                ['name' => 'SRIKANDI',                   'school' => 'TK Dharma Wanita, Prov. Jawa Barat'],
            ]],
            ['label' => 'SD / Sederajat', 'teams' => [
                ['name' => 'DEADLINE DEFENDERS JADUL',   'school' => 'SDN SOKARAJA KIDUL, Prov. Jawa Tengah'],
                ['name' => 'DOKTOR GAME AI',             'school' => 'SD 1 Yayasan Pupuk Kaltim, Prov. Kalimantan Timur'],
                ['name' => 'SNELOVERSE',                 'school' => 'SD NEGERI SELOHARJO, Prov. D.I. Yogyakarta'],
            ]],
            ['label' => 'SMP / Sederajat', 'teams' => [
                ['name' => 'SPANSAKU',                   'school' => 'SMP NEGERI 1 KEBUN TEBU, Prov. Lampung'],
                ['name' => 'THE SAPARS',                 'school' => 'SMP Negeri 1 Nglipar, Prov. D.I. Yogyakarta'],
                ['name' => 'BESTARIAU',                  'school' => 'SMP ISLAM AS-SHOFA, Prov. Riau'],
            ]],
            ['label' => 'SMA / Sederajat', 'teams' => [
                ['name' => 'GAMEBUS',                    'school' => 'SMA NEGERI 10 MANDAU, Prov. Riau'],
                ['name' => 'THE WINNER',                 'school' => 'SMA Negeri 1 Kabila, Prov. Gorontalo'],
                ['name' => 'INSPIRATECH EDUCATORS',      'school' => 'SMAN 1 INDRAMAYU, Prov. Jawa Barat'],
            ]],
            ['label' => 'SMK / Sederajat', 'teams' => [
                ['name' => 'SKATEL GAME SQUAD',          'school' => 'SMK Telkom Banjarbaru, Prov. Kalimantan Selatan'],
                ['name' => 'LEVEL UP',                   'school' => 'SMK-IT AS-SYIFA BOARDING SCHOOL, Prov. Jawa Barat'],
                ['name' => 'SIKANDAU G CENTER',          'school' => 'SMKN 2 MANDAU, Prov. Riau'],
            ]],
        ];
        @endphp

        @foreach($categories as $cat)
        <div class="pg-card">
            <div class="pg-label-wrap">
                <h3>{{ $cat['label'] }}</h3>
            </div>
            <div class="pg-body">
                <div class="pg-body-inner">
                    @foreach($cat['teams'] as $rank => $team)
                    <div class="pg-team {{ $loop->last ? '' : 'pg-team-mb' }}">
                        <p class="pg-tname">{{ $rank + 1 }}. {{ $team['name'] }}</p>
                        <p class="pg-tschool">{{ $team['school'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>

<style>
.pg-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 18px;
    align-items: start;
}
@media (max-width:1024px) {
    .pg-grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    .pg-card {
        flex: 0 0 calc(33.333% - 14px);
        min-width: 160px;
    }
}
@media (max-width:640px) {
    .pg-grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    .pg-card {
        flex: 0 0 100%;
    }
}

/* Card */
.pg-card {
    background: #dce8ee;
    border-radius: 20px;
    min-height: 300px;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    cursor: pointer;
    box-shadow: 0 3px 12px rgba(0,0,0,0.07);
    transform-origin: center center;
    transition: transform 0.3s ease, box-shadow 0.3s ease, opacity 0.3s ease;
}

/* Aktif: maju ke depan */
.pg-grid.has-active .pg-card.active {
    transform: scale(1.08);
    box-shadow: 0 18px 40px rgba(0,0,0,0.16);
    position: relative;
    z-index: 10;
    opacity: 1;
}

/* Tidak aktif: mundur ke belakang */
.pg-grid.has-active .pg-card:not(.active) {
    transform: scale(0.91);
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    opacity: 0.85;
}

/* Label: default di tengah */
.pg-label-wrap {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    min-height: 180px;
}
.pg-label-wrap h3 {
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    font-weight: 900;
    color: #1e293b;
    text-align: center;
}

/* Aktif: label naik ke atas */
.pg-card.active .pg-label-wrap {
    flex: 0;
    min-height: 0;
    padding: 20px 20px 0;
    align-items: flex-start;
}

/* Konten: tersembunyi */
.pg-body {
    display: none;
    padding: 0 20px;
}

/* Aktif: konten muncul */
.pg-card.active .pg-body {
    max-height: 400px;
    opacity: 1;
    display: block;
}

.pg-body-inner { padding: 10px 0 20px; }

.pg-team-mb { margin-bottom: 14px; }

/* Nama tim: bold, uppercase, seperti gambar referensi */
.pg-tname {
    font-weight: 900;
    font-size: 13px;
    color: #0f172a;
    line-height: 1.4;
    font-family: 'Poppins', sans-serif;
    text-transform: uppercase;
}

/* Nama sekolah */
.pg-tschool {
    font-size: 0.69rem;
    color: #475569;
    margin-top: 2px;
    line-height: 1.4;
    font-family: 'Plus Jakarta Sans', sans-serif;
}
</style>

<script>
(function() {
    const grid  = document.getElementById('pgGrid');
    const cards = Array.from(grid.querySelectorAll('.pg-card'));

    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            grid.classList.add('has-active');
            cards.forEach(c => c.classList.remove('active'));
            card.classList.add('active');
        });
        card.addEventListener('mouseleave', () => {
            card.classList.remove('active');
            grid.classList.remove('has-active');
        });
    });
})();
</script>

@endsection