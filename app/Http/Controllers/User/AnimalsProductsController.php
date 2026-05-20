<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class AnimalsProductsController extends Controller
{
    public function catShop()
    {
        $catproducts = Product::with('animal' , 'category')->whereHas('animal', function ($query) {
            $query->where('name', 'cat');
        })->get();
       $categories = Category::all();    
        return view('cat_shop' , compact('categories' , 'catproducts'));
    }


    public function dogshop()
    {
        $dogproducts = Product::with('category', 'animal')->whereHas('animal' , function ($query){
            $query->where('name' , 'dog');
        })->get();
        $categories = Category::all();
        return view('dog_shop' , compact('categories' , 'dogproducts'));

    }
}
