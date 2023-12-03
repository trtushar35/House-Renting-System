@extends('frontend.partial.other')

@section('content')

<h2>Search result for : {{ request()->search }} found {{$houses->count()}} houses.</h2>
<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

@if($houses->count()>0)
    @foreach ($houses as $house)

                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->

                            <a href="{{route('single.house',$house->id)}}">
                                <img class="card-img-top" src="{{url('/uploads/'.$house->image)}}" alt="..." />
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