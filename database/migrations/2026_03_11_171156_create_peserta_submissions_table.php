<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peserta_submissions', function (Blueprint $table) {
            $table->id();

            $table->string('nama_tim');
            $table->string('anggota_1');
            $table->string('anggota_2')->nullable();
            $table->string('anggota_3')->nullable();

            $table->string('proposal_file')->nullable();
            $table->string('karya_file')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peserta_submissions');
         $table->dropForeignIdFor(\App\Models\Peserta::class);
            $table->dropColumn('peserta_id');
    }
};