<!-- Team Page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="AquApp">
    <meta name="author" content="">
    <title> AquApp | Team </title>

    <link href="/css/materialize.min.css" rel="stylesheet">               			<!-- Materialize core CSS -->
    <link href="/css/site.css" rel="stylesheet">                         				<!-- Site core CSS -->
    <link href="/css/materialicons.css" rel="stylesheet">	                      <!-- Material Icons -->

    <script type="text/javascript" src="/js/jq/jquery.min.js"></script>					<!-- Jquery core JS -->
    <script type="text/javascript" src="/js/highcharts.js"></script>            <!-- HighCharts core JS -->
    <script src="http://code.highcharts.com/highcharts-more.js"></script>       <!-- HighCharts-more core JS -->

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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Contribute</a></li>
                    <li><a href="#">Team</a></li>
                    <li><a href="#">Wiki</a></li>
                    <li><a href="#">Contact</a></li>
                    <div class="divider"></div>
                    <li><a href="#">Sign up</a></li>
                    <li><a href="#">Login</a></li>

                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- === NAVBAR === -->
<body>

<main>

  <!-- === HOME === -->
  <section class="primary section scrollspy" id="team">
    <div class="white-text">
      <h2 class="light">Meet us in numbers</h2>
      <h5 class="light"><strong>Human Connection</strong> is better</h5>
      <div id="team-graph"></div>
      <h5 class="light">Keep Scrolling</h5>
    </div>
  </section>
  <!-- === HOME === -->

  <!-- === TEAM === -->
  <section class="center"><br>
    <h2 class="light">Meet The Team</h2>

    <div class="row cards">
      <div class="tcard col s12 m3 l2 center">
        <img src="/img/face.jpg" alt="" />
        <h3>Laura Schiatti</h3>
        <h5 class="light">Back-End Developer</h5>
      </div>

      <div class="tcard col s12 m3 l2 center">
        <img src="/img/face.jpg" alt="" />
        <h3>Yefferson Marín</h3>
        <h5 class="light">Front-End Developer</h5>
      </div>

      <div class="tcard col s12 m3 l2 center">
        <img src="/img/face.jpg" alt="" />
        <h3>Juan Martínez</h3>
        <h5 class="light">Investigator</h5>
      </div>
      <div class="tcard col s12 m3 l2 center">
        <img src="/img/face.jpg" alt="" />
        <h3>Oscar Acevedo</h3>
        <h5 class="light">Investigator</h5>
      </div>
      <div class="tcard col s12 m3 l2 center">
        <img src="/img/face.jpg" alt="" />
        <h3>Jairo Serrano</h3>
        <h5 class="light">Investigator</h5>
      </div>
    </div>



  </section>
  <!-- === TEAM === -->



  <!-- === WIKI | CONTACT === -->
  <section id="help">
      <div class="container divider"></div>
      <div class="center">
          <h4 class="light">Got Questions? <span>We've got answers</span></h4>
          <p class="light">We've designed a special place where u can find all the <a href="" class="blue-light">Faqs</a>
              and the APP documentation. Take a look...</p>
          <div class="buttons">
              <a href="#" class="btn btn-primary waves-effect waves-light">Read our Wiki</a>
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
                      <li><a href="{{ url('terms')}}">Team</a></li>
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
                      <li><a href="{{ url('terms')}}">Terms</a></li>
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

<!-- === TEAM GRAPH === -->
<script src="js/team.js" type="text/javascript"></script> 					          <!-- Materialize core JS -->
<script src="js/materialize.min.js" type="text/javascript"></script> 					<!-- Materialize core JS -->
<script src="js/init.js" type="text/javascript"></script> 					          <!-- Init core JS -->
</body>
</html>
