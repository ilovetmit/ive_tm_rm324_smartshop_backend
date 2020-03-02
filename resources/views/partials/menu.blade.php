<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="" alt=" " class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ trans('panel.site_header_title') }}</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="" alt=" " class="img-circle elevation-2">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!----------------------------------------------------------------------------------------------------------------------------------------------------->
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route("Dashboard") }}" class="nav-link {{ request()->is('SmartShop/Dashboard') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <p>
                            <span>{{ trans('global.dashboard') }}</span>
                        </p>
                    </a>
                </li>
                <!----------------------------------------------------------------------------------------------------------------------------------------------------->
                <!-- UserManagement -->
                @can('user_management_access')
                <li class="nav-item has-treeview {{ request()->is('SmartShop/UserManagement*') ? 'menu-open' : '' }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users"></i>
                        <p>
                            <span>{{ trans('cruds.userManagement.title') }}</span>
                            <i class="right fa fa-fw fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('permission_access')
                        <li class="nav-item">
                            <a href="{{ route("UserManagement.Permissions.index") }}" class="nav-link {{ request()->is('SmartShop/UserManagement/Permissions*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-unlock-alt"></i>
                                <p>
                                    <span>{{ trans('cruds.userManagement.sub_title_1.title_s') }}</span>
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('role_access')
                        <li class="nav-item">
                            <a href="{{ route("UserManagement.Roles.index") }}" class="nav-link {{ request()->is('SmartShop/UserManagement/Roles*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-briefcase"></i>
                                <p>
                                    <span>{{ trans('cruds.userManagement.sub_title_2.title_s') }}</span>
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('user_access')
                        <li class="nav-item">
                            <a href="{{ route("UserManagement.Users.index") }}" class="nav-link {{ request()->is('SmartShop/UserManagement/Users*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-user"></i>
                                <p>
                                    <span>{{ trans('cruds.userManagement.sub_title_3.title_s') }}</span>
                                </p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                <!----------------------------------------------------------------------------------------------------------------------------------------------------->
                <!-- InformationManagement -->
                @can('information_management_access')
                <li class="nav-item has-treeview {{ request()->is('SmartShop/InformationManagement*') ? 'menu-open' : '' }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users"></i>
                        <p>
                            <span>{{ trans('cruds.informationManagement.title') }}</span>
                            <i class="right fa fa-fw fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('address_access')
                        <li class="nav-item">
                            <a href="{{ route("InformationManagement.Addresses.index") }}" class="nav-link {{ request()->is('SmartShop/InformationManagement/Addresses*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-unlock-alt"></i>
                                <p>
                                    <span>{{ trans('cruds.informationManagement.sub_title_1.title_s') }}</span>
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('device_access')
                        <li class="nav-item">
                            <a href="{{ route("InformationManagement.Devices.index") }}" class="nav-link {{ request()->is('SmartShop/InformationManagement/Devices*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-briefcase"></i>
                                <p>
                                    <span>{{ trans('cruds.informationManagement.sub_title_2.title_s') }}</span>
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('interest_access')
                        <li class="nav-item">
                            <a href="{{ route("InformationManagement.Interests.index") }}" class="nav-link {{ request()->is('SmartShop/InformationManagement/Interests*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-user"></i>
                                <p>
                                    <span>{{ trans('cruds.informationManagement.sub_title_3.title_s') }}</span>
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('vitcoin_access')
                        <li class="nav-item">
                            <a href="{{ route("InformationManagement.Vitcoins.index") }}" class="nav-link {{ request()->is('SmartShop/InformationManagement/Vitcoins*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-user"></i>
                                <p>
                                    <span>{{ trans('cruds.informationManagement.sub_title_4.title_s') }}</span>
                                </p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                <!----------------------------------------------------------------------------------------------------------------------------------------------------->
                <!-- SmartBankManagement -->
                @can('smart_bank_management_access')
                <li class="nav-item has-treeview {{ request()->is('SmartShop/SmartBankManagement*') ? 'menu-open' : '' }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users"></i>
                        <p>
                            <span>{{ trans('cruds.smartBankManagement.title') }}</span>
                            <i class="right fa fa-fw fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('insurance_access')
                        <li class="nav-item">
                            <a href="{{ route("SmartBankManagement.Insurances.index") }}" class="nav-link {{ request()->is('SmartShop/SmartBankManagement/Insurances*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-briefcase"></i>
                                <p>
                                    <span>{{ trans('cruds.smartBankManagement.sub_title_1.title_s') }}</span>
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('stock_access')
                        <li class="nav-item">
                            <a href="{{ route("SmartBankManagement.Stocks.index") }}" class="nav-link {{ request()->is('SmartShop/SmartBankManagement/Stocks*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-unlock-alt"></i>
                                <p>
                                    <span>{{ trans('cruds.smartBankManagement.sub_title_2.title_s') }}</span>
                                </p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                <!----------------------------------------------------------------------------------------------------------------------------------------------------->
                <!-- ProductionManagement -->
                @can('product_management_access')
                <li class="nav-item has-treeview {{ request()->is('SmartShop/ProductManagement*') ? 'menu-open' : '' }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users"></i>
                        <p>
                            <span>{{ trans('cruds.productManagement.title') }}</span>
                            <i class="right fa fa-fw fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('vending_product_access')
                        <li class="nav-item has-treeview {{ request()->is('SmartShop/ProductManagement/VendingMachine*') ? 'menu-open' : '' }}">
                            <a class="nav-link nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-users"></i>
                                <p>
                                    <span>Vending Machine</span>
                                    <i class="right fa fa-fw fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('vending_product_access')
                                <li class="nav-item">
                                    <a href="{{ route("ProductManagement.VendingProducts.index") }}" class="nav-link {{ request()->is('SmartShop/ProductManagement/VendingMachine/VendingProducts*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user"></i>
                                        <p>
                                            <span>{{ trans('cruds.productManagement.sub_title_3.title_s') }}</span>
                                        </p>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        @endcan
                        <li class="nav-item has-treeview {{ request()->is('SmartShop/ProductManagement/OnSell*') ? 'menu-open' : '' }}">
                            <a class="nav-link nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-users"></i>
                                <p>
                                    <span>On Sell Product</span>
                                    <i class="right fa fa-fw fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('vending_product_access')
                                <li class="nav-item">
                                    <a href="{{ route("ProductManagement.ShopProducts.index") }}" class="nav-link {{ request()->is('SmartShop/ProductManagement/OnSell/ShopProducts*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-briefcase"></i>
                                        <p>
                                            <span>{{ trans('cruds.productManagement.sub_title_4.title_s') }}</span>
                                        </p>
                                    </a>
                                </li>
                                @endcan
                                @can('led_access')
                                <li class="nav-item">
                                    <a href="{{ route("ProductManagement.LEDs.index") }}" class="nav-link {{ request()->is('SmartShop/ProductManagement/OnSell/LEDs*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user"></i>
                                        <p>
                                            <span>{{ trans('cruds.productManagement.sub_title_5.title_s') }}</span>
                                        </p>
                                    </a>
                                </li>
                                @endcan
                                @can('shop_product_inventory_access')
                                <li class="nav-item">
                                    <a href="{{ route("ProductManagement.ShopProductInventories.index") }}" class="nav-link {{ request()->is('SmartShop/ProductManagement/OnSell/ShopProductInventories*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user"></i>
                                        <p>
                                            <span>{{ trans('cruds.productManagement.sub_title_6.title_s') }}</span>
                                        </p>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        @can('product_access')
                        <li class="nav-item">
                            <a href="{{ route("ProductManagement.Products.index") }}" class="nav-link {{ request()->is('SmartShop/ProductManagement/Products*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-unlock-alt"></i>
                                <p>
                                    <span>{{ trans('cruds.productManagement.sub_title_1.title_s') }}</span>
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('category_access')
                        <li class="nav-item">
                            <a href="{{ route("ProductManagement.Categories.index") }}" class="nav-link {{ request()->is('SmartShop/ProductManagement/Categories*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-briefcase"></i>
                                <p>
                                    <span>{{ trans('cruds.productManagement.sub_title_2.title_s') }}</span>
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('product_wall_access')
                        <li class="nav-item">
                            <a href="{{ route("ProductManagement.ProductWalls.index") }}" class="nav-link {{ request()->is('SmartShop/ProductManagement/ProductWalls*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-user"></i>
                                <p>
                                    <span>{{ trans('cruds.productManagement.sub_title_7.title_s') }}</span>
                                </p>
                            </a>
                        </li>
                        @endcan


                    </ul>
                </li>
                @endcan
                <!----------------------------------------------------------------------------------------------------------------------------------------------------->
                <!-- TransactionManagement -->
                @can('transaction_management_access')
                <li class="nav-item has-treeview {{ request()->is('SmartShop/TransactionManagement*') ? 'menu-open' : '' }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users"></i>
                        <p>
                            <span>{{ trans('cruds.transactionManagement.title') }}</span>
                            <i class="right fa fa-fw fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('transaction_access')
                        <li class="nav-item">
                            <a href="{{ route("TransactionManagement.Transactions.index") }}" class="nav-link {{ request()->is('SmartShop/TransactionManagement/Transactions*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-unlock-alt"></i>
                                <p>
                                    <span>{{ trans('cruds.transactionManagement.sub_title_1.title_s') }}</span>
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('remittance_transaction_access')
                        <li class="nav-item">
                            <a href="{{ route("TransactionManagement.RemittanceTransactions.index") }}" class="nav-link {{ request()->is('SmartShop/TransactionManagement/RemittanceTransactions*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-briefcase"></i>
                                <p>
                                    <span>{{ trans('cruds.transactionManagement.sub_title_2.title_s') }}</span>
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('product_transaction_access')
                        <li class="nav-item">
                            <a href="{{ route("TransactionManagement.ProductTransactions.index") }}" class="nav-link {{ request()->is('SmartShop/TransactionManagement/ProductTransactions*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-user"></i>
                                <p>
                                    <span>{{ trans('cruds.transactionManagement.sub_title_3.title_s') }}</span>
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('locker_transaction_access')
                        <li class="nav-item">
                            <a href="{{ route("TransactionManagement.LockerTransactions.index") }}" class="nav-link {{ request()->is('SmartShop/TransactionManagement/LockerTransactions*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-user"></i>
                                <p>
                                    <span>{{ trans('cruds.transactionManagement.sub_title_4.title_s') }}</span>
                                </p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                <!----------------------------------------------------------------------------------------------------------------------------------------------------->
                <!-- TagManagement -->
                @can('tag_management_access')
                <li class="nav-item">
                    <a href="{{ route("TagManagement.Tags.index") }}" class="nav-link {{ request()->is('SmartShop/TagManagement/Tags*') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <p>
                            <span>{{ trans('cruds.tagManagement.sub_title_1.title_s') }}</span>
                        </p>
                    </a>
                </li>
                @endcan
                <!----------------------------------------------------------------------------------------------------------------------------------------------------->
                <!-- AdvertisementManagement -->
                @can('advertisement_management_access')
                <li class="nav-item">
                    <a href="{{ route("AdvertisementManagement.Advertisements.index") }}" class="nav-link {{ request()->is('SmartShop/AdvertisementManagement/Advertisements*') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <p>
                            <span>{{ trans('cruds.advertisementManagement.sub_title_1.title_s') }}</span>
                        </p>
                    </a>
                </li>
                @endcan
                <!----------------------------------------------------------------------------------------------------------------------------------------------------->
                <!-- LockerManagement -->
                @can('locker_management_access')
                <li class="nav-item">
                    <a href="{{ route("LockerManagement.Lockers.index") }}" class="nav-link {{ request()->is('SmartShop/LockerManagement/Lockers*') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <p>
                            <span>{{ trans('cruds.lockerManagement.sub_title_1.title_s') }}</span>
                        </p>
                    </a>
                </li>
                @endcan
                <!----------------------------------------------------------------------------------------------------------------------------------------------------->
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt"></i>
                            <span>{{ trans('global.logout') }}</span>
                        </p>
                    </a>
                </li>
                <!----------------------------------------------------------------------------------------------------------------------------------------------------->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>