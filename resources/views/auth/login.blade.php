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
</head>
<body>
<!-- === BOX === -->
<!-- Header -->
<div class="container">
    <div class="box-header">
        <img src="/img/brand-no-back.png" alt="brand">
    </div>
<!-- Content -->
<div class="box-content container">
    <p id="login_error">{{$error or ""}}</p>
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

            <!-- Buttons-->
            <div class="col s12 center" style="margin-top: 20px;">
                <a href="{{ url('register')}}" class="btn btn-primary primary waves-effect waves-light">Sign up</a>
                <button class="btn btn-secundary waves-effect waves-light">Sign in</button>
            </div>
    {!! Form::close() !!}

            <!-- Forgot -->
            <div class="col s12 center">
                <a class="light white-text" href="#">Forgot password?</a>
            </div>

        </div>
</div>
<!-- === BOX === -->

<div class="footer light">
    <p>Help? Try <a class="light" href="#"><strong>reading our wiki</strong></a> or
        <a class="light" href="#"><strong>contacting an human</strong></a></p>
</div>

<script src="/js/jq/jquery.min.js" type="text/javascript"></script>						<!-- Jquery core JS -->
<script src="/js/materialize.min.js" type="text/javascript"></script> 					<!-- Materialize core JS -->
</body>
</html>



