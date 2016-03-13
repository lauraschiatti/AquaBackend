<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SensorsByNode extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "sensorsbynode";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable=[
        'node_id',
        'sensor_type_id',
        'weight'
    ];
}
