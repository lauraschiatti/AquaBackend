@extends('layout.index')

@section('title')
    <title> AquApp | {{ trans("general.contribute") }} </title>
@stop

@section('content')
    <main>
        <!-- === HOME === -->
        <section class="section scrollspy primary" id="contribute">
            <div class="container white-text tittle">
                <h2 class="light">{{ trans("contribute.how can i contribute?") }}</h2>
                <h5 class="light">{{ trans("contribute.we've designed a") }}<strong>{{ trans("contribute.special place") }}</strong>{{ trans("contribute.for you") }}</h5>
                <p class="light">{{ trans("contribute.keep scrolling") }}</p>
            </div>
            <img id="screenshot" src="img/screenshot02.png" alt="..." width="988" height="370">
        </section>
        <!-- === HOME === -->

        <section class="center" id="lab">
            <h3>{{ trans("contribute.aqualab") }}</h3>
            <p class="light">{{ trans("contribute.a place") }}<span class="blue-text strong">{{ trans("contribute.feed the system.") }}</span></p>
            <div class="container">
                <div class="row">
                    <div class="col s12 m4">
                        <div>
                            <h3><i class="medium material-icons">flip_to_front</i></h3>
                            <h4 class="center">{{ trans("contribute.functional") }}</h4>
                            <p class="light">{{ trans("contribute.you can") }}</p>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div>
                            <h3><i class="medium material-icons">trending_up</i></h3>
                            <h4 class="center">{{ trans("general.dashboard") }} </h4>
                            <p class="light">{{ trans("contribute.follow real time") }} </p>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div>
                            <h3><i class="medium material-icons">swap_horiz</i></h3>
                            <h4 class="center">{{ trans("contribute.schema") }}</h4>
                            <p class="light">{{ trans("contribute.you can choose") }}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12 m4">
                        <div>
                            <h3><i class="medium material-icons">system_update_alt</i></h3>
                            <h4 class="center">{{ trans("contribute.download") }} </h4>
                            <p class="light">{{ trans("contribute.you can get") }}</p>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div>
                            <h3><i class="medium material-icons">portrait</i></h3>
                            <h4 class="center">{{ trans("general.users") }} </h4>
                            <p class="light">{{ trans("contribute.possible to add") }}</p>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div>
                            <h3><i class="medium material-icons">settings_ethernet</i></h3>
                            <h4 class="center">{{ trans("general.help &amp; feed") }}</h4>
                            <p class="light">{{ trans("contribute.have problems") }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- === WIKI | CONTACT === -->
        <section id="help">
            <div class="container divider"></div>
            <div class="center">
                <h4 class="light">{{ trans("contribute.got questions?") }} <span>{{ trans("contribute.got answers") }}</span></h4>
                <p class="light">{{ trans("contribute.a special place") }}<a href="" class="blue-light">{{ trans("contribute.faqs") }}</a>
                    {{ trans("contribute.app documentation") }}</p>
                <div class="buttons">
                    <a href="https://github.com/IngenieriaDeSistemasUTB/AquaBackend/wiki" class="btn btn-primary waves-effect waves-light">{{ trans("general.read our wiki") }}</a>
                    <a href="https://github.com/IngenieriaDeSistemasUTB/AquaBackend/issues/new"class="btn btn-secundary waves-effect waves-light">{{ trans("general.contact support") }}</a>
                </div>
            </div>
        </section>
        <!-- === WIKI | CONTACT === -->
    </main>
@stop