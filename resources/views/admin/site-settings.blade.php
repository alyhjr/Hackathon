@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto mt-10">

    <h1 class="text-2xl font-bold mb-6">
        CMS Informasi Awal Website
    </h1>

    @if(session('success'))
        <div class="bg-green-100 p-3 mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- IMPORTANT: enctype wajib untuk upload file --}}
    <form action="/admin/site-settings" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label>Hero Title</label>
            <input type="text" name="hero_title"
                value="{{ $setting->hero_title }}"
                class="border w-full p-2">
        </div>

        <div class="mb-4">
            <label>Hero Subtitle</label>
            <input type="text" name="hero_subtitle"
                value="{{ $setting->hero_subtitle }}"
                class="border w-full p-2">
        </div>

        <div class="mb-4">
            <label>Hero Tagline</label>
            <input type="text" name="hero_tagline"
                value="{{ $setting->hero_tagline }}"
                class="border w-full p-2">
        </div>

        <div class="mb-4">
            <label>Primary Button Text</label>
            <input type="text" name="primary_button_text"
                value="{{ $setting->primary_button_text }}"
                class="border w-full p-2">
        </div>

        <div class="mb-4">
            <label>Primary Button URL</label>
            <input type="text" name="primary_button_url"
                value="{{ $setting->primary_button_url }}"
                class="border w-full p-2">
        </div>

        <div class="mb-4">
            <label>YouTube URL</label>
            <input type="text" name="youtube_url"
                value="{{ $setting->youtube_url }}"
                class="border w-full p-2">
        </div>

        <div class="mb-4">
            <label>Home Description</label>
            <textarea name="home_description"
                class="border w-full p-2">{{ $setting->home_description }}</textarea>
        </div>

        {{-- Upload Hero Image --}}
        <div class="mb-4">
            <label>Hero Image (Upload)</label>

            <input type="file"
                   name="hero_image"
                   accept="image/*"
                   class="border w-full p-2">

            {{-- Preview gambar yang sekarang (kalau ada) --}}
            @if(!empty($setting->hero_image))
                <div class="mt-3">
                    <p class="text-sm text-gray-600 mb-2">Preview Hero Image saat ini:</p>
                    <img src="{{ asset('storage/'.$setting->hero_image) }}"
                         alt="Hero Image"
                         class="w-full max-w-md rounded border">
                </div>
                <p class="text-xs text-gray-500 mt-2">
                    (Kalau tidak upload gambar baru, gambar lama tetap dipakai)
                </p>
            @endif
        </div>

        {{-- HOME IMAGES (3 gambar kanan) --}}
<div>
    <label class="block text-sm font-medium mb-2">Home Images (3 gambar kanan)</label>

    @php
        $img1 = $setting->home_image_1 ? asset('storage/' . $setting->home_image_1) : null;
        $img2 = $setting->home_image_2 ? asset('storage/' . $setting->home_image_2) : null;
        $img3 = $setting->home_image_3 ? asset('storage/' . $setting->home_image_3) : null;
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        {{-- image 1 --}}
        <div class="space-y-2">
            <div class="text-xs text-gray-600">Gambar 1</div>
            <input type="file" name="home_image_1" id="home_image_1"
                   class="w-full border rounded-md px-3 py-2" accept="image/*">
            <img id="preview_home_1"
                 src="{{ $img1 ?? '' }}"
                 class="w-full rounded-lg border object-cover h-[160px] {{ $img1 ? '' : 'hidden' }}"
                 alt="Preview Home 1">
        </div>

        {{-- image 2 --}}
        <div class="space-y-2">
            <div class="text-xs text-gray-600">Gambar 2</div>
            <input type="file" name="home_image_2" id="home_image_2"
                   class="w-full border rounded-md px-3 py-2" accept="image/*">
            <img id="preview_home_2"
                 src="{{ $img2 ?? '' }}"
                 class="w-full rounded-lg border object-cover h-[160px] {{ $img2 ? '' : 'hidden' }}"
                 alt="Preview Home 2">
        </div>

        {{-- image 3 --}}
        <div class="space-y-2">
            <div class="text-xs text-gray-600">Gambar 3</div>
            <input type="file" name="home_image_3" id="home_image_3"
                   class="w-full border rounded-md px-3 py-2" accept="image/*">
            <img id="preview_home_3"
                 src="{{ $img3 ?? '' }}"
                 class="w-full rounded-lg border object-cover h-[160px] {{ $img3 ? '' : 'hidden' }}"
                 alt="Preview Home 3">
        </div>
    </div>
</div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Simpan Perubahan
        </button>

    </form>

</div>

@endsection

<script>
document.addEventListener('DOMContentLoaded', function () {
  function bindPreview(inputId, imgId) {
    const input = document.getElementById(inputId);
    const img = document.getElementById(imgId);
    if (!input || !img) return;

    input.addEventListener('change', function (e) {
      const file = e.target.files && e.target.files[0];
      if (!file) return;

      img.src = URL.createObjectURL(file);
      img.classList.remove('hidden');
    });
  }

  bindPreview('home_image_1', 'preview_home_1');
  bindPreview('home_image_2', 'preview_home_2');
  bindPreview('home_image_3', 'preview_home_3');
});
</script>