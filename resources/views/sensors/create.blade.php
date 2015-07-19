@extends('layout.admin')

@section('title')
    <a href="#" class="mobile-tittle">New Sensor</a>
    <a href="{{ url('sensors')}}" class="mobile-right"><i class="material-icons">close</i></a>
@stop

@section('content')
    <div class="desktop row" id="sensors">
        <!-- Tittle -->
        <div class="linker"><p class="light">Dashboard > Sensors > Create </p></div>
        <h4 class="light">Create Sensor Type</h4>
        <div class="divider"></div><br>

        @if (session('error'))
            <div class="warning-box">
                <p><i class="material-icons">highlight_off</i><span class="ups">Wops!</span>{{session('error')}}</p>
            </div>
        @endif


        <!-- Form -->
        {!! Form::open(['url' => 'sensors']) !!}
            <div class="row">
                @if (session('type'))
                    <div class="input-field col s12" style="margin-bottom: 10px;">
                        <i class="material-icons prefix">select_all</i>
                        <input class="validate" name="type" id="type" type="text" value="{{session('type')}}" required>
                        <label for="type">Type</label>
                    </div>
                @else
                    <div class="input-field col s12" style="margin-bottom: 10px;">
                        <i class="material-icons prefix">select_all</i>
                        <input class="validate" name="type" id="type" type="text" required>
                        <label for="type">Type</label>
                    </div>
                @endif
                @if (session('unit'))
                    <div class="input-field col s12">
                        <i class="material-icons prefix">grain</i>
                        <input class="validate" name="unit" type="text" id="unit"  value="{{session('unit')}} " required>
                        <label for="unit">Unit</label>
                    </div>
                @else
                    <div class="input-field col s12">
                        <i class="material-icons prefix">grain</i>
                        <input class="validate" name="unit" type="text" id="unit" required>
                        <label for="unit">Unit</label>
                    </div>
                @endif
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
