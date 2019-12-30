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


    <script src="{{ url('frontend/assets/js/jquery.min.js') }}"></script>
    @yield('styles')
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

<script src="{{ url('frontend/assets/js/popper.min.js') }}"></script>
<script src="{{ url('frontend/assets/js/bootstrap.min.js') }}"></script>
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
