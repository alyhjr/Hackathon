@extends('layouts.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;600;700;800;900&display=swap" rel="stylesheet">

<style>
    :root {
        --color-text-title:    #0f172a;
        --color-btn-bg:        #FFF9BF;
        --color-btn-hover:     #f5c800;
        --color-btn-text:      #1e293b;
        --font-primary: 'Inter', sans-serif;
        --font-heading:  'Poppins', sans-serif;
        --fs-page-title:    37px;
        --fs-card-header:   13px;
        --fs-team-name:     13px;
        --fs-team-school:   0.66rem;
        --fs-detail-num:    0.82rem;
        --fs-detail-name:   13px;
        --fs-detail-school: 0.72rem;
        --fs-btn:           0.72rem;
        --fs-btn-back:      0.85rem;
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(10px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* ── Card ── */
    .lolos-card {
        border-radius: 12px;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        opacity: 0;
        animation: fadeUp 1.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.6s ease;
        background: #111827;
        position: relative;
    }
    /* Accent line top */
    .lolos-card::after {
        content: '';
        position: absolute;
        top: 0; left: 20%; right: 20%;
        height: 2px;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.15), transparent);
        border-radius: 0 0 4px 4px;
    }
    .lolos-card:nth-child(1) { animation-delay: 0.10s; }
    .lolos-card:nth-child(2) { animation-delay: 0.30s; }
    .lolos-card:nth-child(3) { animation-delay: 0.50s; }
    .lolos-card:nth-child(4) { animation-delay: 0.70s; }
    .lolos-card:nth-child(5) { animation-delay: 0.90s; }

    .lolos-card:hover {
        transform: translateY(-5px);
        box-shadow:
            0 0 0 1px rgba(255,255,255,0.12),
            0 12px 40px rgba(0,0,0,0.35);
    }

    /* ── Card header ── */
    .lolos-card-header {
        padding: 20px 18px 16px;
        text-align: center;
        border-bottom: 1px solid rgba(255,255,255,0.06);
    }
    .lolos-card-header p:first-child {
        font-family: 'Poppins', sans-serif;
        font-size: 12.5px;
        font-weight: 700;
        color: #f1f5f9;
        line-height: 1.5;
        letter-spacing: 0.02em;
    }
    .lolos-card-header p:last-child {
        font-family: 'Inter', sans-serif;
        font-size: 9.5px;
        font-weight: 400;
        color: rgba(255,255,255,0.75);
        letter-spacing: 0.1em;
        text-transform: uppercase;
        margin-top: 3px;
    }

    /* ── Card body ── */
    .lolos-card-body { padding: 16px 18px 12px; flex: 1; }

    .lolos-team-row {
        display: flex;
        gap: 10px;
        padding: 8px 0;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        transition: padding-left 0.5s cubic-bezier(0.16,1,0.3,1);
    }
    .lolos-team-row:last-child { border-bottom: none; }
    .lolos-team-row:hover { padding-left: 4px; }

    .lolos-rank {
        font-family: 'Inter', sans-serif;
        font-size: 10.5px;
        font-weight: 600;
        color: #ffffff;
    }
    .lolos-team-name {
        font-family: 'Poppins', sans-serif;
        font-size: 11px;
        font-weight: 700;
        color: #ffffff;
        line-height: 1.45;
        text-transform: uppercase;
        letter-spacing: 0.025em;
    }
    .lolos-team-school {
        font-family: 'Inter', sans-serif;
        font-size: 0.62rem;
        font-weight: 400;
        color: rgba(255,255,255,0.85);
        margin-top: 2px;
        line-height: 1.4;
    }

    /* ── Card footer ── */
    .lolos-card-footer {
        padding: 14px 18px 20px;
        text-align: center;
    }
    .lolos-btn {
        padding: 8px 28px;
        background: rgba(255,255,255,0.06);
        color: #ffffff;
        border: 1px solid rgba(255,255,255,0.12);
        border-radius: 8px;
        font-family: var(--font-primary);
        font-size: 10.5px;
        font-weight: 800;
        letter-spacing: 0.1em;
        cursor: pointer;
        transition: background 0.5s ease, border-color 0.5s ease;
    }
    .lolos-btn:hover {
        background: rgba(255,255,255,0.11);
        border-color: rgba(255,255,255,0.25);
    }

    /* ── Detail card ── */
    .lolos-detail-card {
        max-width: 900px;
        margin: 0 auto;
        background: #111827;
        border-radius: 12px;
        border: 1px solid rgba(255,255,255,0.07);
        padding: 44px 52px;
        box-shadow: 0 4px 32px rgba(0,0,0,0.2);
    }
    .lolos-detail-num {
        font-family: 'Inter', sans-serif;
        font-size: 0.8rem;
        font-weight: 600;
        color: #ffffff;
    }
    .lolos-detail-name {
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        font-weight: 700;
        color: #ffffff;
        line-height: 1.45;
        text-transform: uppercase;
        letter-spacing: 0.025em;
    }
    .lolos-detail-school {
        font-family: 'Inter', sans-serif;
        font-size: 0.68rem;
        font-weight: 400;
        color: rgba(255,255,255,0.85);
        margin-top: 3px;
        line-height: 1.4;
    }
    .lolos-btn-back {
        padding: 8px 28px;
        background: rgba(255,255,255,0.06);
        color: #ffffff;
        border: 1px solid rgba(255,255,255,0.12);
        border-radius: 8px;
        font-family: var(--font-primary);
        font-size: 10.5px;
        font-weight: 800;
        letter-spacing: 0.1em;
        cursor: pointer;
        transition: background 0.5s ease, border-color 0.5s ease;
    }
    .lolos-btn-back:hover {
        background: rgba(255,255,255,0.11);
        border-color: rgba(255,255,255,0.25);
    }
</style>

<div class="min-h-screen w-full bg-white pt-4 pb-20 px-12" style="font-family: var(--font-primary);">

    <div id="page-main">
        <div style="text-align:center;margin-bottom:48px;padding-top:0;">
            <h1 style="font-family:'Poppins',sans-serif;font-size:36px;font-weight:900;color:var(--color-text-title);line-height:1.2;font-feature-settings:normal;">
                {{ $pengumuman->title ?? 'Pengumuman Peserta Lolos Seleksi Proposal' }}
            </h1>

            @if(!empty($pengumuman?->content))
                <p style="margin-top:12px;white-space:pre-line;color:#334155;font-weight:600;">
                    {{ $pengumuman->content }}
                </p>
            @endif
        </div>

        <div style="display:grid;grid-template-columns:repeat(5,1fr);gap:16px;max-width:1200px;margin:0 auto;">
            @forelse($groups as $group)
                @php
                    $preview = $group->entries->where('is_preview', true)->take(3);
                    $all = $group->entries;
                @endphp

                <div class="lolos-card">
                    <div class="lolos-card-header">
                        <p>{{ $group->title }}</p>
                        <p>{{ $group->subtitle }}</p>
                    </div>

                    <div class="lolos-card-body">
                        @forelse($preview as $entry)
                            <div class="lolos-team-row" style="{{ $loop->last ? '' : 'margin-bottom:4px;' }}">
                                <span class="lolos-rank">{{ $entry->rank_order }}.</span>
                                <div>
                                    <p class="lolos-team-name">{{ $entry->team_name }}</p>
                                    <p class="lolos-team-school">{{ $entry->school_name }}</p>
                                </div>
                            </div>
                        @empty
                            <div style="color:rgba(255,255,255,0.4);font-size:13px;">
                                Belum ada preview tim.
                            </div>
                        @endforelse
                    </div>

                    <div class="lolos-card-footer">
                        <button class="lolos-btn" onclick="showDetail('{{ $group->slug }}')">
                            TIM LAINNYA
                        </button>
                    </div>
                </div>
            @empty
                <div style="grid-column:1/-1;text-align:center;color:#64748b;font-size:18px;">
                    Belum ada data pengumuman lolos.
                </div>
            @endforelse
        </div>
    </div>

    @foreach($groups as $group)
    <div id="detail-{{ $group->slug }}" style="display:none;">

        <div style="text-align:center;margin-bottom:48px;">
            <h1 style="font-family:var(--font-heading);font-size:var(--fs-page-title);font-weight:900;color:var(--color-text-title);line-height:1.2;">
                {{ $group->title }} {{ $group->subtitle }}
            </h1>
        </div>

        <div class="lolos-detail-card">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:28px 56px;align-items:start;">

                <div style="display:flex;flex-direction:column;gap:22px;">
                    @foreach($group->entries->take(5) as $entry)
                        <div style="display:flex;gap:12px;align-items:flex-start;">
                            <span class="lolos-detail-num">{{ $entry->rank_order }}.</span>
                            <div>
                                <p class="lolos-detail-name">{{ $entry->team_name }}</p>
                                <p class="lolos-detail-school">{{ $entry->school_name }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div style="display:flex;flex-direction:column;gap:22px;">
                    @foreach($group->entries->slice(5, 5) as $entry)
                        <div style="display:flex;gap:12px;align-items:flex-start;">
                            <span class="lolos-detail-num">{{ $entry->rank_order }}.</span>
                            <div>
                                <p class="lolos-detail-name">{{ $entry->team_name }}</p>
                                <p class="lolos-detail-school">{{ $entry->school_name }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

            <div style="text-align:center;margin-top:36px;">
                <button class="lolos-btn-back" onclick="showMain()">
                    KEMBALI
                </button>
            </div>
        </div>

    </div>
    @endforeach

</div>

<script>
    function showDetail(slug) {
        document.getElementById('page-main').style.display = 'none';
        document.querySelectorAll('[id^="detail-"]').forEach(el => el.style.display = 'none');
        document.getElementById('detail-' + slug).style.display = 'block';
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function showMain() {
        document.querySelectorAll('[id^="detail-"]').forEach(el => el.style.display = 'none');
        document.getElementById('page-main').style.display = 'block';
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
</script>

@endsection