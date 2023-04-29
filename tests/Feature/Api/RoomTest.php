<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Room;

use App\Models\Hotel;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoomTest extends TestCase
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
    public function it_gets_rooms_list(): void
    {
        $rooms = Room::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.rooms.index'));

        $response->assertOk()->assertSee($rooms[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_room(): void
    {
        $data = Room::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.rooms.store'), $data);

        $this->assertDatabaseHas('rooms', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_room(): void
    {
        $room = Room::factory()->create();

        $hotel = Hotel::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'count' => 0,
            'is_active' => $this->faker->boolean,
            'description' => $this->faker->text,
            'hotel_id' => $hotel->id,
        ];

        $response = $this->putJson(route('api.rooms.update', $room), $data);

        $data['id'] = $room->id;

        $this->assertDatabaseHas('rooms', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_room(): void
    {
        $room = Room::factory()->create();

        $response = $this->deleteJson(route('api.rooms.destroy', $room));

        $this->assertModelMissing($room);

        $response->assertNoContent();
    }
}
