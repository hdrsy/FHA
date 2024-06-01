<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\BlogController;
use App\Http\Controllers\Dashboard\ReviewController;
use App\Http\Controllers\Dashboard\AboutUsController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('reviews',ReviewController::class);
Route::get('/product-categories-list',[CategoryController::class, 'list']);
Route::get('/blog-categories-list',[CategoryController::class, 'blog_list']);
Route::apiResource('products', ProductController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('services', ServiceController::class);
Route::apiResource('blogs', BlogController::class);
Route::apiResource('contacts', ContactController::class);
Route::apiResource('abouts', AboutUsController::class);
Route::get('/products_count', [AboutUsController::class,'products_count']);
Route::get('/categories_count', [AboutUsController::class,'categories_count']);
Route::get('/blogs_count', [AboutUsController::class,'blogs_count']);
Route::get('/profile', [AboutUsController::class,'profile']);
Route::get('/contact', [ContactController::class,'show']);


