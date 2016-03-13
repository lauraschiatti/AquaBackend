<?php

use Illuminate\Database\Seeder;
use App\Sensors;

class SensorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sensors::create([
            'id'     => '1',
            'type'     => 'temperature',
            'unit'    => 'farenheit'
        ]);

        Sensors::create([
            'id'     => '2',
            'type'     => 'temperature',
            'unit'    => 'celcius'
        ]);
    }
}
