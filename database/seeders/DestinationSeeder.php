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
        $gunung = Category::where('name', 'Gunung')->first();

        $destinations = [
            [
                'category_id' => $pantai->id,
                'name' => 'Kepulauan Derawan',
                'description' => 'Surga tropis dengan pantai pasir putih dan kehidupan laut yang memukau. Nikmati keindahan bawah laut yang tak tertandingi.',
                'location' => 'Berau, Kalimantan Timur',
                'ticket_price' => 250000,
                'thumbnail' => 'images/beach.jpeg',
                'rating' => 4.9
            ],
            [
                'category_id' => $pantai->id,
                'name' => 'Danau Kakaban',
                'description' => 'Berenang bersama jutaan ubur-ubur tanpa sengat di danau purba yang magis. Pengalaman langka yang hanya ada di dua tempat di dunia.',
                'location' => 'Berau, Kalimantan Timur',
                'ticket_price' => 150000,
                'thumbnail' => 'images/hero-beach.png',
                'rating' => 4.7
            ],
            [
                'category_id' => $pantai->id,
                'name' => 'Pantai Maratua',
                'description' => 'Surga bahari dengan pasir putih selembut tepung dan air sebening kristal. Destinasi eksotis yang sering disebut sebagai Maldives-nya Indonesia.',
                'location' => 'Berau, Kalimantan Timur',
                'ticket_price' => 300000,
                'thumbnail' => 'images/maladewa.png',
                'rating' => 4.8
            ],
            [
                'category_id' => $hutan->id,
                'name' => 'Hutan Hujan Tropis',
                'description' => 'Eksplorasi keanekaragaman hayati dan habitat orangutan Kalimantan. Paru-paru dunia yang menakjubkan.',
                'location' => 'Kutai Barat, Kalimantan Timur',
                'ticket_price' => 100000,
                'thumbnail' => 'images/orangutan-hero.png',
                'rating' => 4.6
            ],
            [
                'category_id' => $budaya->id,
                'name' => 'Desa Wisata Pampang',
                'description' => 'Rasakan pengalaman otentik budaya suku Dayak. Saksikan tarian tradisional dan kerajinan tangan yang mempesona.',
                'location' => 'Samarinda, Kalimantan Timur',
                'ticket_price' => 50000,
                'thumbnail' => 'images/retreat.png',
                'rating' => 4.5
            ],
            [
                'category_id' => $pantai->id,
                'name' => 'Labuan Cermin',
                'description' => 'Danau dua rasa yang jernih seperti cermin. Fenomena alam unik di mana air tawar dan air laut tidak bercampur.',
                'location' => 'Berau, Kalimantan Timur',
                'ticket_price' => 75000,
                'thumbnail' => 'images/santorini.png',
                'rating' => 4.9
            ],
            [
                'category_id' => $hutan->id,
                'name' => 'Bukit Bangkirai',
                'description' => 'Rasakan sensasi berjalan di jembatan tajuk (canopy bridge) di ketinggian 30 meter di tengah hutan hujan tropis.',
                'location' => 'Kutai Kartanegara, Kalimantan Timur',
                'ticket_price' => 45000,
                'thumbnail' => 'images/tropical-bg.png',
                'rating' => 4.3
            ],
            [
                'category_id' => $gunung->id,
                'name' => 'Gunung Embun',
                'description' => 'Pemandangan samudra awan yang memukau di pagi hari. Destinasi favorit untuk berkemah dan menikmati udara segar pegunungan.',
                'location' => 'Paser, Kalimantan Timur',
                'ticket_price' => 20000,
                'thumbnail' => 'images/kyoto.png',
                'rating' => 4.4
            ],
            [
                'category_id' => $budaya->id,
                'name' => 'Pulau Kumala',
                'description' => 'Taman rekreasi keluarga yang menggabungkan budaya lokal dan modern di tengah Sungai Mahakam.',
                'location' => 'Tenggarong, Kalimantan Timur',
                'ticket_price' => 30000,
                'thumbnail' => 'images/airplane-tropical.png',
                'rating' => 4.2
            ],
            [
                'category_id' => $gunung->id,
                'name' => 'Karst Sangkulirang',
                'description' => 'Situs warisan dunia dengan tebing kapur purba dan lukisan gua prasejarah yang misterius.',
                'location' => 'Kutai Timur, Kalimantan Timur',
                'ticket_price' => 120000,
                'thumbnail' => 'images/tropical-bg.png',
                'rating' => 4.7
            ],
        ];

        foreach ($destinations as $dest) {
            $createdDest = Destination::updateOrCreate(
                ['name' => $dest['name']],
                $dest
            );

            // Add some gallery images for each destination
            $galleryImages = [
                'images/beach.jpeg',
                'images/hero-beach.png',
                'images/maladewa.png',
                'images/santorini.png',
                'images/tropical-bg.png',
            ];

            // Shuffle and take 3 random images for gallery
            $randomImages = collect($galleryImages)->shuffle()->take(3);

            foreach ($randomImages as $imagePath) {
                \App\Models\Gallery::updateOrCreate(
                    [
                        'destination_id' => $createdDest->id,
                        'image' => $imagePath
                    ]
                );
            }
        }
    }
}
