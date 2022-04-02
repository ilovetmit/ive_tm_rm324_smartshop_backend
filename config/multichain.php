<?php
return [
    //as per config in the multichain.conf file on the node you wish to access
    'node_url' => env('MULTICHAIN_NODE_URL'),
    'node_port' => env('MULTICHAIN_NODE_PORT'),
    'rpc_username' => env('MULTICHAIN_RPC_USERNAME'),
    'rpc_password' => env('MULTICHAIN_RPC_PASSWORD')
];
