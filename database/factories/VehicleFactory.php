<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehicle::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->text(255),
            'max_occupancy' => $this->faker->numberBetween(0, 32767),
            'baggages' => $this->faker->numberBetween(0, 32767),
            'price_per_km' => $this->faker->randomNumber(1),
            'first_km' => $this->faker->randomNumber(1),
        ];
    }
}
