@extends('backend.master')

@section('content')

<h1>Dashboard</h1>

<div class="row">
    <div class="col-md-4 d-flex ">
        <div class="card flex-fill">
            <div class="card-body py-4">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h3 class="mb-2">{{$users}}</h3>
                        <p class="mb-2">Total Users</p>
                        <div class="mb-0">
                            <!-- <span class="badge badge-soft-success me-2"> +5.35% </span>
                            <span class="text-muted">Since last week</span> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 d-flex ">
        <div class="card flex-fill">
            <div class="card-body py-4">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h3 class="mb-2">{{$tenants}}</h3>
                        <p class="mb-2">Total Tenants</p>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 d-flex">
        <div class="card flex-fill">
            <div class="card-body py-4">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h3 class="mb-2">{{$owners}} </h3>
                        <p class="mb-2">Total House Owners</p>


                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 d-flex py-5">
        <div class="card flex-fill">
            <div class="card-body py-4">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                        <h3 class="mb-2">{{$houses}}</h3>
                        <p class="mb-2">Total Houses</p>
                        <div class="mb-0">
                            <!-- <span class="badge badge-soft-success me-2"> +5.35% </span>
                            <span class="text-muted">Since last week</span> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection