<x-admin title="User-list">
    <div class="row">
        <div class="col-12">
            <a href="{{route('admin.user.addOrUpdate')}}" class="btn btn-sm btn-success">Thêm mới</a>
        </div>
        <div class="col-12 mt-3">
            <h6 class="badge bg-info">Danh Sách Nhân Viên</h6>
            <!-- Striped Rows -->
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Avatar</th>
                        <th>Tên nhân viên</th>
                        <th>Email</th>
                        <th>Đăng ký lúc</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                    <tr style="vertical-align: middle;">
                        <td>{{$item->id}}</td>
                        <td>
                            <img src="/storage/avatars/{{$item->avatar}}" class="rounded-circle" width="70" height="70"
                                alt="">
                        </td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->created_at->format('H:i:s - d/m/Y')}}</td>
                        <td>
                            <a href="{{route('admin.user.addOrUpdate',$item->id)}}" class="btn btn-sm btn-warning"><i
                                    class="ri-quill-pen-line"></i></a>
                            <a href="{{route('admin.user.delete',$item->id)}}" class="btn btn-sm btn-danger"><i
                                    class="ri-delete-bin-line"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin>