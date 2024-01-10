@extends('frontend.partial.other')

@section('content')
<div class="container ">
    <div class="mt-5 mb-5">
        <form action="{{route('review.update',$reviews->id)}}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Comments</label>
                <input value="{{$reviews->review}}" class="form-control" id="exampleFormControlTextarea1" rows="3" name="review">
            </div>
            <button class="btn btn-success">Submit</button>
        </form>
    </div>
</div>
@endsection