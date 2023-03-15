<x-admin title="Thêm sản phẩm">
    <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
        <div class="row">
            @csrf
            <div class="col-6">
                <x-input name="name" label="Tên sản phẩm" />
                <x-input name="price" label="Giá" />
                <x-input name="stock" type="number" label="Tồn kho" />
                <div class="form-group">
                    <label class="form-label">Mô tả</label>
                    <textarea name="description" class="form-control">{{old('description')}}</textarea>
                    @error('description')
                        <p class="text-danger m-0">{{$message}}</p>
                    @enderror
                </div>
                <button class="btn btn-sm btn-success mt-2">Lưu</button>
            </div>
            <div class="col-6">
                <x-select-category/>

                <x-input name="image" type="file" label="Ảnh sản phẩm" />
            </div>
        </div>
    </form>
</x-admin>