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
        '1'             => 'on promote',    // on
        'tag_type_1'    => 'success',
        '2'             => 'expired',       // off
        'tag_type_2'    => 'secondary',
    ], 'advertisement_status_form' => [
        '1'             => 'on promote',    // on
        '2'             => 'expired',       // off
    ],

    'product_status' => [
        '1'             => 'shortage',
        'tag_type_1'    => 'danger',
        '2'             => 'enough',
        'tag_type_2'    => 'success',
    ], 'product_status_form' => [
        '1'             => 'shortage',
        '2'             => 'enough',
    ],

    'shopProductInventories_isSold' => [
        '1'             => 'on sell',
        'tag_type_1'    => 'success',
        '2'             => 'sell out',
        'tag_type_2'    => 'warning',
        '3'             => 'off sell',
        'tag_type_3'    => 'secondary',
    ], 'shopProductInventories_isSold_form' => [
        '1'             => 'on sell',
        '2'             => 'sell out',
        '3'             => 'off sell',
    ],

    'device_isActive' => [
        '1'             => 'inactive',
        'tag_type_1'    => 'warning',
        '2'             => 'active',
        'tag_type_2'    => 'success',
    ], 'device_isActive_form' => [
        '1'             => 'inactive',
        '2'             => 'active',
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
        '1'             => 'active',
        'tag_type_1'    => 'success',
        '2'             => 'inactive',
        'tag_type_2'    => 'warning',
    ], 'locker_isActive_form' => [
        '1'             => 'active',
        '2'             => 'inactive',
    ],

    'locker_isUsing' => [
        '1'             => 'free',
        'tag_type_1'    => 'success',
        '2'             => 'using',
        'tag_type_2'    => 'warning',
    ], 'locker_isUsing_form' => [
        '1'             => 'free',
        '2'             => 'using',
    ],

    'user_gender' => [
        '1' => 'Male',
        '2' => 'Woman',
    ],

    'user_status' => [
        '1'             => 'available',
        'tag_type_1'    => 'success',
        '2'             => 'unavailable',
        'tag_type_2'    => 'secondary',
    ], 'user_status_form' => [
        '1' => 'available',
        '2' => 'unavailable',
    ],

    'gender' => [
        '1' => 'Male',
        '2' => 'Woman',
        '3' => 'Other',
    ]

];
