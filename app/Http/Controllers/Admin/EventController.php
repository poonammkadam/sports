<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\Category;
use App\Http\Model\EventParticipants;
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

    public function view($id){
       $objEvent=Events::where('id', $id)->first();
        ($objEvent->eventParticipants->load('category', 'profile'));
       return view('admin.events.view', ['objEvent'=>$objEvent ]);
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
        $objEvent->banner = $request->file('banner')->store('banner');
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


    public function edit($id){
        $objEvent=Events::where('id', $id)->first();
    return view('admin.events.edit', ['objEvent'=>$objEvent]);
    }

        public  function setPaymentStatus($id){
        $objEvent=EventParticipants::findOrFail($id);
            $objEvent->payment_status=1;
            $objEvent->save();
            return redirect()->back()->with('success', 'Events Payment statu update Successfully.');
        }

    public function update($id, Request $request){
        $objEvent=Events::where('id', $id)->first();
        $objEvent = new Events();
        $objEvent->name = $request->name;
        $objEvent->description = $request->description;
        $objEvent->registration_end_date = $request->register_expire_date;
        $objEvent->event_date = $request->eventdate;
        $objEvent->venue = $request->venue;
        $objEvent->organiser_name = $request->orgname;
        $objEvent->organiser_contact_number = $request->org_contact_no;
        $objEvent->organiser_address = $request->org_address;
        $objEvent->banner = $request->file('banner')->store('banner');
        $objEvent->save();
    }

}


