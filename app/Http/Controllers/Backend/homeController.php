<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;

use App\Models\House;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class homeController extends Controller
{
    public function home()
    {
        $users=User::count();
        $tenants=User::where('role', 'tenant')->count();
        $owners=User::where('role', 'House Owner')->count();
        $houses=House::count();
        return view('backend.home', compact('users', 'tenants', 'owners', 'houses'));
    }
}
