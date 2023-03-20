<x-home title='Trang chủ'>
    @if (!empty($products))
    @foreach ($products as $item)
    <div class="product_item col-lg-3 col-md-4 col-6 mb-3">
        <div class="card shadow">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="/storage/products/{{$item->image}}" width="270" height="270" style="object-fit: cover;" class="img-fluid" alt="" />
                <a href="#!">
                    <div class="mask" style="background-color: rgba(0, 0, 0, 0.05)"></div>
                </a>
            </div>
            <div class="card-body text-center px-0">
                <h5 class="card-title">{{$item->name}}</h5>
                <p class="card-text text-danger fw-bold">{{number_format($item->price)}} VND</p>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</x-home>