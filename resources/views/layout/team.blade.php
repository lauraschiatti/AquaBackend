@extends('layout.index')

@section('title')
    <title> AquApp | {{ trans("general.contribute") }} </title>
@stop


@section('content')
    <!-- === TEAM === -->
    <section class="center"><br>
        <h2 class="light">{{ trans("team.meet the team") }}</h2>

        <div class="row cards">
            <div class="tcard col s12 m3 l2 center">
                <img src="/img/face.jpg" alt="" />
                <h3>Laura Schiatti</h3>
                <h5 class="light">{{ trans("team.back-end developer") }}</h5>
            </div>
            <div class="tcard col s12 m3 l2 center">
                <img src="/img/face.jpg" alt="" />
                <h3>Yefferson Marín</h3>
                <h5 class="light">{{ trans("team.front-end developer") }}</h5>
            </div>
            <div class="tcard col s12 m3 l2 center">
                <img src="/img/face.jpg" alt="" />
                <h3>Juan Martínez</h3>
                <h5 class="light">{{ trans("team.investigator") }}</h5>
            </div>
            <div class="tcard col s12 m3 l2 center">
                <img src="/img/face.jpg" alt="" />
                <h3>Oscar Acevedo</h3>
                <h5 class="light">{{ trans("team.investigator") }}</h5>
            </div>
            <div class="tcard col s12 m3 l2 center">
                <img src="/img/face.jpg" alt="" />
                <h3>Jairo Serrano</h3>
                <h5 class="light">{{ trans("team.investigator") }}</h5>
            </div>
        </div>
        <!-- === HOME === -->

        <!-- === WIKI | CONTACT === -->
        <section id="help">
            <div class="container divider"></div>
            <div class="center">
                <h4 class="light">{{ trans("contribute.got questions?") }} <span>{{ trans("contribute.got answers") }}</span></h4>
                <p class="light">{{ trans("contribute.a special place") }}<a href="" class="blue-light">{{ trans("contribute.faqs") }}</a>
                    {{ trans("contribute.app documentation") }}</p>
                <div class="buttons">
                    <a href="https://github.com/IngenieriaDeSistemasUTB/AquaBackend'" class="btn btn-primary waves-effect waves-light">{{ trans("general.read our wiki") }}</a>
                    <a href="https://github.com/IngenieriaDeSistemasUTB/AquaBackend/issues/new"class="btn btn-secundary waves-effect waves-light">{{ trans("general.contact support") }}</a>
                </div>
            </div>
        </section>
        <!-- === WIKI | CONTACT === -->
    </section>
@stop