<div class="row my-4">
    @php
        $navbars = [
            [
                'title' => 'Thông tin tài khoản',
                'route' => 'home.info',
            ],
            [
                'title' => 'Đơn hàng',
                'route' => 'home.my_order',
            ],
            [
                'title' => 'Đăng xuất',
                'route' => 'home.logout',
            ],
        ];

        if (Auth::user()->is_customer == 1) {
            $item = [
                'title' => 'Trang quản trị',
                'route' => 'admin.dashboard',
            ];
        }

        $route_curr = Route::currentRouteName();

    @endphp
    <div class="col-lg-3 col-12 mb-3">
        <div class="d-flex align-items-center">
            <div style="width: 100px; height: 100px; overflow: hidden;" class="border rounded-circle">
                <img src="/storage/avatars/{{ $cus->avatar }}" id="avatar_review" class="w-100" alt="">
            </div>
            <span class="ms-2 fw-bold {{ Auth::user()->is_customer == 1 ? 'text-primary' : '' }}">
                {{ $cus->name }}
                {{ Auth::user()->is_customer == 1 ? '(QTV)' : '' }}
            </span>
        </div>
        <ul class="list-group list-group-light mt-3">
            @foreach ($navbars as $item)
                <li class="list-group-item px-3 border-0 {{ $item['route'] == $route_curr ? 'active' : '' }}">
                    <a href="{{ route($item['route']) }}">{{ $item['title'] }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="col-lg-9 col-12">
        {{ $slot }}
    </div>
</div>
