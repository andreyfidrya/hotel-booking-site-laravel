<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'phone' => '+380501112204',
                'email' => 'admin@example.com',
                'password' => Hash::make('12345678'),
                'usertype' => 'admin', // если есть такой столбец
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User',
                'phone' => '+380501112206',
                'email' => 'user@example.com',
                'password' => Hash::make('12345678'),
                'usertype' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
