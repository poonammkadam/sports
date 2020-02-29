<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function eventParticipants(){
       return EventParticipants::where('profile_id',$this->id)->groupBy('event_id')->get();
    }
}
