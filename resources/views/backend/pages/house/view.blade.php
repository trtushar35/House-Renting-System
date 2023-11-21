@extends('backend.master')

@section('content')

<h1>View House Details</h1>

<div class="container">
    <div class="row dd-flex justify-content-center">
        <div class="col-md-8">
            <div class="card px-3">
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex flex-row align-items-center"> <i class='fa fa-apple fs-1'></i>
                         <span class="fw-bold ms-1 fs-5">{{$houses->house_name}}</span> </div>
                        <h1 class="fs-1 ms-1 mt-3">{{$houses->house_address}}</h1>
                        <div class="mt-5 radio-buttons"> <label class="radio"> <input type="radio" name="code" value="grey" checked> <span></span> </label> <label class="radio"> <input type="radio" name="code" value="pink"> <span></span> </label> <label class="radio"> <input type="radio" name="code" value="black"> <span></span> </label> </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-image"> <img src="{{url('/uploads/'.$houses->image)}}"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection