@extends('layout.admin')

@section('title')
    <a href="#" class="mobile-tittle">New Node</a>
    <a href="{{ url('nodes')}}" class="mobile-right"><i class="material-icons">close</i></a>
@stop

@section('content')
    <div class="desktop row" id="nodes">
        <!-- Tittle -->
        <div class="linker"><p class="light">Dashboard > Nodes > Create </p></div>
        <h4 class="light">Create Node</h4>
        <div class="divider"></div>

        <!-- Form -->
        {!! Form::open(['url' => 'nodes']) !!}
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">play_for_work</i>
                <input id="icon_label" type="text" name="name" type="text" id="name" required>
                <label for="icon_label">Name</label>
            </div>
            <div class="input-field col s12" style="margin-bottom: 10px;">
                <i class="material-icons prefix">swap_vert</i>
                <input id="icon_swap_vert" type="text" name="longitude" type="text" id="longitude" pattern="\d+(\.\d*)?" required>
                <label for="icon_swap_vert">Latitude</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">swap_horiz</i>
                <input id="icon_swap_horiz" type="text"  name="latitude" type="text" id="latitude" pattern="\d+(\.\d*)?" required>
                <label for="icon_swap_horiz">Longitude</label>
            </div>
        </div>


        <div class="col s12">
            <div id="checkboxes">
                <ul class="collapsible popout z-depth-2" data-collapsible="accordion">
                    @foreach ($sensors as $sensor)
                        <li>
                            <div class="collapsible-header">
                                <input tabindex="1" type="checkbox" name="sensors[]" id="{{$sensor->name}}" value="{{$sensor->name}}">
                                <label for="{{$sensor->name}}">{{$sensor->name}}</label>
                                <i class="material-icons right">keyboard_arrow_down</i>
                            </div>
                            <div class="collapsible-body">
                                <ul style="margin: 20px;">
                                <li class="light"><strong>Id </strong>{{$sensor->id}}</li>
                                <li class="light"><strong>Type </strong> {{$sensor->type}} </li>
                                <li class="light"><strong>Unit </strong> {{$sensor->unit}} </li>
                                <li class="light"><strong>Range </strong> {{$sensor->range}} </li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- FLOATING BUTTONS -->
        <div class="fixed-action-btn" id="add">
            <button type="submit" class="btn-floating btn-large waves-effect waves-circle waves-light" id="create" disabled> <!-- Green -->
                <i class="large material-icons">check</i>
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
    </div>
@stop

