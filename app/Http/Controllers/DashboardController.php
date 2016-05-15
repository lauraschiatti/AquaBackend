<?php

namespace App\Http\Controllers;

use App\Downloads;
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

        $user = Auth::user();
        $mynodes = Nodes::where("user_id", "=", Auth::user()->id)->get()->count();
        $sensors = Sensors::all()->count();
        $nodes = Nodes::all()->count();
        $users = User::all()->count();
        $downloads = Downloads::all()->count();

        return view('layout.dashboard', compact('user', 'sensors', 'nodes','mynodes', 'users', 'downloads'));
    }
}
