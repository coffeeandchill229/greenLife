<x-admin title="{{$user_edit ? 'Edit' : 'Add'}}-User">
    <form action="{{route('admin.user.store',$user_edit ? $user_edit->id : '')}}" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <x-input name="name" label="Họ tên" value="{{$user_edit ? $user_edit->name : ''}}" />
                <x-input name="email" label="Email" value="{{$user_edit ? $user_edit->email : ''}}" />
                @if (!$user_edit)
                <x-input name="password" type="password" label="Mật khẩu" />
                <x-input name="confirm_password" type="password" label="Nhập lại mật khẩu" />
                @else
                <x-input name="old_password" type="password" label="Mật khẩu cũ (bỏ trống nếu không đổi)" />
                <x-input name="password" type="password" label="Mật khẩu mới (bỏ trống nếu không đổi)" />
                <x-input name="confirm_password" type="password" label="Nhập lại mật khẩu mới" />
                @endif
                <x-input name="avatar" type="file" label="Ảnh đại diện" />
                <a href="{{route('admin.user')}}" class="btn btn-sm btn-dark">Trở lại</a>
                <button class="btn btn-sm btn-success">Lưu</button>
            </div>
        </div>
    </form>
</x-admin>