@extends('layout.admin')

@section('title')
    <a href="#" class="mobile-tittle">{{ trans("general.sensors") }}</a>
@stop


@section('content')
    <div class="desktop row" id="sensors">
        <!-- Tittle -->
        <div class="linker"><p class="light">{{ trans("general.dashboard") }} > {{ trans("general.sensors") }}</p></div>
        <h4 class="light">{{ trans("general.sensors") }}</h4>
        <div class="divider"></div>

        <!-- Table -->
        <div class="col s12">
            <table class="striped">
                <thead>
                <tr>
                    <th data-field="id">Id</th>
                    <th data-field="type">{{ trans("sensors.type") }}</th>
                    <th data-field="type">{{ trans("sensors.unit") }}</th>
                    @if(Auth::check() and Auth::user()->role == 'superadmin')
                        <th data-field="actions">{{ trans("general.actions") }}</th>
                    @endif
                </tr>
                </thead>

                <tbody>
                @foreach ($sensors as $sensor)
                    <tr>
                        <td>{{ $sensor->id }}</td>
                        <td>{{ $sensor->type }}</td>
                        <td>{{ $sensor->unit }}</td>
                        <td>
                            @if(Auth::check() and Auth::user()->role == 'superadmin')
                                <!--<a href="{{url('sensors',$sensor->id)}}"><i class="material-icons">visibility</i></a>-->
                                <a href="{{route('sensors.edit', $sensor->id)}}"><i class="material-icons">edit</i></a>

                                {!! Form::open(['method' => 'DELETE', 'route'=>['sensors.destroy', $sensor->id]]) !!}
                                    <button type="submit" class="btn-flat"><i class="material-icons">delete</i></button>
                                {!! Form::close() !!}
                                    <!--<a class="modal-trigger" href="#modal2"><i class="material-icons">delete</i></a>

                                    <!-- cancel modal Structure -->
                                    <!--<div id="modal2" class="modal">
                                        <div class="modal-content center">
                                            <h6 class="light">This action can not be reversed, would you like to continue? </h6><br>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-flat">Yes</button>
                                                <button class="btn btn-flat modal-action modal-close">No</button>
                                            </div>
                                        </div>
                                    </div>-->
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