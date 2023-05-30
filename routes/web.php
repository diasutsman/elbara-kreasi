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
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PrintInvoiceController;

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

Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::resource('/products', ProductController::class)->only('index', 'show');

Route::resource('/portfolios', PortfolioController::class)->only('index');

Route::post('/email', [MailController::class, 'send'])->name('email');

Route::get('/print/{invoice}', PrintInvoiceController::class)->name('print');

Auth::routes();
