<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registrasi', function (Blueprint $table) {
            $table->id();
            $table->string('nuptk', 16)->unique();
            $table->date('tgl_lahir');
            $table->string('nama');
            $table->string('sekolah');
            $table->string('provinsi', 100);
            $table->string('no_tlp', 20);
            $table->string('email');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrasi');
    }
};