<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    $categories = Category::latest()->with('products')->get();
    return view('home', ['categories' => $categories]);
})->name('home');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware('auth')->name('dashboard');


/*
|--------------------------------------------------------------------------
| Categories Routes
|--------------------------------------------------------------------------
*/

Route::resource('categories', CategoryController::class)
    ->only('index')->middleware('auth');
Route::resource('categories.products', ProductController::class)
    ->only('index')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Products Routes
|--------------------------------------------------------------------------
*/
Route::resource('products', ProductController::class)->middleware('auth');

require __DIR__.'/auth.php';
