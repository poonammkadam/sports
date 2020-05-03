<?php

namespace App\Http\Model;

use App\Accomodation;
use App\Transend;
use App\Transstart;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->hasMany(new Category(), 'event_id', 'id');
    }

    public function eventParticipants()
    {
        return $this->hasMany(new EventParticipants(), 'event_id', 'id');
    }

    public function organisation()
    {
        return $this->hasOne(new Organisation(), 'id', 'org_id');
    }

    public function accom()
    {
        return $this->hasOne(new Accomodation(), 'event_id', 'id');
    }

    public function start()
    {
        return $this->hasOne(new Transstart(), 'event_id', 'id');
    }

    public function end()
    {
        return $this->hasOne(new Transend(), 'event_id', 'id');
    }
}
