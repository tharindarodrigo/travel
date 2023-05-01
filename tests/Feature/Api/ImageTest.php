<?php

namespace Tests\Feature\Api;

use App\Models\Image;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ImageTest extends TestCase
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
    public function it_gets_images_list(): void
    {
        $images = Image::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.images.index'));

        $response->assertOk()->assertSee($images[0]->image);
    }

    /**
     * @test
     */
    public function it_stores_the_image(): void
    {
        $data = Image::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.images.store'), $data);

        $this->assertDatabaseHas('images', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_image(): void
    {
        $image = Image::factory()->create();

        $data = [
            'image' => $this->faker->image(
                storage_path('app/public'),
                400,
                300,
                null,
                false
            ),
        ];

        $response = $this->putJson(route('api.images.update', $image), $data);

        $data['id'] = $image->id;

        $this->assertDatabaseHas('images', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_image(): void
    {
        $image = Image::factory()->create();

        $response = $this->deleteJson(route('api.images.destroy', $image));

        $this->assertModelMissing($image);

        $response->assertNoContent();
    }
}
