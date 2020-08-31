<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaterLevel extends Model
{

    protected $table = 'water_levels';
    protected $primaryKey = 'time';

    protected $fillable = [
        'water_level',
    ];
    //
}
