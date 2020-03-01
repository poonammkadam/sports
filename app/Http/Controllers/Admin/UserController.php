<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index(){
    $arrObjUsers = User::all();
    return view('admin.user.list', ['arrObjUsers'=>$arrObjUsers]);
   }
}
