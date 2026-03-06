<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
 {
  public function up(): void
  {
    Schema::create('lomba_ketentuan_items', function (Blueprint $table) {
      $table->id();
      $table->string('tab')->index();          // kategori | persyaratan | pendaftaran
      $table->string('title')->nullable();     // untuk kategori: label "PAUD / Sederajat", dll
      $table->string('image')->nullable();     // untuk kategori: path gambar (opsional)
      $table->text('content')->nullable();     // untuk persyaratan/pendaftaran: teks item
      $table->integer('sort_order')->default(0);
      $table->boolean('is_active')->default(true);
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('lomba_ketentuan_items');
  }
};