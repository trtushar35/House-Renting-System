@extends('backend.master')

@section('content')


<h1>Edit Information</h1>


<form action="{{route('users.update', $users->id)}}" method="post" enctype="multipart/form-data">

        @if(session()->has('myError'))
        <p class="alert alert-danger">{{session()->get('myError')}}</p>
        @endif

        @if(session()->has('message'))
        <p class="alert alert-success">{{session()->get('message')}}</p>
        @endif

   @csrf

   @method('put')
  <div class="form-group">
    <label for="">Edit User Name:</label>
    <input value="{{$users->name}}" type="text" class="form-control" id="" placeholder="Enter name" name="user_name" required>
    @error('user_name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

  </div>

  <div class="form-group">
    <label for="">Edit Email: </label>
    <input value="{{$users->email}}" type="email" class="form-control" placeholder="Enter Email" name="user_email" required>
    
    @error('user_email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    
  </div>

  <div class="form-group">
    <label for="">Edit Phone: </label>
    <input value="0{{$users->phone}}" type="number" class="form-control" placeholder="Enter phone number" name="phone" required>    
    @error('phone')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror   
  </div>

  <div class="form-group">
    <label for="">Edit Address: </label>
    <input value="{{$users->address}}" type="text" class="form-control" placeholder="Enter address" name="address" required>    
    @error('address')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror   
  </div>



  <div class="form-group">
    <label for="">Upload Image: </label>
    <input name="user_image" type="file" class="form-control">
  </div>


  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection