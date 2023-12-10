<?php

namespace App\Http\Controllers\Backend;


use App\Models\User;
use App\Models\Owner;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicantController extends Controller
{
    public function list()
    {
        $applicants=Booking::with('house')->get();
        $applicants=Booking::with('user')->get();
        $users = User::where('role', 'Tenant')->get();
        return view('backend.pages.applicant.list', compact('applicants','users'));
    }
}
