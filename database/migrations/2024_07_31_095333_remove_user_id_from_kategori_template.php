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
            // Hapus foreign key constraint jika ada
            $table->dropForeign(['user_id']);
            // Hapus kolom user_id
            $table->dropColumn('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kategori_template', function (Blueprint $table) {
            // Tambahkan kembali kolom user_id dan foreign key constraint
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }
};
