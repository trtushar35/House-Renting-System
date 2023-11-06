<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HouseController extends Controller
{
    public function list(){

        $houses=House::paginate(5);
        // $house_owners=House_Owner::all();

        return view('backend.pages.house.list', compact('houses'));
    }

    public function addNew(){
        return view('backend.pages.house.addNew');
    }

    public function store(request $request){

        // dd($request->all());

        
        $valided=Validator::make($request->all(),[

            'house_name'=>'required',
            'house_owner_name'=>'required',
            'house_address'=>'required',
            'total_floor'=>'required',
            'total_flat'=>'required'
        ]);

        if($valided->fails()){
            return redirect()->back()->witherrors($valided);
        }


        House::create(
            [

            'house_name'=>$request->house_name,
            'house_owner_name'=>$request->house_owner_name,
            'house_address'=>$request->house_address,
            'total_floor'=>$request->total_floor,
            'total_flat'=>$request->total_flat,
            
            ]
        );


        return redirect()->back()->witherrors($valided);
    }

}
