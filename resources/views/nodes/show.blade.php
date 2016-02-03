@extends('layout.admin')

@section('title')
    <a href="#" class="mobile-tittle">{{ trans("nodes.node info") }}</a>
    <a href="{{ url('nodes')}}" class="mobile-right"><i class="material-icons">close</i></a>
@stop

@section('content')

    <div class="desktop show row">
        <!-- Tittle -->
        <div class="linker"><p class="light">{{ trans("general.dashboard") }} > {{ trans("general.nodes") }} > {{ trans("general.show") }} </p></div>
        <h4 class="light">Node Info</h4>
        <div class="hide-on-med-and-down divider"></div><br>

        <div class="input-field col s12">
            <i class="material-icons prefix">play_for_work</i>
            <input type="text" id="id" value="{{$node->id}}" readonly>
            <label for="id">Id</label>
        </div>
        <div class="input-field col s12">
            <i class="material-icons prefix">play_for_work</i>
            <input id="name" type="text" value="{{$node->name}}" readonly>
            <label for="name">{{ trans("general.name") }}</label>
        </div>
        <div class="input-field col s12">
            <i class="material-icons prefix">swap_vert</i>
            <input id="longitude" type="text" id="id" value="{{$node->longitude}}" readonly>
            <label for="longitude">{{ trans("nodes.longitude") }}</label>
        </div>
        <div class="input-field col s12">
            <i class="material-icons prefix">swap_horiz</i>
            <input id="latitude" type="text" id="id" value="{{$node->latitude}}" readonly>
            <label for="latitude">{{ trans("nodes.latitude") }}</label>
        </div>

        <div class="input-field col s12">
            <h4 class="light">{{ trans("general.sensors") }}</h4>
            <div class="hide-on-med-and-down divider"></div><br/>
                @if ($size == 0)
                    <div class="warning-box" id="sensors_warning_box">
                        <p><i class="material-icons">feedback</i><span style="font-weight: lighter; font-size: medium;">{{ trans("nodes.no sensors added to this node") }}</span></p>
                    </div>
                @else
                    <ul class="collection">
                        @foreach($sensors_types as $sensors_type)
                            @foreach($sensors_types_by_unit[$sensors_type] as $key => $value)
                                <li class="collection-item"><strong>{{strtoupper($sensors_type)}}  </strong>in {{$value}}<span class="badge">{{$sensors_types_by_unit_number[$value][0]}}</span></li>
                            @endforeach
                        @endforeach
                    </ul>
                @endif
            </ul>

            <br>

            <h4 class="light">{{ trans("nodes.sensors data sending schema") }}</h4>
            <div class="hide-on-med-and-down divider"></div><br/>

            @if ($size == 0)
                <div class="warning-box" id="sensors_warning_box">
                    <p><i class="material-icons">feedback</i><span style="font-weight: lighter; font-size: medium;">{{ trans("nodes.no sensors added to this node") }}</span></p>
                </div>
            @else
                <ul class="collection">
                    @for ($i = 0; $i < $size; $i++)
                        <li class="collection-item avatar">
                            <i class="material-icons circle red">settings_remote</i>
                            <p class="light"><strong>Id </strong>{{$sensors_array[$i]["id"]}}</p>
                            <p class="light"><strong>Type </strong> {{$sensors_array[$i]["type"]}} </p>
                            <p class="light"><strong>Unit </strong> {{$sensors_array[$i]["unit"]}} </p>
                        </li>
                    @endfor
                </ul>
            @endif
        </div>

        <br><h4 class="light">{{ trans("nodes.creator info") }}</h4>
        <div class="hide-on-med-and-down divider"></div><br/>

        <ul class="collection" id="person">
            <li class="collection-item avatar">
                <img src="/img/face.jpg" alt="" class="circle">
                <span class="title">{{$user->name}}</span>
                <p class="light"> {{$user->email}} </p>
            </li>
        </ul>

        <br>
        <a href="{{url('nodes')}}" class="btn btn-primary right hide-on-med-and-down">{{ trans("general.back") }}</a>
    </div>
@stop