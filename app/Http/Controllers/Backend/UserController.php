<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function loginForm(){
        return view('backend.pages.login');
    }

    public function loginPost(Request $request){

        // dd($request->all());
        $validate=Validator::make($request->all(),
        [

            'email'=>'required|email',
            'password'=>'required|min:6',

        ]);


        if($validate->fails())
        {
            return redirect()->back()->witherrors($validate);
        }

        $credentials=$request->except('_token');

        $login=auth()->attempt($credentials);
        if($login)
        {
            
            return redirect()->route('dashboard');
        }

        return redirect()->back()->withErrors('Invalid user email or password');

    }

    public function logout()
    {

        auth()->logout();
        return redirect()->route('admin.login');
        
    }

}
