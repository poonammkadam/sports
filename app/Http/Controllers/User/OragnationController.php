<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Model\Organisation;
use Illuminate\Http\Request;


class OragnationController extends Controller
{
    public function getRequestForm(){
        return view('layouts.forms.oragnation_request');
    }
    public function postOragnationStore(Request $request){
               $objOrganisation = new Organisation();
        $objOrganisation->name = $request->name;
        $objOrganisation->description = $request->description;
        $objOrganisation->email = $request->email;
        $objOrganisation->request_status ='close';
        $objOrganisation->save();
        return view('layouts.forms.oragnation_request');
    }
}
