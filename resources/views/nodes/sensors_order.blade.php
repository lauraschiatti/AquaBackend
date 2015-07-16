@extends('layout.admin')

@section('meta')
    <meta name="csrf-token" content="{{csrf_token()}}">
@stop
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/nodes_jquery.css"/>
@stop

@section('title')
    <!--<a href="#" class="mobile-tittle">New Node</a>-->
    <!--<a href="{{-- url('nodes')--}}" class="mobile-right"><i class="material-icons">close</i></a>-->
@stop

@section('content')
    <div class="desktop row" id="nodes">
        <!-- Tittle -->
        <div class="linker"><p class="light">Dashboard > Nodes > Create </p></div>
        <h4 class="light">Choose data sending schema</h4>
        <div class="divider"></div><br>


        <!-- Form -->
        {!! Form::open(['id' => 'sensors']) !!}
            <div id="center-wrapper">
            <div class="dhe-example-section" id="ex-2-1">
                <div class="dhe-example-section-content">

                    <div id="example-2-1">
                        <div class="column left first">
                            <ul class="sortable-list">
                                @if (session('data'))
                                    @foreach(session('data') as $value)
                                        <li class="sortable-item" id="{{$value}}">{{$value}}</li>
                                    @endforeach
                                @else
                                    <p id="data_schema">NO SENSORS SELECTED</p>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="clearer">&nbsp;</div>
                </div>
            </div>
        </div>


        <!-- FLOATING BUTTONS -->
        <div class="fixed-action-btn" id="add">
           <button type="submit" class="btn-floating btn-large waves-effect waves-circle waves-light" id="btn-get"> <!-- Green -->
                <i class="large material-icons">check</i>
           </button>
        </div>
        <!-- FLOATING BUTTONS -->

        {!! Form::close() !!}

        <!-- FLOATING BUTTONS -->
        <!--<div class="fixed-action-btn" id="cancel">
            <a href="{{-- url('nodes/create')--}}" class="btn-floating btn-large waves-effect waves-circle waves-light">
                <i class="large material-icons">navigate_before</i>
            </a>
        </div>-->
        <div class="fixed-action-btn" id="cancel">
            <a href="{{ url('nodes')}}" class="btn-floating btn-large waves-effect waves-circle waves-light">
                <i class="large material-icons">close</i>
            </a>
        </div>
        <!-- FLOATING BUTTONS -->
    </div>
@stop

@section('javascript')
    <!-- Example JavaScript files -->
    <script type="text/javascript" src="/js/jq/jquery.min.js"></script>
    <script type="text/javascript" src="/js/jq/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/js/jq/jquery.cookie.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            // Get items
            function getItems(exampleNr)
            {
                var columns = [];

                $(exampleNr + ' ul.sortable-list').each(function(){
                    columns.push($(this).sortable('toArray').join(','));
                });

                return columns.join('|');
            }

            // Example 2.1: Get items
            $('#example-2-1 .sortable-list').sortable({
                connectWith: '#example-2-1 .sortable-list'
            });

            $('#sensors').submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: 'sensorsorder',
                    type: 'POST',
                    data: { order: getItems('#example-2-1') },
                    dataType: 'json',
                    success: function(info){
                        console.log(info);
                    }
                });
            });
        });
    </script>
@stop