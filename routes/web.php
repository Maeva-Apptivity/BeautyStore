<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

    Route::get('/', function () {
        return view('home');
    });

    // Groupage des routes pour les categories
    Route::controller(CategoryController::class)->group(function(){

        // Listing des categories (ex : skincare, makeup...)
        Route::get('/',[CategoryController::class,'index'])->name('category.list');

        

    });

    // Route vers la une page définit pour les erreurs
    Route::fallback(function(){
        return 'this page is no found please try again =(';
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
