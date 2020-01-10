@if(Request::ajax())
    @if(isset($_GET['t_optimized']))
    @yield('t_optimized')
    @elseif(isset($_GET['ta_optimized']))
    @yield('ta_optimized')
    @else
        <!-- Site Content Wrapper -->
        <div class="dt-content-wrapper">

            <!-- Site Content -->
            <div class="dt-content">

                <!-- Page Header -->
                <div class="dt-page__header">
                    <h1 class="dt-page__title">@yield('title','Dashboard')</h1>
                </div>
                <!-- /page header -->

                <!-- Grid -->
                <div class="row">
                    <!-- Grid Item -->
                    <div class="col-xl-12">

                        @yield('content')

                    </div>

                </div>
                <!-- /grid -->

            </div>
            <!-- /site content -->

            <!-- Footer -->
            <footer class="dt-footer">
                Copyright Sahl Health © {{ date('Y') }}
            </footer>
            <!-- /footer -->
            <input type="hidden" name="material_page_loaded" value="1">

        </div>
    @endif
@include('common.essential_js')
@else

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Drift - A fully responsive, HTML5 based admin template">
    <meta name="keywords" content="Responsive, HTML5, admin theme, business, professional, jQuery, web design, CSS3, sass">
    <!-- /meta tags -->
    <title>Sahl Health</title>

    <!-- Site favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- /site favicon -->
    <!-- Font Icon Styles -->
    <link rel="stylesheet" href="{{ url('drift/assets/modules/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ url('drift/vendors/gaxon-icon/styles.css') }}">
    <!-- /font icon Styles -->

    <!-- Perfect Scrollbar stylesheet -->
    <link rel="stylesheet" href="{{ url('drift/assets/modules/perfect-scrollbar/css/perfect-scrollbar.css') }}">
    <!-- /perfect scrollbar stylesheet -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Load Styles -->
    <link rel="stylesheet" href="{{ url('drift/assets/css/semidark-style-1.min.css') }}">
    <!-- /load styles -->
    <link rel="stylesheet" href="{{ url('drift/assets/modules/sweetalert/dist/sweetalert.css') }}">


    <script src="{{ url('drift/assets/modules/jquery/dist/jquery.min.js') }}"></script>
    @stack('scripts')
</head>
<body class="dt-sidebar--fixed dt-header--fixed" style="overflow-y: scroll !important;">

