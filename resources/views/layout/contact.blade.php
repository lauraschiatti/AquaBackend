<!-- Contribute Page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="AquApp">
    <meta name="author" content="">
    <title> AquApp | Contact </title>

    <link href="/css/materialize.min.css" rel="stylesheet">               					           <!-- Materialize core CSS -->
    <link href="/css/site.css" rel="stylesheet">                         						         <!-- Site core CSS -->
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

<!-- === NAVBAR === -->
<header class="primary">
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="{{ url('/')}}" class="brand hide-on-med-and-down"><img src="/img/brand.png" alt="..."/></a>
                <a href="#" data-activates="mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>

                <ul class="right hide-on-med-and-down">
                    <li><a href="{{ url('/')}}" class="grow">Back Home</a></li>
                </ul>

                <ul class="side-nav center" id="mobile">
                    <section class="menu-header">
                        <img src="/img/brand-no-back.png" alt="...">
                    </section>
                    <li><a href="{{ url('/')}}">Home</a></li>
                    <li><a href="{{ url('contribute')}}">Contribute</a></li>
                    <li><a href="#">Team</a></li>
                    <li><a href="#">Wiki</a></li>
                    <li><a href="{{ url('contact')}}">Contact</a></li>
                    <div class="divider"></div>
                    <li><a href="{{ url('register')}}">Sign up</a></li>
                    <li><a href="{{ url('login')}}">Login</a></li>

                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- === NAVBAR === -->

<main>
    <section  class="primary" id="contact">
        <div class="row col s12 center container white-text">
            <h2 class="light">Contact us</h2>
            <h5 class="light">Drop us some <strong>lines</strong></h5>

            <div class="container">
                <div class="row">
                    <!-- Form -->
                    {!! Form::open(['url' => 'contact']) !!}
                        <div class="input-field col s12">
                            <i class="material-icons prefix">person</i>
                            <input id="name" type="text" name="sender_name" class="validate" required>
                            <label for="name">Name</label>
                        </div>

                        <div class="input-field col m6 s12">
                            <i class="mdi-content-mail prefix"></i>
                            <input id="email" type="email" class="validate" name="sender_email" required>
                            <label for="email">Email</label>
                        </div>

                        <div class="input-field col m6 s12">
                            <select name="type" required>
                                <option value="general_purpose">Say hello!</option>
                                <option value="be_provider">Be provider</option>
                                <option value="report_bug">Report a bug</option>
                            </select>
                            <label>I'm writting to..</label>
                        </div>

                        <div class="input-field col m12 s12">
                            <i class="material-icons prefix">mode_edit</i>
                            <textarea id="icon_prefix2" class="materialize-textarea" class="validate" name="message" required></textarea>
                            <label for="icon_prefix2">Write your message</label>
                        </div>

                        <div class="col s12">
                            <p class="right-align"><button class="btn btn-primary waves-effect waves-light" type="submit">Send Message</button></p>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
</main>
<script type="text/javascript" src="/js/jq/jquery.min.js"></script>						<!-- Jquery core JS -->
<script src="/js/materialize.min.js" type="text/javascript"></script> 					<!-- Materialize core JS -->
<script src="/js/init.js" type="text/javascript"></script> 					          <!-- Init core JS -->
</body>
</html>
