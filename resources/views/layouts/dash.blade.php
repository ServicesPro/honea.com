<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta property="og:type" content="product">
    <meta property="og:site_name" content="Honea">
    <meta property="og:title" content="Honea - Faites vous livrer en un click">
    <meta property="og:url" content="www.Honea.com">
    <meta property="og:description"
        content="Honea est la première destination d’achat en ligne. Nous sommes fiers d’avoir tout ce dont vous pourriez avoir besoin pour vivre au meilleur prix que partout ailleurs.">
    <meta name="description"
        content="Honea est la première destination d’achat en ligne. Nous sommes fiers d’avoir tout ce dont vous pourriez avoir besoin pour vivre au meilleur prix que partout ailleurs.">
    <meta name="title" content="Honea - Faites vous livrer en un click">
    <link rel="icon" type="icon/png" href="favicon.png">

    <!-- App css -->
    <link href="{{ asset('dash/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dash/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dash/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dash/css/style.css') }}" rel="stylesheet" type="text/css" />

    @yield('css')
</head>

<body>
    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="{{ url('/', []) }}" class="logo">
                {{-- <span>
                    <img src="{{ asset('image/honea.png') }}" alt="logo-small" class="logo-sm">
                </span> --}}
                <span>
                    <img src="{{ asset('image/honea.png') }}" alt="logo-large" class="logo-lg">
                </span>
            </a>
        </div>
        <!--end logo-->
        <!-- Navbar -->
        <nav class="navbar-custom">
            <ul class="list-unstyled topbar-nav float-right mb-0">
                {{-- <li class="hidden-sm"> --}}
                <li>
                    <a href="#" class="nav-link waves-effect waves-light">Panier</a>
                    {{-- <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="javascript: void(0);" role="button"
                        aria-haspopup="false" aria-expanded="false">
                        English <img src="{{ asset('dash/images/flags/us_flag.jpg') }}" class="ml-2" height="16" alt=""/> <i class="mdi mdi-chevron-down"></i>
                    </a> --}}
                    {{-- <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="javascript: void(0);"><span> German </span><img src="{{ asset('') }}dash/images/flags/germany_flag.jpg" alt="" class="ml-2 float-right" height="14"/></a>
                        <a class="dropdown-item" href="javascript: void(0);"><span> Italian </span><img src="{{ asset('') }}dash/images/flags/italy_flag.jpg" alt="" class="ml-2 float-right" height="14"/></a>
                        <a class="dropdown-item" href="javascript: void(0);"><span> French </span><img src="{{ asset('') }}dash/images/flags/french_flag.jpg" alt="" class="ml-2 float-right" height="14"/></a>
                        <a class="dropdown-item" href="javascript: void(0);"><span> Spanish </span><img src="{{ asset('') }}dash/images/flags/spain_flag.jpg" alt="" class="ml-2 float-right" height="14"/></a>
                        <a class="dropdown-item" href="javascript: void(0);"><span> Russian </span><img src="{{ asset('') }}dash/images/flags/russia_flag.jpg" alt="" class="ml-2 float-right" height="14"/></a>
                    </div> --}}
                </li>

                {{-- <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="false" aria-expanded="false">
                        <i class="dripicons-bell noti-icon"></i>
                        <span class="badge badge-danger badge-pill noti-icon-badge">2</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-lg">
                        <!-- item-->
                        <h6 class="dropdown-item-text">
                            Notifications (18)
                        </h6>
                        <div class="slimscroll notification-list">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                <p class="notify-details">Your order is placed<small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-warning"><i class="mdi mdi-message"></i></div>
                                <p class="notify-details">New Message received<small class="text-muted">You have 87 unread messages</small></p>
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-info"><i class="mdi mdi-glass-cocktail"></i></div>
                                <p class="notify-details">Your item is shipped<small class="text-muted">It is a long established fact that a reader will</small></p>
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>
                                <p class="notify-details">Your order is placed<small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-danger"><i class="mdi mdi-message"></i></div>
                                <p class="notify-details">New Message received<small class="text-muted">You have 87 unread messages</small></p>
                            </a>
                        </div>
                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                            View all <i class="fi-arrow-right"></i>
                        </a>
                    </div>
                </li> --}}

                <li class="dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown"
                        href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('dash/images/users/user-4.jpg') }}" alt="profile-user"
                            class="rounded-circle" />
                        <span class="ml-1 nav-user-name hidden-sm"> {{ Auth::user()->name }} <i
                                class="mdi mdi-chevron-down"></i> </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#"><i class="dripicons-user text-muted mr-2"></i> Profil</a>
                        <a class="dropdown-item" href="#"><i class="dripicons-wallet text-muted mr-2"></i> Commandes</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="dripicons-exit text-muted mr-2"></i> Déconnexion</a>
                    </div>
                </li>
            </ul>
            <!--end topbar-nav-->

            <ul class="list-unstyled topbar-nav mb-0">
                <li>
                    <button class="button-menu-mobile nav-link waves-effect waves-light">
                        <i class="dripicons-menu nav-icon"></i>
                    </button>
                </li>
                <li class="hide-phone app-search">
                    <form role="search" class="">
                        <input type="text" placeholder="Rechercher..." class="form-control">
                        <a href=""><i class="fas fa-search"></i></a>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- end navbar-->



    </div>
    <!-- Top Bar End -->

    <div class="page-wrapper">
        <!-- Left Sidenav -->
        <div class="left-sidenav">
            <div class="main-icon-menu">
                <nav class="nav">
                    <a href="#MetricaEcommerce" class="nav-link" data-toggle="tooltip-custom" data-placement="top"
                        title="" data-original-title="Honea">
                        <svg class="nav-svg" version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                            style="enable-background:new 0 0 512 512;" xml:space="preserve">
                            <g>
                                <ellipse class="svg-primary"
                                    transform="matrix(0.9998 -1.842767e-02 1.842767e-02 0.9998 -7.7858 3.0205)" cx="160"
                                    cy="424" rx="24" ry="24" />
                                <ellipse class="svg-primary"
                                    transform="matrix(2.381651e-02 -0.9997 0.9997 2.381651e-02 -48.5107 798.282)"
                                    cx="384.5" cy="424" rx="24" ry="24" />
                                <path
                                    d="M463.8,132.2c-0.7-2.4-2.8-4-5.2-4.2L132.9,96.5c-2.8-0.3-6.2-2.1-7.5-4.7c-3.8-7.1-6.2-11.1-12.2-18.6
                                    c-7.7-9.4-22.2-9.1-48.8-9.3c-9-0.1-16.3,5.2-16.3,14.1c0,8.7,6.9,14.1,15.6,14.1c8.7,0,21.3,0.5,26,1.9c4.7,1.4,8.5,9.1,9.9,15.8
                                    c0,0.1,0,0.2,0.1,0.3c0.2,1.2,2,10.2,2,10.3l40,211.6c2.4,14.5,7.3,26.5,14.5,35.7c8.4,10.8,19.5,16.2,32.9,16.2h236.6
                                    c7.6,0,14.1-5.8,14.4-13.4c0.4-8-6-14.6-14-14.6H189h-0.1c-2,0-4.9,0-8.3-2.8c-3.5-3-8.3-9.9-11.5-26l-4.3-23.7
                                    c0-0.3,0.1-0.5,0.4-0.6l277.7-47c2.6-0.4,4.6-2.5,4.9-5.2l16-115.8C464,134,464,133.1,463.8,132.2z" />
                            </g>
                        </svg>
                    </a>
                    <!--end MetricaEcommerce-->
                </nav>
                <!--end nav-->
            </div>
            <!--end main-icon-menu-->

            <div class="main-menu-inner">
                <div class="menu-body slimscroll">
                    <div id="MetricaEcommerce" class="main-icon-menu-pane">
                        <div class="title-box">
                            <h6 class="menu-title">Honea</h6>
                        </div>
                        <ul class="nav">
                            {{-- <li class="nav-item">
                                <a class="nav-link @if (Request::route('/dashboard')) active @endif" href="{{ route('dashboard') }}"><i
                                        class="dripicons-device-desktop"></i>
                                    Dashboard
                                </a>
                            </li> --}}
                            <li class="nav-item"><a class="nav-link @if (Request::route('users/orders*')) active @endif" href="{{ route('users.orders', ['id'=>Auth::user()->id]) }}"><i
                                        class="dripicons-view-apps"></i>Commandes</a></li>
                            <li class="nav-item">
                            <li class="nav-item">
                                <a class="nav-link @if (Request::route('/users*')) active @endif"
                                    href="{{ route('profile', ['id' => Auth::user()->id]) }}"><i
                                        class="dripicons-device-desktop"></i>
                                    Profil
                                </a>
                            </li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit()"><i class="dripicons-list"></i>
                                        Déconnexion
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div><!-- end Ecommerce -->
                </div>
                <!--end menu-body-->
            </div><!-- end main-menu-inner-->
        </div>
        <!-- end left-sidenav-->

        <!-- Page Content-->
        <div class="page-content">

            <div class="container-fluid">

                @yield('content')

            </div><!-- container -->

            <footer class="footer text-center text-sm-left">
                &copy; 2021 Honea <span class="text-muted d-none d-sm-inline-block float-right">Crafted with <i
                        class="mdi mdi-heart text-danger"></i> by Eservices</span>
            </footer>
            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>

    <!-- jQuery  -->
    <script src="{{ asset('dash/js/jquery.min.js') }}"></script>
    <script src="{{ asset('dash/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dash/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('dash/js/waves.min.js') }}"></script>
    <script src="{{ asset('dash/js/jquery.slimscroll.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('dash/js/app.js') }}"></script>
    @yield('js')
</body>

</html>
