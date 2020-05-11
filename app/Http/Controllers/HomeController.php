<?php

namespace App\Http\Controllers;

use App\Http\Model\Events;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $arrObjUpcomingEvents = Events::whereDate('registration_start_date', '>', Carbon::now()->toDateString())->orderBy('id', 'desc')->take(8)->get();
        $arrObjPastEvents = Events::whereDate('registration_end_date', '<', Carbon::now()->toDateString())->orderBy('id', 'desc')->take(8)->get();
        $arrObjCurrentEvents = Events::whereDate('registration_start_date', '<=', Carbon::now()->toDateString())
            ->whereDate('registration_end_date', '>', Carbon::now()->toDateString())->orderBy('id', 'desc')->get();

        return view('home', ['arrObjUpcomingEvents' => $arrObjUpcomingEvents, 'arrObjPastEvents' => $arrObjPastEvents, 'arrObjCurrentEvents' => $arrObjCurrentEvents]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contactUS(Request $request)
    {
        $userName = $request->name;
        $emailId = $request->email;
        $subject = $request->subject;
        $message = $request->meassge;

    }
}
