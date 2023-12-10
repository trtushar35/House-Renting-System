<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\House;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home(){

        $houses=House::all();
        $reviews=Review::all();
        // $reviews=Review::where('user_id',auth()->user()->id)->get();
        return view('frontend.pages.home',compact('houses', 'reviews'));
    }  

    public function search(Request $request)
    {
        // dd($request->all());
        if($request->search)
        {
            // dd("bari paiche");
            $houses=House::where('house_name', 'LIKE', '%'.$request->search.'%')->get();
        }
        else{
            // dd("bari pay nai");
            $houses=House::all();
        }

        return view('frontend.pages.search', compact('houses'));
    }
    
    public function browseAllProperty()
    {

        $houses=House::all();
        return view('frontend.pages.allProperty',compact('houses')); 
    }
}
