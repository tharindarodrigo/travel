<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Hotel;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HotelControllerTest extends TestCase
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
    public function it_displays_index_view_with_hotels(): void
    {
        $hotels = Hotel::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('hotels.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.hotels.index')
            ->assertViewHas('hotels');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_hotel(): void
    {
        $response = $this->get(route('hotels.create'));

        $response->assertOk()->assertViewIs('app.hotels.create');
    }

    /**
     * @test
     */
    public function it_stores_the_hotel(): void
    {
        $data = Hotel::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('hotels.store'), $data);

        $this->assertDatabaseHas('hotels', $data);

        $hotel = Hotel::latest('id')->first();

        $response->assertRedirect(route('hotels.edit', $hotel));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_hotel(): void
    {
        $hotel = Hotel::factory()->create();

        $response = $this->get(route('hotels.show', $hotel));

        $response
            ->assertOk()
            ->assertViewIs('app.hotels.show')
            ->assertViewHas('hotel');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_hotel(): void
    {
        $hotel = Hotel::factory()->create();

        $response = $this->get(route('hotels.edit', $hotel));

        $response
            ->assertOk()
            ->assertViewIs('app.hotels.edit')
            ->assertViewHas('hotel');
    }

    /**
     * @test
     */
    public function it_updates_the_hotel(): void
    {
        $hotel = Hotel::factory()->create();

        $data = [
            'name' => $this->faker->unique->company(),
            'address_line_1' => $this->faker->address,
            'address_line_2' => $this->faker->address,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'longitude' => $this->faker->longitude,
            'latitude' => $this->faker->latitude,
            'description' => $this->faker->sentence(15),
            'long_description' => $this->faker->text,
            'active' => $this->faker->boolean,
        ];

        $response = $this->put(route('hotels.update', $hotel), $data);

        $data['id'] = $hotel->id;

        $this->assertDatabaseHas('hotels', $data);

        $response->assertRedirect(route('hotels.edit', $hotel));
    }

    /**
     * @test
     */
    public function it_deletes_the_hotel(): void
    {
        $hotel = Hotel::factory()->create();

        $response = $this->delete(route('hotels.destroy', $hotel));

        $response->assertRedirect(route('hotels.index'));

        $this->assertModelMissing($hotel);
    }
}
