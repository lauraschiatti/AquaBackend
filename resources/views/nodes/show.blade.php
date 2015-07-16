@extends('layout.admin')

@section('title')
    <a href="#" class="mobile-tittle">Node info</a>
    <a href="{{ url('nodes')}}" class="mobile-right"><i class="material-icons">close</i></a>
@stop

@section('content')

    <div class="desktop show row">
        <!-- Tittle -->
        <div class="linker"><p class="light">Dashboard > Nodes > Show </p></div>
        <h4 class="light">Node Info</h4>
        <div class="hide-on-med-and-down divider"></div>
        <div class="input-field col s12">
            <i class="material-icons prefix">play_for_work</i>
            <input type="text" id="id" value="{{$node->id}}" readonly>
            <label for="id">Id</label>
        </div>
        <div class="input-field col s12">
            <i class="material-icons prefix">play_for_work</i>
            <input id="name" type="text" value="{{$node->name}}" readonly>
            <label for="name">Name</label>
        </div>
        <div class="input-field col s12">
            <i class="material-icons prefix">swap_vert</i>
            <input id="longitude" type="text" id="id" value="{{$node->longitude}}" readonly>
            <label for="longitude">Longitude</label>
        </div>
        <div class="input-field col s12">
            <i class="material-icons prefix">swap_horiz</i>
            <input id="latitude" type="text" id="id" value="{{$node->latitude}}" readonly>
            <label for="latitude">Latitude</label>
        </div>

        <div class="input-field col s12">
            <h4 class="light">Sensors Info</h4>
            <div class="hide-on-med-and-down divider"></div><br/>

            <ul class="collection">
                @for ($i = 0; $i < $size; $i++)
                    <li class="collection-item avatar">
                        <i class="material-icons circle red">settings_remote</i>
                        <p class="light"><strong>Id </strong>{{$sensors[$i]["id"]}}</p>
                        <p class="light"><strong>Type </strong> {{$sensors[$i]["type"]}} </p>
                        <p class="light"><strong>Unit </strong> {{$sensors[$i]["unit"]}} </p>
                    </li>
                @endfor
            </ul>
        </div>

        <h4 class="light">Creator Info</h4>
        <div class="hide-on-med-and-down divider"></div><br/>

        <ul class="collection" id="person">
            <li class="collection-item avatar">
                <img src="/img/face.jpg" alt="" class="circle">
                <span class="title">{{$user->name}}</span>
                <p class="light"> {{$user->email}} </p>
            </li>
        </ul>

        <a href="{{ url('nodes')}}" class="btn btn-primary right hide-on-med-and-down">Back</a>
    </div>
@stop