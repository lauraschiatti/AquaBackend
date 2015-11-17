<!-- Contribute Page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="AquApp">
    <meta name="author" content="">
    <title> AquApp | Contribute </title>

    <link href="/css/materialize.min.css" rel="stylesheet">               					           <!-- Materialize core CSS -->
    <link href="/css/site.css" rel="stylesheet">                         						         <!-- Site core CSS -->
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
</head>
<body>

<!-- === NAVBAR === -->
<header class="primary">
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="{{ url('/')}}" class="brand hide-on-med-and-down"><img src="/img/brand.png" alt="..."/></a>
                <a href="{{ url('/')}}" data-activates="mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>

                <ul class="right hide-on-med-and-down">
                    <li><a href="{{ url('/')}}" class="grow">Back Home</a></li>
                </ul>

                <ul class="side-nav center" id="mobile">
                    <section class="menu-header">
                        <img src="/img/brand-no-back.png" alt="...">
                    </section>
                    <li><a href="{{ url('/')}}">Home</a></li>
                    <li><a href="{{ url('contribute')}}">Contribute</a></li>
                    <li><a href="{{ url('team')}}">Team</a></li>
                    <li><a href="#">Wiki</a></li>
                    <li><a href="{{ url('contact')}}">Contact</a></li>
                    <div class="divider"></div>
                    <li><a href="{{ url('register')}}">Sign up</a></li>
                    <li><a href="{{ url('login')}}">Login</a></li>

                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- === NAVBAR === -->
<body>

<main>
    <!-- === HOME === -->
    <section class="section scrollspy primary" id="contribute">
        <div class="container white-text tittle">
            <h2 class="light">How can I contribute?</h2>
            <h5 class="light">We've designed a <strong>special place</strong> for you</h5>
            <p class="light">Keep Scrolling </p>
        </div>
        <img id="screenshot" src="img/screenshot02.png" alt="..." width="988" height="370">
    </section>
    <!-- === HOME === -->

    <section class="center" id="lab">
        <h3>Aqualab</h3>
        <p class="light">Is the place that we've designed for providers with special features where you can <span class="blue-text strong">feed the System..</span></p>
        <div class="container">
            <div class="row">
                <div class="col s12 m4">
                    <div>
                        <h3><i class="medium material-icons">flip_to_front</i></h3>
                        <h4 class="center">Funtional</h4>
                        <p class="light">You can Create, Edit, Update and Delete Nodes, sensors and users. </p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div>
                        <h3><i class="medium material-icons">trending_up</i></h3>
                        <h4 class="center">Dashboard </h4>
                        <p class="light">Follow real time statistics from Nodes, Sensors, User, Downloads and more in an integrated dashboard section. </p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div>
                        <h3><i class="medium material-icons">swap_horiz</i></h3>
                        <h4 class="center">Schema</h4>
                        <p class="light">You can choose your more convinient order of data sending schema from sensors information in nodes.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m4">
                    <div>
                        <h3><i class="medium material-icons">system_update_alt</i></h3>
                        <h4 class="center">Download </h4>
                        <p class="light">You can get chart files and also nodes, sensors or user tables for printing or storing.</p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div>
                        <h3><i class="medium material-icons">portrait</i></h3>
                        <h4 class="center">Users </h4>
                        <p class="light">It's possible to add new providers or normal users with your account. </p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div>
                        <h3><i class="medium material-icons">settings_ethernet</i></h3>
                        <h4 class="center">Help &#38; Feed</h4>
                        <p class="light">If you have problems you can contact Support quickly. Off course you can for report bugs too.y</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- === WIKI | CONTACT === -->
    <section id="help">
        <div class="container divider"></div>
        <div class="center">
            <h4 class="light">Got Questions? <span>We've got answers</span></h4>
            <p class="light">We've designed a special place where u can find all the <a href="" class="blue-light">Faqs</a>
                and the APP documentation. Take a look...</p>
            <div class="buttons">
                <a href="https://github.com/IngenieriaDeSistemasUTB/AquaBackend'" class="btn btn-primary waves-effect waves-light">Read our Wiki</a>
                <a href="{{ url('contact')}}"class="btn btn-secundary waves-effect waves-light">Contact Support</a>
            </div>
        </div>
    </section>
    <!-- === WIKI | CONTACT === -->

