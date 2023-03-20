<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        $products = Product::orderByDesc('id')->get();

        return view('welcome',compact('products'));
    }
    // Cart
    function cart(){
        return view('cart');
    }
    function checkout(){
        return view('checkout');
    }
}
