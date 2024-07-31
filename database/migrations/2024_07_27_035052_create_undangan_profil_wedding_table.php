<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUndanganProfilWeddingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('undangan_profil_wedding', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('buat_undangan_id');
            $table->string('salam_pembuka');
            $table->text('cerita_mempelai');
            $table->string('nama_mempelai_pria');
            $table->string('nama_mempelai_wanita');
            $table->string('nama_ayah_mempelai_pria');
            $table->string('nama_ibu_mempelai_pria');
            $table->string('nama_ayah_mempelai_wanita');
            $table->string('nama_ibu_mempelai_wanita');
            $table->text('deskripsi_singkat_pasangan');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('buat_undangan_id')->references('id')->on('buat_undangan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('undangan_profil_wedding');
    }
}
