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
