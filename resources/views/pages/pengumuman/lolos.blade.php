@extends('layouts.app')

@section('content')

<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap">

<style>
    :root {
        --color-bg-card:       #dce8f0;
        --color-border-card:   #b8d4e0;
        --color-border-header: #1e293b;
        --color-text-dark:     #1e293b;
        --color-text-title:    #0f172a;
        --color-btn-bg:        #FFF9BF;
        --color-btn-hover:     #f5c800;
        --color-btn-text:      #1e293b;

        --font-primary: 'Plus Jakarta Sans', sans-serif;
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
</style>

<div class="min-h-screen w-full bg-white py-20 px-12" style="font-family: var(--font-primary);">

    {{-- ==========================================================
         HALAMAN UTAMA
         ========================================================== --}}
    <div id="page-main">

        <div style="text-align:center;margin-bottom:48px;">
            <h1 style="font-family:var(--font-heading);font-size:var(--fs-page-title);font-weight:900;color:var(--color-text-title);line-height:1.2;">
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

                <div style="background:var(--color-bg-card);border-radius:12px;border:1.5px solid var(--color-border-card);display:flex;flex-direction:column;overflow:hidden;">

                    <div style="padding:14px 16px;border-bottom:1.5px solid var(--color-border-header);text-align:center;">
                        <p style="font-family:var(--font-heading);font-size:var(--fs-card-header);font-weight:900;color:var(--color-text-dark);line-height:1.4;">
                            {{ $group->title }}
                        </p>
                        <p style="font-family:var(--font-heading);font-size:var(--fs-card-header);font-weight:900;color:var(--color-text-dark);line-height:1.4;">
                            {{ $group->subtitle }}
                        </p>
                    </div>

                    <div style="padding:16px;flex:1;">
                        @forelse($preview as $entry)
                            <div style="display:flex;gap:8px;margin-bottom:{{ $loop->last ? '0' : '14px' }};">
                                <span style="font-size:var(--fs-team-name);font-weight:700;color:var(--color-text-dark);flex-shrink:0;">
                                    {{ $entry->rank_order }}.
                                </span>
                                <div>
                                    <p style="font-family:var(--font-heading);font-size:var(--fs-team-name);font-weight:900;color:var(--color-text-dark);line-height:1.4;text-transform:uppercase;">
                                        {{ $entry->team_name }}
                                    </p>
                                    <p style="font-size:var(--fs-team-school);font-weight:700;color:var(--color-text-dark);margin-top:2px;line-height:1.4;">
                                        {{ $entry->school_name }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <div style="color:#475569;font-size:13px;">
                                Belum ada preview tim.
                            </div>
                        @endforelse
                    </div>

                    <div style="padding:0 16px 20px;text-align:center;">
                        <button
                            onclick="showDetail('{{ $group->slug }}')"
                            style="padding:7px 22px;background:var(--color-btn-bg);color:var(--color-btn-text);border:none;border-radius:9999px;font-family:var(--font-primary);font-size:var(--fs-btn);font-weight:800;letter-spacing:0.02em;cursor:pointer;"
                        >
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


    {{-- ==========================================================
         HALAMAN DETAIL
         ========================================================== --}}
    @foreach($groups as $group)
    <div id="detail-{{ $group->slug }}" style="display:none;">

        <div style="text-align:center;margin-bottom:48px;">
            <h1 style="font-family:var(--font-heading);font-size:var(--fs-page-title);font-weight:900;color:var(--color-text-title);line-height:1.2;">
                {{ $group->title }} {{ $group->subtitle }}
            </h1>
        </div>

        <div style="max-width:900px;margin:0 auto;background:var(--color-bg-card);border-radius:20px;border:1.5px solid var(--color-border-card);padding:40px 48px;">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:28px 56px;align-items:start;">

                <div style="display:flex;flex-direction:column;gap:22px;">
                    @foreach($group->entries->take(5) as $entry)
                        <div style="display:flex;gap:12px;align-items:flex-start;">
                            <span style="font-size:var(--fs-detail-num);font-weight:800;color:var(--color-text-dark);flex-shrink:0;min-width:24px;">
                                {{ $entry->rank_order }}.
                            </span>
                            <div>
                                <p style="font-family:var(--font-heading);font-size:var(--fs-detail-name);font-weight:900;color:var(--color-text-dark);line-height:1.4;text-transform:uppercase;">
                                    {{ $entry->team_name }}
                                </p>
                                <p style="font-size:var(--fs-detail-school);font-weight:700;color:var(--color-text-dark);margin-top:3px;line-height:1.4;">
                                    {{ $entry->school_name }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div style="display:flex;flex-direction:column;gap:22px;">
                    @foreach($group->entries->slice(5, 5) as $entry)
                        <div style="display:flex;gap:12px;align-items:flex-start;">
                            <span style="font-size:var(--fs-detail-num);font-weight:800;color:var(--color-text-dark);flex-shrink:0;min-width:24px;">
                                {{ $entry->rank_order }}.
                            </span>
                            <div>
                                <p style="font-family:var(--font-heading);font-size:var(--fs-detail-name);font-weight:900;color:var(--color-text-dark);line-height:1.4;text-transform:uppercase;">
                                    {{ $entry->team_name }}
                                </p>
                                <p style="font-size:var(--fs-detail-school);font-weight:700;color:var(--color-text-dark);margin-top:3px;line-height:1.4;">
                                    {{ $entry->school_name }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

        <div style="text-align:center;margin-top:40px;">
            <button
                onclick="showMain()"
                style="padding:10px 40px;background:var(--color-btn-bg);color:var(--color-btn-text);border:none;border-radius:9999px;font-family:var(--font-primary);font-size:var(--fs-btn-back);font-weight:800;cursor:pointer;"
            >
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
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function showMain() {
        document.querySelectorAll('[id^="detail-"]').forEach(el => el.style.display = 'none');
        document.getElementById('page-main').style.display = 'block';
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
</script>

@endsection