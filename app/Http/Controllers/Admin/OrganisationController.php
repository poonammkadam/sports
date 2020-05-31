<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\Organisation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PragmaRX\Countries\Package\Countries;

class OrganisationController extends Controller
{
    public function index()
    {
        $arrObjOrganisation = User::where('role', 'organiser')->get();
        return view('admin.organisation.list', ['arrObjOrganisation' => $arrObjOrganisation]);
    }

    public function show($id)
    {
        $objOrganisation = Organisation::where('user_id', $id)->first();
        return view('admin.organisation.view', ['objOrganisation' => $objOrganisation]);
    }

    public function create()
    {
        return view('admin.organisation.create');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users|email',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $objUserOrg = new User();
        $objUserOrg->name = $request->name;
        $objUserOrg->email = $request->email;
        $objUserOrg->password = Hash::make($request['password']);
        $objUserOrg->role = "organiser";
        $objUserOrg->registration_status = 0;
        $objUserOrg->save();
        $intId = $objUserOrg->getKey();
        return redirect('admin/organisation/edit/' . $intId);
    }

    public function edit($id)
    {
        $objOrganisation = User::where('id', $id)->first();
        $objOrganisationProfile = Organisation::where('user_id', $id)->first();
        $objCountries = new Countries();
        $arrCountries = $objCountries->all()->pluck('name.common');
        return view('admin.organisation.edit', ['objOrganisation' => $objOrganisation, 'objOrganisationProfile' => $objOrganisationProfile, 'arrCountries' => $arrCountries]);
    }

    public function update($id, Request $request)
    {
        $objProfileExist = Organisation::where('user_id', $id)->first();
        if ($objProfileExist) {
            $objOrganisation = $objProfileExist;
        } else {
            $objOrganisation = new Organisation();
        }

        $objOrganisation->name = $request->name;
        $objOrganisation->about = $request->about;
        $objOrganisation->address = $request->address;
        $objOrganisation->address = $request->address;
        $objOrganisation->contact_no = $request->mobile_no;
        $objOrganisation->user_id = $id;
        $objOrganisation->save();
        return redirect('admin/organisation');
    }
}


