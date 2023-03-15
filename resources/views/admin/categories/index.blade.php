<x-admin title="Categories">
    <div class="row">
        <div class="col-4">
            <h6 class="badge bg-info">Thêm Danh Mục</h6>
            <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <x-input name="name" label="Tên danh mục"/>
                <x-input name="image" type="file" label="Hình ảnh"/>
                <button class="btn btn-sm btn-success">Thêm</button>
            </form>
        </div>
        <div class="col-lg-6 m-auto">
            <h6 class="badge bg-info">Danh Sách Danh Mục</h6>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên</th>
                        <th>Ảnh</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cat as $item)
                    <tr style="vertical-align: middle;">
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->name}}</td>
                        <td>
                            <img src="/storage/images/{{$item->image}}" class="img-thumbnail" width="80" height="80" alt="">
                        </td>
                        <td>
                            <a href="" class="btn btn-sm btn-info"><i class="ri-eye-line"></i></a>
                            <a href="" class="btn btn-sm btn-warning"><i class="ri-quill-pen-line"></i></a>
                            <a href="" class="btn btn-sm btn-danger"><i class="ri-delete-bin-line"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    {{-- D:\laravel_project\DoAnThucTap\storage\app\images --}}
                </tbody>
            </table>
        </div>
    </div>
</x-admin>