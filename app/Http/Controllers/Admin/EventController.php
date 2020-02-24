<?php

namespace App\Http\Controllers\Admin;

use App\Events;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        // $arrObjEvents = Events::all();
        // return view('admin.user.list', ['arrObjEvents'=>$arrObjEvents]);
        return view('admin.events.list');
       }

    public function create(){
        // $arrObjEvents = Events::all();
        // return view('admin.user.list', ['arrObjEvents'=>$arrObjEvents]);
        return view('admin.events.create');
    }
    public function store(Request $request){
        $request->all();
        // $arrObjEvents = Events::all();
        // return view('admin.user.list', ['arrObjEvents'=>$arrObjEvents]);
        return view('admin.events.list');
    }

}


