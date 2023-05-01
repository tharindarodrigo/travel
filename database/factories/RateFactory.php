<?php

namespace Database\Factories;

use App\Models\Rate;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class RateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rate::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'adults' => $this->faker->numberBetween(1, 3),
            'children' => $this->faker->numberBetween(0, 2),
            'basis' => $this->faker->randomElement(['AI', 'FB', 'HB', 'BB', 'RO']),
            'from' => $date = now()->addMonths($this->faker->numberBetween(-2, 3))->format('Y-m-d'),
            'to' => Carbon::make($date)->addMonths($this->faker->numberBetween(1, 6))->format('Y-m-d'),
            'price' => $this->faker->numberBetween(50, 200),
            'hotel_id' => \App\Models\Hotel::factory(),
            'room_id' => \App\Models\Room::factory(),
        ];
    }
}
