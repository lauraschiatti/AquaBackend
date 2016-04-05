<!-- Index Page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="AquApp">
    <meta name="author" content="">
    <title> AquApp | {{ trans("home.site") }} </title>

    <link href="/css/materialize.min.css" rel="stylesheet">               			<!-- Materialize core CSS -->
    <link href="/css/site.css" rel="stylesheet">                         				<!-- Site core CSS -->
    <link href="/css/materialicons.css" rel="stylesheet">	                      <!-- Material Icons -->

    <script type="text/javascript" src="/js/jq/jquery.min.js"></script>					<!-- Jquery core JS -->
    <script type="text/javascript" src="/js/highcharts/highcharts.js"></script>            <!-- HighCharts core JS -->
    <script type="text/javascript" src="/js/graphs/graph_home.js"></script>                 <!-- Graphs core JS -->
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
                <a href="#"href="{{ url('/')}}" data-activates="mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>

                <ul class="right hide-on-med-and-down">
                    <li><a href="{{ url('/')}}">{{ trans("general.home") }}</a></li>
                    <li><a href="{{ url('contribute')}}">{{ trans("general.contribute") }}</a></li>
                    <li><a href="{{ url('team')}}">{{ trans("general.team") }}</a></li>
                    <li><a href="https://github.com/IngenieriaDeSistemasUTB/AquaBackend.git">Wiki</a></li>
                    <li><a href="https://github.com/IngenieriaDeSistemasUTB/AquaBackend/issues/new">{{ trans("general.contact") }}</a></li>
                    <!-- Dropdown Structure -->
                    <li><a class="dropdown-button" href="#" data-beloworigin="true" data-activates="dropdown2"><i class="material-icons right">arrow_drop_down</i>{{ Config::get('languages')[App::getLocale()] }}</a></li>
                    <ul id="dropdown2" class="dropdown-content">
                        @foreach (Config::get('languages') as $lang => $language)
                            <li><a href="{{ route('lang.switch', $lang) }}">{{$language}}</a></li>
                        @endforeach
                    </ul>

                    <!-- Sign up-in Buttons -->
                    @if(Auth::check())
                        <li><a class="dropdown-button" href="#" data-beloworigin="true" data-activates="dropdown1"><i class="material-icons right">arrow_drop_down</i>{{ trans("general.hi") }} <span style="text-transform: capitalize; font-weight: lighter;">{{(Auth::user()->name)}}</span></a></li>
                        <!-- Dropdown Structure -->
                        <ul id="dropdown1" class="dropdown-content">
                            @if(Auth::user()->role == 'superadmin' or Auth::user()->role == 'provider')
                                <li><a href="{{url('settings/'.Auth::user()->id)}}">{{ trans("general.settings") }}</a></li>
                                <li><a href="{{ url('dashboard')}}">{{ trans("general.dashboard") }}</a></li>
                            @else
                                <li><a href="{{url('profile/settings/'.Auth::user()->id)}}">{{ trans("general.settings") }}</a></li>
                            @endif
                            <li><a href="{{ url('logout')}}">{{ trans("general.log out") }}</a></li>
                        </ul>
                    @else
                        <li><a href="{{ url('register')}}" class="btn-flat waves-effect waves-light btn">{{ trans("general.sign up") }}</a></li>
                        <li><a href="{{ url('login')}}" class="btn btn-log waves-effect waves-dark">{{ trans("general.login") }}</a></li>
                    @endif

                </ul>

                <ul class="side-nav center" id="mobile">
                    <section class="menu-header">
                        <img src="/img/brand-no-back.png" alt="...">
                    </section>
                    <li><a href="{{ url('/')}}">{{ trans("general.home") }}</a></li>
                    <li><a href="{{ url('contribute')}}">{{ trans("general.contribute") }}</a></li>
                    <li><a href="#">{{ trans("general.team") }}</a></li>
                    <li><a href="https://github.com/IngenieriaDeSistemasUTB/AquaBackend.git">Wiki</a></li>
                    <li><a href="{{ url('contribute')}}">{{ trans("general.contribute") }}</a></li>
                    <div class="divider"></div>

                    @if(Auth::check())
                        @if(Auth::user()->role == 'superadmin' or Auth::user()->role == 'provider')
                            <li><a href="{{url('settings/'.Auth::user()->id)}}">{{ trans("general.settings") }}</a></li>
                            <li><a href="{{ url('dashboard')}}">{{ trans("general.dashboard") }}</a></li>
                        @else
                            <li><a href="{{url('profile/settings/'.Auth::user()->id)}}">{{ trans("general.settings") }}</a></li>
                        @endif
                        <li><a href="{{ url('logout')}}">{{ trans("general.log out") }}</a></li>
                    @else
                        <li><a href="{{ url('register')}}">{{ trans("general.sign up") }}</a></li>
                        <li><a href="{{ url('login')}}">{{ trans("general.login") }}</a></li>
                    @endif

                    <div class="divider"></div>
                    <!--<li class="no-padding">
                      <ul class="collapsible collapsible-accordion">
                            <li>
                                <a class="collapsible-header"><i class="mdi-navigation-arrow-drop-down"></i>{{ Config::get('languages')[App::getLocale()] }}</a>
                                <div class="collapsible-body">
                                    <ul>
                                        @foreach (Config::get('languages') as $lang => $language)
                                            <li><a href="{{ route('lang.switch', $lang) }}">{{$language}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>-->

                    @foreach (Config::get('languages') as $lang => $language)
                        <li><a href="{{ route('lang.switch', $lang) }}">{{$language}}</a></li>
                    @endforeach

                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- === NAVBAR === -->

<main>
    <!-- === HOME === -->
    <section class="primary section" id="home">
        <div class="white-text" id="title">
            <h2 class="light">{{ trans("home.cross-browsers platform") }}</h2>
            <h5 class="light"><strong>{{ trans("home.real time statistics") }}</strong> {{ trans("home.of cities bays") }}</h5>
        </div>

        <div id="graph01" class="col s12">
            <div id="graph"></div>
        </div>

        <div class="row">
            <div class="white-text col s12 offset-m1 m10 offset-l1 l10">
                <p class="light">
                    <i class="material-icons left">info</i>{{ trans("home.the graph shown above reflects") }}
                </p>
                <a href="{{ url('data')}}" class="btn btn-down waves-effect waves-dark light"><i class="material-icons left">playlist_add</i>{{ trans("home.click to get data") }}</a>
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
            <h6 class="light">{{ trans("home.developed with the best web design technologies") }}</h6>
        </div>

    </div>
    <!-- === DIVISOR === -->

    <!-- === ABOUT === -->
    <section class="center" id="about">
        <h3>{{ trans("home.not just") }}</h3>
        <h5 class="light">{{ trans("home.beautiful and simple") }}</h5>

        <div class="row">
            <!--   Features Section   -->
            <div class="container">
                <div class="row">
                    <div class="col s12 m4">
                        <div>
                            <h3><i class="medium material-icons">today</i></h3>
                            <h4 class="center">{{ trans("home.real time") }}</h4>
                            <p class="light">{{ trans("home.charts and statistics with") }} <span class="blue-text solid">{{ trans("home.current information") }}</span> {{ trans("home.of cities bays conditions") }}.</p>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div>
                            <h3><i class="medium material-icons">assignment_returned</i></h3>
                            <h4 class="center">{{ trans("home.download") }}</h4>
                            <p class="light">{{ trans("home.sign up for free") }}<span class="blue-text solid">{{ trans("home.get charts") }}</span>{{ trans("home. in different file formats") }} </p>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div>
                            <h3><i class="medium material-icons">dns</i></h3>
                            <h4 class="center">{{ trans("home.filtering") }}</h4>
                            <p class="light"><span class="blue-text solid">{{ trans("home.sort charts information") }}</span> {{ trans("home.more conviniently for you") }}</p>

                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col s12 m4">
                        <div>
                            <h3><i class="medium material-icons">brush</i></h3>
                            <h4 class="center">{{ trans("home.cool") }}</h4>
                            <p class="light">{{ trans("home.to develop a deeper") }} <span class="blue-text solid">{{ trans("home.front-end design") }}</span>{{ trans("home.must invite them to take") }}</p>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div>
                            <h3><i class="medium material-icons">layers</i></h3>
                            <h4 class="center">{{ trans("home.modern") }}</h4>
                            <p class="light">{{ trans("home.when we start") }}<span class="blue-text solid">{{ trans("home.cloud computing") }}</span></p>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div>
                            <h3><i class="medium material-icons">devices</i></h3>
                            <h4 class="center">{{ trans("home.cross-browser") }}</h4>
                            <p class="light">{{ trans("home.we build this") }}<span class="blue-text solid">{{ trans("home.all modern browsers") }}</span>{{ trans("home.you're allow to use it") }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- === ABOUT === -->

    <!-- === MEET === -->
    <section class="center" id="meet">
        <h3>{{ trans("home.meet aquapp") }}</h3>
        <div class="container">
            <!--=== PROJECT ===-->
            <p class="light">{{ trans("home.aquapp is a platform") }}</p>
            <!--=== PROJECT ===-->
        </div>
    </section>
    <!-- === MEET === -->

    <!-- === HOW IT WORKS === -->
    <section class="center">
        <h3>{{ trans("home.how it works") }}</h3>
        <h5 class="light">{{ trans("home.clean, easy and intuitive") }}</h5>

        <!--   Features Section   -->
        <div class="container">
            <div class="row">
                <div class="col s12 m4">
                    <div>
                        <h3><i class="medium material-icons">graphic_eq</i></h3>
                        <h4 class="center">{{ trans("home.take data") }}</h4>
                        <p class="light">{{ trans("home.sensors in nodes on") }}<span class="blue-text solid">{{ trans("home.take specific information") }}</span>{{ trans("home.in different measure units") }}</p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div>
                        <h3><i class="medium material-icons">filter_none</i></h3>
                        <h4 class="center">{{ trans("home.unpackage") }}</h4>
                        <p class="light">{{ trans("home.our api engine") }}<span class="blue-text solid">{{ trans("home.unpack") }}</span>{{ trans("home.them. then we sort") }}</p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div>
                        <h3><i class="medium material-icons">grain</i></h3>
                        <h4 class="center">{{ trans("home.generate") }}</h4>
                        <p class="light">{{ trans("home.we use api information stored for") }} <span class="blue-text solid">{{ trans("home.create charts") }}</span>. {{ trans("home.we've made easy reading that information") }}</p>

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
            <h4 class="light">{{ trans("contribute.got questions?") }} <span>{{ trans("contribute.got answers") }}</span></h4>
            <p class="light">{{ trans("contribute.a special place") }}<a href="" class="blue-light">{{ trans("contribute.faqs") }}</a>
                {{ trans("contribute.app documentation") }}</p>
            <div class="buttons">
                <a href="https://github.com/IngenieriaDeSistemasUTB/AquaBackend'" class="btn btn-primary waves-effect waves-light">{{ trans("general.read our wiki") }}</a>
                <a href="https://github.com/IngenieriaDeSistemasUTB/AquaBackend/issues/new" class="btn btn-secundary waves-effect waves-light">{{ trans("general.contact support") }}</a>
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

<script src="/js/materialize.min.js" type="text/javascript"></script> 					<!-- Materialize core JS -->
<script src="/js/init.js" type="text/javascript"></script> 					          <!-- Init core JS -->

</body>
</html>
