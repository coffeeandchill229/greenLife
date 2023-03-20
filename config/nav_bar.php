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
        'icon'=>'',
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
        'icon'=>'',
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
        'icon'=>'',
        'childs'=>[
            [
                'codePage'=>'User-list',
                'title'=>'Danh sách',
                'icon'=>'',
                'href'=>'admin.user',
            ],
        ]
    ],

];