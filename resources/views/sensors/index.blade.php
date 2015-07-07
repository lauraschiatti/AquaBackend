@extends('layout.admin')
@section('title')
    <h1>Sensors</h1>
@stop
@section('content')
    <a href="{{url('/sensors/create')}}" class="btn btn-success">Create Sensor</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Id</th>
            <th>Name</th>
            <th>Type</th>
            <th>Unit</th>
            <th>Range</th>
            <th colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($sensors as $sensor)
            <tr>
                <td>{{ $sensor->id }}</td>
                <td>{{ $sensor->name }}</td>
                <td>{{ $sensor->type }}</td>
                <td>{{ $sensor->unit }}</td>
                <td>{{ $sensor->range }}</td>
                <td><a href="{{url('sensors',$sensor->id)}}" class="btn btn-primary">Read</a></td>
                <td>
                    <a href="{{route('sensors.edit', $sensor->id)}}" class="btn btn-warning">Update</a>
                </td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['sensors.destroy', $sensor->id]]) !!}
                    <input class="btn btn-danger" type="submit" value="Delete">
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection