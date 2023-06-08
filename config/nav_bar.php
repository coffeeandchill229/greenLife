<?php

return [
    [
        'codePage' => 'Dashboard',
        'title' => 'Dashboard',
        'icon' => '',
        'href' => 'admin.dashboard'
    ],
    [
        'codePage' => 'Product',
        'title' => 'Sản phẩm',
        'icon' => 'ri-shopping-basket-fill',
        'childs' => [
            [
                'codePage' => 'Product-list',
                'title' => 'Danh sách',
                'icon' => '',
                'href' => 'admin.product',
                'url' => '/products'
            ],
            [
                'codePage' => 'Categories',
                'title' => 'Danh mục',
                'icon' => '',
                'href' => 'admin.category',
                'url' => '/categories'
            ],
        ]
    ],
    [
        'codePage' => 'Users',
        'title' => 'Users   ',
        'icon' => 'bx bx-ghost',
        'childs' => [
            [
                'codePage' => 'User-list',
                'title' => 'Danh sách',
                'icon' => '',
                'href' => 'admin.user',
                'url' => '/users'
            ],
        ]
    ],
    [
        'codePage' => 'Orders',
        'title' => 'Đơn hàng',
        'icon' => 'bx bx-cart',
        'childs' => [
            [
                'codePage' => 'Order-list',
                'title' => 'Danh sách',
                'icon' => '',
                'href' => 'admin.order',
                'url' => '/orders'
            ],
            [
                'codePage' => 'Order-status',
                'title' => 'Trạng thái',
                'icon' => '',
                'href' => 'admin.order_status',
                'url' => '/order-status'
            ],
        ]
    ],
    [
        'codePage' => 'Banners',
        'title' => 'Banner',
        'icon' => 'bx bx-image',
        'childs' => [
            [
                'codePage' => 'Banner-list',
                'title' => 'Danh sách',
                'icon' => '',
                'href' => 'admin.banner',
                'url' => '/banners'
            ],
        ]
    ],
    [
        'codePage' => 'Posts',
        'title' => 'Bài viết',
        'icon' => 'bx bx-pen',
        'childs' => [
            [
                'codePage' => 'Post-list',
                'title' => 'Danh sách',
                'icon' => '',
                'href' => 'admin.post',
                'url' => '/posts'
            ],
        ]
    ],
];
