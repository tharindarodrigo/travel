<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Hotel;
use App\Models\HotelAmenity;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HotelHotelAmenitiesTest extends TestCase
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
    public function it_gets_hotel_hotel_amenities(): void
    {
        $hotel = Hotel::factory()->create();
        $hotelAmenity = HotelAmenity::factory()->create();

        $hotel->hotelAmenities()->attach($hotelAmenity);

        $response = $this->getJson(
            route('api.hotels.hotel-amenities.index', $hotel)
        );

        $response->assertOk()->assertSee($hotelAmenity->name);
    }

    /**
     * @test
     */
    public function it_can_attach_hotel_amenities_to_hotel(): void
    {
        $hotel = Hotel::factory()->create();
        $hotelAmenity = HotelAmenity::factory()->create();

        $response = $this->postJson(
            route('api.hotels.hotel-amenities.store', [$hotel, $hotelAmenity])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $hotel
                ->hotelAmenities()
                ->where('hotel_amenities.id', $hotelAmenity->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_hotel_amenities_from_hotel(): void
    {
        $hotel = Hotel::factory()->create();
        $hotelAmenity = HotelAmenity::factory()->create();

        $response = $this->deleteJson(
            route('api.hotels.hotel-amenities.store', [$hotel, $hotelAmenity])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $hotel
                ->hotelAmenities()
                ->where('hotel_amenities.id', $hotelAmenity->id)
                ->exists()
        );
    }
}
