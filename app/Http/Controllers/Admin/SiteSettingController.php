<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    public function edit(Request $request)
    {
        $setting = SiteSetting::firstOrCreate(['id' => 1]);

        // FAQ list
        $faqs = Faq::orderBy('category')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        // list kategori untuk dropdown
        $faqCategories = Faq::query()
            ->select('category')
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->distinct()
            ->orderBy('category')
            ->pluck('category')
            ->toArray();

        // tab agar tetap kebuka (kalau kamu masih pake query tab)
        $tab = $request->query('tab', 'hero');

        return view('admin.site-settings', compact('setting', 'faqs', 'faqCategories', 'tab'));
    }

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
            'home_description' => 'nullable|string',

            'hero_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'home_image_1' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'home_image_2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'home_image_3' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $setting->fill($validated);

        $upload = function ($field, $folder) use ($request, $setting) {
            if (!$request->hasFile($field)) return;

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

    // =========================
    // FAQ CRUD
    // =========================

    public function storeFaq(Request $request)
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

    public function updateFaq(Request $request, Faq $faq)
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

    public function destroyFaq(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('admin.site-settings.edit', ['tab' => 'faq'])
            ->with('success', 'FAQ berhasil dihapus!');
    }
}