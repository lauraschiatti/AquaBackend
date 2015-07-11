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
        <div class="divider"></div>

        <!-- Form -->
        {!! Form::open(array('url'=>'users','method'=>'POST', 'files'=>true)) !!}
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">play_for_work</i>
                <input id="icon_label" class="validate"  name="name" type="text" id="name" required>
                <label for="icon_label">Name</label>
            </div>
            <div class="input-field col s12" style="margin-bottom: 10px;">
                <i class="material-icons prefix">swap_vert</i>
                <input id="icon_swap_vert" class="validate"  name="email" type="email" id="email" required>
                <label for="icon_swap_vert">Email</label>
            </div>
            <div class="input-field col s12">
                <i class="material-icons prefix">swap_horiz</i>
                <input id="icon_swap_horiz" class="validate"  name="password" type="password" id="password" required>
                <label for="icon_swap_horiz">Password</label>
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
