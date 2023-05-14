<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderStatus;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    function index()
    {
        $orders = Order::orderByDesc('id')->get();
        return view('admin.orders.index', compact('orders'));
    }
    function detail($id)
    {
        $order_id = $id;
        $order_detail = OrderDetail::where('order_id', $id)->orderByDesc('id')->get();
        return view('admin.orders.detail', compact(['order_detail', 'order_id']));
    }
    function update($id)
    {
        $order_edit = Order::findOrFail($id);
        $order_status = OrderStatus::all();
        return view('admin.orders.edit', compact('order_edit', 'order_status'));
    }
    function store(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_token']);

        $data['staff_id'] = Auth::user()->id;

        $order_edit = Order::updateOrCreate(['id' => $id], $data);
        $order_edit->save();

        return back();
    }
    function delete($id)
    {
        $order_detail = OrderDetail::where('order_id', $id)->get();
        if ($order_detail) {
            foreach ($order_detail as $item) {
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

    function print_order($order_id)
    {
        $order_detail = OrderDetail::where('order_id', $order_id)->get();

        $pdf = Pdf::loadView('MyPDF.order', [
            'order_detail' => $order_detail
        ]);
        return $pdf->stream();
    }
}
