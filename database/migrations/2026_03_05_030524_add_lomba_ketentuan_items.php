public function up(): void
{
    Schema::table('lomba_ketentuan_items', function (Blueprint $table) {
        $table->string('image_path')->nullable()->after('content');
    });
}

public function down(): void
{
    Schema::table('lomba_ketentuan_items', function (Blueprint $table) {
        $table->dropColumn('image_path');
    });
}