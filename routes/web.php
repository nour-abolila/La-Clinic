<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\User\AnimalsProductsController;
use App\Http\Controllers\User\HomeProductsController;
use Illuminate\Support\Facades\Route;



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Review routes
    Route::get('/add-review', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/add-review', [ReviewController::class, 'store'])->name('reviews.store');

    // Wishlist routes
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/toggle/{product}', [WishlistController::class, 'toggle'])->name('wishlist.toggle');

    // Cart routes
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/update/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{cart}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/cart/data', [CartController::class, 'getCartData'])->name('cart.data');
});


Route::get('/', [HomeProductsController::class, 'home'])->name('home');
Route::get('/cat-shop', [AnimalsProductsController::class, 'catShop']);
Route::get('/dog-shop', [AnimalsProductsController::class, 'dogShop']);

require_once __DIR__.'/auth.php';