<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'car_model' => $this->faker->word(),
            'gas_type' => $this->faker->randomElement(['Petrol', 'Diesel', 'Electric']),
            'steering' => $this->faker->randomElement(['Left', 'Right']),
            'rental_price_per_day' => $this->faker->numberBetween(50, 500),
            'car_image' => $this->faker->imageUrl(640, 480, 'cars'),
            'car_type' => $this->faker->randomElement(['Sedan', 'SUV', 'Truck', 'Convertible']),
            'capacity' => $this->faker->numberBetween(2, 7),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
