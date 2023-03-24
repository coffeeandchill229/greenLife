<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{$attributes['title']}}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Logo -->
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- MD Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="/home/assets/style.css" />
    <link rel="stylesheet" href="/home/assets/responsive.css" />
    <link rel="icon"
        href="https://9xgarden.com/wp-content/uploads/2020/09/danh-muc-tieu-canh-de-ban-terrarium-9xgarden.jpg">
    <style>
        @media (min-width: 1200px) {
            .container {
                width: 1170px;
            }
        }
    </style>
</head>

<body>
    <div id="fb-root"></div>

    <span class="back_to_top"><i class="fas fa-chevron-circle-up"></i></span>
    <div class="top">
        <div class="container">
            <div class="row py-1 text-light">
                <div class="col-lg-6">
                    <ul class="m-0 p-0 d-flex" style="list-style: none">
                        <li class="me-2">
                            <i class="fas fa-phone"></i> 0123.456.789 (Hà Nội)
                        </li>
                        <li><i class="fas fa-phone"></i> 0123.456.789 (Sài Gòn)</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="m-0 p-0 d-flex justify-content-end" style="list-style: none">
                        <li class="me-2">Thanh toán</li>
                        <li>Địa chỉ</li>
                        <li class="mx-2"><i class="fab fa-facebook"></i></li>
                        <li class="mx-2"><i class="far fa-envelope"></i></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <header>
        <div class="container">
            <div class="row py-2 d-flex align-items-center">
                <div class="col-lg-3">
                    <div class="logo">
                        <h2 class="m-0" style="color: var(--header_color)">
                            Nam Lee <i class="fab fa-pagelines"></i>
                        </h2>
                    </div>
                </div>
                <div class="col-lg-5">
                    <form action="" method="get" class="search_form">
                        <div class="search_box">
                            <input type="text" class="search_input" placeholder="Tìm kiếm sản phẩm..." />
                            <button class="search_btn">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="login">
                        <ul class="m-0 p-0 d-flex justify-content-end align-items-center" style="list-style: none">
                            <li class="me-2">
                                @if (Auth::guard('customer')->user())
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-dark" type="button" id="dropdownMenu2"
                                        data-mdb-toggle="dropdown" aria-expanded="false">
                                        <img src="/storage/avatars/{{Auth::guard('customer')->user()->avatar}}"
                                            width="30" height="30" class="rounded-circle"
                                            alt="{{Auth::guard('customer')->user()->name}}">
                                        {{Auth::guard('customer')->user()->name}}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <li><a href="" class="dropdown-item" type="button">Thông tin</a></li>
                                        <li><a href="" class="dropdown-item" type="button">Đổi mật khẩu</a></li>
                                        <li><a href="{{route('home.logout')}}" class="dropdown-item" type="button">Đăng
                                                xuất</a></li>
                                    </ul>
                                </div>
                                @else
                                <a class="text-dark" href="{{route('home.login')}}">Đăng nhập</a>
                                @endif
                            </li>
                            <li class="me-2">
                                <a style="color: var(--header_color)" href="{{route('home.cart')}}">Giỏ hàng <i
                                        class="fas fa-shopping-bag"></i>
                                    <sup style="font-size: 13px;">[{{$cart->total_quantity}}]</sup></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="navigation">
        <div class="container">
            <div class="row bg-light shadow-sm">
                <div class="col-lg-3">
                    <div class="category">
                        <ul class="list-group rounded-0">
                            <li class="list-group-item text-light" style="background-color: var(--header_color)"
                                aria-current="true">
                                <i class="fas fa-bars"></i> <span>DANH MỤC SẢN PHẨM</span>
                            </li>
                            @foreach ($cats as $item)
                            <li class="list-group-item">
                                <a class="text-dark" href="">{{$item->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @php
                $navbars = [
                [
                'name'=>'Trang chủ',
                'route'=>'home'
                ],
                [
                'name'=>'Giới thiệu',
                'route'=>'about'
                ],
                [
                'name'=>'Liên hệ',
                'route'=>'contact'
                ]
                ];
                $route_curr = Route::currentRouteName();
                @endphp
                <div class="col-lg-9">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-10">
                            <nav class="nav_bar">
                                <ul class="nav_bar_list d-flex m-0 p-0" style="list-style: none">
                                    @foreach ($navbars as $item)
                                    <li class="nav_bar_item pt-2 pb-2 pe-2">
                                        <a class="text-dark"
                                            href="{{$item['route'] ? route($item['route']) : ''}}">{{$item['name']}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                        <div class="col-lg-2 text-end">
                            <span class="px-3 btn rounded-pill text-light"
                                style="background-color: var(--header_color)">0123.456.789</span>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div id="carouselExampleControls" class="carousel slide" data-mdb-ride="carousel">
                            <div class="carousel-inner" style="height: 350px">
                                <div class="carousel-item active">
                                    <img src="https://9xgarden.com/wp-content/uploads/2021/06/shop-cay-canh-mini-khong-trong-dat-9x-garden-1.jpg"
                                        class="d-block w-100" alt="Wild Landscape" />
                                </div>
                                <div class="carousel-item">
                                    <img src="https://9xgarden.com/wp-content/uploads/2021/06/shop-cay-canh-mini-khong-trong-dat-9x-garden-1.jpg"
                                        class="d-block w-100" alt="Camera" />
                                </div>
                                <div class="carousel-item">
                                    <img src="https://9xgarden.com/wp-content/uploads/2021/06/shop-cay-canh-mini-khong-trong-dat-9x-garden-1.jpg"
                                        class="d-block w-100" alt="Exotic Fruits" />
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-mdb-target="#carouselExampleControls" data-mdb-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-mdb-target="#carouselExampleControls" data-mdb-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content my-2">
        <div class="container bg-light">
            <!-- Danh mục sản phẩm -->
            <div class="category_heading text-center mt-3">
                <h4 class="border-3 border-bottom border-success d-inline-block pb-2"
                    style="color: var(--header_color)">
                    Danh Mục Sản Phẩm
                </h4>
            </div>
            <div class="row py-3 d-flex align-items-center">
                @if ($cat->count()>0)
                <!-- Danh mục đầu tiên -->
                <div class="col-lg-6 text-center">
                    <div class="card shadow category_item_first d-grid justify-content-center">
                        <div class="bg-image hover-overlay rippler" data-mdb-ripple-color="light">
                            <img src="/storage/images/{{$cat->first()->image}}" class="img-thumbnail border-0" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                            </a>
                        </div>
                        <div class="card-body p-1 text-center">
                            <span class="card-title">{{$cat->first()->name}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <!-- Danh mục thứ 2 trở về sau -->
                        @php
                        unset($cat[0]);
                        @endphp
                        @foreach ($cat as $item)
                        @if ($item->image)
                        <div class="col-lg-6 mb-3">
                            <div class="card shadow">
                                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light"
                                    style="height: 240px;">
                                    <img src="/storage/images/{{$item->image}}" class="img-thumbnail" />
                                    <a href="">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                                    </a>
                                </div>
                                <div class="card-body p-1 text-center">
                                    <span class="card-title">{{$item->name}}</span>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            <!-- Sản phẩm -->
            <div class="product_category">
                <h4>Sản phẩm mới</h4>
            </div>
            <div class="product_list row py-3">
                @include('sweetalert::alert')
                {{$slot}}
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row py-4">
                <div class="col-lg-4">
                    <h5 class="fw-bold badge bg-success">Về chúng tôi</h5>
                    <div class="logo my-3">
                        <h2 class="m-0" style="color: var(--header_color)">
                            Nam Lee <i class="fab fa-pagelines"></i>
                        </h2>
                    </div>
                    <p style="text-align: justify">
                        Cây Xinh là thương hiệu dẫn đầu trong lĩnh vực sản xuất & cung cấp
                        các loại Cây phong thủy, cây văn phòng, sen đá, xương rồng & tiểu
                        cảnh Terrarium cao cấp trang trí nội thất. Cây Xinh luôn cố gắng
                        tạo ra những sản phẩm đẹp, độc đáo và khác biệt hoàn toàn so với
                        thị trường. Chúng tôi biến sản phẩm thành những tác phẩm nghệ
                        thuật với tất cả niềm đam mê và tâm huyết của mình... để đáp ứng
                        mọi nhu cầu của khách hàng.
                    </p>
                </div>
                <div class="col-lg-4">
                    <h5 class="fw-bold badge bg-success">Hỗ trợ khách hàng</h5>
                    <ul>
                        <li class="mb-2">
                            <a style="color: var(--header_color)" href="">Hướng dẫn đặt hàng & thanh toán</a>
                        </li>
                        <li class="mb-2">
                            <a style="color: var(--header_color)" href="">Chính sách giao hàng & đổi trả</a>
                        </li>
                        <li class="mb-2">
                            <a style="color: var(--header_color)" href="">Thỏa thuận người dùng</a>
                        </li>
                        <li class="mb-2">
                            <a style="color: var(--header_color)" href="">Chính sách bảo mật</a>
                        </li>
                        <li class="mb-2">
                            <a style="color: var(--header_color)" href="">Chính sách đại lý</a>
                        </li>
                        <li class="mb-2">
                            <a style="color: var(--header_color)" href="">Hệ thống cửa hàng Cây Xinh</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5 class="fw-bold badge bg-success">Fanpage</h5>
                    <div class="fb-page" data-href="https://www.facebook.com/NCSfanmade" data-width="380"
                        data-hide-cover="false" data-show-facepile="false"></div>
                </div>
            </div>
            <div class="row">
                <p class="text-center">
                    Copyright 2023 © Nam Lê | Mọi hình ảnh trên trang web được sưu tầm
                </p>
            </div>
        </div>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
    <script src="/home/assets/main.js"></script>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v16.0&appId=238683943543481&autoLogAppEvents=1"
        nonce="tdycEoV4"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</body>

</html>