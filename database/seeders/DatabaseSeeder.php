<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin Satgas
        User::create([
            'name' => 'Admin Satgas PPKPT',
            'email' => 'admin.satgas@unimus.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Regular User
        User::create([
            'name' => 'Mahasiswa Test',
            'email' => 'mahasiswa@student.unimus.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);
    }
}
