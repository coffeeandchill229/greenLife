<x-only-header title="Danh mục - {{ $category_find->name }}">
    <div class="row my-4">
        <div class="col-lg-3 col-12 mb-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="category">
                        <ul class="list-group rounded-0">
                            <li class="list-group-item text-light" style="background-color: var(--header_color)"
                                aria-current="true">
                                <i class="fas fa-bars"></i> <span>DANH MỤC SẢN PHẨM</span>
                            </li>
                            @foreach ($cats as $item)
                                <li class="list-group-item">
                                    <a class="text-dark"
                                        href="{{ route('home.product_category', $item->id) }}">{{ $item->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6 d-none d-md-block mt-3">
                    <div class="news">
                        <ul class="list-group rounded-0">
                            <li class="list-group-item text-light" style="background-color: var(--header_color);;"
                                aria-current="true">
                                <i class="fas fa-earth"></i> <span>TIN TỨC MỚI NHẤT</span>
                            </li>
                            @if (count($news) > 0)
                                @foreach ($news as $item)
                                    <li class="list-group-item text-truncate">
                                        <img src="{{ asset('/storage/posts/' . $item->image) }}" width="35"
                                            alt="">
                                        <a class="text-dark" style="font-size: 13px;"
                                            href="{{ route('new_detail', $item->id) }}">{{ $item->title }}</a>
                                    </li>
                                @endforeach
                            @else
                                <p class="text-center py-2">Đang cập nhật...</p>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-12">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 d-none d-lg-block">
                    <ul class="d-flex align-items-center m-0 p-0 mb-2" style="list-style: none;">
                        <li><a href="{{ route('home') }}" class="text-secondary">Trang chủ</a></li>
                        <span class="mx-2">/</span>
                        <li><a class="text-secondary" href="">{{ $category_find->name }}</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-12 d-flex justify-content-end">
                    <div class="d-flex align-items-center">
                        <form action="" method="get">
                            <label class="me-2">Sắp xếp theo</label>
                            <select name="orderBy" class="p-1 rounded-3" style="outline: none;">
                                <option value="default">Thứ tự mặc định</option>
                                <option value="latest">Mới nhất</option>
                                <option value="low_price">Từ giá thấp đến cao</option>
                                <option value="high_price">Từ giá cao đến thấp</option>
                            </select>
                            <button class="btn btn-sm btn-dark"><i class="fas fa-filter"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                @if ($products->count() > 0)
                    @foreach ($products as $item)
                        <div class="product_item col-lg-3 col-md-4 col-6 mb-3">
                            <div class="card shadow" style="overflow: hidden;">
                                @if ($item->stock == 0)
                                    <div class="ribbon-corner">Đã hết hàng</div>
                                @endif
                                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                    <img src="/storage/products/{{ $item->image }}" width="270" height="270"
                                        style="object-fit: cover;" class="img-fluid" alt="" />
                                    <a href="{{ route('home.product_detail', $item->id) }}">
                                        <div class="mask" style="background-color: rgba(0, 0, 0, 0.05)"></div>
                                    </a>
                                </div>
                                <div class="card-body text-center px-0 py-2">
                                    <a href="{{ route('home.product_detail', $item->id) }}"
                                        class="card-title text-dark h6">{{ $item->name }}</a>
                                    <p class="card-text text-danger fw-bold">{{ number_format($item->price) }}
                                        <sup>đ</sup>
                                    </p>
                                </div>
                                @if ($item->stock > 0)
                                    <a class="text-light text-center py-2 bg-secondary btn_add_to_cart"
                                        data-id="{{ $item->id }}" style="cursor: pointer;">Thêm vào
                                        giỏ hàng</a>
                                @else
                                    <a href="{{ route('home.product_detail', $item->id) }}"
                                        class="text-light text-center py-2 bg-secondary" style="cursor: pointer;">Chi
                                        tiết</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-danger text-center">Không tìm thấy sản phẩm!</p>
                @endif
            </div>
        </div>
    </div>
</x-only-header>
