<?php

namespace App\Http\Controllers\Frontend;

use App\Models\House;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HouseController extends Controller
{
    public function singleHouseView($houseId)
    {

        $singleHouse=House::find($houseId);

        // dd($singleHouse->id);

        return view('frontend.pages.house-view',compact('singleHouse'));
        
    }
}
