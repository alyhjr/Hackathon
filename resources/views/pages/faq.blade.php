@extends('layouts.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

@php
    $groupedFaq = collect($faqs ?? [])
        ->where('is_active', 1)
        ->sortBy([
            ['category', 'asc'],
            ['sort_order', 'asc'],
            ['id', 'asc'],
        ])
        ->groupBy('category');
@endphp

<style>
/* Scoped ke .faq-page saja agar tidak merusak navbar & footer */
.faq-page *, .faq-page *::before, .faq-page *::after { box-sizing: border-box; margin: 0; padding: 0; }

.faq-page {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: #fff;
    color: #0f172a;
}

.fhero {
    background: #fff;
    border-bottom: 1px solid #e2e8f0;
    padding: 28px 24px 24px;
    text-align: center;
}
.fhero-badge {
    display: inline-block;
    background: #f1f5f9;
    color: #475569;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .06em;
    text-transform: uppercase;
    padding: 3px 12px;
    border-radius: 999px;
    border: 1px solid #e2e8f0;
    margin-bottom: 10px;
}
.fhero h1 {
    font-size: clamp(18px, 2.2vw, 26px);
    font-weight: 800;
    line-height: 1.2;
    letter-spacing: -.02em;
    color: #0f172a;
    margin-bottom: 4px;
}
.fhero h1 span { color: #2563eb; }
.fhero p { font-size: 12.5px; color: #64748b; }

.fwrap {
    max-width: 1040px;
    margin: 0 auto;
    padding: 28px 24px 64px;
    display: grid;
    grid-template-columns: 185px 1fr;
    gap: 28px;
    align-items: start;
}

.fside {
    position: sticky;
    top: 90px;
    z-index: 10;
}
.fside-label {
    font-size: 9.5px;
    font-weight: 700;
    letter-spacing: .1em;
    text-transform: uppercase;
    color: #94a3b8;
    padding: 0 8px;
    margin-bottom: 6px;
}
.fside-nav { display: flex; flex-direction: column; gap: 1px; }
.fside-link {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 7px 10px;
    border-radius: 7px;
    font-size: 12px;
    font-weight: 500;
    color: #64748b;
    text-decoration: none;
    transition: background .12s, color .12s;
    border-left: 2px solid transparent;
}
.fside-link:hover { background: #f8fafc; color: #1e293b; }
.fside-link.active {
    background: #f8fafc;
    color: #2563eb;
    font-weight: 700;
    border-left-color: #2563eb;
    box-shadow: 0 1px 3px rgba(0,0,0,.06);
}
.fside-count {
    font-size: 9.5px;
    font-weight: 700;
    color: #cbd5e1;
    background: #f1f5f9;
    padding: 1px 6px;
    border-radius: 999px;
    flex-shrink: 0;
}

.fmain { min-width: 0; }

.fcat {
    margin-bottom: 20px;
    scroll-margin-top: 110px;
}
.fcat-head {
    display: flex;
    align-items: center;
    padding-bottom: 8px;
    margin-bottom: 6px;
    border-bottom: 1px solid #e2e8f0;
}
.fcat-name { font-size: 13.5px; font-weight: 700; color: #1e293b; flex: 1; }
.fcat-num  { font-size: 11px; font-weight: 600; color: #94a3b8; }

.facc {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    margin-bottom: 3px;
    overflow: hidden;
    transition: border-color .15s;
}
.facc:hover { border-color: #cbd5e1; }
.facc.open { border-color: #93c5fd; }

.facc-btn {
    width: 100%; background: none; border: none;
    padding: 12px 14px;
    display: flex; align-items: center; gap: 10px;
    cursor: pointer; text-align: left;
}
.facc-num {
    width: 22px; height: 22px;
    border-radius: 5px;
    background: #f1f5f9;
    display: flex; align-items: center; justify-content: center;
    font-size: 10px; font-weight: 700; color: #94a3b8;
    flex-shrink: 0;
    transition: background .15s, color .15s;
}
.facc.open .facc-num { background: #dbeafe; color: #2563eb; }

.facc-q {
    flex: 1;
    font-size: 12.5px; font-weight: 600;
    color: #374151; line-height: 1.5;
}
.facc.open .facc-q { color: #1e293b; }

.facc-chevron {
    flex-shrink: 0;
    width: 22px; height: 22px;
    border-radius: 5px;
    background: #f1f5f9;
    display: flex; align-items: center; justify-content: center;
    transition: background .15s, transform .24s ease;
}
.facc.open .facc-chevron { background: #dbeafe; transform: rotate(180deg); }
.facc-chevron svg { width: 11px; height: 11px; stroke: #94a3b8; transition: stroke .15s; }
.facc.open .facc-chevron svg { stroke: #2563eb; }

.facc-body {
    display: grid;
    grid-template-rows: 0fr;
    transition: grid-template-rows .24s cubic-bezier(.4,0,.2,1);
}
.facc.open .facc-body { grid-template-rows: 1fr; }
.facc-inner { overflow: hidden; }
.facc-ans {
    padding: 8px 14px 12px 46px;
    font-size: 12.5px;
    color: #64748b;
    line-height: 1.75;
    border-top: 1px solid #f1f5f9;
}

.fempty {
    border: 1px dashed #cbd5e1;
    background: #f8fafc;
    color: #64748b;
    border-radius: 12px;
    padding: 20px;
    font-size: 13px;
}

@media (max-width: 680px) {
    .fwrap { grid-template-columns: 1fr; padding: 16px 14px 48px; gap: 16px; }
    .fside { position: static; }
    .fside-nav { flex-direction: row; flex-wrap: wrap; gap: 4px; }
    .fside-link {
        border-left: none;
        border: 1px solid #e2e8f0;
        border-radius: 999px;
        padding: 4px 10px;
        font-size: 11px;
    }
    .fside-link.active { border-color: #93c5fd; background: #eff6ff; }
    .fside-count { display: none; }
    .fcat { scroll-margin-top: 16px; }
    .facc-ans { padding-left: 14px; }
}
</style>

<div class="faq-page">

<div class="fhero">
    <div class="fhero-badge">Hackathon Rumah Pendidikan 2026</div>
    <h1>Pertanyaan yang <span>Sering Ditanyakan</span></h1>
    <p>Temukan jawaban seputar Hackathon Rumah Pendidikan 2026.</p>
</div>

<div class="fwrap">
    <aside class="fside">
        <p class="fside-label">Kategori</p>
        <nav class="fside-nav">
            @forelse($groupedFaq as $category => $items)
                <a class="fside-link {{ $loop->first ? 'active' : '' }}"
                   href="#cat-{{ $loop->index }}" data-cat="{{ $loop->index }}">
                    {{ $category }}
                    <span class="fside-count">{{ $items->count() }}</span>
                </a>
            @empty
                <span class="fside-link">Belum ada kategori</span>
            @endforelse
        </nav>
    </aside>

    <main class="fmain">
        @forelse($groupedFaq as $category => $items)
            <div class="fcat" id="cat-{{ $loop->index }}">
                <div class="fcat-head">
                    <span class="fcat-name">{{ $category }}</span>
                    <span class="fcat-num">{{ $items->count() }} pertanyaan</span>
                </div>

                @foreach($items as $item)
                    <div class="facc" id="item-{{ $loop->parent->index }}-{{ $loop->index }}">
                        <button class="facc-btn" onclick="toggleFaq('item-{{ $loop->parent->index }}-{{ $loop->index }}')">
                            <span class="facc-num">{{ $loop->iteration }}</span>
                            <span class="facc-q">{{ $item->question }}</span>
                            <span class="facc-chevron">
                                <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"/>
                                </svg>
                            </span>
                        </button>
                        <div class="facc-body">
                            <div class="facc-inner">
                                <div class="facc-ans">{{ $item->answer }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @empty
            <div class="fempty">Belum ada FAQ di database.</div>
        @endforelse
    </main>
</div>

</div>

<script>
function toggleFaq(id) {
    const el = document.getElementById(id);
    if (!el) return;

    const isOpen = el.classList.contains('open');
    document.querySelectorAll('.facc.open').forEach(e => e.classList.remove('open'));
    if (!isOpen) el.classList.add('open');
}

const links = document.querySelectorAll('.fside-link[data-cat]');
const cats  = document.querySelectorAll('.fcat');

if (links.length && cats.length) {
    const obs = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                const id = e.target.id.replace('cat-', '');
                links.forEach(l => l.classList.toggle('active', l.dataset.cat === id));
            }
        });
    }, { rootMargin: '-15% 0px -70% 0px' });

    cats.forEach(c => obs.observe(c));
}
</script>

@endsection