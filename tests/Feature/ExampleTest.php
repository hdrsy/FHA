<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Category;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_file_upload(): void
    {

        $file = UploadedFile::fake()->image('avatar.jpg');

        $category = Category::factory()->create();
        
        $response = $this->put('/api/categories/'.$category->id, [
            'avatar' => $file,
        ]);

        $response->assertStatus(201);
        Storage::disk('public')->assertExists(public_path('storage/'.$file->hashName()));
    }
}
