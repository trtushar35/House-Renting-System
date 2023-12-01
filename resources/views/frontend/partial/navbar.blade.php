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
                        
                        <a href="{{route('favorite.list.view')}}" class="nav-item nav-link">Saved Property</a>
                        
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Property List</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="#" class="dropdown-item">All Property List</a>
                                <a href="#" class="dropdown-item">Dhaka Division</a>
                                <a href="#" class="dropdown-item">Barisal Division</a>
                                <a href="#" class="dropdown-item">Chittagong Division</a>
                                <a href="#" class="dropdown-item">Khulna Division</a>
                                <a href="#" class="dropdown-item">Mymensingh Division</a>
                                <a href="#" class="dropdown-item">Rajshahi Division</a>
                                <a href="#" class="dropdown-item">Rangpur Division</a>
                                <a href="#" class="dropdown-item">Sylhet Division</a>
                            </div>
                        </div>
                        <a href="#" class="nav-item nav-link">Contact Us</a>
                        @guest
                        <a href="{{route('tenant.login')}}" class="nav-item nav-link">Login</a>
                        <a href="{{route('tenant.registration')}}" id="#registration" class="nav-item nav-link">Registration</a>
                        @endguest

                        @auth
                        <a href="{{route('tenant.logout')}}" class="nav-item nav-link">Logout </a>
                        <a href="{{route('profile.view')}}" class="nav-item nav-link"> Profile {{auth()->user()->role}} </a>
                        @endauth
                    </div>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->