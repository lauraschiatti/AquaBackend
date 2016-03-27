@extends('layout.admin')

@section('meta')
    <meta name="csrf-token" content="{{csrf_token()}}">
@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/nodes_jquery.css"/>
@stop

@section('title')
    <a href="#" class="mobile-tittle">{{ trans("nodes.new node") }}</a>
    <a href="{{url('nodes')}}" class="mobile-right"><i class="material-icons">close</i></a>
@stop

@section('content')
    <div class="desktop row" id="nodes">
        <!-- Tittle -->
        <div class="linker"><p class="light">{{ trans("general.dashboard") }} > {{ trans("general.nodes") }} > {{ trans("general.create") }} </p></div>
        <h4 class="light">{{ trans("nodes.choose data sending schema") }}</h4>
        <div class="divider"></div><br>

        @if (session('id'))
            <input type="hidden" id="id" value="{{session('id')}}">
        @endif

        <!-- Form -->
        {!! Form::open(array('url'=>'sensorsorder','method'=>'POST', 'id'=>'sensors')) !!}
            @if (session('data'))
                <div id="center-wrapper">
                    <div class="dhe-example-section" id="ex-2-1">
                        <div class="dhe-example-section-content">

                            <div id="example-2-1">
                                <div class="column left first">
                                    <ul class="sortable-list">
                                        @if (session('data'))
                                            @foreach(session('data') as $value)
                                                <li style=" text-transform: uppercase;" class="sortable-item" id="{{$value}}">{{$value}}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="clearer">&nbsp;</div>
                        </div>
                    </div>
                </div>
            @endif

            @if (!session('data'))
                <div id="center-wrapper" style="display:none;">
                    <div class="dhe-example-section" id="ex-2-1">
                        <div class="dhe-example-section-content">

                            <div id="example-2-1">
                                <div class="column left first">
                                    <ul class="sortable-list">
                                        @if (session('data'))
                                            @foreach(session('data') as $value)
                                                <li class="sortable-item" id="{{$value}}">{{$value}}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="clearer">&nbsp;</div>
                        </div>
                    </div>
                </div>
            @endif

            @if (!session('data'))
                <div class="warning-box">
                    <p style="text-align: center;"><i class="material-icons">highlight_off</i><span class="ups">Wops! </span>{{ trans("nodes.no sensors selected") }} </p>
                </div>
            @endif

            <!-- FLOATING BUTTONS -->
            <div class="fixed-action-btn" id="add">
               <button type="submit" class="btn-floating btn-large waves-effect waves-circle waves-light" id="btn-get"> <!-- Green -->
                    <i class="large material-icons">check</i>
               </button>
            </div>
            <!-- FLOATING BUTTONS -->

        {!! Form::close() !!}

    </div>
@stop

@section('javascript')
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
                        //alert(data);
                        console.log(data);
                    }
                });
            });

        });
    </script>
@stop