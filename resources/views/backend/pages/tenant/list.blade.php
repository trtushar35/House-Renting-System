@extends('master')

@section('content')
<h1>Tenants List</h1>

<a href="{{route('tenant.addNew')}}" type="button" class="btn btn-success">Add Tenant Details</a>

<table class="table table-bordered">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">username</th>
      <th scope="col">city</th>
      <th scope="col">state</th>
      <th scope="col">zip</th>
      <th scope="col">Action</th>
    </tr>
  </thead>


  @foreach ($tenants as $tenant)

  <tbody>
    <tr>
      <th scope="row">{{$tenant->id}}</th>
      <td>{{$tenant->name}}</td>
      <td>{{$tenant->username}}</td>
      <td>{{$tenant->city}}</td>
      <td>{{$tenant->State}}</td>
      <td>{{$tenant->Zip}}</td>
      <td>
        <a class="btn btn-success" href="">Edit</a>
        <a class="btn btn-danger" href="">Delete</a>
      </td>
    </tr>

    @endforeach
  </tbody>

</table>

@endsection