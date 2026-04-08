<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Simpan berita baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'excerpt'      => 'required|string',
            'category'     => 'nullable|string|max:50',
            'badge_label'  => 'nullable|string|max:10',
            'source_url'   => 'nullable|url|max:500',
            'published_at' => 'nullable|date',
            'sort_order'   => 'nullable|integer|min:0|max:999',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'is_featured'  => 'nullable',
            'is_active'    => 'nullable',
        ]);

        $data = [
            'title'        => $validated['title'],
            'excerpt'      => $validated['excerpt'],
            'category'     => $validated['category'] ?? null,
            'badge_label'  => $validated['badge_label'] ?? null,
            'source_url'   => $validated['source_url'] ?? null,
            'published_at' => $validated['published_at'] ?? now()->toDateString(),
            'sort_order'   => $validated['sort_order'] ?? 0,
            'is_featured'  => $request->boolean('is_featured'),
            'is_active'    => $request->boolean('is_active'),
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        News::create($data);

        return redirect()->back()
            ->with('success', 'Berita berhasil ditambahkan.')
            ->withFragment('news');
    }

    /**
     * Update berita
     */
    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'excerpt'      => 'required|string',
            'category'     => 'nullable|string|max:50',
            'badge_label'  => 'nullable|string|max:10',
            'source_url'   => 'nullable|url|max:500',
            'published_at' => 'nullable|date',
            'sort_order'   => 'nullable|integer|min:0|max:999',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'is_featured'  => 'nullable',
            'is_active'    => 'nullable',
            'remove_image' => 'nullable',
        ]);

        $data = [
            'title'        => $validated['title'],
            'excerpt'      => $validated['excerpt'],
            'category'     => $validated['category'] ?? null,
            'badge_label'  => $validated['badge_label'] ?? null,
            'source_url'   => $validated['source_url'] ?? null,
            'published_at' => $validated['published_at'] ?? $news->published_at,
            'sort_order'   => $validated['sort_order'] ?? 0,
            'is_featured'  => $request->boolean('is_featured'),
            'is_active'    => $request->boolean('is_active'),
        ];

        // Hapus gambar lama jika diminta
        if ($request->boolean('remove_image') && $news->image) {
            Storage::disk('public')->delete($news->image);
            $data['image'] = null;
        }

        // Upload gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $news->update($data);

        return redirect()->back()
            ->with('success', 'Berita berhasil diperbarui.')
            ->withFragment('news');
    }

    /**
     * Hapus berita
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);

        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->back()
            ->with('success', 'Berita berhasil dihapus.')
            ->withFragment('news');
    }
}