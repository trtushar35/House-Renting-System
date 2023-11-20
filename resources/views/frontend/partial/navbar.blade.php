<!-- Navbar Start -->
<div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="{{route('home')}}" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="{{url('frontend/')}}/img/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;">
                    </div>
                    <h1 class="m-0 text-primary">HRMS</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="{{route('home')}}" class="nav-item nav-link active">Home</a>
                        <a href="#" class="nav-item nav-link">About</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Property</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="#" class="dropdown-item">Property List</a>
                                <a href="#" class="dropdown-item">Property Type</a>
                                <a href="#" class="dropdown-item">Property Agent</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="#" class="dropdown-item">Testimonial</a>
                                <a href="#" class="dropdown-item">404 Error</a>
                            </div>
                        </div>
                        <a href="#" class="nav-item nav-link">Contact</a>
                        @guest
                        <a href="{{route('tenant.login')}}" class="nav-item nav-link">Login</a>
                        <a href="{{route('tenant.registration')}}" id="#registration" class="nav-item nav-link">Registration</a>
                        @endguest

                        @auth
                        <a href="{{route('tenant.logout')}}" class="nav-item nav-link">Logout</a>
                        @endauth
                    </div>
                    <a href="" class="btn btn-primary px-3 d-none d-lg-flex">Add Property</a>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->