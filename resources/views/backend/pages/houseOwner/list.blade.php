@extends('backend.master')

@section('content')

<h1>House Owner List</h1>


<a href="{{route('houseOwner.print')}}" type="button" class="btn btn-success">Print</a>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>


    </tr>
  </thead>

    @foreach($house_owners as $house_owner)

  <tbody>
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$house_owner->name}}</td>
      <td>{{$house_owner->email}}</td>
      <td>0{{$house_owner->phone}}</td>
      <td>{{$house_owner->address}}</td>
      <td>
        <a class="btn btn-success" href="{{route('users.edit', $house_owner->id)}}">Edit</a>
        <a class="btn btn-danger" href="{{route('users.delete',$house_owner->id)}}">Delete</a>
      </td>
    </tr>
  </tbody>

    @endforeach

</table>
@endsection