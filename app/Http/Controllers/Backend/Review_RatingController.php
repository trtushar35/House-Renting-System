<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Review_RatingController extends Controller
{
    public function list(){

        $reviews = Review::all();
        // dd($reviews);
        $users=Review::where('user_id',auth()->user()->id)->get();
        return view('backend.pages.review_rating.list', compact('reviews', 'users'));
    }

    public function reviewPrint()
    {
        $reviews = Review::all();
        $users=Review::where('user_id',auth()->user()->id)->get();
        return view('backend.pages.review_rating.print', compact('reviews', 'users'));
    }
}
