<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- /meta tags -->
    <title>Sahl Health </title>

    <!-- Site favicon -->
{{--    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">--}}
    <!-- /site favicon -->

    <!-- Font Icon Styles -->
    <link rel="stylesheet" href="{{ url('drift/assets/modules/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ url('drift/vendors/gaxon-icon/styles.css') }}">
    <!-- /font icon Styles -->

    <!-- Perfect Scrollbar stylesheet -->
    <link rel="stylesheet" href="{{ url('drift/assets/modules/perfect-scrollbar/css/perfect-scrollbar.css') }}">
    <!-- /perfect scrollbar stylesheet -->

    <!-- Load Styles -->
    <link rel="stylesheet" href="{{ url('drift/assets/css/semidark-style-1.min.css') }}">
    <!-- /load styles -->

    <!-- intlTelInput stylesheet -->
    <link rel="stylesheet" href="{{ url('drift/assets/modules/intlTelInput/intlTelInput.min.css') }}">
    <!--  intlTelInput stylesheet -->
    <script src="{{ url('drift/assets/modules/jquery/dist/jquery.min.js') }}"></script>

</head>
<body class="dt-sidebar--fixed dt-header--fixed">

<!-- Loader -->
<div class="dt-loader-container">
    <div class="dt-loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
        </svg>
    </div>
</div>
<!-- /loader -->
<!-- Root -->
<div class="dt-root">
    <div class="dt-root__inner">
            @yield('content')
    </div>
</div>
<!-- /root -->

<!-- Optional JavaScript -->
<script src="{{ url('drift/assets/modules/moment/moment.js') }}"></script>
<script src="{{ url('drift/assets/modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- Perfect Scrollbar jQuery -->
<script src="{{ url('drift/assets/modules/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
<!-- /perfect scrollbar jQuery -->

<!-- masonry script -->
<script src="{{ url('drift/assets/modules/masonry-layout/dist/masonry.pkgd.min.js') }}"></script>
<script src="{{ url('drift/assets/modules/sweetalert2/dist/sweetalert2.js') }}"></script>
<script src="{{ url('drift/assets/modules/intlTelInput/intlTelInput.js') }}"></script>
<script src="{{ url('drift/assets/js/functions.js') }}"></script>
<script src="{{ url('drift/assets/js/customizer.js') }}"></script><!-- Custom JavaScript -->
<script src="{{ url('drift/assets/js/script.js') }}"></script>
@yield('scripts')
</body>
</html>
