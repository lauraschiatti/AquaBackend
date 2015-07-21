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
            return redirect('nodes/create')->with('error', ' NODE NAME EXISTS')
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

        $sensors_array = array();
        $sensorsbynode =  SensorsByNode::where("node_id", "=", $id)->get();

        $i = 0;
        foreach($sensorsbynode as $sensorbynode) {
            $sensor_id = $sensorbynode->id;
            $sensor_type_id = $sensorbynode->sensor_type_id;
            $sensor = Sensors::find($sensor_type_id);

            $sensors_array[$i]["id"] = $sensor_id;
            $sensors_array[$i]["type"] = $sensor["type"];
            $sensors_array[$i]["unit"] = $sensor["unit"];
            $i++;
        }


        $user =  User::where("id", "=", $node->user_id)->first();

        $sensors = Sensors::all();
        $sensors_number = Sensors::all()->toArray();
        $sensors_types_by_unit = array();
        $sensors_types = array();
        $sensors_units = array();

        //fill array with number of sensors size with 0
        $sensors_types_by_unit_number = array_fill(0, count($sensors_number), 0);

        foreach($sensors as $sensor){
            if(in_array($sensor->type, $sensors_types_by_unit)){

            }else{
                array_push($sensors_types_by_unit,$sensor->type);
                array_push($sensors_types,$sensor->type);
            }
            array_push($sensors_units,$sensor->unit);
        }

        foreach($sensors as $sensor){
            $sensors_types_by_unit[$sensor->type][] = $sensor->unit;
        }

        $sensorsbynode =  SensorsByNode::where("node_id", "=", $id)->get()->toArray();


        $j = 0;
        foreach($sensors as $sensor){
            $aux = 0;
            for($i = 0; $i<count($sensorsbynode); $i++){
                if( $sensor->id ==$sensorsbynode[$i]["sensor_type_id"]){
                    $aux += 1;
                }
            }
            $sensors_types_by_unit_number[$sensor->unit][] =  $aux;
            $j++;
        }

        for($i = 0; $i < count($sensors_number); $i++){
            $sensors_types_by_unit_number[$i] = trim($sensors_types_by_unit_number[$i]);
        }


        $size = count($sensors_array);
        return view('nodes.show',compact('node', 'sensors_array', 'size', 'user', 'sensors_types', 'sensors_types_by_unit', 'sensors_types_by_unit_number'));
        //return $size;
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

        $sensores = Sensors::all();
        $sensors_number = Sensors::all()->toArray();
        $sensors_types_by_unit = array();
        $sensors_types = array();
        $sensors_units = array();

        //fill array with number of sensors size with 0
        $sensors_types_by_unit_number = array_fill(0, count($sensors_number), 0);

        foreach($sensores as $sensor){
            if(in_array($sensor->type, $sensors_types_by_unit)){

            }else{
                array_push($sensors_types_by_unit,$sensor->type);
                array_push($sensors_types,$sensor->type);
            }
            array_push($sensors_units,$sensor->unit);
        }

        foreach($sensores as $sensor){
            $sensors_types_by_unit[$sensor->type][] = $sensor->unit;
        }

        $sensorsbynode =  SensorsByNode::where("node_id", "=", $id)->get()->toArray();


        $j = 0;
        foreach($sensores as $sensor){
            $aux = 0;
            for($i = 0; $i<count($sensorsbynode); $i++){
                if( $sensor->id ==$sensorsbynode[$i]["sensor_type_id"]){
                    $aux += 1;
                }
            }
            $sensors_types_by_unit_number[$sensor->unit][] =  $aux;
            $j++;
        }

        for($i = 0; $i < count($sensors_number); $i++){
            $sensors_types_by_unit_number[$i] = trim($sensors_types_by_unit_number[$i]);
        }

        //return $sensors_types_by_unit_number["g/m3"];
        return view('nodes.edit', compact('node', 'sensors', 'size', 'sensors_types', 'sensors_types_by_unit', 'sensors_types_by_unit_number'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $name =  trim(Input::get('name'));
        $latitude = trim(Input::get('latitude'));
        $longitude = trim(Input::get('longitude'));

        $node = Nodes::where("name", "=", $name)
                       ->Where("id", "!=", $id)
                       ->first();

        if($node == null){
            Nodes::where('id', '=', $id)->update(['name' => $name, 'latitude' => $latitude, 'longitude' => $longitude]);

            $sensors_data = Request::all();

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
            //return $sensors;
            return Redirect::route('order_update')->with('data', $sensors)
                                                  ->with('id', $id)
                                                  ->with('name', $name)
                                                  ->with('latitude', $latitude)
                                                  ->with('longitude', $longitude);
        }else {
            return redirect()->back()->with('error', ' NODE NAME EXISTS')
                                     ->with('name', $name)
                                     ->with('latitude', $latitude)
                                     ->with('longitude', $longitude);
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

        $sensorsbynode =  SensorsByNode::where("node_id", "=", $id)->delete();

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

    public function updateSensorsByNode(){
        // Getting all post data
        if(Request::ajax()) {
            $data = Input::all();
            //print_r($data);die;

            $sensors_order = $data["order"];
            $node_id = $data["node_id"];
            $sensors_order = explode(',', $sensors_order);

            $sensors_order_number = count($sensors_order);

            $sensors_types = Sensors::all();

            foreach ($sensors_types as $sensor_type) {
                $count = 0;
                for($i =0; $i < $sensors_order_number; $i++){
                    if($sensors_order[$i] == $sensor_type->unit){
                        $count+=1;
                    }
                }

                $sensorsbynode = SensorsByNode::where('node_id', '=', $node_id)
                                              ->Where('sensor_type_id', '=', $sensor_type->id)
                                              ->get()->toArray();

                $sensorsbynode_number = count($sensorsbynode);

                $aux = $count - $sensorsbynode_number;

                for($i = 0; $i < $aux; $i++){
                    $newSensorByNode = new SensorsByNode();
                    $newSensorByNode->node_id = $node_id;
                    $newSensorByNode->sensor_type_id = $sensor_type->id;
                    $newSensorByNode->weight = 0;
                    $newSensorByNode->save();
                }
            }

            //fill with -1
            SensorsByNode::where("node_id", "=", $node_id)->update(['weight' => -1]);

            //update weight
            for($i = 0; $i < $sensors_order_number ; $i++){

                $sensorsbynode = SensorsByNode::where('node_id', '=', $node_id)
                                              ->Where('sensor_type_id', '=', $sensors_order[$i])
                                             // ->Where('weight', '>', 0)
                                              ->first();
                $sensorsbynode->update(['weight' => $i]);
            }


        }
        //return redirect()->back();
        //return redirect('mynodes');
        return SensorsByNode::all();
    }
}