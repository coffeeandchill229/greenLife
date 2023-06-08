<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
    <div class="row py-5">
        <div class="col-5 m-auto bg-light border p-4">
            <h3 class="bg-success text-center py-4 text-light">Cảm ơn bạn đã đặt hàng!</h3>
            <div class="py-3">
                <p>Xin chào! {{ $order->customer->name }},</p>
                <p>Đơn hàng #{{ $order->id }} đã được đặt thành công và chúng tôi đang xử lý</p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->order_detail as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->product->price }} <sup>đ</sup></td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="fw-bold" colspan="2">Tổng cộng:</td>
                            <td>{{ $order->total }} <sup>đ</sup></td>
                        </tr>
                        <tr>
                            <td class="fw-bold" colspan="2">Phương thức thanh toán:</td>
                            <td>{{ $order->method == 0 ? 'Thanh toán bằng tiền mặt' : 'Chuyển khoản ngân hàng' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
