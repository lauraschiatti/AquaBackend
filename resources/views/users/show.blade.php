@extends('layout.admin')

@section('title')
    <a href="#" class="mobile-tittle">{{ trans("settings.profile") }}</a>
    <a href="{{ url('dashboard')}}" class="mobile-right"><i class="material-icons">close</i></a>
@stop

@section('content')
    <div class="desktop row">
        <!-- Tittle -->
        <div class="linker"><p class="light">{{ trans("general.dashboard") }} > {{ trans("general.users") }} > {{ trans("settings.profile") }}</p></div>
        <div class="hide-on-med-and-down divider"></div>

        <section id="profile">
            <div class="col m3 l3 s12"><br></div>
            <div class="col s12 m6 l6">
                <div class="center" style="color: #000000;font-weight: lighter;">
                    <img id="profile_pic" class="circle" src="/img/face.jpg" alt=""/>
                    <h5 style="font-size: 1.5em"><strong>{{$user->name}}</strong></h5>
                    <p class="light" style="font-size: 1em;">{{$user->email}}</p>
                    <span class="light" style="text-transform: uppercase; font-size: 1.2rem;"><strong>{{$user->role}}</strong></span>
                    <br><br>
                    <div class="divider"></div>
                    <p class="light" style="font-size: 1em;"><strong>{{$downloads}}</strong> {{ trans("general.downloads") }}</p>
                    <div class="divider"></div>
                    <p class="light" style="font-size: 1em;"><strong>{{ trans("settings.timezone") }}</strong><br><br>UTC/GMT -05:00 {{$user->timezone}}</p>
                    <a href="{{ URL::previous() }}" class="btn btn-primary right hide-on-med-and-down">{{ trans("general.back") }}</a>
                </div>
            </div>
            <div class="col m3 l3"></div>
        </section>
    </div>
@stop