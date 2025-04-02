<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    //
    protected $fillable = [
        'logged_id',
        'license_plate',
        'status_id',
        'color',
        'type',
        'has_gate_pass',
        'no_gate_pass_count',
        'vehicle_id'
    ];
}
