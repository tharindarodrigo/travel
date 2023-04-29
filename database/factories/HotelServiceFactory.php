<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\HotelService;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HotelService::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $chargeableServices = [
            ['name' => 'Room service'],
            ['name' => 'Spa or wellness center'],
            ['name' => 'Business center or meeting rooms'],
            ['name' => 'Shuttle service or transportation assistance'],
            ['name' => 'Laundry or dry cleaning service'],
            ['name' => 'In-room amenities such as a mini-fridge, safe, or coffee maker'],
            ['name' => 'Entertainment options such as a game room, movie theater, or live music'],
            ['name' => 'Tour desk or ticket booking service'],
            ['name' => 'Parking or valet service'],
            ['name' => 'Pet services such as dog walking or pet sitting'],
            ['name' => 'Bike or equipment rental'],
            ['name' => 'Gift shop or convenience store'],
            ['name' => 'Banquet or event facilities']
        ];
        return [
            'name' => $this->faker->randomElement($chargeableServices)['name'],
            'description' => $this->faker->sentence(15),
            'price' => $this->faker->randomFloat(2, 0, 9999),
            'hotel_id' => \App\Models\Hotel::factory(),
        ];
    }
}
