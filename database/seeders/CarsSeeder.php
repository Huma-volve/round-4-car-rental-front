<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Car::create([
            'carModel' => 'Toyota Corolla',
            'gasoline' => 'Petrol',
            'steering' => 'automatic',
            'rental_price_per_day' => 350.00,
            'TypeCar' => 'Sedan',
            'Capacity' => 5,
            'image' => 'cars/toyota_corolla.jpg',
        ]);

        Car::create([
            'carModel' => 'Hyundai Elantra',
            'gasoline' => 'Gas',
            'steering' => 'manual',
            'rental_price_per_day' => 320.00,
            'TypeCar' => 'Sedan',
            'Capacity' => 5,
            'image' => 'cars/elantra.jpg',
        ]);

        Car::create([
            'carModel' => 'Kia Sportage',
            'gasoline' => 'Diesel',
            'steering' => 'automatic',
            'rental_price_per_day' => 500.00,
            'TypeCar' => 'SUV',
            'Capacity' => 7,
            'image' => 'cars/sportage.jpg',
        ]);

        Car::create([
            'carModel' => 'Nissan Sunny',
            'gasoline' => 'Petrol',
            'steering' => 'manual',
            'rental_price_per_day' => 250.00,
            'TypeCar' => 'Compact',
            'Capacity' => 5,
            'image' => 'cars/sunny.jpg',
        ]);

        Car::create([
            'carModel' => 'Jeep Wrangler',
            'gasoline' => 'Diesel',
            'steering' => 'manual',
            'rental_price_per_day' => 600.00,
            'TypeCar' => 'Off-road',
            'Capacity' => 4,
            'image' => 'cars/wrangler.jpg',
        ]);
    }
}
