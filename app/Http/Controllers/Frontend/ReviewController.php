<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Review;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function review()
    {
        return view('frontend.pages.review.create');
    }

    public function storeReview(Request $request)
    {
        // dd($request->All());

        Review::create([
            'user_id'=>auth()->user()->id,
            'review'=>$request->review,
        ]);
        
        notify()->success('Thanks for your valuable Feedback.');
        return redirect()->route('home');
    }
}
