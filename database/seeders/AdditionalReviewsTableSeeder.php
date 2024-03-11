<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews= [
            [
                'product_id' => 3,
                'user_id' => 5,
                'comment' => 'The jacket fits perfectly and feels great. Exactly what I was looking for!',
                'rating' => 4,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => 7,
                'user_id' => 6,
                'comment' => 'This survival kit is a fun collectible. Some items are actually practical!',
                'rating' => 4,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => 8,
                'user_id' => 7,
                'comment' => 'Love the concept, but the print quality could be better.',
                'rating' => 3,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => 9,
                'user_id' => 8,
                'comment' => 'Adorable and well-made! A great addition to my collection.',
                'rating' => 5,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => 10,
                'user_id' => 9,
                'comment' => 'The artbook has stunning visuals and lots of interesting behind-the-scenes info.',
                'rating' => 5,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                '
                'product_id' => 11,
                'user_id' => 10,
                'comment' => 'Chris Redfield figure looks amazing. The detail is incredible, and it's very sturdy.',
                'rating' => 5,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => 12,
                'user_id' => 2,
                'comment' => 'The hoodie is cozy and has a great design. However, it started pilling after a few washes.',
                'rating' => 3,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => 13,
                'user_id' => 3,
                'comment' => 'Licker plush toy is surprisingly cute and very soft. Great for fans!',
                'rating' => 4,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => 14,
                'user_id' => 4,
                'comment' => 'The blueprint poster is a cool piece of memorabilia but arrived with a few creases.',
                'rating' => 3,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => 15,
                'user_id' => 5,
                'comment' => 'Leon Kennedy figure is just awesome. Every detail is perfect, and the articulation is great.',
                'rating' => 5,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => 12,
                'user_id' => 6,
                'comment' => 'Super cozy hoodie with a great fit. The logo is nicely printed and has held up well after washing.',
                'rating' => 4,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => 13,
                'user_id' => 7,
                'comment' => 'This Licker plush toy is unexpectedly cuddly for such a terrifying creature. Great quality!',
                'rating' => 5,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => 14,
                'user_id' => 8,
                'comment' => 'The Spencer Mansion blueprint poster is a fantastic piece of memorabilia. The detail is amazing!',
                'rating' => 5,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => 15,
                'user_id' => 9,
                'comment' => 'The Leon Kennedy figure has incredible detail. It’s a standout piece in my collection.',
                'rating' => 5,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => 16,
                'user_id' => 10,
                'comment' => 'The STARS badge replica feels authentic and is well made. A great buy for any Resident Evil fan.',
                'rating' => 4,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => 17,
                'user_id' => 2,
                'comment' => 'The RE3 strategy guide is comprehensive and full of useful tips. The artwork is also a nice bonus.',
                'rating' => 4,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => 18,
                'user_id' => 3,
                'comment' => 'The T-Virus and Anti-Virus prop replica set is a unique and high-quality addition to my collection.',
                'rating' => 5,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => 19,
                'user_id' => 4,
                'comment' => 'Love the concept of the Save Room candle, but the scent is weaker than I expected.',
                'rating' => 3,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => 20,
                'user_id' => 5,
                'comment' => 'The Ada Wong cosplay set is stunning and very detailed. A bit pricey, but worth it for serious cosplayers.',
                'rating' => 4,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => 21,
                'user_id' => 6,
                'comment' => 'The Zombie Outbreak Response Team decal is a fun addition to my car. The quality is great, and it sticks well.',
                'rating' => 5,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => 12,
                'user_id' => 6,
                'comment' => 'Super cozy hoodie with a great fit. The logo is nicely printed and has held up well after washing.',
                'rating' => 4,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => 13,
                'user_id' => 7,
                'comment' => 'This Licker plush toy is unexpectedly cuddly for such a terrifying creature. Great quality!',
                'rating' => 5,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => 14,
                'user_id' => 8,
                'comment' => 'The Spencer Mansion blueprint poster is a fantastic piece of memorabilia. The detail is amazing!',
                'rating' => 5,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => 15,
                'user_id' => 9,
                'comment' => 'The Leon Kennedy figure has incredible detail. It’s a standout piece in my collection.',
                'rating' => 5,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => 16,
                'user_id' => 10,
                'comment' => 'The STARS badge replica feels authentic and is well made. A great buy for any Resident Evil fan.',
                'rating' => 4,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => 17,
                'user_id' => 2,
                'comment' => 'The RE3 strategy guide is comprehensive and full of useful tips. The artwork is also a nice bonus.',
                'rating' => 4,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => 18,
                'user_id' => 3,
                'comment' => 'The T-Virus and Anti-Virus prop replica set is a unique and high-quality addition to my collection.',
                'rating' => 5,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => 19,
                'user_id' => 4,
                'comment' => 'Love the concept of the Save Room candle, but the scent is weaker than I expected.',
                'rating' => 3,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => 20,
                'user_id' => 5,
                'comment' => 'The Ada Wong cosplay set is stunning and very detailed. A bit pricey, but worth it for serious cosplayers.',
                'rating' => 4,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => 21,
                'user_id' => 6,
                'comment' => 'The Zombie Outbreak Response Team decal is a fun addition to my car. The quality is great, and it sticks well.',
                'rating' => 5,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ];

        DB::table('reviews')->insert($reviews);
    }
}