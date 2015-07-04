@extends('layout.template')
@section('title')
    <h1>Update Node</h1>
@stop
@section('content')
    {!! Form::model($node,[
    'method' => 'PUT',
    'route'=>['nodes.update',$node->id]
    ]) !!}

    <div class="form-group">
        <label for="name">Name:</label>
        <input class="form-control"  name="name" type="text" id="name" value={{$node->name}}>
    </div>
    <div class="form-group">
        <label for="longitude">Longitude:</label>
        <input class="form-control"  name="longitude" type="text" id="longitude" value={{$node->longitude}}>
    </div>
    <div class="form-group">
        <label for="latitude">Latitude:</label>
        <input class="form-control"  name="latitude" type="text" id="latitude" value={{$node->latitude}}>
    </div>
    <div class="form-group">
        <input class="btn btn-primary form-control" type="submit" value="Update">
    </div>
    {!! Form::close() !!}
@stop