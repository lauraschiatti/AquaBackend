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
Route::get('/', function(){
    return view('layout.home');
});
Route::get('home', function(){
    return view('layout.home');
});

Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'HomeController@switchLanguage']);

Route::get('contribute', function(){
   return view('layout.contribute');
});

Route::get('team', 'TeamController@getTeam');

Route::get('terms', function(){
    return view('layout.terms');
});

//Graphs
Route::get('home/graph', 'GraphsController@getHomeGraph');

/*Route::get('contact', function(){
    return view('layout.contact');
});

Route::post('contact', 'UsersController@contact');*/

// Authentication routes
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

Route::group(['middleware' => 'auth'], function() {
    Route::get('settings/{id}', function($id){
        $user = \App\User::where("id", "=", $id)->first();
        if($user){
            $zones_array = array();
            $timestamp = time();
            foreach(timezone_identifiers_list() as $key => $zone) {
                date_default_timezone_set($zone);
                $zones_array[$key]['zone'] = $zone;
                $zones_array[$key]['diff_from_GMT'] = 'UTC/GMT ' . date('P', $timestamp);
            }

            $downloads = \App\Downloads::where('user_id', '=', $id)->get()->count();

            return view('layout.settings', compact('user', 'zones_array', 'downloads'));
        }else{
            return view('errors.404');
        }


    });

    Route::get('profile/settings/{id}', 'UsersController@getUserProfile');

    Route::get('dashboard', 'DashboardController@showData');

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

    //Data
    Route::get('data', 'DataController@chooseData');
    Route::get('data/table', 'DataController@showData');

    //Downloads
    Route::resource('downloads', 'DownloadsController');

    Route::get('dashboard/graph', 'GraphsController@getDashboardGraph');

    //Routes for testing
    Route::get('sensorsbynode', function(){
        return \App\SensorsByNode::all();
    });

    Route::get('timezone', function(){
        return config('app.timezone');
    });

    Route::get('downloads', function(){
        return \App\Downloads::all();
    });

});