<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\HotelCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HotelCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique->randomElement([
                "Luxury hotels",
                "Full-service hotels",
                "Boutique hotels",
                "Resort hotels",
                "Extended-stay hotels",
                "Budget hotels",
                "Economy hotels",
                "Bed and Breakfasts (B&Bs)",
                "Hostels",
                "Vacation rentals",
                "Beach hotels",
                "Ski resorts",
                "Casino hotels",
                "Golf resorts",
                "Health and wellness retreats",
                "Eco-friendly or sustainable hotels",
                "Historic hotels",
                "Conference or convention hotels",
                "Airport hotels",
                "Pet-friendly hotels"
            ]),
        ];
    }
}
