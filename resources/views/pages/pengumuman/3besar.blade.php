@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">

<div class="min-h-screen w-full bg-white py-20 px-8" style="font-family:'Plus Jakarta Sans',sans-serif;">

    <div class="text-center mb-16">
        <h1 class="text-5xl font-extrabold text-black-900 mb-4">
            PENGUMUMAN 3 BESAR
        </h1>
        <h2 class="text-2xl font-semibold text-black-800">
            Hackathon Rumah Pendidikan 2026
        </h2>
        <p class="text-lg font-medium text-black-700 mt-2">
            Wujudkan Indonesia Cerdas
        </p>
    </div>

    {{-- Cards --}}
    <div class="pg-grid max-w-7xl mx-auto px-4" id="pgGrid">

        @php
        $categories = [
            ['label' => 'Paud / Sederajat', 'teams' => [

                ['name' => 'THE S.E.A PROJECT', 'school' => 'TK Surya Buana, Kota Malang'],
                ['name' => 'Tim Bu Guru Ceria',  'school' => 'TAUD SaQu Al Umm, Kalimantan Selatan'],
                ['name' => 'Tim GPG',            'school' => 'TK IT Al-Busyra, Lombok Tengah'],
            ]],
            ['label' => 'SD / Sederajat', 'teams' => [
                ['name' => 'THE S.E.A PROJECT', 'school' => 'SDN Sokaraja Kidul, Banyumas, Jawa Tengah'],
                ['name' => 'Tim Bu Guru Ceria',  'school' => 'SD Negeri Kradenan 01, Kab. Semarang'],
                ['name' => 'Tim GPG',            'school' => 'SDN 3 Sukahurip, Ciamis'],
            ]],
            ['label' => 'SMP / Sederajat', 'teams' => [
                ['name' => 'THE S.E.A PROJECT', 'school' => 'SMP Islam As-Shofa, Pekanbaru'],
                ['name' => 'Tim Bu Guru Ceria',  'school' => 'SMP Negeri 4 Kragan, Rembang'],
                ['name' => 'Tim GPG',            'school' => 'SMP Negeri 1 Nglipar, Gunungkidul'],
            ]],
            ['label' => 'SMA / Sederajat', 'teams' => [
                ['name' => 'THE S.E.A PROJECT', 'school' => 'SMA Negeri 75 Jakarta'],
                ['name' => 'Tim Bu Guru Ceria',  'school' => 'SMAN 1 Bintan, Kepulauan Riau'],
                ['name' => 'Tim GPG',            'school' => 'SMA Negeri 6 Bandung, Jawa Barat'],
            ]],
            ['label' => 'SMK / Sederajat', 'teams' => [
                ['name' => 'THE S.E.A PROJECT', 'school' => 'SMK IT As-Syifa, Jawa Tengah'],
                ['name' => 'Tim Bu Guru Ceria',  'school' => 'SMK Negeri 2 Bangkalan, Jawa Timur'],
                ['name' => 'Tim GPG',            'school' => 'SMK Telkom Banjarbaru, Kalimantan Selatan'],

                ['name' => 'THE S.E.A PROJECT', 'school' => 'TK Surya Buana, Kota Malang, Jawa Timur'],
                ['name' => 'Tim Bu Guru Ceria',  'school' => 'TAUD SaQu Al Umm Barabai, Hulu Sungai Tengah, Kalimantan Selatan'],
                ['name' => 'Tim GPG',            'school' => 'TK IT Al-Busyra Hasyimiyah, Lombok Tengah, Nusa Tenggara Barat'],
            ]],
            ['label' => 'SD / Sederajat', 'teams' => [
                ['name' => 'THE S.E.A PROJECT', 'school' => 'SDN Sokaraja Kidul, Banyumas, Jawa Tengah'],
                ['name' => 'Tim Bu Guru Ceria',  'school' => 'SD Negeri Kradenan 01, Kabupaten Semarang, Jawa Tengah'],
                ['name' => 'Tim GPG',            'school' => 'SDN 3 Sukahurip, Ciamis'],
            ]],
            ['label' => 'SMP / Sederajat', 'teams' => [
                ['name' => 'THE S.E.A PROJECT', 'school' => 'SMP Islam As-Shofa, Pekanbaru, Riau'],
                ['name' => 'Tim Bu Guru Ceria',  'school' => 'SMP Negeri 4 Satu Atap Kragan, Rembang, Jawa Tengah'],
                ['name' => 'Tim GPG',            'school' => 'SMP Negeri 1 Nglipar, Gunungkidul, DI Yogyakarta'],
            ]],
            ['label' => 'SMA / Sederajat', 'teams' => [
                ['name' => 'THE S.E.A PROJECT', 'school' => 'SMA Negeri 75 Jakarta, Jakarta Utara, DKI Jakarta'],
                ['name' => 'Tim Bu Guru Ceria',  'school' => 'SMAN 1 Bintan Pesisir, Bintan, Kepulauan Riau'],
                ['name' => 'Tim GPG',            'school' => 'SMA Negeri 6 Bandung, Kota Bandung, Jawa Barat'],
            ]],
            ['label' => 'SMK / Sederajat', 'teams' => [
                ['name' => 'THE S.E.A PROJECT', 'school' => 'SMK-IT As-Syifa Boarding School, Subang, Jawa Barat'],
                ['name' => 'Tim Bu Guru Ceria',  'school' => 'SMK Negeri 2 Bangkalan, Bangkalan, Jawa Timur'],
                ['name' => 'Tim GPG',            'school' => 'SMK Telkom Banjarbaru, Banjarbaru, Kalimantan Selatan'],
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

                    <button class="pg-btn">Lihat Detail</button>
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
@media (max-width:1024px) { .pg-grid { grid-template-columns: repeat(3,1fr); } }
@media (max-width:640px)  { .pg-grid { grid-template-columns: repeat(1,1fr); } }

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

    transform: scale(1);
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

    transition: flex 0.3s ease, min-height 0.3s ease, padding 0.3s ease, align-items 0.3s ease;

.pg-label-wrap h3 {
    font-size: 1rem;
    font-weight: 800;
    color: #1e293b;
    text-align: center;
    font-family: 'Plus Jakarta Sans', sans-serif;
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
    overflow: hidden;
    max-height: 0;
    opacity: 0;
    flex-shrink: 0;
    padding: 0 20px;
    transition: max-height 0.35s ease, opacity 0.3s ease;

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
.pg-tname   { font-weight:700; font-size:0.78rem; color:#1e293b; line-height:1.4; font-family:'Plus Jakarta Sans',sans-serif; }
.pg-tschool { font-size:0.69rem; color:#475569; margin-top:2px; line-height:1.4; font-family:'Plus Jakarta Sans',sans-serif; }

.pg-btn {
    display: block;
    width: 100%;
    margin-top: 18px;
    padding: 10px 0;
    background: #2563eb;
    color: #fff;
    border: none;
    border-radius: 9999px;
    font-size: 0.8rem;
    font-weight: 700;
    cursor: pointer;
    font-family: 'Plus Jakarta Sans', sans-serif;
    box-shadow: 0 2px 8px rgba(37,99,235,0.25);
    transition: background 0.2s;
}
.pg-btn:hover { background: #1d4ed8; }
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