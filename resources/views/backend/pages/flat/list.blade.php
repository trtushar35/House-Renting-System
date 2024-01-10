@extends('backend.master')

@section('content')

<h1>Flat List</h1>
<a href="{{route('flat.print')}}" class="btn btn-success">Print</a>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">House Name</th>
      <th scope="col">House Owner Name</th>
      <th scope="col">Floor Number</th>
      <th scope="col">Flat Number</th>
      <th scope="col">Total Bedroom</th>
      <th scope="col">Total Bathroom</th>
      <th scope="col">Rent Amount</th>
      <th scope="col">Categories</th>
      <th scope="col">Image</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>


    </tr>
  </thead>

  @foreach($Flats as $key=>$house)

  <tbody>
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$house->house_name}}</td>
      <td>{{$house->house_owner_name}}</td>
      <td>{{$house->floor_number}}</td>
      <td>{{$house->flat_number}}</td>
      <td>{{$house->total_bedroom}}</td>
      <td>{{$house->total_bathroom}}</td>
      <td>{{$house->rent_amount}}</td>
      <td>{{$house->category}}</td>
      <td>
        @if($house->image)
        @foreach (explode('|', $house->image) as $image)

        <img class="d-block" style="height: 50px; width:100%;" src="{{ url('/uploads/' . trim($image)) }}" alt="Image">
        <br>
        @endforeach
        @endif
      </td>
      <td>{{$house->status}}</td>
      <td>

        <a class="btn btn-success" href="{{route('house.edit', $house->id)}}">Edit</a>
        <a class="btn btn-warning" href="{{route('flat.view', $house->id)}}">View</a>
        <a class="btn btn-danger" href="{{route('house.delete', $house->id)}}">Delete</a>

      </td>
    </tr>
  </tbody>


  @endforeach

</table>

@endsection