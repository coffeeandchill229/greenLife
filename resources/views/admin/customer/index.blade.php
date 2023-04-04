<x-admin title="Customer-list">
    <div class="row">
        <div class="col-12">
            <a href="" class="btn btn-sm btn-success">Thêm mới</a>
        </div>
        <div class="col-12 mt-3">
            <h6 class="badge bg-info">Danh Sách Khách Hàng</h6>
            <!-- Striped Rows -->
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Avatar</th>
                        <th>Tên khách hàng</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Đăng ký lúc</th>
                        <th>Chặn</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $item)
                    <tr style="vertical-align: middle;">
                        <td>{{$item->id}}</td>
                        <td>
                            <img src="/storage/avatars/{{$item->avatar}}" class="rounded-circle" width="70" height="70"
                                alt="">
                        </td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->created_at->format('H:i:s - d/m/Y')}}</td>
                        <td>
                            @if ($item->banned == 0)
                            <i class="ri-check-fill text-success fw-bold"></i>
                            @else
                            <i class="ri-close-fill text-danger fw-bold"></i>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('admin.customer.edit',$item->id)}}" class="btn btn-sm btn-warning"><i
                                    class="ri-quill-pen-line"></i></a>
                            <a href="{{route('admin.product.delete',$item->id)}}" class="btn btn-sm btn-danger"><i
                                    class="ri-delete-bin-line"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin>