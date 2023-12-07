<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HouseController extends Controller
{
    public function list()
    {

        $houses=House::paginate(7);
        // $house_owners=House_Owner::all();

        return view('backend.pages.house.list', compact('houses'));
    }

    public function addNew()
    {
        return view('backend.pages.house.addNew');
    }


    public function delete($id) 
    {
        $houses=House::find($id);
        if($houses)
        {
            $houses->delete();
        }
        notify()->success('House delete Successfully.');
        return redirect()->back();
    }

    public function edit($id)
    {
        $houses=House::find($id);
        
        return view('backend.pages.house.edit', compact('houses'));

    }
    
    public function view($id)
    {
        $houses=House::find($id);
        
        return view('backend.pages.house.view', compact('houses'));

    }

    public function update(Request $request, $id)
    {
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
          return redirect()->route('house.list');
        }
             
    } 

    public function store(request $request)
    {

        //dd($request->all());

        
        $valided=Validator::make($request->all(),[
            

            'house_name'=>'required',
            'house_owner_name'=>'required',
            'house_address'=>'required',
            'district'=>'required',
            'division'=>'required',
            'thana'=>'required',
            'floor_number'=>'required',
            'flat_number'=>'required',
            'total_bedroom'=>'required',
            'total_bathroom'=>'required',
            'rent_amount'=>'required',
            'category'=>'required',
            'available_date'=>'required',
            'image'=>'required'
        ]);

        if($valided->fails()){
            return redirect()->back()->witherrors($valided);
        }

        if($request->hasFile('image'))
        {
            // dd($request->all());
            $file=$request->file('image');
            $fileName=date('Ymdhis').'.'.$file->getClientOriginalExtension();
            $file->storeAs('/uploads', $fileName);

        }

        House::create(
            [

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
            'image'=>$fileName,
            
            ]
        );


        return redirect()->route('house.list');
    }

}
