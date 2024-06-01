<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $path = store_asset('categories', 'gallery.jpg');
        $symboles = [$path, $path, $path, $path];
        return [
            'image' => $path,
            'title' => fake()->sentence(),
            'author' => fake()->userName(),
            'ar_title' => fake()->sentence(),
            'ar_author' => fake()->userName(),
            'cover' => $path,
            'article' => fake()->sentence(40),
            'ar_article' => fake()->sentence(40),
            'images' => fake()->randomElements($symboles),
        ];
    }
}
