<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Review::create([
            'user_id' => 1,
            'car_id' => 1,
            'description' => 'Excellent performance and fuel efficiency.',
            'rating' => 5,
        ]);

        Review::create([
            'user_id' => 2,
            'car_id' => 2,
            'description' => 'Comfortable ride but consumes a lot of fuel.',
            'rating' => 3,
        ]);

        Review::create([
            'user_id' => 3,
            'car_id' => 9,
            'description' => 'Good for city driving.',
            'rating' => 4,
        ]);


         Review::create([
            'user_id' => 5,
            'car_id' => 7,
            'description' => 'Good for city driving.',
            'rating' => 5,
        ]);

        Review::create([
            'user_id' => 4,
            'car_id' => 2,
            'description' => 'Not bad, but maintenance is a bit expensive.',
            'rating' => 3,
                ]);

        Review::create([
            'user_id' => 5,
            'car_id' => 3,
            'description' => 'Stylish and modern interior. Loved it!',
            'rating' => 5,
        ]);

        Review::create([
            'user_id' => 1,
            'car_id' => 3,
            'description' => 'The car was okay for a short trip.',
            'rating' => 4,
        ]);

        Review::create([
            'user_id' => 2,
            'car_id' => 1,
            'description' => 'Smooth drive and very reliable.',
            'rating' => 5,
        ]);

        Review::create([
            'user_id' => 3,
            'car_id' => 2,
            'description' => 'Average performance, but affordable.',
            'rating' => 3,
        ]);

    }

}
