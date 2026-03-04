<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();

            // CMS: Info awal website (Hero/Home)
            $table->string('hero_title')->nullable();
            $table->string('hero_subtitle')->nullable();
            $table->string('hero_tagline')->nullable();

            $table->string('primary_button_text')->nullable();
            $table->string('primary_button_url')->nullable();

            $table->string('secondary_button_text')->nullable();
            $table->string('secondary_button_url')->nullable();

            // Media / link penting
            $table->string('youtube_url')->nullable();

            // Konten tambahan (kalau butuh deskripsi panjang)
            $table->text('home_description')->nullable();

            // gambar (kalau nanti mau bisa ganti lewat CMS)
            $table->string('hero_image')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};