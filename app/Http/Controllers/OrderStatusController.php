<?php

namespace App\Http\Controllers;

use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    function index($id = null)
    {
        $order_stt_edit = null;
        if ($id) {
            $order_stt_edit = OrderStatus::findOrFail($id);
        }
        $order_status = OrderStatus::orderByDesc('id')->get();
        return view('admin.order_status.index', compact(['order_status', 'order_stt_edit']));
    }
    function store(Request $request, $id = null)
    {
        $data = $request->all();
        unset($data['_token']);

        $request->validate([
            'name' => 'required'
        ], [], [
            'name' => 'Tên trạng thái'
        ]);

        OrderStatus::updateOrCreate(['id' => $id], $data);

        return back();
    }
}
