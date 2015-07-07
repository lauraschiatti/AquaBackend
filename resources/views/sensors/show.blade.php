@extends('layout.admin')
@section('title')
    <h1>Sensor info</h1>
@stop
@section('content')
    <form class="form-horizontal">
        <div class="form-group">
            <label for="id" class="col-sm-2 control-label">Id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="id" placeholder={{$sensor->id}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder={{$sensor->name}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="longitude" class="col-sm-2 control-label">Type</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="type" placeholder={{$sensor->type}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="latitude" class="col-sm-2 control-label">Unit</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="unit" placeholder={{$sensor->unit}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="latitude" class="col-sm-2 control-label">Range</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="range" placeholder={{$sensor->range}} readonly>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="{{ url('sensors')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </form>
@stop