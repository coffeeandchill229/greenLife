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

        $route_curr = Route::currentRouteName();

    @endphp
    <div class="col-3">
        <img src="/storage/avatars/{{ $cus->avatar }}" width="100" height="100" id="avatar_review"
            class="rounded-circle" alt="">
        <span class="ms-2">{{ $cus->name }}</span>
        <ul class="list-group list-group-light mt-3">
            @foreach ($navbars as $item)
                <li class="list-group-item px-3 border-0 {{ $item['route'] == $route_curr ? 'active' : '' }}">
                    <a href="{{ route($item['route']) }}">{{ $item['title'] }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="col-9">
        {{ $slot }}
    </div>
</div>
