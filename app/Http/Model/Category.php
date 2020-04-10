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

    public function ticket(){
        return $this->hasMany(new Ticket(),  'category_id', 'id');
    }

    public function getEventPrice(){
       return $this->ticket()->where('quantity', '>' ,'0')->whereDate('start_date', '<=', date("Y-m-d"))
            ->whereDate('end_date', '>=', date("Y-m-d"))->first();
    }
}
