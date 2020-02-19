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
                <li class="nav-item">
                    <a href="" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <p>
                            <span>{{ trans('global.dashboard') }}</span>
                        </p>
                    </a>
                </li>
                <!-- user_management_access -->
                @can('user_management_access')
                <li class="nav-item has-treeview {{ request()->is('admin/user*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
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
                            <a href="" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-unlock-alt"></i>
                                <p>
                                    <span>{{ trans('cruds.userManagement.sub_title_1.title_s') }}</span>
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('role_access')
                        <li class="nav-item">
                            <a href="" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-briefcase"></i>
                                <p>
                                    <span>{{ trans('cruds.userManagement.sub_title_2.title_s') }}</span>
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('user_access')
                        <li class="nav-item">
                            <a href="" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
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
                <!-- product_management_access -->
                @can('product_management_access')
                <li class="nav-item has-treeview {{ request()->is('admin/product*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users"></i>
                        <p>
                            <span>{{ trans('cruds.productManagement.title') }}</span>
                            <i class="right fa fa-fw fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('product_access')
                        <li class="nav-item">
                            <a href="" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-unlock-alt"></i>
                                <p>
                                    <span>{{ trans('cruds.productManagement.sub_title_1.title_s') }}</span>
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('shop_product_access')
                        <li class="nav-item">
                            <a href="" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-briefcase"></i>
                                <p>
                                    <span>{{ trans('cruds.productManagement.sub_title_2.title_s') }}</span>
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('vending_product_access')
                        <li class="nav-item">
                            <a href="" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-user"></i>
                                <p>
                                    <span>{{ trans('cruds.productManagement.sub_title_3.title_s') }}</span>
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('product_transaction_access')
                        <li class="nav-item">
                            <a href="" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-user"></i>
                                <p>
                                    <span>{{ trans('cruds.productManagement.sub_title_4.title_s') }}</span>
                                </p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                <!-- product_wall_management -->
                @can('product_wall_management_access')
                <li class="nav-item {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users"></i>
                        <p>
                            <span>{{ trans('cruds.productWallManagement.title_s') }}</span>
                        </p>
                    </a>
                </li>
                @endcan
                @can('Advertisement_management_access')
                <li class="nav-item {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users"></i>
                        <p>
                            <span>{{ trans('cruds.AdvertisementManagement.title_s') }}</span>
                        </p>
                    </a>
                </li>
                @endcan
                @can('transaction_management_access')
                <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users"></i>
                        <p>
                            <span>{{ trans('cruds.transactionManagement.title_s') }}</span>
                            <i class="right fa fa-fw fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('transaction_access')
                        <li class="nav-item">
                            <a href="" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-unlock-alt"></i>
                                <p>
                                    <span>{{ trans('cruds.transactionManagement.sub_title_1.title_s') }}</span>
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('remittance_transaction_access')
                        <li class="nav-item">
                            <a href="" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-briefcase"></i>
                                <p>
                                    <span>{{ trans('cruds.transactionManagement.sub_title_2.title_s') }}</span>
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('product_transaction_access')
                        <li class="nav-item">
                            <a href="" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-user"></i>
                                <p>
                                    <span>{{ trans('cruds.transactionManagement.sub_title_3.title_s') }}</span>
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('locker_transaction_access')
                        <li class="nav-item">
                            <a href="" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
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
                @can('locker_management_access')
                <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users"></i>
                        <p>
                            <span>{{ trans('cruds.lockerManagement.title') }}</span>
                            <i class="right fa fa-fw fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('locker_access')
                        <li class="nav-item">
                            <a href="" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-unlock-alt"></i>
                                <p>
                                    <span>{{ trans('cruds.lockerManagement.sub_title_1.title_s') }}</span>
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('locker_transaction_access')
                        <li class="nav-item">
                            <a href="" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-briefcase"></i>
                                <p>
                                    <span>{{ trans('cruds.lockerManagement.sub_title_2.title_s') }}</span>
                                </p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                @can('stock_management_access')
                <li class="nav-item {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users"></i>
                        <p>
                            <span>{{ trans('cruds.stockManagement.title') }}</span>
                        </p>
                    </a>
                </li>
                @endcan
                @can('insurance_management_access')
                <li class="nav-item {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users"></i>
                        <p>
                            <span>{{ trans('cruds.insuranceManagement.title') }}</span>
                        </p>
                    </a>
                </li>
                @endcan



                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt"></i>
                            <span>{{ trans('global.logout') }}</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>