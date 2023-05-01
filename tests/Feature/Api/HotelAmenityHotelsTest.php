<?php

namespace Tests\Feature\Api;

use App\Models\Hotel;
use App\Models\HotelAmenity;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HotelAmenityHotelsTest extends TestCase
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
    public function it_gets_hotel_amenity_hotels(): void
    {
        $hotelAmenity = HotelAmenity::factory()->create();
        $hotel = Hotel::factory()->create();

        $hotelAmenity->hotels()->attach($hotel);

        $response = $this->getJson(
            route('api.hotel-amenities.hotels.index', $hotelAmenity)
        );

        $response->assertOk()->assertSee($hotel->name);
    }

    /**
     * @test
     */
    public function it_can_attach_hotels_to_hotel_amenity(): void
    {
        $hotelAmenity = HotelAmenity::factory()->create();
        $hotel = Hotel::factory()->create();

        $response = $this->postJson(
            route('api.hotel-amenities.hotels.store', [$hotelAmenity, $hotel])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $hotelAmenity
                ->hotels()
                ->where('hotels.id', $hotel->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_hotels_from_hotel_amenity(): void
    {
        $hotelAmenity = HotelAmenity::factory()->create();
        $hotel = Hotel::factory()->create();

        $response = $this->deleteJson(
            route('api.hotel-amenities.hotels.store', [$hotelAmenity, $hotel])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $hotelAmenity
                ->hotels()
                ->where('hotels.id', $hotel->id)
                ->exists()
        );
    }
}
