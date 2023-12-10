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
        $reviews=Review::where('user_id',auth()->user()->id)->get();
        $users=User::all();
        return view('backend.pages.review_rating.list', compact('reviews', 'users'));
    }
}
