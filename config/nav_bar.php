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

];