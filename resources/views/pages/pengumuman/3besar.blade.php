@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">

<div class="min-h-screen w-full bg-white pt-8 pb-20 px-8" style="font-family:'Plus Jakarta Sans',sans-serif;">

    {{-- Title --}}
    <div class="text-center mb-16">
        <h1 class="text-5xl font-extrabold text-black-900 mb-4" style="font-family:'Poppins',sans-serif; font-size:42px; font-feature-settings:normal;">
            {{ $pengumuman->title ?? 'PENGUMUMAN 3 BESAR' }}
        </h1>

        <h2 class="text-2xl font-semibold text-black-800" style="margin-bottom:0; font-family:'Poppins',sans-serif; font-size:30px; font-feature-settings:normal; font-weight:700;">
            Hackathon Rumah Pendidikan 2026
        </h2>

        @if(!empty($pengumuman?->content))
            <p class="text-lg font-medium text-black-700 whitespace-pre-line" style="margin-top:2px !important; font-family:'Poppins',sans-serif; font-size:20px; font-feature-settings:normal; font-variation-settings:normal; font-weight:800;">
                {{ $pengumuman->content }}
            </p>
        @else
            <p style="margin-top:2px; font-family:'Poppins',sans-serif; font-size:20px; font-feature-settings:normal; font-variation-settings:normal; font-weight:400;">
                Wujudkan Indonesia Cerdas
            </p>
        @endif
    </div>

    {{-- Cards --}}
    <div class="pg-grid max-w-7xl mx-auto px-4" id="pgGrid">

        @forelse($groups as $group)
            <div class="pg-card">
                <div class="pg-label-wrap">
                    <h3>{{ $group->subtitle }}</h3>
                </div>

                <div class="pg-body">
                    <div class="pg-body-inner">
                        @forelse($group->entries as $entry)
                            <div class="pg-team {{ $loop->last ? '' : 'pg-team-mb' }}">
                                <p class="pg-tname">{{ $entry->rank_order }}. {{ $entry->team_name }}</p>
                                <p class="pg-tschool" style="font-family:'Poppins',sans-serif !important;">{{ $entry->school_name }}</p>
                            </div>
                        @empty
                            <div class="pg-team">
                                <p class="pg-tname">Belum ada data tim</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-slate-500 text-lg">
                Belum ada data pengumuman 3 besar.
            </div>
        @endforelse

    </div>
</div>

<style>
h2.text-2xl { margin-bottom: 0 !important; }
p.text-lg   { margin-top: 2px !important; }

/* ── Grid ── */
.pg-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 16px;
    align-items: start;
}
@media (max-width:1024px) { .pg-grid { grid-template-columns: repeat(3,1fr); } }
@media (max-width:640px)  { .pg-grid { grid-template-columns: repeat(1,1fr); } }

/* ── Card animation ── */
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(14px); }
    to   { opacity: 1; transform: translateY(0); }
}

.pg-card {
    background: #111827;
    border-radius: 12px;
    min-height: 300px;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    cursor: pointer;
    border: 1px solid rgba(255,255,255,0.07);
    transform-origin: center center;
    transition: transform 0.7s cubic-bezier(0.16,1,0.3,1),
                box-shadow 0.7s ease,
                opacity 0.7s ease;
    opacity: 0;
    animation: fadeUp 1.6s cubic-bezier(0.16,1,0.3,1) forwards;
}

.pg-card:nth-child(1) { animation-delay: 0.10s; }
.pg-card:nth-child(2) { animation-delay: 0.28s; }
.pg-card:nth-child(3) { animation-delay: 0.46s; }
.pg-card:nth-child(4) { animation-delay: 0.64s; }
.pg-card:nth-child(5) { animation-delay: 0.82s; }

/* ── Active / inactive ── */
.pg-grid.has-active .pg-card.active {
    transform: scale(1.06);
    box-shadow: 0 16px 48px rgba(0,0,0,0.3);
    background: #111827;
    position: relative;
    z-index: 10;
    opacity: 1;
}

.pg-grid.has-active .pg-card:not(.active) {
    transform: scale(0.94);
    opacity: 0.55;
}

/* ── Label wrap ── */
.pg-label-wrap {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 24px 20px;
    min-height: 180px;
}

.pg-label-wrap h3 {
    font-size: 15px;
    font-weight: 700;
    color: #ffffff;
    text-align: center;
    font-family: 'Poppins', sans-serif;
    font-variation-settings: normal;
}

.pg-card.active .pg-label-wrap {
    flex: 0;
    min-height: 0;
    padding: 18px 20px 10px;
    align-items: flex-start;
    border-bottom: 1px solid rgba(255,255,255,0.07);
}

/* ── Body ── */
.pg-body {
    display: none;
    padding: 0 20px;
}

.pg-card.active .pg-body {
    max-height: 400px;
    opacity: 1;
    display: block;
}

.pg-body-inner { padding: 12px 0 20px; }

.pg-team-mb { margin-bottom: 12px; }

.pg-team {
    padding: 6px 8px;
    border-radius: 8px;
    transition: background 0.4s ease;
}
.pg-team:hover {
    background: rgba(255,255,255,0.06);
}

.pg-tname {
    font-weight: 700;
    font-size: 13px;
    color: #ffffff;
    line-height: 1.4;
    font-family: 'Poppins', sans-serif;
    font-feature-settings: normal;
    font-variation-settings: normal;
}

.pg-tschool {
    font-size: 10.56px !important;
    color: rgba(255,255,255,0.55);
    margin-top: 2px;
    line-height: 1.4;
    font-family: 'Poppins', sans-serif !important;
    font-feature-settings: normal;
    font-variation-settings: normal;
}

body .pg-tschool {
    font-family: 'Poppins', sans-serif !important;
}
</style>

<script>
(function() {
    const grid = document.getElementById('pgGrid');
    if (!grid) return;

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