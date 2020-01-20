@extends('layouts.app')

@section('content')

    <!-- Login Container -->
    <div class="dt-login--container">

        <!-- Login Content -->
        <div class="dt-login__content-wrapper">

            <!-- Login Background Section -->
            <div class="dt-login__bg-section">

                <div class="dt-login__bg-content">
                    <!-- Login Title -->
                    <h1 class="dt-login__title">Sign Up</h1>
                    <!-- /login title -->

                    <p class="f-16">Register as a Sahl Health Agent.</p>
                </div>


                <!-- Brand logo -->
                <div class="dt-login__logo">
                    <a class="dt-brand__logo-link" href="#">
                        <img class="dt-brand__logo-img" src="{{ url('frontend/assets/sahl-logo.jpeg') }}" alt="Sahl Health">
                    </a>
                </div>
                <!-- /brand logo -->

            </div>
            <!-- /login background section -->

            <!-- Login Content Section -->
            <div class="dt-login__content">

                <!-- Login Content Inner -->
                <div class="dt-login__content-inner">

                    <a style="display: none" href="{{ url('facebook/login?type=agents') }}" class="btn btn-primary btn-lg btn-block"> <i class="icon icon-facebook icon-xl"></i> &nbsp;Continue with Facebook </a>

                    <a href="{{ url('google/login?type=agents') }}" class="btn btn-outline-dark btn-lg btn-block"> <i class="icon icon-google-plus icon-xl"></i> &nbsp;Continue with Google </a>

                    <span class="d-inline-block ml-5 m-3">Or connect with</span>

                    <button style="background: #FF5A5F; color: white" type="button" class="btn btn-lg btn-block" data-toggle="modal" data-target="#providerSignUpModal">
                        <i class="icon icon-mail icon-xl"></i> &nbsp;Continue with Email
                    </button>

                </div>
                <!-- /login content inner -->

                <!-- Modal -->
                <div class="modal fade" id="providerSignUpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">

                                <h5 class="modal-title" id="exampleModalLabel">Sign Up with <a href=""> Facebook</a> Or <a href=""> Google</a></h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="ajax-post" id="providerRegistration" method="post" action="{{ url('agent-register') }}">
                                    <div class="form-group">
                                        <label for="email_address">Email Address</label>
                                        <input type="email" name="email" class="form-control" id="email_address" placeholder="Email Address">
                                    </div>

                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name">
                                    </div>

                                    @csrf
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Create a Password">
                                    </div>
                                    <input type="hidden" name="type" value="providers">

                                    <div class="form-group">
                                        <label>Birthday</label>
                                        <input type="date" name="dob" class="form-control">
                                        <small>To sign up, you need to be at least 18. Other people who use Sahl Health won’t see your birthday</small>
                                    </div>

                                    <div class="form-group">
                                        <button  style="background: #FF5A5F; color: white" type="submit" class="btn btn-lg btn-block submit-btn">
                                            &nbsp;Sign up
                                        </button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Provider Sign Up Modal -->


                <!-- Login Content Footer -->
                <div class="dt-login__content-footer">
                    Already Have an Account
                    <a class="btn btn-link" href="{{ url('login') }}">
                        {{ __('Login') }}
                    </a>

                </div>
                <!-- /login content footer -->

            </div>
            <!-- /login content section -->

        </div>
    </div>


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
@endsection
