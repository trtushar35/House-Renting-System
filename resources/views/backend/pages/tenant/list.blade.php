@extends('backend.master')

@section('content')
<h1>Tenants List</h1>

<a href="{{route('tenant.addNew')}}" type="button" class="btn btn-success">Add Tenant Details</a>

<table class="table table-bordered">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Address</th>
      <th scope="col">NID</th>
      <th scope="col">Action</th>
    </tr>
  </thead>


  @foreach ($tenants as $tenant)

  <tbody>
    <tr>
      <th scope="row">{{$tenant->id}}</th>
      <td>{{$tenant->name}}</td>
      <td>{{$tenant->email}}</td>
      <td>{{$tenant->phone_number}}</td>
      <td>{{$tenant->address}}</td>
      <td>{{$tenant->nid}}</td>
      <td>
        <a class="btn btn-success" href="">Edit</a>
        <a class="btn btn-danger" href="">Delete</a>
      </td>
    </tr>

    @endforeach
  </tbody>

</table>

@endsection