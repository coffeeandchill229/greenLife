<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(){
        $users = User::orderByDesc('id')->get();
        return view('admin.user.index',compact('users'));
    }
}
