@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">

<div class="min-h-screen w-full bg-white py-20 px-12" style="font-family:'Plus Jakarta Sans',sans-serif;">

    @php
    $jenjang = [
        [
            'title'   => '10 TIM PESERTA',
            'sub'     => 'LOLOS JENJANG PAUD',
            'slug'    => 'paud',
            'preview' => [
                ['name' => 'Tim GPG (Guru PAUD Cacor)', 'school' => 'TK IT AL-BUSYRA HASYIMIYAH, Prov. Nusa Tenggara Barat'],
                ['name' => 'PIONER DIGITAL',             'school' => 'TK Cendekia, Prov. Jawa Barat'],
                ['name' => 'SRIKANDI',                   'school' => 'TK Dharma Wanita, Prov. Jawa Barat'],
            ],
            'all' => [
                ['name' => 'Tim GPG (Guru PAUD Cacor)',    'school' => 'TK IT AL-BUSYRA HASYIMIYAH, Prov. Nusa Tenggara Barat'],
                ['name' => 'PIONER DIGITAL',               'school' => 'TK Cendekia, Prov. Jawa Barat'],
                ['name' => 'SRIKANDI',                     'school' => 'TK Dharma Wanita, Prov. Jawa Barat'],
                ['name' => 'TIM INSAN MADANI',             'school' => 'TK Islam Terpadu Insan Madani, Prov. Sulawesi Selatan'],
                ['name' => 'THE S.E.A PROJECT',            'school' => 'TK SURYA BUANA, Prov. Jawa Timur'],
                ['name' => 'TIM BAWI HABARING HURUNG',     'school' => 'TK BAKTI IBU SAMPIT, Prov. Kalimantan Tengah'],
                ['name' => 'MUMON',                        'school' => 'TK MUTIARA, Prov. Jawa Barat'],
                ['name' => 'Tim Bu Guru Ceria',            'school' => 'TAUD SaQu Al Umm Barabai, Prov. Kalimantan Selatan'],
                ['name' => 'BHAYANGKARI 47 FUTURE MAKERS', 'school' => 'TK KEMALA BHAYANGKARI 47 KOTA SUKABUMI, Prov. Jawa Barat'],
                ['name' => 'IZVI TEAM (ITA IZA SILVI)',    'school' => 'TK Alkhairiyah Surabaya, Prov. Jawa Timur'],
            ],
        ],
        [
            'title'   => '10 TIM PESERTA',
            'sub'     => 'LOLOS JENJANG SD',
            'slug'    => 'sd',
            'preview' => [
                ['name' => 'DEADLINE DEFENDERS JADUL', 'school' => 'SDN SOKARAJA KIDUL, Prov. Jawa Tengah'],
                ['name' => 'Doktor Game AI',            'school' => 'SD 1 Yayasan Pupuk Kaltim, Prov. Kalimantan Timur'],
                ['name' => 'SNELOVERSE',                'school' => 'SD NEGERI SELOHARJO, Prov. D.I. Yogyakarta'],
            ],
            'all' => [
                ['name' => 'DEADLINE DEFENDERS JADUL',      'school' => 'SDN SOKARAJA KIDUL, Prov. Jawa Tengah'],
                ['name' => 'Doktor Game AI',                'school' => 'SD 1 Yayasan Pupuk Kaltim, Prov. Kalimantan Timur'],
                ['name' => 'SNELOVERSE',                    'school' => 'SD NEGERI SELOHARJO, Prov. D.I. Yogyakarta'],
                ['name' => 'Novus Glitch',                  'school' => 'SD Negeri Kradenan 01, Prov. Jawa Tengah'],
                ['name' => 'Trinity',                       'school' => 'SD Katolik Waimamongu, Prov. Nusa Tenggara Timur'],
                ['name' => 'Tim Tilu Wira',                 'school' => 'SDN 3 SUKAHURIP, Prov. Jawa Barat'],
                ['name' => 'G.U.R.U (Grow Up Reform Unit)', 'school' => 'SDN BOGEM 1, Prov. Jawa Timur'],
                ['name' => 'NextGen EduCreators',           'school' => 'SD Negeri Cisauk, Prov. Jawa Barat'],
                ['name' => 'SmartEcoMath',                  'school' => 'SDN TANGGULTLARE, Prov. Jawa Tengah'],
                ['name' => 'ARKANANTA',                     'school' => 'SD Negeri Nongkosawit 01, Prov. Jawa Tengah'],
            ],
        ],
        [
            'title'   => '10 TIM PESERTA',
            'sub'     => 'LOLOS JENJANG SMP',
            'slug'    => 'smp',
            'preview' => [
                ['name' => 'SPANSAKU',   'school' => 'SMP NEGERI 1 KEBUN TEBU, Prov. Lampung'],
                ['name' => 'The Sapars', 'school' => 'SMP Negeri 1 Nglipar, Prov. D.I. Yogyakarta'],
                ['name' => 'BESTARIAU',  'school' => 'SMP ISLAM AS-SHOFA, Prov. Riau'],
            ],
            'all' => [
                ['name' => 'SPANSAKU',                               'school' => 'SMP NEGERI 1 KEBUN TEBU, Prov. Lampung'],
                ['name' => 'The Sapars',                             'school' => 'SMP Negeri 1 Nglipar, Prov. D.I. Yogyakarta'],
                ['name' => 'BESTARIAU',                              'school' => 'SMP ISLAM AS-SHOFA, Prov. Riau'],
                ['name' => 'EduGen 3.0',                             'school' => 'SMP 3 KUDUS, Prov. Jawa Tengah'],
                ['name' => 'SMPN 4 SATU ATAP KRAGAN',               'school' => 'SMP NEGERI 4 SATU ATAP KRAGAN, Prov. Jawa Tengah'],
                ['name' => 'Tim Smenduba',                           'school' => 'SMP Negeri 02 Batu, Prov. Jawa Timur'],
                ['name' => 'Tim WaLL',                               'school' => 'SMP Negeri 10 Surabaya, Prov. Jawa Timur'],
                ['name' => 'TIM 1TOT (Tim Orang Tua) SMPN 18 PALU', 'school' => 'SMP Negeri 18 Palu, Prov. Sulawesi Tengah'],
                ['name' => 'DF Pixel Innovators',                    'school' => 'SMP Qur\'an Darul Fatta Lampung Selatan, Prov. Lampung'],
                ['name' => 'KAMI CERIA SMP NEGERI 5 BALIKPAPAN',    'school' => 'SMP Negeri 5 Balikpapan, Prov. Kalimantan Timur'],
            ],
        ],
        [
            'title'   => '10 TIM PESERTA',
            'sub'     => 'LOLOS JENJANG SMA',
            'slug'    => 'sma',
            'preview' => [
                ['name' => 'GAMEBUS',               'school' => 'SMA NEGERI 10 MANDAU, Prov. Riau'],
                ['name' => 'The Winner',            'school' => 'SMA Negeri 1 Kabila, Prov. Gorontalo'],
                ['name' => 'InspiraTech Educators', 'school' => 'SMAN 1 INDRAMAYU, Prov. Jawa Barat'],
            ],
            'all' => [
                ['name' => 'GAMEBUS',               'school' => 'SMA NEGERI 10 MANDAU, Prov. Riau'],
                ['name' => 'The Winner',            'school' => 'SMA Negeri 1 Kabila, Prov. Gorontalo'],
                ['name' => 'InspiraTech Educators', 'school' => 'SMAN 1 INDRAMAYU, Prov. Jawa Barat'],
                ['name' => 'Pulau Kreatif',         'school' => 'SMAN 1 Bintan Pesisir, Prov. Kepulauan Riau'],
                ['name' => 'Jum@Space',             'school' => 'SMA Negeri 75 Jakarta, Prov. D.K.I. Jakarta'],
                ['name' => 'Pace-X',                'school' => 'SMAS YPPK Tiga Raja Timika, Prov. Papua Tengah'],
                ['name' => 'NURANI CODE',           'school' => 'SMAS Daar EL Qolam 2, Prov. Banten'],
                ['name' => 'Tim Sangkuriang',       'school' => 'SMA Negeri 6 Bandung, Prov. Jawa Barat'],
                ['name' => 'TILUNA EDUKASI',        'school' => 'SMA Negeri 1 Bantarujeg, Prov. Jawa Barat'],
                ['name' => 'VIDYA NEXUS',           'school' => 'SMA Negeri 1 Belik, Prov. Jawa Tengah'],
            ],
        ],
        [
            'title'   => '10 TIM PESERTA',
            'sub'     => 'LOLOS JENJANG SMK',
            'slug'    => 'smk',
            'preview' => [
                ['name' => 'SKATEL GAME SQUAD', 'school' => 'SMK Telkom Banjarbaru, Prov. Kalimantan Selatan'],
                ['name' => 'Level Up',           'school' => 'SMK-IT AS-SYIFA BOARDING SCHOOL, Prov. Jawa Barat'],
                ['name' => 'SIKANDAU G CENTER',  'school' => 'SMKN 2 MANDAU, Prov. Riau'],
            ],
            'all' => [
                ['name' => 'SKATEL GAME SQUAD',                    'school' => 'SMK Telkom Banjarbaru, Prov. Kalimantan Selatan'],
                ['name' => 'Level Up',                             'school' => 'SMK-IT AS-SYIFA BOARDING SCHOOL, Prov. Jawa Barat'],
                ['name' => 'SIKANDAU G CENTER',                    'school' => 'SMKN 2 MANDAU, Prov. Riau'],
                ['name' => 'SKEFOURS PULO 9',                      'school' => 'SMKN 4 SINJAI, Prov. Sulawesi Selatan'],
                ['name' => 'SKAVENGERS',                           'school' => 'SMKN 7 Makassar, Prov. Sulawesi Selatan'],
                ['name' => 'Kapan-Jo (SMK N 8 Purworejo)',         'school' => 'SMK N 8 Purworejo, Prov. Jawa Tengah'],
                ['name' => 'Logic Craft',                          'school' => 'SMK Negeri 2 Bangkalan, Prov. Jawa Timur'],
                ['name' => 'Tim Gelombang Utara',                  'school' => 'SMK NEGERI 1 BRONDONG, Prov. Jawa Timur'],
                ['name' => 'Tim Eduvators (Education Innovators)', 'school' => 'SMK NEGERI KABUH, Prov. Jawa Timur'],
                ['name' => 'Roda.net 54',                          'school' => 'SMKN 54 JAKARTA, Prov. D.K.I. Jakarta'],
            ],
        ],
    ];
    @endphp

    {{-- HALAMAN UTAMA --}}
    <div id="page-main">
        <div class="text-center mb-16">
            <h1 style="font-size:clamp(1.8rem,4vw,2.8rem);font-weight:800;color:#0f172a;line-height:1.2;">
                Pengumuman Peserta Lolos Seleksi<br>
                Proposal Hackathon Rumah Pendidikan 2025
            </h1>
        </div>

        <div style="display:grid;grid-template-columns:repeat(5,1fr);gap:16px;max-width:1200px;margin:0 auto;">
            @foreach($jenjang as $col)
            <div style="background:#dce8f0;border-radius:12px;border:1.5px solid #b8d4e0;display:flex;flex-direction:column;overflow:hidden;">

                {{-- Header --}}
                <div style="padding:14px 16px;border-bottom:1.5px solid #1e293b;text-align:center;">
                    <p style="font-size:0.73rem;font-weight:800;color:#1e293b;line-height:1.4;">{{ $col['title'] }}</p>
                    <p style="font-size:0.73rem;font-weight:800;color:#1e293b;line-height:1.4;">{{ $col['sub'] }}</p>
                </div>

                {{-- Preview 3 tim --}}
                <div style="padding:16px;flex:1;">
                    @foreach($col['preview'] as $rank => $team)
                    <div style="display:flex;gap:8px;margin-bottom:{{ $loop->last ? '0' : '14px' }};">
                        <span style="font-size:0.73rem;font-weight:700;color:#1e293b;flex-shrink:0;">{{ $rank + 1 }}.</span>
                        <div>
                            <p style="font-size:0.73rem;font-weight:800;color:#1e293b;line-height:1.4;text-transform:uppercase;">{{ $team['name'] }}</p>
                            <p style="font-size:0.66rem;color:#color:#1e293;margin-top:2px;line-height:1.4;">{{ $team['school'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Button --}}
                <div style="padding:0 16px 20px;text-align:center;">
                    <button onclick="showDetail('{{ $col['slug'] }}')" style="
                        padding:7px 22px;
                        background:#FFD93D;
                        color:#FFFFFF;
                        border:none;
                        border-radius:9999px;
                        font-size:0.72rem;
                        font-weight:800;
                        cursor:pointer;
                        font-family:'Plus Jakarta Sans',sans-serif;
                        letter-spacing:0.02em;
                    ">
                        TIM LAINNYA
                    </button>
                </div>

            </div>
            @endforeach
        </div>
    </div>

    {{-- HALAMAN DETAIL --}}
    @foreach($jenjang as $col)
    <div id="detail-{{ $col['slug'] }}" style="display:none;">

        {{-- Judul --}}
        <div style="text-align:center;margin-bottom:48px;">
            <h1 style="font-size:clamp(1.6rem,3.5vw,2.4rem);font-weight:800;color:#0f172a;line-height:1.2;">
                {{ $col['title'] }} {{ $col['sub'] }}
            </h1>
        </div>

        {{-- Kotak 2 kolom --}}
        <div style="max-width:900px;margin:0 auto;background:#dce8f0;border-radius:20px;border:1.5px solid #b8d4e0;padding:40px 48px;">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:28px 56px;align-items:start;">

                {{-- Kolom kiri: 1-5 --}}
                <div style="display:flex;flex-direction:column;gap:22px;">
                    @foreach(array_slice($col['all'], 0, 5) as $rank => $team)
                    <div style="display:flex;gap:12px;align-items:flex-start;">
                        <span style="font-size:0.82rem;font-weight:800;color:#1e293b;flex-shrink:0;min-width:24px;">{{ $rank + 1 }}.</span>
                        <div>
                            <p style="font-size:0.82rem;font-weight:800;color:#1e293b;line-height:1.4;text-transform:uppercase;">{{ $team['name'] }}</p>
                            <p style="font-size:0.72rem;color:#64748b;margin-top:3px;line-height:1.4;">{{ $team['school'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Kolom kanan: 6-10 --}}
                <div style="display:flex;flex-direction:column;gap:22px;">
                    @foreach(array_slice($col['all'], 5, 5) as $rank => $team)
                    <div style="display:flex;gap:12px;align-items:flex-start;">
                        <span style="font-size:0.82rem;font-weight:800;color:#1e293b;flex-shrink:0;min-width:24px;">{{ $rank + 6 }}.</span>
                        <div>
                            <p style="font-size:0.82rem;font-weight:800;color:#1e293b;line-height:1.4;text-transform:uppercase;">{{ $team['name'] }}</p>
                            <p style="font-size:0.72rem;color:#64748b;margin-top:3px;line-height:1.4;">{{ $team['school'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>

        {{-- Tombol Kembali --}}
        <div style="text-align:center;margin-top:40px;">
            <button onclick="showMain()" style="
                padding:10px 40px;
                background:#FFD93D;
                color:#FFFFFF;
                border:none;
                border-radius:9999px;
                font-size:0.85rem;
                font-weight:800;
                cursor:pointer;
                font-family:'Plus Jakarta Sans',sans-serif;
                transition:background 0.2s;
            "
            onmouseover="this.style.background='#f5c800'"
            onmouseout="this.style.background='#FFD93D'">
                Kembali
            </button>
        </div>

    </div>
    @endforeach

</div>

<script>
function showDetail(slug) {
    document.getElementById('page-main').style.display = 'none';
    document.querySelectorAll('[id^="detail-"]').forEach(el => el.style.display = 'none');
    document.getElementById('detail-' + slug).style.display = 'block';
    window.scrollTo({top: 0, behavior: 'smooth'});
}

function showMain() {
    document.querySelectorAll('[id^="detail-"]').forEach(el => el.style.display = 'none');
    document.getElementById('page-main').style.display = 'block';
    window.scrollTo({top: 0, behavior: 'smooth'});
}
</script>

@endsection