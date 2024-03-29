<?php

namespace Database\Factories;

use App\Models\Rooms;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rooms::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'count' => 0,
            'is_active' => $this->faker->boolean,
            'description' => $this->faker->text,
            'hotel_id' => \App\Models\Hotel::factory(),
        ];
    }
}
