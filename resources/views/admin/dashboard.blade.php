<x-admin title="Dashboard">
    <h4 class="text-center text-primary">Welcome! {{Auth::user()->name}}</h4>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card card-height-100">
                <div class="card-body">
                    <div class="float-end">
                        <div class="dropdown card-header-dropdown">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span class="text-muted fs-18"><i class="mdi mdi-dots-vertical align-middle"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Today</a>
                                <a class="dropdown-item" href="#">Last Week</a>
                                <a class="dropdown-item" href="#">Last Month</a>
                                <a class="dropdown-item" href="#">Current Year</a>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-primary rounded fs-3">
                                <i class="bx bx-dollar-circle"></i>
                            </span>
                        </div>
                        <div class="flex-grow-1 ps-3">
                            <h5 class="text-muted text-uppercase fs-13 mb-0">Tổng doanh thu</h5>
                        </div>
                    </div>
                    <div class="mt-4 pt-1">
                        <h4 class="fs-22 fw-semibold ff-secondary mb-0"><span class="counter-value"
                                data-target="10000000"></span>VND</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Sản phẩm bán chạy nhất</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                            <tbody>
                                @foreach ($best_selling->take(5) as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm bg-light rounded p-1 me-2">
                                                <img src="/storage/products/{{$item->image}}" alt=""
                                                    class="img-fluid d-block">
                                            </div>
                                            <div>
                                                <h5 class="fs-14 my-1"><a href="apps-ecommerce-product-details.html"
                                                        class="text-reset">{{$item->name}}</a></h5>
                                                <span class="text-muted">{{$item->created_at}}1</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5 class="fs-14 my-1 fw-normal">{{number_format($item->price)}}</h5>
                                        <span class="text-muted">VND</span>
                                    </td>
                                    <td>
                                        <h5 class="fs-14 my-1 fw-normal">62</h5>
                                        <span class="text-muted">Đơn đặt hàng</span>
                                    </td>
                                    <td>
                                        <h5 class="fs-14 my-1 fw-normal">{{$item->stock}}</h5>
                                        <span class="text-muted">Tồn kho</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="align-items-center mt-4 pt-2 justify-content-between d-flex">
                        <div class="flex-shrink-0">
                            <div class="text-muted">
                                Hiển thị <span class="fw-semibold">5</span> của <span
                                    class="fw-semibold">{{$best_selling->count()}}</span>
                                Kết quả
                            </div>
                        </div>
                        <ul class="pagination pagination-separated pagination-sm mb-0">
                            <li class="page-item disabled">
                                <a href="#" class="page-link">←</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">1</a>
                            </li>
                            <li class="page-item active">
                                <a href="#" class="page-link">2</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">3</a>
                            </li>
                            <li class="page-item">
                                <a href="#" class="page-link">→</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Đơn hàng gẩn đây</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                            <thead class="text-muted table-light">
                                <tr>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Khách hàng</th>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="apps-ecommerce-order-details.html"
                                            class="fw-medium link-primary">01</a>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-2">
                                                <img src="assets/images/users/avatar-1.jpg" alt=""
                                                    class="avatar-xs rounded-circle shadow">
                                            </div>
                                            <div class="flex-grow-1">Alex Smith</div>
                                        </div>
                                    </td>
                                    <td>Clothes</td>
                                    <td>
                                        <span class="text-success">$109.00</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-soft-success">Paid</span>
                                    </td>
                                </tr><!-- end tr -->
                            </tbody><!-- end tbody -->
                        </table><!-- end table -->
                    </div>
                </div>
            </div> <!-- .card-->
        </div>
    </div>
</x-admin>