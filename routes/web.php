<?php

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminPortfolioController;
use App\Http\Controllers\MailController;

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

Route::resource('/products', ProductController::class);

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/how-to-order', function () {
    return view('order');
})->name('order');

Route::post('/email', [MailController::class, 'send'])->name('email');

/* Admin Routes */
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'can:admin']], function () {

    Route::resource('/categories', AdminCategoryController::class)->names('admin.categories');
    Route::resource('/products', AdminProductController::class)->names('admin.products');
    Route::resource('/portfolios', AdminPortfolioController::class)->names('admin.portfolios');
    Route::get('/', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
});

Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login')->middleware('admin');

Route::post('/admin/login', [AdminLoginController::class, 'login']);

Auth::routes();

/* Category routes (being put here because of url design) */
Route::get('/{category}', [CategoryController::class, 'show'])->name('categories.show');
