@extends('layout.admin')
@section('title')
    <h1>Update Node</h1>
@stop
@section('content')
    {!! Form::model($node,[
    'method' => 'PUT',
    'route'=>['nodes.update',$node->id]
    ]) !!}

   <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Edit sensors</button>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Sensors</h4>
            </div>
            <div class="modal-body">
                <!-- Table -->
                <div class="col s12">
                    <table class="striped">
                        <thead>
                        <tr>
                            <th data-field="id">Id</th>
                            <th data-field="name">Name</th>
                            <th data-field="price">Type</th>
                            <th data-field="id">Unit</th>
                            <th data-field="name">Range</th>
                            <th data-field="name">Action</th>
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
                                    {!! Form::open(['method' => 'DELETE', 'route'=>['sensorsbynode.destroy', $sensor->id, $node->id]]) !!}
                                        <input class="material-icons" type="submit" value="Delete">
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

    <div class="form-group">
        <label for="name">Name:</label>
        <input class="form-control"  name="name" type="text" id="name" value="{{$node->name}}" required>
    </div>
    <div class="form-group">
        <label for="longitude">Longitude:</label>
        <input class="form-control"  name="longitude" type="text" id="longitude" value="{{$node->longitude}}" required>
    </div>
    <div class="form-group">
        <label for="latitude">Latitude:</label>
        <input class="form-control"  name="latitude" type="text" id="latitude" value="{{$node->latitude}}" required>
    </div>
    <div class="form-group">
        <input class="btn btn-primary form-control" type="submit" value="Update">
    </div>
    {!! Form::close() !!}
@stop