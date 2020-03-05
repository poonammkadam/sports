<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\Category;
use App\Http\Model\EventParticipants;
use App\Http\Model\Events;
use Illuminate\Http\Request;

class OragnationController extends Controller
{
    public function index(){

    }

    public function getRequest(){

        return view('admin.events.create');
    }



}


