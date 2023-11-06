<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function list(){
        return view('backend.pages.service.list');
    }
}
