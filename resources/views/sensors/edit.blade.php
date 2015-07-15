@extends('layout.admin')

@section('title')
    <a href="#" class="mobile-tittle">Edit Sensor</a>
    <a href="{{ url('sensors')}}" class="mobile-right"><i class="material-icons">close</i></a>
@stop

@section('content')
    <div class="desktop row" id="nodes">
        <!-- Tittle -->
        <div class="linker"><p class="light">Dashboard > Sensors > Edit </p></div>
        <h4 class="light">Edit Sensor</h4>
        <div class="divider"></div><br>

        <!-- Form -->
        {!! Form::model($sensor,[
        'method' => 'PUT',
        'route'=>['sensors.update',$sensor->id]
        ]) !!}

        <div class="row">
            <div class="input-field col s12" style="margin-bottom: 10px;">
                <i class="material-icons prefix">select_all</i>
                <input id="icon_swap_vert" class="validate" name="type" id="type" type="text" value="{{$sensor->type}}" required>
                <label for="icon_swap_vert">Type</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">grain</i>
                <input id="icon_swap_horiz" class="validate" name="unit" type="text" id="unit" value="{{$sensor->unit}}" required>
                <label for="icon_swap_horiz">Unit</label>
            </div>
        </div>

        <!-- FLOATING BUTTONS -->
        <div class="fixed-action-btn" id="add">
            <button type="submit" class="btn-floating btn-large waves-effect waves-circle waves-light"> <!-- Green -->
                <i class="large material-icons">check</i>
            </button>
        </div>
        <!-- FLOATING BUTTONS -->
        {!! Form::close() !!}

        <!-- FLOATING BUTTONS -->
        <div class="fixed-action-btn" id="cancel">
            <a href="{{ url('sensors')}}" class="btn-floating btn-large waves-effect waves-circle waves-light">
                <i class="large material-icons">close</i>
            </a>
        </div>
        <!-- FLOATING BUTTONS -->
    </div>

@stop