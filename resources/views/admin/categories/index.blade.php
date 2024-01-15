<x-admin title="Categories">
    <div class="row">
        <div class="col-4">
            <h6 class="badge bg-info">Thêm Danh Mục</h6>
            <form action="{{ route('admin.category.store', $cat_edit ? $cat_edit->id : '') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <x-input name="name" label="Tên danh mục" value="{{ $cat_edit ? $cat_edit->name : '' }}" />

                {{-- <div class="form-group">
                    <label class="form-label">Danh mục cha</label>
                    <select name="parent_id" class="form-select">
                        @foreach ($categories as $c)
                            @if ($c->parent_id === $c->id)
                                <option value="{{ $c->parent_id }}">--{{ $c->name }}</option>
                            @endif
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div> --}}

                <x-input name="image" id="image" type="file" label="Hình ảnh" />
                <img id="preview_image" src="{{ $cat_edit ? '/storage/images/' . $cat_edit->image : 'https://www.chanchao.com.tw/VietnamPrintPack/images/default.jpg' }}"
                width="30%" alt="product">

                <div class="mt-3">
                    @if ($cat_edit)
                        <a href="{{ route('admin.category') }}" class="btn btn-dark btn-sm">Trở lại</a>
                        <button class="btn btn-sm btn-success">Cập nhật</button>
                    @else
                        <button class="btn btn-sm btn-success">Thêm</button>
                    @endif
                </div>
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
    @section('script')
        <script>
            const file = document.querySelector("#image"); //lay ra the input
            const preview_image = document.querySelector("#preview_image");// lay re the img
            if(file) { // Check neu co file
                file.onchange = (e) => { // Check file co thay doi hay khong
                    let url = URL.createObjectURL(e.target.files[0]);
                    preview_image.src = url; //gan src cua img = url vua tao
                }
            }
        </script>
    @endsection
</x-admin>
