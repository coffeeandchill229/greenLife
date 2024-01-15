<x-admin title="Banner-list">
<div class="row">
    <div class="col-4">
        <h6 class="badge bg-info">Thêm Banner</h6>
        <form action="{{ route('admin.banner.store', $banner_edit ? $banner_edit->id : '') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <x-input name="image" id="image" type="file" label="Hình ảnh" />
            <img id="preview_image" src="{{ $banner_edit ? '/storage/banner/' . $banner_edit->image : 'https://www.chanchao.com.tw/VietnamPrintPack/images/default.jpg' }}"
                width="60%" alt="banner"> <br>
            <button class="btn btn-sm btn-success mt-2">{{ $banner_edit ? 'Cập nhật' : 'Thêm' }}</button>
        </form>
    </div>
    <div class="col-lg-6 m-auto">
        <h6 class="badge bg-info">Danh Sách Banner</h6>
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>Ảnh</th>
                    <th>Ngày tạo</th>
                    <th>Người tạo</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banners as $item)
                    <tr style="vertical-align: middle;">
                        <th scope="row">{{ $item->id }}</th>
                        <td>
                            <img src="/storage/banner/{{ $item->image }}" class="img-thumbnail" width="80"
                                height="80" alt="">
                        </td>
                        <td>{{ $item->created_at->format('d/m/Y H:i:s') }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>
                            <a href="{{ route('admin.banner', $item->id) }}" class="btn btn-sm btn-warning"><i
                                    class="ri-quill-pen-line"></i></a>
                            <a href="{{ route('admin.banner.delete', $item->id) }}" class="btn btn-sm btn-danger"><i
                                    class="ri-delete-bin-line"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@section('script')
        <script>
            const file = document.querySelector("#image");
            const preview_image = document.querySelector("#preview_image");
            if(file) {
                file.onchange = (e) => {
                    let url = URL.createObjectURL(e.target.files[0]);
                    preview_image.src = url;
                }
            }
        </script>
    @endsection
</x-admin>
