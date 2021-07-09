<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExchangeRequestController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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
    $categories = Category::latest()->take(3)->with(['products' => function($q) {
        $q->orderBy('updated_at', 'desc');
    }])->get();
    return view('home', ['categories' => $categories]);
})->name('home');



/*
|--------------------------------------------------------------------------
| Categories Routes
|--------------------------------------------------------------------------
*/

Route::resource('categories', CategoryController::class)
    ->only('index');
Route::get('/categories/{category}/products', [CategoryController::class, 'show'])
    ->name('categories.products.index')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Products Routes
|--------------------------------------------------------------------------
*/
Route::resource('products', ProductController::class);;

/*
|--------------------------------------------------------------------------
| Exchange Requests Routes
|--------------------------------------------------------------------------
*/
Route::resource('requests', ExchangeRequestController::class)->only(['index']);
Route::resource('products.requests', ExchangeRequestController::class)
    ->only(['store', 'create']);

require __DIR__.'/auth.php';
