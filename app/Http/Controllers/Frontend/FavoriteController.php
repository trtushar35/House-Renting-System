<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\House;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\SavedProperty;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    public function favoriteList($id)
    {
        // dd($id);
        $favorite=SavedProperty::with('house')->get();
        $favorite=SavedProperty::where('user_id',auth()->user()->id)->get();
        $users=User::all();
        return view('frontend.pages.favoriteList',compact('favorite', 'users'));
    }

    public function addFavoriteList($house_id)
    {
        // dd("hello");

        SavedProperty::create([
            'user_id'=>auth()->user()->id,
            'house_id'=>$house_id,
    ]);

    notify()->success('Saved Successfully.');
    return redirect()->back();
    }
}
