<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Pantai', 'description' => 'Destinasi wisata pesisir dan pulau'],
            ['name' => 'Gunung', 'description' => 'Destinasi wisata pegunungan dan trekking'],
            ['name' => 'Hutan', 'description' => 'Destinasi wisata alam liar dan hutan hujan'],
            ['name' => 'Budaya', 'description' => 'Destinasi wisata sejarah dan kearifan lokal'],
            ['name' => 'Air Terjun', 'description' => 'Destinasi wisata air terjun dan sungai'],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::updateOrCreate(
                ['name' => $category['name']],
                $category
            );
        }
    }
}
