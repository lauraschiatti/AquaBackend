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
    </body>
</html>