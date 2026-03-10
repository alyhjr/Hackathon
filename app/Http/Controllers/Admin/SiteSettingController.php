<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Models\Faq;
use App\Models\LombaKetentuanItem;
use App\Models\LombaTahapanStep;
use App\Models\Pengumuman;
use App\Models\PengumumanGroup;
use App\Models\PengumumanEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Timeline;
use App\Models\InformasiPenting;


class SiteSettingController extends Controller
{
    // =========================================
    // CMS MAIN PAGE
    // =========================================
    public function edit(Request $request)
    {
        $setting = SiteSetting::firstOrCreate(['id' => 1]);

        // FAQ list
        $faqs = Faq::orderBy('category')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        // list kategori FAQ untuk dropdown
        $faqCategories = Faq::query()
            ->select('category')
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->distinct()
            ->orderBy('category')
            ->pluck('category')
            ->toArray();

        // LOMBA - ketentuan grouped per tab
        $lombaKetentuan = LombaKetentuanItem::query()
            ->orderBy('tab')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->groupBy('tab');

        // LOMBA - tahapan list
        $lombaTahapan = LombaTahapanStep::query()
            ->orderBy('step_number')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        // PENGUMUMAN
        $pengumuman = Pengumuman::query()
            ->orderBy('type')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $pengumumanGroups = PengumumanGroup::query()
            ->with('pengumuman')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $pengumumanEntries = PengumumanEntry::query()
            ->with('group')
            ->orderBy('rank_order')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();


        // Timeline
        $timelineItems = Timeline::query()
    ->orderBy('sort_order')
    ->orderBy('id')
    ->get();


        //Informasi Penting
        $informasiPentingItems =
        InformasiPenting::query()
         ->orderBy('sort_order')
         ->orderBy('id')
         ->get();

        // tab agar tetap kebuka
        $tab = $request->query('tab', 'hero');

        return view('admin.site-settings', compact(
            'setting',
            'faqs',
            'faqCategories',
            'tab',
            'lombaKetentuan',
            'lombaTahapan',
            'pengumuman',
            'pengumumanGroups',
            'pengumumanEntries',
            'timelineItems',
            'informasiPentingItems',
        ));
    }

