<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function index()
    {
        $users = User::orderByDesc('id')->get();
        return view('admin.user.index', compact('users'));
    }
    function delete($id)
    {
        $user = User::findOrFail($id);
        if ($user->post->count() > 0) {
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
            if ($request->old_password) { // Nếu có nhập trường mật khẩu cũ
                // Kiểm tra mật khẩu cũ đúng không
                if (Hash::check($request->old_password, User::findOrFail($id)->password)) {
                    // Nếu đúng thì thay đổi
                    $data['password'] = Hash::make($request->password);
                } else {
                    alert()->warning('Mật khẩu cũ không đúng!');
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
        return back();
    }
}
