<?php

namespace Airtickets;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $fillable = [
        'ticket_class',
        'ticket_cell',
    ];
    public function userTicket()
    {
        return $this->hasMany('Airtickets\UserTicket');
    }
    public function flight()
    {
        return $this->belongsTo('Airtickets\Flight');
    }
}
