<x-admin title="{{ $product_edit ? 'Cập nhật' : 'Thêm' }} sản phẩm">
    <form action="{{ route('admin.product.store', $product_edit ? $product_edit->id : '') }}" method="post"
        enctype="multipart/form-data">
        <div class="row">
            @csrf
            <div class="col-6">
                <x-input name="name" label="Tên sản phẩm" value="{{ $product_edit ? $product_edit->name : '' }}" />
                <x-input name="price" label="Giá" value="{{ $product_edit ? $product_edit->price : '' }}" />
                <x-input name="stock" type="number" label="Tồn kho"
                    value="{{ $product_edit ? $product_edit->stock : '' }}" />
                <div class="form-group">
                    <label class="form-label">Mô tả</label>
                    <textarea name="description" id="editor1" cols="30" rows="10">{{ $product_edit ? $product_edit->description : old('description') }}</textarea>
                    @error('description')
                        <p class="text-danger m-0">{{ $message }}</p>
                    @enderror
                </div>
                <a class="btn btn-sm btn-dark mt-3" href="{{ route('admin.product') }}">Trở về</a>
                <button class="btn btn-sm btn-success mt-3">Lưu</button>
            </div>
            <div class="col-6">
                <x-select-category category_id="{{ $product_edit ? $product_edit->category_id : '' }}" />
                <x-input name="image" type="file" label="Ảnh sản phẩm" />
                <div class="form-group">
                    <label for="" class="form-label">Trạng thái</label>
                </div>
            </div>
        </div>
    </form>
</x-admin>
