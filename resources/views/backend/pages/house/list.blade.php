@extends('backend.master')

@section('content')

<h1>House List</h1>

<a href="{{route('house.addNew')}}" type="button" class="btn btn-success">Add New House</a>
<a href="{{route('house.list.print')}}" type="button" class="btn btn-success">Print</a>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">House Name</th>
      <th scope="col">House Owner Name</th>
      <th scope="col">Address</th>
      <th scope="col">Division</th>
      <th scope="col">District</th>
      <th scope="col">Thana/Area</th>
      <th scope="col">Floor Number</th>
      <th scope="col">Flat Number</th>
      <th scope="col">Total Bedroom</th>
      <th scope="col">Total Bathroom</th>
      <th scope="col">Rent Amount</th>
      <th scope="col">Categories</th>
      <th scope="col">Available Date</th>
      <th scope="col">Summary</th>
      <th scope="col">Image</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>


    </tr>
  </thead>

  @foreach($houses as $house)

  <tbody>
    <tr>
      <th scope="row">{{$house->id}}</th>
      <td>{{$house->house_name}}</td>
      <td>{{$house->house_owner_name}}</td>
      <td>{{$house->house_address}}</td>
      <td>{{$house->division}}</td>
      <td>{{$house->district}}</td>
      <td>{{$house->thana}}</td>
      <td>{{$house->floor_number}}</td>
      <td>{{$house->flat_number}}</td>
      <td>{{$house->total_bedroom}}</td>
      <td>{{$house->total_bathroom}}</td>
      <td>{{$house->rent_amount}}</td>
      <td>{{$house->category}}</td>
      <td>{{$house->available_date}}</td>
      <td>{{$house->summary}}</td>
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
        <a class="btn btn-warning" href="{{route('house.view', $house->id)}}">View</a>
        <a class="btn btn-danger" href="{{route('house.delete', $house->id)}}">Delete</a>

      </td>
    </tr>
  </tbody>


  @endforeach

</table>

{{$houses->links()}}

@endsection