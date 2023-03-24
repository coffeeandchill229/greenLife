<x-admin title="Order-status">
    <div class="row">
        <div class="col-4">
            <h6 class="badge bg-info">Thêm trạng thái</h6>
            <form action="{{route('admin.order_status.store')}}" method="post">
                @csrf
                <x-input name="name" label="Tên trạng thái" />
                <div class="form-group my-2">
                    <label class="form-label">Màu sắc</label> <br>
                    <input name="color" checked type="radio" value="#0275d8" />
                    <div style="background: #0275d8; width: 30px; height: 30px; display: inline-block; border-radius: 50%;"></div>
                    <input name="color" checked type="radio" value="#5bc0de" />
                    <div style="background: #5bc0de; width: 30px; height: 30px; display: inline-block; border-radius: 50%;"></div>
                    <input name="color" type="radio" value="#5cb85c" />
                    <div style="background: #5cb85c; width: 30px; height: 30px; display: inline-block; border-radius: 50%;"></div>
                    <input name="color" type="radio" value="#f0ad4e" />
                    <div style="background: #f0ad4e; width: 30px; height: 30px; display: inline-block; border-radius: 50%;"></div> 
                    <input name="color" type="radio" value="#d9534f" />
                    <div style="background: #d9534f; width: 30px; height: 30px; display: inline-block; border-radius: 50%;"></div> 
                </div>
                {{-- @if ($cat_edit)
                <a href="{{route('admin.category')}}" class="btn btn-dark btn-sm">Trở lại</a>
                <button class="btn btn-sm btn-success">Cập nhật</button>
                @else
                @endif --}}
                <button class="btn btn-sm btn-success">Thêm</button>
            </form>
        </div>
        <div class="col-lg-6 m-auto">
            <h6 class="badge bg-info">Danh Sách Trạng Thái</h6>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Màu sắc</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_status as $item)
                    <tr style="vertical-align: middle;">
                        <td scope="row">{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td><div style="background: {{$item->color}}; width: 30px; height: 30px; display: inline-block; border-radius: 50%;"></div> </td>
                        <td>
                            <a href="" class="btn btn-sm btn-warning"><i
                                    class="ri-quill-pen-line"></i></a>
                            <a href="" class="btn btn-sm btn-danger"><i
                                    class="ri-delete-bin-line"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin>