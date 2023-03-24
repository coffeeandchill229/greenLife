<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    function index()
    {
        Alert::success('Success Title', 'Success Message');
        $orders = Order::orderByDesc('id')->get();
        return view('admin.orders.index', compact('orders'));
    }
    function detail($id)
    {
        $order_detail = OrderDetail::where('order_id', $id)->orderByDesc('id')->get();
        return view('admin.orders.detail', compact('order_detail'));
    }
    function update($id)
    {
        $order_edit = Order::findOrFail($id);
        $order_status = OrderStatus::all();
        return view('admin.orders.edit', compact('order_edit','order_status'));
    }
    function delete($id)
    {
        $order_detail = OrderDetail::where('order_id',$id)->get();
        if($order_detail){
            foreach($order_detail as $item){
                OrderDetail::destroy($item->id);
            }
            Order::destroy($id);
        }
        return back();
    }

    function order_detail_delete($id)
    {
        OrderDetail::destroy($id);
        return back();
    }
}
