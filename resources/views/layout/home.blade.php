<!-- Index Page -->
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

    <script type="text/javascript" src="/js/jq/jquery.min.js"></script>						           <!-- Jquery core JS -->
    <script type="text/javascript" src="/js/highcharts.js"></script>  <!-- HighCharts core JS -->
    <script type="text/javascript" src="/js/graph.js"></script>                               <!-- Graphs core JS -->
</head>
<body>

<!-- === NAVBAR === -->
<header class="primary">
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="{{ url('/')}}" class="brand hide-on-med-and-down"><img src="/img/brand.png" alt="..."/></a>
                <a href="#"href="{{ url('/')}}" data-activates="mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>

                <ul class="right hide-on-med-and-down">
                    <li><a href="{{ url('/')}}" class="grow">Home</a></li>
                    <li><a href="{{ url('contribute')}}" class="grow">Contribute</a></li>
                    <li><a href="#" class="grow">Team</a></li>
                    <li><a href="#" class="grow">Wiki</a></li>
                    <li><a href="{{ url('contact')}}" class="grow">Contact</a></li>

                    <!-- Sign up-in Buttons -->
                    @if(Auth::check())
                        <li><a class="dropdown-button" href="#" data-beloworigin="true" data-activates="dropdown1"><i class="material-icons right">arrow_drop_down</i>Hi <span style="text-transform: capitalize;">{{(Auth::user()->name)}}</span></a></li>
                        <!-- Dropdown Structure -->
                        <ul id="dropdown1" class="dropdown-content">
                            @if(Auth::check() and Auth::user()->role == 'superadmin')
                                <li><a href="{{url('settings/'.Auth::user()->id)}}">Settings</a></li>
                            @else
                                <li><a href="{{url('profile/settings/'.Auth::user()->id)}}">Settings</a></li>
                            @endif
                            @if(Auth::check() and Auth::user()->role == 'superadmin')
                                <li><a href="{{ url('dashboard')}}">Dashboard</a></li>
                            @endif
                            <li><a href="{{ url('logout')}}">Log out</a></li>
                        </ul>
                    @else
                        <li><a href="{{ url('register')}}" class="grow btn-flat waves-effect waves-light btn">Sign up</a></li>
                        <li><a href="{{ url('login')}}" class="btn btn-primary waves-effect waves-dark">Login</a></li>
                    @endif

                </ul>

                <ul class="side-nav center" id="mobile">
                    <section class="menu-header">
                        <img src="/img/brand-no-back.png" alt="...">
                    </section>
                    <li><a href="{{ url('/')}}">Home</a></li>
                    <li><a href="{{ url('contribute')}}">Contribute</a></li>
                    <li><a href="#">Team</a></li>
                    <li><a href="#">Wiki</a></li>
                    <li><a href="{{ url('contribute')}}">Contact</a></li>
                    <div class="divider"></div>

                    @if(Auth::check())
                        <li><a href="#">Logged as <span style="font-size: 2em;">{{(Auth::user()->name)}}</span></a></li>
                        <li><a href="#">tune</a></li>
                        <li><a href="{{ url('logout')}}">Login</a></li>
                    @else
                        <li><a href="{{ url('register')}}">Sign up</a></li>
                        <li><a href="{{ url('login')}}">Login</a></li>
                    @endif

                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- === NAVBAR === -->

