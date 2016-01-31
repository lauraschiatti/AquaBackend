<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Change app locale config variable
     */
    public function switchLanguage($language){
        if (array_key_exists($language, Config::get('languages'))) {
            Session::set('applocale', $language);
        }
        return back();
    }
}
