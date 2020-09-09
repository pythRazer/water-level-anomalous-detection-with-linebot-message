<?php
// Anomolous water level tags
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaterLevel extends Model
{

    protected $table = 'tags';

    // // protected $primaryKey = 'uuid';
    // // public $timestamps = 'false';
    // public $timestamps = false;



    protected $fillable = [
        'start_time',
        'end_time',
        'tags',
    ];
    //
}
