<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    protected $guarded = [];

    public function events()
    {
        return $this->hasMany('App\Http\Model\Events', 'org_id', 'id');
    }


}
