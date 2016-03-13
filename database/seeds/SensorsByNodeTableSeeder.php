<?php

use Illuminate\Database\Seeder;
use App\SensorsByNode;

class SensorsByNodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Sensores del nodo dDaE4CFD
        SensorsByNode::create([
            'node_id' => 'dDaE4CFD',
            'sensor_type_id' => '1',
            'weight' => '0',
        ]);

        SensorsByNode::create([
            'node_id'=> 'dDaE4CFD',
            'sensor_type_id' => '1',
            'weight' => '1',
        ]);

        SensorsByNode::create([
            'node_id' => 'dDaE4CFD',
            'sensor_type_id' => '2',
            'weight' => '2',
        ]);

        SensorsByNode::create([
            'node_id' => 'dDaE4CFD',
            'sensor_type_id' => '1',
            'weight' => '3',
        ]);

        SensorsByNode::create([
            'node_id' => 'dDaE4CFD',
            'sensor_type_id' => '2',
            'weight' => '4',
        ]);


        //Sensores del nodo 8C2Ab5fA
        SensorsByNode::create([
            'node_id' => '8C2Ab5fA',
            'sensor_type_id'=> '2',
            'weight' => '0',
        ]);

        SensorsByNode::create([
            'node_id' => '8C2Ab5fA',
            'sensor_type_id' => '1',
            'weight' => '1',
        ]);

        SensorsByNode::create([
            'node_id' => '8C2Ab5fA',
            'sensor_type_id' => '2',
            'weight' => '2',
        ]);

        SensorsByNode::create([
            'node_id' => '8C2Ab5fA',
            'sensor_type_id'=> '1',
            'weight' => '3',
        ]);


        //Sensores del nodo 99f80D47
        SensorsByNode::create([
            'node_id' => '99f80D47',
            'sensor_type_id'=> '2',
            'weight' => '0',
        ]);

        SensorsByNode::create([
            'node_id' => '99f80D47',
            'sensor_type_id' => '1',
            'weight' => '1',
        ]);

        SensorsByNode::create([
            'node_id' => '99f80D47',
            'sensor_type_id' => '2',
            'weight' => '2',
        ]);

        SensorsByNode::create([
            'node_id' => '99f80D47',
            'sensor_type_id'=> '2',
            'weight' => '3',
        ]);

    }
}
