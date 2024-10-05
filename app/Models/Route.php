<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = [
        'vehicle_type',
        'route_name',
        'starting_point',
        'ending_point',
    ];

    public function positions()
    {
        return $this->hasMany(Position::class, 'vehicle_id');
    }
}
