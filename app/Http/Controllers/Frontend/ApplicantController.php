<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\House;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicantController extends Controller
{
    public function applicantList($id)
    {
        $bookings = Booking::where('house_id',  $id)->get();

        // dd($bookings);
        return view('frontend.pages.applicant.list', compact('bookings'));
    }

    public function view($id)
    {
        // $houses=House::find($id);
        $book = Booking::where('house_id', $id)->get();
        // dd($book);
        return view('frontend.pages.postHouse.view', compact('book'));
    }

    public function approve($houseId)
    {
        $booking = Booking::find($houseId);
        // $booking = House::find($houseId); 
        // dd($booking);
        if ($booking) {
            $booking->update([
                'status' => 'Approved'
            ]);

            $houseID = $booking->house_id;
            // dd($houseID);
            $house = House::find($houseID);
            $house->update([
                'status' => 'Approved',
            ]);

        }
        notify()->success('Booking Approved.');
        return redirect()->back();
    }

    public function reject($houseId)
    {
        $booking=Booking::find($houseId);
        if($booking)
        {
            $booking->update([
                'status'=>'Rejected'
            ]);
        }
        notify()->success('Booking Rejected.');
        return redirect()->back();
    }
}
