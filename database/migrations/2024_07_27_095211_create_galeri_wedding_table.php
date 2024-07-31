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
        Schema::create('galeri_wedding', function (Blueprint $table) {
            $table->id();
            $table->string('image_path');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('undangan_id')->constrained('buat_undangan')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeri_wedding');
    }
};
