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

        // dd($request->all());

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
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

        if (auth()->attempt($credentials)) {
            // dd($credentials);

            notify()->success('Login Successfully.');
            return redirect()->route('home');
        }

        notify()->error('Invalid Credentials.');
        return redirect()->back();
    }

    public function profile()
    {

        return view('frontend.pages.profile.profile');
    }

    public function bookingList($id)
    {
        // dd($id);  

        $bookings = Booking::with('house.user')->where('user_id', auth()->user()->id)->get();
        // dd($bookings);
        return view('frontend.pages.profile.bookingList', compact('bookings'));
    }

    public function editProfile($userId)
    {
        $users = User::find($userId);

        return view('frontend.pages.profile.editProfile', compact('users'));
    }

    public function updateProfile(Request $request, $userId)
    {
        //  dd($request);

        $users = User::find($userId);

        if ($users) {
            $fileName = $users->image;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();

                $file->storeAs('/uploads', $fileName);
            }


            $users->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'image' => $fileName

            ]);

            notify()->success('Updated successfully.');
            return redirect()->route('profile.view');
        }
    }


    public function logout()
    {
        auth()->logout();
        notify()->success('Logout Success.');
        return redirect()->route('home');
    }
}
