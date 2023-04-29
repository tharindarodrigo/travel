<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hotel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique->company(),
            'address_line_1' => $this->faker->address,
            'address_line_2' => $this->faker->address,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'longitude' => $this->faker->longitude,
            'latitude' => $this->faker->latitude,
            'description' => $this->faker->sentence(15),
            'long_description' => $this->faker->text,
            'active' => $this->faker->boolean,
        ];
    }
}