</main>
<!-- === FOOTER === -->
<footer class="page-footer" id="footer">
    <div class="container">
        <div class="row">
            <!-- Address -->
            <div class="col m3 l3 hide-on-small-only" id="details">
                <h5>Address</h5>
                <ul>
                    <li><strong>Campus Tecnológico</strong></li>
                    <li>Parque Industrial y Tecnológico Carlos Vélez Pombo</li>
                    <li>Km 1 Vía Turbaco - Tel: (57) 5 6535200  </li>
                    <li>Morning: lunes a viernes de 8:00 a.m. a 12:00 p.m.</li>
                    <li>Afternoon: lunes a viernes de 1:00 p.m a 5:00 p.m. </li>
                </ul>
            </div>
            <!-- Address -->
            <!-- Links -->
            <div class="col s12 m9 l5" id="links">

                <div class="col s4">

                    <h5>Support</h5>
                    <ul>
                        <li><a href="#!">Wiki</a></li>
                        <li><a href="{{ url('contact')}}">Contact</a></li>
                        <li><a href="{{ url('team')}}">Team</a></li>
                    </ul>
                </div>

                <div class="col s4">

                    <h5>Contribute</h5>
                    <ul>
                        <li><a href="https://github.com/IngenieriaDeSistemasUTB/AquaBackend.git">Github</a></li>
                        <li><a href="#!">Twitter</a></li>
                        <li><a href="#!">Google</a></li>
                    </ul>
                </div>

                <div class="col s4">

                    <h5>Product</h5>
                    <ul>
                        <li><a href="{{ url('terms')}}">About</a></li>
                        <li><a href="https://github.com/IngenieriaDeSistemasUTB/AquaBackend.git">Project</a></li>
                        <li><a href="{{ url('terms')}}">Legal</a></li>
                    </ul>
                </div>
            </div>
            <!-- Links -->
            <!-- Small -->
            <div class="col s12 show-on-small hide-on-med-and-up center" id="details">
                <div class="container">
                    <img src="/img/utb-logo-03.png" alt=""/>
                </div>
                <ul class="light">
                    <li><strong>Campus Tecnológico</strong></li>
                    <li>Parque Industrial y Tecnológico Carlos Vélez Pombo</li>
                    <li>Km 1 Vía Turbaco - Tel: (57) 5 6535200  </li>
                    <li>Morning: lunes a viernes de 8:00 a.m. a 12:00 p.m.</li>
                    <li>Afternoon: lunes a viernes de 1:00 p.m a 5:00 p.m. </li>
                </ul>
            </div>
            <!-- Small -->
            <!-- Brand -->
            <div class="col l4 hide-on-med-and-down">
                <div class="container">
                    <a target="_blank" href="http://www.unitecnologica.edu.co/"><div id="brand-utb"></div></a>
                </div>
            </div>
            <!-- Brand -->

        </div>
    </div>

    <!-- Footer -->
    <div class="footer-copyright center">
        <div class="container light">
            &#60;&#47;&#62; with <span class="red-text">&#10084;</span> in Cartagena de Indias, D.T. y C. - Colombia
            <a class="right hide-on-small-only" href="#home">Back to top</a>
        </div>
    </div>
</footer>
<!-- === FOOTER === -->
<script type="text/javascript" src="js/jq/jquery.min.js"></script>						<!-- Jquery core JS -->
<script src="js/materialize.min.js" type="text/javascript"></script> 					<!-- Materialize core JS -->
<script src="js/init.js" type="text/javascript"></script> 					          <!-- Init core JS -->
</body>
</html>
