<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function list(){
        return view('backend.pages.payment.list');
    }




}

