<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\HomeBannerController;
use App\Http\Controllers\frontend\AboutUsController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



// Frontend View
    //Home Page
    Route::get("/", [HomeController::class,"index"])->name("home");

    Route::get('/product-all', [ProductController::class, 'index'])->name('product.index');
    Route::get('/about-us', [AboutUsController::class, 'index'])->name('index');

























    require base_path('routes/admin.php');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
