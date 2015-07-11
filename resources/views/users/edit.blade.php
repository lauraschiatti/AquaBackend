@extends('layout.admin')

@section('title')
    <a href="#" class="mobile-tittle">Edit User</a>
    <a href="{{ url('users')}}" class="mobile-right"><i class="material-icons">close</i></a>
@stop

@section('content')
    <div class="desktop row" id="nodes">
        <!-- Tittle -->
        <div class="linker"><p class="light">Dashboard > Users > Edit </p></div>
        <h4 class="light">Edit User</h4>
        <div class="divider"></div>

        <!-- Form -->
        {!! Form::model($user,[
        'method' => 'PUT',
        'route'=>['users.update',$user->id]
        ]) !!}

        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">play_for_work</i>
                <input id="icon_label" class="validate" name="name" type="text" id="name" value="{{$user->name}}" required>
                <label for="icon_label">Name</label>
            </div>
            <div class="input-field col s12" style="margin-bottom: 10px;">
                <i class="material-icons prefix">swap_vert</i>
                <input id="icon_swap_vert" class="validate" name="email" type="email" id="email" value="{{$user->email}}" required>
                <label for="icon_swap_vert">Email</label>
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