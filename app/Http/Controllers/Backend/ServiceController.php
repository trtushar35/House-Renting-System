<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function list(){
        return view('backend.pages.service.list');
    }
}
