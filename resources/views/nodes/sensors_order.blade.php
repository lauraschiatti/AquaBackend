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
        <h4 class="light">Node info</h4>
        <div class="divider"></div><br>

        @if (session('id'))
            <div class="input-field col s12">
                <i class="material-icons prefix">play_for_work</i>
                <input type="text" id="id" value="{{session('id')}}" readonly>
                <label for="id">Id</label>
            </div>
        @endif
        @if (session('name'))
            <div class="input-field col s12">
                <i class="material-icons prefix">play_for_work</i>
                <input id="name" type="text" value="{{session('name')}}" readonly>
                <label for="name">Name</label>
            </div>
        @endif
        @if (session('longitude'))
            <div class="input-field col s12">
                <i class="material-icons prefix">swap_vert</i>
                <input id="longitude" type="text" id="id" value="{{session('longitude')}}" readonly>
                <label for="longitude">Longitude</label>
            </div>
        @endif
        @if (session('latitude'))
            <div class="input-field col s12">
                <i class="material-icons prefix">swap_horiz</i>
                <input id="latitude" type="text" id="id" value="{{session('latitude')}}" readonly>
                <label for="latitude">Latitude</label>
            </div>
        @endif

        <br>
        <h4 class="light">Choose data sending schema</h4>
        <div class="divider"></div><br>

        <!-- Form -->
        {!! Form::open(array('url'=>'sensorsorder','method'=>'POST', 'id'=>'sensors')) !!}
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

            $('#btn-get').click(function(){
               // token =  token = $('meta[name="csrf-token"]').attr('content');
                var sensors_order = getItems('#example-2-1');
                var node_id =  $('input[id=id]').val();
                $.ajax({
                    url: 'sensorsorder',
                    type: "post",
                    data: {'order': sensors_order, 'node_id' : node_id},//, '_token' : token},
                    success: function(data){
                        alert(data);
                    }
                });
            });

        });
    </script>
@stop