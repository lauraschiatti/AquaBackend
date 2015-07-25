<?php

use Illuminate\Database\Seeder;

class NodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Nodes::create([
            'id'     => 'dDaE4CFD',
            'user_id' => '1',
            'name'    => 'node_a',
            'longitude' => '1212.23',
            'latitude' => '12.14',
        ]);

        App\Nodes::create([
            'id'     => '8C2Ab5fA',
            'user_id' => '1',
            'name'    => 'node_b',
            'longitude' => '1212.23',
            'latitude' => '12.14',
        ]);

        App\Nodes::create([
            'id'     => '99f80D47',
            'user_id' => '1',
            'name'    => 'node_c',
            'longitude' => '1212.23',
            'latitude' => '12.14',
        ]);
    }
}
