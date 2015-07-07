<?php

namespace App\Http\Controllers;

use App\SensorsByNode;
use Request;
use App\Http\Requests;
use App\Nodes;
use App\Sensors;
use App\SensorByNode;
use Illuminate\Support\Facades\Input;


class NodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $nodes=Nodes::all(); //json data
        return view('nodes.index',compact('nodes')); //pass json data to index view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $sensorsList = Sensors::all();
        $sensors = array();
        $finalSensor = array();
        $sensors_names = array();
        foreach($sensorsList as $sensor) {
            $finalSensor["name"] = $sensor->name;
            $finalSensor["type"] = $sensor->type;
            $finalSensor["unit"] = $sensor->unit;
            $finalSensor["range"] = $sensor->range;

            array_push($sensors, $finalSensor);
            array_push($sensors_names, $finalSensor["name"]);
        }

        return view('nodes.create', compact('sensors', 'sensors_names'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input=Request::all();

        $node = Nodes::where("name", "=", Input::get('name'))->first();

        if($node == null){
            Nodes::create($input);
            return redirect('nodes');
        }else{
            //@todo revisar que devolver en caso de que exista el node
            return $node;
        }

        $n = Nodes::where("name", "=", Input::get('name'))->first();
        $node_id = $n->id;

        $sensors_checked = $input["sensors"];

        foreach($sensors_checked as $sensor_checked){
            $sensorbynode = new SensorsByNode();
            $sensorbynode->node_id = $node_id;
            $sensor = Sensors::where("name", "=",$sensor_checked)->first();
            $sensorbynode->sensor_id = $sensor->id ;
            $sensorbynode->save();
        }

        //$try = SensorsByNode::all();
        //return $try;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $node=Nodes::find($id);
        $sensors = array();
        $sensorsbynode =  SensorsByNode::where("node_id", "=", $id)->get();
        foreach($sensorsbynode as $sensorbynode){
            $sensor_id = $sensorbynode->sensor_id;
            $sensor = Sensors::find($sensor_id);
            $sensor =(object)$sensor;
            array_push($sensors, $sensor->name);
        }
        return view('nodes.show',compact('node', 'sensors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $node=Nodes::find($id);

        $sensorsbynode =  SensorsByNode::where("node_id", "=", $id)->get();
        $sensors =array();

        foreach($sensorsbynode as $sensorbynode){
            $sensor_id = $sensorbynode->sensor_id;
            $sensor = Sensors::find($sensor_id);
            $sensor =(object)$sensor;
            array_push($sensors, $sensor);
        }

        return view('nodes.edit',compact('node', 'sensors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $nodeUpdate=Request::all();
        $node=Nodes::find($id);
        $node->update($nodeUpdate);
        return redirect('nodes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Nodes::find($id)->delete();
        return redirect('nodes');
    }
}
