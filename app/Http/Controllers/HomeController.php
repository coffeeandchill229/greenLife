<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    function index()
    {
        Alert::success('Success Title', 'Success Message');
        $products = Product::orderByDesc('id')->take(32)->get();
        return view('welcome', compact('products'));
    }
    // Cart
    function cart()
    {
        return view('cart');
    }
    function checkout()
    {
        return view('checkout');
    }
    function store_checkout(CartHelper $cart, Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        $request->validate(
            [
                'email' => 'required|email',
                'phone' => 'required',
            ],
            [],
            [
                'email' => 'Email',
                'phone' => 'Điện thoại',
            ]
        );

        $data['total'] = $cart->total_price;
        $data['customer_id'] = Auth::guard('customer')->user()->id;
        $data['status_id'] = 1;

        $order = Order::create($data);
        if ($order) {
            foreach ($cart->items as $item) {
                $order_detail = new OrderDetail();
                $order_detail->product_id = $item['id'];
                $order_detail->order_id = $order->id;
                $order_detail->price = $item['price'];
                $order_detail->quantity = $item['quantity'];
                $order_detail->save();
            }
            $cart->remove();
        }
        return back();
    }
}
