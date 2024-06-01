<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\AboutUs;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Rules\StringOrFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     protected $model;
    protected $validated;
    protected $company;
     function profile(){
        $aboutUs = AboutUs::first();
        return response()->json($aboutUs, 201);
     }
    function assetify($about_us)
    {
        $about_us->image = asset("storage/" . $about_us->image);
        $about_us->video = asset("storage/" . $about_us->video);


        if ($about_us->srvices != null) {
            $about_us->srvices = $about_us->srvices->map(function ($img) {
                $img = asset('storage/' . $img);
                return $img;
            });
        }
        return $about_us;
    }


    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function setOrCleanField($field)
    {
        // Retrieve or set original field value
        if (is_string(request($field))) {
            $this->validated[$field] = request($field);
        }

        // Handle uploaded file scenario
        if (request()->hasFile($field)) {
            // Delete existing file if present
            $existingFile = $this->company->get($field);
            if ($existingFile) {
                Storage::disk('public')->delete($existingFile);
            }

            // Store new file
            $newPath = request()->file($field)->store('companies/images', 'direct_public');

            Log::info("Stored at path: " . $newPath);

            $this->validated[$field] = $newPath;
        }
    }

    public function store(Request $request)
    {

        $this->company = AboutUs::first();

            // Validate the request data
            $this->validated = $request->validate([
                'name' => 'required|string',
                'ar_name' => 'required|string',
                'type' => 'required|string',
                'ar_type' => 'required|string',
                'video' => ['required', new StringOrFile],
                'image' => ['nullable', new StringOrFile],
                'feature' => 'nullable|array',
                'feature.*.img' => ['nullable', new StringOrFile],
                'services' => 'nullable|array',
                'services.*.img' => ['nullable', new StringOrFile],
            ]);

            $this->setOrCleanField('image');
            $this->setOrCleanField('video');

            if (request()->has('feature')) {
                // get features assoc array with files
                $features = request('feature');
                // go throw features
                foreach ($features as $key => $feature) {
                    $this->validated['feature'][$key] = [
                        'title' => $feature['title'],
                        'ar_title' => $feature['ar_title'],
                    ];
                };
            }
            if (request()->has('services')) {
                // get features assoc array with files
                $services = request('services');
                // go throw features
                foreach ($services as $key => $service) {
                    // if new image uploaded set it
                    if ($service['img'] instanceof UploadedFile) {
                        $this->validated['services'][$key] = [
                            'title' => $service['title'],
                            'description' => $service['description'],
                            'ar_title' => $service['ar_title'],
                            'ar_description' => $service['ar_description'],
                            'img' => $service['img']->store('companies/services', 'public')
                        ];
                    }

                    // fix url if file not changed
                    if (is_string($service['img'])) {
                        $this->validated['services'][$key] = [
                            'title' => $service['title'],
                            'description' => $service['description'],
                            'ar_title' => $service['ar_title'],
                            'ar_description' => $service['ar_description'],
                            'img' => str_replace(config('app.url') . ':8000/storage/', '', $service['img'])
                        ];
                    }
                };
            }

            // Create or update the company profile
            $aboutUs = AboutUs::updateOrCreate(
                ['id' => 1], // Assuming there's only one AboutUs entry
                $this->validated
            );
            Log::error($aboutUs);
            return response()->json($aboutUs, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $about_us = AboutUs::first();
        $about_us->feature = json_decode($about_us->feature, true);
        $about_us->services = json_decode($about_us->services, true);
        $about_us = $this->assetify($about_us);
        return response()->json($about_us);
    }

    public function products_count()
    {
        $products_count = Product::count();
        return response()->json($products_count);
    }

    public function categories_count()
    {
        $categories_count = Category::count();
        return response()->json($categories_count);
    }

    public function blogs_count()
    {
        $blogs_count = Blog::count();
        return response()->json($blogs_count);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
