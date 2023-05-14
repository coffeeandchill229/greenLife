<x-only-header title="Giỏ hàng">
    <div class="row py-5">
        <h4 class="text-center text-success mb-5">GIỎ HÀNG CỦA BẠN</h4>
        @if (count($cart->items) > 0)
            <div class="col-lg-8 col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="fw-bold">SẢN PHẨM</th>
                            <th class="fw-bold">GIÁ</th>
                            <th class="fw-bold">SỐ LƯỢNG</th>
                            <th class="fw-bold">TẠM TÍNH</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{ route('cart.update') }}" method="post">
                            @csrf
                            @foreach ($cart->items as $item)
                                <tr class="cart_item" style="vertical-align: middle;">
                                    <td class="d-flex align-items-center">
                                        <a href="{{ route('cart.delete', $item['id']) }}" class="text-danger"><i
                                                class="fas fa-times"></i></a>
                                        <img class="mx-3" src="/storage/products/{{ $item['image'] }}" width="60"
                                            height="60" alt="">
                                        <span>{{ $item['name'] }}</span>
                                    </td>
                                    <td class="fw-bold">{{ number_format($item['price']) }} <sup>đ</sup></td>
                                    <td>
                                        <input type="number" class="form-control w-75" name="{{ $item['id'] }}"
                                            value="{{ $item['quantity'] }}" min="1" max="10">
                                    </td>
                                    <td class="fw-bold">{{ number_format($item['price'] * $item['quantity']) }}
                                        <sup>đ</sup>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4">
                                    <a href="{{ route('home') }}" class="btn btn-outline-success"><i
                                            class="fas fa-long-arrow-left me-1"></i> Tiếp
                                        tục xem sản phẩm</a>
                                    <button class="btn btn-success"><i class="fas fa-save me-1"></i> Cập nhật giỏ
                                        hàng</button>
                                    <a href="{{ route('cart.remove') }}" class="btn btn-danger">
                                        <i class="fas fa-trash-alt me-1"></i> Xóa tất cả</a>
                                </td>
                            </tr>
                        </form>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4 col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="fw-bold">CỘNG GIỎ HÀNG</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tạm tính</td>
                            <td class="fw-bold">{{ number_format($cart->total_price) }} <sup>đ</sup></td>
                        </tr>
                        <tr>
                            <td>Tổng</td>
                            <td class="fw-bold">{{ number_format($cart->total_price) }} <sup>đ</sup></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="{{ route('home.checkout') }}" class="btn btn-success">Tiến
                                    hành thanh toán</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-danger text-center">Chưa có sản phẩm nào trong giỏ hàng!</p>
            <a href="{{ route('home') }}" class="btn btn-outline-success w-25"><i
                    class="fas fa-long-arrow-left me-1"></i>
                Quay về trang chủ</a>
        @endif
    </div>
</x-only-header>
