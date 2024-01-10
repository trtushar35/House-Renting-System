<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;

use App\Models\House;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;

class homeController extends Controller
{
    public function home()
    {
        $users=User::count();
        $tenants=User::where('role', 'tenant')->count();
        $owners=User::where('role', 'House Owner')->count();
        $admins=User::where('role', 'admin')->count();
        $houses=House::count();
        $available=House::where('status', 'Available')->count();
        $bookings=Booking::count();
        $booked=Booking::where('payment_status', 'confirm')->count();
        // dd($booked);
        return view('backend.home', compact('users', 'tenants', 'owners', 'houses', 'admins', 'available','bookings','booked'));
    }
}
