@extends('layout.admin')

@section('title')
    <a href="#" class="mobile-tittle">Settings</a>
    <a href="{{ url('dashboard')}}" class="mobile-right"><i class="material-icons">close</i></a>
@stop

@section('content')
    <div class="desktop row">
        <!-- Tittle -->
        <div class="linker"><p class="light">Dashboard > Settings </p></div>
        <h4 class="light">Profile Settings</h4>
        <div class="hide-on-med-and-down divider"></div>

        <main>
            <section class="row" id="profile">
                <div class="col m3 l3"><br></div>
                <div class="col s12 m6 l6">
                    <div class="center" style="color: #000000;">
                        <img class="circle" src="/img/face.jpg" alt=""/>
                        <h5 style=" font-size: 2rem;"><strong>{{$user->name}}</strong></h5>
                        <p class="light" style="font-size: 1.4rem;">{{$user->email}}</p>
                        <span class="light" style="text-transform: uppercase; font-size: 1.4rem;"><strong>{{$user->role}}</strong></span>
                        <br><br>
                        <div class="divider"></div>
                        <br>
                        <p class="light" style="font-size: 1.2rem;"><strong>100</strong> Downloads</p>
                        <br>
                        <div class="divider"></div>
                        <br><p class="light" style="font-size: 1.2rem;"><strong>Timezone</strong><br><br>UTC/GMT -05:00 {{$user->timezone}}</p>
                    </div>
                </div>
                <div class="col m3 l3"></div>
            </section>
            <a href="{{ url('users')}}" class="btn btn-primary right hide-on-med-and-down">Back</a>
        </main>
    </div>
@stop