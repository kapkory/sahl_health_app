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
    <title>Drift - Admin Template</title>

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

    <!-- Load Styles -->
    <link rel="stylesheet" href="{{ url('drift/assets/css/semidark-style-1.min.css') }}">
    <!-- /load styles -->
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
        <a class="dt-brand__logo-link" href="index.php">
          <img class="dt-brand__logo-img d-none d-sm-inline-block" src="assets/images/logo.png" alt="Drift">
          <img class="dt-brand__logo-symbol d-sm-none" src="assets/images/logo-symbol.png" alt="Drift">
        </a>
      </span>
                    <!-- /brand logo -->

                </div>
                <!-- /brand -->

                <!-- Header toolbar-->
                <div class="dt-header__toolbar">

                    <!-- Search box -->
                    <form class="search-box d-none d-lg-block">
                        <div class="input-group">
                            <input class="form-control" placeholder="Search in app..." value="" type="search">
                            <span class="search-icon"><i class="icon icon-search icon-lg"></i></span>
                            <div class="input-group-append">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">Category
                                </button>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0)">Action</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                                    <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /search box -->

                    <!-- Header Menu Wrapper -->
                    <div class="dt-nav-wrapper">
                        <!-- Header Menu -->
                        <ul class="dt-nav d-lg-none">
                            <li class="dt-nav__item dt-notification-search dropdown">

                                <!-- Dropdown Link -->
                                <a href="page-blank.php#" class="dt-nav__link dropdown-toggle no-arrow" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false"> <i class="icon icon-search icon-fw icon-lg"></i> </a>
                                <!-- /dropdown link -->

                                <!-- Dropdown Option -->
                                <div class="dropdown-menu">

                                    <!-- Search Box -->
                                    <form class="search-box right-side-icon">
                                        <input class="form-control form-control-lg" type="search" placeholder="Search in app...">
                                        <button type="submit" class="search-icon"><i class="icon icon-search icon-lg"></i></button>
                                    </form>
                                    <!-- /search box -->

                                </div>
                                <!-- /dropdown option -->

                            </li>
                        </ul>
                        <!-- /header menu -->

                        <!-- Header Menu -->
                        <ul class="dt-nav">
                            <li class="dt-nav__item dt-notification-app dropdown">

                                <!-- Dropdown Link -->
                                <a href="page-blank.php#" class="dt-nav__link dropdown-toggle no-arrow" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false"> <i class="icon icon-apps icon-sm icon-fw"></i>
                                    <span>Apps</span> </a>
                                <!-- /dropdown link -->

                                <!-- Dropdown Option -->
                                <div class="dropdown-menu ps-custom-scrollbar">

                                    <!-- Apps -->
                                    <ul class="dt-app-list">
                                        <li class="dt-app-list__item">
                                            <a href="javascript:void(0)" class="dt-app-list__link">
                                                <img src="assets/images/icon/icon-account.png" alt="Google Account">
                                                <span class="dt-app-list__text">Account</span> </a>
                                        </li>
                                        <li class="dt-app-list__item">
                                            <a href="javascript:void(0)" class="dt-app-list__link">
                                                <img src="assets/images/icon/icon-google.png" alt="Google Search">
                                                <span class="dt-app-list__text">Search</span> </a>
                                        </li>
                                        <li class="dt-app-list__item">
                                            <a href="javascript:void(0)" class="dt-app-list__link">
                                                <img src="assets/images/icon/icon-map.png" alt="Google Map">
                                                <span class="dt-app-list__text">Maps</span> </a>
                                        </li>
                                        <li class="dt-app-list__item">
                                            <a href="javascript:void(0)" class="dt-app-list__link">
                                                <img src="assets/images/icon/icon-youtube.png" alt="Youtube">
                                                <span class="dt-app-list__text">YouTube</span> </a>
                                        </li>
                                        <li class="dt-app-list__item">
                                            <a href="javascript:void(0)" class="dt-app-list__link">
                                                <img src="assets/images/icon/icon-playstore.png" alt="Play Store">
                                                <span class="dt-app-list__text">Play</span> </a>
                                        </li>
                                        <li class="dt-app-list__item">
                                            <a href="javascript:void(0)" class="dt-app-list__link">
                                                <img src="assets/images/icon/icon-news.png" alt="Google News">
                                                <span class="dt-app-list__text">News</span> </a>
                                        </li>
                                        <li class="dt-app-list__item">
                                            <a href="javascript:void(0)" class="dt-app-list__link">
                                                <img src="assets/images/icon/icon-gmail.png" alt="Google Drive">
                                                <span class="dt-app-list__text">Gmail</span> </a>
                                        </li>
                                        <li class="dt-app-list__item">
                                            <a href="javascript:void(0)" class="dt-app-list__link">
                                                <img src="assets/images/icon/icon-drive.png" alt="Google Drive">
                                                <span class="dt-app-list__text">Drive</span> </a>
                                        </li>
                                        <li class="dt-app-list__item">
                                            <a href="javascript:void(0)" class="dt-app-list__link">
                                                <img src="assets/images/icon/icon-calendar.png" alt="Calendar">
                                                <span class="dt-app-list__text">Calendar</span> </a>
                                        </li>
                                        <li class="dt-app-list__item">
                                            <a href="javascript:void(0)" class="dt-app-list__link">
                                                <img src="assets/images/icon/icon-google-plus.png" alt="Google Plus">
                                                <span class="dt-app-list__text">Google+</span> </a>
                                        </li>
                                        <li class="dt-app-list__item">
                                            <a href="javascript:void(0)" class="dt-app-list__link">
                                                <img src="assets/images/icon/icon-translate.png" alt="Translate">
                                                <span class="dt-app-list__text">Translate</span> </a>
                                        </li>
                                        <li class="dt-app-list__item">
                                            <a href="javascript:void(0)" class="dt-app-list__link">
                                                <img src="assets/images/icon/icon-photos.png" alt="Photos">
                                                <span class="dt-app-list__text">Photos</span> </a>
                                        </li>
                                    </ul>
                                    <!-- /apps -->

                                </div>
                                <!-- /dropdown option -->

                            </li>
                        </ul>
                        <!-- /header menu -->

                        <!-- Header Menu -->
                        <ul class="dt-nav">
                            <li class="dt-nav__item dt-notification dropdown">

                                <!-- Dropdown Link -->
                                <a href="page-blank.php#" class="dt-nav__link dropdown-toggle no-arrow" data-toggle="dropdown"
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
                                <a href="page-blank.php#" class="dt-nav__link dropdown-toggle" data-toggle="dropdown"
                                   aria-haspopup="true"
                                   aria-expanded="false">
                                    <i class="flag-icon flag-icon-us flag-icon-rounded flag-icon-lg"></i><span>en-uk</span> </a>
                                <!-- /dropdown link -->

                                <!-- Dropdown Option -->
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="flag-icon flag-icon-in mr-2"></i><span>Hi-In</span> </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="flag-icon flag-icon-cn mr-2"></i><span>Chinese</span> </a>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="flag-icon flag-icon-es mr-2"></i><span>Spanish</span> </a>
                                </div>
                                <!-- /dropdown option -->

                            </li>
                        </ul>
                        <!-- /header menu -->

                        <!-- Header Menu -->
                        <ul class="dt-nav">
                            <li class="dt-nav__item dropdown">

                                <!-- Dropdown Link -->
                                <a href="page-blank.php#" class="dt-nav__link dropdown-toggle no-arrow dt-avatar-wrapper"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="dt-avatar size-30" src="assets/images/user-avatar/domnic-harris.jpg" alt="Domnic Harris">
                                    <span class="dt-avatar-info d-none d-sm-block">
                <span class="dt-avatar-name">Bob Hyden</span>
              </span> </a>
                                <!-- /dropdown link -->

                                <!-- Dropdown Option -->
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="dt-avatar-wrapper flex-nowrap p-6 mt-n2 bg-gradient-purple text-white rounded-top">
                                        <img class="dt-avatar" src="assets/images/user-avatar/domnic-harris.jpg" alt="Domnic Harris">
                                        <span class="dt-avatar-info">
                  <span class="dt-avatar-name">Bob Hyden</span>
                  <span class="f-12">Administrator</span>
                </span>
                                    </div>
                                    <a class="dropdown-item" href="javascript:void(0)"> <i class="icon icon-user icon-fw mr-2 mr-sm-1"></i>Account
                                    </a> <a class="dropdown-item" href="javascript:void(0)">
                                        <i class="icon icon-settings icon-fw mr-2 mr-sm-1"></i>Setting </a>
                                    <a class="dropdown-item" href="page-login.php"> <i class="icon icon-editors icon-fw mr-2 mr-sm-1"></i>Logout
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

                    <!-- Sidebar Navigation -->
                    <ul class="dt-side-nav">

                        <!-- Menu Header -->
                        <li class="dt-side-nav__item dt-side-nav__header">
                            <span class="dt-side-nav__text">main</span>
                        </li>
                        <!-- /menu header -->

                        <!-- Menu Item -->
                        <li class="dt-side-nav__item open">
                            <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Dashboard">
                                <i class="icon icon-dashboard icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Dashboard</span>
                            </a>

                            <!-- Sub-menu -->
                            <ul class="dt-side-nav__sub-menu">
                                <li class="dt-side-nav__item">
                                    <a href="index.php" class="dt-side-nav__link" title="Listing">
                                        <i class="icon icon-list icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Listing</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="dashboard-real-estate.php" class="dt-side-nav__link" title="Real Estate">
                                        <i class="icon icon-company icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Real Estate</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="dashboard-crypto.php" class="dt-side-nav__link" title="Crypto">
                                        <i class="icon icon-crypto icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Crypto</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="dashboard-crm.php" class="dt-side-nav__link" title="CRM">
                                        <i class="icon icon-crm icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Crm</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- /sub-menu -->

                        </li>
                        <li class="dt-side-nav__item">
                            <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Widgets">
                                <i class="icon icon-widgets icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Widgets</span>
                            </a>

                            <!-- Sub-menu -->
                            <ul class="dt-side-nav__sub-menu">
                                <li class="dt-side-nav__item">
                                    <a href="widget.php" class="dt-side-nav__link" title="Classic">
                                        <i class="icon icon-components icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Classic</span>
                                    </a>
                                </li>


                                <li class="dt-side-nav__item">
                                    <a href="widget-new.php" class="dt-side-nav__link" title="Modern">
                                        <i class="icon icon-datatable icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Modern</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- /sub-menu -->

                        </li>
                        <li class="dt-side-nav__item">
                            <a href="metrics.php" class="dt-side-nav__link" title="Metrics">
                                <i class="icon icon-metrics icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Metrics</span>
                            </a>
                        </li>
                        <li class="dt-side-nav__item">
                            <a href="layouts.php" class="dt-side-nav__link" title="Layouts">
                                <i class="icon icon-layout icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Layouts</span>
                            </a>
                        </li>
                        <!-- /menu item -->

                        <!-- Menu Header -->
                        <li class="dt-side-nav__item dt-side-nav__header">
                            <span class="dt-side-nav__text">Pre-built Apps</span>
                        </li>
                        <!-- /menu header -->

                        <!-- Menu Item -->
                        <li class="dt-side-nav__item">
                            <a href="task-manager.php" class="dt-side-nav__link" title="Task Manager">
                                <i class="icon icon-task-manager icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Task Manager</span>
                            </a>
                        </li>
                        <li class="dt-side-nav__item">
                            <a href="mail.php" class="dt-side-nav__link" title="Mail Application">
                                <i class="icon icon-mail icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Mail Application</span>
                            </a>
                        </li>
                        <li class="dt-side-nav__item">
                            <a href="contact.php" class="dt-side-nav__link" title="Contacts App">
                                <i class="icon icon-contacts-app icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Contacts App</span>
                            </a>
                        </li>
                        <li class="dt-side-nav__item">
                            <a href="chat.php" class="dt-side-nav__link" title="Chat App">
                                <i class="icon icon-chat-app2 icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Chat App</span>
                            </a>
                        </li>
                        <!-- /menu item -->

                        <!-- Menu Header -->
                        <li class="dt-side-nav__item dt-side-nav__header">
                            <span class="dt-side-nav__text">Components</span>
                        </li>
                        <!-- /menu header -->

                        <!-- Menu Item -->
                        <li class="dt-side-nav__item">
                            <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Basic Components">
                                <i class="icon icon-basic-components icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Basic Components</span>
                            </a>

                            <!-- Sub-menu -->
                            <ul class="dt-side-nav__sub-menu">
                                <li class="dt-side-nav__item">
                                    <a href="alerts.php" class="dt-side-nav__link" title="Alerts">
                                        <i class="icon icon-alert icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Alerts</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="badges.php" class="dt-side-nav__link" title="Badges">
                                        <i class="icon icon-badges icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Badges</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="breadcrumbs.php" class="dt-side-nav__link" title="Breadcrumbs">
                                        <i class="icon icon-breadcrumbs icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Breadcrumbs</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="buttons.php" class="dt-side-nav__link" title="Button">
                                        <i class="icon icon-button icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Button</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="button-group.php" class="dt-side-nav__link" title="Button Group">
                                        <i class="icon icon-button-group icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Button Group</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="card.php" class="dt-side-nav__link" title="Card">
                                        <i class="icon icon-card icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Card</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="card-group.php" class="dt-side-nav__link" title="Card Group">
                                        <i class="icon icon-card-group icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Card Group</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="carousel.php" class="dt-side-nav__link" title="Carousel">
                                        <i class="icon icon-carousel icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Carousel</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="collapse.php" class="dt-side-nav__link" title="Collapse">
                                        <i class="icon icon-collapse icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Collapse</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="dropdown.php" class="dt-side-nav__link" title="Dropdown">
                                        <i class="icon icon-dropdown icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Dropdown</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="input-group.php" class="dt-side-nav__link" title="Input Group">
                                        <i class="icon icon-input-group icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Input Group</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="jumbotron.php" class="dt-side-nav__link" title="Jumbotron">
                                        <i class="icon icon-jumbotron icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Jumbotron</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="list-group.php" class="dt-side-nav__link" title="List Group">
                                        <i class="icon icon-list-group icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">List Group</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="modal.php" class="dt-side-nav__link" title="Modal">
                                        <i class="icon icon-modal icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Modal</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="navbar.php" class="dt-side-nav__link" title="Navbar">
                                        <i class="icon icon-navbar icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Navbar</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="navs.php" class="dt-side-nav__link" title="Navs & Tabs">
                                        <i class="icon icon-navs-and-tabs icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Navs &amp; Tabs</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="pagination.php" class="dt-side-nav__link" title="Pagination">
                                        <i class="icon icon-pagination icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Pagination</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="popovers.php" class="dt-side-nav__link" title="Popovers">
                                        <i class="icon icon-popovers icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Popovers</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="progress.php" class="dt-side-nav__link" title="Progress Bar">
                                        <i class="icon icon-progress-bar icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Progress Bar</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="scrollspy.php" class="dt-side-nav__link" title="Scrollspy">
                                        <i class="icon icon-scrollspy icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Scrollspy</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="tooltip.php" class="dt-side-nav__link" title="Tooltip">
                                        <i class="icon icon-tooltip icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Tooltip</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="typography.php" class="dt-side-nav__link" title="Typography">
                                        <i class="icon icon-typography icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Typography</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- /sub-menu -->
                        </li>
                        <li class="dt-side-nav__item">
                            <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Tables">
                                <i class="icon icon-tables icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Tables</span>
                            </a>

                            <!-- Sub-menu -->
                            <ul class="dt-side-nav__sub-menu">
                                <li class="dt-side-nav__item">
                                    <a href="basic-table.php" class="dt-side-nav__link" title="Basic Table">
                                        <i class="icon icon-tables icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Basic Table</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="data-table.php" class="dt-side-nav__link" title="Data Table">
                                        <i class="icon icon-datatable icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Data Table</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- /sub-menu -->
                        </li>
                        <!-- /menu item -->

                        <!-- Menu Header -->
                        <li class="dt-side-nav__item dt-side-nav__header">
                            <span class="dt-side-nav__text">Forms</span>
                        </li>
                        <!-- /menu header -->

                        <!-- Menu Item -->
                        <li class="dt-side-nav__item">
                            <a href="basic-form.php" class="dt-side-nav__link" title="Basic Form">
                                <i class="icon icon-forms-basic icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Basic Form</span>
                            </a>
                        </li>
                        <li class="dt-side-nav__item">
                            <a href="file-upload.php" class="dt-side-nav__link" title="File Upload">
                                <i class="icon icon-file-upload icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">File Upload</span>
                            </a>
                        </li>
                        <!-- /menu item -->

                        <!-- Menu Header -->
                        <li class="dt-side-nav__item dt-side-nav__header">
                            <span class="dt-side-nav__text">Extra Components</span>
                        </li>
                        <!-- /menu header -->

                        <!-- Menu Item -->
                        <li class="dt-side-nav__item">
                            <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Editors">
                                <i class="icon icon-editors icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Editors</span>
                            </a>

                            <!-- Sub-menu -->
                            <ul class="dt-side-nav__sub-menu">
                                <li class="dt-side-nav__item">
                                    <a href="editor-summernote.php" class="dt-side-nav__link" title="Summernote Editor">
                                        <i class="icon icon-editor-wysiwyg icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Summernote Editor</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="code-editor.php" class="dt-side-nav__link" title="Code Editor">
                                        <i class="icon icon-editor-code icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Code Editor</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- /sub-menu -->
                        </li>
                        <li class="dt-side-nav__item">
                            <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Pickers">
                                <i class="icon icon-pickers icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Pickers</span>
                            </a>

                            <!-- Sub-menu -->
                            <ul class="dt-side-nav__sub-menu">
                                <li class="dt-side-nav__item">
                                    <a href="date-time-pickers.php" class="dt-side-nav__link" title="Date & Time Picker">
                                        <i class="icon icon-date-time-picker icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Date &amp; Time Picker</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="color-picker.php" class="dt-side-nav__link" title="Color Picker">
                                        <i class="icon icon-color-picker icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Color Picker</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- /sub-menu -->
                        </li>
                        <li class="dt-side-nav__item">
                            <a href="sweet-alert.php" class="dt-side-nav__link" title="Sweet Alerts">
                                <i class="icon icon-sweet-alert icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Sweet Alerts</span>
                            </a>
                        </li>
                        <li class="dt-side-nav__item">
                            <a href="notification-alert.php" class="dt-side-nav__link" title="Notifications">
                                <i class="icon icon-notification-o icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Notifications</span>
                            </a>
                        </li>
                        <li class="dt-side-nav__item">
                            <a href="drag-drop.php" class="dt-side-nav__link" title="Drag & Drop">
                                <i class="icon icon-drag-and-drop icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Drag &amp; Drop</span>
                            </a>
                        </li>
                        <!-- /menu item -->

                        <!-- Menu Header -->
                        <li class="dt-side-nav__item dt-side-nav__header">
                            <span class="dt-side-nav__text">Data Visualization</span>
                        </li>
                        <!-- /menu header -->

                        <!-- Menu Item -->
                        <li class="dt-side-nav__item">
                            <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Charts">
                                <i class="icon icon-charts icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Charts</span>
                            </a>

                            <ul class="dt-side-nav__sub-menu">
                                <li class="dt-side-nav__item">
                                    <a href="chart-chartjs.php" class="dt-side-nav__link" title="ChartJs">
                                        <i class="icon icon-charts icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">ChartJs</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="chart-amcharts.php" class="dt-side-nav__link" title="Am Charts">
                                        <i class="icon icon-amchart icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Am Charts</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dt-side-nav__item">
                            <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Maps">
                                <i class="icon icon-maps icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Maps</span>
                            </a>

                            <!-- Sub-menu -->
                            <ul class="dt-side-nav__sub-menu">
                                <li class="dt-side-nav__item">
                                    <a href="map-basic.php" class="dt-side-nav__link" title="Simple map">
                                        <i class="icon icon-maps icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Simple map</span>
                                    </a>
                                </li>
                                <li class="dt-side-nav__item">
                                    <a href="map-events.php" class="dt-side-nav__link" title="Events Map">
                                        <i class="icon icon-maps icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Events Map</span>
                                    </a>
                                </li>
                                <li class="dt-side-nav__item">
                                    <a href="map-markers.php" class="dt-side-nav__link" title="Markers Maps">
                                        <i class="icon icon-maps icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Markers Maps</span>
                                    </a>
                                </li>
                                <li class="dt-side-nav__item">
                                    <a href="map-geolocation.php" class="dt-side-nav__link" title="Geo Location Map">
                                        <i class="icon icon-maps icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Geo Location Map</span>
                                    </a>
                                </li>
                                <li class="dt-side-nav__item">
                                    <a href="map-geocoding.php" class="dt-side-nav__link" title="Geo Coding Map">
                                        <i class="icon icon-maps icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Geo Coding Map</span>
                                    </a>
                                </li>
                                <li class="dt-side-nav__item">
                                    <a href="map-overlay.php" class="dt-side-nav__link" title="Overlay">
                                        <i class="icon icon-maps icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Overlay</span>
                                    </a>
                                </li>
                                <li class="dt-side-nav__item">
                                    <a href="map-overlay-polylines.php" class="dt-side-nav__link" title="Overlay Polylines">
                                        <i class="icon icon-maps icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Overlay Polylines</span>
                                    </a>
                                </li>
                                <li class="dt-side-nav__item">
                                    <a href="map-overlay-polygons.php" class="dt-side-nav__link" title="Overlay Polygons">
                                        <i class="icon icon-maps icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Overlay Polygons</span>
                                    </a>
                                </li>
                                <li class="dt-side-nav__item">
                                    <a href="map-geo-polygons.php" class="dt-side-nav__link" title="GeoJSON Polygons">
                                        <i class="icon icon-maps icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">GeoJSON Polygons</span>
                                    </a>
                                </li>
                                <li class="dt-side-nav__item">
                                    <a href="map-route.php" class="dt-side-nav__link" title="Map Routes">
                                        <i class="icon icon-maps icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Map Routes</span>
                                    </a>
                                </li>
                                <li class="dt-side-nav__item">
                                    <a href="map-advance-route.php" class="dt-side-nav__link" title="Advance Routes">
                                        <i class="icon icon-maps icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Advance Routes</span>
                                    </a>
                                </li>
                                <li class="dt-side-nav__item">
                                    <a href="data-maps.php" class="dt-side-nav__link" title="Data Maps">
                                        <i class="icon icon-maps icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Data Maps</span>
                                    </a>
                                </li>
                                <li class="dt-side-nav__item">
                                    <a href="am-maps.php" class="dt-side-nav__link" title="Am Maps">
                                        <i class="icon icon-maps icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Am Maps</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- /sub-menu -->
                        </li>
                        <!-- /menu item -->

                        <!-- Menu Header -->
                        <li class="dt-side-nav__item dt-side-nav__header">
                            <span class="dt-side-nav__text">Pages</span>
                        </li>
                        <!-- /menu header -->

                        <!-- Menu Item -->
                        <li class="dt-side-nav__item">
                            <a href="page-wall.php" class="dt-side-nav__link" title="Wall Page">
                                <i class="icon icon-wall icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Wall Page</span>
                            </a>
                        </li>
                        <li class="dt-side-nav__item">
                            <a href="page-profile.php" class="dt-side-nav__link" title="Profile Page">
                                <i class="icon icon-profilepage icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Profile Page</span>
                            </a>
                        </li>
                        <li class="dt-side-nav__item">
                            <a href="page-login.php" class="dt-side-nav__link" title="Login Page">
                                <i class="icon icon-login-page icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Login Page</span>
                            </a>
                        </li>
                        <li class="dt-side-nav__item">
                            <a href="page-signup.php" class="dt-side-nav__link" title="Sign Up Page">
                                <i class="icon icon-signup-page icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Sign Up Page</span>
                            </a>
                        </li>
                        <li class="dt-side-nav__item">
                            <a href="page-forgot-password.php" class="dt-side-nav__link" title="Forgot Password">
                                <i class="icon icon-forgot-pass icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Forgot Password</span>
                            </a>
                        </li>
                        <li class="dt-side-nav__item">
                            <a href="page-lock-screen.php" class="dt-side-nav__link" title="Lock Screen">
                                <i class="icon icon-lockscreen icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Lock Screen</span>
                            </a>
                        </li>
                        <li class="dt-side-nav__item">
                            <a href="page-blank.php" class="dt-side-nav__link" title="Blank Page">
                                <i class="icon icon-blankpage icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Blank Page</span>
                            </a>
                        </li>
                        <li class="dt-side-nav__item">
                            <a href="page-search.php" class="dt-side-nav__link" title="Search Page">
                                <i class="icon icon-searchpage icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Search Page</span>
                            </a>
                        </li>
                        <li class="dt-side-nav__item">
                            <a href="page-404.php" class="dt-side-nav__link" title="Error 404">
                                <i class="icon icon-error-404 icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Error 404</span>
                            </a>
                        </li>
                        <li class="dt-side-nav__item">
                            <a href="page-500.php" class="dt-side-nav__link" title="Error 500">
                                <i class="icon icon-error-500 icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Error 500</span>
                            </a>
                        </li>

                        <!-- Menu Header -->
                        <li class="dt-side-nav__item dt-side-nav__header">
                            <span class="dt-side-nav__text">Extra Views</span>
                        </li>
                        <!-- /menu header -->

                        <!-- Menu Item -->
                        <li class="dt-side-nav__item">
                            <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="Grid">
                                <i class="icon icon-grid icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">Grid</span>
                            </a>

                            <!-- Sub-menu -->
                            <ul class="dt-side-nav__sub-menu">
                                <li class="dt-side-nav__item">
                                    <a href="view-grid.php" class="dt-side-nav__link" title="Basic Grid">
                                        <i class="icon icon-grid icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Basic Grid</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="view-grid-1.php" class="dt-side-nav__link" title="Advanced Grid">
                                        <i class="icon icon-grid-advance icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Advanced Grid</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- /sub-menu -->
                        </li>
                        <li class="dt-side-nav__item">
                            <a href="javascript:void(0)" class="dt-side-nav__link dt-side-nav__arrow" title="List">
                                <i class="icon icon-list icon-fw icon-lg"></i>
                                <span class="dt-side-nav__text">List</span>
                            </a>

                            <!-- Sub-menu -->
                            <ul class="dt-side-nav__sub-menu">
                                <li class="dt-side-nav__item">
                                    <a href="view-list.php" class="dt-side-nav__link" title="Basic List">
                                        <i class="icon icon-list icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Basic List</span>
                                    </a>
                                </li>

                                <li class="dt-side-nav__item">
                                    <a href="view-list-1.php" class="dt-side-nav__link" title="Advanced List">
                                        <i class="icon icon-list-advance icon-fw icon-lg"></i>
                                        <span class="dt-side-nav__text">Advanced List</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- /sub-menu -->
                        </li>
                        <!-- /menu item -->

                    </ul>
                    <!-- /sidebar navigation -->

                </div>
            </aside>
            <!-- /sidebar -->
            <!-- Site Content Wrapper -->
            <div class="dt-content-wrapper">

                <!-- Site Content -->
                <div class="dt-content">

                    <!-- Page Header -->
                    <div class="dt-page__header">
                        <h1 class="dt-page__title">Blank Page</h1>
                    </div>
                    <!-- /page header -->

                    <!-- Grid -->
                    <div class="row">

                        @yield('content')

                    </div>
                    <!-- /grid -->

                </div>
                <!-- /site content -->

                <!-- Footer -->
                <footer class="dt-footer">
                    Copyright Company Name © 2019
                </footer>
                <!-- /footer -->
            </div>
            <!-- /site content wrapper -->

            <!-- Theme Chooser -->
            <div class="dt-customizer-toggle">
                <a href="javascript:void(0)" data-toggle="customizer"> <i class="icon icon-customizer animation-customizer"></i> </a>
            </div>
            <!-- /theme chooser -->

            <!-- Customizer Sidebar -->
            <aside class="dt-customizer dt-drawer position-right">
                <div class="dt-customizer__inner">

                    <!-- Customizer Header -->
                    <div class="dt-customizer__header">

                        <!-- Customizer Title -->
                        <div class="dt-customizer__title">
                            <h3 class="mb-0">Theme Settings</h3>
                        </div>
                        <!-- /customizer title -->

                        <!-- Close Button -->
                        <button type="button" class="close" data-toggle="customizer">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <!-- /close button -->

                    </div>
                    <!-- /customizer header -->

                    <!-- Customizer Body -->
                    <div class="dt-customizer__body ps-custom-scrollbar">
                        <!-- Customizer Body Inner  -->
                        <div class="dt-customizer__body-inner">

                            <!-- Section -->
                            <section>
                                <h4>Theme</h4>

                                <!-- List -->
                                <ul class="dt-list dt-list-sm" id="theme-chooser">
                                    <li class="dt-list__item">
                                        <div class="choose-option">
                                            <a href="javascript:void(0)" class="choose-option__icon" data-theme="light">
                                                <img src="assets/images/customizer-icons/theme-light.png" alt="Light">
                                            </a>
                                            <span class="choose-option__name">Light</span>
                                        </div>
                                    </li>
                                    <li class="dt-list__item">
                                        <div class="choose-option">
                                            <a href="javascript:void(0)" class="choose-option__icon" data-theme="semidark">
                                                <img src="assets/images/customizer-icons/theme-normal.png" alt="Normal">
                                            </a>
                                            <span class="choose-option__name">Semi-dark</span>
                                        </div>
                                    </li>
                                    <li class="dt-list__item">
                                        <div class="choose-option">
                                            <a href="javascript:void(0)" class="choose-option__icon" data-theme="dark">
                                                <img src="assets/images/customizer-icons/theme-dark.png" alt="Dark">
                                            </a>
                                            <span class="choose-option__name">Dark</span>
                                        </div>
                                    </li>
                                </ul>
                                <!-- /list -->

                            </section>
                            <!-- /section -->

                            <!-- Section -->
                            <section>
                                <h4>Style</h4>

                                <!-- List -->
                                <ul class="dt-list dt-list-sm">
                                    <li class="dt-list__item d-none d-lg-block">
                                        <div class="choose-option">
                                            <a href="javascript:void(0)" id="toggle-fixed-sidebar" class="choose-option__icon">
                                                <img src="assets/images/customizer-icons/fix-sidebar.png" alt="Fix Sidebar">
                                            </a>
                                            <span class="choose-option__name">Fix Sidebar</span>
                                        </div>
                                    </li>
                                    <li class="dt-list__item">
                                        <div class="choose-option">
                                            <a href="javascript:void(0)" id="toggle-fixed-header" class="choose-option__icon">
                                                <img src="assets/images/customizer-icons/fix-header.png" alt="Fix Header">
                                            </a>
                                            <span class="choose-option__name">Fix Header</span>
                                        </div>
                                    </li>
                                </ul>
                                <!-- /list -->

                            </section>
                            <!-- /section -->

                            <!-- Section -->
                            <section id="theme-style-chooser">
                                <h4>Color</h4>

                                <!-- List -->
                                <ul class="dt-list dt-list-sm dt-color-options">
                                    <li class="dt-list__item">
                                        <span class="dt-color-option" data-style="style-1"></span>
                                    </li>
                                    <li class="dt-list__item">
                                        <span class="dt-color-option" data-style="style-2"></span>
                                    </li>
                                    <li class="dt-list__item">
                                        <span class="dt-color-option" data-style="style-3"></span>
                                    </li>
                                    <li class="dt-list__item">
                                        <span class="dt-color-option" data-style="style-4"></span>
                                    </li>
                                    <li class="dt-list__item">
                                        <span class="dt-color-option" data-style="style-5"></span>
                                    </li>
                                    <li class="dt-list__item">
                                        <span class="dt-color-option" data-style="style-6"></span>
                                    </li>
                                    <li class="dt-list__item">
                                        <span class="dt-color-option" data-style="style-7"></span>
                                    </li>
                                    <li class="dt-list__item">
                                        <span class="dt-color-option" data-style="style-8"></span>
                                    </li>
                                    <li class="dt-list__item">
                                        <span class="dt-color-option" data-style="style-9"></span>
                                    </li>
                                    <li class="dt-list__item">
                                        <span class="dt-color-option" data-style="style-10"></span>
                                    </li>
                                </ul>
                                <!-- /list -->

                            </section>
                            <!-- /section -->

                            <!-- Section -->
                            <section class="d-none d-lg-block" id="sidebar-layout">
                                <h4>Sidebar Layout</h4>

                                <!-- List -->
                                <ul class="dt-list dt-list-sm">
                                    <li class="dt-list__item">
                                        <div class="choose-option">
                                            <a href="javascript:void(0)" class="choose-option__icon" id="sl-option1" data-value="folded">
                                                <img src="assets/images/customizer-icons/folded.png" alt="Folded">
                                            </a>
                                            <span class="choose-option__name">Folded</span>
                                        </div>
                                    </li>
                                    <li class="dt-list__item">
                                        <div class="choose-option">
                                            <a href="javascript:void(0)" class="choose-option__icon" id="sl-option2" data-value="default">
                                                <img src="assets/images/customizer-icons/default.png" alt="Default">
                                            </a>
                                            <span class="choose-option__name">Default</span>
                                        </div>
                                    </li>
                                    <li class="dt-list__item">
                                        <div class="choose-option">
                                            <a href="javascript:void(0)" class="choose-option__icon" id="sl-option3" data-value="drawer">
                                                <img src="assets/images/customizer-icons/drawer.png" alt="Drawer">
                                            </a>
                                            <span class="choose-option__name">Drawer</span>
                                        </div>
                                    </li>
                                </ul>
                                <!-- /list -->

                            </section>
                            <!-- /section -->

                            <!-- Section -->
                            <section class="d-none d-lg-block" id="layout-chooser">
                                <h4>Layout</h4>

                                <!-- List -->
                                <ul class="dt-list dt-list-sm">
                                    <li class="dt-list__item">
                                        <div class="choose-option">
                                            <a href="javascript:void(0)" class="choose-option__icon" data-layout="framed">
                                                <img src="assets/images/customizer-icons/framed.png" alt="Framed">
                                            </a>
                                            <span class="choose-option__name">Framed</span>
                                        </div>
                                    </li>
                                    <li class="dt-list__item">
                                        <div class="choose-option">
                                            <a href="javascript:void(0)" class="choose-option__icon" data-layout="full-width">
                                                <img src="assets/images/customizer-icons/full-width.png" alt="Full Width">
                                            </a>
                                            <span class="choose-option__name">Full Width</span>
                                        </div>
                                    </li>
                                    <li class="dt-list__item">
                                        <div class="choose-option">
                                            <a href="javascript:void(0)" class="choose-option__icon" data-layout="boxed">
                                                <img src="assets/images/customizer-icons/boxed.png" alt="Boxed">
                                            </a>
                                            <span class="choose-option__name">Boxed</span>
                                        </div>
                                    </li>
                                </ul>
                                <!-- /list -->

                            </section>
                            <!-- /section -->

                            <!-- Section -->
                            <section>
                                <h4>Nav Style</h4>

                                <!-- List -->
                                <ul class="dt-list">
                                    <li class="dt-list__item">
                                        <div class="choose-option">
                                            <a href="http://drift.g-axon.work/html-bs4/default" target="_blank" class="choose-option__icon">
                                                <img src="assets/images/customizer-icons/layout-default.png" alt="Layout Default">
                                            </a>
                                            <span class="choose-option__name">Default</span>
                                        </div>
                                    </li>
                                    <li class="dt-list__item">
                                        <div class="choose-option">
                                            <a href="../saas" target="_blank" class="choose-option__icon">
                                                <img src="assets/images/customizer-icons/layout-saas.png" alt="Layout SAAS">
                                            </a>
                                            <span class="choose-option__name">SAAS Layout</span>
                                        </div>
                                    </li>
                                    <li class="dt-list__item">
                                        <div class="choose-option">
                                            <a href="../listing" target="_blank" class="choose-option__icon">
                                                <img src="assets/images/customizer-icons/layout-listing.png" alt="Layout listing">
                                            </a>
                                            <span class="choose-option__name">Listing</span>
                                        </div>
                                    </li>
                                    <li class="dt-list__item">
                                        <div class="choose-option">
                                            <a href="../intranet" target="_blank" class="choose-option__icon">
                                                <img src="assets/images/customizer-icons/layout-intranet.png" alt="Layout Intranet">
                                            </a>
                                            <span class="choose-option__name">Intranet</span>
                                        </div>
                                    </li>
                                    <li class="dt-list__item">
                                        <div class="choose-option">
                                            <a href="../back-office" target="_blank" class="choose-option__icon">
                                                <img src="assets/images/customizer-icons/layout-back-office.png" alt="Layout Back Office">
                                            </a>
                                            <span class="choose-option__name">Back Office</span>
                                        </div>
                                    </li>
                                    <li class="dt-list__item">
                                        <div class="choose-option">
                                            <a href="../back-office-mini" target="_blank" class="choose-option__icon">
                                                <img src="assets/images/customizer-icons/layout-back-office-mini.png"
                                                     alt="Layout Back Office Minimal">
                                            </a>
                                            <span class="choose-option__name">Back Office Minimal</span>
                                        </div>
                                    </li>
                                    <li class="dt-list__item">
                                        <div class="choose-option">
                                            <a href="../modern" target="_blank" class="choose-option__icon">
                                                <img src="assets/images/customizer-icons/layout-modern.png" alt="Layout Modern">
                                            </a>
                                            <span class="choose-option__name">Modern</span>
                                        </div>
                                    </li>
                                    <li class="dt-list__item">
                                        <div class="choose-option">
                                            <a href="../crm" target="_blank" class="choose-option__icon">
                                                <img src="assets/images/customizer-icons/layout-crm.png" alt="Layout CRM">
                                            </a>
                                            <span class="choose-option__name">CRM</span>
                                        </div>
                                    </li>
                                </ul>
                                <!-- /list -->

                            </section>
                            <!-- /section -->

                        </div>
                        <!-- /customizer body inner -->
                    </div>
                    <!-- /customizer body -->

                </div>
            </aside>
            <!-- /customizer sidebar -->
        </main>
    </div>
</div>
<!-- /root -->

<!-- Optional JavaScript -->
<script src="{{ url('drift/assets/modules/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ url('drift/assets/modules/moment/moment.js') }}"></script>
<script src="{{ url('drift/assets/modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- Perfect Scrollbar jQuery -->
<script src="{{ url('drift/assets/modules/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
<!-- /perfect scrollbar jQuery -->

<!-- masonry script -->
<script src="{{ url('drift/assets/modules/masonry-layout/dist/masonry.pkgd.min.js') }}"></script>
<script src="{{ url('drift/assets/modules/sweetalert2/dist/sweetalert2.js') }}"></script>
<script src="{{ url('drift/assets/js/functions.js') }}"></script>
<script src="{{ url('drift/assets/js/customizer.js') }}"></script><!-- Custom JavaScript -->
<script src="{{ url('drift/assets/js/script.js') }}"></script>

</body>
</html>
