<?php

namespace App\Http\Controllers;

use App\Nodes;
use App\SensorsByNode;
use App\Sensors;
use Request;
use App\Http\Requests;

use App\Http\Controllers\Controller;
use App\Data;

class dataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mostrar sensores publicos
        //$nodes = Nodes::where("type", "=", "public")->get();

        $nodes = Nodes::all();

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
            $nodes_array = "No hay nodos creados";
            $size = 0;
        }

        $nodes_array = array_chunk($nodes_array, 3);
        //return $nodes_array[1][1]["sensors"];
        //return view('layout.table', compact('nodes_array', 'size'));
        return view('layout.table', compact('nodes', 'nodes_array', 'size'));

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
        return $input=Request::all();
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
