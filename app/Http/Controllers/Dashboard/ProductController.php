<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class ProductController extends Controller
{
    protected function assetify($product)
    {
        $product->image = $product->image ? asset('storage/' . $product->image) : null;
        $product->image_cover = $product->image_cover ? asset('storage/' . $product->image_cover) : null;
        // if ($product->details != null) {
        //     $product->details = $product->details->map(function ($image) {
        //         $image = asset('storage/' . $image);

        //         return $image;
        //     });
        // }

        return $product;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->paginate(12)->through(function ($product) {
            $product = $this->assetify($product);
            return $product;
        });

        return response()->json($products);
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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'ar_name' => 'required|string|max:255',
            'price' => 'required|integer',
            'desc' => 'required|string',
            'ar_desc' => 'required|string',
            'image' => 'required|image',
            'image_cover' => 'required|image',
            'details' => 'required|string',
            'ar_details' => 'required|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validatedData['image'] = $imagePath;
        }

        if ($request->hasFile('image_cover')) {
            $imageCoverPath = $request->file('image_cover')->store('products', 'public');
            $validatedData['image_cover'] = $imageCoverPath;
        }
        $path = null;

        $product = new Product();
        $product->fill($validatedData);
        $product->save();
        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product = $this->assetify($product);

        return response()->json($product);
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
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'ar_name' => 'string|max:255',
            'price' => 'integer',
            'desc' => 'string',
            'ar_desc' => 'string',
            'image' => 'image|nullable',
            'image_cover' => 'image|nullable',
            'details' => 'string',
            'ar_details' => 'string',
            'category_id' => 'exists:categories,id'
        ]);

        // Handle Image Upload
        if ($request->hasFile('image')) {
            // Delete old image
            Storage::delete($product->image);

            // Store new image
            $imagePath = $request->file('image')->store('products', 'public');
            $validatedData['image'] = $imagePath;
        }

        if ($request->hasFile('image_cover')) {
            // Delete old image cover
            Storage::delete($product->image_cover);

            // Store new image cover
            $imageCoverPath = $request->file('image_cover')->store('products', 'public');
            $validatedData['image_cover'] = $imageCoverPath;
        }

        $product->update($validatedData);

        return response()->json($product);
    }


    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Delete images if they exist
        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }
        if ($product->image_cover) {
            Storage::delete('public/' . $product->image_cover);
        }

        // Delete the product
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
