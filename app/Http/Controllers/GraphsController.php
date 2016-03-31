<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Nodes;
use App\Sensors;
use App\SensorsByNode;
use App\Data;
use Illuminate\Support\Facades\Auth;

class GraphsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHomeGraph()
    {
        //Show a random sensor of a public node
        $nodes = Nodes::where("type", "=", "public")->get();

        if(!$nodes->isEmpty()) {
            $count = count($nodes);

            do {
                $num = rand(0, $count - 1);
                $node = $nodes[$num];
                $data = self::getData($node);
            }while(!is_array($data));

            return $data;

        }else{
            return "no nodes";
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDashboardGraph()
    {
        //User node
        if(Auth::check()){
            $user = Auth::user()->id;
            $nodes = Nodes::where("user_id", "=", $user)->get();
        }else{
            $nodes = Nodes::where("type", "=", "public")->get();
        }

        if(!$nodes->isEmpty()) {
            $count = count($nodes);

            do {
                $num = rand(0, $count - 1);
                $node = $nodes[$num];
                $data = self::getData($node);
            }while(!is_array($data));

            return $data;

        }else{
            return "no nodes";
        }
    }
    public function getData($node){

        $id = $node->id;

        //Sensor of the node
        $sensor = SensorsByNode::where("node_id", "=", $id)->first();

        if($sensor){
            $sensor_id = $sensor->id;

            //Get sensor data
            $data = Data::where("sensorbynode_id", "=", $sensor_id)
                            ->take(15)->get()->toArray();

            if($data){
                $sensor_data = Sensors::where('id', '=', $sensor->sensor_type_id)->first();

                $object = array(
                    "type" => $sensor_data->type,
                    "unit" => $sensor_data->unit,
                    "node_id" => $data[0]["node_id"],
                    "sensorbynode_id" => $data[0]["sensorbynode_id"]
                );

                for ($i = 0; $i < count($data); $i++) {
                    $var = array(
                        "id" => $data[$i]["id"],
                        "time" => $data[$i]["time"],
                        "value" => $data[$i]["value"]
                    );
                    $object["data"][] = $var;
                }


                return ($object);
            }else{
                return ("no data");
            }

        }else{
            return ("no sensors");
        }

    }
}
