<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaterLevel extends Model
{

    protected $table = 'water_level';

    // protected $primaryKey = 'uuid';
    // public $timestamps = 'false';
    public $timestamps = false;



    protected $fillable = [
        'water_level',
        'uuid',
    ];
    //
}
