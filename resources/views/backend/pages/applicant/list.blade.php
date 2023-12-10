@extends('backend.master')

@section('content')
<h1>Booking List</h1>

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
      <th scope="col">Action</th>
    </tr>
  </thead>
  @foreach($applicants as $applicant)
  <tbody>
    <tr>
      <th scope="row">{{$applicant->user_id}}</th>
      <td>{{$applicant->user->name}}</td>
      <td>{{$applicant->user->address}}</td>
      <td>{{$applicant->house->house_name}}</td>
      <td>{{$applicant->house->house_address}}</td>
      <td>{{$applicant->house->floor_number}}</td>
      <td>{{$applicant->house->flat_number}}</td>
      <td>
        <a class="btn btn-success" href="">Accept</a>
        <a class="btn btn-danger" href="">Reject </a>
      </td>
    </tr>
  </tbody>
  @endforeach
</table>
@endsection