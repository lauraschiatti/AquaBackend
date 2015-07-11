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
            <input id="icon_label" type="text" id="id" value="{{$node->id}}" readonly>
            <label for="icon_label">Id</label>
        </div>
        <div class="input-field col s12">
            <i class="material-icons prefix">play_for_work</i>
            <input id="icon_label" type="text" value="{{$node->name}}" readonly>
            <label for="icon_label">Name</label>
        </div>
        <div class="input-field col s12">
            <i class="material-icons prefix">play_for_work</i>
            <input id="icon_label" type="text" id="id" value="{{$node->longitude}}" readonly>
            <label for="icon_label">Longitude</label>
        </div>
        <div class="input-field col s12">
            <i class="material-icons prefix">play_for_work</i>
            <input id="icon_label" type="text" id="id" value="{{$node->latitude}}" readonly>
            <label for="icon_label">Latitude</label>
        </div>
        <div class="input-field col s12">
            <h4 class="light">Sensors Info</h4><br>

            <ul class="collection">
                @foreach ($sensors as $sensor)
                    <li class="collection-item avatar">
                        <i class="material-icons circle red">settings_remote</i>
                        <span><strong>{{$sensor->name}}</strong></span>
                        <p class="light"><strong>Id </strong>{{$sensor->id}}</p>
                        <p class="light"><strong>Name </strong> {{$sensor->type}} </p>
                        <p class="light"><strong>Unit </strong> {{$sensor->unit}} </p>
                        <p class="light"><strong>range </strong> {{$sensor->range}} </p>

                    </li>
                @endforeach
            </ul>
            <div class="hide-on-med-and-down divider"></div>
        </div>



        <a href="{{ url('nodes')}}" class="btn btn-primary right hide-on-med-and-down">Back</a>
    </div>
@stop