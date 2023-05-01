<?php

namespace Tests\Feature\Controllers;

use App\Models\HotelCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HotelCategoryControllerTest extends TestCase
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
    public function it_displays_index_view_with_hotel_categories(): void
    {
        $hotelCategories = HotelCategory::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('hotel-categories.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.hotel_categories.index')
            ->assertViewHas('hotelCategories');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_hotel_category(): void
    {
        $response = $this->get(route('hotel-categories.create'));

        $response->assertOk()->assertViewIs('app.hotel_categories.create');
    }

    /**
     * @test
     */
    public function it_stores_the_hotel_category(): void
    {
        $data = HotelCategory::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('hotel-categories.store'), $data);

        $this->assertDatabaseHas('hotel_categories', $data);

        $hotelCategory = HotelCategory::latest('id')->first();

        $response->assertRedirect(
            route('hotel-categories.edit', $hotelCategory)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_hotel_category(): void
    {
        $hotelCategory = HotelCategory::factory()->create();

        $response = $this->get(route('hotel-categories.show', $hotelCategory));

        $response
            ->assertOk()
            ->assertViewIs('app.hotel_categories.show')
            ->assertViewHas('hotelCategory');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_hotel_category(): void
    {
        $hotelCategory = HotelCategory::factory()->create();

        $response = $this->get(route('hotel-categories.edit', $hotelCategory));

        $response
            ->assertOk()
            ->assertViewIs('app.hotel_categories.edit')
            ->assertViewHas('hotelCategory');
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

        $response = $this->put(
            route('hotel-categories.update', $hotelCategory),
            $data
        );

        $data['id'] = $hotelCategory->id;

        $this->assertDatabaseHas('hotel_categories', $data);

        $response->assertRedirect(
            route('hotel-categories.edit', $hotelCategory)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_hotel_category(): void
    {
        $hotelCategory = HotelCategory::factory()->create();

        $response = $this->delete(
            route('hotel-categories.destroy', $hotelCategory)
        );

        $response->assertRedirect(route('hotel-categories.index'));

        $this->assertModelMissing($hotelCategory);
    }
}
