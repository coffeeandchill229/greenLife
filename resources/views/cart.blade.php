<x-only-header title="Giỏ hàng">
    <div class="row py-5">
        <h4 class="text-center mb-5">GIỎ HÀNG CỦA BẠN</h4>
        <div class="col-7">
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
                    <tr style="vertical-align: middle;">
                        <td class="d-flex align-items-center justify-content-around">
                            <a href="" class="text-danger"><i class="fas fa-times"></i></a>
                            <img src="https://9xgarden.com/wp-content/uploads/2022/12/cay-trong-khong-dat-de-ban-chau-kichirou-9xgarden-16-300x300.jpg"
                                width="60" height="60" alt="">
                            <span>SẢN PHẨM DEMO</span>
                        </td>
                        <td>500.000 VND</td>
                        <td>
                            <input type="number" class="form-control w-75" value="5" min="1" max="10">
                        </td>
                        @php
                        function getPrice($price,$amount){
                        return number_format($price*$amount);
                        }
                        @endphp
                        <td>{{getPrice(500000,5)}}</td>
                    </tr>
                    <tr>
                        <td><a href="" class="btn btn-outline-success"><i class="fas fa-long-arrow-left me-1"></i> Tiếp
                                tục xem sản phẩm</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-5">
            <table class="table">
                <thead>
                    <tr>
                        <th class="fw-bold">CỘNG GIỎ HÀNG</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tạm tính</td>
                        <td>1.000.000 VND</td>
                    </tr>
                    <tr>
                        <td>Tổng</td>
                        <td>1.000.000 VND</td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{route('home.checkout')}}" class="btn btn-success">Tiến
                                hành thanh toán</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-only-header>