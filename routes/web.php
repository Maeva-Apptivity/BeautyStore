<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GoogleAuthController;

    Route::get('/',[HomeController::class,'index'])->name('homepage');

    // ROUTE DES CATEGORIES
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/category/{slug}','getBrands')->name('getBrands');
    });

    // ROUTE DES PRODUITS
    Route::controller(ProductController::class)->group(function(){
        Route::get('/products','index')->name('product.list');
        Route::get('/products/{slug}','show')->name('product.show');
        Route::get('/brand/{slug}/','getProductsByBrand')->name('product.by.brand');
        
    });

    // ROUTE DU PANIER
    Route::controller(CartController::class)->group(function(){
        Route::get('/cart','index')->name('cart.list');
        Route::get('/cart/count','getCartCount')->name('cart.count');//mise a jour de mon indicateur de quantité
        Route::delete('/cart/remove/{id}','removeItem')->name('cart.item.remove');
        Route::put('/cart/increase/{id}','increaseQuantity')->name('cart.quantity.increase');
        Route::put('/cart/decrease/{id}','decreaseQuantity')->name('cart.quantity.decrease');

        // Route du panier avec ajax
        Route::post('/cart/add/ajax','addAjax')->name('cart.addAjax');
        Route::post('/cart/add/detail','addFromDetail')->name('cart.add.fromDetail');
    });


    // Route vers la une page définit pour les erreurs
    Route::fallback(function(){
        return response()->view('errors.404', [], 404);
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Routes authentification google
    Route::get('/auth/google',[GoogleAuthController::class,'redirect'])->name('google.login');

    Route::get('/auth/google/callback',[GoogleAuthController::class, 'callback']);



require __DIR__.'/auth.php';
