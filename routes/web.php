<?php

use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

    Route::get('/', function () {
        return view('home')->name('homepage');
    });

    // ROUTE DES CATEGORIES
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/','index')->name('category.list');
        Route::get('/category/{slug}','getBrands')->name('getBrands');
        
    });

    // ROUTE DES PRODUITS
    Route::controller(ProductController::class)->group(function(){
        Route::get('/products','index')->name('product.list');
        Route::get('/products/{slug}','show')->name('product.show');
        
    });

    // Route vers la une page définit pour les erreurs
    Route::fallback(function(){
        return 'this page is not found please try again =(';
    });


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

require __DIR__.'/auth.php';
