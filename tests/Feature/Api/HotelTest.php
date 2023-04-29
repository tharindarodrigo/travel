<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Hotel;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HotelTest extends TestCase
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
    public function it_gets_hotels_list(): void
    {
        $hotels = Hotel::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.hotels.index'));

        $response->assertOk()->assertSee($hotels[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_hotel(): void
    {
        $data = Hotel::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.hotels.store'), $data);

        $this->assertDatabaseHas('hotels', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(route('api.hotels.update', $hotel), $data);

        $data['id'] = $hotel->id;

        $this->assertDatabaseHas('hotels', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_hotel(): void
    {
        $hotel = Hotel::factory()->create();

        $response = $this->deleteJson(route('api.hotels.destroy', $hotel));

        $this->assertModelMissing($hotel);

        $response->assertNoContent();
    }
}
