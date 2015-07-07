@extends('layout.admin')
@section('title')
    <h1>Sensors of the node</h1>
@stop
@section('content')
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <a href="" class="btn btn-primary">Add sensors</a>
        </div>
    </div>

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
                <td>

                    <input class="btn btn-danger" type="submit" value="Delete">

                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection