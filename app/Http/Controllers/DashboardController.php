<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Nodes;
use App\Sensors;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display data in dashboard
     */
    public function showData(){

        if(Auth::check()){
            $user = Auth::user();
        }else{
            $user = "user";
        }

        if(Auth::check()){
            $mynodes = Nodes::where("user_id", "=", Auth::user()->id)->get()->count();
        }else{
            $mynodes = 0;
        }

        if (Sensors::all()->count() == null){
            $sensors = 0;
        }else{
            $sensors = Sensors::all()->count();
        }

        $nodes = Nodes::all()->count();

        if ($nodes == null){
            $nodes = 0;
        }

        $users = User::all()->count();

        if ($users == null){
            $users = 0;
        }

        return view('layout.dashboard', compact('user', 'sensors', 'nodes','mynodes','users'));
    }
}
