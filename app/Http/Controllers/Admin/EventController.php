<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\Events;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        // $arrObjEvents = Events::all();
        // return view('admin.user.list', ['arrObjEvents'=>$arrObjEvents]);
        return view('admin.events.list');
       }

    public function eventCreate(){
        // $arrObjEvents = Events::all();
        // return view('admin.user.list', ['arrObjEvents'=>$arrObjEvents]);
        return view('admin.events.create');
    }
    public function store(Request $request){
        $objEvent = new Events();

        return view('admin.events.list');
    }

}


