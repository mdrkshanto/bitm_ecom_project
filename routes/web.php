<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EcomController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;

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
});
