@extends('layout.admin')
@section('title')
    <h1>Node info</h1>
@stop
@section('content')
    <form class="form-horizontal">
        <div class="form-group">
            <label for="id" class="col-sm-2 control-label">Id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="id" placeholder={{$node->id}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder={{$node->name}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="longitude" class="col-sm-2 control-label">Longitude</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="longitude" placeholder={{$node->longitude}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="latitude" class="col-sm-2 control-label">Latitude</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="latitude" placeholder={{$node->latitude}} readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Sensors</label>
            @foreach ($sensors as $sensor)
                <input type="text" class="form-control col-sm-2" id="latitude" placeholder={{$sensor}} readonly>
            @endforeach
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="{{ url('nodes')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </form>
@stop