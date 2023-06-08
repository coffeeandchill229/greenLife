<x-admin title="Categories">
    <div class="row">
        <div class="col-4">
            <h6 class="badge bg-info">Thêm Danh Mục</h6>
            <form action="{{ route('admin.category.store', $cat_edit ? $cat_edit->id : '') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <x-input name="name" label="Tên danh mục" value="{{ $cat_edit ? $cat_edit->name : '' }}" />
                <x-input name="image" type="file" label="Hình ảnh" />
                @if ($cat_edit)
                    <a href="{{ route('admin.category') }}" class="btn btn-dark btn-sm">Trở lại</a>
                    <button class="btn btn-sm btn-success">Cập nhật</button>
                @else
                    <button class="btn btn-sm btn-success">Thêm</button>
                @endif
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
                        <th class="text-center">Tổng sản phẩm</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cat as $item)
                        <tr style="vertical-align: middle;">
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>
                                @if ($item->image)
                                    <img src="/storage/images/{{ $item->image }}" class="img-thumbnail" width="80"
                                        height="80" alt="">
                                @else
                                    <span>Đang cập nhật...</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <span class="badge bg-dark">{{ $item->product->count() }}</span>
                            </td>
                            <td>
                                <a href="{{ route('admin.category', $item->id) }}" class="btn btn-sm btn-warning"><i
                                        class="ri-quill-pen-line"></i></a>
                                <a href="{{ route('admin.category.delete', $item->id) }}"
                                    class="btn btn-sm btn-danger"><i class="ri-delete-bin-line"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    {{-- D:\laravel_project\DoAnThucTap\storage\app\images --}}
                </tbody>
            </table>
        </div>
    </div>
</x-admin>
