<!-- Navbar Start -->
<div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="{{route('home')}}" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="{{url('frontend/')}}/img/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;">
                    </div>
                    <h1 class="m-0 text-primary">House Rent</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="{{route('home')}}" class="nav-item nav-link active">Home</a>
                        @auth
                        <a href="{{route('favorite.list.view',auth()->user()->id)}}" class="nav-item nav-link">Saved Property</a>
                        @endauth
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Property List</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{route('browse.all.property')}}" class="dropdown-item">All Property List</a>
                                <a href="{{route('dhaka.division')}}" class="dropdown-item">Dhaka Division</a>
                                <a href="{{route('khulna.division')}}" class="dropdown-item">Khulna Division</a>
                                <a href="{{route('mymensingh.division')}}" class="dropdown-item">Mymensingh Division</a>
                                <a href="{{route('rajshahi.division')}}" class="dropdown-item">Rajshahi Division</a>
                            </div>
                        </div>
                        <a href="{{route('about')}}" class="nav-item nav-link">About Us</a>
                 
                        @guest
                        <a href="{{route('tenant.login')}}" class="nav-item nav-link">Login</a>
                        <a href="{{route('tenant.registration')}}" id="#registration" class="nav-item nav-link">Registration</a>
                        @endguest

                        @auth

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profile</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{route('profile.view')}}" class="dropdown-item">Profile|{{auth()->user()->role}}</a>
                                <a href="{{route('bookingList.profile', auth()->user()->id)}}" class="dropdown-item">Booking List</a>
                                @if(auth()->user()->role === 'House Owner')
                                <a href="{{route('add.property')}}" class="dropdown-item">Add Property</a>
                                <a href="{{route('post.house.list', auth()->user()->id)}}" class="dropdown-item">Property List</a>
                                @endif
                                <a href="{{route('review.list', auth()->user()->id)}}" class="dropdown-item">Review</a>
                                <a href="{{route('tenant.logout')}}" class="dropdown-item">Logout </a>
                                
                            </div>
                        </div>
                        @endauth
                    </div>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->