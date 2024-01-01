<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\House;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class HouseController extends Controller
{
    public function singleHouseView($houseId)
    {
        // dd($houseId);
        $singleHouse = House::find($houseId);

        // dd($singleHouse->image);

        return view('frontend.pages.house.house-view', compact('singleHouse'));
    }

    public function createProperty()
    {
        return view('frontend.pages.addProperty.addProperty');
    }

    public function houseList($id)
    {
        $houses = House::where('user_id', auth()->user()->id)->get();


        // dd($houses);
        return view('frontend.pages.postHouse.list', compact('houses'));
    }

    public function storeProperty(Request $request)
    {
        // dd($request->all());

        $valided = Validator::make($request->all(), [


            'house_name' => 'required',
            'house_owner_name' => 'required',
            'house_address' => 'required',
            'district' => 'required',
            'division' => 'required',
            'thana' => 'required',
            'floor_number' => 'required',
            'flat_number' => 'required',
            'total_bedroom' => 'required',
            'total_bathroom' => 'required',
            'rent_amount' => 'required',
            'category' => 'required',
            'available_date' => 'required',
            'image' => 'required'
        ]);

        if ($valided->fails()) {
            notify()->error('Can not store house.');
            return redirect()->back();
        }

        $imagePaths = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $fileName = date('Ymdhis') . '_' . $image->getClientOriginalName();
                $image->storeAs('/uploads', $fileName);
                $imagePaths[] = $fileName;
            }
        }

        
        House::create(
            [
                'user_id' => auth()->user()->id,
                'house_name' => $request->house_name,
                'house_owner_name' => $request->house_owner_name,
                'house_address' => $request->house_address,
                'division' => $request->division,
                'district' => $request->district,
                'thana' => $request->thana,
                'floor_number' => $request->floor_number,
                'flat_number' => $request->flat_number,
                'total_bedroom' => $request->total_bedroom,
                'total_bathroom' => $request->total_bathroom,
                'rent_amount' => $request->rent_amount,
                'category' => $request->category,
                'available_date' => $request->available_date,
                'summary' => $request->summary,
                'image' => implode("|",$imagePaths),

            ]
        );


        return redirect()->route('browse.all.property');
    }
}
