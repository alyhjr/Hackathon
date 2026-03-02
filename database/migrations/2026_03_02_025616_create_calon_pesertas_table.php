<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('calon_pesertas', function (Blueprint $table) {
            $table->id();

            // input dari peserta
            $table->string('nuptk', 32);
            $table->date('tanggal_lahir');

            // data dari API dapodik (akan diisi sistem)
            $table->string('nama')->nullable();
            $table->string('npsn')->nullable();

            // data yang boleh diedit peserta
            $table->string('no_telp')->nullable();
            $table->string('email')->nullable();

            // status proses pendaftaran
            // draft | submitted | verified | rejected
            $table->string('status')->default('draft');

            $table->timestamps();

            // supaya tidak bisa daftar 2x dengan data sama
            $table->unique(['nuptk', 'tanggal_lahir']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calon_pesertas');
    }
};