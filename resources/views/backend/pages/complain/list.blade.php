@extends('backend.master')

@section('content')
<h1>Complain List</h1>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">House Details</th>
      <th scope="col">Complain</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>Ola</td>
      <td>
        <a class="btn btn-success" href="">View</a>
        <a class="btn btn-danger" href="">Delete</a>
      </td>
    </tr>
    
  </tbody>
</table>
@endsection