<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\websiteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\DashboardController;


Route::get('/',[websiteController::class, 'index'])->name('home');

//product
Route::get('/product',[ProductController::class, 'index'])->name('product');
Route::get('/product/details',[ProductController::class, 'productDetails'])->name('product.details');

//card
Route::get('/cart',[CartController::class, 'index'])->name('cart');
Route::get('/checkout',[CartController::class, 'checkout'])->name('checkout');

//customer
Route::get('/customer/register',[CustomerController::class, 'register'])->name('customer.register');
Route::get('/customer/login',[CustomerController::class, 'login'])->name('customer.login');





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {


//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

//category
    Route::resources(['categories'=>CategoryController::class]);
//Sub-Category
    Route::resources(['Sub-Categories'=>SubCategoryController::class]);
});
