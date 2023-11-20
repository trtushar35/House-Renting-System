<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class Review_RatingController extends Controller
{
    public function list(){
        return view('backend.pages.review_rating.list');
    }
}
