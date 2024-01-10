<?php

namespace App\Http\Controllers\backend;

use App\Models\House;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlatController extends Controller
{
    public function list(){
        $Flats = House::all();

        return view('backend.pages.flat.list', compact('Flats'));
    }

    public function view($house_id)
    {
        // dd($house_id);
        $houses=House::find($house_id);
        return view('backend.pages.flat.view', compact('houses'));
        
    }

    public function flatPrint()
    {
        $Flats = House::all();
        return view('backend.pages.flat.print', compact('Flats'));
    }
}
