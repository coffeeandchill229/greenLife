<x-admin title="Post-list">
    <a href="{{route('admin.post.addOrUpdate')}}" class="btn btn-sm btn-success">Thêm mới</a>
    <div class="row mt-3">
        <div class="col">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Ảnh</th>
                        <th>Tiêu đề</th>
                        <th>Mô tả</th>
                        <th>Tác giả</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $item)
                    <tr class="align-middle">
                        <td>{{$item->id}}</td>
                        <td>
                            <img src="/storage/posts/{{$item->image}}" class="img-thumbnail" width="90" height="90"
                                alt="">
                        </td>
                        <td class="w-25">{{$item->title}}</td>
                        <td class="w-25">{{$item->description}}</td>
                        <td>{{$item->user->name}}</td>
                        <td>
                            <a href="{{route('admin.post.addOrUpdate',$item->id)}}" class="btn btn-sm btn-warning"><i
                                    class="ri-edit-fill"></i></a>
                            <a href="" class="btn btn-sm btn-danger"><i class="ri-delete-bin-fill"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin>