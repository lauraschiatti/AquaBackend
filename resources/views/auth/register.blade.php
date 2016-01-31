<!-- Register Page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="AquApp">
    <meta name="author" content="">
    <title> AquApp | {{ trans('general.sign up') }} </title>

    <link href="/css/materialize.min.css" rel="stylesheet">               					           <!-- Materialize core CSS -->
    <link href="/css/reg.css" rel="stylesheet">                         						           <!-- Reg core CSS -->
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

    <script>
        function validateIfChecked(checkbox) {
            if (checkbox.checked)
                document.getElementById('register_button').disabled = false;
            else
                document.getElementById('register_button').disabled = true;
        }
    </script>
</head>
<body>
<header>
    <nav class="primary" role="navigation">
        <div class="nav-wrapper">
            <a href="{{ url('/')}}" class="brand hide-on-small-only"><img src="/img/brand.png" alt="..."/></a>
            <ul class="right hide-on-small-only">
                <li><a href="{{ url('login')}}">{{ trans('register.have an account') }}<span><strong>{{ trans('general.login') }}</strong></span></a></li>
            </ul>
        </div>
    </nav>
</header>

<main>
    <div class="content center white-text">
        <h4 class="light">{{ trans('register.create new user') }}</h4>
        <p id="login_error">{{$error or ""}}</p>
        <!-- Form -->
        {!! Form::open(['url' => 'register', 'class' => 'row white-text', 'id' => 'register']) !!}
        <div class="input-field col s12">
            <i class="material-icons prefix">person</i>
            <input id="name" type="text" class="validate" name="name" value="{{$name or ""}}" required>
            <label for="name">{{ trans('general.name') }}</label>
        </div>

        <div class="input-field col s12">
            <i class="material-icons prefix">email</i>
            <input id="email" type="email" class="validate" name="email" value="{{$email or ""}}" required>
            <label for="email">{{ trans('general.email') }}</label>
        </div>

        <div class="input-field col s12">
            <i class="material-icons prefix">lock</i>
            <input id="pass" type="password" class="validate" name="pass" required>
            <label for="pass">{{ trans('general.password') }}</label>
        </div>

        <div class="input-field col s12">
            <i class="material-icons prefix">vpn_key</i>
            <input id="pass2" type="password" class="validate" name="pass2" required>
            <label for="pass2">{{ trans('general.repeat password') }}</label>
        </div>

        <div class="col s12 white-text">
            <p class="center">
                <input type="checkbox" id="check" onChange="validateIfChecked(this);" checked/>
                <label for="check">{{ trans('register.agree with') }} <a href="{{ url('terms')}}" class="white-text"><strong>{{ trans('register.terms and conditions') }}</strong></a></label>
            </p>
        </div>

        <div class="input-field col s12">
            <button type="submit" id="register_button" class="waves-effect waves-dark btn btn-primary">{{ trans('general.sign up') }}</button>
        </div>
        {!! Form::close() !!}
    </div>
</main>

<footer class="page-footer hide-on-small-only">
    <div class="left">
        <a class="light">{{ trans('general.all rights reserved') }}</a>
    </div>
    <div class="right">
        <a href="#!">Wiki</a>
        <a href="{{ url('contact')}}">{{ trans('general.contact') }}</a>
        <a href="{{ url('terms')}}">{{ trans('general.terms') }}</a>
    </div>
</footer>

<script src="/js/jq/jquery.min.js" type="text/javascript"></script>						<!-- Jquery core JS -->
<script src="/js/materialize.min.js" type="text/javascript"></script> 					<!-- Materialize core JS -->
</body>
</html>
