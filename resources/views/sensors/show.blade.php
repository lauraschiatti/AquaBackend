@extends('layout.admin')

@section('title')
    <a href="#" class="mobile-tittle">Sensor info</a>
    <a href="{{ url('sensors')}}" class="mobile-right"><i class="material-icons">close</i></a>
@stop

@section('content')

    <div class="desktop show row">
        <!-- Tittle -->
        <div class="linker"><p class="light">Dashboard > Sensors > Show </p></div>
        <h4 class="light">Sensor Info</h4>
        <div class="hide-on-med-and-down divider"></div>
        <div class="input-field col s12">
            <i class="material-icons prefix">link</i>
            <input id="icon_label" class="validate" name="name" type="text" id="name" value="{{$sensor->name}}" readonly>
            <label for="icon_label">Name</label>
        </div>
        <div class="input-field col s12" style="margin-bottom: 10px;">
            <i class="material-icons prefix">select_all</i>
            <input id="icon_swap_vert" class="validate" name="type" id="type" type="text" value="{{$sensor->type}}" readonly>
            <label for="icon_swap_vert">Type</label>
        </div>
        <div class="input-field col s12">
            <i class="material-icons prefix">grain</i>
            <input id="icon_swap_horiz" class="validate" name="unit" type="text" id="unit" value="{{$sensor->unit}}" readonly>
            <label for="icon_swap_horiz">Unit</label>
        </div>
        <div class="input-field col s12">
            <i class="material-icons prefix">graphic_eq</i>
            <input id="icon_graphic_eq" class="validate" name="range" type="text" id="range" value="{{$sensor->range}}" readonly>
            <label for="icon_graphic_eq">Range</label>
        </div>

        <a href="{{ url('sensors')}}" class="btn btn-primary right hide-on-med-and-down">Back</a>
    </div>
@stop