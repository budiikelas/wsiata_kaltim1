<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            DestinationSeeder::class,
        ]);

        \App\Models\User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin Wisata',
                'password' => bcrypt('password123'),
                'is_admin' => true
            ]
        );
    }
}
