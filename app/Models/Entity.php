<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{

    protected $table = 'entity';

    protected $primaryKey = 'uuid';




    protected $fillable = [
        'uuid',
        'model',
        'address',
    ];
    //
}
