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
        $adminID = DB::table('users')
            ->insertGetId([
                'name' => 'Admin',
                'email' => 'bookshelf_admin@' . parse_url(env('APP_URL'), PHP_URL_HOST),
                'password' => bcrypt('bookshelf_admin@123'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        $adminRole = DB::table('roles')->where('name', '=', 'ADMIN')->first();
        DB::table('user_n_role')->insert([
            'role_id' => $adminRole->id,
            'user_id' => $adminID,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $adminRole = DB::table('roles')->where('name', '=', 'ADMIN')->first();
        $adminID = DB::table('users')->where('email', '=', 'bookshelf_admin@' . parse_url(env('APP_URL'), PHP_URL_HOST))->first();
        DB::table('users_roles')->where('role_id', '=', $adminRole->id)->where('user_id', '=', $adminID->id)->delete();
        DB::table('users')->where('email', '=', 'bookshelf_admin@' . parse_url(env('APP_URL'), PHP_URL_HOST))->delete();
    }
};
