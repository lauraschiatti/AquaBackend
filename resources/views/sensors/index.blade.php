@extends('layout.admin')

@section('title')
    <a href="#" class="mobile-tittle">Sensors</a>
@stop


@section('content')
    <div class="desktop row" id="sensors">
        <!-- Tittle -->
        <div class="linker"><p class="light">Dashboard > Sensors </p></div>
        <h4 class="light">Sensors</h4>
        <div class="divider"></div>

        <!-- Table -->
        <div class="col s12">
            <table class="striped">
                <thead>
                <tr>
                    <th data-field="id">Id</th>
                    <th data-field="name">Name</th>
                    <th data-field="type">Type</th>
                    <th data-field="actions">Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($sensors as $sensor)
                    <tr>
                        <td>{{ $sensor->id }}</td>
                        <td>{{ $sensor->name }}</td>
                        <td>{{ $sensor->type }}</td>
                        <td>
                            <a href="{{url('sensors',$sensor->id)}}"><i class="material-icons">visibility</i></a>

                            @if(Auth::check() and Auth::user()->role == 'superadmin')
                                <a href="{{route('sensors.edit', $sensor->id)}}"><i class="material-icons">edit</i></a>
                            @endif

                            @if(Auth::check() and Auth::user()->role == 'superadmin')
                                <a class="modal-trigger" href="#modal2"><i class="material-icons">delete</i></a>

                                <!-- cancel modal Structure -->
                                <div id="modal2" class="modal">
                                    <div class="modal-content center">
                                        <h6 class="light">This action can not be reversed, would you like to continue? </h6><br>
                                        <div class="modal-footer">
                                            {!! Form::open(['method' => 'DELETE', 'route'=>['sensors.destroy', $sensor->id]]) !!}
                                            <button type="submit" class="btn btn-flat">Yes</button>
                                            {!! Form::close() !!}
                                            <button class="btn btn-flat modal-action modal-close">No</button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- FLOATING BUTTON -->
    <div class="fixed-action-btn" id="add">
        <a href="{{url('/sensors/create')}}" class="btn-floating btn-large waves-effect waves-circle waves-light red">
            <i class="large material-icons">add</i>
        </a>
    </div>
    <!-- FLOATING BUTTON -->
@endsection