<?php

namespace Tests\Feature\Api;

use App\Models\Hotel;
use App\Models\Rate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HotelRatesTest extends TestCase
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
    public function it_gets_hotel_rates(): void
    {
        $hotel = Hotel::factory()->create();
        $rates = Rate::factory()
            ->count(2)
            ->create([
                'hotel_id' => $hotel->id,
            ]);

        $response = $this->getJson(route('api.hotels.rates.index', $hotel));

        $response->assertOk()->assertSee($rates[0]->from);
    }

    /**
     * @test
     */
    public function it_stores_the_hotel_rates(): void
    {
        $hotel = Hotel::factory()->create();
        $data = Rate::factory()
            ->make([
                'hotel_id' => $hotel->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.hotels.rates.store', $hotel),
            $data
        );

        unset($data['room_id']);

        $this->assertDatabaseHas('rates', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $rate = Rate::latest('id')->first();

        $this->assertEquals($hotel->id, $rate->hotel_id);
    }
}
