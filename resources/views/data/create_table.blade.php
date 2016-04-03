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

    <!--Datepicker-->
    <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="/js/jq/jquery.timepicker.js" type="text/javascript"></script>

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
        <h3 class="light">Selecciona datos</h3>
        <h5 class="light">Filtra datos según los <strong>sensores y fechas</strong> que te interesan</h5>
    </div>

    <div id="form">
        {!! Form::open(['url' => 'data/table', 'method' => 'GET']) !!}
            @if ($size == 0)
                <div class="warning-box" id="sensors_warning_box">
                    <p><i class="material-icons">feedback</i><span>No hay nodos en el sistema</span></p>
                </div>
            @else
                <div class="container">
                    <?php $i = 0; ?>
                    @foreach ($nodes->chunk(3) as $node)
                        <div class="row">
                            <?php $j = 0; ?>
                            @foreach ($node as $node_data)
                                <dl class="col s12 4 l4">
                                    <dt>
                                        <p>
                                            <input type="checkbox" id="{{ ucwords($node_data->id) }}" onChange="ifChecked(this, '<?php echo ucwords($node_data->id); ?>');">
                                            <label for="{{ ucwords($node_data->id) }}">{{ ucwords($node_data->name) }}</label>
                                        </p>
                                    </dt>
                                    <dd>
                                        @if(is_array ($nodes_array[$i][$j]["sensors"]))
                                            @foreach($nodes_array[$i][$j]["sensors"] as $key => $value) 
                                                <div class="left-align"> 
                                                    <input type="checkbox" class="{{ ucwords($node_data->id) }}" id="{{$value["sensor_id"]}}" name="sensors[]" value="{{$value["sensor_id"]}}" /> 
                                                    <label for="{{$value["sensor_id"]}}">{{ucwords($value["sensor_type"])}} - {{ucwords($value["sensor_unit"])}}</label> 
                                                </div> 
                                            @endforeach
                                        @else
                                            <div class="warning-box" id="sensors_warning_box">
                                                <p><i class="material-icons">feedback</i><span>{{$nodes_array[$i][$j]["sensors"]}}</span></p>
                                            </div>
                                        @endif
                                    </dd>
                                </dl>
                                <?php $j++; ?>
                            @endforeach
                        </div>
                        <?php $i++; ?>
                    @endforeach
                </div>
            @endif

             <!--<input type="text" name="initial_date" class="timepicker center" required>-->

            <div id="date" class="container">
                <h5 class="center">Rango de fechas</h5>
                <div class="row">
                    <div class="col s12 m2 l2">
                        <p class="center">Inicio</p>
                    </div>
                    <div class="col s6 m2 l2">
                        <input type="text" name="initial_date" class="datepicker center" required>
                        <i class="material-icons prefix">event</i>
                    </div>
                    <div class="col s6 m2 l2">
                        <input type="time" name="initial_time" step="1">
                        <i class="material-icons prefix">alarm</i>
                    </div>

                    <div class="col s12 m2 l2">
                        <p class="center">Fin</p>
                    </div>
                    <div class="col s6 m2 l2">
                        <input type="text" name="final_date" class="datepicker center" required>
                        <i class="material-icons prefix">event</i>
                    </div>
                    <div class="col s6 m2 l2">
                        <input type="time" name="final_time" step="1">
                        <i class="material-icons prefix">alarm</i>
                    </div>
                </div>
            </div>

            <div class="col s12">
                <p class="center"><button class="btn waves-effect waves-light" type="submit">VER TABLA</button></p>
            </div>
        {!! Form::close() !!}
    </div>
</section>

<script src="/js/materialize.min.js" type="text/javascript"></script> 					<!-- Materialize core JS -->
<script src="/js/init.js" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        $('select').material_select();
    });
    /*$('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 2, // Creates a dropdown of 2 years to control year
        format: 'yyyymmdd'
    });*/

    $(function() {
        $(".datepicker").datepicker({ dateFormat: 'yymmdd' });
    })

    $('.timepicker').timepicker({});

    function ifChecked(checkbox, id) {
        var str1 = ".";
        var str2 = id;
        var id = str1.concat(str2);

        //alert($(id).length);
        if (checkbox.checked) {
            /*$(id).each(function() {
                if($(this).not(':checked'))
                    $(this).attr('checked', true);
            });*/
            $(id).attr('checked', true);
        }else {
            $(id).attr('checked', false);
            /*$(id).each(function() {
             if($(this).is(':checked'))
             $(this).attr('checked', false);
             });*/
        }
    }
</script>
</body>
</html>
