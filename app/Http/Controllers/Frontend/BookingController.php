<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;

class BookingController extends Controller
{
    public function booking($houseId)
    {
        Booking::create([
                'user_id'=>auth()->user()->id,
                'house_id'=>$houseId,
            
        ]);

        notify()->success('Booking Successfull.');
        return redirect()->back();
        

    }

    public function cancelBooking($houseId)
    {
        $booking=Booking::find($houseId);
        if($booking)
        {
            $booking->update([
                'status'=>'cancelled'

            ]);
        }
        notify()->success('Booking Cancelled.');
        return redirect()->back();
    }
}
