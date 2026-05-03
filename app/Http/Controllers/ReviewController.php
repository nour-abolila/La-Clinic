<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Show the add review form.
     */
    public function create()
    {
        $reviews = Review::latest()->get();
        return view('reviews.create' , compact('reviews'));
    }

    /**
     * Store a new review in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'review_text' => 'required|string|min:5|max:1000',
        ]);

        Review::create([
            'user_id'     => Auth::id(),
            'name'        => Auth::user()->name,
            'review_text' => $request->review_text,
        ]);

        return redirect()->route('reviews.create')
            ->with('success', 'Your review has been submitted successfully! 🎉');
    }
}
