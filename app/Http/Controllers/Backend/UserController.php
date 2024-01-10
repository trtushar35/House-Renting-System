<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function loginForm()
    {
        return view('backend.pages.login');
    }

    public function delete($id)
    {
        $users=User::find($id);
        DB::table('bookings')->where('user_id', $users->id)->delete();
        if($users)
        {
            $users->delete();
        }
        notify()->success('Users Delete Successfully.');
        return redirect()->back();
    }

    public function edit($id)
    {
        $users=User::find($id);

        return view('backend.pages.users.edit', compact('users'));
        
    }

    public function view($id)
    {
        $users=User::find($id);

        return view('backend.pages.users.view', compact('users'));

    }

    public function update(Request $request, $id)
    {
        $users=User::find($id);

        if($users)
        {
            $fileName=$users->image;

            if($request->hasFile('image'))
            {
                $file=$request->file('image');
                $fileName=date('Ymdhis').'.'.$file->getClientOriginalExtension();

                $file->storeAs('/uploads', $fileName);

            }

            $users->update([
                'name'=>$request->user_name,
                'image'=>$fileName,
                'email'=>$request->user_email,
                'address'=>$request->address,
            ]);

            notify()->success('Users updated successfully.');
            return redirect()->route('users.list');
        }
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

        $users=User::paginate(5);
        // dd($users);
        return view('backend.pages.users.list',compact('users'));
    }

    public function print(){

        $users=User::all();
        // dd($users);
        return view('backend.pages.users.print',compact('users'));
    }

    public function addNew()
    {
        return view('backend.pages.users.addNew');
    }


    public function store(Request $request)
    {
        // dd( $request->all());
        $validate=Validator::make($request->all(),[
            'user_name'=>'required',
            'role'=>'required',
            'user_email'=>'required|email',
            'phone'=>'required|max:11',
            'address'=>'required',
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
            'phone'=>$request->phone,
            'email'=>$request->user_email,
            'address'=>$request->address,
            'password'=>bcrypt($request->user_password),
        ]);

        return redirect()->route('users.list')->with('message','User created successfully.');
    }

}