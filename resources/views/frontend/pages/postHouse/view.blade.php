@extends('frontend.partial.other')

@section('content')

<h1>View Applicant Details</h1>


<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Applicant Name</th>
      <th scope="col">Applicant Address</th>
      <th scope="col">House Name</th>
      <th scope="col">House Address</th>
      <th scope="col">Floor Number</th>
      <th scope="col">Flat Number</th>
      <th scope="col">Message</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  @foreach($book as $applicant)
  <tbody>
    <tr>
      <th scope="row">{{$applicant->id}}</th>
      <td>{{$applicant->user->name}}</td>
      <td>{{$applicant->user->address}}</td>
      <td>{{$applicant->house->house_name}}</td>
      <td>{{$applicant->house->house_address}}</td>
      <td>{{$applicant->house->floor_number}}</td>
      <td>{{$applicant->house->flat_number}}</td>
      <td>{{$applicant->message}}</td>
      <td>{{$applicant->status}}</td>
      @if($applicant->status=='pending')
      <td>      
        <a class="btn btn-success" href="{{route('applicant.approve', $applicant->id)}}">Accept</a>
        <a class="btn btn-danger" href="{{route('applicant.do.reject', $applicant->id)}}">Reject </a>
      </td>
      @endif
    </tr>
  </tbody>
  @endforeach
</table>

@endsection