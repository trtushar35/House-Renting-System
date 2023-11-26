<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function list(){

        $tenants=Tenant::all();
            // dd($tenants);

        return view('backend.pages.tenant.list',compact('tenants'));
    }

    public function addNew(){
        return view('backend.pages.tenant.addNew');
    }

    public function store(Request $request){

        // dd($request->all());
        
        Tenant::create(
           [
            'name'=>$request->name,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'address'=>$request->address,
            'nid'=>$request->nid,
           ] 
           );

           return redirect()->back();
    }
}
