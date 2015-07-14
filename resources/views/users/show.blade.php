@extends('layout.admin')

@section('title')
    <a href="#" class="mobile-tittle">Profile</a>
    <a href="{{ url('users')}}" class="mobile-right"><i class="material-icons">close</i></a>
@stop

@section('content')

    <div class="desktop show row">
        <!-- Tittle -->
        <div class="linker"><p class="light">Dashboard > Users > Profile </p></div>
        <h4 class="light">Profile</h4>
        <div class="hide-on-med-and-down divider"></div>
        <img src="/img/face.jpg" alt="" class="circle">
        <div class="input-field col s12">
            <i class="material-icons prefix">link</i>
            <input class="validate" name="name" type="text" id="name" value="{{$user->name}}" readonly>
            <label for="name">Name</label>
        </div>
        <div class="input-field col s12" style="margin-bottom: 10px;">
            <i class="material-icons prefix">select_all</i>
            <input class="validate" name="type" id="user" type="text" value="{{$user->email}}" readonly>
            <label for="user">Email</label>
        </div>
        <div class="input-field col s12" style="margin-bottom: 10px;">
            <i class="material-icons prefix">person_pin</i>
            <input class="validate" name="type" id="type" type="text" value="{{$user->role}}" readonly>
            <label for="type">Type</label>
        </div>

        <a href="{{ url('sensors')}}" class="btn btn-primary right hide-on-med-and-down">Back</a>
    </div>
@stop