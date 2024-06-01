<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    protected function assetify($service)
    {

        if ($service->video_cover != null) {
            $service->video_cover = asset("storage/" . $service->video_cover);
        }
        if ($service->avatar != null) {
            $service->avatar = asset("storage/" . $service->avatar);
        }

        if ($service->gallery != null) {
            $service->gallery = $service->gallery->map(function ($image) {
                $image = asset('storage/' . $image);

                return $image;
            });
        }

        if ($service->reviews != null) {
            $service->reviews = $service->reviews->map(function ($feature) {
                $feature['img'] = asset('storage/' . $feature['img']);

                return $feature;
            });
        }
        return $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::select('id', 'avatar', 'name')->paginate(12)->through(function ($service) {
            $service = $this->assetify($service);

            return $service;
        });

        return response()->json($services);
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
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string',
                'description' => 'required|string',
                'avatar' => 'required|image',
                'video_cover' => 'required|file',
                'reviews' => 'nullable|array',
                'reviews.*.img' => 'image',
                'gallery' => 'nullable',
                'gallery.*' => 'image',
            ]);

            $validated['avatar'] = $request->file('avatar')->store('services', 'public');
            $validated['video_cover'] = $request->file('video_cover')->store('services', 'public');

            $path = null;
            // Handle gallery images if necessary
            if ($request->hasFile('gallery')) {
                foreach ($request->file('gallery') as $image) {
                    // push to paths array && store to storage
                    $name = $image->store('services/gallery', 'public');
                    $path[] = $name;
                }
                $validated['gallery'] = $path;
            }
            // handling features
            if ($request->has('reviews')) {
                // get features assoc array with files
                $features = $request->all('reviews')['reviews'];
                // remove old features assoc array from validated
                unset($validated['reviews']);
                // go throw features
                foreach ($features as $feature) {
                    // add feature to validated array
                    $validated['reviews'][] = [
                        'name' => $feature['name'],
                        'comment' => $feature['comment'],
                        'img' => $feature['img']->store('services/features', 'public')
                    ];
                };
            }

            $service = Service::create($validated);

            return response()->json($service, 201);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = Service::find($id);


        return response()->json($service);
        //
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
        $service = Service::find($id);

        if (!$service) {
            return response()->json(['message' => 'service not found'], 404);
        }

        Storage::delete(['public/' . $service->avatar, 'public/' . $service->cover, 'public/' . $service->image_symbol, 'public/' . $service->offer_image]);

        $service->delete();
        return response()->json(['message' => 'Category deleted successfully']);
    }
}
