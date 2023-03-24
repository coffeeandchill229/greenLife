<?php

return [
    [
        'codePage'=>'Dashboard',
        'title'=>'Dashboard',
        'icon'=>'',
        'href'=>'admin.dashboard'
    ],
    [
        'codePage'=>'Product',
        'title'=>'Sản phẩm',
        'icon'=>'ri-shopping-basket-fill',
        'childs'=>[
            [
                'codePage'=>'Product-list',
                'title'=>'Danh sách',
                'icon'=>'',
                'href'=>'admin.product',
            ],
            [
                'codePage'=>'Categories',
                'title'=>'Danh mục',
                'icon'=>'',
                'href'=>'admin.category',
            ],
        ]
    ],
    [
        'codePage'=>'Customers',
        'title'=>'Khách hàng',
        'icon'=>'bx bx-user',
        'childs'=>[
            [
                'codePage'=>'Customer-list',
                'title'=>'Danh sách',
                'icon'=>'',
                'href'=>'admin.customer',
            ],
        ]
    ],
    [
        'codePage'=>'Users',
        'title'=>'Nhân viên',
        'icon'=>'bx bx-ghost',
        'childs'=>[
            [
                'codePage'=>'User-list',
                'title'=>'Danh sách',
                'icon'=>'',
                'href'=>'admin.user',
            ],
        ]
    ],
    [
        'codePage'=>'Orders',
        'title'=>'Đơn hàng',
        'icon'=>'bx bx-cart',
        'childs'=>[
            [
                'codePage'=>'Order-list',
                'title'=>'Danh sách',
                'icon'=>'',
                'href'=>'admin.order',
            ],
            [
                'codePage'=>'Order-status',
                'title'=>'Trạng thái',
                'icon'=>'',
                'href'=>'admin.order_status',
            ],
        ]
    ],
];