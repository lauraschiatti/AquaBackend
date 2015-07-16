<!-- Index Page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="AquApp">
    <meta name="author" content="">
    <title> AquApp | Statistics </title>

    <link href="/css/materialize.min.css" rel="stylesheet">               					           <!-- Materialize core CSS -->
    <link href="/css/app.css" rel="stylesheet">                         						           <!-- App core CSS -->
    <link href="/css/materialicons.css" rel="stylesheet">	 <!-- Material Icons -->

</head>
<body>

<!-- === NAVBAR === -->
<header>
    <div class="navbar-fixed">
        <nav role="navigation">
            <div class="nav-wrapper">
                <a href="#" class="brand hide-on-med-and-down"><img src="/img/brand-blue.png" alt="..."/></a>
                <a href="#" data-activates="mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>

                <ul class="right hide-on-med-and-down">
                    @if(Auth::check())
                        <li><a href="#">Logged as <span>{{(Auth::user()->name)}}</span></a> </li>
                        <li>|</li>
                        <li><a href="#"><i class="material-icons">tune</i></a></li>
                        <li>|</li>
                        <li><a href="{{ url('logout')}}"><i class="material-icons">power_settings_new</i></a></li>
                    @else
                        <li><a href="#" class="btn btn-flat waves-effect waves-light">Sign up</a></li>
                        <li><a href="#" class="btn btn-primary waves-effect waves-dark white-text">Login</a></li>
                    @endif
                </ul>

                <ul class="side-nav" id="mobile">
                    <!--<section class="menu-header">
                      <img src="img/brand-no-back.png">
                    </section>-->
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Download</a></li>
                    <li><a href="#">Learn</a></li>
                    <li><a href="#">Team</a></li>
                    <li><a href="#">Contribute | Contact</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- === NAVBAR === -->

<script src="/js/jq/jquery.min.js" type="text/javascript"></script>						<!-- Jquery core JS -->
<script src="/js/materialize.min.js" type="text/javascript"></script> 					<!-- Materialize core JS -->
<script src="/js/init.js" type="text/javascript"></script> 					          <!-- Init core JS -->
</body>
</html>
