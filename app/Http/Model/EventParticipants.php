<?php

namespace App\Http\Model;

use App\Accomodation;
use App\Ticket;
use App\Transend;
use App\Transstart;
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

    public function getaccom()
    {
        return $this->hasOne(new Accomodation(), 'id', 'accommodation');
    }

    public function getstart()
    {
        return $this->hasOne(new Transstart(), 'id', 'transstarts');
    }

    public function getend()
    {
        return $this->hasOne(new Transend(), 'id', 'transends');
    }

    public function ticket()
    {
        return $this->hasOne(new Ticket(), 'id', 'ticket_id');
    }
}
