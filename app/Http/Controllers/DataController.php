<?php

namespace App\Http\Controllers;

use App\Data;
use App\Nodes;
use App\SensorsByNode;
use App\Sensors;
use App\Downloads;
use Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class dataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Public nodes
        $nodes = Nodes::where("type", "=", "public")->get();

        //$nodes = Nodes::all();

        $nodes_array = array();

        if (!$nodes->isEmpty()) {
            $i = 0;
            foreach ($nodes as $node) {
                $sensors_array = array();

                $nodes_array[$i]["node_id"] = $node->id;
                $nodes_array[$i]["node_name"] = $node->name;

                $sensorsbynode = SensorsByNode::where("node_id", "=", $node->id)->get();

                if (!$sensorsbynode->isEmpty()) {
                    $sensor_data = array();
                    foreach ($sensorsbynode as $sensorbynode) {
                        $sensor = Sensors::where("id", "=", $sensorbynode->sensor_type_id)->first();

                        $sensor_data["sensor_id"] = $sensorbynode->id;
                        $sensor_data["sensor_type"] = $sensor->type;
                        $sensor_data["sensor_unit"] = $sensor->unit;
                        $sensor_data["sensor_weight"] = $sensorbynode->weight;

                        array_push($sensors_array, $sensor_data);
                    }
                    $nodes_array[$i]["sensors"] = $sensors_array;
                } else{
                    $nodes_array[$i]["sensors"] = "No hay sensores para el nodo";
                }

                $i++;
            }
            $size = count($nodes_array);

        }else{
            $nodes_array = "No nodes created";
            $size = 0;
        }

        $nodes_array = array_chunk($nodes_array, 3);

        $data_array = "No data found";
        //return $nodes_array[1][1]["sensors"];
        //return view('layout.table', compact('nodes_array', 'size'));
        return view('data.create_table', compact('nodes', 'nodes_array', 'size', 'data_array'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$input=Request::all(); get no post

        //datos: 20160314130324 20160314130326 20160314130327 20160314130328 20160314130329 20160314130330 20160314130331

        $data_array = array();
        $sensors_unit_array = array();
        $sensors_type_array = array();
        $data_id = array();

        //Dates
        $initial_date = trim(Input::get('initial_date'));
        $initial_time = trim(Input::get('initial_time'));
        $final_date = trim(Input::get('final_date'));
        $final_time = trim(Input::get('final_time'));


        $initial = date($initial_date . $initial_time);
        $final = date($final_date . $final_time);

        $initial = date("20160314130324");
        $final = date("20160314130329");


        //Sensors
        $sensors = Input::get('sensors');

        for($i = 0; $i < count($sensors); $i++){

            $data = Data::where("sensorbynode_id", "=", $sensors[$i])->get();


            if (!$data->isEmpty()) {
                foreach ($data as $datum) {
                    $time = date($datum->time);

                    if ($initial <= $time && $time <= $final) {
                        array_push($data_array, $datum);
                        array_push($data_id, $datum->id);

                        //Sensor type and unit
                        $sensor = SensorsByNode::where("id", "=", $sensors[$i])->first();

                        if(!$sensor){

                        }else{
                            $sensor_data = Sensors::where("id", "=", $sensor -> sensor_type_id)->first();

                            if(!$sensor_data){
                                array_push($sensors_type_array, "type");
                                array_push($sensors_unit_array, "unit");
                            }else{
                                array_push($sensors_type_array, $sensor_data -> type);
                                array_push($sensors_unit_array, $sensor_data -> unit);
                            }

                        }
                    }
                }
            } else{
                $data_array = "No data found";
            }
        }

        $sensors_size = count($data_array);

        $data_id = json_encode($data_id);

        return view('data.data_table', compact('data_array', 'sensors_size', 'sensors_type_array', 'sensors_unit_array', 'data_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
