<x-admin title="Order-list">
    <div class="row">
        <form method="GET">
            <div class="row">
                <div class="col-3">
                    <input type="text" class="form-control" name="key"
                        placeholder="Tìm kiếm khách hàng, số điện thoại...">
                </div>
                <div class="col-2">
                    <button class="btn btn-sm btn-secondary h-100 px-3"><i class="ri-search-line"></i></button>
                    <button class="btn btn-sm btn-dark h-100 px-3">
                        <a href="{{ route('admin.order') }}" class="text-light"><i
                                class="ri-arrow-go-back-line"></i></a>
                    </button>
                </div>
            </div>
        </form>
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
                        <th class="text-center">Số lượng SP</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                        <tr style="vertical-align: middle;">
                            <td>{{ $item->id }}</td>
                            <td class="d-flex align-items-center">
                                <img src="/storage/avatars/{{ $item->user->avatar }}" class="rounded-circle"
                                    width="40" height="40" alt="">
                                <div class="ms-2">
                                    <ul class="ms-3 m-0 p-0">
                                        <li>{{ $item->user->name }}</li>
                                        <li>{{ $item->user->email }}</li>
                                        <li>{{ $item->user->phone }}</li>
                                        <li>{{ $item->user->address }}</li>
                                    </ul>
                                </div>
                            </td>
                            <td>{{ $item->note }}</td>
                            <td>{{ $item->method == 0 ? 'Thanh toán khi nhận hàng' : 'Chuyển khoản ngân hàng' }}</td>
                            <td class="text-center"><span
                                    class="badge bg-dark">{{ $item->order_detail->count() }}</span></td>
                            <td>
                                <span class="badge"
                                    style="background: {{ $item->status->color }};">{{ $item->status->name }}</span>
                            </td>
                            <td>
                                <a href="{{ route('admin.order.detail', $item->id) }}" class="btn btn-sm btn-info"><i
                                        class="ri-eye-line"></i></a>
                                <a href="{{ route('admin.order.update', $item->id) }}"
                                    class="btn btn-sm btn-warning"><i class="ri-edit-line"></i></a>
                                <a href="{{ route('admin.order.delete', $item->id) }}" class="btn btn-sm btn-danger"><i
                                        class="ri-delete-bin-line"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin>
