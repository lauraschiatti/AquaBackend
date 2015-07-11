<!-- Login Page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="AquApp">
    <meta name="author" content="">
    <title> Login | AquAPP </title>

    <link href="/css/materialize.min.css" rel="stylesheet">               					           <!-- Materialize core CSS -->
    <link href="/css/log.css" rel="stylesheet">                         						           <!-- Log core CSS -->
    <link href="/font/icomoon/style.css" rel="stylesheet">                         				 <!-- Fonts core CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	 <!-- Material Icons -->
    <style>
        p{
            color: white;
            weight: strong;
            text-align: center;
        }
    </style>
</head>
<body class="container">
<!-- === BOX === -->
<!-- Header -->
<div class="box-header">
    <img src="/img/brand-no-back.png" alt="brand">
</div>
<!-- Content -->
<div class="box-content container">
    <p>{{$error or ""}}</p>
    <!-- Form -->
    {!! Form::open(['url' => 'adminlogin']) !!}
        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">person</i>
                <input id="icon_user" type="email" class="validate" name="email" id="email" required>
                <label for="icon_user">Email</label>
            </div>
            <br>
            <div class="input-field col s12" style="margin-bottom: 10px;">
                <i class="material-icons prefix">locked</i>
                <input id="icon_key" type="password" class="validate" name="password" id="password" required>
                <label for="icon_key">Password</label>
            </div>
        </div>

        <div class="row">
            <!-- Button Login -->
            <div class="col s12">
                <button class="right btn btn-primary waves-effect waves-light">Log in</button>
            </div>
            <!-- Modal Trigger -->
            <div class="col s12 center">
                <a class="light white-text modal-trigger" href="#help">Do you need any help?</a>
            </div>
        </div>
    {!! Form::close() !!}

</div>
<!-- === BOX === -->

<!-- === HELP === -->
<div id="help" class="modal">
    <!-- Header -->
    <div class="modal-header primary center">
        <img src="/img/brand-no-back.png" alt="brand">
        <!-- Floating -->
        <div class="gh fixed-action-btn">
            <a class="btn-floating">
                <span class="icon-github"></span>
            </a>
        </div>
        <div class="twt fixed-action-btn">
            <a class="btn-floating">
                <span class="icon-twitter"></span>
            </a>
        </div>
    </div>
    <!-- Content -->
    <div class="modal-content center container">
        <h4 class="light black-text">Need Help?</h4>
        <div class="divider"></div>
        <h5 class="light">Please contact our Support Team writting a twit to
            <a href="#" class="light blue-text">@AquApp</a>. If you are a developer
            you can contribute on our Github Repository by clicking on the following
            <a href="#" class="light blue-text">Project</a>.
        </h5>
    </div>
    <!-- === HELP === -->

    <script src="/js/jq/jquery.min.js" type="text/javascript"></script>						<!-- Jquery core JS -->
    <script src="/js/materialize.min.js" type="text/javascript"></script> 					<!-- Materialize core JS -->
    <script src="/js/init.js" type="text/javascript"></script> 					          <!-- Init core JS -->
</body>
</html>
