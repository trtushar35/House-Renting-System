<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function list(){
        return view('backend.pages.report.list');
    }
}