<main>
    <!-- === HOME === -->
    <section class="primary section scrollspy" id="home">
        <div class="white-text" id="title">
            <h2 class="light">Cross-Browsers Platform</h2>
            <h5 class="light">for <strong>real time statistics</strong> of Cities Bays</h5>
        </div>


        <div id="graph01" class="col s12"><div id="graph"></div></div>
        <div id="graph02" class="col s12"><div id="graph"></div></div>
        <div id="graph03" class="col s12"><div id="graph"></div></div>
        <div id="graph04" class="col s12"><div id="graph"></div></div>

        <div class="row" id="tabs">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3"><a class="active" href="#graph01">Graph1</a></li>
                    <li class="tab col s3"><a href="#graph02">Graph2</a></li>
                    <li class="tab col s3"><a href="#graph03">Graph3</a></li>
                    <li class="tab col s3"><a href="#graph04">Graph4</a></li>
                </ul>
            </div>
        </div>

    </section>
    <!-- === HOME === -->

    <!-- === DIVISOR === -->
    <div class="divisor center">

        <div  class="box">
            <img class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="HTML5" src="/img/brand/html5.png">
            <img class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="CSS3" src="/img/brand/css3.png">
            <img class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="JavaScript" src="/img/brand/js.png">
            <img class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Jquery" src="/img/brand/jquery.png">
            <img class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Laravel" src="/img/brand/laravel.png">
            <img class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="HighCharts" src="/img/brand/highcharts.png">
            <h6 class="light">Developed with The Best Web Design Technologies</h6>
        </div>

    </div>
    <!-- === DIVISOR === -->

    <!-- === ABOUT === -->
    <section class="center" id="about">
        <h3>Not just Cities Bays Statitics</h3>
        <h5 class="light">Beautiful and simple, yet immensely effective</h5>

        <div class="row">
            <!--   Features Section   -->
            <div class="container">
                <div class="row">
                    <div class="col s12 m4">
                        <div>
                            <h3><i class="medium material-icons">today</i></h3>
                            <h4 class="center">Real Time</h4>
                            <p class="light">Charts and Statistics with <span class="blue-text solid">current information</span> of cities bays conditions. The easiest way to keep you update of situation of water corps.</p>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div>
                            <h3><i class="medium material-icons">assignment_returned</i></h3>
                            <h4 class="center">Download</h4>
                            <p class="light">Sign up for free and be abble to sort date and type of information that you need, and <span class="blue-text solid">get charts</span> in different file formats. </p>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div>
                            <h3><i class="medium material-icons">dns</i></h3>
                            <h4 class="center">Filtering</h4>
                            <p class="light"><span class="blue-text solid">Sort charts information</span> more conviniently for you. We've made it easy, but don't take our word, taste it yourself and get convinced.</p>

                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col s12 m4">
                        <div>
                            <h3><i class="medium material-icons">brush</i></h3>
                            <h4 class="center">Cool</h4>
                            <p class="light">To develop a deeper and more meaningful connection with consumers, we believe <span class="blue-text solid">Front-End Design</span>  must invite them to take part in the conversation. So, We expend a lot of hours designing a powerful look an feel. </p>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div>
                            <h3><i class="medium material-icons">layers</i></h3>
                            <h4 class="center">Modern</h4>
                            <p class="light">When we start this we wanted to made it the most simple and easy as It was possible, so we decided to use Web technologies to write this, thinking in the future: <span class="blue-text solid">Cloud Computing.</span></p>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div>
                            <h3><i class="medium material-icons">devices</i></h3>
                            <h4 class="center">Cross-Browser</h4>
                            <p class="light">We build this for be compatible with <span class="blue-text solid">all modern browsers.</span> You're allow to use it in Chrome, Firefox, Safari and Opera, feel free yourself to prove it.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- === ABOUT === -->

    <!-- === MEET === -->
    <section class="center" id="meet">
        <h3>Meet AquApp</h3>
        <div class="container">
            <!--=== PROJECT ===-->
            <p class="light">AquApp is a platform that provides specific and updated information collected in the water bodies
                and in the bays of the city, so that it is available to scientists and institutions
                for further study. It is expected that the availability of this information allows
                companies and government to design prevention plans and improvement of water bodies.</p>
            <!--=== PROJECT ===-->
        </div>
    </section>
    <!-- === MEET === -->

    <!-- === HOW IT WORKS === -->
    <section class="center">
        <h3>How it works?</h3>
        <h5 class="light">Clean, easy and intuitive</h5>

        <!--   Features Section   -->
        <div class="container">
            <div class="row">
                <div class="col s12 m4">
                    <div>
                        <h3><i class="medium material-icons">graphic_eq</i></h3>
                        <h4 class="center">Take Data</h4>
                        <p class="light">Sensors in Nodes on the Cities Bay and Water Corps <span class="blue-text solid">take specific information</span> in different measure units (For example, for temperature It can take °C, °F or °K) and send them remotely to our engine.</p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div>
                        <h3><i class="medium material-icons">filter_none</i></h3>
                        <h4 class="center">Unpackage </h4>
                        <p class="light">Our API Engine takes the packages sent by Sensors in Nodes and <span class="blue-text solid">'unpack'</span> them. Then we store that information in our database for quickly future usage.</p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div>
                        <h3><i class="medium material-icons">grain</i></h3>
                        <h4 class="center">Generate</h4>
                        <p class="light">We use API information stored for <span class="blue-text solid">create charts</span>. We've made easy reading that information. It's disponible for you to use it, you can also download it in different file formats.</p>

                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- === HOW IT WORKS === -->

    <!-- === WIKI | CONTACT === -->
    <section id="help">
        <div class="container divider"></div>
        <div class="center">
            <h4 class="light">Got Questions? <span>We've got answers</span></h4>
            <p class="light">We've designed a special place where u can find all the <a href="" class="blue-light">Faqs</a>
                and the APP documentation. Take a look...</p>
            <div class="buttons">
                <a href="#" class="btn btn-primary waves-effect waves-light">Read our Wiki</a>
                <a class="btn btn-secundary waves-effect waves-light">Contact Support</a></a>
            </div>
        </div>
    </section>
    <!-- === WIKI | CONTACT === -->


    <!-- === DIVISOR === -->
    <!--
    <div class="divisor center">
      <div  class="box">
       <img class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Google Chrome" src="img/brand/chrome.png">
       <img class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Mozilla Firefox" src="img/brand/firefox.png">
       <img class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Safari" src="img/brand/safari.png">
       <img class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Opera" src="img/brand/opera.png">
       <h6 class="light">Cross-Browsers Compatible</h6>
      </div>
    </div>-->
    <!-- === DIVISOR === -->

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
                        <li><a href="#!">Contact</a></li>
                        <li><a href="#!">Team</a></li>
                    </ul>
                </div>

                <div class="col s4">

                    <h5>Contribute</h5>
                    <ul>
                        <li><a href="#!">Github</a></li>
                        <li><a href="#!">Twitter</a></li>
                        <li><a href="#!">Google</a></li>
                    </ul>
                </div>

                <div class="col s4">

                    <h5>Product</h5>
                    <ul>
                        <li><a href="#!">About</a></li>
                        <li><a href="#!">Project</a></li>
                        <li><a href="#!">Feedback</a></li>
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

<script src="/js/materialize.min.js" type="text/javascript"></script> 					<!-- Materialize core JS -->
<script src="/js/init.js" type="text/javascript"></script> 					          <!-- Init core JS -->

</body>
</html>
