<x-admin title="Product-list">
    <div class="row">
        <div class="col-12">
            <a href="{{route('admin.product.addOrUpdate')}}" class="btn btn-sm btn-success">Thêm mới</a>
        </div>
        <div class="col-12 mt-3">
            <h6 class="badge bg-info">Danh Sách Sản Phẩm</h6>
            <!-- Striped Rows -->
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tồn kho</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                    <tr style="vertical-align: middle;">
                        <td>{{$item->id}}</td>
                        <th>{{$item->name}}</th>
                        <td>{{number_format($item->price)}}</td>
                        <td>
                            <img src="/storage/products/{{$item->image}}" width="100" height="100" alt="">
                        </td>
                        <td>{{$item->stock}}</td>
                        <td>{{$item->category->name}}</td>
                        <td>
                            <a href="{{route('admin.product.addOrUpdate',$item->id)}}" class="btn btn-sm btn-warning"><i
                                    class="ri-quill-pen-line"></i></a>
                            <a href="{{route('admin.product.delete',$item->id)}}" class="btn btn-sm btn-danger"><i
                                    class="ri-delete-bin-line"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$products->links()}}
        </div>
    </div>
</x-admin>