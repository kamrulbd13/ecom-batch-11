<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\websiteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
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

//Setting

    Route::resources([
        'categories'    =>CategoryController::class,
        'subCategories' =>SubCategoryController::class,
        'brand'         =>BrandController::class,
    ]);

//    product module
    Route::get('/product',[ProductController::class,'index'])->name('product.index');
    Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
    Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
    Route::get('/product/details/{id}',[ProductController::class,'details'])->name('product.details');
    Route::get('/product/status/{id}',[ProductController::class,'status'])->name('product.status');
    Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::get('/product/destroy/{id}',[ProductController::class,'destroy'])->name('product.destroy');
});
