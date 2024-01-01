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

    public function flatPrint()
    {
        $Flats = House::all();
        return view('backend.pages.flat.print', compact('Flats'));
    }
}
