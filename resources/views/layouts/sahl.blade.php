<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sahl health is an innovative health company that seeks to lower the medical cost incurred by customers by providing effective digital solutions.">
    <title>Sahl Health</title>
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
{{--    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{ url('sahl/assets/fonts/fontawesome/css/all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('sahl/assets/css/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('sahl/assets/css/slick-theme.css') }}" />
    <link rel="stylesheet" href="{{ url('sahl/assets/flag-icon/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ url('sahl/assets/css/theme-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('sahl/assets/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/assets/style.css') }}" />
    <link rel="stylesheet" href="{{ url('sahl/assets') }}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ url('sahl/assets') }}/css/owl.theme.default.css">

    <script src="{{ url('sahl/assets') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ url('sahl/assets') }}/js/bootstrap.bundle.js"></script>

        <script src="{{ url('sahl/assets') }}/js/owl.carousel.min.js"></script>
        <script src="{{ url('sahl/assets') }}/js/jquery.lazy.min.js"></script>

    <style type="text/css">
            @media only screen and (min-width: 600px) {
            .institution_image{
                height: 179px !important;
                width: 269px!important;
            }
        }
        @media only screen and (max-width: 599px) {
            .institution_image{
                height: 95px !important;
                width: 142.5px!important;
            }
        }
        .listing-badge{
            background-color: #313d4f;
            color: white;
            top:0px;
        }
        @media screen and (max-width: 574px) {
            .mobile_disp {
                width: 50%;
                padding-left: 2px;
                padding-right: 0px;

            }
            .mobile1{
                padding: 0px !important;
            }
            .mobile_padding{
                padding: 2px;
            }
            .mobile_heading{
                font-weight: 600;
                font-size: 14px;
                margin-bottom: 0px;
                line-height: 18px;
                overflow-wrap: break-word !important;
            }
        }

        .sh_footer:hover{
            color: grey !important;
        }
    </style>
    <style>
        .bg-dark-myimg{
            background-image: url("{{ url('frontend/assets/sahl/background.svg') }}");
            object-fit: cover;
        }

        @media only screen and (min-width: 992px){
            .sh_home{
                margin-top: -30px !important;padding-top: 30px !important;
                /*padding-bottom: 17px*/
            }
        }

        .navbar-classic .dropdown-toggle::after{
            color: #F07A3B !important;
            margin-top: 0px;
            font-weight: bolder;
        }

        .package_button{
            color: white;
            background-color: #F07A3B;
            border-color: #F07A3B;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 8px;
        }
    </style>
@yield('styles')
<!-- Start of HubSpot Embed Code -->
    <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/6671420.js"></script> <!-- End of HubSpot Embed Code -->
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
                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-12">
                    <nav class="navbar navbar-expand-lg navbar-classic">
                        <a class="navbar-brand" href="{{ url('/') }}"> <img style="height: 60px" src="{{ url('frontend/assets/sahl-logo.png') }}" alt="Sahl Health realtor"></a>
                        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-classic" aria-controls="navbar-classic" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar top-bar mt-0"></span>
                            <span class="icon-bar middle-bar"></span>
                            <span class="icon-bar bottom-bar"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbar-classic">
                            <ul class="navbar-nav ml-4 col-md-10 mt-2 mt-lg-0 mr-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}">
                                        Home
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('about') }}">
                                        About
                                    </a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="menu-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Our Members
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="menu-4">
                                        <li class="dropdown-item">
                                            <a class="dropdown-link" href="{{ url('packages') }}">
                                                Individuals
                                            </a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a class="dropdown-link" href="{{ url('corporate') }}">
                                             Companies
                                            </a>
                                        </li>

                                    </ul>
                                </li>

