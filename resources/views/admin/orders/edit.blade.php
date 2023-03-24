<x-admin title="Order-Edit">
    <form action="{{route('admin.order.store',$order_edit->id)}}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <x-input name="name" label="Họ tên" value="{{$order_edit->name}}" />
                <x-input name="address" label="Địa chỉ" value="{{$order_edit->address}}" />
                <x-input name="phone" label="Điện thoại" value="{{$order_edit->phone}}" />
                <x-input name="email" label="Email" value="{{$order_edit->email}}" />
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="form-label">Phương thức thanh toán</label>
                    <select name="method" class="form-select" id="">
                        <option value="" disabled selected>Chọn một phương thức</option>
                        <option value="0">Thanh toán tiền mặt</option>
                        <option value="1">Chuyển khoản ngân hàng</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Trạng thái đơn hàng</label>
                    <select name="status_id" class="form-select" id="">
                        @foreach ($order_status as $item)
                        <option value="{{$item->id}}" {{$item->id == $order_edit->status_id ? 'selected' :
                            ''}}>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-sm btn-success mt-2">Cập nhật</button>
            </div>
        </div>
    </form>
    <a href="{{route('admin.order')}}" class="btn btn-sm btn-dark">Trở về</a>
</x-admin>