@extends('frontend.partial.other')

@section('content')



<!-- Navigation-->

<!-- Product section-->
<section class="py-5">
    <div class="container">
        <div class="row mt-5">

            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card" style="width:700px">


                   

                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        </ol>
                        <div class="carousel-inner">
                            @foreach (explode('|', $singleHouse->image) as $key => $image)
                            <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                            <img class="d-block" style="height: 400px; width:100%;" src="{{ url('/uploads/' . trim($image)) }}" alt="Image {{ $key + 1 }}">  
                            </div>
                            @endforeach
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






                    <div class="m-5">

                    </div>
                    <div class="card-body">
                        <hr>
                        <h4 class="card-title">House Owner Name: {{$singleHouse->house_owner_name}}</h4>
                        <h5 class="card-text">House Name: {{$singleHouse->house_name}}</h5>
                        <h5 class="card-text">House Category: {{$singleHouse->category}}</h5>
                        <hr>
                        <h4>Basic Information</h4>
                        <hr>
                        <h6 class="card-text">Total Bedroom: {{$singleHouse->total_bedroom}}</h6>
                        <h6 class="card-text">Total Bathroom: {{$singleHouse->total_bathroom}}</h6>
                        <h6 class="card-text">Floor Number: {{$singleHouse->floor_number}}</h6>
                        <h6 class="card-text">Flat Number: {{$singleHouse->flat_number}}</h6>
                        <h6 class="card-text">Available From: {{$singleHouse->available_date}}</h6>
                        <h6 class="card-text">Post Date: {{$singleHouse->created_at}}</h6>
                        <hr>
                        <h4>Address</h4>
                        <hr>
                        <h6 class="card-text">Division: {{$singleHouse->house_name}}</h6>
                        <h6 class="card-text">District: {{$singleHouse->district}}</h6>
                        <h6 class="card-text">Thana: {{$singleHouse->thana}}</h6>
                        <h6 class="card-text">Short Address: {{$singleHouse->house_address}}</h6>
                        <hr>
                        <h4>Price</h4>
                        <hr>
                        <h6 class="card-text">Rent Amount: BDT- {{$singleHouse->rent_amount}}</h6>
                        <hr>
                        <div class="d-flex">
                            <a class="btn btn-outline-dark flex-shrink-0" type="button" href="{{route('addTofavorite.list', $singleHouse->id)}}">
                                <i class="bi bi-heart-fill"></i>
                                Save Property
                            </a>
                            <a class="btn btn-outline-dark ms-3 flex-shrink-0" type="button" href="{{route('book.now', $singleHouse->id)}}">
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
<!-- Related items section-->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 align="center" class="fw-bolder mb-4">Similar Houses</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Fancy Product</h5>
                            <!-- Product price-->
                            $40.00 - $80.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Special Item</h5>
                            <!-- Product reviews-->
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            <!-- Product price-->
                            <span class="text-muted text-decoration-line-through">$20.00</span>
                            $18.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Sale Item</h5>
                            <!-- Product price-->
                            <span class="text-muted text-decoration-line-through">$50.00</span>
                            $25.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Popular Item</h5>
                            <!-- Product reviews-->
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            <!-- Product price-->
                            $40.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer-->


@endsection