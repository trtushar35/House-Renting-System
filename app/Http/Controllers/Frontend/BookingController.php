<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Library\SslCommerz\SslCommerzNotification;

class BookingController extends Controller
{
    public function booking($houseId)
    {
        Booking::create([
                'user_id'=>auth()->user()->id,
                'house_id'=>$houseId,
                'transaction_id'=>date('YmdHis'),
                'payment_status'=>'pending',
            
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

                'status'=>'Booking Cancelled'

            ]);
        }
        notify()->success('Booking Cancelled.');
        return redirect()->back();
    }

    public function payment($id)
    {
        $bookings=Booking::find($id);
        // dd($bookings);
        $this-> advance_payment($bookings);
        return redirect()->route('profile.view');

    }

    public function advance_payment($payment){
        // dd($payment);
        $post_data = array();
        $post_data['total_amount'] =(int) $payment->booking_amount; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = $payment->transaction_id; // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $payment->user_id;
        $post_data['cus_email'] = 'trtushar35@gmail.com';
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = '8801XXXXXXXXX';
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        // dd($post_data);

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
        
    }
}
