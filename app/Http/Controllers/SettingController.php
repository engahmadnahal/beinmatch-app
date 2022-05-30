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
            'mobSetting' => $mobSetting
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
        ]);

        $mobSetting = Setting::findOrFail(1);
        $mobSetting->slide_active = !is_null($request->input('slide_active')) ? 1 : 0;
        $mobSetting->match_active = !is_null($request->input('match_active')) ? 1 : 0;
        $mobSetting->ads_active = !is_null($request->input('ads_active')) ? 1 : 0;
        $mobSetting->save();
        return redirect()->route('settings.mobile');
    }
}
