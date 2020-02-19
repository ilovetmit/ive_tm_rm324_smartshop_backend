<?php

return [
    // 'userManagement' => [
    //     'title'          => 'User Management',
    //     'title_singular' => 'User management',
    // ],
    // 'permission'     => [
    //     'title'          => 'Permissions',
    //     'title_singular' => 'Permission',
    //     'fields'         => [
    //         'id'                => 'ID',
    //         'id_helper'         => '',
    //         'title'             => 'Title',
    //         'title_helper'      => '',
    //         'created_at'        => 'Created at',
    //         'created_at_helper' => '',
    //         'updated_at'        => 'Updated at',
    //         'updated_at_helper' => '',
    //         'deleted_at'        => 'Deleted at',
    //         'deleted_at_helper' => '',
    //     ],
    // ],
    // 'role'           => [
    //     'title'          => 'Roles',
    //     'title_singular' => 'Role',
    //     'fields'         => [
    //         'id'                 => 'ID',
    //         'id_helper'          => '',
    //         'title'              => 'Title',
    //         'title_helper'       => '',
    //         'permissions'        => 'Permissions',
    //         'permissions_helper' => '',
    //         'created_at'         => 'Created at',
    //         'created_at_helper'  => '',
    //         'updated_at'         => 'Updated at',
    //         'updated_at_helper'  => '',
    //         'deleted_at'         => 'Deleted at',
    //         'deleted_at_helper'  => '',
    //     ],
    // ],
    // 'user'           => [
    //     'title'          => 'Users',
    //     'title_singular' => 'User',
    //     'fields'         => [
    //         'id'                       => 'ID',
    //         'id_helper'                => '',
    //         'name'                     => 'Name',
    //         'name_helper'              => '',
    //         'email'                    => 'Email',
    //         'email_helper'             => '',
    //         'email_verified_at'        => 'Email verified at',
    //         'email_verified_at_helper' => '',
    //         'password'                 => 'Password',
    //         'password_helper'          => '',
    //         'roles'                    => 'Roles',
    //         'roles_helper'             => '',
    //         'remember_token'           => 'Remember Token',
    //         'remember_token_helper'    => '',
    //         'created_at'               => 'Created at',
    //         'created_at_helper'        => '',
    //         'updated_at'               => 'Updated at',
    //         'updated_at_helper'        => '',
    //         'deleted_at'               => 'Deleted at',
    //         'deleted_at_helper'        => '',
    //     ],
    // ],
    'userManagement' => [
        'title'             => 'User Management',
        'sub_title_1' => [
            'title'         => 'Permission',
            'title_s'       => 'Permissions',
            'fields' => [
                'id'            => 'ID',
                'name'          => 'Name',
                'description'   => 'Description',
            ],
        ],
        'sub_title_2'        => [
            'title'         => 'Role',
            'title_s'       => 'Roles',
            'fields'        => [],
        ],
        'sub_title_3'        => [
            'title'         => 'User',
            'title_s'       => 'Users',
            'fields'        => [],
        ],
       
    ],
    'productManagement' => [
        'title'             => 'Product Management',
        'sub_title_1'        => [
            'title'         => 'Product',
            'title_s'       => 'Products',
            'fields'        => [],
        ],
        'sub_title_2'        => [
            'title'         => 'Shop Product',
            'title_s'       => 'Shop Products',
            'fields'        => [],
        ],
        'sub_title_3'        => [
            'title'         => 'Vending Product',
            'title_s'       => 'Vending Products',
            'fields'        => [],
        ],
        'sub_title_4'        => [
            'title'         => 'Product Transaction',
            'title_s'       => 'Product Transactions',
            'fields'        => [],
        ],
    ],
    'productWallManagement' => [
        'title'             => 'Product Wall',
        'title_s'           => 'Product Walls',
        'fields'            => [],
    ],
    'AdvertisementManagement' => [
        'title'             => 'Advertisement',
        'title_s'           => 'Advertisements',
        'fields'            => [],
    ],
    'transactionManagement' => [
        'title'             => 'Transaction',
        'title_s'           => 'Transactions',
        'sub_title_1'        => [
            'title'         => 'All Transaction',
            'title_s'       => 'All Transactions',
            'fields'        => [],
        ],
        'sub_title_2'        => [
            'title'         => 'Remittance Transaction',
            'title_s'       => 'Remittance Transactions',
            'fields'        => [],
        ],
        'sub_title_3'        => [
            'title'         => 'Product Transaction',
            'title_s'       => 'Product Transactions',
            'fields'        => [],
        ],
        'sub_title_4'        => [
            'title'         => 'Locker Transaction',
            'title_s'       => 'Locker Transactions',
            'fields'        => [],
        ],
    ],
    'lockerManagement' => [
        'title'             => 'Locker Management',
        'sub_title_1'        => [
            'title'         => 'Locker',
            'title_s'       => 'Lockers',
            'fields'        => [],
        ],
        'sub_title_2'        => [
            'title'         => 'Locker Transaction',
            'title_s'       => 'Locker Transactions',
            'fields'        => [],
        ],
    ],
    'stockManagement' => [
        'title'             => 'Stock Management',
        'fields'        => [],
    ],
    'insuranceManagement' => [
        'title'             => 'Insurance Management',
        'fields'        => [],
    ],
];
