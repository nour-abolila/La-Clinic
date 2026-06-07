<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

use App\Models\Review;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $wishlistCount = 0;
            $cartCount = 0;
            if (Auth::check()) {
                $wishlistCount = Auth::user()->wishlistProducts()->count();
                $cartCount = Auth::user()->cartItems()->sum('quantity');
            }
            
            $reviews = Review::latest()->take(5)->get();
            
            $view->with([
                'wishlistCount' => $wishlistCount,
                'cartCount' => $cartCount,
                'reviews' => $reviews
            ]);
        });
    }
}
