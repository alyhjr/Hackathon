<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('youtube_url_1')->nullable()->after('youtube_url');
            $table->string('youtube_url_2')->nullable()->after('youtube_url_1');
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn(['youtube_url_1', 'youtube_url_2']);
        });
    }
};