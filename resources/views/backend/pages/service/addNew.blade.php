@extends('backend.master')

@section('content')

<form action="{{route('service.store')}}" method="post">
@csrf
  <div class="form-row">
  <div class="col-md-4 mb-3">
      <label for="validationDefault01">Name</label>
      <input type="text" class="form-control" id="validationDefault01" placeholder="House Name" name="taker_name" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Service Type</label>
      <label for="">Select Service:</label>
      <select required class="form-control" name="service_type" id="" required> 
        <option value="security">Security</option>
        <option value="plumbling">Plubmbing</option>
        <option value="electricity">Electricity</option>
      </select>
    </div>
    <div class="col-md-4 mb-3">
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