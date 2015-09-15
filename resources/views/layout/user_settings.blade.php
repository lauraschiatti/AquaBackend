<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="AquApp">
    <meta name="author" content="">
    <title> AquApp | Profile </title>

    <link href="/css/materialize.min.css" rel="stylesheet">               					           <!-- Materialize core CSS -->
    <link href="/css/site.css" rel="stylesheet">                         						         <!-- Site core CSS -->
    <link href="/css/materialicons.css" rel="stylesheet">	 <!-- Material Icons -->
</head>
<body>

<!-- Dropdown Structure -->
<!--
<ul id="dropdown1" class="dropdown-content">
  <li><a href="index.html">Home</a></li>
  <li><a href="index.html">About</a></li>
  <li><a href="contribute.html">Contribute</a></li>
  <li><a href="#">Team</a></li>
  <li><a href="#">Wiki</a></li>
</ul>-->


<!-- === NAVBAR === -->
<header class="primary">
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand hide-on-med-and-down"><img src="/img/brand.png" alt="..."/></a>
                <a href="#" data-activates="mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
                <!--
                      <ul class="right hide-on-med-and-down">
                         <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons right">arrow_drop_down</i>Contact</a></li>
                      </ul>-->

                <ul class="side-nav center" id="mobile">
                    <section class="menu-header">
                        <img src="/img/brand-no-back.png" alt="...">
                    </section>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Contribute</a></li>
                    <li><a href="#">Team</a></li>
                    <li><a href="#">Wiki</a></li>
                    <li><a href="#">Contact</a></li>
                    <div class="divider"></div>
                    <li><a href="#">Sign up</a></li>
                    <li><a href="#">Login</a></li>

                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- === NAVBAR === -->

<main>
    <section class="row primary" id="profile">

        <div class="row col s12">
            <!-- Left -->
            <div class="col s12 m4 l4">
                <div class="center white-text">
                    <img class="circle" src="/img/face.jpg" alt=""/>
                    <h5>{{$user->name}}</h5>
                    <h6 class="light">{{$user->email}}</h6>
                    <span class="light" style="text-transform: uppercase;"><strong>{{$user->role}}</strong></span>
                    <div class="divider"></div>
                    <h6 class="light"><strong>100</strong> Downloads</h6>
                    <div class="divider"></div>

                    {!! Form::open(['method' => 'DELETE', 'route'=>['users.destroy', $user->id]])!!}
                    <button type="submit" class="btn btn-medium waves-effect waves-light red"><i class="material-icons">delete</i></button>
                    {!! Form::close() !!}
                </div>
            </div>

            <!-- Right -->
            <div class="col s12 m8 l8 white-text" id="right">
                @if (session('error'))
                    <p><i class="material-icons">highlight_off</i>{{session('error')}}</p>
                @endif
                <br><br>


                <!-- Form -->
                {!! Form::model($user,[
                'method' => 'PUT',
                'route'=>['users.update',$user->id]
                ])!!}
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

                    <div class="input-field col s12">
                        <button type="submit" class="btn btn-secundary waves-effect waves-light"><strong>Save</strong></button>
                        <a class="btn btn-flat waves-effect waves-light" href="{{url('/')}}">Cancel</a>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
</main>

<script type="text/javascript" src="/js/jq/jquery.min.js"></script>						<!-- Jquery core JS -->
<script src="/js/materialize.min.js" type="text/javascript"></script> 					<!-- Materialize core JS -->
<script src="/js/init.js" type="text/javascript"></script> 					          <!-- Init core JS -->
</body>
</html>
