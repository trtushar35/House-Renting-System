@extends('frontend.partial.other')

@section('content')

<div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
    <div class="container">
        <form action="{{route('house.search')}}" method="get">
            <div class="row g-2">
                <div class="col-md-10">
                    <div class="row g-2">
                        <div class="">
                            <input type="text" class="form-control" placeholder="Search..." name="search">
                        </div>

                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-dark border-0 w-100 py-3">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>

<h2>Search result for : {{ request()->search }} found {{$houses->count()}} houses.</h2>
<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

    @if($houses->count()>0)
    @foreach ($houses as $house)

    <div class="col mb-5">
        <div class="card h-100">
            <!-- Sale badge-->
            <!-- Product image-->

            <a href="{{route('single.house',$house->id)}}">
                <img class="card-img-top" style="width:300px; height:200px;" src="{{url('/uploads/'.$house->image)}}" alt="..." />
                <!-- Product details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!-- Product name-->
                        <h5 class="fw-bolder">{{$house->house_name}}</h5>
                        <!-- Product reviews-->

                        <!-- Product price-->
                        <!-- <span class="text-muted text-decoration-line-through">$20.00</span> -->
                        Location: {{ $house->house_address }} <br>
                        Rent Amount: {{ $house->rent_amount }} .BDT
                    </div>
                </div>
            </a>

            <!-- Product actions-->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            </div>
        </div>
    </div>
    @endforeach

    @else
    <h1>No house found.</h1>
    @endif


</div>
@endsection