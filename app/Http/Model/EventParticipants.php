<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class EventParticipants extends Model
{
    protected $guarded = [];

    public function events(){
        return $this->belongsTo(new Events(),  'event_id', 'id');
    }
}
