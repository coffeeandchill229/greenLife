<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    function login()
    {
        return view('customer.login');
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
            'password' => 'Mật khẩu'
        ]);

        if (Auth::guard('customer')->attempt($data)) {
            if (Auth::guard('customer')->user()->banned != 0) {
                $request->session()->regenerate();
                alert()->success('Đăng nhập thành công!');
                return redirect()->route('home');
            } else {
                Auth::guard('customer')->logout();
                $request->session()->regenerateToken();
                return redirect()->route('home.login')->with('error', 'Tài khoản của bạn đã bị cấm!');
            }
        }

        return back();
    }
    function register()
    {
        return view('customer.register');
    }
    function store_register(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        $rules = [
            'email' => 'required|email|unique:customers,email',
            'name' => 'required',
            'phone' => 'required|unique:customers,phone',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password|min:6'
        ];
        $messages = [
            'email' => 'Email',
            'name' => 'Họ tên',
            'phone' => 'Điện thoại',
            'password' => 'Mật khẩu',
            'confirm_password' => 'Nhập lại mật khẩu'
        ];
        $this->customValidate($data, $rules, $messages);

        $data['password'] = Hash::make($request->password);
        unset($data['confirm_password']);

        $user = Customer::create($data);
        $user->save();
        return redirect()->route('home.login');
    }
    function logout(Request $request)
    {
        Auth::guard('customer')->logout();

        $request->session()->regenerateToken();

        return redirect()->route('home.login');
    }
    // Manager
    function index()
    {
        $customers = Customer::orderByDesc('id')->get();
        return view('admin.customer.index', compact('customers'));
    }
    function edit($id = null)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.customer.edit', compact('customer'));
    }
    function delete($id = null)
    {
        $customer = Customer::findOrFail($id);
        if ($customer->order->count() > 0 || $customer->comment->count() > 0 || $customer->reply->count() > 0) {
            alert()->warning('Xóa không thành công!');
            return back();
        }
        $customer->delete();
        return back();
    }

    function store(Request $request, $id = null)
    {
        $data = $request->all();
        unset($data['_token']);

        $cus = Customer::findOrFail($id);
        $password = $request->password;

        $file = $request->file('avatar');
        if ($file) {
            $filename = $file->hashName();
            $file->storeAs('/public/avatars', $filename);
            $data['avatar'] = $filename;
        }
        if ($request->banned) {
            $data['banned'] = 0;
            Auth::guard('customer')->logout();

            $request->session()->regenerateToken();
        } else {
            $data['banned'] = 1;
        }

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

        $cus->update($data);
        return back();
    }
}
