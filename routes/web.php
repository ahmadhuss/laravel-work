<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Services
Route::get('/services', function () {
    return view('services');
})->name('services');

// About
Route::get('/about', function () {
    return view('about');
})->name('about');

// Contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// We're repeating things. If there are same middleware and same logic we can group that.
// Route::resource('/categories', CategoryController::class)->middleware('auth');
// Route::resource('/products', ProductController::class)->middleware('auth');
Route::group(['middleware' => 'auth'], function(){
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});



// It will care of some auth routes located "vendor/laravel/ui/src/AuthRouteMethods.php" file.
Auth::routes();
