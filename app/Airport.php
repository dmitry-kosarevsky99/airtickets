<?php

namespace Airtickets;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $table = 'airports';
    protected $fillable = [
        'airport_name',
        'city',
        'address',
    ];
    public function flight()
    {
        return $this->hasMany('Airtickets\Flight');
    }
}
