@extends('layout.index')

@section('title')
    <title> AquApp | {{ trans("data.data") }} </title>
@stop

@section('css')
    <link href="/css/table.css" rel="stylesheet">
    <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
@stop

@section('js')
    <!-- Export table as excel file -->
    <script type="text/javascript" src="/js/jquery.battatech.excelexport.js"></script>
    <!-- Export table as csv-->
    <script src="/js/table2CSV.js" type="text/javascript"> </script>

    <script>
        function ifChecked(checkbox, node_id) {
            if (checkbox.checked)
                document.getElementsByClassName('.').disabled = false;
            else
                document.getElementById('register_button').disabled = true;
        }

        $(document).ready(function() {
            $('ul.tabs').tabs();

            $('#csv').click(function(e){
                var csv = $("#data_table").table2CSV({
                    delivery: 'download'
                });

                window.open('data:text/csv;charset=UTF-8,' + encodeURIComponent(csv));
            });

            $('#excel').click(function(e){
                var uri = $("#data_table").battatech_excelexport({
                    containerid: "data_table"
                    , datatype: 'table'
                    , returnUri: true
                });

                $(this).attr('download', 'ExportToExcel.xls').attr('href', uri).attr('target', '_blank');
            });
        });
    </script>

    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
@stop


@section('content')
    <section class="center light"><br>
        <h4 class="light">{{ trans('data.data compilation') }}</h4>
        <p class="light">{{ trans('data.this table contains') }}</p>

        @if($sensors_size == 0)
            <div class="warning-box" id="warning_box">
                <p><i class="material-icons">feedback</i><span>{{ trans("data.no data found") }}</span></p>
            </div>
        @else
            <div id="div_table" class="section">
                <table id="data_table" class="responsive-table centered striped container">
                    <thead>
                        <tr>
                            <th>{{ trans('data.sensor id') }}</th>
                            <th>{{ trans('data.sensor type') }}</th>
                            <th>{{ trans('data.timestamp') }}</th>
                            <th>{{ trans('data.value') }}</th>
                            <th>{{ trans('data.unit') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @for($i = 0; $i < $sensors_size; $i++)
                            @if(is_array ($data_array))
                                <tr>
                                    <td>{{$data_array[$i] -> sensorbynode_id}}</td> 
                                    <td>{{$sensors_type_array[$i]}}</td>
                                    <td>{{$data_array[$i] -> time}}</td> 
                                    <td>{{$data_array[$i] -> value}}</td> 
                                    <td>{{$sensors_unit_array[$i]}}</td>
                                </tr>
                            @endif
                        @endfor
                    </tbody>
                </table>
            </div>

            <div class="row container">
                <p class="right">Total: {{$sensors_size}}</p>
            </div>

            {!! Form::open(['url' => 'downloads']) !!}
            @if(Auth::check())
                <div class="row container">
                    <a class="dropdown-button btn waves-effect waves-light right blue darken-1" href="#!" data-activates="files">
                        <i class="mdi-editor-vertical-align-bottom left"></i> Download
                    </a>

                    <!--inputs-->
                    <input type="text" name="sensors" value="{{$sensors}}" style="display: none;">
                    <input type="text" name="user_id" value="{{Auth::user()->id}}" style="display: none;">

                    <ul id="files" class="dropdown-content active">
                        <li><button type="submit" id="csv">csv</button></li>
                        <li><a id="excel" href="#" download="">excel</a></li>
                    </ul>
                </div>
            @endif
            {!! Form::close() !!}
        @endif

    </section>
@stop