<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Hotel;
use App\Models\HotelCategory;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HotelCategoryHotelsTest extends TestCase
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
    public function it_gets_hotel_category_hotels(): void
    {
        $hotelCategory = HotelCategory::factory()->create();
        $hotel = Hotel::factory()->create();

        $hotelCategory->hotels()->attach($hotel);

        $response = $this->getJson(
            route('api.hotel-categories.hotels.index', $hotelCategory)
        );

        $response->assertOk()->assertSee($hotel->name);
    }

    /**
     * @test
     */
    public function it_can_attach_hotels_to_hotel_category(): void
    {
        $hotelCategory = HotelCategory::factory()->create();
        $hotel = Hotel::factory()->create();

        $response = $this->postJson(
            route('api.hotel-categories.hotels.store', [$hotelCategory, $hotel])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $hotelCategory
                ->hotels()
                ->where('hotels.id', $hotel->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_hotels_from_hotel_category(): void
    {
        $hotelCategory = HotelCategory::factory()->create();
        $hotel = Hotel::factory()->create();

        $response = $this->deleteJson(
            route('api.hotel-categories.hotels.store', [$hotelCategory, $hotel])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $hotelCategory
                ->hotels()
                ->where('hotels.id', $hotel->id)
                ->exists()
        );
    }
}