{{--                                <li class="nav-item dropdown">--}}
{{--                                    <a class="nav-link dropdown-toggle" href="#" id="menu-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                        Our Partners--}}
{{--                                    </a>--}}
{{--                                    <ul class="dropdown-menu" aria-labelledby="menu-4">--}}
{{--                                        <li class="dropdown-item">--}}
{{--                                            <a class="dropdown-link" href="{{ url('partners') }}">--}}
{{--                                                Health Care service provider--}}
{{--                                            </a>--}}
{{--                                        </li>--}}

{{--                                        <li class="dropdown-item">--}}
{{--                                            <a class="dropdown-link" href="{{ url('partners') }}">--}}
{{--                                                Insurance Companies--}}
{{--                                            </a>--}}
{{--                                        </li>--}}

{{--                                        <li class="dropdown-item">--}}
{{--                                            <a class="dropdown-link" href="{{ url('partners') }}">--}}
{{--                                                Health Product Vendor--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('provider-register') }}">
                                        Partners
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('blog') }}">
                                      Health  Blog
                                    </a>
                                </li>

                            </ul>
                            <div class="float-right" style="padding-right: 25px">
                                <a style="font-size: 15px;line-height: 22px;color:#23263e; white-space: nowrap !important" href="{{ url('member-register') }}">Join Us</a>
                            </div>
                            <div class="header-btn d-xl-block" style="margin-right: 10px !important;">


                                @guest
                                    <a href="{{ url('login') }}" class="sh_home btn btn-primary" style="background-color: #F07A3B;border-color: #F07A3B; color: white;">Login</a>
                                @else
                                    <a href="{{ url(auth()->user()->role) }}" class="btn btn-primary" style="background-color: #F07A3B;border-color: inherit; color: white">Dashboard</a>
                                @endguest
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- navigation close -->
    </div>


     @yield('content')


<div class="row"  style="background-color: #335062">
{{--    <div class="footer-dark ">--}}
        <div class="container-fluid footer-dark" style="width: 100% !important;">
            <div class="row pt-3 " style="padding-left: 10% !important;">
            <div class="col-lg-4 col-md-4 col-sm-6  col-xs-5">
                <!-- footer widget  -->
                <div class="footer-widget" style="color: white">
                    <h3 class="footer-widget-title">Legal use</h3>
                    <div class="footer-links">
                        <ul class="list-unstyled" style="color: white;list-style-type: none !important;">
                            <li><a href="{{ url('privacy-policy') }}" style="color: white">Privacy Policy</a></li>
                            <li><a href="{{ url('terms') }}" style="color: white">Terms of Use</a></li>
                            <li><a href="{{ url('advertising-policy') }}" style="color: white">Advertising Policy</a></li>
                            <li><a href="{{ url('cookie-policy') }}" style="color: white">Cookie Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
                    {{--                <!-- footer widget  -->--}}
            <div class="col-lg-4 col-md-4 col-sm-6  col-xs-5">
                <div class="footer-widget">
                    <h3 class="footer-widget-title">SahlHealth </h3>
                    <div class="footer-links">
                        <ul class="list-unstyled" style="color: white; list-style-type: none !important;">
                            <li><a href="{{ url('about') }}" style="color: white">About Us</a></li>
                            <li><a href="{{ url('blog') }}" style="color: white">News</a></li>
                        </ul>
                    </div>
                </div>
            </div>
                    {{--                <!-- footer widget  -->--}}
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <div class="footer-widget">
                    <h3 class="footer-widget-title">Our Partners</h3>
                    <div class="footer-links">
                        <ul class="list-unstyled" style="list-style-type: none !important;">
                            <li><a style="color: white" href="{{ url('partners') }}">Health Service Provider</a></li>
                            <li><a style="color: white" href="{{ url('partners') }}">Health Product Vendors</a></li>
                            <li><a style="color: white" href="{{ url('partners') }}">Digital Health Innovators</a></li>
                        </ul>
                    </div>

                    <div class="social-media pt-2">
                        <h5 class="text-white">Connect with us on Social Media:</h5>

                        <a href="https://www.facebook.com/sahlhealth/"><i class="fab fa-facebook-square fa-2x"></i></a>
                        <a href="https://twitter.com/SahlHealth" class="mx-2"><i class="fab fa-twitter-square fa-2x"></i></a>
                        <a href="https://www.instagram.com/sahlhealth/"><i class="fab fa-instagram fa-2x"></i></a>
                    </div>
                </div>
            </div>
        </div>


        <div class="row tiny-footer mx-0" style="width: 100% !important;">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <p class="tiny-footer-text">Copyright © {{ date('Y') }} Sahlhealth Inc. All rights reserved</p>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class=" float-left ">
                    <p class=" tiny-footer-text text-white">Developed by <a href="https://www.thebhub.co.ke/" style="color: white;" class="sh_footer">Teams@TheBhub</a> </p>
                </div>
            </div>
        </div>

