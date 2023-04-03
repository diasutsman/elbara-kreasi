<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminPortfolioController;

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

Route::get('/', [NavigationController::class, 'welcome'])->name('welcome');

Route::get('/about', [NavigationController::class, 'about'])->name('about');

Route::get('/order', [NavigationController::class, 'order'])->name('order');

Route::resource('/products', ProductController::class)->only('index', 'show');

Route::post('/email', [MailController::class, 'send'])->name('email');

Auth::routes();

/* Category routes (being put here because of url design) */
Route::get('/{category}', [CategoryController::class, 'show'])->name('categories.show');
