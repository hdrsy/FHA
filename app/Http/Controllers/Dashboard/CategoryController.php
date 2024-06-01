<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Rules\StringOrFile;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{

    protected $model;
    protected $validated;
    protected $original;

    function assetify($category, $handleFeatures = false)
    {
        $category->avatar = asset("storage/" . $category->avatar);
        $category->cover = asset("storage/" . $category->cover);

        if ($category->offer_image != null) {
            $category->offer_image = asset("storage/" . $category->offer_image);
        }
        if ($category->image_symbol != null) {
            $category->image_symbol = asset("storage/" . $category->image_symbol);
        }

        if ($category->gallery != null) {
            $category->gallery = $category->gallery->map(function ($image) {
                $image = asset('storage/' . $image);
                return $image;
            });
        }
        if ($handleFeatures && $category->features != null) {
            $category->features = $category->features->map(function ($feature) {
                $feature['img'] = asset('storage/' . $feature['img']);
                return $feature;
            });
        }
        return $category;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(12)->through(function ($category) {
            $category = $this->assetify($category);
            return $category;
        });

        return response()->json($categories);
    }

    public function list()
    {
        $categories = Category::where('type','product')->select('id', 'description')->get();
        return response()->json($categories);
    }

    public function blog_list()
    {
        $categories = Category::where('type','blog')->select('id', 'description')->get();
        return response()->json($categories);
    }

    public function show($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category = $this->assetify($category, true);

        return response()->json($category);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        Storage::delete(['public/' . $category->avatar, 'public/' . $category->cover, 'public/' . $category->image_symbol, 'public/' . $category->offer_image]);

        $category->delete();
        return response()->json(['message' => 'Category deleted successfully']);
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
                'avatar' => 'required|image',
                'cover' => 'required|image',
                'features' => 'nullable|array',
                'features.*.img' => 'image',
                'details' => 'nullable|string',
                'ar_details' => 'nullable|string',
                'image_symbol' => 'nullable|image',
                'gallery' => 'nullable',
                'gallery.*' => 'image',
                'description' => 'required',
                'offer_title' => 'nullable|string',
                'ar_description' => 'required',
                'ar_offer_title' => 'nullable|string',
                'offer_image' => 'nullable|image',
                'type' => 'string|in:product,blog',
            ]);

            $validated['avatar'] = $request->file('avatar')->store('categories', 'public');
            $validated['cover'] = $request->file('cover')->store('categories', 'public');

            if ($request->hasFile('offer_image')) {
                $validated['offer_image'] = $request->file('offer_image')->store('categories/offers', 'public');
            }
            if ($request->hasFile('image_symbol')) {
                $validated['image_symbol'] = $request->file('image_symbol')->store('categories/symbols', 'public');
            }


            $path = null;
            // Handle gallery images if necessary
            if ($request->hasFile('gallery')) {
                foreach ($request->file('gallery') as $image) {
                    // push to paths array && store to storage
                    $name = $image->store('categories/gallery', 'public');
                    $path[] = $name;
                }
                $validated['gallery'] = $path;
            }
            // handling features
            if ($request->has('features')) {
                // get features assoc array with files
                $features = $request->all('features')['features'];
                // remove old features assoc array from validated
                unset($validated['features']);
                // go throw features
                foreach ($features as $feature) {
                    // add feature to validated array
                    $validated['features'][] = [
                        'title' => $feature['title'],
                        'description' => $feature['description'],
                        'ar_title' => $feature['ar_title'],
                        'ar_description' => $feature['ar_description'],
                        'img' => $feature['img']->store('categories/features', 'public')
                    ];
                }

            }

            $category = Category::create($validated);

            return response()->json($category, 201);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function setOrCleanField($field)
    {
        if (is_string(request($field))) {
            $this->validated[$field] = $this->original->{$field};
        }
        if (request()->hasFile($field)) {
            Storage::delete('public/' . $this->original->get($field));
            $this->validated[$field] = request()->file($field)->store('categories', 'public');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        // fetch original model
        $this->original = Category::find($id);
        // check original existance
        if (!$this->original) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        // fetch user input from edit page
        $this->validated = request()->validate([
            'description' => 'nullable|string|max:10000', // Allows long text up to 10,000 characters
            'details' => 'nullable|string|max:10000',
            'offer_title' => 'nullable|string|max:10000',
            'ar_description' => 'nullable|string|max:10000',
            'ar_details' => 'nullable|string|max:10000',
            'ar_offer_title' => 'nullable|string|max:10000',
            // string or file rule check if input field is string or file
            'offer_image' => ['nullable', new StringOrFile],
            'avatar' => ['nullable', new StringOrFile],
            'cover' => ['nullable', new StringOrFile],
            'image_symbol' => ['nullable', new StringOrFile],
            'gallery' => 'nullable|array',
            'gallery.*' => ['nullable', new StringOrFile],
            'features' => 'nullable|array',
            'features.*.img' => [new StringOrFile],

        ]);

        // set file fields by helper method
        $this->setOrCleanField('avatar');
        $this->setOrCleanField('cover');
        $this->setOrCleanField('offer_image');
        $this->setOrCleanField('image_symbol');

        // Handle gallery images if exist as files or ignore
        if (request()->has('gallery')) {
            $path = [];
            foreach (request('gallery') as $image) {
                if ($image instanceof UploadedFile) {
                    // push to paths array && store to storage
                    $name = $image->store('categories/gallery', 'public');
                    $path[] = $name;
                }
                if (is_string($image)) {
                    $path[] = str_replace(config('app.url') . ':8000/storage/', '', $image);
                }
            }
            $this->validated['gallery'] = $path;
        }
        // handling features
        if (request()->has('features')) {
            // get features assoc array with files
            $features = request('features');
            // go throw features
            foreach ($features as $key => $feature) {
                // if new image uploaded set it
                if ($feature['img'] instanceof UploadedFile) {
                    // add feature to validated array
                    $this->validated['features'][$key] = [
                        'title' => $feature['title'],
                        'description' => $feature['description'],
                        'ar_title' => $feature['ar_title'],
                        'ar_description' => $feature['ar_description'],
                        'img' => $feature['img']->store('categories/features', 'public')
                    ];
                }
                // fix url if file not changed
                if (is_string($feature['img'])) {
                    $this->validated['features'][$key] = [
                        'title' => $feature['title'],
                        'description' => $feature['description'],
                        'ar_title' => $feature['ar_title'],
                        'ar_description' => $feature['ar_description'],
                        'img' => str_replace(config('app.url') . ':8000/storage/', '', $image)
                    ];
                }
            };
        }

        $this->original->fill($this->validated);
        $this->original->save();

        return response()->json($this->original, 201);
    }
}
