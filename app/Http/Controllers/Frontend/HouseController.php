<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\House;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class HouseController extends Controller
{
    public function singleHouseView($houseId)
    {
        // dd($houseId);
        $singleHouse = House::find($houseId);

        // dd($singleHouse->image);
        $similarHouses = House::where('category', $singleHouse->category)->where('status', '=', 'Available')->where('house_address', $singleHouse->house_address)->where('id', '!=', $singleHouse->id)->inRandomOrder()->limit(4)->get();
        // dd($similarHouses);
        return view('frontend.pages.house.house-view', compact('singleHouse', 'similarHouses'));
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

    public function houseEdit($houseId)
    {
        // dd($houseId);
        $houses=House::find($houseId);
        return view('frontend.pages.postHouse.edit', compact('houses'));
    }

    public function delete($id) 
    {
        $houses=House::find($id);
        if($houses)
        {
            $houses->delete();
        }
        notify()->success('Post House delete Successfully.');
        return redirect()->back();
    }

    public function houseUpdate(Request $request, $id)
    {
        // dd($request->all(),$id);
        $houses=House::find($id); 

        if($houses)
        {
            $fileName=$houses->image;
        
            if($request->hasFile('image'))
            {
              $file=$request->file('image');
              $fileName=date('Ymdhis').'.'.$file->getClientOriginalExtension();
             
              $file->storeAs('/uploads',$fileName);
            }
        
          
            $houses->update([
            'house_name'=>$request->house_name,
            'house_owner_name'=>$request->house_owner_name,
            'house_address'=>$request->house_address,
            'division'=>$request->division,
            'district'=>$request->district,
            'thana'=>$request->thana,
            'floor_number'=>$request->floor_number,
            'flat_number'=>$request->flat_number,
            'total_bedroom'=>$request->total_bedroom,
            'total_bathroom'=>$request->total_bathroom,
            'rent_amount'=>$request->rent_amount,
            'category'=>$request->category,
            'available_date'=>$request->available_date,
            'summary'=>$request->summary,
            'image'=>$fileName            
            ]);

          notify()->success('House updated successfully.');
          return redirect()->route('post.house.list',$id);
        }
             
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
            'rent_amount' => 'required|min:0',
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
                'image' => implode("|", $imagePaths),

            ]
        );


        return redirect()->route('browse.all.property');
    }
}
