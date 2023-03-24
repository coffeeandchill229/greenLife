<x-home title='Trang chủ'>
    @if (!empty($products))
    @foreach ($products as $item)
    <div class="product_item col-lg-3 col-md-4 col-6 mb-3">
        <div class="card shadow" style="overflow: hidden;">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="/storage/products/{{$item->image}}" width="270" height="270" style="object-fit: cover;"
                    class="img-fluid" alt="" />
                <a href="{{route('home.product_detail',$item->id)}}">
                    <div class="mask" style="background-color: rgba(0, 0, 0, 0.05)"></div>
                </a>
            </div>
            <div class="card-body text-center px-0 py-2">
                <a href="{{route('home.product_detail',$item->id)}}" class="card-title text-dark h5">{{$item->name}}</a>
                <p class="card-text text-danger fw-bold">{{number_format($item->price)}} <sup>đ</sup></p>
            </div>
            <a id="btn_add_to_cart" class="text-light text-center py-2 bg-secondary"
                href="{{route('cart.add',$item->id)}}">Thêm vào giỏ hàng</a>
        </div>
    </div>
    @endforeach
    @endif
</x-home>