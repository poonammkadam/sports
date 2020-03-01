<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\Profile;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index(){
    $arrObjUsers = User::all();
    return view('admin.user.list', ['arrObjUsers'=>$arrObjUsers]);
   }

   public function create(){
       return view('admin.user.create');
   }

    public function edit($id){
       $objProfile = Profile::where('id', $id)->first();
       $objProfile->load('user');
        return view('admin.user.edit', ['objProfile' => $objProfile]);
    }

    public function update($id, Request $request){

        return view('admin.user.edit');
    }
}
