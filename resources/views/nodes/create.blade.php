@extends('layout.template')
@section('title')
    <h1>Create Node</h1>
@stop
@section('content')
    {!! Form::open(['url' => 'nodes']) !!}
    <div class="form-group">
        <label for="name">Name:</label>
        <input class="form-control"  name="name" type="text" id="name">
    </div>
    <div class="form-group">
        <label for="longitude">Longitude:</label>
        <input class="form-control"  name="longitude" type="text" id="longitude">
    </div>
    <div class="form-group">
        <label for="latitude">Latitude:</label>
        <input class="form-control"  name="latitude" type="text" id="latitude">
    </div>
    <div class="form-group">
        <input class="btn btn-primary form-control" type="submit" value="Save node">
    </div>
    {!! Form::close() !!}
@stop