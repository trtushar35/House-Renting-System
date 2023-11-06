<?php

namespace App\Http\Controllers;

use App\Models\House_Owner;
use Illuminate\Http\Request;

class HouseOwnerController extends Controller
{
    public function list(){

        $house_owners=House_Owner::all();

        return view('backend.pages.houseOwner.list',compact('house_owners'));
    }

    public function addNew(){
        return view('backend.pages.houseOwner.addNew');
    }

    public function store(Request $request){
        //dd ($request->all());

        House_Owner::create(
            [

                'Name'=>$request->Name,
                'phone_number'=>$request->phone_number,
                'address'=>$request->address,

            ]
        );

        return redirect()->back();

    }
}
