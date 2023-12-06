@extends('backend.master')

@section('content')
<h1>Applicant List</h1>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Applicant Name</th>
      <th scope="col">Applicant Address</th>
      <th scope="col">House Name</th>
      <th scope="col">House Address</th>
      <th scope="col">House Type</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  @foreach($applicants as $applicant)
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>{{$applicant->id}}</td>
      <td>{{$applicant->booking}}</td>
      <td>Dhaka</td>
      <td>Dhaka</td>
      <td>Dhaka</td>
      <td>
        <a class="btn btn-success" href="">Accept</a>
        <a class="btn btn-danger" href="">Reject </a>
      </td>
    </tr>
  </tbody>
  @endforeach
</table>
@endsection