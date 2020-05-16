<!-- Sidebar Header-->
<div class="sidebar-header d-flex align-items-center"><a href="/user/profile">
        <div class="avatar"><img src="{{asset("vendor/smart_shop_user/img/avatar-6.jpg")}}" alt="..."
                class="img-fluid rounded-circle"></div>
    </a>
    <div class="title">
        <h1 class="h5">Mark Stephen</h1>
        <p>Web Designer</p>
    </div>
</div>
<!-- Sidebar Navidation Menus--><span class="heading">Main</span>
<ul class="list-unstyled">
    <li class="{{ (request()->is('user/shopping/*') || (request()->is('user/shopping'))) ? 'active' : '' }}"><a
            href="/user/shopping"> <i class="fa fa-shopping-cart"></i>Shopping </a></li>
    <li class="{{ (request()->is('user/profile/*') || (request()->is('user/profile'))) ? 'active' : '' }}"><a
            href="/user/profile"> <i class="fa fa-user"></i>Profile </a></li>
    <li class="{{ (request()->is('user/transaction/*') || (request()->is('user/transaction'))) ? 'active' : '' }}"><a
            href="/user/transaction"> <i class="fa fa-exchange"></i>Transaction </a></li>
    <li class="{{ (request()->is('user/stock/*') || (request()->is('user/stock'))) ? 'active' : '' }}"><a
            href="/user/stock"> <i class="fa fa-line-chart"></i>Stock Market </a></li>
    <li class="{{ (request()->is('user/insurance/*') || (request()->is('user/insurance'))) ? 'active' : '' }}"><a
            href="/user/insurance"> <i class="fa fa-heart"></i>Insurance </a></li>
    <li class="{{ (request()->is('user/maps/*') || (request()->is('user/maps'))) ? 'active' : '' }}"><a
            href="/user/maps"> <i class="fa fa-map-marker"></i>Maps </a></li>
    <li class="{{ (request()->is('user/advertisement/*') || (request()->is('user/advertisement'))) ? 'active' : '' }}">
        <a href="/user/advertisement"> <i class="fa fa-youtube-play"></i>Advertisement </a></li>
</ul>