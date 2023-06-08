<x-admin title="User-list">
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.user.addOrUpdate') }}" class="btn btn-sm btn-primary">Thêm mới</a>
        </div>
        <div class="col-12 mt-3">
            <form method="get" action="{{ route('admin.user') }}">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <select name="is_customer" id="is_customer" class="form-select">
                                @php
                                    $is_customer = $_REQUEST['is_customer'] ?? 0;
                                @endphp
                                <option {{ $is_customer == 0 ? 'selected' : '' }} value="0">Khách hàng
                                </option>
                                <option {{ $is_customer == 1 ? 'selected' : '' }} value="1">Quản trị viên
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button class="btn btn-sm btn-primary h-100">Lọc</button>
                    </div>
                </div>
            </form>

            <!-- Striped Rows -->
            <table class="table table-striped table-hover table-bordered mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Avatar</th>
                        <th>Tên nhân viên</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Đăng ký lúc</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr style="vertical-align: middle;">
                            <td>{{ $item->id }}</td>
                            <td>
                                <img src="/storage/avatars/{{ $item->avatar }}" class="rounded-circle" width="70"
                                    height="70" alt="">
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->created_at->format('H:i:s - d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('admin.user.addOrUpdate', $item->id) }}"
                                    class="btn btn-sm btn-warning"><i class="ri-quill-pen-line"></i></a>
                                <a href="{{ route('admin.user.delete', $item->id) }}" class="btn btn-sm btn-danger"><i
                                        class="ri-delete-bin-line"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin>
