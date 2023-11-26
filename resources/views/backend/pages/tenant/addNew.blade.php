@extends('backend.master')

@section('content')

<form action="{{route('tenant.store')}}" method="post">
  @csrf
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Name</label>
      <input type="text" class="form-control" id="validationDefault01" placeholder="Name" name="name" required>
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Email</label>
      <input type="email" class="form-control" id="validationDefault01" placeholder="Email" name="email" required>
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Phone Number</label>
      <input type="mobile" class="form-control" id="validationDefault01" placeholder="Phone Number" name="phone_number" required>
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Address</label>
      <input type="text" class="form-control" id="validationDefault01" placeholder="Address" name="address" required>
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationDefault01">NID</label>
      <input type="text" class="form-control" id="validationDefault01" placeholder="NID" name="nid" required>
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