<x-admin title="Order-list">
    <div class="row">
        <div class="col-12 mt-3">
            <h6 class="badge bg-info">Danh Sách Đơn Hàng</h6>
            <!-- Striped Rows -->
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên khách hàng</th>
                        <th>Ghi chú</th>
                        <th>Phương thức thanh toán</th>
                        <th>Số lượng SP</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                    <tr style="vertical-align: middle;">
                        <td>{{$item->id}}</td>
                        <td class="d-flex align-items-center">
                            <img src="/storage/avatars/{{$item->customer->avatar}}" class="rounded-circle" width="40"
                                height="40" alt="">
                            <div class="ms-2">
                                <span>{{$item->customer->name}}</span> <br>
                                <span>{{$item->customer->email}}</span> <br>
                                <span>{{$item->customer->phone}}</span>
                            </div>
                        </td>
                        <td>{{$item->note}}</td>
                        <td>{{$item->method == 0 ? 'Thanh toán khi nhận hàng' : 'Chuyển khoản ngân hàng'}}</td>
                        <td>{{$item->order_detail->count()}}</td>
                        <td>
                            <span class="badge"
                                style="background: {{$item->status->color}};">{{$item->status->name}}</span>
                        </td>
                        <td>
                            <a href="{{route('admin.order.detail',$item->id)}}" class="btn btn-sm btn-info"><i
                                    class="ri-eye-line"></i></a>
                            <a href="{{route('admin.order.update',$item->id)}}" class="btn btn-sm btn-warning"><i
                                    class="ri-edit-line"></i></a>
                            <a href="{{route('admin.order.delete',$item->id)}}" class="btn btn-sm btn-danger"><i
                                    class="ri-delete-bin-line"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin>