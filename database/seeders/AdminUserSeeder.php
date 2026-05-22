<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Dev-only admin user seeder. Do NOT run in production.
 *
 * Usage: php artisan db:seed --class=AdminUserSeeder
 *
 * Creates / updates: admin@parallaxnet.test  /  password
 */
class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Login uses `name` (not email). Username = "admin", password = "password".
        User::updateOrCreate(
            ['name' => 'admin'],
            [
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );
    }
}
