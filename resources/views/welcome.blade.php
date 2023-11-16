<x-home title='Trang chủ'>
    @if (!empty($products))
        @foreach ($products as $item)
            <div class="product_item col-lg-3 col-md-4 col-6 mb-3">
                <div class="card shadow" style="overflow: hidden;">
                    @if ($item->stock == 0)
                        <div class="ribbon-corner">Đã hết hàng</div>
                    @endif

                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="{{ $item->image ? asset('/storage/products/' . $item->image) : 'https://trolleymate.co.uk/assets/img/error_404.jpeg' }}"
                            width="270" height="270" style="object-fit: cover;" class="img-fluid" alt="" />
                        <a href="{{ route('home.product_detail', $item->id) }}">
                            <div class="mask" style="background-color: rgba(0, 0, 0, 0.05)"></div>
                        </a>
                    </div>
                    <div class="card-body text-center px-0 py-2">
                        <a href="{{ route('home.product_detail', $item->id) }}"
                            class="card-title text-dark h5">{{ $item->name }}</a>
                        <p class="card-text text-danger fw-bold">{{ number_format($item->price) }} <sup>đ</sup></p>
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
        <p class="text-center py-2">Đang cập nhật...</p>
    @endif
</x-home>
