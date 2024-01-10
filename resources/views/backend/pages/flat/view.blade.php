@extends('backend.master')

@section('content')

<h1>View House Details</h1>

<div class="container">
    <div class="row dd-flex justify-content-center">
        <div class="col-md-8">
            <div class="card px-3">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="ms-1 mt-3"><strong>House Name: </strong>{{$houses->house_address}}</h4>
                        <h4 class="ms-1"><strong>House Owner Name:</strong> {{$houses->house_owner_name}}</h4>
                        <h4 class="ms-1"><strong>Floor Number:</strong> {{$houses->floor_number}}</h4>
                        <h4 class="ms-1"><strong>Flat Number:</strong> {{$houses->flat_number}}</h4>
                        <h4 class="ms-1"><strong>Total Bathroom:</strong> {{$houses->total_bathroom}}</h4>
                        <h4 class="ms-1"><strong>Total Bathroom:</strong> {{$houses->total_bathroom}}</h4>
                        <h4 class="ms-1"><strong>House short Address:</strong> {{$houses->house_address}}</h4>
                        <h4 class="ms-1"><strong>Rent Amount:</strong> {{$houses->rent_amount}} BDT</h4>

                    </div>
                    <div class="col-md-6">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            </ol>
                            <div class="carousel-inner">
                                @if($houses->image)
                                @foreach (explode('|', $houses->image) as $key => $image)
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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection