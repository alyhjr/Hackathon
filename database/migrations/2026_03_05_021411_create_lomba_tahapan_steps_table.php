<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void
  {
    Schema::create('lomba_tahapan_steps', function (Blueprint $table) {
      $table->id();
      $table->unsignedTinyInteger('step_number'); // 1..6
      $table->string('title');                   // Pendaftaran, Pelatihan, dst
      $table->json('bullets')->nullable();        // list poin deskripsi
      $table->integer('sort_order')->default(0);
      $table->boolean('is_active')->default(true);
      $table->timestamps();

      $table->index(['step_number', 'sort_order']);
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('lomba_tahapan_steps');
  }
};