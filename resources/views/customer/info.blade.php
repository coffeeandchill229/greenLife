<x-only-header title="Thông tin">
    <x-nav-account>
        <form action="{{ route('home.store_info') }}" method="post" enctype="multipart/form-data">
            <div class="row">
                @csrf
                <div class="col-6">
                    <h6 class="fw-bold">Tài khoản</h6>
                    <x-input name="name" value="{{ $cus->name }}" label="Họ tên" />
                    <x-input name="email" value="{{ $cus->email }}" label="Email" />
                    <x-input name="address" value="{{ $cus->address }}" label="Địa chỉ" />
                    <x-input name="phone" value="0{{ $cus->phone }}" label="Số điện thoại" />
                    <div class="form-group">
                        <label class="form-label">Ảnh đại diện</label>
                        <input name="avatar" onchange="changeAvatar(event)" id="avatar" class="form-control"
                            type="file" />
                    </div>
                </div>
                <div class="col-6">
                    <h6 class="fw-bold">Thay đổi mật khẩu</h6>
                    <x-input name="old_password" type="password" label="Mật khẩu cũ (bỏ trống nếu không đổi)" />
                    @if (Session::has('error'))
                        <p class="text-danger">{{ Session::get('error') }}</p>
                    @endif
                    <x-input name="password" type="password" label="Mật khẩu mới (bỏ trống nếu không đổi)" />
                    <x-input name="confirm_password" type="password" label="Xác nhận mật khẩu mới" />
                    <button class="btn btn-success btn-sm">Lưu thay đổi</button>
                </div>
            </div>
        </form>
    </x-nav-account>
</x-only-header>
