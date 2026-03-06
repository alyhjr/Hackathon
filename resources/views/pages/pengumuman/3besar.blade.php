@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">

<div class="min-h-screen w-full bg-white py-20 px-8" style="font-family:'Plus Jakarta Sans',sans-serif;">

    {{-- Title --}}
    <div class="text-center mb-16">
        <h1 class="text-5xl font-extrabold text-black-900 mb-4">
            {{ $pengumuman->title ?? 'PENGUMUMAN 3 BESAR' }}
        </h1>

        <h2 class="text-2xl font-semibold text-black-800">
            Hackathon Rumah Pendidikan 2026
        </h2>

        @if(!empty($pengumuman?->content))
            <p class="text-lg font-medium text-black-700 mt-2 whitespace-pre-line">
                {{ $pengumuman->content }}
            </p>
        @else
            <p class="text-lg font-medium text-black-700 mt-2">
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
                                <p class="pg-tschool">{{ $entry->school_name }}</p>
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
.pg-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 18px;
    align-items: start;
}
@media (max-width:1024px) { .pg-grid { grid-template-columns: repeat(3,1fr); } }
@media (max-width:640px)  { .pg-grid { grid-template-columns: repeat(1,1fr); } }

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

.pg-grid.has-active .pg-card.active {
    transform: scale(1.08);
    box-shadow: 0 18px 40px rgba(0,0,0,0.16);
    position: relative;
    z-index: 10;
    opacity: 1;
}

.pg-grid.has-active .pg-card:not(.active) {
    transform: scale(0.91);
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    opacity: 0.85;
}

.pg-label-wrap {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    min-height: 180px;
}

.pg-label-wrap h3 {
    font-size: 1rem;
    font-weight: 800;
    color: #1e293b;
    text-align: center;
    font-family: 'Plus Jakarta Sans', sans-serif;
}

.pg-card.active .pg-label-wrap {
    flex: 0;
    min-height: 0;
    padding: 20px 20px 0;
    align-items: flex-start;
}

.pg-body {
    display: none;
    padding: 0 20px;
}

.pg-card.active .pg-body {
    max-height: 400px;
    opacity: 1;
    display: block;
}

.pg-body-inner { padding: 10px 0 20px; }

.pg-team-mb { margin-bottom: 14px; }
.pg-tname   {
    font-weight: 700;
    font-size: 0.78rem;
    color: #1e293b;
    line-height: 1.4;
    font-family: 'Plus Jakarta Sans', sans-serif;
}
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