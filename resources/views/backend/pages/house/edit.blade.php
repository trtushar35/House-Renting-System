@extends('backend.master')

@section('content')

<h1>Edit Your House Details</h1>

<form action="{{route('house.update', $houses->id)}}" method="post" enctype="multipart/form-data">  
    @csrf

    @method('put')

  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">House Name</label>
      <input value="{{$houses->house_name}}" type="text" class="form-control" id="validationDefault01" placeholder="House Name" name="house_name" required>
      @error('house_name')
      <div class="alert alert-danger">{{ $message}}</div>
      @enderror
    </div>
    

    <div class="col-md-4 mb-3">
      <label for="validationDefault01">House Owner Name</label>
      <input value="{{$houses->house_owner_name}}" type="text" class="form-control" id="validationDefault01" placeholder="House Owner Name" name="house_owner_name" required>
      @error('house_owner_name')
      <div class="alert alert-danger">{{ $message}}</div>
      @enderror
    </div>
    
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">House Address</label>
      <input value="{{$houses->house_address}}" type="text" class="form-control" id="validationDefault01" placeholder="House Address" name="house_address" required>
      @error('house_address')
      <div class="alert alert-danger">{{ $message}}</div>
      @enderror
    </div>
    

    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Total Floor</label>
      <input value="{{$houses->total_floor}}" type="text" class="form-control" id="validationDefault01" placeholder="Total Flat" name="total_floor" required>
      @error('total_floor')
      <div class="alert alert-danger">{{ $message}}</div>
      @enderror
    </div>
    

    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Total Flat</label>
      <input value="{{$houses->total_flat}}" type="text" class="form-control" id="validationDefault01" placeholder="Total Flat" name="total_flat" required>
      @error('total_flat')
      <div class="alert alert-danger">{{ $message}}</div>
      @enderror
    </div>


    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Image</label>
      <input type="file" class="form-control" id="validationDefault01" placeholder="Total Flat" name="image" required>
      @error('image')
      <div class="alert alert-danger">{{ $message}}</div>
      @enderror
    </div>
    
    
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
      <label class="form-check-label" for="invalidCheck2">
        Agree to terms and conditions
      </label>
    </div>
  </div>
  
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>


@endsection