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
        $name = trim(Input::get('name'));
        $latitude =  trim(Input::get('latitude'));
        $longitude = trim(Input::get('longitude'));
        $type = Input::get('type');

        //sensors in that node
        $sensors_names = Input::get('sensors_units');
        $sensors_numbers = Input::get('sensors_number');

        //Validations in cases where are not sensors created
        if ($sensors_names == null){
            $sensors_names = "";
        }
        if ($sensors_numbers == null){
            $sensors_numbers = "";
        }

        $id = self::generateHash();

        $node = Nodes::where("name", "=", $name)->first();

        if($node == null){
            $newNode = new Nodes();
            $newNode->id = $id;
            $newNode->name = $name;
            $newNode->latitude = $latitude;
            $newNode->longitude = $longitude;
            $newNode->type = $type;

            if(Auth::check()){
                $newNode->user_id = Auth::user()->id;
            }

            $newNode->save();

            //convert to int
            if($sensors_names != ""){
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
            }else{
                $sensors = "";
            }

            return Redirect::route('order')->with('data', $sensors)
                                           ->with('id', $id);

            //return Request::all();
             //return $sensors_data;
             //return $newNode;
             //return Nodes::where("name", "=", $name)->first();;

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

        if ($sensors != null){
            $sensors_number = Sensors::all()->toArray();
            $sensors_types_by_unit = array();
            $sensors_types = array();
            $sensors_units = array();

            //fill array with number of sensors size with 0
            if ($sensors_number != null){
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
            }else{
                $size = 0;
            }
        }

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
        //$sensors_types_by_unit_number = array_fill(0, count($sensors_number), 0);

        foreach($sensores as $sensor){
            if(!in_array($sensor->type, $sensors_types_by_unit)){
                array_push($sensors_types_by_unit,$sensor->type);
                array_push($sensors_types,$sensor->type);
            }
            array_push($sensors_units,$sensor->unit);
        }

        foreach($sensores as $sensor){
            $sensors_types_by_unit[$sensor->type][] = $sensor->unit;
        }

        //$sensorsbynode =  SensorsByNode::where("node_id", "=", $id)->get()->toArray();


        /*$j = 0;
        foreach($sensores as $sensor){
            $aux = 0;
            for($i = 0; $i<count($sensorsbynode); $i++){
                if( $sensor->id ==$sensorsbynode[$i]["sensor_type_id"]){
                    $aux += 1;
                }
            }
            $sensors_types_by_unit_number[$sensor->unit][] =  $aux;
            $j++;
        }*/

        /*for($i = 0; $i < count($sensors_number); $i++){
            $sensors_types_by_unit_number[$i] = trim($sensors_types_by_unit_number[$i]);
        }*/

        //return $sensors_types_by_unit_number["g/m3"];
        return view('nodes.edit', compact('node', 'sensors', 'size', 'sensors_types', 'sensors_types_by_unit'));//, 'sensors_types_by_unit_number'));
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
        $type = Input::get('type');

        $node = Nodes::where("name", "=", $name)
                       ->Where("id", "!=", $id)
                       ->first();

        if($node == null){
            Nodes::where('id', '=', $id)->update(['name' => $name, 'latitude' => $latitude, 'longitude' => $longitude, 'type' => $type]);

            $sensors_data = Request::all();

            if($sensors_data["sensors_units"] != null){
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
            }

            //return $sensors;
            return Redirect::route('order_update')->with('data', $sensors)
                                                  ->with('id', $id);
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

        SensorsByNode::where("node_id", "=", $id)->delete();

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
                $sensors_order[$i] = explode('_', $sensors_order[$i]);
                $type = $sensors_order[$i][0];
                $unit = $sensors_order[$i][1];

                $sensor = Sensors::where('unit', '=', $unit)
                                 ->Where("type", "=", $type)
                                 ->first();
                $sensor_id = $sensor->id;
                //print_r($sensor_id);die;

                $newSensorByNode = new SensorsByNode();
                $newSensorByNode->node_id = $node_id;
                $newSensorByNode->sensor_type_id = $sensor_id;
                $newSensorByNode->weight = $i;
                $newSensorByNode->save();

                $i++;
            }

        }
        return redirect('mynodes');
        //return SensorsByNode::all();
    }

    public function updateSensorsByNode(){
        // Getting all post data
        if(Request::ajax()) {
            $data = Input::all();
            //print_r($data);die;

            $node_id = $data["node_id"];
            SensorsByNode::where("node_id", "=", $node_id)->delete();

            $sensors_order = $data["order"];
            $sensors_order = explode(',', $sensors_order);

            //save sensors in a node
            $i = 0;
            while($i < count($sensors_order)){
                $sensors_order[$i] = explode('_', $sensors_order[$i]);
                $type = $sensors_order[$i][0];
                $unit = $sensors_order[$i][1];

                $sensor = Sensors::where('unit', '=', $unit)
                    ->Where("type", "=", $type)
                    ->first();
                $sensor_id = $sensor->id;
                //print_r($sensor_id);die;

                $newSensorByNode = new SensorsByNode();
                $newSensorByNode->node_id = $node_id;
                $newSensorByNode->sensor_type_id = $sensor_id;
                $newSensorByNode->weight = $i;
                $newSensorByNode->save();

                $i++;
            }

        }
        return redirect('mynodes');
        //return SensorsByNode::all();
    }

    function generateHash(){
        //String
        $string = "ABCDEFabcdef1234567890";

        //String length
        $string_length = strlen($string);

        //hash var
        $hash = "";

        //Define hash length
        $hash_length = 8;

        for($i = 1 ; $i <= $hash_length ; $i++){
            //Random number between 0 and the string_length-1
            $pos=rand(0, $string_length-1);

            //In each iteration, add a char correspondent to $pos position in the $string to the hash string randomly
            $hash .= substr($string, $pos ,1);
        }

        $nodes = Nodes::where('id', '=', $hash)->first();

        if($nodes){
            $this->generateHash();
        }else{
            return $hash;
        }

    }
}