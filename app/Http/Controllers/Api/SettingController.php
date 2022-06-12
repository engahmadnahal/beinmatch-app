<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SettingController extends Controller
{
    //
    public function getSetting()
    {
        $setting = Setting::findOrFail(1)->first();
        return response()->json($setting,Response::HTTP_OK);
    }
}
