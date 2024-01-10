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
              @if($singleHouse->image)
              @foreach (explode('|', $singleHouse->image) as $key => $image)
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

              <!-- Button trigger modal -->
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
<!-- Related items section-->
<section class="py-1 bg-light">
  <div class="container px-4 px-lg-5 mt-3 mb-3">
    <h2 class="fw-bolder mb-4 text-center">Similar Houses</h2>
    <div class="tab-content">
      <div id="tab-1" class="tab-pane fade show p-0 active">

        <div class="row g-4">

          @foreach($similarHouses as $house)

          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">

            <a href="{{route('single.house', $house->id)}}">
              <div class="property-item rounded overflow-hidden">
                <div class="position-relative overflow-hidden">
                  <div class="box" style="height: 250px; width:100%;">
                    @if($house->image)
                    @foreach (explode('|', $house->image) as $image)

                    <img class="d-block" style="height: 250px; width:100%;" src="{{ url('/uploads/' . trim($image)) }}" alt="Image">

                    @break
                    @endforeach
                    @endif


                  </div>
                  <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">{{$house->category}}</div>
                  <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Appartment</div>
                </div>
                <div class="p-4 pb-0">
                  <h5 class="text-primary mb-3">{{$house->rent_amount}}.bdt</h5>
                  <a class="d-block h5 mb-2" href="{{route('single.house', $house->id)}}">{{$house->house_name}}</a>
                  <p><i class="fa fa-map-marker-alt text-primary me-2">{{$house->house_address}}</i></p>
                </div>
                <div class="d-flex border-top">
                  <small class="flex-fill text-center border-end py-2"><i class="bi bi-calendar2-check-fill"></i> Available From: {{$house->available_date}}</small>
                  <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>{{$house->total_bedroom}}</small>
                  <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>{{$house->total_bathroom}}</small>
                </div>

              </div>
            </a>
          </div>

          @endforeach

          @forelse($similarHouses as $house)

          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <!-- Similar house card content -->
          </div>

          @empty

          <div class="col-12 text-center">
            <p>No similar houses found.</p>
          </div>

          @endforelse


          <div class="col-12 text-center">
            <a class="btn btn-primary py-3 px-5" href="{{route('browse.all.property')}}">Browse More Property</a>
          </div>
        </div>

      </div>


    </div>
  </div>
</section>
<!-- Footer-->


@endsection