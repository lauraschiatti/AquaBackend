@extends('layout.admin')

@section('title')
    <a href="#" class="mobile-tittle">{{ trans("users.edit user") }}</a>
    <a href="{{ url('users')}}" class="mobile-right"><i class="material-icons">close</i></a>
@stop

@section('content')
    <div class="desktop row" id="nodes">
        <!-- Tittle -->
        <div class="linker"><p class="light">{{ trans("general.dashboard") }} > {{ trans("general.users") }} > {{ trans("general.edit") }} </p></div>
        <h4 class="light">{{ trans("users.edit user") }}</h4>
        <div class="divider"></div><br>

        @if (session('error'))
            <div class="warning-box">
                <p><i class="material-icons">highlight_off</i><span class="ups">Wops!</span>{{session('error')}}</p>
            </div>
        @endif

        <!-- Form -->
        {!! Form::model($user,[
        'method' => 'PUT',
        'route'=>['users.update',$user->id]
        ]) !!}

        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">play_for_work</i>
                <input id="icon_label" class="validate" name="name" type="text" id="name" value="{{$user->name}}" required>
                <label for="icon_label">{{ trans("general.name") }}</label>
            </div>

            <div class="col s12">
                <br>
                <label>{{ trans("users.change user type") }}</label>
                <div id="radiobuttons">
                    @if($user->role == "user")
                        <p>
                            <i class="material-icons prefix">person_pin</i>
                            <input name="role" type="radio" id="user" value="user" checked/>
                            <label for="user">{{ trans("users.user") }}</label>
                        </p>
                    @else
                        <p>
                            <i class="material-icons prefix">person_pin</i>
                            <input name="role" type="radio" id="user" value="user"/>
                            <label for="user">{{ trans("users.user") }}</label>
                        </p>
                    @endif
                    @if($user->role == "provider")
                        <p>
                            <i class="material-icons prefix">assistant</i>
                            <input name="role" type="radio" id="provider" value="provider" checked/>
                            <label for="provider">{{ trans("users.provider") }}</label>
                        </p>
                    @else
                        <p>
                            <i class="material-icons prefix">assistant</i>
                            <input name="role" type="radio" id="provider" value="provider">
                            <label for="provider">{{ trans("users.provider") }}</label>
                        </p>
                    @endif
                    @if($user->role == "superadmin")
                        <p>
                            <i class="material-icons prefix">live_help</i>
                            <input type="radio" name="role" id="superadmin" value="superadmin" checked>
                            <label for="superadmin">{{ trans("users.super admin") }}</label>
                        </p>
                    @else
                        <p>
                            <i class="material-icons prefix">live_help</i>
                            <input type="radio" name="role" id="superadmin" value="superadmin">
                            <label for="superadmin">{{ trans("users.super admin") }}</label>
                        </p>
                    @endif
                </div>
            </div>
        </div>


        <!-- FLOATING BUTTONS -->
        <div class="fixed-action-btn" id="add">
            <button type="submit" class="btn-floating btn-large waves-effect waves-circle waves-light"> <!-- Green -->
                <i class="large material-icons">check</i>
            </button>
        </div>
        <!-- FLOATING BUTTONS -->
        {!! Form::close() !!}

        <!-- FLOATING BUTTONS -->
        <div class="fixed-action-btn" id="cancel">
            <a href="{{ url('users')}}" class="btn-floating btn-large waves-effect waves-circle waves-light">
                <i class="large material-icons">close</i>
            </a>
        </div>
        <!-- FLOATING BUTTONS -->

    </div>

@stop