<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Sensors;
use Illuminate\Support\Facades\Input;

class SensorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sensors=Sensors::all(); //json data
        return view('sensors.index',compact('sensors')); //pass json data to index view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('sensors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input=Request::all();

        $sensor = Sensors::where("name", "=", Input::get('name'))->first();

        if($sensor == null){
            Sensors::create($input);
            return redirect('sensors');
        }else{
            //@todo revisar que devolver en caso de que exista el sensor
            //return $sensor;
            return redirect('sensors/create')->with('error', 'Sensor already exists');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $sensor=Sensors::find($id);
        return view('sensors.show',compact('sensor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $sensor=Sensors::find($id);
        return view('sensors.edit',compact('sensor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $sensorUpdate=Request::all();

        $check =  Sensors::where("name", "=", Input::get('name'))->first();

        if($check->id != $id){
            //@todo existe el sensor
            return "el nodo ya existe";
        }else{
            $sensor=Sensors::find($id);
            $sensor->update($sensorUpdate);
            return redirect('sensors');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Sensors::find($id)->delete();
        return redirect('sensors');
    }
}
