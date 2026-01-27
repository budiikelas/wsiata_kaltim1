<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Destination;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pantai = Category::where('name', 'Pantai')->first();
        $hutan = Category::where('name', 'Hutan')->first();
        $budaya = Category::where('name', 'Budaya')->first();

        $destinations = [
            [
                'category_id' => $pantai->id,
                'name' => 'Kepulauan Derawan',
                'description' => 'Surga tropis dengan pantai pasir putih dan kehidupan laut yang memukau. Nikmati keindahan bawah laut yang tak tertandingi.',
                'location' => 'Berau, Kalimantan Timur',
                'ticket_price' => 250000,
                'thumbnail' => 'images/beach.jpeg'
            ],
            [
                'category_id' => $pantai->id,
                'name' => 'Danau Kakaban',
                'description' => 'Berenang bersama jutaan ubur-ubur tanpa sengat di danau purba yang magis. Pengalaman langka yang hanya ada di dua tempat di dunia.',
                'location' => 'Berau, Kalimantan Timur',
                'ticket_price' => 150000,
                'thumbnail' => 'images/islandia.png'
            ],
            [
                'category_id' => $pantai->id,
                'name' => 'Pantai Maratua',
                'description' => 'Surga bahari dengan pasir putih selembut tepung dan air sebening kristal. Destinasi eksotis yang sering disebut sebagai Maldives-nya Indonesia.',
                'location' => 'Berau, Kalimantan Timur',
                'ticket_price' => 300000,
                'thumbnail' => 'images/maladewa.png'
            ],
            [
                'category_id' => $hutan->id,
                'name' => 'Hutan Hujan Tropis',
                'description' => 'Eksplorasi keanekaragaman hayati dan habitat orangutan Kalimantan. Paru-paru dunia yang menakjubkan.',
                'location' => 'Kutai Barat, Kalimantan Timur',
                'ticket_price' => 100000,
                'thumbnail' => 'images/orangutan-hero.png'
            ],
            [
                'category_id' => $budaya->id,
                'name' => 'Desa Wisata Pampang',
                'description' => 'Rasakan pengalaman otentik budaya suku Dayak. Saksikan tarian tradisional dan kerajinan tangan yang mempesona.',
                'location' => 'Samarinda, Kalimantan Timur',
                'ticket_price' => 50000,
                'thumbnail' => 'images/packages-hero-v3.png'
            ],
        ];

        foreach ($destinations as $dest) {
            Destination::updateOrCreate(
                ['name' => $dest['name']],
                $dest
            );
        }
    }
}
