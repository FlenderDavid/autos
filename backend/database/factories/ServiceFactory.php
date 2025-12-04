<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'car_id' => Car::factory(),  
            'type' => $this->faker->randomElement(['Oil Change', 'Brake Repair', 'Filter Change', 'Diagnosis']),
            'mileage' => $this->faker->numberBetween(5000, 250000),
            'price' => $this->faker->numberBetween(5000, 150000),
            'comment' => $this->faker->sentence()
        ];
    }
}
