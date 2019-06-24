<?php

namespace Airtickets;

use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    protected $table = 'planes';
    protected $fillable = [
        'plane_name',
        'cell_amount',
    ];
    public function flight()
    {
        return $this->hasMany('Airtickets\Flight');
    }
}
