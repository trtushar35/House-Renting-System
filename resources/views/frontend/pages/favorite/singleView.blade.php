@extends('frontend.partial.other')

@section('content')


<section class="py-5">
    <div class="container">
        <div class="row mt-5">

            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card" style="width:700px">
                    <div class="m-5">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            </ol>
                            <div class="carousel-inner">
                                @if($singleHouse->house->image)
                                @foreach (explode('|', $singleHouse->house->image) as $key => $image)
                                <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                    <img class="d-block" style="height: 400px; width:100%;" src="{{ url('/uploads/' . trim($image)) }}" alt="Image {{ $key + 1 }}">
                                </div>
                                @endforeach
                                @else
                                <img class="d-block" style="height: 400px; width:100%;" src="{{ url('/uploads/noimage.jpg') }}" alt="Image">
                                @endif
                            </div>
                            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"> </span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
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
                            <button class="btn btn-outline-dark ms-3 flex-shrink-0" type="button" data-toggle="modal" data-target="#exampleModalCenter">
                                <i class="bi bi-bookmark-check-fill"></i>
                                Book Now
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Note</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('book.now', $singleHouse->id) }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <textarea class="form-control" rows="3" placeholder="Note (Optional)" name="message"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Book Now</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="col-md-3"></div>
        </div>
    </div>
</section>




@endsection