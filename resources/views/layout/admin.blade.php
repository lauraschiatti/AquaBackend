<!-- AquAPP Admin Page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="AquApp">
    <meta name="author" content="">
    @yield('meta')
    <title> AquAPP Admin | Dashboard </title>

    <link href="/css/materialize.min.css" rel="stylesheet">               					           <!-- Materialize core CSS -->
    <link href="/css/lab.css" rel="stylesheet">                         						           <!-- Lab core CSS -->
    <!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->	 <!-- Material Icons -->
    <link href="/css/materialicons.css" rel="stylesheet">	 <!-- Material Icons -->
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
                    <a href="#" class="mobile-tittle">Dashboard</a>
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
                        <li class="etiquette">General</li>
                        <li><a href="{{url('/dashboard')}}"><i class="material-icons left">widgets</i>Dashboard</a></li>
                        <ul class="collapsible collapsible-accordion">
                            <li><a class="collapsible-header"><i class="material-icons left">games</i>Nodes</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="{{url('/mynodes')}}"><i class="material-icons left">flag</i>My Nodes</a></li>
                                        <li><a href="{{url('/nodes')}}"><i class="material-icons left">toys</i>All Nodes</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <li><a href="{{url('/sensors')}}"><i class="material-icons left">place</i>Sensors</a></li>
                        <li><a href="{{url('/users')}}"><i class="material-icons left">people</i>Users</a></li>
                        <li class="etiquette">Configurations</li>
                        <li><a href="#"><i class="material-icons left">settings</i>Settings</a></li>
                        <li><a href="#"><i class="material-icons left">turned_in</i>Help &amp; Feed</a></li>
                        <li><a class="modal-trigger" href="#modal1"><i class="material-icons left">power_settings_new</i>Log out</a></li>
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
                        <li><a href="{{url('/dashboard')}}"><i class="material-icons left">widgets</i>Dashboard</a></li>
                        <ul class="collapsible collapsible-accordion">
                            <li><a class="collapsible-header"><i class="material-icons left">games</i>Nodes</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="{{url('/mynodes')}}"><i class="material-icons left">flag</i>My Nodes</a></li>
                                        <li><a href="{{url('/nodes')}}"><i class="material-icons left">toys</i>All Nodes</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <li><a href="{{url('/sensors')}}"><i class="material-icons left">place</i>Sensors</a></li>
                        <li><a href="{{url('/users')}}"><i class="material-icons left">people</i>Users</a></li>
                        <li class="etiquette">Configurations</li>
                        <li><a href="#"><i class="material-icons left">settings</i>Settings</a></li>
                        <li><a href="#"><i class="material-icons left">turned_in</i>Help &amp; Feed</a></li>
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
    <div class="modal-content center">
        <h6 class="light">Would you like to close admin session? </h6><br>
        <a href="#!" class="btn btn-flat modal-action modal-close">No</a>
        <a href="{{url('/logout')}}" class="btn primary">Yes</a>
    </div>
</div>

<script src="/js/jq/jquery.min.js" type="text/javascript"></script>						<!-- Jquery core JS -->
<script src="/js/materialize.min.js" type="text/javascript"></script> 					<!-- Materialize core JS -->
<script src="/js/init.js" type="text/javascript"></script> 					          <!-- Init core JS -->

@yield('javascript')

</body>
</html>
