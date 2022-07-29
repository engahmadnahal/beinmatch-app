<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     *
     *  This Function Show blade view for mobile settings
     */

    public function mobile(){
        $mobSetting = Setting::findOrFail(1);

        return view('setting.mobile',[
            'mobSetting' => json_decode($mobSetting->settings)
        ]);
    }

        /**
     *
     *  This Function Perform Update mobile settings
     */

    public function saveSettingMobile(Request $request){
        //id	slide_active	match_active	ads_active	created_at	updated_at
        $request->validate([
            "slide_active"=>"nullable",
            "match_active"=>"nullable",
            "ads_active"=>"nullable",
            "facebook"=>"required|string",
            "youtube"=>"required|string",
            "twitter"=>"required|string",
        ]);

        $dataSetting = [
            "slide_active"=>$request->slide_active == "on" ? true : false,
            "match_active"=>$request->match_active == "on" ? true : false,
            "ads_active"=>$request->ads_active == "on" ? true : false,
            "facebook"=>$request->facebook,
            "youtube"=>$request->youtube,
            "twitter"=>$request->twitter,
        ];

        $mobSetting = Setting::findOrFail(1);
        $mobSetting->settings = json_encode($dataSetting);
        // $mobSetting->type = "mobile";
        $mobSetting->save();
        return redirect()->route('settings.mobile');
    }


    
}
