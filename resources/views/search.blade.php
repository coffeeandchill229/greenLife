<x-only-header title="Tìm kiếm - '{{ $key }}'">
    <div class="row my-4">
        <div class="col-lg-3 col-md-4 col-12 mb-3">
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
        <div class="col-lg-9 col-md-8 col-12">
            <ul class="d-flex align-items-center m-0 p-0 mb-2" style="list-style: none;">
                <li><a href="{{ route('home') }}" class="text-secondary">Trang chủ</a></li>
                <span class="mx-2">/</span>
                <li>Kết quả tìm kiếm '{{ $key }}'</li>
            </ul>
            <div class="row">
                @if ($products->count() > 0)
                    @foreach ($products as $item)
                        <div class="product_item col-lg-3 col-md-4 col-6 mb-3">
                            <div class="card shadow" style="overflow: hidden;">
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
                                <a class="text-light text-center py-2 bg-secondary"
                                    onclick="addToCart({{ $item->id }})" data-id="{{ $item->id }}"
                                    style="cursor: pointer;">Thêm vào
                                    giỏ hàng</a>
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
