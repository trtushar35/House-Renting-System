<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\House;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function home()
    {

        $houses = House::where('status', '=', 'Available')->get();
        // $reviews=Review::all();
        // dd($reviews);
        // $reviews=Review::where('user_id',auth()->user()->id)->get();
        return view('frontend.pages.home', compact('houses'));
    }

    public function search(Request $request)
    {
        // dd($request->all());
        if ($request->search) {
            // dd("bari paiche");
            // $houses=House::where('house_name', 'LIKE', '%'.$request->search.'%')->get();
            $houses = House::where('status', '=', 'Available')->where('house_address', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            // dd("bari pay nai");
            $houses = House::where('status', '=', 'Available')->get();
        }

        return view('frontend.pages.search', compact('houses'));
    }

    public function terms()
    {
        return view('frontend.pages.terms-conditions');
    }

    public function browseAllProperty()
    {

        $houses = House::where('status', '=', 'Available')->get();
        return view('frontend.pages.allProperty', compact('houses'));
    }

    public function aboutUs()
    {
        return view('frontend.pages.aboutUs');
    }

    public function contactUs()
    {
        return view('frontend.pages.contactUs');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $valided = Validator::make($request->all(), [
            'name' => 'required',
            'phone_number' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        if ($valided->fails()) {
            notify()->error('Please fullfil the form correctly.');
            return redirect()->back();
        }

        Contact::create(
            [
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'subject' => $request->subject,
                'message' => $request->message,

            ]
        );

        notify()->success('Thanks for contact with us.');
        return redirect()->back();
    }
    public function privacyPolicy()
    {
        return view('frontend.pages.privacy');
    }
}
