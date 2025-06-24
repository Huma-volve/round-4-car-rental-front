<?php

namespace Database\Seeders;

use App\Models\Favourite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FavouruteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Favourite::create([
            'user_id' => 1,
            'car_id' => 2,
        ]);

        Favourite::create([
            'user_id' => 2,
            'car_id' => 1,
        ]);

        Favourite::create([
            'user_id' => 1,
            'car_id' => 3,
        ]);

          Favourite::create([
            'user_id' => 6,
            'car_id' => 5,
        ]);

          Favourite::create([
            'user_id' => 7,
            'car_id' => 3,
        ]);
    }
}
