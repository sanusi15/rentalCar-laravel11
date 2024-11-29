<?php

namespace Database\Factories;

use App\Models\CarsModel;
use App\Models\CarsType;
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
            'cars_id' => $this->faker->unique()->numerify('CAR-#####'),
            'make_id' => CarsType::factory(), // Menggunakan factory untuk CarsType
            'model_id' => CarsModel::factory(), // Menggunakan factory untuk CarsModel
            'year' => $this->faker->numberBetween(2020, 2024),
            'color' => $this->faker->safeColorName(),
            'licence_plate' => $this->faker->unique()->numerify('B-####-XYZ'),
            'engine_size' => $this->faker->randomFloat(1, 1.0, 3.0), // float value
            'fuel_type' => $this->faker->randomElement(['Gasoline', 'Diesel', 'Electric']),
            'transmission' => $this->faker->randomElement(['Automatic', 'Manual']),
            'doors' => $this->faker->numberBetween(2, 4),
            'seats' => $this->faker->numberBetween(4, 7),
            'status' => $this->faker->randomElement(['Available', 'Rented', 'Not Available']),
            'condition' => $this->faker->randomElement(['New', 'Used']),
            'daily_rate' => $this->faker->randomFloat(2, 50, 500),
            'weekly_rate' => $this->faker->randomFloat(2, 300, 2000),
            'mileage' => $this->faker->numberBetween(1000, 100000), // integer value
            'description' => $this->faker->paragraph(),
            'image_url' => $this->faker->imageUrl(640, 480, 'cars', true),
        ];
    }
}
