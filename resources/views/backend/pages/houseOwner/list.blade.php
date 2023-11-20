@extends('backend.master')

@section('content')

<h1>House Owner List</h1>

<a href="{{route('houseOwner.addNew')}}" type="button" class="btn btn-success">Add New Owner</a>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>


    </tr>
  </thead>

    @foreach($house_owners as $house_owner)

  <tbody>
    <tr>
      <th scope="row">{{$house_owner->id}}</th>
      <td>{{$house_owner->Name}}</td>
      <td>{{$house_owner->phone_number}}</td>
      <td>{{$house_owner->address}}</td>
      <td>
        <a class="btn btn-success" href="">Edit</a>
        <a class="btn btn-danger" href="">Delete</a>
      </td>
    </tr>
  </tbody>

    @endforeach

</table>
@endsection