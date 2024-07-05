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
        Schema::create('buat_undangan', function (Blueprint $table) {
            $table->id();
            $table->string('kategori_undangan');
            $table->string('link_undangan');
            $table->string('cover1')->nullable();
            $table->string('cover2')->nullable();
            $table->string('cover3')->nullable();
            $table->string('cover4')->nullable();
            $table->string('cover5')->nullable();
            $table->string('audio_undangan')->nullable();
            $table->unsignedBigInteger('id_user');
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buat_undangan');
    }
};
