<!-- Login Page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="AquApp">
    <meta name="author" content="">
    <title> AquApp | Sign in </title>

    <link href="/css/materialize.min.css" rel="stylesheet">               					           <!-- Materialize core CSS -->
    <link href="/css/log.css" rel="stylesheet">                         						           <!-- Log core CSS -->
    <link href="/css/materialicons.css" rel="stylesheet">	 <!-- Material Icons -->

    <!--favicon-->
    <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
<!-- === BOX === -->
<!-- Header -->
<div class="container">
    <div class="box-header">
        <img src="/img/brand-no-back.png" alt="brand">
    </div>
</div>
<!-- Content -->
<div class="box-content container">
    <p id="alert">{{$error or ""}}</p>
    <!-- Form -->
    {!! Form::open(['url' => 'login', 'class' => 'white-text']) !!}
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">person</i>
                <input type="email" class="validate" name="email" id="email" required>
                <label for="email">Email</label>
            </div>
            <br>
            <div class="input-field col s12">
                <i class="material-icons prefix">lock</i>
                <input type="password" class="validate" name="password" id="password" required>
                <label for="password">Password</label>
            </div>

            <!-- Remember -->
            <!--<div class="col s12 white-text">
                <p class="left">
                    <input type="checkbox" name="remember" value="true" id="remember"/>
                    <label for="remember">Remember me</label>
                </p>
            </div>-->

            <!-- Forgot -->
            <div class="col s12 center">
                <a class="light white-text" href="#">Forgot password?</a>
                <br>
                <button class="btn btn-secundary waves-effect waves-light" style="margin-top: 20px;">Log in</button>
            </div>

            <!-- Buttons-->
            <div class="center">
                <!--<a href="{{-- url('register')--}}" class="btn btn-primary primary waves-effect waves-light">Sign up</a>-->
                <br><a class="light white-text" href="{{ url('register')}}">Don´t have an account? <span><strong>Sign up for AquAPP</strong></span></a>
            </div>


    {!! Form::close() !!}


        </div>
</div>
<!-- === BOX === -->

<div class="footer light">
    <p>Help? Try <a class="light" href="#"><strong>reading our wiki</strong></a> or
        <a class="light" href="{{ url('contact')}}"><strong>contacting a human</strong></a></p>
</div>

<script src="/js/jq/jquery.min.js" type="text/javascript"></script>						<!-- Jquery core JS -->
<script src="/js/materialize.min.js" type="text/javascript"></script> 					<!-- Materialize core JS -->
</body>
</html>
