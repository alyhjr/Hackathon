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
        Schema::table('peserta_submissions', function (Blueprint $table) {
             $table->string('kategori')->nullable()->after('nama_tim');

            $table->string('asal_sekolah')->nullable()->after('kategori');

            $table->string('kota_kabupaten')->nullable()->after('asal_sekolah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peserta_submissions', function (Blueprint $table) {
              $table->dropColumn([
                'kategori',
                'asal_sekolah',
                'kota_kabupaten'
            ]);
        });
    }
};
