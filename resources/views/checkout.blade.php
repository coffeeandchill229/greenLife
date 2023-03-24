<x-only-header title="Thanh toán">
    <form action="{{route('home.store_checkout')}}" method="post">
        @csrf
        <div class="row bg-white d-flex justify-content-between py-5">
            <h4 class="text-center text-success mb-5">THANH TOÁN</h4>

            <div class="col-6">
                <h6 class="fw-bold">THÔNG TIN THANH TOÁN</h6>
                <div class="form-group mb-2">
                    <label class="form-label">Họ tên</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">Địa chỉ</label>
                    <input type="address" name="address" class="form-control">
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">Số điện thoại</label>
                    <input type="phone" name="phone" class="form-control">
                    @error('phone')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{Auth::guard('customer')->user()->email}}"
                        class="form-control">
                    @error('email')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <h6 class="fw-bold mt-4">THÔNG TIN THANH TOÁN</h6>
                <div class="form-group mb-2">
                    <label class="form-label">Ghi chú</label>
                    <textarea class="form-control" name="note" id="" cols="30" rows="5"
                        placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay địa điểm giao hàng chi tiết hơn."></textarea>
                </div>
            </div>
            <div class="col-5 border border-1 border-success p-3">
                <h6 class="fw-bold">ĐƠN HÀNG CỦA BẠN</h6>
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="fw-bold">SẢN PHẨM</td>
                            <td class="fw-bold">TẠM TÍNH</td>
                        </tr>
                        @foreach ($cart->items as $item)
                        <tr>
                            <td>{{$item['name']}} x {{$item['quantity']}}</td>
                            <td>{{number_format($item['price'])}} <sup>đ</sup></td>
                        </tr>
                        @endforeach
                        <tr>
                            <td class="fw-bold">TỔNG</td>
                            <td>{{number_format($cart->total_price)}} <sup>đ</sup>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <h6 class="fw-bold">CHỌN PHƯƠNG THỨC THANH TOÁN</h6>
                <div class="form group">
                    <input type="radio" name="method" checked value="0" class="mt-3"> <span>Trả tiền mặt khi nhận
                        hàng</span> <br>
                    <input type="radio" name="method" value="1" class="mt-3"> <span>Chuyển khoản ngân hàng</span>
                </div>
                <button class="btn btn-success mt-3">ĐẶT HÀNG</button>
            </div>
        </div>
    </form>
</x-only-header>