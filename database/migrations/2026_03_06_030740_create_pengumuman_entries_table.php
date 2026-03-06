<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengumuman_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengumuman_group_id')->constrained('pengumuman_groups')->cascadeOnDelete();
            $table->string('team_name');
            $table->string('school_name');
            $table->integer('rank_order')->default(0);
            $table->boolean('is_preview')->default(false);
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengumuman_entries');
    }
};