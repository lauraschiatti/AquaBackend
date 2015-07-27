@extends('layout.admin')

@section('title')
    <a href="#" class="mobile-tittle">Profile</a>
    <a href="{{ url('dashboard')}}" class="mobile-right"><i class="material-icons">close</i></a>
@stop

@section('content')

    <div class="desktop show row">
        <!-- Tittle -->
        <div class="linker"><p class="light">Dashboard > Settings </p></div>
        <h4 class="light">Profile Settings</h4>
        <div class="hide-on-med-and-down divider"></div>

            <div class="row" id="profile">
                <div class="col s12 m4 l4 center" id="main">
                    <img src="/img/face.jpg" alt="" class="circle" width="100px">
                    <ul class="light">
                        <li>{{$user->name}}</li>
                        <li>{{$user->email}}</li>
                        <li>{{$user->role}}</li>
                    </ul>

                </div>
                <div class="col s12 m8 l8 container" id="options">
                    @if (session('error'))
                        <div class="warning-box">
                            <p><i class="material-icons">highlight_off</i><span class="ups">Wops!</span>{{session('error')}}</p>
                        </div>
                    @endif
                    <br>

                    <!-- Form -->
                    {!! Form::model($user,[
                    'method' => 'PUT',
                    'route'=>['users.update',$user->id]
                    ]) !!}
                        <div class="input-field col s12">
                            <i class="material-icons prefix">person</i>
                            <input id="name" type="text" class="validate" name="name" value="{{$user->name}}">
                            <label for="name">Name</label>
                        </div>

                        <div class="input-field col s12">
                            <i class="material-icons prefix">verified_user</i>
                            <input id="last-pass" type="password" class="validate" name="last-pass">
                            <label for="last-pass">Last Password</label>
                        </div>

                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>
                            <input id="pass" type="password" class="validate" name="pass">
                            <label for="pass" data-error="hola">New Password</label>
                        </div>

                        <div class="input-field col s12">
                            <i class="material-icons prefix">vpn_key</i>
                            <input id="pass2" type="password" class="validate" name="pass2">
                            <label for="pass2">Repeat Password</label>
                        </div>

                        <div class="col s12">
                            <br>
                            <label>Select new timezone</label>
                            <div class="input-field col s12">
                                <select name="timezone" class="browser-default">
                                    <option value="{{$user->timezone}}">UTC/GMT -05:00 {{$user->timezone}}</option>
                                    @foreach($zones_array as $t)
                                        <option value="{{$t['zone']}}">{{$t['diff_from_GMT'] . ' - ' . $t['zone']}}</option>
                                    @endforeach
                                </select>
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

                </div>
            </div>
   </div>
@stop