<!-- Register Page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="AquApp">
    <meta name="author" content="">
    <title> AquApp | Sign up </title>

    <link href="/css/materialize.min.css" rel="stylesheet">               					           <!-- Materialize core CSS -->
    <link href="/css/reg.css" rel="stylesheet">                         						           <!-- Reg core CSS -->
    <link href="/css/materialicons.css" rel="stylesheet">	 <!-- Material Icons -->
</head>
<body>
<header>
    <nav class="primary" role="navigation">
        <div class="nav-wrapper">
            <a href="#" class="brand hide-on-small-only"><img src="/img/brand.png" alt="..."/></a>
            <ul class="right hide-on-small-only">
                <li><a href="{{ url('login')}}">Have an account? <span><strong>Log in</strong></span></a></li>
            </ul>
        </div>
    </nav>
</header>

<main>
    <div class="content center white-text">
        <h4 class="light">Create New User</h4>
        <form class="row white-text">

            <div class="input-field col s12">
                <i class="material-icons prefix">person</i>
                <input id="name" type="text" class="validate" required>
                <label for="name">Name</label>
            </div>

            <div class="input-field col s12">
                <i class="material-icons prefix">email</i>
                <input id="email" type="email" class="validate" required>
                <label for="email">Email</label>
            </div>

            <div class="input-field col s12">
                <i class="material-icons prefix">lock</i>
                <input id="pass" type="password" class="validate" required>
                <label for="pass">Password</label>
            </div>

            <div class="input-field col s12">
                <i class="material-icons prefix">vpn_key</i>
                <input id="pass2" type="password" class="validate" required>
                <label for="pass2">Repeat Password</label>
            </div>

            <div class="col s12 white-text">
                <p class="center">
                    <input type="checkbox" id="check" required/>
                    <label for="check">I'm agree with Terms &#38; Conditions</label>
                </p>
            </div>


            <div class="input-field col s12">
                <button type="submit" class="waves-effect waves-dark btn btn-primary">Sign in</button>
            </div>

        </form>
    </div>

</main>

<footer class="page-footer">
    <div class="left">
        <a class="light">© 2015 All rights reserved</a>
    </div>
    <div class="right">
        <a href="#!">Wiki</a>
        <a href="#!">Contact us</a>
        <a href="#!">Terms</a>
    </div>
</footer>


<script src="/js/jq/jquery.min.js" type="text/javascript"></script>						<!-- Jquery core JS -->
<script src="/js/materialize.min.js" type="text/javascript"></script> 					<!-- Materialize core JS -->
</body>
</html>
