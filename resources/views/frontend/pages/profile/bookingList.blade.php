@extends('frontend.partial.other')

@section('content')

<h3>Booking List</h3>
<table class="table booking_list">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">House Id</th>
            <th scope="col">House Name</th>
            <th scope="col">House Owner Name</th>
            <th scope="col">Status</th>
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
            <td>
                @if($booking->status=='pending')
                <a class="btn btn-danger" href="{{route('cancel.book', $booking->id)}}">Cancel Booking</a>
                @elseif($booking->status=='Approved')
                <a class="btn btn-success" href="">Make Payment</a>
                @endif

                
            </td>
        </tr>

        @endforeach

    </tbody>
</table>
@endsection