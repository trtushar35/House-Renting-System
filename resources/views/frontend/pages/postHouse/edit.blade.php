@extends('frontend.partial.other')

@section('content')

<h1>Edit Your House Details</h1>

<form action="{{route('post.house.update', $houses->id)}}" method="post" enctype="multipart/form-data">
  @csrf



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
      <label for="validationDefault01">Division</label>
      <input type="text" value="{{$houses->division}}" class="form-control" id="validationDefault01" placeholder="Division" name="division" required>
      @error('division')
      <div class="alert alert-danger">{{ $message}}</div>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationDefault01">District</label>
      <input type="text" value="{{$houses->district}}" class="form-control" id="validationDefault01" placeholder="District" name="district" required>
      @error('district')
      <div class="alert alert-danger">{{ $message}}</div>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Thana</label>
      <input type="text" value="{{$houses->thana}}" class="form-control" id="validationDefault01" placeholder="Thana" name="thana" required>
      @error('thana')
      <div class="alert alert-danger">{{ $message}}</div>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Floor Number</label>
      <input type="text" value="{{$houses->floor_number}}" class="form-control" id="validationDefault01" placeholder="Floor Number" name="floor_number" required>
      @error('floor_number')
      <div class="alert alert-danger">{{ $message}}</div>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationDefault01">flat Number</label>
      <input type="text" value="{{$houses->flat_number}}" class="form-control" id="validationDefault01" placeholder="Flat Number" name="flat_number" required>
      @error('flat_number')
      <div class="alert alert-danger">{{ $message}}</div>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Total Bedroom</label>
      <input type="text" value="{{$houses->total_bedroom}}" class="form-control" id="validationDefault01" placeholder="Total Bedroom" name="total_bedroom" required>
      @error('total_bedroom')
      <div class="alert alert-danger">{{ $message}}</div>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Total Bathroom</label>
      <input type="text" value="{{$houses->total_bathroom}}" class="form-control" id="validationDefault01" placeholder="Total Bathroom" name="total_bathroom" required>
      @error('total_bathroom"')
      <div class="alert alert-danger">{{ $message}}</div>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Rent Amount</label>
      <input value="{{$houses->rent_amount}}" type="text" class="form-control" id="validationDefault01" placeholder="Rent Amount in number" name="rent_amount" required>
      @error('rent_amount')
      <div class="alert alert-danger">{{ $message}}</div>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationDefault01">House category</label>
      <select value="{{$houses->category}}" class="form-control" name="category" id="" required>
        <option value="family">Family</option>
        <option value="bachelor">Bachelor</option>
        <option value="office">Office</option>
      </select>
      @error('category')
      <div class="alert alert-danger">{{ $message}}</div>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="available_date">Available Date</label>
      <input type="date" class="form-control" id="available_date" placeholder="Available Date" name="available_date" required>
      @error('available_date')
      <div class="alert alert-danger">{{ $message}}</div>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Summary</label>
      <input value="{{$houses->summary}}" type="text" class="form-control" id="validationDefault01" placeholder="Summary" name="summary">
      @error('summary')
      <div class="alert alert-danger">{{ $message}}</div>
      @enderror
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Image</label>
      <input type="file" class="form-control" id="validationDefault01" placeholder="image" name="image">
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

<script>
  var currentDateTime = new Date();
  var year = currentDateTime.getFullYear();
  var month = (currentDateTime.getMonth() + 1);
  var date = (currentDateTime.getDate() + 1);

  if (date < 10) {
    date = '0' + date;
  }
  if (month < 10) {
    month = '0' + month;
  }

  var dateTomorrow = year + "-" + month + "-" + date;
  var checkinElem = document.querySelector("#available_date");
  var checkoutElem = document.querySelector("#checkout-date");

  checkinElem.setAttribute("min", dateTomorrow);

  checkinElem.onchange = function() {
    checkoutElem.setAttribute("min", this.value);
  }
</script>

@endsection