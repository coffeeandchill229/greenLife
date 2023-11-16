<x-admin title="List-Comment">
    <div class="row mt-3">
        <div class="col">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nội dung</th>
                        <th>Bài viết</th>
                        <th>Tác giả</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $item)
                        <tr class="align-middle">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->content }}</td>
                            <td><a href="{{ route('new_detail', $item->post->id) }}">{{ $item->post->title }}</a></td>
                            <td>{{ $item->customer->name }}</td>
                            <td>
                                <a href="{{ route('home.comment.delete', $item->id) }}" class="btn btn-sm btn-danger"><i
                                        class="ri-delete-bin-fill"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin>
