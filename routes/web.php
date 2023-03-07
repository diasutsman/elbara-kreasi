<?php

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminDashboardController;

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
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'can:admin']], function () {

  Route::resource('/categories', AdminCategoryController::class)->names('admin.categories');
  Route::resource('/products', AdminProductController::class)->names('admin.products');
  Route::get('/', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
});

Auth::routes();