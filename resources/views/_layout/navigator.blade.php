{{-- UserManagement --}}

@component('_component.menu-button.parent',[
'permission_subjects' => 'user_management',
'icon' => 'fas fas fa-users',
])
@slot('child')

@include('_component.menu-button.child',[
'permission_subjects' => 'permission',
'location' => 'UserManagement.Permissions.index',
'icon' => 'fas fas fa-unlock-alt',
'menu_name' => trans('cruds.userManagement.permission.title_s')
])

@include('_component.menu-button.child',[
'permission_subjects' => 'role',
'location' => 'UserManagement.Roles.index',
'icon' => 'fas fas fa-briefcase',
'menu_name' => trans('cruds.userManagement.role.title_s')
])

@include('_component.menu-button.child',[
'permission_subjects' => 'user',
'location' => 'UserManagement.Users.index',
'icon' => 'fas fas fa-user',
'menu_name' => trans('cruds.userManagement.user.title_s')
])

@endslot
@endcomponent


{{-- InformationManagement --}}

@component('_component.menu-button.parent',[
'permission_subjects' => 'information_management',
'icon' => 'fas fa-info-circle',
])
@slot('child')

@include('_component.menu-button.child',[
'permission_subjects' => 'address',
'location' => 'InformationManagement.Addresses.index',
'icon' => 'fas fa-map-marker',
'menu_name' => trans('cruds.informationManagement.address.title_s')
])

@include('_component.menu-button.child',[
'permission_subjects' => 'bank',
'location' => 'InformationManagement.BankAccounts.index',
'icon' => 'fas fa-money-check-alt',
'menu_name' => trans('cruds.informationManagement.bank_account.title_s')
])

@include('_component.menu-button.child',[
'permission_subjects' => 'device',
'location' => 'InformationManagement.Devices.index',
'icon' => 'fas fa-tablet-alt',
'menu_name' => trans('cruds.informationManagement.device.title_s')
])

@include('_component.menu-button.child',[
'permission_subjects' => 'interest',
'location' => 'InformationManagement.Interests.index',
'icon' => 'fab fa-pinterest',
'menu_name' => trans('cruds.informationManagement.interest.title_s')
])

@include('_component.menu-button.child',[
'permission_subjects' => 'vitcoin',
'location' => 'InformationManagement.Vitcoins.index',
'icon' => 'fab fa-viacoin',
'menu_name' => trans('cruds.informationManagement.vitcoin.title_s')
])

@endslot
@endcomponent

{{-- ProductionManagement --}}

@component('_component.menu-button.parent',[
'permission_subjects' => 'product_management',
'icon' => 'fab fa-product-hunt',
])
@slot('child')

@include('_component.menu-button.child',[
'permission_subjects' => 'category',
'location' => 'ProductManagement.Categories.index',
'icon' => 'fas fa-list-ul',
'menu_name' => trans('cruds.productManagement.category.title_s')
])


@component('_component.menu-button.parent',[
'permission_subjects' => ['led', 'shop_product', 'shop_product_inventory'],
'icon' => 'fas fa-external-link-alt',
'menu_name' => trans('cruds.productManagement.sub_title_on_sell_product')
])
@slot('child')

@include('_component.menu-button.child',[
'permission_subjects' => 'led',
'location' => 'ProductManagement.LEDs.index',
'icon' => 'fas fa-tv',
'menu_name' => trans('cruds.productManagement.led.title_s')
])

@include('_component.menu-button.child',[
'permission_subjects' => 'shop_product',
'location' => 'ProductManagement.ShopProducts.index',
'icon' => 'fas fa-shopping-cart',
'menu_name' => trans('cruds.productManagement.shop_product.title_s')
])

@include('_component.menu-button.child',[
'permission_subjects' => 'shop_product_inventory',
'location' => 'ProductManagement.ShopProductInventories.index',
'icon' => 'fas fa-dolly-flatbed',
'menu_name' => trans('cruds.productManagement.shop_product_inventory.title_s')
])

@endslot
@endcomponent


@include('_component.menu-button.child',[
'permission_subjects' => 'product',
'location' => 'ProductManagement.Products.index',
'icon' => 'fab fa-product-hunt',
'menu_name' => trans('cruds.productManagement.product.title_s')
])

@include('_component.menu-button.child',[
'permission_subjects' => 'product_wall',
'location' => 'ProductManagement.ProductWalls.index',
'icon' => 'fas fa-pallet',
'menu_name' => trans('cruds.productManagement.product_wall.title_s')
])

@include('_component.menu-button.child',[
'permission_subjects' => 'vending_product',
'location' => 'ProductManagement.VendingProducts.index',
'icon' => 'fas fa-vector-square',
'menu_name' => trans('cruds.productManagement.sub_title_vending_machine')
])

@endslot
@endcomponent


{{-- TransactionManagement --}}

@component('_component.menu-button.parent',[
'permission_subjects' => 'transaction_management',
'icon' => 'fas fa-comments-dollar',
])
@slot('child')

@include('_component.menu-button.child',[
'permission_subjects' => 'transaction',
'location' => 'TransactionManagement.Transactions.index',
'icon' => 'fas fa-list',
'menu_name' => trans('cruds.transactionManagement.transaction.title_s')
])

@include('_component.menu-button.child',[
'permission_subjects' => 'locker_transaction',
'location' => 'TransactionManagement.LockerTransactions.index',
'icon' => 'fas fa-lock-open',
'menu_name' => trans('cruds.transactionManagement.locker_transaction.title_s')
])

@include('_component.menu-button.child',[
'permission_subjects' => 'product_transaction',
'location' => 'TransactionManagement.ProductTransactions.index',
'icon' => 'fab fa-product-hunt',
'menu_name' => trans('cruds.transactionManagement.product_transaction.title_s')
])

@include('_component.menu-button.child',[
'permission_subjects' => 'remittance_transaction',
'location' => 'TransactionManagement.RemittanceTransactions.index',
'icon' => 'fas fa-exchange-alt',
'menu_name' => trans('cruds.transactionManagement.remittance_transaction.title_s')
])

@endslot
@endcomponent

{{-- SmartBankManagement --}}

@component('_component.menu-button.parent',[
'permission_subjects' => 'smart_bank_management',
'icon' => 'fas fa-university',
])
@slot('child')

@include('_component.menu-button.child',[
'permission_subjects' => 'insurance',
'location' => 'SmartBankManagement.Insurances.index',
'icon' => 'fas fa-user-injured',
'menu_name' => trans('cruds.smartBankManagement.insurance.title_s')
])

@include('_component.menu-button.child',[
'permission_subjects' => 'stock',
'location' => 'SmartBankManagement.Stocks.index',
'icon' => 'fas fa-poll',
'menu_name' => trans('cruds.smartBankManagement.stock.title_s')
])

@endslot
@endcomponent

@include('_component.menu-button.child',[
'permission_subjects' => 'locker_management',
'location' => 'LockerManagement.Lockers.index',
'icon' => 'fas fa-lock',
])

@include('_component.menu-button.child',[
'permission_subjects' => 'advertisement_management',
'location' => 'AdvertisementManagement.ad.index',
'icon' => 'fas fa-ad',
])

@include('_component.menu-button.child',[
'permission_subjects' => 'tag_management',
'location' => 'TagManagement.Tags.index',
'icon' => 'fas fa-tags',
])
