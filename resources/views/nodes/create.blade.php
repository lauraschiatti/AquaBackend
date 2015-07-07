@extends('layout.admin')

@section('content')
<div class="desktop row" id="nodes">
    <!-- Tittle -->
    <div class="linker"><p class="light">Dashboard > Nodes > Create </p></div>
    <h4 class="light">Create Node</h4>
    <div class="divider"></div>


    <!-- Form -->
    {!! Form::open(['url' => 'nodes']) !!}
    <div class="form-c-node">
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">play_for_work</i>
                <input id="icon_label" type="text" name="name" type="text" id="name" required>
                <label for="icon_label">Name</label>
            </div>
            <div class="input-field col s12" style="margin-bottom: 10px;">
                <i class="material-icons prefix">swap_vert</i>
                <input id="icon_swap_vert" type="number" name="longitude" type="text" id="longitude" required>
                <label for="icon_swap_vert">Latitude</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">swap_horiz</i>
                <input id="icon_swap_horiz" type="number"  name="latitude" type="text" id="latitude" required>
                <label for="icon_swap_horiz">Longitude</label>
            </div>
        </div>

        @foreach ($sensors_names as $sensor_name)
            <!--Validation at least one checkbox is checked http://jsfiddle.net/chriscoyier/BPhZe/76/-->
            <!-- http://www.widecodes.com/0QmjPVWeVg/how-to-get-the-values-for-a-series-of-checkboxes-in-laravel-4-controller-if-checked.html leer $friend->id-->
            <input style="text-align:center; vertical-align: middle;" tabindex="1" type="checkbox" name="sensors[]" id="{{$sensor_name}}" value="{{$sensor_name}}">{{$sensor_name}}<br>
        @endforeach>

        <div class="row">
            <div class="col s12">
              <button class="right btn btn-primary waves-effect waves-light">Create</button>
            </div>

        </div>
    </div>
    {!! Form::close() !!}

</div>
@stop