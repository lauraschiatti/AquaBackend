@extends('layout.admin')

@section('title')
    <a href="#" class="mobile-tittle">Edit Node</a>
    <a href="{{ url('nodes')}}" class="mobile-right"><i class="material-icons">close</i></a>
@stop

@section('content')
    <div class="desktop row" id="nodes">
        <!-- Tittle -->
        <div class="linker"><p class="light">Dashboard > Nodes > Edit </p></div>
        <h4 class="light">Edit Node</h4>
        <div class="divider"></div><br>

        @if (session('error'))
            <div class="warning-box">
                <p><i class="material-icons">highlight_off</i><span class="ups">Wops!</span>{{session('error')}}</p>
            </div>
        @endif

        <!-- Form -->
        {!! Form::model($node,[
        'method' => 'PUT',
        'route'=>['nodes.update',$node->id]
        ]) !!}

        <div class="row">
            @if (session('name'))
                <div class="input-field col s12">
                    <i class="material-icons prefix">play_for_work</i>
                    <input id="icon_label" class="validate" name="name" type="text" id="name" value="{{session('name')}}" required>
                    <label for="icon_label">Name</label>
                </div>
            @else
                <div class="input-field col s12">
                    <i class="material-icons prefix">play_for_work</i>
                    <input id="icon_label" class="validate" name="name" type="text" id="name" value="{{$node->name}}" required>
                    <label for="icon_label">Name</label>
                </div>
            @endif
            @if (session('latitude'))
                <div class="input-field col s12" style="margin-bottom: 10px;">
                    <i class="material-icons prefix">swap_vert</i>
                    <input id="icon_swap_vert" class="validate" name="longitude" type="text" id="longitude" pattern="\d+(\.\d*)?" value="{{session('latitude')}}" required>
                    <label for="icon_swap_vert">Latitude</label>
                </div>
            @else
                <div class="input-field col s12" style="margin-bottom: 10px;">
                    <i class="material-icons prefix">swap_vert</i>
                    <input id="icon_swap_vert" class="validate" name="longitude" type="text" id="longitude" pattern="\d+(\.\d*)?" value="{{$node->latitude}}" required>
                    <label for="icon_swap_vert">Latitude</label>
                </div>
            @endif
            @if (session('longitude'))
                <div class="input-field col s12">
                    <i class="material-icons prefix">swap_horiz</i>
                    <input id="icon_swap_horiz" class="validate"  name="latitude" type="text" id="latitude" pattern="\d+(\.\d*)?" value="{{session('longitude')}}" required>
                    <label for="icon_swap_horiz">Longitude</label>
                </div>
            @else
                <div class="input-field col s12">
                    <i class="material-icons prefix">swap_horiz</i>
                    <input id="icon_swap_horiz" class="validate"  name="latitude" type="text" id="latitude" pattern="\d+(\.\d*)?" value="{{$node->longitude}}" required>
                    <label for="icon_swap_horiz">Longitude</label>
                </div>
            @endif
        </div>

        <h4 class="light">Edit Sensors</h4>
        <div class="divider"></div>

        <div id="list">
            <div class="row container" name="sensors[]" style="display: none;" id="add">
                @foreach($sensors_types as $sensors_type)
                    <div class="col s12 name">
                        {{$sensors_type}}
                    </div>
                    <div class="col s12">
                        @foreach($sensors_types_by_unit[$sensors_type] as $key => $value)
                            <div class="row">
                                <div class="col s6">
                                    <input style="color:#000000; text-align: center; font-size: 20px; " type="text" id="{{$value}}" name="sensors_units[]" value="{{$value}}" readonly>
                                </div>
                                <div class="col s6">
                                    <input style="text-align: center; font-size: 20px;" type="number" class="validate"  id="{{$sensors_types_by_unit_number[$value][0]}}" name="sensors_number[]" value="{{$sensors_types_by_unit_number[$value][0]}}" min="{{$sensors_types_by_unit_number[$value][0]}}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>


        <!-- FLOATING BUTTONS -->
        <div class="fixed-action-btn" id="ok" style="display: none;">
            <button type="submit" class="primary btn-floating btn-large waves-effect waves-circle waves-light" id="create"> <!-- Green -->
            <i class="large material-icons">navigate_next</i>
            </button>
        </div>
        <!-- FLOATING BUTTONS -->
        {!! Form::close() !!}

        <!-- FLOATING BUTTONS -->
        <div class="fixed-action-btn" id="cancel">
            <a href="{{ url('nodes')}}" class="btn-floating btn-large waves-effect waves-circle waves-light">
                <i class="large material-icons">close</i>
            </a>
        </div>
        <!-- FLOATING BUTTONS -->


        <div class="col s12" id="delete"><br>
            <ul class="collection">
                @for ($i = 0; $i < $size; $i++)
                    <li class="collection-item avatar">
                        <i class="material-icons circle red">settings_remote</i>
                        <p class="light"><strong>Id </strong>{{$sensors[$i]["id"]}}
                            {!! Form::open(['method' => 'DELETE', 'route'=>['sensorsbynode.destroy', $sensors[$i]["id"]]]) !!}
                            <button type="submit" class="btn btn-flat" style="float: right;"><i class="material-icons">delete</i></button>
                            {!! Form::close() !!}
                        <strong>Type </strong> {{$sensors[$i]["type"]}} <br/>
                        <strong>Unit </strong> {{$sensors[$i]["unit"]}}
                        <!--<a class="right" href="{{--URL::to('sensorsbynode/delete/' . $sensors[$i]["id"])--}}"><i class="material-icons">delete</i></a>-->
                    </li>
                @endfor
            </ul>
            <br/>
            <div class="center">
                <button type="submit" class="btn btn-primary" id="continue">Continue</button>
            </div>
        </div>
    </div>
@stop

@section('javascript')

    <script type="text/javascript">
        $(document).ready(function(){
            $("#continue").click(function(e){
                e.preventDefault();
                $("#delete").hide();
                $("#add").show();
                $("#ok").show();
            });
        });
    </script>
@stop