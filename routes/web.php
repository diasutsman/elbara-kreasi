<?php

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome', [
        'categories' => Category::all(),
        'products' => Product::where('is_best_seller', 1)->get(),
    ]);
});

/* Admin Routes */
Route::get('/admin', function () {
  return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/{category}', [CategoryController::class, 'productsByCategory'])->name('category.products');