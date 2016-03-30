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
                    <li><a href="{{ url('/')}}" class="grow">{{ trans("contribute.back home") }}</a></li>
                </ul>

                <ul class="side-nav center" id="mobile">
                    <section class="menu-header">
                        <img src="/img/brand-no-back.png" alt="...">
                    </section>
                    <li><a href="{{ url('/')}}">{{ trans("general.home") }}</a></li>
                    <li><a href="{{ url('contribute')}}">{{ trans("general.contribute") }}</a></li>
                    <li><a href="{{ url('team')}}">{{ trans("general.team") }}</a></li>
                    <li><a href="#">{{ trans("general.wiki") }}</a></li>
                    <li><a href="https://github.com/IngenieriaDeSistemasUTB/AquaBackend/issues/new">{{ trans("general.contact") }}</a></li>
                    <div class="divider"></div>
                    <li><a href="{{ url('register')}}">{{ trans("general.sign up") }}</a></li>
                    <li><a href="{{ url('login')}}">{{ trans("general.login") }}</a></li>

                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- === NAVBAR === -->
<body>

<main>
  <!-- === TEAM === -->
  <section class="center"><br>
      <h2 class="light">{{ trans("team.meet the team") }}</h2>

      <div class="row cards">
          <div class="tcard col s12 m3 l2 center">
            <img src="/img/face.jpg" alt="" />
            <h3>Laura Schiatti</h3>
            <h5 class="light">{{ trans("team.back-end developer") }}</h5>
          </div>
          <div class="tcard col s12 m3 l2 center">
            <img src="/img/face.jpg" alt="" />
            <h3>Yefferson Marín</h3>
            <h5 class="light">{{ trans("team.front-end developer") }}</h5>
          </div>
          <div class="tcard col s12 m3 l2 center">
            <img src="/img/face.jpg" alt="" />
            <h3>Juan Martínez</h3>
            <h5 class="light">{{ trans("team.investigator") }}</h5>
          </div>
          <div class="tcard col s12 m3 l2 center">
            <img src="/img/face.jpg" alt="" />
            <h3>Oscar Acevedo</h3>
            <h5 class="light">{{ trans("team.investigator") }}</h5>
          </div>
          <div class="tcard col s12 m3 l2 center">
            <img src="/img/face.jpg" alt="" />
            <h3>Jairo Serrano</h3>
            <h5 class="light">{{ trans("team.investigator") }}</h5>
          </div>
      </div>

      <ul class="container collection">
          @for ($i = 0; $i < $num_providers; $i++)
              <li class="collection-item avatar">
                  <img src="images/yuna.jpg" alt="" class="circle">
                  <span class="title">{{$providers[$i]->id}}</span>
                  <p>First Line <br>
                      Second Line
                  </p>
                  <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
              </li>
          @endfor
      </ul>
  </section>
  <!-- === TEAM === -->
  <!-- === HOME === -->
    <!--<section class="primary section scrollspy" id="team">
        <div class="white-text">
            <h2 class="light">Meet us in numbers</h2>
            <h5 class="light"><strong>Human Connection</strong> is better</h5>
            <div id="team-graph"></div>
            <h5 class="light">Keep Scrolling</h5>
        </div>
    </section>-->
  <!-- === HOME === -->

  <!-- === WIKI | CONTACT === -->
    <section id="help">
        <div class="container divider"></div>
        <div class="center">
            <h4 class="light">{{ trans("contribute.got questions?") }} <span>{{ trans("contribute.got answers") }}</span></h4>
            <p class="light">{{ trans("contribute.a special place") }}<a href="" class="blue-light">{{ trans("contribute.faqs") }}</a>
                {{ trans("contribute.app documentation") }}</p>
            <div class="buttons">
                <a href="https://github.com/IngenieriaDeSistemasUTB/AquaBackend'" class="btn btn-primary waves-effect waves-light">{{ trans("general.read our wiki") }}</a>
                <a href="https://github.com/IngenieriaDeSistemasUTB/AquaBackend/issues/new"class="btn btn-secundary waves-effect waves-light">{{ trans("general.contact support") }}</a>
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
                <h5>{{ trans("general.address") }}</h5>
                <ul>
                    <li><strong>{{ trans("general.technological campus") }}</strong></li>
                    <li>{{ trans("general.park") }}</li>
                    <li>{{ trans("general.turbaco") }} - Tel: (57) 5 6535200  </li>
                    <li>{{ trans("general.morning") }} 8:00 a.m. - 12:00 p.m.</li>
                    <li>{{ trans("general.afternoon") }}1:00 p.m - 5:00 p.m. </li>
                </ul>
            </div>
            <!-- Address -->
            <!-- Links -->
            <div class="col s12 m9 l5" id="links">

                <div class="col s4">

                    <h5>{{ trans("general.support") }}</h5>
                    <ul>
                        <li><a href="https://github.com/IngenieriaDeSistemasUTB/AquaBackend/wiki">Wiki</a></li>
                        <li><a href="https://github.com/IngenieriaDeSistemasUTB/AquaBackend/issues/new">{{ trans("general.contact") }}</a></li>
                        <li><a href="{{ url('team')}}">{{ trans("general.team") }}</a></li>
                    </ul>
                </div>

                <div class="col s4">

                    <h5>{{ trans("general.contribute") }}</h5>
                    <ul>
                        <li><a href="https://github.com/IngenieriaDeSistemasUTB/AquaBackend.git">Github</a></li>
                        <li><a href="#!">Twitter</a></li>
                        <li><a href="#!">Google</a></li>
                    </ul>
                </div>

                <div class="col s4">

                    <h5>{{ trans("general.product") }}</h5>
                    <ul>
                        <li><a href="{{ url('terms')}}">{{ trans("general.about") }}</a></li>
                        <li><a href="https://github.com/IngenieriaDeSistemasUTB/AquaBackend.git">{{ trans("general.project") }}</a></li>
                        <li><a href="{{ url('terms')}}">{{ trans("general.legal") }}</a></li>
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
                    <li><strong>{{ trans("general.technological campus") }}</strong></li>
                    <li>{{ trans("general.park") }}</li>
                    <li>{{ trans("general.turbaco") }} - Tel: (57) 5 6535200  </li>
                    <li>{{ trans("general.morning") }} 8:00 a.m. - 12:00 p.m.</li>
                    <li>{{ trans("general.afternoon") }}1:00 p.m - 5:00 p.m. </li>
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
            &#60;&#47;&#62; {{ trans("general.with") }} <span class="red-text">&#10084;</span> {{ trans("general.in") }} Cartagena de Indias, D.T. {{ trans("general.and") }} C - Colombia
            <a class="right hide-on-small-only" href="#home">{{ trans("general.back to top") }}</a>
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
