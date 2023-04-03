<x-admin title="{{$post_edit ? 'Cập nhật' : 'Thêm'}} bài viết">
    <form action="{{route('admin.post.store',$post_edit ? $post_edit->id : '')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mb-2">
            <div class="col-6">
                <x-input name="title" value="{{$post_edit ? $post_edit->title : ''}}" label="Tiêu đề" />
                <div class="form-group">
                    <label class="form-label">Mô tả ngắn</label>
                    <textarea name="description" class="form-control" rows="4">{{$post_edit ? $post_edit->description : ''}}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Nội dung</label>
                    <textarea name="content" id="editor1" rows="5">{{$post_edit ? $post_edit->content : ''}}</textarea>
                    @error('content')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <x-input name="image" type="file" label="Hình ảnh" />
                <button class="btn btn-sm btn-success mt-3">{{$post_edit ? 'Cập nhật' : 'Thêm'}}</button>
            </div>
        </div>
    </form>
</x-admin>