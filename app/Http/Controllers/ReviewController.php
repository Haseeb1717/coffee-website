<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::latest()->get();

        return view('reviews.index', compact('reviews'));
    }

    public function create()
    {
        return view('reviews.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'rating'  => 'required|integer|between:1,5',
            'comment' => 'required|string|max:1000',
        ]);

        Review::create($validated);

        return redirect()
            ->route('reviews.index')
            ->with('success', 'Thanks for your review!');
    }
}