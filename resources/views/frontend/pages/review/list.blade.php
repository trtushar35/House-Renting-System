@extends('frontend.partial.other')
@section('content')

<div class="container col-md-10">
    <div class="col">
        <div class="row">
            <h1>Review List</h1>
            @if(count($reviews) > 0)
            <table class="table table-bordered">
                <tr>
                    <th scope="col">Serial </th>
                    <th scope="col">Review </th>
                    <th scope="col">Action </th>
                </tr>
                @foreach($reviews as $key=>$review)
                <tbody>
                    <tr>
                        <td> {{$key+1}}</td>
                        <td >{{$review->review}}</td>
                        <td>
                            <a class="btn btn-success" href="{{route('review.edit', $review->id)}}">Edit</a>
                            <a class="btn btn-danger" href="{{route('review.delete', $review->id)}}">Delete</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            @else
                <h4>No review given.</h4>
            @endif
        </div>
    </div>
</div>
@endsection