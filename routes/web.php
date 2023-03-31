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

/* Admin Routes */
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'can:admin']], function () {

    Route::resource('/categories', AdminCategoryController::class)->names('admin.categories')->except('create', 'edit');
    Route::resource('/products', AdminProductController::class)->names('admin.products')->except('create', 'edit');
    Route::resource('/portfolios', AdminPortfolioController::class)->names('admin.portfolios')->except('create', 'edit');
    Route::get('/', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');

    Route::post('/change-email', [AdminDashboardController::class, 'setEmailReceiver'])->name('admin.change-email');
    Route::post('/change-whatsapp', [AdminDashboardController::class, 'setWhatsappNumber'])->name('admin.change-whatsapp');
    Route::post('/change-phone', [AdminDashboardController::class, 'setPhoneNumber'])->name('admin.change-phone');
});

Route::get('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login')->middleware('admin');
/* Admin Routes End */

Route::post('/admin/login', [AdminLoginController::class, 'login']);

Auth::routes();

/* Category routes (being put here because of url design) */
Route::get('/{category}', [CategoryController::class, 'show'])->name('categories.show');
