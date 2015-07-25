<?php

namespace App\Http\Controllers;

use App\Data;
use App\Nodes;
use App\SensorsByNode;

use App\Http\Requests;


class SyncController extends Controller
{
    public function postData($data){
        //$data = '8C2Ab5fA;20150723213501;24.53817;18.176578;20.658469;24.432754;16.06895';
        $data = explode(';', $data);
        $node_id = $data[0];
        $time = $data[1];

        $node = Nodes::where('id', "=", $node_id)->first();

        if($node != null){
            $sensorsbynode = SensorsByNode::where("node_id", "=", $node_id)->get()->toArray();
            $sensorsbynode_number = count($sensorsbynode);

            for($i = 0; $i < $sensorsbynode_number; $i++){
                $sensorbynode = SensorsByNode::where("node_id", "=", $node_id)
                                             ->Where("weight", "=", $i)
                                             ->first();
                $sensor_id = $sensorbynode->id;

                $newData = new Data();
                $newData->node_id = $node_id;
                $newData->sensorbynode_id = $sensor_id;
                $newData->time = $time;
                $newData->value = $data[$i+2];
                $newData->save();
            }

        }else{
            //@todo: save logs
        }

        return Data::all();
    }
}
