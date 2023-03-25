<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\Models\Category;
use App\Models\OrderDetail;
use App\View\Components\input;
use Illuminate\Support\Facades\Auth;
use PhpParser\Error;
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
    function product_detail($id)
    {
        $product = Product::findOrFail($id);
        return view('product_detail', compact('product'));
    }
    function product_category(Request $request, $id)
    {
        $cats = Category::all();
        $category_find = Category::findOrFail($id);
        // Fillter
        $orderBy = $request->input('orderBy');
        $products = null;
        if ($orderBy == 'default') {
            $products = Product::where('category_id', '=', $id)->orderBy('price', 'ASC')->get();
        } else if ($orderBy == 'latest') {
            $products = Product::where('category_id', '=', $id)->orderBy('id', 'DESC')->get();
        } else if ($orderBy == 'low_price') {
            $products = Product::where('category_id', '=', $id)->orderBy('price', 'ASC')->get();
        } else if ($orderBy == 'high_price') {
            $products = Product::where('category_id', '=', $id)->orderBy('price', 'DESC')->get();
        } else {
            $products = Product::where('category_id', '=', $id)->get();
        }
        return view('product_category', compact('products', 'cats', 'category_find'));
    }
    function search(Request $request)
    {
        $data = $request->all();
        $key = $request->key;
        $cats = Category::all();
        $products = Product::where('name', 'like', '%' . $key . '%')->get();
        return view('search', compact('products', 'cats', 'key'));
    }
    function about()
    {
        return view('about');
    }
    function contact()
    {
        return view('contact');
    }
}
