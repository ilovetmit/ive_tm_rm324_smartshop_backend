<?php

return [
    // primary
    // secondary
    // success
    // danger
    // warning
    // info
    // light
    // dark

    'advertisement_status' => [
        '1'             => 'Promoting',    // on
        'tag_type_1'    => 'Success',
        '2'             => 'Expired',       // off
        'tag_type_2'    => 'Secondary',
    ], 'advertisement_status_form' => [
        '1'             => 'Promoting',    // on
        '2'             => 'Expired',       // off
    ],

    'product_status' => [
        '1'             => 'Shortage',
        'tag_type_1'    => 'Danger',
        '2'             => 'Enough',
        'tag_type_2'    => 'Success',
    ], 'product_status_form' => [
        '1'             => 'Shortage',
        '2'             => 'Enough',
    ],

    'shopProductInventories_isSold' => [
        '1'             => 'Instock',
        'tag_type_1'    => 'Success',
        '2'             => 'Sold',
        'tag_type_2'    => 'Secondary',
    ], 'shopProductInventories_isSold_form' => [
        '1'             => 'Instock',
        '2'             => 'Sold',
    ],

    'device_isActive' => [
        '1'             => 'Inactive',
        'tag_type_1'    => 'Warning',
        '2'             => 'Active',
        'tag_type_2'    => 'Success',
    ], 'device_isActive_form' => [
        '1'             => 'Inactive',
        '2'             => 'Active',
    ],

    'address_district' => [
        // ref: https://www.rvd.gov.hk/doc/tc/hkpr13/06.pdf
        '1'  => 'Kwai Tsing, New Territories',
        '2'  => 'Tsuen Wan, New Territories',
        '3'  => 'Tuen Mun, New Territories',
        '4'  => 'Yuen Long, New Territories',
        '5'  => 'North, New Territories',
        '6'  => 'Tai Po, New Territories',
        '7'  => 'Sha Tin, New Territories',
        '8'  => 'Sai Kung, New Territories',
        '9'  => 'Islands, New Territories',
        '10' => 'Yau Tsim Mong, Kowloon',
        '11' => 'Sham Shui Po, Kowloon',
        '12' => 'Kowloon City, Kowloon',
        '13' => 'Wong Tai Sin, Kowloon',
        '14' => 'Kwun Tong, Kowloon',
        '15' => 'Central and Western, Hong Kong',
        '16' => 'Wan Chai, Hong Kong',
        '17' => 'Eastern, Hong Kong',
        '18' => 'Southern, Hong Kong',
    ],

    'transaction_currency' => [
        '0' => 'Current',
        '1' => 'Saving',
        '2' => 'Vitcoin',
    ],

    'locker_isActive' => [
        '1'             => 'Active',
        'tag_type_1'    => 'Success',
        '2'             => 'Inactive',
        'tag_type_2'    => 'Warning',
    ], 'locker_isActive_form' => [
        '1'             => 'Active',
        '2'             => 'Inactive',
    ],

    'locker_isUsing' => [
        '1'             => 'Free',
        'tag_type_1'    => 'Success',
        '2'             => 'Using',
        'tag_type_2'    => 'Warning',
    ], 'locker_isUsing_form' => [
        '1'             => 'Free',
        '2'             => 'Using',
    ],

    'user_gender' => [
        '1' => 'Male',
        '2' => 'Woman',
    ],

    'user_status' => [
        '1'             => 'Available',
        'tag_type_1'    => 'Success',
        '2'             => 'Unavailable',
        'tag_type_2'    => 'Secondary',
    ], 'user_status_form' => [
        '1' => 'Available',
        '2' => 'Unavailable',
    ],

    'gender' => [
        '1' => 'Male',
        '2' => 'Woman',
    ]

];
