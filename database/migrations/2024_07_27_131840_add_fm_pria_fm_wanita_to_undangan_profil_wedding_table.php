<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('undangan_profil_wedding', function (Blueprint $table) {
            $table->string('fm_pria')->nullable()->after('nama_ibu_mempelai_wanita');
            $table->string('fm_wanita')->nullable()->after('fm_pria');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('undangan_profil_wedding', function (Blueprint $table) {
            $table->dropColumn('fm_pria');
            $table->dropColumn('fm_wanita');
        });
    }
};
