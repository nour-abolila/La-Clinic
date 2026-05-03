<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeProductsController extends Controller
{
    public function home()
    {
        $foodproducts = Product::with('category')->whereHas('category', function ($query) {
            $query->where('name', 'food');
        })->get();
        

        $clothesproducts = Product::with('category')->whereHas('category', function ($query) {
            $query->where('name', 'clothes');
        })->get();

        $suppliesproducts = Product::with('category')->whereHas('category', function ($query) {
            $query->where('name', 'supplies');
        })->get();

        $animals = Animal::all();
        $reviews = Review::latest()->take(5)->get();
        return view('welcome', compact('clothesproducts' ,'foodproducts', 'suppliesproducts', 'animals', 'reviews'));
    }

}
