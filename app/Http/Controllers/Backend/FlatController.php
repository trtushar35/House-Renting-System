<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FlatController extends Controller
{
    public function list(){
        return view ('backend.pages.flat.list');
    }
}
