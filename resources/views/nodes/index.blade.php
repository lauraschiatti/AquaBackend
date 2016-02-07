@extends('layout.admin')

@section('title')
    <a href="#" class="mobile-tittle">{{ trans("nodes.all nodes") }}</a>
@stop


@section('content')
    <div class="desktop row" id="nodes">
        <!-- Tittle -->
        <div class="linker"><p class="light">{{ trans("general.dashboard") }} > {{ trans("general.nodes") }} </p></div>
        <h4 class="light">{{ trans("general.nodes") }}</h4>
        <div class="divider"></div>

        <!-- Table -->
        <div class="col s12">
            <table class="striped">
                <thead>
                <tr>
                    <th data-field="id">Id</th>
                    <th data-field="name">{{ trans("general.name") }}</th>
                    <th data-field="longitude">{{ trans("nodes.longitude") }}</th>
                    <th data-field="latitude">{{ trans("nodes.latitude") }}</th>
                    <th data-field="type">{{ trans("nodes.type") }}</th>
                    <th data-field="actions">{{ trans("general.actions") }}</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($nodes as $node)
                    <tr>
                        <td>{{ $node->id }}</td>
                        <td>{{ $node->name }}</td>
                        <td>{{ $node->longitude }}</td>
                        <td>{{ $node->latitude }}</td>
                        <td>{{ $node->type }}</td>
                        <td>
                            <a href="{{url('nodes',$node->id)}}"><i class="material-icons">visibility</i></a>

                            @if(Auth::check() and Auth::user()->role == 'superadmin')
                                <a href="{{route('nodes.edit', $node->id)}}"><i class="material-icons">edit</i></a>
                                {!! Form::open(['method' => 'DELETE', 'route'=>['nodes.destroy', $node->id]]) !!}
                                    <button type="submit" class="btn-flat"><i class="material-icons">delete</i></button>
                                {!! Form::close() !!}
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- FLOATING BUTTON -->
    @if(Auth::check() and Auth::user()->role == 'superadmin')
        <div class="fixed-action-btn" id="add">
            <a href="{{url('/nodes/create')}}" class="btn-floating btn-large waves-effect waves-circle waves-light red">
                <i class="large material-icons">add</i>
            </a>
        </div>
    @endif
    <!-- FLOATING BUTTON -->
@endsection