</div>
</div>
</div>
<!-- ============================================================== -->
<!-- end main wrapper -->
<!-- ============================================================== -->
<script src="{{ url('sahl/assets') }}/js/main-js.js"></script>
<script src="{{ url('sahl/assets') }}/select2/select2.full.min.js"></script>
<script src="{{ url('sahl/assets') }}/select2/select2.min.js"></script>
<script src="{{ url('sahl/assets') }}/js/slick.min.js"></script>
@yield('scripts')
<script>
    $(function() {
        $('.lazy').Lazy();
    });

    $('.ajax-post').submit(function (event) {
        event.preventDefault();
        var form = $(this);
        var btn = form.find(".submit-btn");
        btn.prepend('<img class="processing-submit-image" style="height: 50px;margin:-10px !important;" src="{{ url("img/Ripple.gif") }}">');
        btn.attr('disabled', true);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function (response) {
                btn.find('img').remove();
                btn.attr('disabled', false);
                removeError();
                resetForm('ajax-form');
                window.location.href= response.redirect_url;
                // toastr.success('Our administration has been notified of your message. We will respond as soon as possible');
            },
            error: function (xhr, status, error) {
                var btn = form.find(".submit-btn");
                btn.find('img').remove();
                btn.attr('disabled', false);
                if (xhr.status == 422) {
                    form.find('.alert_status').remove();
                    var response = JSON.parse(xhr.responseText).errors;
                    console.log(response);
                    for (field in response) {
                        form.find("input[name='" + field + "']").addClass('is-invalid');
                        form.find("input[name='" + field + "']").closest(".form-group").find('.help-block').remove();
                        form.find("input[name='" + field + "']").closest(".form-group").append('<small class="help-block invalid-feedback">' + response[field] + '</small>');

                        form.find("select[name='" + field + "']").addClass('is-invalid');
                        form.find("select[name='" + field + "']").closest(".form-group").find('.help-block').remove();
                        form.find("select[name='" + field + "']").closest(".form-group").append('<small class="help-block invalid-feedback">' + response[field] + '</small>');

                        form.find("textarea[name='" + field + "']").addClass('is-invalid');
                        form.find("textarea[name='" + field + "']").closest(".form-group").find('.help-block').remove();
                        form.find("textarea[name='" + field + "']").closest(".form-group").append('<small class="help-block invalid-feedback">' + response[field] + '</small>');
                    }

                    jQuery(".invalid-feedback").css('display', 'block')
                    jQuery(".invalid-feedback").css('display', 'block');
                } else if (xhr.status == 406) {
                    form.find('#form-exception').remove();
                    form.find('.alert_status').remove();
                    form.prepend('<div id="form-exception" class="alert alert-warning"><strong>' + xhr.status + '</strong> ' + error + '<br/>' + xhr.responseText + '</div>');
                } else {
                    form.find('#form-exception').remove();
                    form.find('.alert_status').remove();
                    form.prepend('<div id="form-exception" class="alert alert-danger"><strong>' + xhr.status + '</strong> ' + error + '<br/>(' + url + ')</div>');
                }

            },
        });
    });

    jQuery(document).on('click', '.is-invalid', function () {
        $(this).removeClass("is-invalid");
        $(this).closest(".invalid-feedback").remove();
    });
    jQuery(document).on('change', '.is-invalid', function () {
        $(this).removeClass("is-invalid");
        $(this).closest(".invalid-feedback").remove();
    });
    jQuery(document).on('click', '.form-group', function () {
        $(this).find('.help-block').remove();
        $(this).closest(".form-group").removeClass('is-invalid');
    });
    jQuery(document).on('click', '.form-control', function () {
        $(this).find('.help-block').remove();
        $(this).closest(".form-group").removeClass('is-invalid');
    });
    function resetForm(form_class) {
        $("." + form_class).find("input[type=text],textarea,select").val("");
        $("input[name='id']").val('');
    }
    function removeError() {
        setTimeout(function () {
            $("#form-exception").fadeOut();
            $("#form-success").fadeOut();
            $(".alert_status").fadeOut();
        }, 1200);

    }
</script>
</body>

</html>


