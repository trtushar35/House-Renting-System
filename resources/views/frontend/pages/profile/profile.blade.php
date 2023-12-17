@extends('frontend.partial.other')

@section('content')

<div class="container">
    <div class="main-body">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">

                <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->



        <div class="row gutters-sm">

            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">

                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <div>
                                            <img src="{{url('/uploads/'. auth()->user()->image)}}" alt="Upload Image" class="rounded-circle" width="150">
                                        </div>
                                        <div class="mt-3">

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ auth()->user()->name }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ auth()->user()->email }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{auth()->user()->phone}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{auth()->user()->address}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm">
                                <a class="btn btn-info " href="{{route('edit.profile', auth()->user()->id)}}">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>

<hr>


@endsection