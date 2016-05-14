@extends('errors.errors')

@section('title')
    <title> Error 401 </title>
@stop

@section('css')
    <link href="/css/log.css" rel="stylesheet">
    <style>
        #options li:before {
            content: "• ";
            color: white;
            list-style-type:circle;
        }

        #options a{
            color: white;
            font-weight: 300;
        }

        #error {
            width: 60%;
            height: 80vh;
            text-align: center;
            margin: 0 20%;
            font-weight: lighter;
        }
    </style>
@stop

@section('content')
    <section class="primary section" id="error">
        <div class="col s6 offset-s3">
            <div class="box-header">
                <img src="/img/brand-no-back.png" alt="brand">
            </div>
            <div class="container white-text">
                <h4>404 - {{ trans("general.page not found") }}</h4>
                <p>{{ trans("general.things you can try") }}</p>
                <ul id="options">
                    <li><a href="{{ URL::previous() }}">{{ trans("general.go back") }}</a> {{ trans("general.and try another way") }}</li>
                    <li>{{ trans("general.use the navigation above") }}</li>
                    <li>{{ trans("general.head to the") }} <a href="{{'/'}}">{{ trans("general.home") }}</a></li>
                </ul>
            </div>
        </div>
    </section>
@stop



