<?php

namespace App\Http\Controllers\Frontend;

use App\Models\House;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SavedProperty;

class FavoriteController extends Controller
{
    public function favoriteList($id)
    {
        $favorite=SavedProperty::all();
        return view('frontend.pages.favoriteList',compact('favorite'));
    }

    public function addFavoriteList($houseId)
    {
        // dd("hello");

        SavedProperty::create([
            'user_id'=>auth()->user()->id,
            'house_id'=>$houseId,
        
    ]);

    notify()->success('Saved Successfully.');
    return redirect()->back();
    }
}
