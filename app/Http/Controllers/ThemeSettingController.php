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
        return back();
    }
}
