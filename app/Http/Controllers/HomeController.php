<?php

namespace App\Http\Controllers;

use App\Http\Model\Events;
use Monarobase\CountryList\CountryList;

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
        $arrObjEvents = Events::all();
        return view('home', ['arrObjEvents' => $arrObjEvents]);
    }
}
