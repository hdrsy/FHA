<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $path = store_asset('categories/', 'gallery.jpg');
        $symboles = [$path, $path, $path, $path];

        return [
            'name' => fake()->word(),
            'ar_name' => fake()->word(),
            'price' => fake()->numberBetween(10, 100),
            'desc' => fake()->sentence(),
            'ar_desc' => fake()->sentence(),
            'image' => $path,
            'image_cover' => $path,
            'details' => fake()->randomElements($symboles),
            'ar_details' => fake()->randomElements($symboles),
            'category_id' => fake()->numberBetween(1, 10),
        ];
    }
}
