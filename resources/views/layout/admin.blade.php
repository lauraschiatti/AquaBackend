<!-- AquAPP Admin Page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="AquApp">
    <meta name="author" content="">
    @yield('meta')
    <title> AquAPP Admin | Panel </title>

    <link href="/css/materialize.min.css" rel="stylesheet">               					           <!-- Materialize core CSS -->
    <link href="/css/lab.css" rel="stylesheet">                         						           <!-- Lab core CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	 <!-- Material Icons -->
    <link href="/css/materialicons.css" rel="stylesheet">	 <!-- Material Icons -->
    <!--favicon-->
    <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


    <script src="/js/jq/jquery.min.js" type="text/javascript"></script>						<!-- Jquery core JS -->

    @yield('css')
</head>
<body>
<header>
    <div class="navbar-fixed">
        <nav role="navigation" id="large-top-nav">
            <div class="nav-wrapper">

                <!-- Small Navigation Bar -->
                <div class="mobile-nav hide-on-large-only primary" id="small-top-nav">
                    <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
                    @yield('title')
                </div>

                <!-- Large Navigation Bar -->

                <!--<ul class="desktop-nav right hide-on-med-and-down">
                  <li><a href="#"><i class="material-icons">trending_up</i></a></li>
                </ul>-->

                <!-- Desktop Menu  -->
                <ul class="side-nav fixed hide-on-med-and-down" id="nav-desktop">
                    <section class="menu-header">
                        <img src="/img/brand-no-back.png">
                    </section>
                    <!--<ul class="collection">
                      <li class="collection-item avatar">
                        <img src="img/face.jpg" alt="" class="circle">
                        <span class="title black-text">Username</span>
                        <p class="black-text">Admin Profile</p>
                        <a href="#!" class="secondary-content"><i class="right material-icons">chevron_right</i></a>
                      </li>
                    </ul>-->
                    <!--Options-->
                    <!--<div class="container">-->
                    <div class="menu-desktop">
                        <li class="etiquette">{{ trans("general.general") }}</li>
                        <li><a href="{{url('/')}}"><i class="material-icons left">home</i>{{ trans("general.home") }}</a></li>
                        <li><a href="{{url('/dashboard')}}"><i class="material-icons left">widgets</i>{{ trans("general.dashboard") }}</a></li>
                        @if(Auth::check() and Auth::user()->role == 'superadmin')
                            <ul class="collapsible collapsible-accordion">
                                <li><a class="collapsible-header"><i class="material-icons left">games</i>{{ trans("general.nodes") }}</a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <li><a href="{{url('/mynodes')}}"><i class="material-icons left">flag</i>{{ trans("nodes.my nodes") }}</a></li>
                                            <li><a href="{{url('/nodes')}}"><i class="material-icons left">toys</i>{{ trans("nodes.all nodes") }}</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        @endif

                        @if(Auth::check() and Auth::user()->role == 'provider')
                            <li><a href="{{url('/mynodes')}}"><i class="material-icons left">flag</i>{{ trans("general.nodes") }}</a></li>
                        @endif
                        <li><a href="{{url('/sensors')}}"><i class="material-icons left">place</i>{{ trans("general.sensors") }}</a></li>
                        <li><a href="{{url('/users')}}"><i class="material-icons left">people</i>{{ trans("general.users") }}</a></li>
                        <li class="etiquette">Configurations</li>
                        <li><a href="{{url('/settings/'.Auth::user()->id)}}"><i class="material-icons left">settings</i>{{ trans("general.settings") }}</a></li>
                        <li><a href="{{url('/contact')}}"><i class="material-icons left">turned_in</i>{{ trans("general.help &amp; feed") }}</a></li>
                        <li><a class="modal-trigger" href="#modal1"><i class="material-icons left">power_settings_new</i>{{ trans("general.log out") }}</a></li>
                    </div>
                </ul>

                <!-- Mobile Menu  -->
                <ul class="side-nav" id="nav-mobile">
                    <section class="menu-header">
                        <img src="/img/brand-no-back.png">
                    </section>
                    <!--Options-->
                    <div class="menu-mobile">
                        <li class="etiquette">General</li>
                        <li><a href="{{url('/dashboard')}}"><i class="material-icons left">widgets</i>{{ trans("general.dashboard") }}</a></li>

                        @if(Auth::check() and Auth::user()->role == 'superadmin')
                            <ul class="collapsible collapsible-accordion">
                                <li><a class="collapsible-header"><i class="material-icons left">games</i>{{ trans("general.nodes") }}</a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <li><a href="{{url('/mynodes')}}"><i class="material-icons left">flag</i>{{ trans("general.my nodes") }}</a></li>
                                            <li><a href="{{url('/nodes')}}"><i class="material-icons left">toys</i>{{ trans("general.all nodes") }}</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        @endif

                        @if(Auth::check() and Auth::user()->role == 'provider')
                            <li><a href="{{url('/mynodes')}}"><i class="material-icons left">flag</i>{{ trans("general.nodes") }}</a></li>
                        @endif

                        <li><a href="{{url('/sensors')}}"><i class="material-icons left">place</i>{{ trans("general.sensors") }}</a></li>

                        @if(Auth::check() and Auth::user()->role == 'superadmin')
                            <li><a href="{{url('/users')}}"><i class="material-icons left">people</i>{{ trans("general.users") }}</a></li>
                        @endif

                        <li class="etiquette">Configurations</li>
                        <li><a href="{{url('/settings')}}"><i class="material-icons left">settings</i>{{ trans("general.settings") }}</a></li>
                        <li><a href="{{url('/contact')}}"><i class="material-icons left">turned_in</i>{{ trans("general.help &amp; feed") }}</a></li>
                        <li><a class="modal-trigger" href="#modal1"><i class="material-icons left">power_settings_new</i>{{ trans("general.log out") }}</a></li>
                    </div>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- === NAV BAR === -->
<main>
<!-- DESKTOP -->
@yield('content')
<!-- DESKTOP -->

<!-- Log out modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content center">
        <h6 class="light">{{ trans("general.would you like to close admin session?") }} </h6><br>
        @if(Auth::check() and Auth::user()->role == 'superadmin')
            <a href="{{url('/dashboard')}}" class=" modal-action modal-close btn-flat">No</a>
        @else
            <a href="{{url('/')}}" class=" modal-action modal-close btn-flat">No</a>
        @endif
        <a href="{{url('/logout')}}" class="btn primary">{{ trans("general.yes") }}</a>
    </div>
</div>
</main>
<script src="/js/materialize.min.js" type="text/javascript"></script> 					<!-- Materialize core JS -->
<script src="/js/init.js" type="text/javascript"></script> 					          <!-- Init core JS -->

@yield('javascript')

</body>
</html>
