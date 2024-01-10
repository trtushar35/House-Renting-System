@extends('backend.master')

@section('content')
<div class="container">
  <div class="col">
    <h1>Payment List</h1>

    <a href="{{route('payment.print')}}" class="btn btn-success">Print</a>
    <div class="row">

      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Serial</th>
            <th scope="col">Name</th>
            <th scope="col">House Owner Name</th>
            <th scope="col">Payment Method</th>
            <th scope="col">Payment Amount</th>
          </tr>
        </thead>

        @foreach($payments as $payment)
        <tbody>
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$payment->user->name}}</td>
            <td>{{$payment->house->house_owner_name}}</td>
            <td>bKash</td>
            <td>{{$payment->booking_amount}} BDT</td>

          </tr>
        </tbody>
        @endforeach
      </table>
      {{$payments->links()}}
    </div>
  </div>
</div>
@endsection