<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function favoriteList()
    {
        return view('frontend.pages.favoriteList');
    }
}
