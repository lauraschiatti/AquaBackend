<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
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
        $sensors = Sensors::all();

        if(!$sensors->isEmpty()){
            $sensors = null;
        }

        return view('sensors.index',compact('sensors'));
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
        //$input=Request::all();

        $unit =  trim(Input::get('unit'));
        $type = trim(Input::get('type'));

        $sensor = Sensors::where("type", "=", $type)
                         ->Where("unit", "=", $unit)
                         ->first();

        if($sensor == null){
            //Sensors::create($input);
            $newSensor = new Sensors();
            $newSensor->type = $type;
            $newSensor->unit = $unit;
            $newSensor->save();
            return redirect('sensors');
        }else{
            //return $sensor;
            return redirect('sensors/create')->with('error', ' TYPE-UNIT COMBINATION ALREADY EXISTS')
                                             ->with('type', $type)
                                             ->with('unit', $unit);
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
        /*$sensor = Sensors::where("id", "=", $id)->first();

        if($sensor) {
            return view('sensors.show', compact('sensor'));
        }else{
            abort(404);
        }*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
         $sensor = Sensors::where("id", "=", $id)->first();

         if($sensor){
            return view('sensors.edit',compact('sensor'));
         }else{
             return abort(404);
         }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $unit =  trim(Input::get('unit'));
        $type = trim(Input::get('type'));

        $sensor = Sensors::where("type", "=", $type)
                          ->Where("unit", "=", $unit)
                          ->Where("id", "!=", $id)
                          ->first();

        if($sensor == null){
            Sensors::where('id', '=', $id)->update(['type' => $type, 'unit' => $unit]);
            return redirect('sensors');
        }else{
            return redirect()->back()->with('error', ' TYPE-UNIT COMBINATION ALREADY EXISTS');
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
