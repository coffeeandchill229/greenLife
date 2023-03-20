<?php

namespace App\Http\Controllers;

use App\Models\ThemeSetting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemeSettingController extends Controller
{
    function store(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        $user_id = Auth::user()->id;

        $user = User::find($user_id);

        if($user->setting){
            $setting_edit = ThemeSetting::find($user->setting->id);
            $setting_edit->layout = $request['data-layout'];
            $setting_edit->color_scheme = $request['data-layout-mode'];
            $setting_edit->layout_width = $request['data-layout-width'];
            $setting_edit->layout_position = $request['data-layout-position'];
            $setting_edit->topbar_color = $request['data-topbar'];
            $setting_edit->sidebar_size = $request['data-sidebar-size'];
            $setting_edit->sidebar_view = $request['data-layout-style'];
            $setting_edit->sidebar_color = $request['data-sidebar'];
            $setting_edit->sidebar_image = $request['data-sidebar-image'];
            $setting_edit->save();
        }else{
            $setting = new ThemeSetting();
            $setting->layout = $request['data-layout'];
            $setting->color_scheme = $request['data-layout-mode'];
            $setting->layout_width = $request['data-layout-width'];
            $setting->layout_position = $request['data-layout-position'];
            $setting->topbar_color = $request['data-topbar'];
            $setting->sidebar_size = $request['data-sidebar-size'];
            $setting->sidebar_view = $request['data-layout-style'];
            $setting->sidebar_color = $request['data-sidebar'];
            $setting->sidebar_image = $request['data-sidebar-image'];
            $setting->user_id = $user->id;
            $setting->save();
        }

        return back();
    }
}
