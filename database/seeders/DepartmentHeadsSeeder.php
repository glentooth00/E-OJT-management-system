<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DepartmentHeadsSeeder extends Seeder
{
    public function run()
    {
        $departmentHeads = [
            [
                'first_name' => 'John',
                'middle_name' => 'A.',
                'last_name' => 'Doe',
                'role' => 'Department head',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Jane',
                'middle_name' => 'B.',
                'last_name' => 'Smith',
                'role' => 'Head of Finance',
                'email' => 'janesmith@example.com',
                'password' => Hash::make('password456'),
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more department heads as needed
        ];

        DB::table('department_heads')->insert($departmentHeads);
    }
}
