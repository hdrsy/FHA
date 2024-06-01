<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;




/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
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
        $features = [
            [
                'title' => fake()->word(),
                'description' => fake()->sentence(),
                'img' => $path
            ],
            [
                'title' => fake()->word(),
                'description' => fake()->sentence(),
                'img' => $path
            ],

            [
                'title' => fake()->word(),
                'description' => fake()->sentence(),
                'img' => $path
            ],

            [
                'title' => fake()->word(),
                'description' => fake()->sentence(),
                'img' => $path
            ],

            [
                'title' => fake()->word(),
                'description' => fake()->sentence(),
                'img' => $path
            ],

            [
                'title' => fake()->word(),
                'description' => fake()->sentence(),
                'img' => $path
            ],
        ];

        $ar_features = [
            [
                'title' => fake()->word(),
                'description' => fake()->sentence(),
                'img' => $path
            ],
            [
                'title' => fake()->word(),
                'description' => fake()->sentence(),
                'img' => $path
            ],

            [
                'title' => fake()->word(),
                'description' => fake()->sentence(),
                'img' => $path
            ],

            [
                'title' => fake()->word(),
                'description' => fake()->sentence(),
                'img' => $path
            ],

            [
                'title' => fake()->word(),
                'description' => fake()->sentence(),
                'img' => $path
            ],

            [
                'title' => fake()->word(),
                'description' => fake()->sentence(),
                'img' => $path
            ],
        ];

        return [
            'avatar' => $path,
            'cover' => $path,
            'features' => fake()->randomElements($features),
            'details' => fake()->sentence(),
            'ar_details' => fake()->sentence(),
            'image_symbol' => $path,
            'gallery' => fake()->randomElements($symboles),
            'description' => fake()->sentence(),
            'ar_description' => fake()->sentence(),
            'offer_title' => fake()->word(),
            'ar_offer_title' => fake()->word(),
            'offer_image' => $path,
        ];
    }
}
