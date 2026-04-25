<?php

use App\Http\Controllers\User\AnimalsProductsController;
use App\Http\Controllers\User\HomeProductsController;
use Illuminate\Support\Facades\Route;





Route::get('/', [HomeProductsController::class, 'home']);
Route::get('/cat-shop', [AnimalsProductsController::class, 'catShop']);
Route::get('/dog-shop', [AnimalsProductsController::class, 'dogShop']);

