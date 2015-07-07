@extends('layout.admin')
@section('title')
    <h1>Update Sensor</h1>
@stop
@section('content')
    {!! Form::model($sensor,[
    'method' => 'PUT',
    'route'=>['sensors.update',$sensor->id]
    ]) !!}

    <div class="form-group">
        <label for="name">Name:</label>
        <input class="form-control"  name="name" type="text" id="name" value="{{$sensor->name}}" required>
    </div>
    <div class="form-group">
        <label for="longitude">Type:</label>
        <input class="form-control"  name="type" type="text" id="type" value="{{$sensor->type}}" required>
    </div>
    <div class="form-group">
        <label for="latitude">Unit:</label>
        <input class="form-control"  name="unit" type="text" id="unit" value="{{$sensor->unit}}" required>
    </div>
    <div class="form-group">
        <label for="latitude">Range:</label>
        <input class="form-control"  name="range" type="text" id="range" value="{{$sensor->range}}" required>
    </div>
    <div class="form-group">
        <input class="btn btn-primary form-control" type="submit" value="Update">
    </div>
    {!! Form::close() !!}
@stop