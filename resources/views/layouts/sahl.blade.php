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
    <link rel="stylesheet" href="{{ url('sahl/assets') }}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ url('sahl/assets') }}/css/owl.theme.default.css">

    <script src="{{ url('sahl/assets') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ url('sahl/assets') }}/js/bootstrap.bundle.js"></script>

        <script src="{{ url('sahl/assets') }}/js/owl.carousel.min.js"></script>
    @yield('styles')
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
    </style>
    <style>
        .bg-dark-myimg{
            background-image: url("{{ url('frontend/assets/sahl/background.svg') }}");
            object-fit: cover;
        }
    </style>
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
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <nav class="navbar navbar-expand-lg navbar-classic">
                        <a class="navbar-brand" href="{{ url('/') }}"> <img style="height: 60px" src="{{ url('frontend/assets/sahl-logo.png') }}" alt="Sahl Health realtor"></a>
                        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-classic" aria-controls="navbar-classic" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar top-bar mt-0"></span>
                            <span class="icon-bar middle-bar"></span>
                            <span class="icon-bar bottom-bar"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbar-classic">
                            <ul class="navbar-nav ml-auto mt-2 mt-lg-0 mr-3">
{{--                                <li class="nav-item dropdown">--}}
{{--                                    <a class="nav-link" href="{{ url('/') }}" id="menu-1">--}}
{{--                                        Home--}}
{{--                                    </a>--}}
{{--                                </li>--}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('hospitals') }}">
                                        Hospitals
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        Blog
                                    </a>
                                </li>

                            </ul>
                            <div class="header-btn d-xl-block d-lg-none">

                                @guest
                                    <a href="{{ url('login') }}" class="btn btn-primary" style="background-color: #F07A3B;border-color: inherit; color: white">Login</a>
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


<div class="row">
    <div class="footer-dark" style="border-radius: 0px">
        <div class="container-fluid" >
            <div class="row" style="width: 100% !important;">
                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                    <!-- footer widget  -->
                    <div class="footer-widget pl-2" style="color: white">
                        <div class="brand-logo"><img style="height: 60px" src="{{ url('frontend/assets/sahl-logo.png') }}" alt="spacely realtor directory listing bootstrap template"></div>
                        <p class="footer-widget-text" style="color: white">Sahl health is an innovative health company that seeks to lower the medical cost incurred by customers by providing effective digital solutions.</p>
                        <div class="footer-location">
                            <p class="phone-numbers" style="color: white">+254 769 687 287 / +254 731 434 140</p>
                            <p class="address" style="color: white">Address: Sahl Health Limited, Pine Tree Plaza</p>
                        </div>

                    </div>
                </div>
                {{--                <!-- footer widget  -->--}}
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6">
                    <div class="footer-widget">
                        <h3 class="footer-widget-title">Legal use</h3>
                        <div class="footer-links">
                            <ul class="list-unstyled" style="color: white">
                                <li><a href="#" style="color: white">Privacy Policy</a></li>
                                <li><a href="#" style="color: white">Terms of Use</a></li>
                                <li><a href="#" style="color: white">Advertising Policy</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
                {{--                <!-- footer widget  -->--}}
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="footer-widget">
                        <h3 class="footer-widget-title">Company</h3>
                        <div class="footer-links">
                            <ul class="list-unstyled" >
                                <li><a style="color: white" href="#">About us</a></li>
                                <li><a style="color: white" href="#">Careers</a></li>

                            </ul>
                        </div>
                        <div class="social-media">
                            <a href="https://www.facebook.com/sahlhealth/"><i class="fab fa-facebook-square"></i></a>
                            <a href="https://twitter.com/SahlHealth"><i class="fab fa-twitter-square"></i></a>
                            <a href="https://www.instagram.com/sahlhealth/"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- tiny footer  -->
        <div class="tiny-footer" style="border-radius: 0px">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <p class="tiny-footer-text">Copyright © {{ date('Y') }} Sahlhealth Inc. All rights reserved</p>
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


