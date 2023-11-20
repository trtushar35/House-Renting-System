<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
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


    public function list(){

        $users=User::all();
        // dd($users);
        return view('backend.pages.users.list',compact('users'));
    }

    public function addNew()
    {
        return view('backend.pages.users.addNew');
    }


    public function store(Request $request)
    {
        $validate=Validator::make($request->all(),[
            'user_name'=>'required',
            'role'=>'required',
            'user_email'=>'required|email',
            'user_password'=>'required|min:6',
        ]);

        if($validate->fails())
        {
            return redirect()->back()->with('myError',$validate->getMessageBag());
        }

        $fileName=null;
        if($request->hasFile('user_image'))
        {
            // dd($request->all());
            $file=$request->file('user_image');
            $fileName=date('Ymdhis').'.'.$file->getClientOriginalExtension();
            $file->storeAs('/uploads', $fileName);

        }

       
        User::create([
            'name'=>$request->user_name,
            'role'=>$request->role,
            'image'=>$fileName,
            'email'=>$request->user_email,
            'password'=>bcrypt($request->user_password),
        ]);

        return redirect()->route('users.list')->with('message','User created successfully.');
    }

}