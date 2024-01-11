<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    // Crud
    function index(Request $request)
    {
        $id = $request->is_customer;
        $users = null;
        if ($id) {
            $users = User::where('is_customer', $id)->orderByDesc('id')->get();
        } else {
            $users = User::where('is_customer', 0)->orderByDesc('id')->get();
        }
        return view('admin.user.index', compact('users'));
    }
    function delete($id)
    {
        $user = User::findOrFail($id);
        if ($user->post->count() > 0 || $user->comment->count() > 0 || $user->reply_comment->count() > 0) {
            alert()->warning('Xóa không thành công!');
            return back();
        }
        $user->delete();
        return back();
    }
    function addOrUpdate($id = null)
    {
        $user_edit = null;
        if ($id) {
            $user_edit = User::findOrFail($id);
        }
        return view('admin.user.addOrUpdate', compact('user_edit'));
    }
    function store(Request $request, $id = null)
    {
        $data = $request->all();
        unset($data['_token']);

        $file = $request->file('avatar');
        if ($file) {
            $filename = $file->hashName();
            $file->storeAs('/public/avatars', $filename);
            $data['avatar'] = $filename;
        }

        if ($id) {
            // Cập nhập
            if (!empty($request->old_password)) { // Nếu có nhập trường mật khẩu cũ
                // check đúng
                if (Hash::check($request->old_password, User::findOrFail($id)->password)) {
                    if (!empty($request->password)) {
                        $data['password'] = Hash::make($request->password);
                    } else {
                        $data['password'] = User::findOrFail($id)->password;
                    }
                }
            } else {
                // Không có nhập trường mật khẩu cũ thì lấy mật khẩu hiện tại
                $data['password'] = User::findOrFail($id)->password;
            }
            unset($data['old_password']);
        } else {
            // Thêm mới
            $this->customValidate($data, [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6',
                'confirm_password' => 'required|min:6|same:password'
            ], [
                'name' => 'Họ tên',
                'email' => 'Email',
                'password' => 'Mật khẩu',
                'confirm_password' => 'Nhập lại mật khẩu'
            ]);
            $data['password'] = Hash::make($request->password);
        }

        unset($data['confirm_password']);
        User::updateOrCreate(['id' => $id], $data);

        if (!$id) {
            alert()->success('Thêm thành công!');
        } else {
            alert()->success('Cập nhật thành công!');
        }

        return back();
    }
    // Login - Register
    function login()
    {
        if (Auth::user()) {
            return redirect(route('home'));
        }
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
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            Alert::success('Đăng nhập thành công!');
            if (Auth::user()->is_customer == 1) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('home');
            }
        }
        Alert::warning('Tài khoản hoặc mật khẩu không đúng!');
        return back();
    }
    function register()
    {
        if (Auth::user()) {
            return redirect(route('home'));
        }
        return view('customer.register');
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

        return redirect()->route('home.login');
    }
    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerateToken();
        return redirect()->route('home.login');
    }
    // Info
    function info(){
        $user = auth()->user();
        return view('admin.user.info',compact('user'));
    }
}