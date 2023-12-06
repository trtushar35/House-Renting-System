@extends('backend.master')

@section('content')
<h1>Service List</h1>
<a href="{{route('service.create')}}" class="btn btn-success">Create New Service</a>
<table class="table table-bordered">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Service Taker</th>
      <th scope="col">Service Type</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  @foreach($services as $key=>$service)
  <tbody>
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$service->taker_name}}</td>
      <td>{{$service->service_type}}</td>
      <td>
        <a href="" class="btn btn-success">Edit</a>
        <a href="" class="btn btn-danger">Delete</a>
      </td>
    </tr>
  </tbody>
  @endforeach
</table>
@endsection