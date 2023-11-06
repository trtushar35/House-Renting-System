<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RentCollectionController extends Controller
{
    public function list(){
        return view('backend.pages.rentCollection.list');
    }

    public function addNew(){
        return view('backend.pages.rentCollection.addNew');
    }

    public function store(request $request){

        dd($request->all());
    }
}
