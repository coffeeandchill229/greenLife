<x-only-header title="Đơn hàng của tôi">
    <x-nav-account>
        <h6>Đơn hàng của bạn</h6>
        <table class="table align-middle table-stripped table-hover">
            @if (!$order_detail)
            <thead>
                <tr>
                    <th>Đơn hàng</th>
                    <th>Ngày</th>
                    <th>Tình trạng</th>
                    <th>Tổng</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($my_order as $od)
                <tr>
                    <td>#{{$od->id}}</td>
                    <td>{{$od->created_at->format('d/m/Y')}}</td>
                    <td>{{$od->status_id == 1 ? 'Đang xử lý' : $od->status->name}}</td>
                    <td>{{number_format($od->total)}}<sup>đ</sup></td>
                    <td><a href="{{route('home.my_order',$od->id)}}" class="btn btn-sm btn-success">Xem</a></td>
                </tr>
                @endforeach
            </tbody>
            @else
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order_detail as $item)
                <tr>
                    <td>#{{$item->id}}</td>
                    <td>
                        <img src="/storage/products/{{$item->product->image}}" width="60" height="60" alt="">
                        <span class="ms-2">{{$item->product->name}}</span>
                    </td>
                    <td>{{number_format($item->price)}} <sup>đ</sup></td>
                    <td>{{$item->quantity}}</td>
                </tr>
                @endforeach
            </tbody>
            @endif
        </table>
    </x-nav-account>
</x-only-header>