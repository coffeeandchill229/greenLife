<x-only-header title="Tìm kiếm - ">
    <div class="row">
        <div class="col-3">
            <div class="category">
                <ul class="list-group rounded-0">
                    <li class="list-group-item text-light" style="background-color: var(--header_color)"
                        aria-current="true">
                        <i class="fas fa-bars"></i> <span>DANH MỤC SẢN PHẨM</span>
                    </li>
                    @foreach ($cats as $item)
                    <li class="list-group-item">
                        <a class="text-dark" href="{{route('home.product_category',$item->id)}}">{{$item->name}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-9">
            <ul class="d-flex align-items-center m-0 p-0 mb-2" style="list-style: none;">
                <li><a href="{{route('home')}}" class="text-secondary">Trang chủ</a></li>
                <span class="mx-2">/</span>
                <li><a class="text-secondary" href="">{{$category_find->name}}</a></li>
            </ul>
            <div class="row">
                @if ($products->count() >0)
                @foreach ($products as $item)
                <div class="product_item col-lg-3 col-md-4 col-6 mb-3">
                    <div class="card shadow" style="overflow: hidden;">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="/storage/products/{{$item->image}}" width="270" height="270"
                                style="object-fit: cover;" class="img-fluid" alt="" />
                            <a href="{{route('home.product_detail',$item->id)}}">
                                <div class="mask" style="background-color: rgba(0, 0, 0, 0.05)"></div>
                            </a>
                        </div>
                        <div class="card-body text-center px-0 py-2">
                            <a href="{{route('home.product_detail',$item->id)}}"
                                class="card-title text-dark h6">{{$item->name}}</a>
                            <p class="card-text text-danger fw-bold">{{number_format($item->price)}} <sup>đ</sup></p>
                        </div>
                        <a id="btn_add_to_cart" class="text-light text-center py-2 bg-secondary"
                            href="{{route('cart.add',$item->id)}}">Thêm vào giỏ hàng</a>
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