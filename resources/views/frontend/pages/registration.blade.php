@extends('frontend.partial.other')

@section('content')

<div class="container col-md-5 mt-5 mb-5 py-3 card shadow">
    <form action="{{route('tenant.regform.store')}}" method="post">
        @csrf


        <div class="form-group">
            <label for="exampleInputEmail1">Select Role</label>
            <select class="form-control" name="role" id="" required>
                <option value="tenant">Tenant</option>
                <option value="House Owner">House Owner</option>
            </select>
            @error('role')
            <div class="alert alert-danger">{{ $message}}</div>
            @enderror
        </div>
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
            <label for="exampleInputEmail1">Phone Number</label>
            <input type="integer" class="form-control" id="exampleInputEmail1" name="phone" placeholder="Enter phone number" required>
            @error('phone')
            <div class="alert alert-danger">{{ $message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="address" placeholder="Enter your address" required>
            @error('address')
            <div class="alert alert-danger">{{ $message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
            @error('password')
            <div class="alert alert-danger">{{ $message}}</div>
            @enderror
        </div>
        <div class="py-1"><button type="submit" class="btn btn-primary">Submit</button></div>

    </form>
</div>
@endsection