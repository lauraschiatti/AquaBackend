<!-- Index Page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="AquApp">
    <meta name="author" content="">

    @yield('title')

    <link href="/css/materialize.min.css" rel="stylesheet">               			<!-- Materialize core CSS -->
    <link href="/css/site.css" rel="stylesheet">                         				<!-- Site core CSS -->
    <link href="/css/materialicons.css" rel="stylesheet">                           <!-- Material Icons -->

    @yield('css')

    <script type="text/javascript" src="/js/jq/jquery.min.js"></script>					<!-- Jquery core JS -->

    @yield('js')

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
</head>
<body>

<!-- === NAVBAR === -->
<header class="primary">
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="{{ url('/')}}" class="brand hide-on-med-and-down"><img src="/img/brand.png" alt="..."/></a>
                <a data-activates="mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>

                <ul class="right hide-on-med-and-down">
                    <li><a href="{{ url('/')}}">{{ trans("general.home") }}</a></li>
                    <li><a href="{{ url('contribute')}}">{{ trans("general.contribute") }}</a></li>
                    <li><a href="{{ url('team')}}">{{ trans("general.team") }}</a></li>
                    <li><a href="https://github.com/IngenieriaDeSistemasUTB/AquaBackend/wiki" target="_blank">Wiki</a></li>
                    <li><a href="https://github.com/IngenieriaDeSistemasUTB/AquaBackend/wiki/_new" target="_blank">{{ trans("general.contact") }}</a></li>
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
                    <li><a href="{{ url('team')}}">{{ trans("general.team") }}</a></li>
                    <li><a href="https://github.com/IngenieriaDeSistemasUTB/AquaBackend/wiki" target="_blank">Wiki</a></li>
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

                    @foreach (Config::get('languages') as $lang => $language)
                        <li><a href="{{ route('lang.switch', $lang) }}">{{$language}}</a></li>
                    @endforeach

                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- === NAVBAR === -->

@yield('content')

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
                        <li><a href="https://github.com/IngenieriaDeSistemasUTB/AquaBackend/wiki" target="_blank">Wiki</a></li>
                        <li><a href="https://github.com/IngenieriaDeSistemasUTB/AquaBackend/wiki/_new" target="_blank">{{ trans("general.contact") }}</a></li>
                        <li><a href="{{ url('team')}}">{{ trans("general.team") }}</a></li>
                    </ul>
                </div>

                <div class="col s4">

                    <h5>{{ trans("general.contribute") }}</h5>
                    <ul>
                        <li><a href="https://github.com/IngenieriaDeSistemasUTB/AquaBackend.git" target="_blank">Github</a></li>
                        <li><a href="{{ url('contribute')}}">{{ trans("general.contribute") }}</a></li>
                        <li><a href="#!">Google</a></li>
                    </ul>
                </div>

                <div class="col s4">

                    <h5>{{ trans("general.product") }}</h5>
                    <ul>
                        <li><a href="{{ url('terms')}}">{{ trans("general.about") }}</a></li>
                        <li><a href="https://github.com/IngenieriaDeSistemasUTB/AquaBackend.git" target="_blank">{{ trans("general.project") }}</a></li>
                        <li><a href="{{ url('terms')}}">{{ trans("general.legal") }}</a></li>
                    </ul>
                </div>
            </div>
            <!-- Links -->
            <!-- Small -->
            <div class="col s12 show-on-small hide-on-med-and-up center" id="details">
                <div class="container">
                        <img src="/img/utb-logo-01.png" alt="" class="logo"/>
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
                    <a target="_blank" href="http://www.unitecnologica.edu.co/"><img src="/img/utb-logo-01.png" alt="" class="logo"></a>
                </div>
            </div>
            <!-- Brand -->

        </div>
    </div>

    <!-- Footer -->
    <div class="footer-copyright center">
        <div class="container light">
            &#60;&#47;&#62; {{ trans("general.with") }} <span class="red-text">&#10084;</span> {{ trans("general.in") }} Cartagena de Indias, D.T. {{ trans("general.and") }} C - Colombia
            <!--<a class="right hide-on-small-only" href="#home">{{ trans("general.back to top") }}</a>-->
        </div>
    </div>
</footer>

<!-- === FOOTER === -->

<script src="/js/materialize.min.js" type="text/javascript"></script> 					<!-- Materialize core JS -->
<script src="/js/init.js" type="text/javascript"></script> 					          <!-- Init core JS -->

</body>
</html>