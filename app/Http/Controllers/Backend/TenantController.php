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
            'username'=>$request->username,
            'city'=>$request->city,
            'state'=>$request->State,
            'zip'=>$request->Zip,
           ] 
           );

           return redirect()->back();
    }
}
