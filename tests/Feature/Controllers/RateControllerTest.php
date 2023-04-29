<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Rate;

use App\Models\Room;
use App\Models\Hotel;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RateControllerTest extends TestCase
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
    public function it_displays_index_view_with_rates(): void
    {
        $rates = Rate::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('rates.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.rates.index')
            ->assertViewHas('rates');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_rate(): void
    {
        $response = $this->get(route('rates.create'));

        $response->assertOk()->assertViewIs('app.rates.create');
    }

    /**
     * @test
     */
    public function it_stores_the_rate(): void
    {
        $data = Rate::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('rates.store'), $data);

        unset($data['room_id']);

        $this->assertDatabaseHas('rates', $data);

        $rate = Rate::latest('id')->first();

        $response->assertRedirect(route('rates.edit', $rate));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_rate(): void
    {
        $rate = Rate::factory()->create();

        $response = $this->get(route('rates.show', $rate));

        $response
            ->assertOk()
            ->assertViewIs('app.rates.show')
            ->assertViewHas('rate');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_rate(): void
    {
        $rate = Rate::factory()->create();

        $response = $this->get(route('rates.edit', $rate));

        $response
            ->assertOk()
            ->assertViewIs('app.rates.edit')
            ->assertViewHas('rate');
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

        $response = $this->put(route('rates.update', $rate), $data);

        unset($data['room_id']);

        $data['id'] = $rate->id;

        $this->assertDatabaseHas('rates', $data);

        $response->assertRedirect(route('rates.edit', $rate));
    }

    /**
     * @test
     */
    public function it_deletes_the_rate(): void
    {
        $rate = Rate::factory()->create();

        $response = $this->delete(route('rates.destroy', $rate));

        $response->assertRedirect(route('rates.index'));

        $this->assertModelMissing($rate);
    }
}
