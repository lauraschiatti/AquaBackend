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


<!-- === NAVBAR === -->
<header class="primary">
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand hide-on-med-and-down"><img src="/img/brand.png" alt="..."/></a>
                <a href="#" data-activates="mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>

                <ul class="right hide-on-med-and-down">
                    <li><a href="#home" class="grow">Home</a></li>
                    <li><a href="#about" class="grow">About</a></li>
                    <li><a href="#contribute" class="grow">Contribute</a></li>
                    <li><a href="#te" class="grow">Team</a></li>
                    <li><a href="#wiki" class="grow">Wiki | Contact</a></li>

                    <!-- Sign up-in Buttons -->
                    <li><a href="#" class="grow btn-flat waves-effect waves-light btn">Sign up</a></li>
                    <li><a href="#" class="btn btn-primary waves-effect waves-dark">Login</a></li>
                </ul>

                <ul class="side-nav center" id="mobile">
                    <section class="menu-header">
                        <img src="/img/brand-no-back.png" alt="...">
                    </section>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contribute</a></li>
                    <li><a href="#">Team</a></li>
                    <li><a href="#">Wiki | Contact</a></li>
                    <div class="divider"></div>
                    <li><a href="#">Sign up</a></li>
                    <li><a href="#">Login</a></li>

                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- === NAVBAR === -->

<main>
    <!-- === HOME === -->
    <section class="primary section scrollspy" id="home">
        <div class="container white-text" id="title">
            <h2 class="light">Cross-Browsers Platform</h2>
            <h5 class="light">for <strong>real time statistics</strong> of Cities Bays</h5>
            <a target="_blank" href="#"><button class="btn btn-secundary waves-effect waves-dark">Try it Now!</button></a><p>
            <p> Chrome | Firefox | Safari | Opera </p>
        </div>
        <img src="/img/screenshot.png" alt="..." width="988" height="370"/>
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
            <!--<img class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="PHP" src="img/brand/php.png">-->
            <h6 class="light">Developed with The Best Web Design Technologies</h6>
        </div>

    </div>
    <!-- === DIVISOR === -->

    <!-- === ABOUT === -->
    <section class="center">
        <h3>Not just Cities Bays Statitics</h3>
        <h5 class="light">Beautiful and simple, yet immensely effective</h5>

        <div class="section scrollspy row" id="about">
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

    <!-- === DIVISOR === -->
    <div class="divisor center">
        <div  class="box">
            <img class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Google Chrome" src="/img/brand/chrome.png">
            <img class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Mozilla Firefox" src="/img/brand/firefox.png">
            <img class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Safari" src="/img/brand/safari.png">
            <img class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Opera" src="/img/brand/opera.png">
            <h6 class="light">Cross-Browsers Compatible</h6>
        </div>
    </div>
    <!-- === DIVISOR === -->

    <!-- === CONTRIBUTE === -->
    <section class="primary center" id="cont">
        <div class="container white-text">
            <h3 class="light">How can I contribute? </h3>
            <h5 class="light">What If i told you that you can have your own nodes and sensors?</h5>
            <div class="section scrollspy" id="contribute"></div>
            <img src="/img/screenshot02.png" alt=""  width="800" height="300" />
        </div>
    </section>
    <!-- === CONTRIBUTE === -->

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

    <!-- === TEAM === -->
    <section class="center" id="team">
        <h3>Meet The Team</h3>
        <h5 class="light">Human conection is better.</h5>
        <div class="row">
            <div class="col s12 m3 l3 section scrollspy" id="te">
                <div class="card">
                    <div class="card-image">
                        <img src="/img/03.jpg">
                    </div>
                    <div class="card-content center">
                        <h4 class="light">Name</h4>
                        <h6 class="blue-text solid">Role</h6>
                    </div>
                </div>
            </div>

            <div class="col s12 m3 l3">
                <div class="card">
                    <div class="card-image">
                        <img src="/img/03.jpg">

                    </div>
                    <div class="card-content center">
                        <h4 class="light">Name</h4>
                        <h6 class="blue-text solid">Role</h6>
                    </div>
                </div>
            </div>

            <div class="col s12 m3 l3">
                <div class="card">
                    <div class="card-image">
                        <img src="/img/03.jpg">

                    </div>
                    <div class="card-content center">
                        <h4 class="light">Name</h4>
                        <h6 class="blue-text solid">Role</h6>
                    </div>
                </div>
            </div>

            <div class="col s12 m3 l3">
                <div class="card">
                    <div class="card-image">
                        <img src="/img/03.jpg">

                    </div>
                    <div class="card-content center">
                        <h4 class="light">Name</h4>
                        <h6 class="blue-text solid">Role</h6>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- === TEAM === -->

    <!-- === WIKI | CONTACT === -->
    <section id="help">
        <div class="center">
            <h4 class="light">Got Questions? <span>We've got answers</span></h4>
            <p class="light">We've designed a special place where u can find all the <a href="" class="blue-light">Faqs</a>
                and the APP documentation. Take a look...</p>
            <div class="buttons section scrollspy" id="wiki">
                <a href="#" class="btn btn-primary waves-effect waves-light">Read our Wiki</a>
                <a class="btn btn-secundary waves-effect waves-light">Contact Support</a></a>
            </div>
        </div>
    </section>
    <!-- === WIKI | CONTACT === -->

    <!-- === MAP === -->
    <div class="parallax-container">
        <div class="parallax"><img src="/img/map.png" alt="..."></div>
    </div>
    <!-- === MAP === -->

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


<script src="/js/jq/jquery.min.js" type="text/javascript"></script>						<!-- Jquery core JS -->
<script src="/js/materialize.min.js" type="text/javascript"></script> 					<!-- Materialize core JS -->
<script src="/js/init.js" type="text/javascript"></script> 					          <!-- Init core JS -->
</body>
</html>
