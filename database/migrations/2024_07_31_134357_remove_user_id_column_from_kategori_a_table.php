<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUserIdColumnFromYourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kategori_audio', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['user_id']);
            
            // Drop the user_id column
            $table->dropColumn('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kategori_audio', function (Blueprint $table) {
            // Add the user_id column back
            $table->unsignedBigInteger('user_id');
            
            // Add the foreign key constraint back
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
