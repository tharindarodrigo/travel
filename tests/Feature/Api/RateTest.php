<?php

namespace Tests\Feature\Api;

use App\Models\Hotel;
use App\Models\Rate;
use App\Models\Room;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RateTest extends TestCase
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
    public function it_gets_rates_list(): void
    {
        $rates = Rate::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.rates.index'));

        $response->assertOk()->assertSee($rates[0]->from);
    }

    /**
     * @test
     */
    public function it_stores_the_rate(): void
    {
        $data = Rate::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.rates.store'), $data);

        unset($data['room_id']);

        $this->assertDatabaseHas('rates', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_rate(): void
    {
        $rate = Rate::factory()->create();

        $hotel = Hotel::factory()->create();
        $room = Room::factory()->create();

        $data = [
            'adults' => $this->faker->numberBetween(0, 32767),
            'children' => $this->faker->numberBetween(0, 32767),
            'basis' => 'RO',
            'from' => $this->faker->date,
            'to' => $this->faker->date,
            'price' => $this->faker->randomNumber(1),
            'hotel_id' => $hotel->id,
            'room_id' => $room->id,
        ];

        $response = $this->putJson(route('api.rates.update', $rate), $data);

        unset($data['room_id']);

        $data['id'] = $rate->id;

        $this->assertDatabaseHas('rates', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_rate(): void
    {
        $rate = Rate::factory()->create();

        $response = $this->deleteJson(route('api.rates.destroy', $rate));

        $this->assertModelMissing($rate);

        $response->assertNoContent();
    }
}
