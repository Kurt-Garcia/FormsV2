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
            'name' => 'Admin User',
            'email' => 'admin@formsv2.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Create sample regular user
        User::create([
            'name' => 'John Doe',
            'email' => 'user@formsv2.com',
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);
    }
}
