<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class EventParticipants extends Model
{
    protected $guarded = [];

    public function events()
    {
        return $this->belongsTo(new Events(), 'event_id', 'id');
    }

    public function category()
    {
        return $this->hasOne(new Category(), 'id', 'category_id');
    }

    public function profile()
    {
        return $this->hasOne(new Profile(), 'id', 'profile_id');
    }
}
