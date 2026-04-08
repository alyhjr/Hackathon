<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category')->nullable();     // e.g. "Pengumuman", "Kegiatan", "Update"
            $table->string('badge_label')->nullable();  // e.g. "NEW", "HOT"
            $table->text('excerpt');                    // ringkasan singkat
            $table->text('content')->nullable();        // isi lengkap (opsional)
            $table->string('image')->nullable();        // path gambar (storage)
            $table->string('source_url')->nullable();   // link baca selengkapnya
            $table->date('published_at')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false); // tampil di highlight
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};