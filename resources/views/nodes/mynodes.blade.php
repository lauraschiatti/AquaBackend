@extends('layout.admin')

@section('title')
    <a href="#" class="mobile-tittle">My Nodes</a>
@stop


@section('content')
    <div class="desktop row" id="mynodes">
        <!-- Tittle -->
        <div class="linker"><p class="light">Dashboard > My Nodes </p></div>
        <h4 class="light">My Nodes</h4>
        <div class="divider"></div>

        <!-- Table -->
        <div class="col s12">
            <table class="striped">
                <thead>
                <tr>
                    <th data-field="id">Id</th>
                    <th data-field="name">Name</th>
                    <th data-field="longitude">Longitude</th>
                    <th data-field="latitude">Latitude</th>
                    <th data-field="actions">Actions</th>
                </tr>
                </thead>

                <tbody>
                @if($nodes)
                    @foreach ($nodes as $node)
                        <tr>
                            <td>{{ $node->id }}</td>
                            <td>{{ $node->name }}</td>
                            <td>{{ $node->longitude }}</td>
                            <td>{{ $node->latitude }}</td>
                            <td>
                                <a href="{{url('nodes',$node->id)}}"><i class="material-icons">visibility</i></a>
                                <a href="{{route('nodes.edit', $node->id)}}"><i class="material-icons">edit</i></a>
                                {!! Form::open(['method' => 'DELETE', 'route'=>['nodes.destroy', $node->id]]) !!}
                                    <button type="submit" class="btn-flat"><i class="material-icons">delete</i></button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- FLOATING BUTTON -->
    <div class="fixed-action-btn" id="add">
        <a href="{{url('/nodes/create')}}" class="btn-floating btn-large waves-effect waves-circle waves-light red">
            <i class="large material-icons">add</i>
        </a>
    </div>
    <!-- FLOATING BUTTON -->
@endsection