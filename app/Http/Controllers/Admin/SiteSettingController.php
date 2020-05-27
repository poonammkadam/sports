<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\siteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $objSetting = siteSetting::where('id', 1)->first();
        return view('admin.setting.create', ['objSetting' => $objSetting]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $objSetting = siteSetting::where('id', 1)->first();
        $objSetting->terms = $request->terms;
        $objSetting->policy = $request->policy;
        $objSetting->about_us = $request->about_us;
        $objSetting->save();
        return redirect('/setting')->with('alert', 'Site Setting Updated successfully.!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\siteSetting $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function show(siteSetting $siteSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\siteSetting $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(siteSetting $siteSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\siteSetting $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, siteSetting $siteSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\siteSetting $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(siteSetting $siteSetting)
    {
        //
    }
}
