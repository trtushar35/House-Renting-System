@extends('frontend.partial.other')

@section('content')
<form action="{{route('store.review')}}" method="post">
    @csrf
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Comments</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="review"></textarea>
  </div>
  <button class="btn btn-success">Submit</button>
</form>
@endsection