<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display the user's wishlist.
     */
    public function index()
    {
        $wishlistProducts = Auth::user()->wishlistProducts()->with('category', 'animal')->get();
        return view('wishlist.index', compact('wishlistProducts'));
    }

    /**
     * Toggle a product in/out of the user's wishlist.
     */
    public function toggle(Product $product)
    {
        $user = Auth::user();
        
        if ($user->wishlistProducts()->where('product_id', $product->id)->exists()) {
            $user->wishlistProducts()->detach($product->id);
            $status = 'removed';
            $message = 'Product removed from wishlist.';
        } else {
            $user->wishlistProducts()->attach($product->id);
            $status = 'added';
            $message = 'Product added to wishlist.';
        }

        return response()->json([
            'status' => $status,
            'message' => $message,
            'count' => $user->wishlistProducts()->count()
        ]);
    }
}
