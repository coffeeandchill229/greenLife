<x-admin title="Product-list">
    <div class="row">
        <div class="col-12 mt-3">
            <div class="row">
                <div class="col-8">
                    <form method="GET">
                        <div class="row">
                            <div class="col-3">
                                <input type="text" name="key" value="{{ old('key') }}" class="form-control"
                                    placeholder="Tìm kiếm sản phẩm...">
                            </div>
                            <div class="col-3">
                                <select name="category_id" class="form-select" id="">
                                    <option value="" disabled selected>Chọn một danh mục</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                                <button class="btn btn-sm btn-secondary h-100 px-3"><i
                                        class="ri-search-line"></i></button>
                                @if (isset($_REQUEST['key']))
                                    <button class="btn btn-sm btn-dark h-100 px-3">
                                        <a href="{{ route('admin.product') }}" class="text-light"><i
                                                class="ri-arrow-go-back-line"></i></a>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-4 text-end">
                    <a href="{{ route('admin.product.addOrUpdate') }}" class="btn btn-sm btn-secondary">Thêm mới</a>
                </div>
            </div>
            <!-- Striped Rows -->
            <div class="row shadow mt-3">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Tồn kho</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr style="vertical-align: middle;">
                                <td>{{ $item->id }}</td>
                                <th>{{ $item->name }}</th>
                                <td>{{ number_format($item->price) }}</td>
                                <td>
                                    <img src="/storage/products/{{ $item->image }}" width="100" height="100"
                                        alt="">
                                </td>
                                <td>{{ $item->stock }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input value="{{ $item->id }}" class="form-check-input product_active_btn"
                                            type="checkbox" role="switch" {{ $item->status == 1 ? 'checked' : '' }} />
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('admin.product.addOrUpdate', $item->id) }}"
                                        class="btn btn-sm btn-warning"><i class="ri-quill-pen-line"></i></a>
                                    <a href="{{ route('admin.product.delete', $item->id) }}"
                                        class="btn btn-sm btn-danger"><i class="ri-delete-bin-line"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="my-2">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</x-admin>
