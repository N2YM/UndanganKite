<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Reverse the migrations.
     */
    public function up(): void
    {
        Schema::table('kategori_template', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Hapus foreign key constraint
            $table->dropColumn('user_id');    // Hapus kolom user_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kategori_template', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Tambahkan kembali kolom dan constraint
        });
    }
};
