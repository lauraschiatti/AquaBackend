<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Redirect;
use Request;
use App\Http\Requests;
use App\Nodes;
use App\Sensors;
use App\SensorsByNode;
use Illuminate\Support\Facades\Input;
use Auth;

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
        $sensors = Sensors::all();
        $sensors_types_by_unit = array();
        $sensors_types = array();

        foreach($sensors as $sensor){
            if(in_array($sensor->type, $sensors_types_by_unit)){

            }else{
                array_push($sensors_types_by_unit,$sensor->type);
                array_push($sensors_types,$sensor->type);
            }
        }

        foreach($sensors as $sensor){
            $sensors_types_by_unit[$sensor->type][] = $sensor->unit;
        }

        return view('nodes.create', compact('sensors_types', 'sensors_types_by_unit'));

        //return $sensors_types;

        /*if($sensorsList == null){
            $sensors_names = "";
        }else{
            $sensors = array();
            $finalSensor = array();
            //$sensors_names = array();
            foreach($sensorsList as $sensor) {
                $finalSensor["name"] = $sensor->name;
                $finalSensor["type"] = $sensor->type;
                $finalSensor["unit"] = $sensor->unit;
                $finalSensor["range"] = $sensor->range;

                array_push($sensors, $finalSensor);
                //array_push($sensors_names, $finalSensor["name"]);
            }
        }*/

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $sensors_data = Request::all();

        $name = trim(Input::get('name'));
        $latitude =  trim(Input::get('latitude'));
        $longitude = trim(Input::get('longitude'));

        $node = Nodes::where("name", "=", $name)->first();

        if($node == null){
            $newNode = new Nodes();
            $newNode->name = $name;
            $newNode->latitude = $latitude;
            $newNode->longitude = $longitude;

            if(Auth::check()){
                $newNode->user_id = Auth::user()->id;
            }

            $newNode->save();

            //sensors in that node
            $sensors_names = $sensors_data["sensors_units"];

            $sensors_numbers = $sensors_data["sensors_number"];
            //convert to int
            foreach ($sensors_numbers as $key => $var) {
                $sensors_numbers[$key] = (int)$var;
            }

            $sensors = array();

            $i = 0;
            while ($i < count($sensors_names)){
                $j = 0;
                while ($j < $sensors_numbers[$i]) {
                    array_push($sensors, $sensors_names[$i]);
                    $j++;
                }
                $i++;
            }

            return Redirect::route('order')->with('data', $sensors)
                                           ->with('id', $newNode->id)
                                           ->with('name', $newNode->name)
                                           ->with('latitude', $newNode->latitude)
                                           ->with('longitude', $newNode->longitude);
            //return $sensors;
            //return $sensors_data;
            //return $newNode;

        }else{
            return redirect('nodes/create')->with('error', 'NODE NAME EXISTS')
                ->with('name', $name)
                ->with('latitude', $latitude)
                ->with('longitude', $longitude);
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
        $node=Nodes::find($id);

        $sensors = array();
        $sensorsbynode =  SensorsByNode::where("node_id", "=", $id)->get();

        $i = 0;
        foreach($sensorsbynode as $sensorbynode) {
            $sensor_id = $sensorbynode->id;
            $sensor_type_id = $sensorbynode->sensor_type_id;
            $sensor = Sensors::find($sensor_type_id);

            $sensors[$i]["id"] = $sensor_id;
            $sensors[$i]["type"] = $sensor["type"];
            $sensors[$i]["unit"] = $sensor["unit"];
            $i++;
        }
        $size = count($sensors);

        $user =  User::where("id", "=", $node->user_id)->first();

        //return $sensors;
        return view('nodes.show',compact('node', 'sensors', 'size', 'user'));
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
            $sensor_id = $sensorbynode->sensor_type_id;
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

        $check =  Nodes::where("name", "=", Input::get('name'))->first();

        if($check->id != $id){
            //@todo existe el nodo
            return "el nodo ya existe";
        }else{
            $node=Nodes::find($id);
            $node->update($nodeUpdate);
            return redirect('mynodes');
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
        Nodes::find($id)->delete();

        //@todo eliminar sensores del nodo
        if(Auth::check() && Auth::user()->role == 'superadmin'){
            return redirect('nodes');
        }else{
            return redirect('mynodes');
        }

    }

    /*
     * Show only the user´s nodes
     */
    public function getMyNodes(){
        if(Auth::check()){
            $nodes=Nodes::where("user_id", "=", Auth::user()->id)->get();//json data

        }else{
            $nodes = null;
        }
        return view('nodes.mynodes',compact('nodes')); //pass json data to index view

    }

    public function saveSensorsByNode(){
        // Getting all post data
        if(Request::ajax()) {
            $data = Input::all();
            //print_r($data);die;

            $sensors_order = $data["order"];
            $node_id = $data["node_id"];
            $sensors_order = explode(',', $sensors_order);

            //save sensors in a node
            //$try =  array();
            $i = 0;
            while($i < count($sensors_order)){
                $sensor = Sensors::where('unit', '=', $sensors_order[$i])->first();
                $sensor_id = $sensor->id;

                $newSensorByNode = new SensorsByNode();
                $newSensorByNode->node_id = $node_id;
                $newSensorByNode->sensor_type_id = $sensor_id;
                $newSensorByNode->weight = $i;
                $newSensorByNode->save();

                $i++;
            }
            die;

        }
        return redirect('mynodes');
        //return SensorsByNode::all();
    }

    public function getSensorsByNode(){
        return SensorsByNode::all();
    }
}