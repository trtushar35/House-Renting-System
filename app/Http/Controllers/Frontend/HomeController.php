<?php

namespace App\Http\Controllers\Frontend;

use App\Models\House;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home(){

        $houses=House::all();


        return view('frontend.pages.home',compact('houses'));
    }  
    
}
