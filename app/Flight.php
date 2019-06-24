<?php

namespace Airtickets;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $table = 'flights';
    protected $fillable = [
        'depart_date_time',
        'arrival_date_time',
        'flight_plane_id',
        'source_airport_id',
        'destination_airport_id',
    ];
    
    public function planes() // Now set up foreign keys in new migrations
    {
        return $this->belongsTo('Airtickets\Plane');
    }
    public function ticket()
    {
        return $this->hasMany('Airtickets\Ticket');
    }
    public function airport()
    {
        return $this->belongsTo('Airtickets\Airport');
    }
}
