<?php
namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; // Import the Str class


class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Student user',
            'email' => 'student@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('student'), // Change 'password' to your desired password
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

