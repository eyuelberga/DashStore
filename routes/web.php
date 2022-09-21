<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreFrontController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StoreController;

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

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class,'index'])->name('dashboard');
    Route::post('/', [DashboardController::class,'switch_view'])->name('dashboard.switch_view');
    Route::resource('/users', UserController::class);
    Route::resource('/stores', StoreController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/products', ProductController::class);
    Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class,'index'])->name('orders.index');
        Route::get('/{order}', [OrderController::class,'show'])->name('orders.show');
        Route::patch('/{order}', [OrderController::class,'update'])->name('orders.update');
    });
});




Route::get('/{store:slug}', [StoreFrontController::class,'index'])->name('storefront.index');

 Route::prefix('store/{store:slug}')->group(function () {
     Route::prefix('cart')->group(function () {
         Route::get('/', [StoreFrontController::class,'cart'])->name('storefront.cart');
         Route::post('/', [StoreFrontController::class,'addToCart'])->name('storefront.add_cart');
         Route::patch('/{id}', [StoreFrontController::class,'updateCart'])->name('storefront.update_cart');
         Route::delete('/{id}', [StoreFrontController::class,'removeCart'])->name('storefront.remove_cart');
     });

     Route::prefix('checkout')->group(function () {
         Route::get('/', [StoreFrontController::class,'checkout'])->name('storefront.checkout');
         Route::post('/', [OrderController::class,'store'])->name('storefront.store_order');
     });

     Route::prefix('category')->group(function () {
         Route::get('/{category:slug}', [StoreFrontController::class,'category'])->name('storefront.category');
         Route::get('/{category:slug}/{product:slug}', [StoreFrontController::class,'categoryProduct'])->name('storefront.category_product');
     });

     Route::get('/{product:slug}', [StoreFrontController::class,'product'])->name('storefront.product');
 });

 Route::impersonate();