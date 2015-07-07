@extends('layout.admin')
@section('title')
    <h1>Create Sensor</h1>
@stop
@section('content')
    {!! Form::open(['url' => 'sensors']) !!}
    <div class="form-group">
        <label for="name">Name:</label>
        <input class="form-control"  name="name" type="text" id="name" required>
    </div>
    <div class="form-group">
        <label for="type">Type:</label>
        <input class="form-control"  name="type" type="text" id="type" required>
    </div>
    <div class="form-group">
        <label for="unit">Unit:</label>
        <input class="form-control"  name="unit" type="text" id="unit" required>
    </div>
    <div class="form-group">
        <label for="range">Range:</label>
        <input class="form-control"  name="range" type="text" id="range" required>
    </div>
    <div class="form-group">
        <input class="btn btn-primary form-control" type="submit" value="Save sensor">
    </div>
    {!! Form::close() !!}
@stop