<?php

namespace App\Http\Controllers\Frontend;

use App\Mail\testMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(){
        Mail::to('test@gmail.com')->send(new testMail());
        return "Mail is sent successfully.";
    }
}
