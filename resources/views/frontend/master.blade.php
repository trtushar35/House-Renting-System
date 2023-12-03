<!DOCTYPE html>
<html lang="en">

<head>

    @notifyCss
    <meta charset="utf-8">
    <title>House Rent</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{url('frontend/')}}/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{url('frontend/')}}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{url('frontend/')}}/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{url('frontend/')}}/css/style.css" rel="stylesheet">

</head>

<body>
    <div class="container-xxl bg-white p-0">




        @include('frontend.partial.navbar')





        <!-- header -->

        @include('frontend.partial.header')

        <!-- End header -->




        <!-- Search Start -->
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
        <!-- Search End -->






        <!-- Property List Start -->
        <div class="container-xxl py-5">

            <!-- pages__home -->
            @include('notify::components.notify')

            @yield('content')


        </div>
        <!-- Property List End -->


        <!-- callAgents to Action Start -->
        @include('frontend.partial.callAgents')
        <!-- Call to Action End -->


        <!-- Team Start -->

        <!-- Team End -->


        <!-- Testimonial Start -->
        @include('frontend.partial.review')
        <!-- Testimonial End -->


        <!-- Footer Start -->
        @include('frontend.partial.footer')
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('frontend/')}}/lib/wow/wow.min.js"></script>
    <script src="{{url('frontend/')}}/lib/easing/easing.min.js"></script>
    <script src="{{url('frontend/')}}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{url('frontend/')}}/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{url('frontend/')}}/js/main.js"></script>

    @notifyJs
</body>

</html>