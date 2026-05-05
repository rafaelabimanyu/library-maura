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
            'name' => 'Admin Maura',
            'email' => 'admin@maura.com',
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Petugas Maura',
            'email' => 'petugas@maura.com',
            'role' => 'petugas',
        ]);

        User::factory()->create([
            'name' => 'Pengunjung Maura',
            'email' => 'user@maura.com',
            'role' => 'pengunjung',
        ]);
    }
}
