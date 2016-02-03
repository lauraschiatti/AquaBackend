@extends('layout.admin')

@section('title')
    <a href="#" class="mobile-tittle">{{ trans("general.settings") }}</a>
    <a href="{{ url('dashboard')}}" class="mobile-right"><i class="material-icons">close</i></a>
@stop

@section('content')

    <div class="desktop show row">
        <!-- Tittle -->
        <div class="linker"><p class="light">{{ trans("general.dashboard") }} > {{ trans("general.settings") }} </p></div>
        <h4 class="light">{{ trans("settings.profile settings") }}</h4>
        <div class="hide-on-med-and-down divider"></div>

        <section id="profile">
            <div class="row col s12">
                <!-- Left -->
                <div class="col s12 m4 l4">
                    <div class="center">
                        <br><br><br>
                        <img id="profile_pic" class="circle" src="/img/face.jpg" alt=""/>
                        <h5>{{$user->name}}</h5>
                        <h6 class="light">{{$user->email}}</h6>
                        <span class="light" style="text-transform: uppercase;"><strong>{{$user->role}}</strong></span>
                        <br><br>
                        <div class="divider"></div>
                        <br>
                        <h6 class="light"><strong>100</strong> {{ trans("general.downloads") }}</h6>
                        <br>
                        <div class="divider"></div>
                        <br>

                        {!! Form::open(['method' => 'DELETE', 'route'=>['users.destroy', $user->id]])!!}
                            <button type="submit" class="btn btn-medium waves-effect waves-light red"><i class="material-icons">delete</i></button>
                        {!! Form::close() !!}
                    </div>
                </div>

                <!-- Right -->
                <div class="col s12 m8 l8" id="right">
                    @if (session('error'))
                        <div class="warning-box">
                            <p><i class="material-icons">highlight_off</i><span class="ups">Wops!</span>{{session('error')}}</p>
                        </div>
                    @endif
                    <br><br>


                    <!-- Form -->
                    {!! Form::model($user,[
                    'method' => 'PUT',
                    'route'=>['users.update',$user->id]
                    ]) !!}
                    <div class="input-field col s12">
                        <i class="material-icons prefix">person</i>
                        <input id="name" type="text" class="validate" name="name" value="{{$user->name}}">
                        <label for="name">{{ trans("general.name") }}</label>
                    </div>
                    <br><br>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">verified_user</i>
                        <input id="last-pass" type="password" class="validate" name="last-pass">
                        <label for="last-pass">{{ trans("settings.last password") }}</label>
                    </div>

                    <div class="input-field col s12">
                        <i class="material-icons prefix">lock</i>
                        <input id="pass" type="password" class="validate" name="pass">
                        <label for="pass">{{ trans("settings.new password") }}</label>
                    </div>

                    <div class="input-field col s12">
                        <i class="material-icons prefix">vpn_key</i>
                        <input id="pass2" type="password" class="validate" name="pass2">
                        <label for="pass2">{{ trans("settings.repeat password") }}</label>
                    </div>

                    <div class="col s12">
                        <br>
                        <label>{{ trans("settings.select new timezone") }}</label>
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

                    <!-- FLOATING BUTTONS -->
                    <div class="fixed-action-btn" id="cancel">
                        <a href="{{ url('dashboard')}}" class="btn-floating btn-large waves-effect waves-circle waves-light">
                            <i class="large material-icons">close</i>
                        </a>
                    </div>
                    <!-- FLOATING BUTTONS -->
                </div>

            </div>
        </section>

   </div>
@stop