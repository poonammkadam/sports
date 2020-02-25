<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\Events;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
         $arrObjEvents = Events::all();
         return view('admin.events.list', ['arrObjEvents'=>$arrObjEvents]);
       }

    public function eventCreate(){
        // $arrObjEvents = Events::all();
        // return view('admin.user.list', ['arrObjEvents'=>$arrObjEvents]);
        return view('admin.events.create');
    }
    public function store(Request $request){
        $objEvent = new Events();
        $objEvent->name = $request->name;
        $objEvent->description = $request->description;
        $objEvent->registration_end_date = $request->register_expire_date;
        $objEvent->event_date = $request->eventdate;
        $objEvent->event_type   = json_encode($request->get('event_type'));
        $objEvent->venue = $request->venue;
        $objEvent->organiser_name = $request->orgname;
        $objEvent->organiser_contact_number = $request->org_contact_no;
        $objEvent->organiser_address = $request->org_address;
        $objEvent->save();
        return redirect('events')->with('success', 'Data Added successfully.');

    }

}


