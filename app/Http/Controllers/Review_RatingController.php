<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Review_RatingController extends Controller
{
    public function list(){
        return view('backend.pages.review_rating.list');
    }
}
