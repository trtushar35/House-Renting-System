@extends('frontend.partial.other')

@section('content')

<form action="{{route('update.profile', $users->id)}}" method="post" enctype="multipart/form-data">
        @csrf

        @method('put')

    <div class="container">
        <div class="main-body">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
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
                                            <input type="file" class="form-control" id="validationDefault01" class="rounded-circle" width="150" placeholder="image" name="image">
                                            </div>
                                            <div class="mt-3">
                                                <h4>{{ auth()->user()->name}}</h4>
                                                <p class="text-secondary mb-1">{{auth()->user()->role}}</p>
                                                <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
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
                                    <input type="text" value="{{$users->name}}" placeholder="Update Your Name" name="name" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <input type="text" value="{{$users->email}}" placeholder="Update Your Name" name="email" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Role</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <input type="text" value="{{$users->email}}" placeholder="Update Your Name" name="role" required>
                                </div>
                            </div>
                            <hr>
                            
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button class="btn btn-info ">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</form>

@endsection