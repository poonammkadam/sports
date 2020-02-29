<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\Category;
use App\Http\Model\Events;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
         $arrObjEvents = Events::all();
         return view('admin.events.list', ['arrObjEvents'=>$arrObjEvents]);
       }

    public function eventCreate(){

        return view('admin.events.create');
    }

    public function store(Request $request){
        $objEvent = new Events();
        $objEvent->name = $request->name;
        $objEvent->description = $request->description;
        $objEvent->registration_end_date = $request->register_expire_date;
        $objEvent->event_date = $request->eventdate;
        $objEvent->venue = $request->venue;
        $objEvent->organiser_name = $request->orgname;
        $objEvent->organiser_contact_number = $request->org_contact_no;
        $objEvent->organiser_address = $request->org_address;

//        $objEvent->banner = $request->file('banner')->store('banner');
        $objEvent->save();

        $intEventkey = $objEvent->getKey();
        if($request->category){
        foreach ($request->category as $category){
                $objCategory = new Category();
                $objCategory->category_type  = $category['type'];
                $objCategory->category_subtype  = $category['subtype'];
                $objCategory->amount  = $category['fee'];
                $objCategory->event_id = $intEventkey;
                $objCategory->save();
        }
    }
        return redirect('admin/events')->with('success', 'Events Created Successfully.');
    }
}


