@extends('backend.master')

@section('content')

<div class="container col-md-12">
    <h1 class="mt-3 mb-3">Dashboard</h1>

    <div class="row">
        <div class="col-md-3 d-flex ">
            <div class="card flex-fill shadow">
                <div class="card-body py-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h3 class="mb-2">
                                {{$users}} <i class="fa-solid fa-users" style="margin-left: 200px;"></i>
                            </h3>
                            <p class="mb-2">Total Users</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="card flex-fill shadow">
                <div class="card-body py-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h3 class="mb-2">
                                {{$admins}} <i class="fa-solid fa-users" style="margin-left: 200px;"></i>
                            </h3>
                            <p class="mb-2">Total Admin</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="card flex-fill shadow">
                <div class="card-body py-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h3 class="mb-2">
                                {{$tenants}} <i class="fa-solid fa-users" style="margin-left: 200px;"></i>
                            </h3>
                            <p class="mb-2">Total Tenants</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="card flex-fill shadow">
                <div class="card-body py-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h3 class="mb-2">
                                {{$owners}} <i class="fa-solid fa-users" style="margin-left: 200px;"></i>
                            </h3>
                            <p class="mb-2">Total House Owners</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 d-flex mt-4">
            <div class="card flex-fill shadow">
                <div class="card-body py-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h3 class="mb-2">
                                {{$houses}} <i class="fas fa-building" style="margin-left: 200px;"></i>
                            </h3>
                            <p class="mb-2">Total Flats</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 d-flex mt-4">
            <div class="card flex-fill shadow">
                <div class="card-body py-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h3 class="mb-2">
                                {{$available}} <i class="fas fa-building" style="margin-left: 200px;"></i>
                            </h3>
                            <p class="mb-2">Total Available Flats</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 d-flex mt-4">
            <div class="card flex-fill shadow">
                <div class="card-body py-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h3 class="mb-2">
                                {{$booked}} <i class="fas fa-calendar-alt" style="margin-left: 200px;"></i>
                            </h3>
                            <p class="mb-2">Total Booked Flat</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 d-flex mt-4">
            <div class="card flex-fill shadow">
                <div class="card-body py-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <h3 class="mb-2">
                                {{$bookings}} <i class="fas fa-calendar-alt" style="margin-left: 200px;"></i>
                            </h3>
                            <p class="mb-2">Total Bookings</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection