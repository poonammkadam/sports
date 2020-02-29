<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function eventParticipants(){
        return $this->hasMany(new EventParticipants(), 'profile_id', 'id');
    }
}
