<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class bookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Booking::create([
            'user_id' => 1,
            'car_id' => 1,
            'pickup_location' => 'Cairo Airport',
            'pickup_date' => '2025-07-01',
            'pick_up_time' => '10:00:00',
            'dropoff_location' => 'Giza Station',
            'dropoff_date' => '2025-07-03',
            'dropoff_time' => '16:00:00',
            'status' => 'confirmed',
            'price' => 700.00,
        ]);

        Booking::create([
            'user_id' => 2,
            'car_id' => 3,
            'pickup_location' => 'Alexandria Downtown',
            'pickup_date' => '2025-07-05',
            'pick_up_time' => '09:00:00',
            'dropoff_location' => 'Alexandria Airport',
            'dropoff_date' => '2025-07-06',
            'dropoff_time' => '11:30:00',
            'status' => 'pending',
            'price' => 500.00,
        ]);

        Booking::create([
            'user_id' => 1,
            'car_id' => 2,
            'pickup_location' => 'Nasr City',
            'pickup_date' => '2025-07-10',
            'pick_up_time' => '08:00:00',
            'dropoff_location' => '6th October',
            'dropoff_date' => '2025-07-12',
            'dropoff_time' => '17:00:00',
            'status' => 'cancelled',
            'price' => 600.00,
        ]);
    }
}
