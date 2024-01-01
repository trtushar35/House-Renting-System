@extends('backend.master')

@section('content')
<h1>Review List</h1>

<a href="{{route('review.rating.print')}}" class="btn btn-success">Print</a>

<div class="container py-2 mx-auto">
  <table class="table table-bordered">
    <thead>
      <tr>
        <div>
          <th scope="col">Serial No</th>
          <th scope="col">User Id</th>
          <th scope="col">Name</th>
          <th scope="col">Review</th>
          <th scope="col">Action</th>

      </tr>
    </thead>

    @foreach($reviews as $key=>$review)
    <tbody>
      <tr>
        <th scope="row">{{$key+1}}</th>
        <td>{{$review->user->id}}</td>
        <td>{{$review->user->name}}</td>
        <td>{{$review->review}}</td>
        <td>
          <a class="btn btn-success" href="">view</a>
          <a class="btn btn-danger" href="">Delete</a>
        </td>
      </tr>

    </tbody>
    @endforeach
  </table>
</div>
@endsection