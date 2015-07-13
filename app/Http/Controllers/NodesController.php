<?php

namespace App\Http\Controllers;

use App\User;
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
        return view('nodes.create', compact('sensors'));


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
        //$input=Request::all();

        $node = Nodes::where("name", "=", Input::get('name'))->first();

        if($node == null){
            $newNode = new Nodes();
            $newNode->name = Input::get('name');
            $newNode->latitude = Input::get('latitude');
            $newNode->longitude = Input::get('longitude');

            if(Auth::check()){
                $newNode->user_id = Auth::user()->id;
            }

            //Nodes::create($input);
            $newNode->save();

            //save sensors in that node
            $n = Nodes::where("name", "=", Input::get('name'))->first();
            $node_id = $n->id;

            $sensors_checked = Input::get('sensors');

            foreach($sensors_checked as $sensor_checked){
                $sensorbynode = new SensorsByNode();
                $sensorbynode->node_id = $node_id;

                $sensor = Sensors::where("name", "=",$sensor_checked)->first();
                $sensorbynode->sensor_id = $sensor->id ;

                $node = SensorsByNode::where("node_id", "=", $node_id)
                    ->Where("sensor_id", "=", $sensor->id)
                    ->first();

                if($node == null){
                    $sensorbynode->save();
                }else{
                    //@todo revisar que hacer en caso de que exista el sensor en el nodo
                    //return $sensorbynode;
                }

            }
            if(Auth::check() && Auth::user()->role == 'superadmin'){
                return redirect('nodes');
            }else{
                return redirect('mynodes');
            }
        }else{
            //@todo revisar que hacer en caso de que exista el sensor en el nodo
            return redirect('nodes/create');
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
            $sensor->name =  strtoupper($sensor->name);
            array_push($sensors, $sensor);
        }

        $user =  User::where("id", "=", $node->user_id)->first();

        //return $sensors;
        return view('nodes.show',compact('node', 'sensors', 'user'));
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

        $check =  Nodes::where("name", "=", Input::get('name'))->first();

        if(!$check){
            $node=Nodes::find($id);
            $node->update($nodeUpdate);

            if(Auth::check() && Auth::user()->role == 'superadmin'){
                return redirect('nodes');
            }else{
                return redirect('mynodes');
            }
        }else{
            //@todo existe el nodo
            return $check;
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
}
