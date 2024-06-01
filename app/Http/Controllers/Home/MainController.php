<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Service;

class MainController extends Controller
{
    public function main()
    {
        $categories = Category::take('4')->get();
        $products = Product::take('6')->get();
        $services = Service::take('3')->get();
        $abouts = AboutUs::first();
        $contact = Contact::first();
        return view('index', compact('categories', 'products', 'services', 'abouts', 'contact'));
    }

    public function sort($sort)
    {
        switch ($sort) {
            case 'az':
                $products = Product::orderBy('name', 'asc')->simplePaginate(3);
                break;
            case 'za':
                $products = Product::orderBy('name', 'desc')->simplePaginate(3);
                break;
            case 'low_high':
                $products = Product::orderBy('price', 'asc')->simplePaginate(3);
                break;
            case 'high_low':
                $products = Product::orderBy('price', 'desc')->simplePaginate(3);
                break;
            case 'new_old':
                $products = Product::orderBy('created_at', 'desc')->simplePaginate(3);
                break;
            case 'old_new':
                $products = Product::orderBy('created_at', 'asc')->simplePaginate(3);
                break;
            default:
                $products = Product::simplePaginate(3);
        }

        return response()->json(['products' => $products]);
    }
    public function sortProducts($cat_id, $sort)
    {
        switch ($sort) {
            case 'az':
                $products = Product::where('category_id', $cat_id)->orderBy('name', 'asc')->simplePaginate(3);
                break;
            case 'za':
                $products = Product::where('category_id', $cat_id)->orderBy('name', 'desc')->simplePaginate(3);
                break;
            case 'low_high':
                $products = Product::where('category_id', $cat_id)->orderBy('price', 'asc')->simplePaginate(3);
                break;
            case 'high_low':
                $products = Product::where('category_id', $cat_id)->orderBy('price', 'desc')->simplePaginate(3);
                break;
            case 'new_old':
                $products = Product::where('category_id', $cat_id)->orderBy('created_at', 'desc')->simplePaginate(3);
                break;
            case 'old_new':
                $products = Product::where('category_id', $cat_id)->orderBy('created_at', 'asc')->simplePaginate(3);
                break;
            default:
                $products = Product::where('category_id', $cat_id)->simplePaginate(3);
        }

        return response()->json(['products' => $products]);
    }

    public function faq()
    {
        return view('faq');
    }

    public function details_category($id)
    {
        $category = Category::with(['products'])->withCount('products')->findOrFail($id);
        $category->features = json_decode($category->features, true);
        $category->gallery = json_decode($category->gallery, true);


        $minPrice = $category->products->min('price');
        $maxPrice = $category->products->max('price');
        // Return the view with the category details and price range
        return view('category', compact('category', 'minPrice', 'maxPrice'));
    }
    public function details_blog_category($id)
    {
        $category = Category::with(['blogs'])->withCount('blogs')->findOrFail($id);
        $category->features = json_decode($category->features, true);
        $category->gallery = json_decode($category->gallery, true);

        // Return the view with the category details and price range
        return view('blogs_category', compact('category'));
    }
    public function details_service($id)
    {
        $service = Service::findOrFail($id);
        $service->reviews = json_decode($service->reviews, true);
        $service->gallery = json_decode($service->gallery, true);
        return view('service', compact('service'));
    }
    public function details_product($id)
    {
        $product = Product::findOrFail($id);

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->take(3)
            ->get();

        // Return the view with the product and related products
        return view('details_product', compact('product', 'relatedProducts'));
    }
    public function products()
    {
        $products = Product::take('6')->get();
        return view('products', compact('products'));
    }
    public function blog()
    {
        $new_blogs = Blog::latest()->take(3)->get();
        // Assuming $new_blogs holds the first two blogs
        $exclude_ids = $new_blogs->pluck('id');

        $more_blogs = Blog::latest()
            ->whereNotIn('id', $exclude_ids)
            ->take(2)
            ->get();
        $abouts = AboutUs::first();
        $blogs = Blog::take('6')->get();
        // Fetch a random category
        $category = Category::where('type','blog')->inRandomOrder()->first();

        // Fetch three random blogs from this category, if category exists
        $blogs = collect(); // Initialize as empty collection
        if ($category) {
            $category_blogs = $category->blogs()->inRandomOrder()->take(3)->get();
            return view('blog', compact('blogs', 'new_blogs', 'abouts', 'more_blogs','category','category_blogs'));
        }

        return view('blog', compact('blogs', 'new_blogs', 'abouts', 'more_blogs','category'));
    }

    public function details_blogs($id)
    {
        $blog = Blog::with('category')->findOrFail($id);
        // Get the next blog by creation time
        $nextBlog = Blog::where('created_at', '>', $blog->created_at)->orderBy('created_at', 'asc')->first();

        // Get the previous blog by creation time
        $previousBlog = Blog::where('created_at', '<', $blog->created_at)->orderBy('created_at', 'desc')->first();
        $randomBlogs = Blog::where('id', '!=', $blog->id)
            ->inRandomOrder()
            ->take(3)
            ->get();
        return view('article', compact('blog', 'nextBlog', 'previousBlog', 'randomBlogs'));
    }
    public function contact()
    {
        // $blog=Blog::findOrFail($id);
        $abouts = AboutUs::first();
        $contact = Contact::first();
        return view('contact', compact('abouts', 'contact'));
    }


}
