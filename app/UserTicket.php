<?php

namespace Airtickets;

use Illuminate\Database\Eloquent\Model;

class UserTicket extends Model
{
    protected $table = 'user_tickets';
    public function ticket()
    {
        return $this->belongsTo('Airtickets\Ticket');
    }
    public function user()
    {
        return $this->belongsTo('Airtickets\User');
    }
}
