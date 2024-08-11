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
        Schema::table('audio', function (Blueprint $table) {
            // Drop foreign key constraint
            $table->dropForeign(['user_id']);

            // Drop the column
            $table->dropColumn('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('audio', function (Blueprint $table) {
            // Add the column back
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }
};
