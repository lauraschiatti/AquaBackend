@extends('layout.index')

@section('title')
    <title> AquApp | {{ trans("data.data") }} </title>
@stop

@section('css')
    <link href="/css/table.css" rel="stylesheet">
    <!--Timepicker-->
    <link href="https://code.jquery.com/ui/1.12.0-rc.2/themes/smoothness/jquery-ui.css" rel="stylesheet">
    <link href="/css/jquery.timepicker.css" rel="stylesheet">
@stop

@section('js')
    <script type="text/javascript" src="/js/jq/jquery.min.js"></script>					<!-- Jquery core JS -->
    <!--Timepicker-->
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script type="text/javascript" src="/js/jq/jquery.timepicker.min.js"></script>

    <script>
        $(document).ready(function() {
            $('select').material_select();
            $(".datepicker").datepicker({ dateFormat: 'yymmdd' });
            $('.timepicker').timepicker({
                'timeFormat': 'H:i:s',
                'step': 1 //cada un minuto
            });
        });
    </script>
@stop

@section('content')
    <section class="center light"><br>
        <h3 class="light">{{ trans("data.choose data") }}</h3>
        <h5 class="light">{{ trans("data.filter data") }}<strong>{{ trans("data.sensors and dates") }}</strong>{{ trans("data.of your interest") }}</h5>

        <div id="form">
            {!! Form::open(['url' => 'data/table', 'method' => 'GET']) !!}
                @if ($size == 0)
                    <div class="warning-box" id="sensors_warning_box">
                        <p><i class="material-icons">feedback</i><span>{{ trans("data.no nodes in the system") }}</span></p>
                    </div>
                @else
                    <div class="container">
                        <?php $i = 0; ?>
                        @foreach ($nodes->chunk(3) as $node)
                            <div class="row">
                                <?php $j = 0; ?>
                                @foreach ($node as $node_data)
                                    <dl class="col s12 m4 l4">
                                        <dt>
                                            <p>{{ ucwords($node_data->name) }}</p>
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
                                                <p><i class="material-icons left">info_outline</i><span>{{trans('sensors.no sensors in this node')}}</span></p>
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
                <div id="date" class="container">
                    <div class="row">
                        <h5 class="light">{{ trans("data.date range") }}</h5>
                        <div class="col s12 m2 l2">
                            <p class="center">{{ trans("data.from") }}</p>
                        </div>
                        <div class="col s6 m2 l2">
                            <input type="text" name="initial_date" class="datepicker" required>
                            <i class="material-icons prefix">event</i>
                        </div>
                        <div class="col s6 m2 l2">
                            <input type="text" name="initial_time" class="time ui-timepicker-input timepicker" required>
                            <i class="material-icons prefix">alarm</i>
                        </div>
                        <div class="col s12 m2 l2">
                            <p class="center">{{ trans("data.to") }}</p>
                        </div>
                        <div class="col s6 m2 l2">
                            <input type="text" name="final_date" class="datepicker" required>
                            <i class="material-icons prefix">event</i>
                        </div>
                        <div class="col s6 m2 l2">
                            <input type="text" name="final_time" class="time ui-timepicker-input timepicker" required>
                            <i class="material-icons prefix">alarm</i>
                        </div>
                    </div>
                    <br>
                    <p class="center"><button class="btn btn-secundary waves-effect waves-light" type="submit">{{ trans("data.show table") }}</button></p>
                    <br><br>
                </div>
            {!! Form::close() !!}
        </div>
    </section>
@stop

