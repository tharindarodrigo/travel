<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => $this->faker->image(
                storage_path('app/public'),
                400,
                300,
                null,
                false
            ),
            'imageable_type' => $this->faker->randomElement([
                \App\Models\Hotel::class,
                \App\Models\Room::class,
            ]),
            'imageable_id' => function (array $item) {
                return app($item['imageable_type'])->factory();
            },
        ];
    }
}
