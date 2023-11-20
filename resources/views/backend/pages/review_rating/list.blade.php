@extends('backend.master')

@section('content')
<h1>Review & Rating List</h1>

<table class="table table-bordered">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>01545</td>
      <td>Dhaka</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>015457</td>
      <td>Tangail</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="1">Larry the Bird</td>
      <td>53445</td>
      <td>Gazipur</td>
    </tr>
  </tbody>
</table>
@endsection