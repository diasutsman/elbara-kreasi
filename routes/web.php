<?php

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

Route::resource('/category', CategoryController::class)
  ->name('show', 'category.products');

/* Admin Routes */
Route::group(['prefix' => 'admin'], function () {

  Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
  Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
  Route::get('/categories', [AdminController::class, 'categories'])->name('admin.categories');
});
