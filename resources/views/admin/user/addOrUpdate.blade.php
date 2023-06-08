<x-admin title="{{ $user_edit ? 'Edit' : 'Add' }}-User">
    <form action="{{ route('admin.user.store', $user_edit ? $user_edit->id : '') }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <x-input name="name" label="Họ tên" value="{{ $user_edit ? $user_edit->name : '' }}" />
                <x-input name="email" label="Email" value="{{ $user_edit ? $user_edit->email : '' }}" />
                <x-input name="address" label="Địa chỉ" value="{{ $user_edit ? $user_edit->address : '' }}" />
                <x-input name="phone" label="Điện thoại" value="{{ $user_edit ? $user_edit->phone : '' }}" />
                <x-input name="avatar" type="file" label="Ảnh đại diện" />
                <div class="form-group">
                    <label for="is_customer" class="form-label">Vai trò</label>
                    <select name="is_customer" class="form-select" id="is_customer">
                        @if ($user_edit)
                            <option {{ $user_edit->is_customer == 0 ? 'selected' : '' }} value="0">Khách hàng
                            </option>
                            <option {{ $user_edit->is_customer == 1 ? 'selected' : '' }} value="1">Quản trị viên
                            </option>
                        @else
                            <option value="0">Khách hàng</option>
                            <option value="1">Quản trị viên</option>
                        @endif
                    </select>
                </div>
                <div class="form-group mt-3">
                    <a href="{{ route('admin.user') }}" class="btn btn-sm btn-dark">Trở lại</a>
                    <button class="btn btn-sm btn-success">Lưu</button>
                </div>
            </div>
            <div class="col-6">
                @if (!$user_edit)
                    <x-input name="password" type="password" label="Mật khẩu" />
                    <x-input name="confirm_password" type="password" label="Nhập lại mật khẩu" />
                @else
                    <x-input name="old_password" type="password" label="Mật khẩu cũ (bỏ trống nếu không đổi)" />
                    <x-input name="password" type="password" label="Mật khẩu mới (bỏ trống nếu không đổi)" />
                    <x-input name="confirm_password" type="password" label="Nhập lại mật khẩu mới" />
                @endif
            </div>
        </div>
    </form>
</x-admin>
