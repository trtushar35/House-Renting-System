@extends('frontend.partial.other')

@section('content')

<h3>Booking List</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Serial</th>
            <th scope="col">Date</th>
            <th scope="col">House Id</th>
            <th scope="col">House Name</th>
            <th scope="col">House Owner Name</th>
            <th scope="col">Status</th>
            <th scope="col">Rent Amount</th>
            <th scope="col">Owner Phone Number</th>
            <th scope="col">Payment Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($bookings as $booking)

        <tr>
            <th scope="row">{{$booking->id}}</th>
            <td>{{$booking->created_at}}</td>
            <td>{{$booking->house->id}}</td>
            <td>{{$booking->house->house_name}}</td>
            <td>{{$booking->house->house_owner_name}}</td>
            <td>{{$booking->status}}</td>
            <td>{{$booking->house->rent_amount}}</td>
            @if($booking->status=='Approved')
            <td>0{{$booking->house->user->phone}}</td>
            @elseif($booking->status=='Booking Cancelled')
            <td>Booking Cancelled</td>
            @else
            <td>Not Approved</td>
            @endif
            @if($booking->payment_status=='confirm')
            <td>Paid</td>
            @elseif($booking->payment_status=='pending' && $booking->status=='Booking Cancelled')
            <td>Cancelled</td>
            @elseif($booking->payment_status=='pending' && $booking->status=='pending')
            <td>Not Approved</td>
            @else
            <td>{{$booking->payment_status}}</td>
            @endif
            <td>
                @if($booking->status=='pending')
                <a class="btn btn-danger" href="{{route('cancel.book', $booking->id)}}">Cancel Booking</a>
                @elseif($booking->status=='Approved' && $booking->payment_status != 'confirm')

                <a class="btn btn-success" href="{{ route('payment.now', $booking->id) }}">
                    Make Advance Payment
                </a>
                <a class="btn btn-danger" href="{{route('cancel.book', $booking->id)}}">Cancel Payment</a>

                @endif


            </td>
        </tr>

        @endforeach

    </tbody>

</table>
@endsection