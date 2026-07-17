<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@coffee.com',
            'password' => bcrypt('Admin@12345'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'Test Customer',
            'email' => 'customer@coffee.com',
            'password' => bcrypt('Customer@12345'),
            'role' => 'customer',
            'email_verified_at' => now(),
        ]);
    }
}
