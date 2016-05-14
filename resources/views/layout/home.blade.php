@extends('layout.index')

@section('title')
    <title> AquApp | {{ trans("home.site") }} </title>
@stop

@section('js')
    <script type="text/javascript" src="/js/highcharts/highcharts.js"></script>            <!-- HighCharts core JS -->
    <script type="text/javascript" src="/js/graphs/graph_home.js"></script>                 <!-- Graphs core JS -->
@stop

@section('content')
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

            <br><br>

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
                    <a href="https://github.com/IngenieriaDeSistemasUTB/AquaBackend/wiki" class="btn btn-primary waves-effect waves-light">{{ trans("general.read our wiki") }}</a>
                    <a href="https://github.com/IngenieriaDeSistemasUTB/AquaBackend/wiki/_new" class="btn btn-secundary waves-effect waves-light">{{ trans("general.contact support") }}</a>
                </div>
            </div>
        </section>
        <!-- === WIKI | CONTACT === -->
    </main>
@stop

