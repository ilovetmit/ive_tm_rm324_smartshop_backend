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

    'badge_type' => [
        'User'          => 'info',
        'Admin'         => 'danger',

        'Available'     => 'success',
        'Unavailable'   => 'danger',

        'Promoting'     => 'success',
        'Expired'       => 'secondary',

        'Instock'       => 'success',
        'Sold'          => 'secondary',

        'Active'        => 'success',
        'Inactive'      => 'secondary',

        'Free'          => 'success',
        'Using'         => 'danger',
        // field name
        'name'          => 'primary',
        'header'        => 'primary',
        'id'            => 'primary',
        'price'         => 'info',
        'amount'        => 'info',
        'balance'       => 'info',
        'account'       => 'info',
        'currency'      => 'dark',
        'category'      => 'light',
        'tag'           => 'secondary',
        'channel'       => 'dark',
        'pt'            => 'light',              // product transaction
        'rt'            => 'info',               // remittance transaction
        'lt'            => 'secondary',          // locker transaction
        'Vending'       => 'dark',
        'WindowShop'    => 'dark',
    ],

    'advertisement_status' => [
        '1' => 'Promoting',     // on
        '2' => 'Expired',       // off
    ],
    'product_status' => [
        '1' => 'Unavailable',
        '2' => 'Available',
    ],
    'shopProductInventories_isSold' => [
        '1' => 'Instock',
        '2' => 'Sold',
    ],
    'device_isActive' => [
        '1' => 'Active',
        '2' => 'Inactive',
    ],
    'locker_isActive' => [
        '1' => 'Active',
        '2' => 'Inactive',
    ],
    'locker_isUsing' => [
        '1' => 'Free',
        '2' => 'Using',
    ],
    'user_status' => [
        '1' => 'Available',
        '2' => 'Unavailable',
    ],


    'gender' => [
        '1' => 'Male',
        '2' => 'Woman',
    ],
    'vending_channel' => [
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
        '5' => '5',
        '6' => '6',
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
    '_transaction_currency' => [
        'Current' => '0',
        'Saving'  => '1',
        'Vitcoin' => '2',
    ],
    'shop_type' => [
        '1' => 'Vending',
        '2' => 'WindowShop',
        '3' => 'AR Instant Checkout'
    ]
];
