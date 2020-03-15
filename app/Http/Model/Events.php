<?php

namespace App\Http\Model;

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
        return $this->hasOne(new Organisation(),  'id', 'org_id');
    }
}
