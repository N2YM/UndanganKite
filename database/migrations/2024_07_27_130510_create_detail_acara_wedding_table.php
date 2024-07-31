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
        Schema::create('detail_acara_wedding', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('buat_undangan_id')->constrained('buat_undangan')->onDelete('cascade');
            $table->string('acara1')->nullable();
            $table->time('jam_mulai_acara1')->nullable();
            $table->time('jam_selesai_acara1')->nullable();
            $table->date('hari_tanggal_acara1')->nullable();
            $table->string('alamat_gedung_acara1')->nullable();
            $table->string('link_map_acara1')->nullable();
            $table->string('acara2')->nullable();
            $table->time('jam_mulai_acara2')->nullable();
            $table->time('jam_selesai_acara2')->nullable();
            $table->date('hari_tanggal_acara2')->nullable();
            $table->string('alamat_gedung_acara2')->nullable();
            $table->string('link_map_acara2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_acara_wedding');
    }
};
