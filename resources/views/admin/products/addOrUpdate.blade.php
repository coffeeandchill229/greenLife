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
                <x-input name="image" id="image" type="file" label="Ảnh sản phẩm" />
                <img id="preview_image" src="{{ $product_edit ? '/storage/products/' . $product_edit->image : 'https://www.chanchao.com.tw/VietnamPrintPack/images/default.jpg' }}"
                width="45%" alt="product">
            </div>
        </div>
    </form>
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
