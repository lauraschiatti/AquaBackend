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
    <link href="/css/table.css" rel="stylesheet">                       				<!-- Site core CSS -->
    <link href="/css/materialicons.css" rel="stylesheet">	                      <!-- Material Icons -->

    <script type="text/javascript" src="/js/jq/jquery.min.js"></script>					<!-- Jquery core JS -->
    <script type="text/javascript" src="/js/highcharts.js"></script>            <!-- HighCharts core JS -->
    <script type="text/javascript" src="/js/graph.js"></script>                 <!-- Graphs core JS -->
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

    <script>
        function ifChecked(checkbox, node_id) {
            if (checkbox.checked)
                document.getElementsByClassName('.').disabled = false;
            else
                document.getElementById('register_button').disabled = true;
        }
    </script>

    <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    <!-- Javascript -->
    <script>
        $(function() {
            $("#datepicker-13").datepicker();
        });
    </script>

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
                    <li><a href="{{ url('contact')}}">{{ trans("general.contact") }}</a></li>
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
                            @if(Auth::check() and Auth::user()->role == 'superadmin' or 'provider')
                                <li><a href="{{url('settings/'.Auth::user()->id)}}">{{ trans("general.settings") }}</a></li>
                            @else
                                <li><a href="{{url('profile/settings/'.Auth::user()->id)}}">{{ trans("general.settings") }}</a></li>
                            @endif
                            @if(Auth::check() and Auth::user()->role == 'superadmin' or 'provider')
                                <li><a href="{{ url('dashboard')}}">{{ trans("general.dashboard") }}</a></li>
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
                    <li><a href="{{ url('contribute')}}">{{ trans("general.contact") }}</a></li>
                    <div class="divider"></div>
                    <li class="no-padding">
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
                    </li>

                    @if(Auth::check())
                        <li><a>{{ trans("general.hi") }} <span style="font-weight: lighter;">{{(Auth::user()->name)}}</span></a></li>
                        <li><a href="{{ url('logout')}}">{{ trans("general.log out") }}</a></li>
                    @else
                        <li><a href="{{ url('register')}}">{{ trans("general.sign up") }}</a></li>
                        <li><a href="{{ url('login')}}">{{ trans("general.login") }}</a></li>
                    @endif

                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- === NAVBAR === -->

<section class="section" id="home">
    <div id="title">
        <h4 class="light">Recopilación de datos</h4>
        <p class="light">Esta tabla los datos obtenidos con el uso de sensores encontrados en cuerpos de la ciudad de Cartagena
            de Indias en ciertas fechas</p>
        <p class="light">Fechas <strong>sensores y fechas</strong> Sensores</p>
    </div>

    @if(Auth::check())
        <div class="row container">
            <a class="dropdown-button btn-floating btn-large waves-effect waves-light right blue darken-1" href="#!" data-activates="files">
                <i class="mdi-editor-vertical-align-bottom"></i>
            </a>
            <ul id="files" class="dropdown-content active">
                <li><a href="#!" class="-text" onclick="exportcsv()">csv</a>
                </li>
                <li><a href="#!" class="-text" onclick="exporttxt()">txt</a>
                </li>
            </ul>
        </div>
    @endif


    <!-- === TABLE === -->
    <table id="data_table" class="responsive-table centered striped container">
        <thead>
        <tr>
            <th>Num</th>
            <th>Node id</th>
            <th>Sensor id</th>
            <th>Sensor type</th>
            <th>Time</th>
            <th>Value</th>
        </tr>
        </thead>

        <tbody>
            @if($sensors_size == 0)
                <div class="warning-box" id="sensors_warning_box">
                    <p><i class="material-icons">feedback</i><span>No hay datos encontrados</span></p>
                </div>
            @else
                @for($i = 0; $i < $sensors_size; $i++)
                    @if(is_array ($data_array))
                        <tr>
                            <td>{{$i+1}}</td> 
                            <td>{{$data_array[$i] -> node_id}}</td> 
                            <td>{{$data_array[$i] -> sensorbynode_id}}</td> 
                            <td>{{$sensors_type_array[$i]}}</td>
                            <td>{{$data_array[$i] -> time}}</td> 
                            <td>{{$data_array[$i] -> value}} {{$sensors_unit_array[$i]}}</td> 
                        </tr>
                    @endif
                {{--@forelse--}}
                    <!--<div class="warning-box" id="sensors_warning_box">
                        <p><i class="material-icons">feedback</i><span>No hay datos encontrados</span></p>
                    </div>-->
                @endfor
            @endif
        </tbody>
    </table>
    <!-- === TABLE === -->
</section>

<script src="/js/materialize.min.js" type="text/javascript"></script> 					<!-- Materialize core JS -->
<script src="/js/init.js" type="text/javascript"></script>
<script src="/js/table2CSV.js" type="text/javascript"> </script>  <!-- Export table as csv-->

<script>
    $(document).ready(function() {
        $('ul.tabs').tabs();
    });

    function exportcsv(){
        var csv = $("#data_table").table2CSV({
            delivery: 'download'
        });
        window.open('data:text/csv;charset=UTF-8,' + encodeURIComponent(csv));
    }

    function exporttxt(){
        $('#data_table').tableExport({type:'txt',escape:'false'});
    }
</script>

</body>
</html>
