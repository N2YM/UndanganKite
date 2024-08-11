<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Mengambil data admin dari tabel users
        $adminUsers = DB::table('users')->where('role', 'admin')->get();

        // Memindahkan data admin dari tabel users ke tabel admins
        foreach ($adminUsers as $admin) {
            DB::table('admins')->insert([
                'id' => $admin->id,
                'name' => $admin->name,
                'email' => $admin->email,
                'email_verified_at' => $admin->email_verified_at,
                'password' => $admin->password,
                'remember_token' => $admin->remember_token,
                'created_at' => $admin->created_at,
                'updated_at' => $admin->updated_at,
            ]);
        }

        // Menghapus data admin dari tabel users
        DB::table('users')->where('role', 'admin')->delete();

        // Menghapus kolom 'role' dari tabel users
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Menambahkan kembali kolom 'role' ke tabel users
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'user'])->default('user');
        });

        // Mengambil data dari tabel admins
        $admins = DB::table('admins')->get();

        // Memindahkan data dari tabel admins kembali ke tabel users
        foreach ($admins as $admin) {
            DB::table('users')->insert([
                'id' => $admin->id,
                'name' => $admin->name,
                'email' => $admin->email,
                'email_verified_at' => $admin->email_verified_at,
                'password' => $admin->password,
                'remember_token' => $admin->remember_token,
                'created_at' => $admin->created_at,
                'updated_at' => $admin->updated_at,
                'role' => 'admin',
            ]);
        }

        // Menghapus tabel admins
        Schema::dropIfExists('admins');
    }
};
