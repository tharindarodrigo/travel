<?php

namespace Tests\Feature\Api;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HotelRoomsTest extends TestCase
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
    public function it_gets_hotel_rooms(): void
    {
        $hotel = Hotel::factory()->create();
        $rooms = Room::factory()
            ->count(2)
            ->create([
                'hotel_id' => $hotel->id,
            ]);

        $response = $this->getJson(route('api.hotels.rooms.index', $hotel));

        $response->assertOk()->assertSee($rooms[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_hotel_rooms(): void
    {
        $hotel = Hotel::factory()->create();
        $data = Room::factory()
            ->make([
                'hotel_id' => $hotel->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.hotels.rooms.store', $hotel),
            $data
        );

        $this->assertDatabaseHas('rooms', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $room = Room::latest('id')->first();

        $this->assertEquals($hotel->id, $room->hotel_id);
    }
}
