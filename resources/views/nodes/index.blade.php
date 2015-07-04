@extends('layout/template')
@section('title')
    <h1>Nodes</h1>
@stop
@section('content')
    <a href="{{url('/nodes/create')}}" class="btn btn-success">Create Node</a>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">
            <th>Id</th>
            <th>Name</th>
            <th>Longitude</th>
            <th>Latitude</th>
            <th colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($nodes as $node)
            <tr>
                <td>{{ $node->id }}</td>
                <td>{{ $node->name }}</td>
                <td>{{ $node->longitude }}</td>
                <td>{{ $node->latitude }}</td>
                <td><a href="{{url('nodes',$node->id)}}" class="btn btn-primary">Read</a></td>
                <td>
                    <a href="{{route('nodes.edit', $node->id)}}" class="btn btn-warning">Update</a>
                </td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['nodes.destroy', $node->id]]) !!}
                    <input class="btn btn-danger" type="submit" value="Delete">
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection