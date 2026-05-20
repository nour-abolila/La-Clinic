<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Auth::user()->cartItems()->with('product')->get();
        $cartTotal = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        return view('cart.index', compact('cartItems', 'cartTotal'));
    }

    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'integer|min:1'
        ]);

        $quantity = $request->input('quantity', 1);

        $cartItem = Cart::where('user_id', Auth::id())
                        ->where('product_id', $product->id)
                        ->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => $quantity
            ]);
        }

        return $this->getCartData();
    }

    public function update(Request $request, Cart $cart)
    {
        if ($cart->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cart->update(['quantity' => $request->quantity]);

        return response()->json([
            'success' => true,
            'itemSubtotal' => number_format($cart->quantity * $cart->product->price, 2),
            'cartData' => $this->getCartData()->original
        ]);
    }

    public function remove(Cart $cart)
    {
        if ($cart->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $cart->delete();

        return $this->getCartData();
    }

    public function getCartData()
    {
        $cartItems = Auth::user()->cartItems()->with('product')->get();
        $cartTotal = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });
        
        $html = view('cart.partials.offcanvas_items', compact('cartItems', 'cartTotal'))->render();

        return response()->json([
            'success' => true,
            'html' => $html,
            'cartCount' => $cartItems->sum('quantity'),
            'cartTotal' => number_format($cartTotal, 2)
        ]);
    }
}
