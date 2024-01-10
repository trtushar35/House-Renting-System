<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function list(){
        $payments=Booking::with('house','user')->where('payment_status','=','confirm')->paginate(10);
        // dd($payments);
        return view('backend.pages.payment.list', compact('payments'));
    }

    public function paymentPrint()
    {
        $payments=Booking::with('house','user')->where('payment_status','=','confirm')->get();
        return view('backend.pages.payment.print', compact('payments'));
    }
}

