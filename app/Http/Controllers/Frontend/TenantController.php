<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
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

        // dd($request->all());


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'customer',
            'password' => bcrypt($request->password),
        ]);

        // dd('hi');
        notify()->success('Customer Registration successful.');
        return redirect()->route('home');
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


    public function logout()
    {
        auth()->logout();
        notify()->success('Logout Success.');    
        return redirect()->route('home');
    }
}
