<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EcomController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(EcomController::class)->group(function (){
    Route::get('/','index')->name('home');
    Route::get('/category-products/{slug}','category')->name('category.products');
    Route::get('/subcategory-products/{slug}','subcategory')->name('subcategory.products');
    Route::get('/shop','shop')->name('shop');
    Route::get('/product-detail/{slug}','productDetail')->name('product.detail');
});

Route::controller(CartController::class)->group(function (){
    Route::get('/cart','index')->name('cart');
    Route::post('/add-to-cart/{id}','add')->name('add.cart');
    Route::get('/add-to-cart/{slug}','addSingleProduct')->name('add.single.cart');
    Route::post('/update-cart/{id}','update')->name('update.cart');
    Route::get('/remove-cart-item/{id}','delete')->name('delete.cart');
});

Route::controller(CheckoutController::class)->group(function (){
    Route::get('/checkout','index')->name('checkout.index');
    Route::post('/cash-order','newOrder')->name('cash.order');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::resource('category',CategoryController::class)->parameters(['category'=>'category:slug']);
    Route::resource('subcategory',SubcategoryController::class)->parameters(['subcategory'=>'subcategory:slug']);
    Route::resource('brand',BrandController::class)->parameters(['brand'=>'brand:slug']);
    Route::resource('unit',UnitController::class)->parameters(['unit'=>'unit:slug']);
    Route::resource('product',ProductController::class)->parameters(['product'=>'product:slug']);
    Route::controller(ProductController::class)->group(function (){
        Route::get('/get-subcategory-by-category','getSubcategoryByCategory')->name('getSubcategoryByCategory');
    });
});
