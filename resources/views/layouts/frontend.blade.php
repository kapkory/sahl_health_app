<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="{{ url('frontend/assets/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ url('frontend/assets/style.css') }}" />
    <title>@yield('title','Sahl Health')</title>
</head>
<body>
<div class="container-fluid bg-grey d-none d-md-block text-dark">
    <div class="col-10 mx-auto">
        <div class="container">
            <div class="row px-1 py-2">
                <div class="col-md-10">&nbsp;</div>
                <div class="col-md-2">
                    @guest
                        <a href="{{ url('login') }}" class="nav-link btn btn-sm btn-warning text-light p-2 pl-4 pr-4 float-right">Login</a>
                    @else
                        <a href="{{ url(auth()->user()->role) }}" class="nav-link btn btn-sm btn-warning text-light p-2 pl-4 pr-4 float-right">Dashboard</a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sticky-top bg-light">
    <div class="col-md-10 mx-auto">
        <nav class="navbar navbar-expand-md mb-md-2 mt-2 ">
            <div class="container">
                <a class="navbar-brand hidden-sm navbar-brand-ab" href="">
                    <img style="height:50px;" src="{{ url('frontend/assets/logo.jpeg') }}" alt="logo">
                </a>
{{--                <a href="/" class="navbar-brand text-dark"><h2>Logo</h2></a>--}}
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"
              ><i class="fa fa-bars" aria-hidden="true"></i
                  ></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item p-md-1 m-md-1">
                            <a href="" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item p-md-1 m-md-1">
                            <a href="" class="nav-link">SahlMembership</a>
                        </li>
                        <li class="nav-item p-md-1 m-md-1">
                            <a href="" class="nav-link">Healthcare</a>
                        </li>
                        <li class="nav-item p-md-1 m-md-1">
                            <a href="" class="nav-link">Providers</a>
                        </li>
                        <li class="nav-item p-md-1 m-md-1">
                            <a href="" class="nav-link">Blog</a>
                        </li>
                        <li class="nav-item p-md-1 m-md-1">
                            <a href="" class="nav-link">Pricing</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>

@yield('content')
<footer>
    <div class="container-fluid bg-dark p-4 mt-4 mb-3 text-light">
        <div class="col-md-11 m-1 mx-auto">
            <div class="container pt-md-3">
                <div class="row">
                    <div class="col-6 col-md p-md-3 m-md-2">
                        <p class="pb-md-1">
                            <a href="" class="text-light">Dussit Amet</a>
                        </p>
                        <p class="pb-md-1">
                            <a href="" class="text-light">Veritatis Dol</a>
                        </p>
                        <p class="pb-md-1">
                            <a href="" class="text-light">Commodi Dolor</a>
                        </p>
                        <p class="pb-md-1">
                            <a href="" class="text-light">Beatae Impedit</a>
                        </p>
                    </div>
                    <div class="col-6 col-md p-md-3 m-md-2">
                        <p class="pb-md-1">
                            <a href="" class="text-light">Temporibus</a>
                        </p>
                        <p class="pb-md-1">
                            <a href="" class="text-light">Adipisicing</a>
                        </p>
                        <p class="pb-md-1">
                            <a href="" class="text-light">Consectetur</a>
                        </p>
                        <p class="pb-md-1">
                            <a href="" class="text-light">Ipsun Dolor</a>
                        </p>
                    </div>

                    <div class="col-6 col-md p-md-3 m-md-2">
                        <p class="pb-md-1">
                            <a href="" class="text-light">Lorem Ipsum</a>
                        </p>
                        <p class="pb-md-1">
                            <a href="" class="text-light">Dolor Elit</a>
                        </p>
                        <p class="pb-md-1">
                            <a href="" class="text-light">Temploremsis</a>
                        </p>
                        <p class="pb-md-1">
                            <a href="" class="text-light">Doltris Iluctd</a>
                        </p>
                    </div>

                    <div class="col-6 col-md p-md-3 m-md-2">
                        <p class="pb-md-1">
                            <a href="" class="text-light">Terms of use</a>
                        </p>
                        <p class="pb-md-1">
                            <a href="" class="text-light">Refund Policy</a>
                        </p>
                        <p class="pb-md-1">
                            <a href="" class="text-light">Cookie Policy</a>
                        </p>
                        <p class="pb-md-1">
                            <a href="" class="text-light">Privacy Policy</a>
                        </p>
                    </div>

                    <div class="col-6 col-md p-md-3 m-md-2">
                        <img src="{{ url('frontend/assets/paypal.png') }}" alt="" width="100%" />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="col-11 col-md-10 ml-auto mr-auto pt-2 text-center">
                    <small class="text-light pt-2 mt-2">&copy;SahlHealth {{ date('Y') }}</small
                    >
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{ url('frontend/assets/js/jquery.min.js') }}"></script>
<script src="{{ url('frontend/assets/popper.min.js') }}"></script>
<script src="{{ url('frontend/assets/js/bootstrap.min.js') }}"></script>
</body>
</html>
