<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('layout.home');
});

Route::get('app', function () {
    return view('layout.app');
});

Route::get('dashboard', function () {
    return view('layout.dashboard');
});

// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route:post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

Route::resource('users', 'UsersController');

Route::resource('nodes', 'NodesController');

Route::get('sensorsorder', ['as' => 'order', function(){
    return view('nodes.sensors_order');
}]);

Route::post('sensorsorder', 'NodesController@saveSensorsByNode');

Route::get('sensorsorderupdate', ['as' => 'order_update', function(){
    return view('nodes.sensors_order_update');
}]);

Route::post('sensorsorderupdate', 'NodesController@updateSensorsByNode');

Route::get('mynodes', 'NodesController@getMyNodes');

Route::resource('sensors', 'SensorsController');

Route::resource('sensorsbynode', 'SensorsByNodeController');


