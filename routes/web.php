<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\MainController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'main'])->name('main');
Route::get('/details_category/{id}', [MainController::class, 'details_category'])->name('details_category');
Route::get('/details_blog_category/{id}', [MainController::class, 'details_blog_category'])->name('details_blog_category');
Route::get('/details_service/{id}', [MainController::class, 'details_service'])->name('details_service');
Route::get('/products', [MainController::class, 'products'])->name('products');
Route::get('/details_product/{id}', [MainController::class, 'details_product'])->name('details_product');
Route::get('/blog', [MainController::class, 'blog'])->name('blog');
Route::get('/bolg_details/{id}', [MainController::class, 'details_blogs'])->name('bolg_details');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');
Route::get('faq',[MainController::class,'faq'])->name('faq');

Route::get('/products/sort/{sort}', [MainController::class,'sort']);
Route::get('/products/sort/{cat_id}/{sort}', [MainController::class,'sortProducts']);



Route::get('/index', function () {
    return view('index');
});
Route::get('/category', function () {
    return view('category');
})->name('category');

Route::get('/service', function () {
    return view('service');
})->name('service');

Route::get('/about_us', function () {
    return view('about_us');
})->name('about_us');




Route::get('/article', function () {
    return view('article');
})->name('article');
Route::get('language/{lang}',  [LanguageController::class,'switchLang'])->name('switchLang');
