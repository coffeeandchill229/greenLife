<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    function login(){
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
            'password' => 'Password'
        ]);
        if (Auth::guard('customer')->attempt($data)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }
        return back();
    }
    function register(){
        return view('customer.register');
    }
    function store_register(Request $request){
        $data = $request->all();
        unset($data['_token']);

        $rules = [
            'email'=>'required|email',
            'name'=>'required',
            'password'=>'required|min:6',
            'confirm_password'=>'required|same:password|min:6'
        ];
        $messages = [
            'email'=>'Email',
            'name'=>'Họ tên',
            'password'=>'Mật khẩu',
            'confirm_password'=>'Nhập lại mật khẩu'
        ];
        $this->customValidate($data,$rules,$messages);

        $data['password'] = Hash::make($request->password);
        unset($data['confirm_password']);

        $user = Customer::create($data);
        $user->save();
        return redirect()->route('home.login');
        
    }
    function logout(Request $request){
        Auth::guard('customer')->logout();
      
        $request->session()->regenerateToken();
     
        return redirect()->route('home.login');
    }
    // Manager
    function index(){
        $customers = Customer::orderByDesc('id')->get();
        return view('admin.customer.index',compact('customers'));
    }
}
