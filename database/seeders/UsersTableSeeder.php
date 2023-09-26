<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // Admin
            [
                'name' => 'Admin',
                'email' => 'admin@greencarpool.com',
                'phone' => '+254741358859',
                'role' => 'admin',
                'password' => Hash::make('admin123'),
                'created_at' => now(),

            ],
            [
                'name' => 'Baruch Tony',
                'email' => 'tonybaruch@gmail.com',
                'phone' => '+254717005220',
                'role' => 'user',
                'password' => Hash::make('baruchtony@123'),
                'created_at' => now(),

            ]

        ]);
    }
}
