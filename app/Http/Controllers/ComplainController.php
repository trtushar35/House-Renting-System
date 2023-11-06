<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComplainController extends Controller
{
    public function list(){
        return view('backend.pages.complain.list');
    }
}
