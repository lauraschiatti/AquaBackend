@extends('layout.admin')

@section('title')
    <a href="#" class="mobile-tittle">New User</a>
    <a href="{{ url('users')}}" class="mobile-right"><i class="material-icons">close</i></a>
@stop

@section('content')
    <div class="desktop row" id="users">
        <!-- Tittle -->
        <div class="linker"><p class="light">Dashboard > Users > Create </p></div>
        <h4 class="light">Create User</h4>
        <div class="divider"></div><br>

        @if (session('error'))
            <footer class="page-footer" style="width: 30%; margin-left: 35%; margin-right: 35%;">
                <div class="container">
                    <div class="row">
                        <div>
                            <h5 class="white-text">ERROR!</h5>
                            <span class="grey-text text-lighten-4">{{session('error')}}</span>
                        </div>
                    </div>
                </div>
            </footer>
        @endif

        <!-- Form -->
        {!! Form::open(array('url' => 'users', 'files'=> true)) !!}
            @if (session('name'))
                <div class="input-field col s12">
                    <i class="material-icons prefix">person</i>
                    <input class="validate"  name="name" type="text" id="name" value="{{session('name')}}" required>
                    <label for="name">Name</label>
                </div>
            @else
                <div class="input-field col s12">
                    <i class="material-icons prefix">person</i>
                    <input class="validate"  name="name" type="text" id="name" required>
                    <label for="name">Name</label>
                </div>
            @endif
            @if (session('email'))
                <div class="input-field col s12" style="margin-bottom: 10px;">
                    <i class="material-icons prefix">email</i>
                    <input class="validate"  name="email" type="email" id="email" value="{{session('email')}}" required>
                    <label for="email">Email</label>
                </div>
            @else
                <div class="input-field col s12" style="margin-bottom: 10px;">
                    <i class="material-icons prefix">email</i>
                    <input class="validate"  name="email" type="email" id="email" required>
                    <label for="email">Email</label>
                </div>
            @endif


            <!--<div class="input-field col s12">
                <i class="material-icons prefix">link</i>
                <input id="icon_swap_horiz" class="validate"  name="URL" type="text" id="URL">
                <label for="icon_swap_horiz">Profile picture URL</label>
            </div>-->
            <div class="col s12">
                <br>
                <label>Select user type</label>
                <div id="radiobuttons">
                    <p>
                        <i class="material-icons prefix">person_pin</i>
                        <input name="role" type="radio" id="user" value="user"/>
                        <label for="user">User</label>
                    </p>
                    <p>
                        <i class="material-icons prefix">assistant</i>
                        <input name="role" type="radio" id="provider" value="provider"/>
                        <label for="provider">Provider</label>
                    </p>
                    @if(Auth::check() and Auth::user()->role == 'superadmin')
                        <p>
                            <i class="material-icons prefix">live_help</i>
                            <input type="radio" name="role" id="superadmin" value="superadmin">
                            <label for="superadmin">Super Admin</label>
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
