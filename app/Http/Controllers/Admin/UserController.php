<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\Organisation;
use App\Http\Model\Profile;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;

class UserController extends Controller
{
    public function index()
    {
        $arrObjUsers = Profile::all();

        return view('admin.user.list', ['arrObjUsers' => $arrObjUsers]);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        return view('admin.user.create');
    }

    public function edit($id)
    {
        $objProfile = Profile::where('id', $id)->first();
        $objProfile->load('user');
        $objCountries = new Countries();
        $objOrganisation = new Organisation();
        $arrObjOrganisation = $objOrganisation->all();
        $arrCountries = $objCountries->all()->pluck('name.common');
        return view('admin.user.edit', ['objProfile' => $objProfile, 'arrCountries' => $arrCountries, 'arrObjOrganisation' => $arrObjOrganisation]);
    }

    public function getParticipatedEvents($id)
    {
        $objUserProfile = Profile::where('id', $id)->first();
        $objUserProfileEvents = $objUserProfile->eventParticipants()->load('events');
        $objUserProfileCategory = $objUserProfile->eventParticipantsCat()->load('category');

        return view('admin.user.participated.list',
            ['objUserProfile' => $objUserProfile, 'objUserProfileEvents' => $objUserProfileEvents, 'objUserProfileCategory' => $objUserProfileCategory]);
    }

    public function update($id, Request $request)
    {

        $objProfile = Profile::where('id', $id)->first();
        $objProfile->first_name = $request->first_name;
        $objProfile->last_name = $request->last_name;
        $objProfile->gender = $request->gender;
        $objProfile->date_of_birth = $request->dob;
        $objProfile->country = $request->nationality;
        $objProfile->local_id = $request->local_id;
        $objProfile->passport = $request->passport_no;
        $objProfile->address = $request->address;
        $objProfile->country = $request->country;
        $objProfile->mobile_no_primary = $request->mobile_no;
        $objProfile->t_shirt_size = $request->t_shirt_size;

        $objProfile->save();

        $objProfile->user->name = $request->local_name;
        $objProfile->user->email = $request->email;
        $objProfile->user->registration_status = true;
        $objProfile->user->save();

        return redirect('profile_update')->with('alert', 'Your Profile Created successfully.!');

        return view('admin.user.edit');
    }
}
