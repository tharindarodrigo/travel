<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $roomNames = [
            'suite',
            'deluxe',
            'standard',
            'superior',
            'executive',
            'presidential',
            'penthouse',
            'connecting',
            'adjoining',
            'adjacent',
            'family',
            'bridal',
            'double',
            'twin',
            'single',
            'triple',
            'quad',
            'quadplex',
            'studio',
            'efficiency',
            'accessible',
            'apartment',
            'cabana',
            'villa',
            'cottage',
            'chalet',
            'casita',
            'bungalow',
            'loft',
            'dormitory',
            'hostel',
            'caravan',
            'caravanserai',
            'inn',
            'motel',
            'resort',
            'ranch',
            'cabin',
            'camp',
            'campground',
            'campsite',
            'caravan park',
            'caravan site',
        ];

        return [
            'name' => ucfirst($this->faker->randomElement($roomNames)),
            'count' => 0,
            'is_active' => $this->faker->boolean,
            'description' => $this->faker->text,
            'hotel_id' => \App\Models\Hotel::factory(),
        ];
    }
}
