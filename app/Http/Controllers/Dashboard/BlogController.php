<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Rules\StringOrFile;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    protected $model;
    protected $validated;
    protected $blog;
    protected function assetify($blog)
    {
        $blog->image =  asset("storage/" . $blog->image);
        $blog->cover =  asset("storage/" . $blog->cover);

        if ($blog->images != null) {
            $blog->images = $blog->images->map(function ($image) {
                $image = asset('storage/' . $image);

                return $image;
            });
        }

        return $blog;
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::paginate(12)->through(function ($blog) {
            $blog = $this->assetify($blog);
            return $blog;
        });

        return response()->json($blogs);
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
                'author' => 'required|string',
                'ar_author' => 'required|string',
                'title' => 'required|string',
                'article' => 'required|string',
                'ar_title' => 'required|string',
                'ar_article' => 'required|string',
                'image' => 'required|image',
                'cover' => 'required|image',
                'images' => 'nullable',
                'images.*' => 'image',
                'category_id' => 'required|exists:categories,id'
            ]);

            $validated['image'] = $request->file('image')->store('blogs/images', 'public');
            $validated['cover'] = $request->file('cover')->store('blogs/images', 'public');

            $validated['article'] = strip_tags($validated['article']);
            $validated['ar_article'] = strip_tags($validated['ar_article']);
            $path = null;
            // Handle gallery images if necessary
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    // push to paths array && store to storage
                    $name = $image->store('blogs/gallery', 'public');
                    $path[] = $name;
                }
                $validated['images'] = $path;
            }

            $category = Blog::create($validated);

            return response()->json($category, 201);
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
        $blog = Blog::find($id);

        if (!$blog) {
            return response()->json(['message' => 'Blog not found'], 404);
        }
        $blog = $this->assetify($blog);

        return response()->json($blog);
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

     public function setOrCleanField($field)
{
    // Retrieve or set original field value
    if (is_string(request($field))) {
        $this->validated[$field] = request($field);
    }

    // Handle uploaded file scenario
    if (request()->hasFile($field)) {
        // Delete existing file if present
        $existingFile = $this->blog->get($field);
        if ($existingFile) {
            Storage::disk('public')->delete($existingFile);
        }

        // Store new file
        $newPath = request()->file($field)->store('blogs/images', 'public');
        $this->validated[$field] = $newPath;
    }
}


    public function update(Request $request, string $id)
    {
        $this->blog = Blog::findOrFail($id);
        try {
            $this->validated = $request->validate([
                'author' => 'nullable|string',
                'ar_author' => 'nullable|string',
                'title' => 'nullable|string',
                'article' => 'nullable|string',
                'ar_title' => 'nullable|string',
                'ar_article' => 'nullable|string',
                'image' => ['nullable', new StringOrFile],
                'cover' => ['nullable', new StringOrFile],
                'images' => 'nullable|array',
                'images.*' => ['nullable', new StringOrFile],
                'category_id' => 'required|exists:categories,id'
            ]);

            $this->setOrCleanField('image');
            $this->setOrCleanField('cover');

            if (request()->has('images')) {
                $path = [];
                foreach (request('images') as $image) {
                    if ($image instanceof UploadedFile) {
                        // push to paths array && store to storage
                        $name = $image->store('blogs/gallery', 'public');
                        $path[] = $name;
                    }
                    if (is_string($image)) {
                        $path[] = str_replace(config('app.url') . ':8000/storage/', '', $image);
                    }
                }
                $this->validated['images'] = $path;
            }

            $this->validated['article'] = strip_tags($this->validated['article']);
            $this->validated['ar_article'] = strip_tags($this->validated['ar_article']);


            $this->blog->fill($this->validated);
            $this->blog->save();
            return response()->json($this->blog, 201);
        } catch (\Exception $e) {

            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $blog = Blog::find($id);
        if (!$blog) {
            return response()->json(['message' => 'blog not found'], 404);
        }

        Storage::delete(['public/' . $blog->avatar, 'public/' . $blog->cover]);

        $blog->delete();
        return response()->json(['message' => 'blog deleted successfully']);
    }
}
