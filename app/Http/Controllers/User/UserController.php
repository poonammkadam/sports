<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Model\Profile;
use Illuminate\Http\Request;


class UserController extends Controller
{
   public function index(){
    return view('layouts.forms.registation');
   }

   public function update(Request $request){
       $objProfile = new Profile();
       $objProfile->first_name = $request->first_name;
       $objProfile->last_name = $request->last_name;
       $objProfile->gender = $request->gender;
       $objProfile->date_of_birth = $request->dob;
       $objProfile->first_name = $request->first_name;
       $objProfile->first_name = $request->first_name;
       $objProfile->first_name = $request->first_name;
       $objProfile->first_name = $request->first_name;
       $objProfile->first_name = $request->first_name;
       $objProfile->first_name = $request->first_name;
       $objProfile->first_name = $request->first_name;
       $objProfile->first_name = $request->first_name;
        $objProfile->first_name = $request->first_name;
    $objProfile->save();
    return view('layouts.forms.event');
   }
   public function eventStore(){
    return view('home');
   }

}
