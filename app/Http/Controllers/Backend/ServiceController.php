<?php

namespace App\Http\Controllers\Backend;

use App\Models\Service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function list(){

        $services=Service::all();
        return view('backend.pages.service.list',compact('services'));
    }

    public function create()
    {
        return view('backend.pages.service.addNew');
    }

    public function store(Request $request)
    {
        // dd( $request->all());
        Service::create(
            [

            'taker_name'=>$request->taker_name,
            'service_type'=>$request->service_type,
            ]
        );

        return redirect()->route('service.list');
    }

}
