<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Spacely a directory and listing HTML website template. Spacely a design system for real estate, office space and realtor. Get bootstrap based design system.">
    <title>Sahl Health</title>
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('sahl/assets/fonts/fontawesome/css/all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('sahl/assets/css/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('sahl/assets/css/slick-theme.css') }}" />
    <link rel="stylesheet" href="{{ url('sahl/assets/flag-icon/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ url('sahl/assets/css/theme-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('sahl/assets/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/assets/style.css') }}" />

</head>

<body>
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<div class="main-wrapper">
    <!-- header start -->
    <div class="header-classic">
        <!-- navigation start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <nav class="navbar navbar-expand-lg navbar-classic">
                        <a class="navbar-brand" href="{{ url('/') }}"> <img style="height: 60px" src="{{ url('frontend/assets/sahl-logo.jpeg') }}" alt="Sahl Health realtor"></a>
                        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-classic" aria-controls="navbar-classic" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar top-bar mt-0"></span>
                            <span class="icon-bar middle-bar"></span>
                            <span class="icon-bar bottom-bar"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbar-classic">
                            <ul class="navbar-nav ml-auto mt-2 mt-lg-0 mr-3">
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="{{ url('/') }}" id="menu-1">
                                        Home
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        Blogs
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        Dashboard
                                    </a>
                                </li>
                            </ul>
                            <div class="header-btn d-xl-block d-lg-none">
                                <a href="{{ url('login') }}" class="btn btn-outline-primary">Login</a>
                                <a href="#" class="btn btn-primary"><i class="fas fa-plus"></i>List a space</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- navigation close -->
    </div>


     @yield('content')


    <div class="footer-dark">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                    <!-- footer widget  -->
                    <div class="footer-widget">
                        <div class="brand-logo"><img style="height: 60px" src="{{ url('frontend/assets/sahl-logo.jpeg') }}" alt="spacely realtor directory listing bootstrap template"></div>
                        <p class="footer-widget-text">Spacely a Directory Listing HTML Website Template. Its complete design systems for your real estate or realtor project. Its build with Bootstrap framework.</p>
                        <div class="footer-location">
                            <p class="phone-numbers">1800 123 345 789</p>
                            <p class="address">3 Doris St, North Sydney, NSW 2060</p>
                        </div>

                    </div>
                </div>
                <!-- footer widget  -->
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-6">
                    <div class="footer-widget">
                        <h3 class="footer-widget-title">Type of spaces</h3>
                        <div class="footer-links">
                            <ul class="list-unstyled">
                                <li><a href="#">Coworking space</a></li>
                                <li><a href="#">Meeting space</a></li>
                                <li><a href="#">Office space</a></li>
                                <li><a href="#">Retail Space</a></li>
                                <li><a href="#">Event space</a></li>
                                <li><a href="#">Virtual Space</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- footer widget  -->
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-6">
                    <div class="footer-widget">
                        <h3 class="footer-widget-title">Company</h3>
                        <div class="footer-links">
                            <ul class="list-unstyled">
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Clients</a></li>
                                <li><a href="#">Team</a> </li>
                                <li><a href="#">Help Center</a></li>
                                <li><a href="#">Press</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- footer widget  -->
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="footer-widget">

                    </div>
                    <!-- footer widget  -->
                </div>
            </div>
        </div>
        <!-- tiny footer  -->
        <div class="tiny-footer">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p class="tiny-footer-text">Copyright © 2020 Spacely Companies Inc. All rights reserved</p>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="tiny-footer-links">
                            <ul>
                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">Terms</a></li>
                                <li><a href="#">Cookies</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer section close  -->
    </div>
    <!-- footer section close -->
</div>

<!-- ============================================================== -->
<!-- end main wrapper -->
<!-- ============================================================== -->
<script src="{{ url('sahl/assets') }}/js/jquery-3.3.1.min.js"></script>
<script src="{{ url('sahl/assets') }}/js/bootstrap.bundle.js"></script>
<script src="{{ url('sahl/assets') }}/js/main-js.js"></script>
<script src="{{ url('sahl/assets') }}/select2/select2.full.min.js"></script>
<script src="{{ url('sahl/assets') }}/select2/select2.min.js"></script>
<script src="{{ url('sahl/assets') }}/js/slick.min.js"></script>
</body>

</html>


