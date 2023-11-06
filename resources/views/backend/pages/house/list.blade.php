@extends('master')

@section('content')

<h1>House List</h1>

<a href="{{route('house.addNew')}}" type="button" class="btn btn-success">Add New House</a>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">House Name</th>
      <th scope="col">House Owner Name</th>
      <th scope="col">Address</th>
      <th scope="col">Total Floor</th>
      <th scope="col">Total Flat</th>
      <th scope="col">Action</th>


    </tr>
  </thead>

    @foreach($houses as $key=>$house)

  <tbody>
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$house->house_name}}</td>
      <td>{{$house->house_owner_name}}</td>
      <td>{{$house->house_address}}</td>
      <td>{{$house->total_floor}}</td>
      <td>{{$house->total_flat}}</td>
      <td>
        
          <a class="btn btn-success" href="">Edit</a>
          <a class="btn btn-danger" href="">Delete</a>

      </td>
    </tr>
  </tbody>


    @endforeach

</table>

{{$houses->links()}}

@endsection