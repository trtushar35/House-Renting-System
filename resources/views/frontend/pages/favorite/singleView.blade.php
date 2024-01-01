@extends('frontend.partial.other')

@section('content')


<section class="py-5">
    <div class="container">
        <div class="row mt-5">

            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card" style="width:700px">
                    <div class="m-5">
                        @foreach (explode('|', $singleHouse->house->image) as $image)
                        <img class="card-img-top" style="width: 600px;" src="{{url('/uploads/'.trim($image))}}" alt="Card image">
                        @endforeach
                    </div>
                    <div class="card-body">
                        <hr>
                        <h4 class="card-title">House Owner Name: {{$singleHouse->house->house_owner_name}}</h4>
                        <h5 class="card-text">House Name: {{$singleHouse->house->house_name}}</h5>
                        <h5 class="card-text">House Category: {{$singleHouse->house->category}}</h5>
                        <hr>
                        <h4>Basic Information</h4>
                        <hr>
                        <h6 class="card-text">Total Bedroom: {{$singleHouse->house->total_bedroom}}</h6>
                        <h6 class="card-text">Total Bathroom: {{$singleHouse->house->total_bathroom}}</h6>
                        <h6 class="card-text">Floor Number: {{$singleHouse->house->floor_number}}</h6>
                        <h6 class="card-text">Flat Number: {{$singleHouse->house->flat_number}}</h6>
                        <h6 class="card-text">Available From: {{$singleHouse->house->available_date}}</h6>
                        <h6 class="card-text">Post Date: {{$singleHouse->house->created_at}}</h6>
                        <hr>
                        <h4>Address</h4>
                        <hr>
                        <h6 class="card-text">Division: {{$singleHouse->house->house_name}}</h6>
                        <h6 class="card-text">District: {{$singleHouse->house->district}}</h6>
                        <h6 class="card-text">Thana: {{$singleHouse->house->thana}}</h6>
                        <h6 class="card-text">Short Address: {{$singleHouse->house->house_address}}</h6>
                        <hr>
                        <h4>Price</h4>
                        <hr>
                        <h6 class="card-text">Rent Amount: BDT- {{$singleHouse->house->rent_amount}}</h6>
                        <hr>
                        <div class="d-flex">
                            <a class="btn btn-outline-dark flex-shrink-0" type="button" href="{{route('book.now', $singleHouse->id)}}">
                                <i class="bi bi-bookmark-check-fill"></i>
                                Book Now
                            </a>
                        </div>
                    </div>
                </div>

            </div>


            <div class="col-md-3"></div>
        </div>
    </div>
</section>




@endsection