<?php

namespace App\Http\Model;

use App\Ticket;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function events()
    {
        return $this->hasOne('App\Http\Model\Events', 'id', 'event_id');
    }

    public function getEventPrice()
    {
        $sql = '';
        $arrObjTickets = $this->ticket;

        foreach ($arrObjTickets as $ticket) {
            if ($ticket->quantity > 0 && Carbon::now()->toDateString() >= Carbon::parse($ticket->start_date)->toDateString() && Carbon::now()->toDateString() <= Carbon::parse($ticket->end_date)->toDateString()) {
                return $ticket;
            } else if ($ticket->quantity > 0 && $ticket->name == 'normal') {
                return $ticket;
            } else if ($ticket->quantity > 0 && $ticket->name == 'late') {
                return $ticket;
            }
        }
        return '';
    }

    public function ticket()
    {
        return $this->hasMany(new Ticket(), 'category_id', 'id');
    }
}
