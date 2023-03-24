<x-only-header title="Chi tiết sản phẩm">
    <form action="{{route('cart.add',$product->id)}}" method="get">
        <div class="row py-5">
            <div class="col-5">
                <img class="w-100 h-100 img-thumbnail" style="object-fit: contain;"
                    src="/storage/products/{{$product->image}}" alt="">
            </div>
            <div class="col-7">
                <ul class="d-flex align-items-center m-0 p-0 mb-2" style="list-style: none;">
                    <li><a href="{{route('home')}}" class="text-secondary">Trang chủ</a></li>
                    <span class="mx-2">/</span>
                    <li><a class="text-secondary" href="">{{$product->category->name}}</a></li>
                    <span class="mx-2">/</span>
                    <li><a class="text-secondary" href="">{{$product->name}}</a></li>
                </ul>
                <h3 class="fw-bold">{{$product->name}}</h3>
                <h5 class="fw-bold">{{number_format($product->price)}} <sup>đ</sup></h5>
                <p class="mt-2" style="text-align: justify;">{{$product->description}}</p>
                <div class="d-flex ">
                    <input class="form-control" name="quantity" style="width: 60px;" value="1" min="1" max="50"
                        type="number" />
                    <button class="ms-2 btn btn-outline-dark btn-sm"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ
                        hàng</button>
                </div>
            </div>
        </div>
    </form>
</x-only-header>