<?php

namespace Tests\Feature\Controllers;

use App\Models\HotelAmenity;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HotelAmenityControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_hotel_amenities(): void
    {
        $hotelAmenities = HotelAmenity::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('hotel-amenities.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.hotel_amenities.index')
            ->assertViewHas('hotelAmenities');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_hotel_amenity(): void
    {
        $response = $this->get(route('hotel-amenities.create'));

        $response->assertOk()->assertViewIs('app.hotel_amenities.create');
    }

    /**
     * @test
     */
    public function it_stores_the_hotel_amenity(): void
    {
        $data = HotelAmenity::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('hotel-amenities.store'), $data);

        $this->assertDatabaseHas('hotel_amenities', $data);

        $hotelAmenity = HotelAmenity::latest('id')->first();

        $response->assertRedirect(route('hotel-amenities.edit', $hotelAmenity));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_hotel_amenity(): void
    {
        $hotelAmenity = HotelAmenity::factory()->create();

        $response = $this->get(route('hotel-amenities.show', $hotelAmenity));

        $response
            ->assertOk()
            ->assertViewIs('app.hotel_amenities.show')
            ->assertViewHas('hotelAmenity');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_hotel_amenity(): void
    {
        $hotelAmenity = HotelAmenity::factory()->create();

        $response = $this->get(route('hotel-amenities.edit', $hotelAmenity));

        $response
            ->assertOk()
            ->assertViewIs('app.hotel_amenities.edit')
            ->assertViewHas('hotelAmenity');
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

        $response = $this->put(
            route('hotel-amenities.update', $hotelAmenity),
            $data
        );

        $data['id'] = $hotelAmenity->id;

        $this->assertDatabaseHas('hotel_amenities', $data);

        $response->assertRedirect(route('hotel-amenities.edit', $hotelAmenity));
    }

    /**
     * @test
     */
    public function it_deletes_the_hotel_amenity(): void
    {
        $hotelAmenity = HotelAmenity::factory()->create();

        $response = $this->delete(
            route('hotel-amenities.destroy', $hotelAmenity)
        );

        $response->assertRedirect(route('hotel-amenities.index'));

        $this->assertModelMissing($hotelAmenity);
    }
}
