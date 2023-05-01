<?php

namespace Database\Seeders;

use App\Models\HotelAmenity;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class HotelAmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amenities = [
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
        ];
        $amenities = array_map(fn ($amenity) => ['name' => $amenity], $amenities);

        HotelAmenity::factory()
            ->count(count($amenities))
            ->state(new Sequence(...$amenities))
            ->create();
    }
}