<!-- Loader -->
{{--<div class="dt-loader-container">--}}
{{--    <div class="dt-loader">--}}
{{--        <svg class="circular" viewBox="25 25 50 50">--}}
{{--            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>--}}
{{--        </svg>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- /loader -->
<!-- Root -->
<div class="dt-root">
    <div class="dt-root__inner">
        <!-- Header -->
        <header class="dt-header">

            <!-- Header container -->
            <div class="dt-header__container">

                <!-- Brand -->
                <div class="dt-brand">

                    <!-- Brand tool -->
                    <div class="dt-brand__tool" data-toggle="main-sidebar">
                        <div class="hamburger-inner"></div>
                    </div>
                    <!-- /brand tool -->

                    <!-- Brand logo -->
                    <span class="dt-brand__logo">
        <a class="dt-brand__logo-link" href="#">
          <img class="dt-brand__logo-img d-none d-sm-inline-block" src="{{ url('frontend/assets/sahl-logo.jpeg') }}" alt="Sahl Logo">
          <img class="dt-brand__logo-symbol d-sm-none" src="{{ url('frontend/assets/sahl-logo.jpeg') }}" alt="Sahl Logo">
        </a>
      </span>
                    <!-- /brand logo -->

                </div>
                <!-- /brand -->

                <!-- Header toolbar-->
                <div class="dt-header__toolbar">

                    <!-- Header Menu Wrapper -->
                    <div class="dt-nav-wrapper">


                        <!-- Header Menu -->
                        <ul class="dt-nav">
                            <li class="dt-nav__item dt-notification dropdown">

                                <!-- Dropdown Link -->
                                <a href="#" class="dt-nav__link dropdown-toggle no-arrow" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false"> <i class="icon icon-notification2 icon-fw dt-icon-alert"></i>
                                </a>
                                <!-- /dropdown link -->

                                <!-- Dropdown Option -->
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                                    <!-- Dropdown Menu Header -->
                                    <div class="dropdown-menu-header">
                                        <h4 class="title">Notifications (9)</h4>

                                        <div class="ml-auto action-area">
                                            <a href="javascript:void(0)">Mark All Read</a> <a class="ml-2" href="javascript:void(0)">
                                                <i class="icon icon-settings icon-lg text-light-gray"></i> </a>
                                        </div>
                                    </div>
                                    <!-- /dropdown menu header -->

                                    <!-- Dropdown Menu Body -->
                                    <div class="dropdown-menu-body ps-custom-scrollbar">

                                        <div class="h-auto">
                                            <!-- Media -->
                                            <a href="javascript:void(0)" class="media">

                                                <!-- Avatar -->
                                                <img class="dt-avatar mr-3" src="assets/images/user-avatar/stella-johnson.jpg" alt="User">
                                                <!-- avatar -->

                                                <!-- Media Body -->
                                                <span class="media-body">
                    <span class="message">
                      <span class="user-name">Stella Johnson</span> and <span class="user-name">Chris Harris</span>
                      have birthdays today. Help them celebrate!
                    </span>
                    <span class="meta-date">8 hours ago</span>
                  </span>
                                                <!-- /media body -->

                                            </a>
                                            <!-- /media -->

                                            <!-- Media -->
                                            <a href="javascript:void(0)" class="media">

                                                <!-- Avatar -->
                                                <img class="dt-avatar mr-3" src="assets/images/user-avatar/jeson-born.jpg" alt="User">
                                                <!-- avatar -->

                                                <!-- Media Body -->
                                                <span class="media-body">
                    <span class="message">
                      <span class="user-name">Jonathan Madano</span> commented on your post.
                    </span>
                    <span class="meta-date">9 hours ago</span>
                  </span>
                                                <!-- /media body -->

                                            </a>
                                            <!-- /media -->

                                            <!-- Media -->
                                            <a href="javascript:void(0)" class="media">

                                                <!-- Avatar -->
                                                <img class="dt-avatar mr-3" src="assets/images/user-avatar/selena.jpg" alt="User">
                                                <!-- avatar -->

                                                <!-- Media Body -->
                                                <span class="media-body">
                    <span class="message">
                      <span class="user-name">Chelsea Brown</span> sent a video recomendation.
                    </span>
                    <span class="meta-date">
                      <i class="icon icon-play-circle text-primary icon-fw mr-1"></i>
                      13 hours ago
                    </span>
                  </span>
                                                <!-- /media body -->

                                            </a>
                                            <!-- /media -->

                                            <!-- Media -->
                                            <a href="javascript:void(0)" class="media">

                                                <!-- Avatar -->
                                                <img class="dt-avatar mr-3" src="assets/images/user-avatar/alex-dolgove.jpg" alt="User">
                                                <!-- avatar -->

                                                <!-- Media Body -->
                                                <span class="media-body">
                    <span class="message">
                      <span class="user-name">Alex Dolgove</span> and <span class="user-name">Chris Harris</span>
                      like your post.
                    </span>
                    <span class="meta-date">
                      <i class="icon icon-like text-light-blue icon-fw mr-1"></i>
                      yesterday at 9:30
                    </span>
                  </span>
                                                <!-- /media body -->

                                            </a>
                                            <!-- /media -->
                                        </div>

                                    </div>
                                    <!-- /dropdown menu body -->

                                    <!-- Dropdown Menu Footer -->
                                    <div class="dropdown-menu-footer">
                                        <a href="javascript:void(0)" class="card-link"> See All <i class="icon icon-arrow-right icon-fw"></i>
                                        </a>
                                    </div>
                                    <!-- /dropdown menu footer -->
                                </div>
                                <!-- /dropdown option -->

                            </li>

                            <li class="dt-nav__item dt-notification dropdown">

                                <!-- Dropdown Link -->
                                <a href="page-blank.php#" class="dt-nav__link dropdown-toggle no-arrow" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false"> <i class="icon icon-open-mail icon-fw"></i> </a>
                                <!-- /dropdown link -->

                                <!-- Dropdown Option -->
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                                    <!-- Dropdown Menu Header -->
                                    <div class="dropdown-menu-header">
                                        <h4 class="title">Messages (6)</h4>

                                        <div class="ml-auto action-area">
                                            <a href="javascript:void(0)">Mark All Read</a> <a class="ml-2" href="javascript:void(0)">
                                                <i class="icon icon-settings icon-lg text-light-gray"></i></a>
                                        </div>
                                    </div>
                                    <!-- /dropdown menu header -->

                                    <!-- Dropdown Menu Body -->
                                    <div class="dropdown-menu-body ps-custom-scrollbar">

                                        <div class="h-auto">

                                            <!-- Media -->
                                            <a href="javascript:void(0)" class="media">

                                                <!-- Avatar -->
                                                <img class="dt-avatar mr-3" src="assets/images/user-avatar/mathew.jpg" alt="User">
                                                <!-- avatar -->

                                                <!-- Media Body -->
                                                <span class="media-body text-truncate">
                    <span class="user-name mb-1">Chris Mathew</span>
                    <span class="message text-light-gray text-truncate">Okay.. I will be waiting for your...</span>
                  </span>
                                                <!-- /media body -->

                                                <span class="action-area h-100 min-w-80 text-right">
                      <span class="meta-date mb-1">8 hours ago</span>
                                                    <!-- Toggle Button -->
                      <span class="toggle-button" data-toggle="tooltip" data-placement="left" title="Mark as read">
                        <span class="show"><i class="icon icon-dot-o icon-fw f-10 text-light-gray"></i></span>
                        <span class="hide"><i class="icon icon-dot icon-fw f-10 text-light-gray"></i></span>
                      </span>
                                                    <!-- /toggle button -->
                    </span> </a>
                                            <!-- /media -->

                                            <!-- Media -->
                                            <a href="javascript:void(0)" class="media">

                                                <!-- Avatar -->
                                                <img class="dt-avatar mr-3" src="assets/images/user-avatar/stella-johnson.jpg" alt="User">
                                                <!-- avatar -->

                                                <!-- Media Body -->
                                                <span class="media-body text-truncate">
                    <span class="user-name mb-1">Alia Joseph</span>
                    <span class="message text-light-gray text-truncate">
                      Alia Joseph just joined Messenger! Be the first to send a welcome message or sticker.
                    </span>
                  </span>
                                                <!-- /media body -->

                                                <span class="action-area h-100 min-w-80 text-right">
                    <span class="meta-date mb-1">9 hours ago</span>
                                                    <!-- Toggle Button -->
                      <span class="toggle-button" data-toggle="tooltip" data-placement="left" title="Mark as read">
                        <span class="show"><i class="icon icon-dot-o icon-fw f-10 text-light-gray"></i></span>
                        <span class="hide"><i class="icon icon-dot icon-fw f-10 text-light-gray"></i></span>
                      </span>
                                                    <!-- /toggle button -->
                  </span> </a>
                                            <!-- /media -->

                                            <!-- Media -->
                                            <a href="javascript:void(0)" class="media">

                                                <!-- Avatar -->
                                                <img class="dt-avatar mr-3" src="assets/images/user-avatar/steve-smith.jpg" alt="User">
                                                <!-- avatar -->

                                                <!-- Media Body -->
                                                <span class="media-body text-truncate">
                    <span class="user-name mb-1">Joshua Brian</span>
                    <span class="message text-light-gray text-truncate">
                      Alex will explain you how to keep the HTML structure and all that.
                    </span>
                  </span>
                                                <!-- /media body -->

                                                <span class="action-area h-100 min-w-80 text-right">
                    <span class="meta-date mb-1">12 hours ago</span>
                                                    <!-- Toggle Button -->
                      <span class="toggle-button" data-toggle="tooltip" data-placement="left" title="Mark as read">
                        <span class="show"><i class="icon icon-dot-o icon-fw f-10 text-light-gray"></i></span>
                        <span class="hide"><i class="icon icon-dot icon-fw f-10 text-light-gray"></i></span>
                      </span>
                                                    <!-- /toggle button -->
                  </span> </a>
                                            <!-- /media -->

                                            <!-- Media -->
                                            <a href="javascript:void(0)" class="media">

                                                <!-- Avatar -->
                                                <img class="dt-avatar mr-3" src="assets/images/user-avatar/domnic-brown.jpg" alt="User">
                                                <!-- avatar -->

                                                <!-- Media Body -->
                                                <span class="media-body text-truncate">
                    <span class="user-name mb-1">Domnic Brown</span>
                    <span class="message text-light-gray text-truncate">Okay.. I will be waiting for your...</span>
                  </span>
                                                <!-- /media body -->

                                                <span class="action-area h-100 min-w-80 text-right">
                    <span class="meta-date mb-1">yesterday</span>
                                                    <!-- Toggle Button -->
                      <span class="toggle-button" data-toggle="tooltip" data-placement="left" title="Mark as read">
                        <span class="show"><i class="icon icon-dot-o icon-fw f-10 text-light-gray"></i></span>
                        <span class="hide"><i class="icon icon-dot icon-fw f-10 text-light-gray"></i></span>
                      </span>
                                                    <!-- /toggle button -->
                  </span> </a>
                                            <!-- /media -->

                                        </div>

                                    </div>
                                    <!-- /dropdown menu body -->

                                    <!-- Dropdown Menu Footer -->
                                    <div class="dropdown-menu-footer">
                                        <a href="javascript:void(0)" class="card-link"> See All <i class="icon icon-arrow-right icon-fw"></i>
                                        </a>
                                    </div>
                                    <!-- /dropdown menu footer -->
                                </div>
                                <!-- /dropdown option -->

                            </li>
                        </ul>
                        <!-- /header menu -->



                        <!-- Header Menu -->
                        <ul class="dt-nav">
                            <li class="dt-nav__item dropdown">

                                <!-- Dropdown Link -->
                                <a href="#" class="dt-nav__link dropdown-toggle no-arrow dt-avatar-wrapper"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="dt-avatar size-30" src="{{ url('drift') }}/assets/images/user-avatar/domnic-harris.jpg" alt="Domnic Harris">
                                    <span class="dt-avatar-info d-none d-sm-block">
                <span class="dt-avatar-name">{{ auth()->user()->name }}</span>
              </span> </a>
                                <!-- /dropdown link -->

                                <!-- Dropdown Option -->
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="dt-avatar-wrapper flex-nowrap p-6 mt-n2 bg-gradient-purple text-white rounded-top">
{{--                                        <img class="dt-avatar" src="assets/images/user-avatar/domnic-harris.jpg" alt="Domnic Harris">--}}
                                        <span class="dt-avatar-info">
                                            @auth
                                          <span class="dt-avatar-name"> {{ auth()->user()->name }} </span>
                                          <span class="f-12">{{ auth()->user()->role }}</span>
                                            @endauth
                                        </span>
                                    </div>
                                    <a class="dropdown-item" href="{{ url('user/profile') }}"> <i class="icon icon-user icon-fw mr-2 mr-sm-1"></i>Account
                                    </a>
                                    <a class="dropdown-item" href="{{ url('logout') }}"> <i class="icon icon-editors icon-fw mr-2 mr-sm-1"></i>Logout
                                    </a>
                                </div>
                                <!-- /dropdown option -->

                            </li>
                        </ul>
                        <!-- /header menu -->
                    </div>
                    <!-- Header Menu Wrapper -->

                </div>
                <!-- /header toolbar -->

            </div>
            <!-- /header container -->

        </header>
        <!-- /header -->
        <!-- Site Main -->
        <main class="dt-main">
            <!-- Sidebar -->
            <aside id="main-sidebar" class="dt-sidebar">
                <div class="dt-sidebar__container">

                    <ul class="dt-side-nav">

                        @isset($real_menus)
                        @foreach($real_menus as $menu)

                            @if($menu->type=='single' && @$menu->menus)
                                    <li class="dt-side-nav__item">
                                        <a href="{{ url($menu->menus->url)  }} " class="dt-side-nav__link load-page" title="{{ $menu->menus->label }}">
                                            <i class="icon icon-{{ $menu->menus->icon }} icon-fw icon-lg"></i>
                                            <span class="dt-side-nav__text">{{ $menu->menus->label }}</span>
                                        </a>
                                    </li>

                            @endif

                            @if($menu->type=='many')

                                    <li class="dt-side-nav__item">
                                        <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="{{ $menu->label }}">
                                            <i class="icon icon-{{ $menu->icon }} icon-fw icon-lg"></i>
                                            <span class="dt-side-nav__text">{{ $menu->label }}</span>
                                        </a>

                                        <!-- Sub-menu -->
                                        <ul class="dt-side-nav__sub-menu">

                                            @foreach($menu->children as $drop)
                                                @if($drop->label)
                                                    <li class="dt-side-nav__item">
                                                        <a href="{{ url($drop->url) }}" class="dt-side-nav__link load-page" title="{{ $drop->label }}">
                                                            <i class="icon icon-date-time-picker icon-fw icon-lg"></i>
                                                            <span class="dt-side-nav__text">{{ $drop->label }}</span>
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                        <!-- /sub-menu -->
                                    </li>
                        @endif

                    @endforeach
                    @endisset

                    </ul>
                    <!-- /sidebar navigation -->

                </div>
            </aside>
            <!-- /sidebar -->
            <!-- Site Content Wrapper -->
            <div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content" >

                    <!-- Page Header -->
                    <div class="dt-page__header">
                        <h1 class="dt-page__title">@yield('title','Dashboard')</h1>
                    </div>
                    <!-- /page header -->

                    <!-- Grid -->
                    <div class="row">
                        <!-- Grid Item -->
                        <div class="col-md-12">

                         @yield('content')

                        </div>

                    </div>
                    <!-- /grid -->

                </div>
                <!-- /site content -->

                <!-- Footer -->
                <footer class="dt-footer">
                    Copyright Sahl Health © {{ date('Y') }}
                </footer>
                <!-- /footer -->
            </div>
            <!-- /site content wrapper -->
        </main>
    </div>
</div>
<!-- /root -->

<!-- Optional JavaScript -->
<script src="{{ url('drift/assets/modules/moment/moment.js') }}"></script>
<script src="{{ url('drift/assets/modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- Perfect Scrollbar jQuery -->
<script src="{{ url('drift/assets/modules/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
<!-- /perfect scrollbar jQuery -->
<script>
    localStorage.setItem('home_url','{{ url("/") }}');
</script>
<!-- masonry script -->
<script src="{{ url('drift/assets/modules/masonry-layout/dist/masonry.pkgd.min.js') }}"></script>
<script src="{{ url('drift/assets/modules/sweetalert/dist/sweetalert.min.js') }}"></script>

<script src="{{ url('drift/assets/js/functions.js') }}"></script>
<script src="{{ url('drift/assets/js/customizer.js') }}"></script><!-- Custom JavaScript -->
<script src="{{ url('drift/assets/js/script.js') }}"></script>

<script src="{{ url('drift/assets/js/jquery.datetimepicker.js') }}"></script>
<script src="{{ url('drift/assets/js/jquery.form.js') }}"></script>
<script src="{{ url('drift/assets/js/jquery.history.js') }}"></script>
@include('common.javascript')
@stack('footer-scripts')
</body>
</html>
@endif
