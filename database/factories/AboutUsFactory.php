<?php

namespace Database\Factories;

use App\Models\AboutUs;
use Illuminate\Database\Eloquent\Factories\Factory;

class AboutUsFactory extends Factory
{

    protected $model = AboutUs::class;
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'type' => $this->faker->word,
            'ar_name' => $this->faker->company,
            'ar_type' => $this->faker->word,
            'video' => 'videos/example_video.mp4',
            'image' => 'images/example_image.jpg',
            'feature' => json_encode([['title' => 'Company features','ar_title'=>'ميزات الشركة']]),
            'services' => json_encode([
                ['title' => $this->faker->word, 'description' => $this->faker->paragraph,'ar_title' => $this->faker->word, 'ar_description' => $this->faker->paragraph, 'img' => 'images/service_example_image.jpg']
            ])
        ];
    }
}
