<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    /**
     * Get providers
     */
    public function getTeam(){

        $providers = User::where("role", "=", "provider")->get();

        $num_providers = count($providers);

        return view('layout.team', compact('providers', 'num_providers'));
    }
}
