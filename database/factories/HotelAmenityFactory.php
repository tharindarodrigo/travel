<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\HotelAmenity;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelAmenityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HotelAmenity::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique->randomElement([
                'Free Wi-Fi',
                'Swimming pool',
                'Fitness center',
                'Spa',
                'Restaurant',
                'Room service',
                '24-hour front desk',
                'Concierge service',
                'Laundry service',
                'Business center',
                'Meeting/banquet facilities',
                'Parking',
                'Shuttle service',
                'Airport transportation',
                'Bar/Lounge',
                'Free breakfast',
                'Buffet breakfast',
                'Continental breakfast',
                'Full-service spa',
                'Massage services',
                'Steam room',
                'Hot tub',
                'Childcare services',
                'Game room',
                'Garden',
                'Library',
                'Terrace',
                'Convenience store',
                'Gift shop',
                'ATM/banking',
                'Beauty salon',
                'Barbecue grills',
                'Currency exchange',
                'Dry cleaning/laundry service',
                'Elevator/lift',
                'Express check-in',
                'Express check-out',
                'Fireplace in lobby',
                'Free newspapers in lobby',
                'Free reception',
                'Grocery/convenience store',
                'Laundry facilities',
                'Luggage storage',
                'Outdoor pool',
                'Pool cabanas',
                'Porter/bellhop',
                'Shopping on site',
                'Smoke-free property',
                'Tours/ticket assistance',
                'Wedding services',
            ]),
            'active' => $this->faker->boolean,
        ];
    }
}
