<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function index()
    {
        return view('admin.login');
    }
    function dashboard()
    {
        // Doanh thu trong ngày hôm nay
        $revenue_today = DB::table('orders')->where('created_at', '>=', Carbon::today())->sum('total');
        // Doanh thu tổng
        $total_revenue = DB::table('orders')->sum('total');
        // Sản phẩm bán chạy
        $best_selling = DB::table('products')
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->selectRaw('products.name,products.created_at,products.image,products.price,products.stock, sum(order_details.quantity) as sold')
            ->groupBy('order_details.product_id')
            ->orderByDesc('sold')
            ->paginate(5);
        // Đơn hàng gần đây
        $recent_orders = Order::orderByDesc('id')->take(5)->get();

        $total_users = count(User::all());
        $total_customers = count(Customer::all());

        return view('admin.dashboard', compact([
            'best_selling',
            'revenue_today',
            'total_revenue',
            'total_users',
            'total_customers',
            'recent_orders'
        ]));
    }
    function store_login(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        $this->customValidate($data, [
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email' => 'Email',
            'password' => 'Password'
        ]);
        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }
        return back();
    }
    function register()
    {
        return view('admin.register');
    }
    function store_register(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        $rules = [
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password|min:6'
        ];
        $messages = [
            'email' => 'Email',
            'name' => 'Name',
            'password' => 'Password',
            'confirm_password' => 'Confirm Password'
        ];
        $this->customValidate($data, $rules, $messages);

        $data['password'] = Hash::make($request->password);
        unset($data['confirm_password']);

        $user = User::create($data);
        $user->save();
        return redirect()->route('admin.login');
    }
    function logout(Request $request)
    {
        Auth::logout();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
