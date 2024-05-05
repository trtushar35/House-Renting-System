<?php

namespace App\Http\Controllers\Frontend;

use App\Mail\link;
use Carbon\Carbon;
use App\Models\User;
use App\Mail\sendOtp;
use App\Mail\testMail;
use App\Models\Booking;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
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
        $otp = rand(10000, 99999);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => $request->role,
            'password' => bcrypt($request->password),
            'otp' => $otp,
            'otp_expired_at' => Carbon::now()->addMinute(5)
        ]);

        Mail::to($request->email)->send(new sendOtp($otp));

        notify()->success('Customer Registration successful.');
        return redirect()->route('otp.form');
    }

    public function otpForm()
    {
        return view('frontend.pages.mail.otpForm');
    }

    public function otpVerify(Request $request)
    {

        $request->validate([
            'otp' => 'required|numeric',
        ]);

        $code = $request->otp;
        $user = User::where('otp', $code)->first();

        if ($user) {
            //if otp is expired
            if (Carbon::now()->gt($user->otp_expired_at)) {
                notify()->error('OTP Expired');
                return redirect()->route('otp.form');
            }

            //otp is valid and not expired
            $user->is_verified = true;
            $user->save();

            notify()->success('Verified successful, you can login now.');
            return redirect()->route('tenant.login');
        } else {
            //invalid otp 
            return redirect()->back()->with('error', 'Invalid OTP. Please try again.');
        }
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
            $user = auth()->user();
            if ($user->is_verified) {
                notify()->success('Login Successfully.');
                return redirect()->route('home');
            } else {
                auth()->logout();
                notify()->error('Please verify your email first.');
                return redirect()->route('otp.form');
            }

            notify()->success('Login Successfully.');
            return redirect()->route('home');
        }

        notify()->error('Invalid Credentials.');
        return redirect()->back();
    }

    public function forgotPassword()
    {
        return view('frontend.pages.forgetPassword');
    }

    public function sendLink(Request $request)
    {

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            notify()->error('Email Not found.');
            return redirect()->back();
        }

        $token = Str::random(120);

        Mail::to($request->email)->send(new link($token));

        $user->update([
            'rememberToken' => $token
        ]);

        return "Link is sent successfully.";
    }

    public function resetPassword($token)
    {
        $token = $token;
        return view('frontend.pages.resetPassword',compact('token'));
    }

    public function updatePassword(Request $request, $token)
    {
        // dd($request->all(), $token);
        $validation = Validator::make($request->all(), [
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $user = User::where('rememberToken', $token )->first();
        // dd($user);

        if (!$user) {
            notify()->error('Invalid token.');
            return redirect()->back();
        }

        $user->update([
            'password' => bcrypt($request->new_password)
        ]);
        $user->rememberToken = null;
        $user->save();

        return redirect()->route('tenant.login')->with('success', 'Password updated successfully.');
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
