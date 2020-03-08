<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Model\Category;
use App\Http\Model\EventParticipants;
use App\Http\Model\Events;
use App\Http\Model\Organisation;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function getParticipants($id){
        $objEvent=Events::where('id', $id)->first();
        ($objEvent->eventParticipants->load('category', 'profile'));
        return view('layouts.event.event_view', ['objEvent'=>$objEvent ]);
    }

    public function getResults(){
        return view('fornt.results.results');
    }

}


