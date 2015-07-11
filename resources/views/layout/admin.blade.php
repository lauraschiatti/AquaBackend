<!-- AquAPP Admin Page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="AquApp">
    <meta name="author" content="">
    <title> AquAPP Admin | Dashboard </title>

    <link href="/css/materialize.min.css" rel="stylesheet">               					           <!-- Materialize core CSS -->
    <link href="/css/lab.css" rel="stylesheet">                         						           <!-- Lab core CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	 <!-- Material Icons -->
</head>
<body>
<header>
    <div class="navbar-fixed">
        <nav role="navigation" id="large-top-nav">
            <div class="nav-wrapper">

                <!-- Small Navigation Bar -->
                <div class="row hide-on-large-only primary">
                    <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
                    @yield('title')
                </div>

                <!-- Large Navigation Bar -->
                <ul class="desktop-nav right hide-on-med-and-down">
                    <li><a href="#"><i class="material-icons">trending_up</i></a></li>
                    <li><a href="#"><i class="material-icons">refresh</i></a></li>
                    <li><a href="#"><i class="material-icons">vertical_align_bottom</i></a></li>
                    <li><a class="modal-trigger" href="#modal1"><i class="material-icons">close</i></a></li>
                </ul>

                <!-- Desktop Menu  -->
                <ul class="side-nav fixed hide-on-med-and-down" id="nav-desktop">
                    <section class="menu-header">
                        <img src="/img/brand-no-back.png">
                    </section>
                    <ul class="collection">
                        <li class="collection-item avatar">
                            <img src="/img/face.jpg" alt="" class="circle">
                            <strong><span class="title black-text">
                                @if(Auth::check())
                                    {{strtoupper(Auth::user()->name)}}
                                @else
                                    User
                                @endif
                            </span></strong>
                            <p class="black-text">Admin Profile</p>
                            <a href="#!" class="secondary-content"><i class="right material-icons">chevron_right</i></a>
                        </li>
                    </ul>
                    <!--Options-->
                    <div class="container">
                        <div class="divider"></div>
                        <li class="active"><a href="{{url('/dashboard')}}"><i class="material-icons left">widgets</i>Dashboard</a></li>
                        <li><a href="{{url('/sensors')}}"><i class="material-icons left">place</i>Sensors</a></li>
                        <li><a href="{{url('/nodes')}}"><i class="material-icons left">games</i>Nodes</a></li>
                        <li><a href="{{url('users')}}"><i class="material-icons left">people</i>Users</a></li>
                        <div class="divider"></div>
                        <li><a href="#"><i class="material-icons left">settings</i>Settings</a></li>
                        <li><a href="#"><i class="material-icons left">turned_in</i>Help &amp; Feed</a></li>
                        <div class="divider"></div>
                        <li><a class="modal-trigger" href="#modal1"><i class="material-icons left">power_settings_new</i>Log out</a></li>
                    </div>
                </ul>

                <!-- Mobile Menu  -->
                <ul class="side-nav" id="nav-mobile">
                    <section class="menu-header">
                        <img src="/img/brand-no-back.png">
                    </section>
                    <!--Options-->
                    <div class="container">
                        <li><a href="{{url('/dashboard')}}"><i class="material-icons left">widgets</i>Dashboard</a></li>
                        <li><a href="{{url('/sensors')}}"><i class="material-icons left">place</i>Sensors</a></li>
                        <li><a href="{{url('/nodes')}}"><i class="material-icons left">games</i>Nodes</a></li>
                        <li><a href="{{url('users')}}"><i class="material-icons left">people</i>Users</a></li>
                        <div class="divider"></div>
                        <li><a href="#"><i class="material-icons left">person</i>Profile</a></li>
                        <li><a href="#"><i class="material-icons left">settings</i>Settings</a></li>
                        <li><a href="#"><i class="material-icons left">turned_in</i>Help &amp; Feed</a></li>
                        <div class="divider"></div>
                        <li><a class="modal-trigger" href="#modal1"><i class="material-icons left">power_settings_new</i>Log out</a></li>
                    </div>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- === NAV BAR === -->

<!-- DESKTOP -->
@yield('content')
<!-- DESKTOP -->

<!-- Log out modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-header primary center" style="padding-top: 20px; padding-bottom: 40px;">
        <!--<h4 class="light white-text">Log out</h4>-->
        <i class="material-icons white-text modal-action modal-close" style="margin-right: 20px; float: right;">close</i>
    </div>
    <div class="modal-content center">
        <h6 class="light">Would you like to close admin session? </h6><br>
        <a href="#!" class="btn btn-flat modal-action modal-close">No</a>
        <a href="{{url('/')}}" class="btn primary">Yes</a>
    </div>
</div>

<script src="/js/jq/jquery.min.js" type="text/javascript"></script>						<!-- Jquery core JS -->
<script src="/js/materialize.min.js" type="text/javascript"></script> 					<!-- Materialize core JS -->
<script src="/js/init.js" type="text/javascript"></script> 					          <!-- Init core JS -->
</body>
</html>
