<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void
  {
    Schema::table('faqs', function (Blueprint $table) {
      if (!Schema::hasColumn('faqs', 'category')) {
        $table->string('category')->after('id');
      }
      if (!Schema::hasColumn('faqs', 'sort_order')) {
        $table->integer('sort_order')->default(0);
      }
      if (!Schema::hasColumn('faqs', 'is_active')) {
        $table->boolean('is_active')->default(true);
      }
    });
  }

  public function down(): void
  {
    Schema::table('faqs', function (Blueprint $table) {
      if (Schema::hasColumn('faqs', 'category')) $table->dropColumn('category');
      if (Schema::hasColumn('faqs', 'sort_order')) $table->dropColumn('sort_order');
      if (Schema::hasColumn('faqs', 'is_active')) $table->dropColumn('is_active');
    });
  }
};