@extends('backend.master')

@section('content')
<h1>Payment List</h1>

<table class="table table-bordered">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Payment Method</th>
      <th scope="col">Payment Amount</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>01545</td>
      <td>01545</td>
      <td>
        <a class="btn btn-success" href="">View</a>
        <a class="btn btn-danger" href="">Delete</a>
      </td>
    </tr>
  
  </tbody>
</table>
@endsection