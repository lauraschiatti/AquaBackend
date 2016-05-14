@extends('errors.errors')

@section('title')
    <title> Error 401 </title>
@stop

@section('css')
    <link href="/css/log.css" rel="stylesheet">
    <style>
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
                <h4>401 - {{ trans("general.access not granted") }}</h4><br><br>

                <a href="{{ URL::previous() }}" class="btn btn-secundary">{{ trans("general.back") }}</a>
            </div>
        </div>
    </section>
@stop

