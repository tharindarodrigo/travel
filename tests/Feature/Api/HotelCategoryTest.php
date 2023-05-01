<?php

namespace Tests\Feature\Api;

use App\Models\HotelCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HotelCategoryTest extends TestCase
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
    public function it_gets_hotel_categories_list(): void
    {
        $hotelCategories = HotelCategory::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.hotel-categories.index'));

        $response->assertOk()->assertSee($hotelCategories[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_hotel_category(): void
    {
        $data = HotelCategory::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.hotel-categories.store'), $data);

        $this->assertDatabaseHas('hotel_categories', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_hotel_category(): void
    {
        $hotelCategory = HotelCategory::factory()->create();

        $data = [
            'name' => $this->faker->unique->name(),
        ];

        $response = $this->putJson(
            route('api.hotel-categories.update', $hotelCategory),
            $data
        );

        $data['id'] = $hotelCategory->id;

        $this->assertDatabaseHas('hotel_categories', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_hotel_category(): void
    {
        $hotelCategory = HotelCategory::factory()->create();

        $response = $this->deleteJson(
            route('api.hotel-categories.destroy', $hotelCategory)
        );

        $this->assertModelMissing($hotelCategory);

        $response->assertNoContent();
    }
}
