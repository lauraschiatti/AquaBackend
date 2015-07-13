<!-- Login Page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="AquApp">
    <meta name="author" content="">
    <title> AquApp | Site </title>

    <link href="/css/materialize.min.css" rel="stylesheet">               					           <!-- Materialize core CSS -->
    <link href="/css/site.css" rel="stylesheet">                         						         <!-- Site core CSS -->
    <link href="/css/materialicons.css" rel="stylesheet">	 <!-- Material Icons -->

</head>
<body>


<!-- NAVBAR -->
<header>
    <div class="navbar-fixed">
        <nav class="primary" role="navigation">
            <div class="nav-wrapper">
                <a href="#" class="brand hide-on-med-and-down"><img src="/img/brand.png" alt="..."/></a>
                <a href="#" data-activates="mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>

                <ul class="right hide-on-med-and-down">
                    <li><a href="#" class="waves-effect waves-light">Home</a></li>
                    <li><a href="#" class="waves-effect waves-light">About</a></li>
                    <li><a href="#" class="waves-effect waves-light">Wiki</a></li>
                    <li><a href="#" class="waves-effect waves-light">Team</a></li>
                    <li><a href="#" class="waves-effect waves-light">Contribute | Contact</a></li>
                    <li><a href="{{ url('register')}}" class="waves-effect waves-light btn btn-flat">Sign up</a></li>
                    <li>
                        <a href="{{ url('login')}}" class="waves-effect waves-dark btn btn-secundary">Login</a>
                    </li>
                </ul>

                <ul class="side-nav" id="mobile">
                    <section class="menu-header">
                        <img src="/img/brand-no-back.png">
                    </section>
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
<!-- NAVBAR -->

<!--INTRO-->
<main>
    <div class="section scrollspy primary" id="banner">
        <div class="container white-text" id="tittle">
            <h2 class="light">Cross-Browsers Platform</h2>
            <h5 class="light">for real time statistics of Cartagena's Bay</h5>
            <a target="_blank" href="#"><button class="btn btn-primary waves-effect waves-light">Try it!</button></a><p>
            <p> Chrome | Firefox | Safari | Opera </p>
        </div>
    </div>
    <!-- INTRO -->



    <!-- FOOTER -->
</main>
<footer class="page-footer secundary">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Company Bio</h5>
                <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Support</h5>
                <ul>
                    <li><a class="white-text" href="#!">Wiki</a></li>
                    <li><a class="white-text" href="#!">Contact</a></li>
                    <li><a class="white-text" href="#!">Team</a></li>
                    <li><a class="white-text" href="#!">Github</a></li>
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Connect</h5>
                <ul>
                    <li><a class="white-text" href="#!">Github</a></li>
                    <li><a class="white-text" href="#!">Twitter</a></li>
                    <li><a class="white-text" href="#!">Gmail</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2015 Copyright -
            <a class="grey-text text-lighten-4 right" href="#!"><i class="mdi-file-file-download left"></i>Get embed | Download this site</a>
        </div>
    </div>
</footer>
<!-- FOOTER -->

<script src="/js/jq/jquery.min.js" type="text/javascript"></script>						<!-- Jquery core JS -->
<script src="/js/materialize.min.js" type="text/javascript"></script> 					<!-- Materialize core JS -->
<script src="/js/init.js" type="text/javascript"></script> 					          <!-- Init core JS -->
</body>
</html>
