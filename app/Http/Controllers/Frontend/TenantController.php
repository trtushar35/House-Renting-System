<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class TenantController extends Controller
{
    public function registration()
    {

        return view('frontend.pages.registration');

        // return redirect()->route('');

    }


    public function store(Request $request)
    {

        //  dd($request->all());

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password),
        ]);

        // dd('hi');
        notify()->success('Customer Registration successful.');
        return redirect()->route('tenant.login');
    }

    public function login()
    {

        return view('frontend.pages.login');
    }

    public function dologin(Request $request)
    {

        // dd($request->all());

        $validate = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validate->fails()) {

            notify()->error($validate->getMessageBag());
            return redirect()->back();
        }

        $credentials = $request->except('_token');

        if (auth()->attempt($credentials)) 
        {
            // dd($credentials);

            notify()->success('Login Successfully.');
            return redirect()->route('home');
        }

        notify()->error('Invalid Credentials.');
        return redirect()->back();
    }

    public function profile()
    {
        $bookings=Booking::where('user_id',auth()->user()->id)->get();
        $users=user::all();

        return view('frontend.pages.profile.profile', compact('bookings', 'users'));
    }

    public function editProfile($userId)
    {
        $users=User::find($userId);
        return view('frontend.pages.profile.editProfile',compact('users'));
        
    }


    public function logout()
    {
        auth()->logout();
        notify()->success('Logout Success.');    
        return redirect()->route('home');
    }
}
