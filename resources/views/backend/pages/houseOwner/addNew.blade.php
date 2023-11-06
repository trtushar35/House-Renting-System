@extends('master')

@section('content')

<form action="{{route('houseOwner.store')}}" method="post">
@csrf
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Name</label>
      <input type="text" class="form-control" id="validationDefault01" placeholder="Name" name="Name" >
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Phone Number</label>
      <input type="text" class="form-control" id="validationDefault01" placeholder="01*********" name="phone_number" >
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Address</label>
      <input class="form-control" id="" placeholder="Address" name="address">
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