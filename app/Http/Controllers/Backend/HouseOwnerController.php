<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;

use App\Models\House;
use App\Models\Owner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HouseOwnerController extends Controller
{
    public function list()
    {

        $house_owners = User::where('role', 'House Owner')->get();

        return view('backend.pages.houseOwner.list',compact('house_owners'));
    }

    public function addNew()
    {
        return view('backend.pages.houseOwner.addNew');
    }

    public function store(Request $request)
    {
        //dd ($request->all());

        Owner::create(
            [

                'Name' => $request->Name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'nid' => $request->nid,


            ]
        );

        return redirect()->back();
    }
}
