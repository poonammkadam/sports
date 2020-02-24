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
       $objProfile->nationality = $request->nationality;
       $objProfile->local_id = $request->local_id;
       $objProfile->passport = $request->passport_no;
       
       $objProfile->address = $request->address;
       $objProfile->country = $request->country;
       $objProfile->mobile_no_primary = $request->mobile_no;
       $objProfile->save();
    return view('layouts.forms.event');
   }
   public function eventStore(){
    return view('home');
   }

}
