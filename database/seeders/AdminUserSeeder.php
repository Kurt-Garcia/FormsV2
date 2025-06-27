<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Create sample regular user
        User::create([
            'name' => 'Monkey D. Luffy',
            'email' => 'pirateKing.com',
            'password' => Hash::make('admin123'),
            'role' => 'user',
        ]);
    }
}
