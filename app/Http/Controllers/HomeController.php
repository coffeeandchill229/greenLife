<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        return view('welcome');
    }
    // Cart
    function cart(){
        return view('cart');
    }
    function checkout(){
        return view('checkout');
    }
}
