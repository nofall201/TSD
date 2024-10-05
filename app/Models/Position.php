<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'vehicle_id',
        'latitude',
        'longitude',
    ];

    public function route()
    {
        return $this->belongsTo(Route::class, 'vehicle_id');
    }
}
