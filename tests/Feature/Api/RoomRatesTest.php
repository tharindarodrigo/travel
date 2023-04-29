<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Room;
use App\Models\Rate;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoomRatesTest extends TestCase
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
    public function it_gets_room_rates(): void
    {
        $room = Room::factory()->create();
        $rates = Rate::factory()
            ->count(2)
            ->create([
                'room_id' => $room->id,
            ]);

        $response = $this->getJson(route('api.rooms.rates.index', $room));

        $response->assertOk()->assertSee($rates[0]->from);
    }

    /**
     * @test
     */
    public function it_stores_the_room_rates(): void
    {
        $room = Room::factory()->create();
        $data = Rate::factory()
            ->make([
                'room_id' => $room->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.rooms.rates.store', $room),
            $data
        );

        unset($data['room_id']);

        $this->assertDatabaseHas('rates', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $rate = Rate::latest('id')->first();

        $this->assertEquals($room->id, $rate->room_id);
    }
}
