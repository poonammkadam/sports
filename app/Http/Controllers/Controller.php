<?php

namespace App\Http\Controllers;

use App\siteSetting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function privacy()
    {
        $objSetting = siteSetting::where('id', 1)->first();
        return view('privacy', ['privacy' => $objSetting->privacy]);
    }

    public function terms()
    {
        $objSetting = siteSetting::where('id', 1)->first();
        return view('terms', ['terms' => $objSetting->terms]);
    }

    public function about()
    {
        $objSetting = siteSetting::where('id', 1)->first();
        return view('about', ['about_us' => $objSetting->about_us]);
    }
}
