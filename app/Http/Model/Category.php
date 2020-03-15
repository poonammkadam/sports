<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function events()
    {
        return $this->hasOne('App\Http\Model\Events', 'id', 'event_id');
    }
}
