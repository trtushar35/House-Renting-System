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
            'user_id' => auth()->user()->id,
            'review' => $request->review,
        ]);

        notify()->success('Thanks for your valuable Feedback.');
        return redirect()->route('home');
    }

    public function reviewList($id)
    {
        // dd($id);
        $reviews = Review::where('user_id', '=', $id)->get();
        return view('frontend.pages.review.list', compact('reviews'));
    }

    public function reviewEdit($id)
    {
        $reviews = Review::find($id);
        // dd($reviews);
        return view('frontend.pages.review.edit', compact('reviews'));
    }

    public function reviewUpdate(Request $request, $id)
    {
        $reviews = Review::find($id);

        $reviews->update([
            'review' => $request->review,
        ]);

        notify()->success('Review update successfully.');
        return redirect()->route('review.list');
    }

    public function reviewDelete($id)
    {
        $reviews=Review::find($id);
        if($reviews)
        {
            $reviews->delete();
        }
        notify()->success('Review Delete Successfully.');
        return redirect()->back();
    }
}
