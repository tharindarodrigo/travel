<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\HotelAmenity;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HotelAmenityTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_hotel_amenities_list(): void
    {
        $hotelAmenities = HotelAmenity::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.hotel-amenities.index'));

        $response->assertOk()->assertSee($hotelAmenities[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_hotel_amenity(): void
    {
        $data = HotelAmenity::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.hotel-amenities.store'), $data);

        $this->assertDatabaseHas('hotel_amenities', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_hotel_amenity(): void
    {
        $hotelAmenity = HotelAmenity::factory()->create();

        $data = [
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

        $response = $this->putJson(
            route('api.hotel-amenities.update', $hotelAmenity),
            $data
        );

        $data['id'] = $hotelAmenity->id;

        $this->assertDatabaseHas('hotel_amenities', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_hotel_amenity(): void
    {
        $hotelAmenity = HotelAmenity::factory()->create();

        $response = $this->deleteJson(
            route('api.hotel-amenities.destroy', $hotelAmenity)
        );

        $this->assertModelMissing($hotelAmenity);

        $response->assertNoContent();
    }
}
