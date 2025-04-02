<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    //
    protected $fillable = [
        'owner_id',
        'license_plate',
        'car_make',
        'car_model',
        'orcr_id',
        'status_id',
        
    ];
}
