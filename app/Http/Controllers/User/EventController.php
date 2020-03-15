<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Model\Category;
use App\Http\Model\EventParticipants;
use App\Http\Model\Events;
use App\Http\Model\Organisation;
use App\Notifications\ReceiptReceived;
use App\Notifications\RegisterConfirmation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function getParticipants($id){
        $objEvent=Events::where('id', $id)->first();
        ($objEvent->eventParticipants->load('category', 'profile'));
        return view('layouts.event.event_view', ['objEvent'=>$objEvent ]);
    }

    public function getResults(){
        return view('front.results.results');
    }

    public function uploadReceipt($id){
        $objParticipants=EventParticipants::where('id', $id)->first();
        return view('layouts.event.receipt', ['objParticipants' =>$objParticipants]);
    }

    public function postUploadReceipt(Request $request, $id){
        $objEventParticipant= EventParticipants::findOrFail($id);
        $objEventParticipant->receipt = $request->file('receipt')->store('receipt/'.$objEventParticipant->id);
        $objEventParticipant->save();
        $obAdminUser=User::where('role', 'admin')->first();
        $obAdminUser->notify(new ReceiptReceived($objEventParticipant));
    }

    public function getReceipt($id){
        $objEventParticipant=EventParticipants::findOrFail($id);
        return Storage::get('');
    }

}


