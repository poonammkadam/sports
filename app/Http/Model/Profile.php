<?php

namespace App\Http\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function eventParticipants()
    {
        return EventParticipants::where('profile_id', $this->id)->groupBy('event_id')->get();
    }

    public function user()
    {
        return $this->belongsTo(new User(), 'user_id', 'id');
    }
}