    // =========================================
    // SITE SETTINGS UPDATE (Hero/Home)
    // =========================================
    public function update(Request $request)
    {
        $setting = SiteSetting::firstOrCreate(['id' => 1]);

        $validated = $request->validate([
            'hero_title' => 'nullable|string',
            'hero_subtitle' => 'nullable|string',
            'hero_tagline' => 'nullable|string',
            'primary_button_text' => 'nullable|string',
            'primary_button_url' => 'nullable|string',
            'secondary_button_text' => 'nullable|string',
            'secondary_button_url' => 'nullable|string',
            'youtube_url' => 'nullable|string',
            'youtube_url_1' => 'nullable|string',
            'youtube_url_2' => 'nullable|string',
            'home_description' => 'nullable|string',

            'hero_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'home_image_1' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'home_image_2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'home_image_3' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $setting->fill($validated);

        $upload = function ($field, $folder) use ($request, $setting) {
            if (!$request->hasFile($field)) {
                return;
            }

            if (!empty($setting->$field) && Storage::disk('public')->exists($setting->$field)) {
                Storage::disk('public')->delete($setting->$field);
            }

            $path = $request->file($field)->store($folder, 'public');
            $setting->$field = $path;
        };

        $upload('hero_image', 'hero');
        $upload('home_image_1', 'home');
        $upload('home_image_2', 'home');
        $upload('home_image_3', 'home');

        $setting->save();

        return redirect()->route('admin.site-settings.edit', ['tab' => 'hero'])
            ->with('success', 'Berhasil update Site Settings!');
    }

    // =========================================
    // FAQ CRUD
    // =========================================
    public function faqStore(Request $request)
    {
        $data = $request->validate([
            'category' => 'required|string|max:100',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        Faq::create($data);

        return redirect()->route('admin.site-settings.edit', ['tab' => 'faq'])
            ->with('success', 'FAQ berhasil ditambahkan!');
    }

    public function faqUpdate(Request $request, Faq $faq)
    {
        $data = $request->validate([
            'category' => 'required|string|max:100',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        $faq->update($data);

        return redirect()->route('admin.site-settings.edit', ['tab' => 'faq'])
            ->with('success', 'FAQ berhasil diupdate!');
    }

    public function faqDestroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('admin.site-settings.edit', ['tab' => 'faq'])
            ->with('success', 'FAQ berhasil dihapus!');
    }

    // =========================================
    // LOMBA - KETENTUAN CRUD
    // =========================================
    public function lombaKetentuanStore(Request $request)
    {
        $data = $request->validate([
            'tab' => 'required|in:kategori,persyaratan,pendaftaran',
            'title' => 'nullable|string|max:120',
            'content' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $item = new LombaKetentuanItem();
        $item->tab = $data['tab'];
        $item->title = $data['title'] ?? null;
        $item->content = $data['content'] ?? null;
        $item->sort_order = $data['sort_order'] ?? 0;
        $item->is_active = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('image')) {
            $item->image = $request->file('image')->store('lomba/kategori', 'public');
        }

        $item->save();

        return redirect()->route('admin.site-settings.edit', ['tab' => 'lomba'])
            ->with('success', 'Ketentuan lomba berhasil ditambahkan!');
    }

    public function lombaKetentuanUpdate(Request $request, LombaKetentuanItem $item)
    {
        $data = $request->validate([
            'tab' => 'required|in:kategori,persyaratan,pendaftaran',
            'title' => 'nullable|string|max:120',
            'content' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $item->tab = $data['tab'];
        $item->title = $data['title'] ?? null;
        $item->content = $data['content'] ?? null;
        $item->sort_order = $data['sort_order'] ?? 0;
        $item->is_active = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('image')) {
            if (!empty($item->image) && Storage::disk('public')->exists($item->image)) {
                Storage::disk('public')->delete($item->image);
            }

            $item->image = $request->file('image')->store('lomba/kategori', 'public');
        }

        $item->save();

        return redirect()->route('admin.site-settings.edit', ['tab' => 'lomba'])
            ->with('success', 'Ketentuan lomba berhasil diupdate!');
    }

    public function lombaKetentuanDestroy(LombaKetentuanItem $item)
    {
        if (!empty($item->image) && Storage::disk('public')->exists($item->image)) {
            Storage::disk('public')->delete($item->image);
        }

        $item->delete();

        return redirect()->route('admin.site-settings.edit', ['tab' => 'lomba'])
            ->with('success', 'Ketentuan lomba berhasil dihapus!');
    }

    // =========================================
    // LOMBA - TAHAPAN CRUD
    // =========================================
    public function lombaTahapanStore(Request $request)
    {
        $data = $request->validate([
            'step_number' => 'required|integer|min:1|max:99',
            'title' => 'required|string|max:120',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $step = new LombaTahapanStep();
        $step->step_number = (int) $data['step_number'];
        $step->title = $data['title'];
        $step->bullets = $this->parseBullets($data['description'] ?? null);
        $step->sort_order = $data['sort_order'] ?? 0;
        $step->is_active = $request->has('is_active') ? 1 : 0;

        $step->save();

        return redirect()->route('admin.site-settings.edit', ['tab' => 'lomba'])
            ->with('success', 'Tahapan berhasil ditambahkan!');
    }

    public function lombaTahapanUpdate(Request $request, LombaTahapanStep $step)
    {
        $data = $request->validate([
            'step_number' => 'required|integer|min:1|max:99',
            'title' => 'required|string|max:120',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $step->step_number = (int) $data['step_number'];
        $step->title = $data['title'];
        $step->bullets = $this->parseBullets($data['description'] ?? null);
        $step->sort_order = $data['sort_order'] ?? 0;
        $step->is_active = $request->has('is_active') ? 1 : 0;

        $step->save();

        return redirect()->route('admin.site-settings.edit', ['tab' => 'lomba'])
            ->with('success', 'Tahapan berhasil diupdate!');
    }

    public function lombaTahapanDestroy(LombaTahapanStep $step)
    {
        $step->delete();

        return redirect()->route('admin.site-settings.edit', ['tab' => 'lomba'])
            ->with('success', 'Tahapan berhasil dihapus!');
    }



    // =========================
    // INFORMASI PENTING CRUD
    // =========================
    public function informasiPentingStore(Request $request)
    {
        $data = $request->validate([
            'content' => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        InformasiPenting::create([
            'content' => $data['content'],
            'sort_order' => $data['sort_order'] ?? 0,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('admin.site-settings.edit', ['tab' => 'informasi-penting'])
            ->with('success', 'Informasi penting berhasil ditambahkan.');
    }

    public function informasiPentingUpdate(Request $request, InformasiPenting $informasiPenting)
    {
        $data = $request->validate([
            'content' => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $informasiPenting->update([
            'content' => $data['content'],
            'sort_order' => $data['sort_order'] ?? 0,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('admin.site-settings.edit', ['tab' => 'informasi-penting'])
            ->with('success', 'Informasi penting berhasil diupdate.');
    }

    public function informasiPentingDestroy(InformasiPenting $informasiPenting)
    {
        $informasiPenting->delete();

        return redirect()->route('admin.site-settings.edit', ['tab' => 'informasi-penting'])
            ->with('success', 'Informasi penting berhasil dihapus.');
    }



    // =========================
    // PENGUMUMAN UTAMA CRUD
    // =========================
    public function storePengumuman(Request $request)
    {
        $request->validate([
            'type' => 'required|in:umum,lolos,tiga_besar',
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        Pengumuman::create([
            'type' => $request->type,
            'title' => $request->title,
            'content' => $request->content,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('admin.site-settings.edit', ['tab' => 'pengumuman'])
            ->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function updatePengumuman(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'type' => 'required|in:umum,lolos,tiga_besar',
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $pengumuman->update([
            'type' => $request->type,
            'title' => $request->title,
            'content' => $request->content,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('admin.site-settings.edit', ['tab' => 'pengumuman'])
            ->with('success', 'Pengumuman berhasil diupdate.');
    }

    public function destroyPengumuman(Pengumuman $pengumuman)
    {
        $pengumuman->delete();

        return redirect()->route('admin.site-settings.edit', ['tab' => 'pengumuman'])
            ->with('success', 'Pengumuman berhasil dihapus.');
    }

    // =========================
    // PENGUMUMAN GROUP CRUD
    // =========================
    public function storePengumumanGroup(Request $request)
    {
        $request->validate([
            'pengumuman_id' => 'required|exists:pengumumen,id',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'slug' => 'required|string|max:100',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        PengumumanGroup::create([
            'pengumuman_id' => $request->pengumuman_id,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'slug' => $request->slug,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('admin.site-settings.edit', ['tab' => 'pengumuman'])
            ->with('success', 'Group pengumuman berhasil ditambahkan.');
    }

    public function updatePengumumanGroup(Request $request, PengumumanGroup $group)
    {
        $request->validate([
            'pengumuman_id' => 'required|exists:pengumumen,id',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'slug' => 'required|string|max:100',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $group->update([
            'pengumuman_id' => $request->pengumuman_id,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'slug' => $request->slug,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('admin.site-settings.edit', ['tab' => 'pengumuman'])
            ->with('success', 'Group pengumuman berhasil diupdate.');
    }

    public function destroyPengumumanGroup(PengumumanGroup $group)
    {
        $group->delete();

        return redirect()->route('admin.site-settings.edit', ['tab' => 'pengumuman'])
            ->with('success', 'Group pengumuman berhasil dihapus.');
    }

    // =========================
    // PENGUMUMAN ENTRY CRUD
    // =========================
    public function storePengumumanEntry(Request $request)
    {
        $request->validate([
            'pengumuman_group_id' => 'required|exists:pengumuman_groups,id',
            'team_name' => 'required|string|max:255',
            'school_name' => 'required|string|max:255',
            'rank_order' => 'nullable|integer|min:0',
            'sort_order' => 'nullable|integer|min:0',
            'is_preview' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        PengumumanEntry::create([
            'pengumuman_group_id' => $request->pengumuman_group_id,
            'team_name' => $request->team_name,
            'school_name' => $request->school_name,
            'rank_order' => $request->rank_order ?? 0,
            'sort_order' => $request->sort_order ?? 0,
            'is_preview' => $request->has('is_preview') ? 1 : 0,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('admin.site-settings.edit', ['tab' => 'pengumuman'])
            ->with('success', 'Entry pengumuman berhasil ditambahkan.');
    }

    public function updatePengumumanEntry(Request $request, PengumumanEntry $entry)
    {
        $request->validate([
            'pengumuman_group_id' => 'required|exists:pengumuman_groups,id',
            'team_name' => 'required|string|max:255',
            'school_name' => 'required|string|max:255',
            'rank_order' => 'nullable|integer|min:0',
            'sort_order' => 'nullable|integer|min:0',
            'is_preview' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        $entry->update([
            'pengumuman_group_id' => $request->pengumuman_group_id,
            'team_name' => $request->team_name,
            'school_name' => $request->school_name,
            'rank_order' => $request->rank_order ?? 0,
            'sort_order' => $request->sort_order ?? 0,
            'is_preview' => $request->has('is_preview') ? 1 : 0,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('admin.site-settings.edit', ['tab' => 'pengumuman'])
            ->with('success', 'Entry pengumuman berhasil diupdate.');
    }

    public function destroyPengumumanEntry(PengumumanEntry $entry)
    {
        $entry->delete();

        return redirect()->route('admin.site-settings.edit', ['tab' => 'pengumuman'])
            ->with('success', 'Entry pengumuman berhasil dihapus.');
    }

    // =========================
    // TIMELINE CRUD
    // =========================
    public function timelineStore(Request $request)
    {
        $data = $request->validate([
            'date_label' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        Timeline::create([
            'date_label' => $data['date_label'],
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'sort_order' => $data['sort_order'] ?? 0,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('admin.site-settings.edit', ['tab' => 'timeline'])
            ->with('success', 'Timeline berhasil ditambahkan.');
    }

    public function timelineUpdate(Request $request, Timeline $timeline)
    {
        $data = $request->validate([
            'date_label' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $timeline->update([
            'date_label' => $data['date_label'],
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'sort_order' => $data['sort_order'] ?? 0,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('admin.site-settings.edit', ['tab' => 'timeline'])
            ->with('success', 'Timeline berhasil diupdate.');
    }

    public function timelineDestroy(Timeline $timeline)
    {
        $timeline->delete();

        return redirect()->route('admin.site-settings.edit', ['tab' => 'timeline'])
            ->with('success', 'Timeline berhasil dihapus.');
    }


    // =========================================
    // HELPER: Parse textarea -> bullets array
    // "1 baris = 1 bullet"
    // =========================================
    private function parseBullets(?string $text): ?array
    {
        $text = $text ?? '';
        $text = str_replace(["\r\n", "\r"], "\n", $text);
        $lines = array_map('trim', explode("\n", $text));
        $lines = array_values(array_filter($lines, fn ($v) => $v !== ''));

        return count($lines) ? $lines : null;
    }
}