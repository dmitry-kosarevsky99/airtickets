<?php

namespace Airtickets;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = [
        'review_text',
    ];
    public function user()
    {
        return $this->belongsTo('Airtickets\User');
    }
}
