@extends('frontend.partial.other')

@section('content')

<section class="h-100 gradient-custom">
    <div class="container py-5">
        <div class="row d-flex justify-content-center my-4">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Saved Property List</h5>
                    </div>
                    <div class="card-body">
                        <!-- Single item -->

                        @foreach($favorite as $savedProperty)
                        <div class="row">
                            <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                <!-- Image -->
                                <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                    <img src="{{url('/uploads/'. $savedProperty->house->image)}}" class="w-100" alt="house id:{{$savedProperty->house_id}}" />
                                    <a href="">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                    </a>
                                </div>
                                <!-- Image -->
                            </div>

                            <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                <!-- Data -->
                                <p><strong>House Name: {{$savedProperty->house->house_name}}</strong></p>
                                <p>House Owner Name: {{$savedProperty->house->house_owner_name}}</p>
                                <p>Address: {{$savedProperty->house->house_address}}</p>
                                <p></p>
                                <a href="{{route('favoriteList.single.delete' , $savedProperty->id)}}" type="button" class="btn btn-danger btn-sm me-1 mb-2" data-mdb-toggle="tooltip" title="Remove item">
                                    <i class="fas fa-trash"></i>
                                </a>

                               
                                <a type="button" class="btn btn-primary btn-sm mb-2" href="{{route('single.house.view', $savedProperty->id)}}" title="Move to the wish list">
                                     view
                                </a>
                                <!-- Data -->
                            </div>

                            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                <!-- Quantity -->
                                
                                <!-- Quantity -->

                                <!-- Price -->
                                <p class="text-start text-md-center">
                                    <strong>Rent Amount: {{$savedProperty->house->rent_amount}} BDT</strong>
                                </p>
                                <!-- Price -->
                            </div>
                        </div>
                       
                        <!-- Single item -->

                        <hr class="my-4" />
                        @endforeach
                        <!-- Single item -->
                        
                        <!-- Single item -->
                    </div>
                </div>


            </div>
            
        </div>
    </div>
</section>


@endsection