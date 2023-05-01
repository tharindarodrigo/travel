<?php

namespace Tests\Feature\Api;

use App\Models\Hotel;
use App\Models\HotelCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HotelHotelCategoriesTest extends TestCase
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
    public function it_gets_hotel_hotel_categories(): void
    {
        $hotel = Hotel::factory()->create();
        $hotelCategory = HotelCategory::factory()->create();

        $hotel->hotelCategories()->attach($hotelCategory);

        $response = $this->getJson(
            route('api.hotels.hotel-categories.index', $hotel)
        );

        $response->assertOk()->assertSee($hotelCategory->name);
    }

    /**
     * @test
     */
    public function it_can_attach_hotel_categories_to_hotel(): void
    {
        $hotel = Hotel::factory()->create();
        $hotelCategory = HotelCategory::factory()->create();

        $response = $this->postJson(
            route('api.hotels.hotel-categories.store', [$hotel, $hotelCategory])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $hotel
                ->hotelCategories()
                ->where('hotel_categories.id', $hotelCategory->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_hotel_categories_from_hotel(): void
    {
        $hotel = Hotel::factory()->create();
        $hotelCategory = HotelCategory::factory()->create();

        $response = $this->deleteJson(
            route('api.hotels.hotel-categories.store', [$hotel, $hotelCategory])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $hotel
                ->hotelCategories()
                ->where('hotel_categories.id', $hotelCategory->id)
                ->exists()
        );
    }
}
