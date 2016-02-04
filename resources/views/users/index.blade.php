@extends('layout.admin')

@section('title')
    <a href="#" class="mobile-tittle">{{ trans("general.users") }}</a>
@stop


@section('content')
    <div class="desktop row" id="nodes">
        <!-- Tittle -->
        <div class="linker"><p class="light">{{ trans("general.dashboard") }} > {{ trans("general.users") }} </p></div>
        <h4 class="light">{{ trans("general.users") }}</h4>
        <div class="divider"></div>

        <!-- Table -->
        <div class="col s12">
            <table class="striped">
                <thead>
                <tr>
                    <th data-field="id">Id</th>
                    <th data-field="email">{{ trans("users.email") }}</th>
                    <th data-field="role">{{ trans("users.role") }}</th>
                    <th data-field="actions">{{ trans("general.actions") }}</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <div class="buttons">
                                <button class="btn-flat"><a href="{{url('users',$user->id)}}"><i class="material-icons">visibility</i></a></button>

                                @if(Auth::check() and Auth::user()->role == 'superadmin')
                                    <button class="btn-flat"><a href="{{route('users.edit', $user->id)}}"><i class="material-icons">edit</i></a></button>
                                    {!! Form::open(['method' => 'DELETE', 'route'=>['users.destroy', $user->id]]) !!}
                                    <button type="submit" class="btn-flat"><i class="material-icons">delete</i></button>
                                    {!! Form::close() !!}
                                    <!--<a class="modal-trigger" href="#modal2"><i class="material-icons">delete</i></a>-->

                                    <!-- cancel modal Structure -->
                                    <!--<div id="modal2" class="modal">
                                        <div class="modal-content center">
                                            <h6 class="light">This action can not be reversed, would you like to continue? </h6><br>
                                            <div class="modal-footer">
                                                {!! Form::open(['method' => 'DELETE', 'route'=>['users.destroy', $user->id]]) !!}
                                                <button type="submit" class="btn btn-flat">Yes</button>
                                                {!! Form::close() !!}
                                                <button class="btn btn-flat modal-action modal-close">No</button>
                                            </div>
                                        </div>
                                    </div>-->
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- FLOATING BUTTON -->
    <div class="fixed-action-btn" id="add">
        <a href="{{url('/users/create')}}" class="btn-floating btn-large waves-effect waves-circle waves-light red">
            <i class="large material-icons">person_add</i>
        </a>
    </div>
    <!-- FLOATING BUTTON -->
@endsection