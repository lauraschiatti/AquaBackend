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
        {!! Form::open(['url' => 'data']) !!}
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
                                            <input type="checkbox" id="{{ ucwords($node_data->id) }}" onChange="ifChecked(this);"/>
                                            <label for="{{ ucwords($node_data->id) }}">{{ ucwords($node_data->name) }}</label>
                                        </p>
                                    </dt>
                                    <dd>
                                        @if(is_array ($nodes_array[$i][$j]["sensors"]))
                                            @foreach($nodes_array[$i][$j]["sensors"] as $key => $value) 
                                                <div class="left-align"> 
                                                    <input type="checkbox" id="{{$value["sensor_id"]}}" name="sensors[]" value="{{$value["sensor_id"]}}" /> 
                                                    <label for="{{$value["sensor_id"]}}">{{ucwords($value["sensor_type"])}}</label> 
                                                    <br>
                                                    <span>{{ucwords($value["sensor_unit"])}}</span>
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

            <div class="col s12">
                <p class="center"><button class="btn waves-effect waves-light" type="submit">VER TABLA</button></p>
            </div>
        {!! Form::close() !!}
    </div>
</section>

<div class="col s12 offset-m1 m7 offset-l1 l7">
    <a class="dropdown-button btn-floating btn-large waves-effect waves-light right blue darken-1" href="#!" data-activates="files">
        <i class="mdi-editor-vertical-align-bottom"></i>
    </a>
    <ul id="files" class="dropdown-content active">
        <li><a href="#!" class="-text">.csv</a>
        </li>
        <li><a href="#!" class="-text">.txt</a>
        </li>
    </ul>
    <!-- === TABLE === -->
    <table id="example" cellspacing="0" width="100%"> 
        <thead> 
        <tr> 
            <th>Node name</th> 
            <th>Sensor type/Sensor unit</th> 
            <th>Time</th> 
            <th>Value</th> 
        </tr> 
        </thead> 
        <tbody> 
        <tr> 
            <td>Node name</td> 
            <td>Sensor type/Sensor unit</td> 
            <td>Time</td> 
            <td>Value</td> 
        </tr>
        </tbody> 
    </table>
    <!-- === TABLE === -->
</div>

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
                        <li><a href="#!">Wiki</a></li>
                        <li><a href="{{ url('contact')}}">{{ trans("general.contact") }}</a></li>
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
<script>
    $(document).ready(function() {
        $('select').material_select();
    });
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });
</script>

</body>
</html>
