@extends('frontend.partial.other')

@section('content')
<form action="{{route('tenant.regform.store')}}" method="post">
    @csrf


    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Your Name" required>
        @error('name')
        <div class="alert alert-danger">{{ $message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email" required>
        @error('email')
        <div class="alert alert-danger">{{ $message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
        @error('email')
        <div class="alert alert-danger">{{ $message}}</div>
        @enderror
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection