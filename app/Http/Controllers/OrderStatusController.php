<?php

namespace App\Http\Controllers;

use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    function index(){
        $order_status = OrderStatus::orderByDesc('id')->get();
        return view('admin.order_status.index',compact('order_status'));
    }
    function store(Request $request){
        $data = $request->all();
        unset($data['_token']);

        $request->validate([
            'name'=>'required'
        ],[],[
            'name'=>'Tên trạng thái'
        ]);

        OrderStatus::create($data);

        return back();
    }
}
