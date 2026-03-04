<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    public function edit()
    {
        $setting = SiteSetting::firstOrCreate(['id' => 1]);
        return view('admin.site-settings', compact('setting'));
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

            // ✅ 3 gambar kanan (cms)
            'home_image_1' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'home_image_2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'home_image_3' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // update text dulu
        $setting->fill($validated);

        // helper upload
        $upload = function ($field, $folder) use ($request, $setting) {
            if (!$request->hasFile($field)) return;

            // hapus file lama kalau ada
            if (!empty($setting->$field) && Storage::disk('public')->exists($setting->$field)) {
                Storage::disk('public')->delete($setting->$field);
            }

            $path = $request->file($field)->store($folder, 'public');
            $setting->$field = $path;
        };

        // hero image
        $upload('hero_image', 'hero');

        // 3 gambar kanan
        $upload('home_image_1', 'home');
        $upload('home_image_2', 'home');
        $upload('home_image_3', 'home');

        $setting->save();

        return back()->with('success', 'Berhasil update Site Settings!');
    }
}