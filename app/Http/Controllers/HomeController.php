<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\Models\Category;
use App\Models\Comment;
use App\Models\OrderDetail;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    function index(CartHelper $cart)
    {

        if (isset($_GET['vnp_TransactionStatus'])) {
            $status = $_GET['vnp_TransactionStatus'];
            $order_id = $_GET['vnp_TxnRef'];

            if ($status == 00 && $order_id) {
                toast()->success('Đặt hàng thành công!');
                $cart->remove();

                $order = Order::findOrFail($order_id);

                Mail::send(
                    'email.checkout',
                    [
                        'order' => $order,
                    ],
                    function ($mail) use ($order) {
                        $mail->to($order->email);
                        $mail->from('parunitashi@gmail.com');
                        $mail->subject('Đơn hàng tại Greenlife đã được đặt!');
                    }
                );
            } else {
                toast()->warning('Đặt hàng không thành công!');
            }
            return redirect(route('home'));
        }

        $products = Product::where('status', 1)->orderByDesc('id')->take(12)->get();
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
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
            ],
            [],
            [
                'name' => 'Họ tên',
                'email' => 'Email',
                'phone' => 'Điện thoại',
            ]
        );

        $data['total'] = $cart->total_price;
        $data['user_id'] = Auth::user()->id;
        $data['status_id'] = 1;

        $method = $request->method;

        $order = Order::create($data);

        if ($order) {

            foreach ($cart->items as $item) {
                $order_detail = new OrderDetail();
                $order_detail->product_id = $item['id'];
                $order_detail->order_id = $order->id;
                $order_detail->price = $item['price'];
                $order_detail->quantity = $item['quantity'];
                // Update product stock
                $product = Product::findOrFail($order_detail->product_id);
                $product->update(['stock' => $product->stock - $item['quantity']]);
                $product->save();
                $order_detail->save();
            }
            if ($method == 1) {
                $orderId = $order->id;

                error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
                date_default_timezone_set('Asia/Ho_Chi_Minh');

                $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                $vnp_Returnurl = "http://127.0.0.1:8000/";
                $vnp_TmnCode = "Q0AT92PE"; //Mã website tại VNPAY
                $vnp_HashSecret = "KRLMJKYHLSWHPWHLUXZTQJDHEDUNUFXX"; //Chuỗi bí mật

                $vnp_TxnRef = $orderId; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                $vnp_OrderInfo = "Thanh toán thành công tại Website Cây Cảnh Greenlife";
                $vnp_OrderType = "paybillment";
                $vnp_Amount = $cart->total_price * 100;
                $vnp_Locale = "vn";
                $vnp_BankCode = "NCB";
                $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

                $inputData = array(
                    "vnp_Version" => "2.1.0",
                    "vnp_TmnCode" => $vnp_TmnCode,
                    "vnp_Amount" => $vnp_Amount,
                    "vnp_Command" => "pay",
                    "vnp_CreateDate" => date('YmdHis'),
                    "vnp_CurrCode" => "VND",
                    "vnp_IpAddr" => $vnp_IpAddr,
                    "vnp_Locale" => $vnp_Locale,
                    "vnp_OrderInfo" => $vnp_OrderInfo,
                    "vnp_OrderType" => $vnp_OrderType,
                    "vnp_ReturnUrl" => $vnp_Returnurl,
                    "vnp_TxnRef" => $vnp_TxnRef,
                );

                if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                    $inputData['vnp_BankCode'] = $vnp_BankCode;
                }
                if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                    $inputData['vnp_Bill_State'] = $vnp_Bill_State;
                }

                //var_dump($inputData);
                ksort($inputData);
                $query = "";
                $i = 0;
                $hashdata = "";
                foreach ($inputData as $key => $value) {
                    if ($i == 1) {
                        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                    } else {
                        $hashdata .= urlencode($key) . "=" . urlencode($value);
                        $i = 1;
                    }
                    $query .= urlencode($key) . "=" . urlencode($value) . '&';
                }

                $vnp_Url = $vnp_Url . "?" . $query;
                if (isset($vnp_HashSecret)) {
                    $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
                    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                }
                $returnData = array(
                    'code' => '00',
                    'message' => 'success',
                    'data' => $vnp_Url
                );
                if (isset($_POST['method'])) {
                    header('Location: ' . $vnp_Url);
                    die();
                } else {
                    echo json_encode($returnData);
                }
            } else {
                toast()->success('Đặt hàng thành công!');
                $cart->remove();
                return redirect()->route('home');
            }
        }
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
        // Filter
        $orderBy = $request->input('orderBy');
        $products = Product::where([
            ['category_id', '=', $id],
            ['status', '=', 1]
        ]);
        if ($orderBy == 'default') {
            $products = $products->orderBy('price', 'ASC')->get();
        } else if ($orderBy == 'latest') {
            $products = $products->orderBy('id', 'DESC')->get();
        } else if ($orderBy == 'low_price') {
            $products = $products->orderBy('price', 'ASC')->get();
        } else if ($orderBy == 'high_price') {
            $products = $products->orderBy('price', 'DESC')->get();
        } else {
            $products = $products->get();
        }
        return view('product_category', compact('products', 'cats', 'category_find'));
    }
    // Tìm kiếm - POST
    function search(Request $request)
    {
        $data = $request->all();
        $key = $request->key;
        $cats = Category::all();
        $products = Product::where('name', 'like', '%' . $key . '%')->orderByDesc('id')->get();
        return view('search', compact('products', 'cats', 'key'));
    }
    // Trang giới thiệu
    function about()
    {
        return view('about');
    }
    // Trang liên hệ
    function contact()
    {
        $post_new = Post::orderByDesc('id')->take(5)->get();
        return view('contact', compact('post_new'));
    }
    function store_contact(Request $request)
    {
        Mail::send(
            'email.contact',
            [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'content' => $request->content
            ],
            function ($mail) use ($request) {
                $mail->to('parunitashi@gmail.com');
                $mail->from($request->email);
                $mail->subject('Có liên hệ mới!');
            }
        );
        return back();
    }
    // Trang bài viết
    function new()
    {
        $posts = Post::all();
        $post_new = Post::orderByDesc('id')->take(5)->get();
        return view('new', compact('posts', 'post_new'));
    }
    // Chi tiết bài viết
    function new_detail($id)
    {
        $new_detail = null;
        if ($id) {
            $new_detail = Post::find($id);
            $comments = Comment::where('post_id', $new_detail->id)->orderByDesc('id')->get();
            $new_detail->increment('views', 1);
            $new_detail->save();
        }
        $post_new = Post::orderByDesc('id')->get();
        return view('new_detail', compact(['new_detail', 'post_new', 'comments']));
    }
    // Customer
    function info()
    {
        $cus = Auth::user();
        return view('customer.info', compact('cus'));
    }
    function store_info(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        $file = $request->file('avatar');
        if ($file) {
            $filename = $file->hashName();
            $file->storeAs('/public/avatars', $filename);
            $data['avatar'] = $filename;
        }

        $cus = Auth::user();

        $password = $request->password;

        if ($password) {
            $request->validate([
                'password' => 'min:6',
                'confirm_password' => 'required|same:password'
            ], [], [
                'password' => 'Mật khẩu',
                'confirm_password' => 'Mật khẩu nhập lại'
            ]);
            $data['password'] = Hash::make($password);
        } else {
            $data['password'] = $cus->password;
        }

        unset($data['old_password']);
        unset($data['confirm_password']);

        User::whereId($cus->id)->update($data);
        return back();
    }
    // Đơn hàng
    function my_order($id = null)
    {
        $cus = Auth::user();

        $my_order = Order::where('user_id', $cus->id)->orderBy('id', 'desc')->get();
        $order_detail = null;

        if ($id) {
            $order_detail = OrderDetail::where('order_id', $id)->get();
        }
        return view('customer.my_order', compact('my_order', 'order_detail'));
    }
}
