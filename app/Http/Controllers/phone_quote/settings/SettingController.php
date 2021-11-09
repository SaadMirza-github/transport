<?php

namespace App\Http\Controllers\phone_quote\settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\general_settings;
use Auth;

class SettingController extends Controller{
   public function general_setting(){
      $data=general_settings::where('user_id',Auth::user()->id)->first();

       if(!empty($data)){
           $previous=$data->no_days;
       }else{
           $previous='';
       }


      return view('main.settings.general_setting',compact('previous'));
   }

    public function general_setting_save(Request $request){

        $exist=general_settings::where('user_id',Auth::user()->id)->first();
        if (empty($exist)) {
            $save_setting = new general_settings();
            $save_setting->user_id = Auth::user()->id;
            $save_setting->no_days = $request->no_of_days;
            $save_setting->save();
        }else{

            $exist->no_days = $request->no_of_days;
            $exist->save();
        }
        return redirect('/general_setting');

    }
}