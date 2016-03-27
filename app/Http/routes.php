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

Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'HomeController@switchLanguage']);

Route::get('home', function () {
    return view('layout.home');
});

Route::get('contribute', function(){
   return view('layout.contribute');
});

Route::get('team', 'TeamController@getTeam');

Route::get('terms', function(){
    return view('layout.terms');
});

Route::get('contact', function(){
    return view('layout.contact');
});

Route::post('contact', 'UsersController@contact');

Route::get('dashboard', 'DashboardController@showData');

Route::get('settings/{id}', function($id){
    $user = \App\User::where("id", "=", $id)->first();

    $zones_array = array();
    $timestamp = time();
    foreach(timezone_identifiers_list() as $key => $zone) {
        date_default_timezone_set($zone);
        $zones_array[$key]['zone'] = $zone;
        $zones_array[$key]['diff_from_GMT'] = 'UTC/GMT ' . date('P', $timestamp);
    }

    return view('layout.settings', compact('user', 'zones_array'));
});

Route::get('profile/settings/{id}', function($id){
    $user = \App\User::where("id", "=", $id)->first();

    return view('layout.user_settings', compact('user'));
});

// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
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

//Sync random generated data routes
Route::get('sync/{data}', 'SyncController@postData');

Route::resource('data', 'DataController');

//Downloads
Route::resource('downloads', 'DownloadsController');

//Routes for testing
Route::get('sensorsbynode', function(){
    return \App\SensorsByNode::all();
});

Route::get('timezone', function(){
    return config('app.timezone');
});

Route::get('messages', function(){
    return \App\Contact::all();
});

Route::get('date', function(){
    return \App\Data::all();
});


Route::get('users', function(){
    return \App\User::all();
});