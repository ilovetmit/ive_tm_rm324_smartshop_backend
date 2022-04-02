<!-- Sidebar Header-->
<ul class="list-unstyled">

        @if(Auth::check())
        <li class="{{ (request()->is('s-shop/profile/*') || (request()->is('s-shop/profile'))) ? 'active' : '' }}"><a
                        href="{{ URL::action('SShopController@profile') }}"> <i class="fa fa-user-circle-o"
                                aria-hidden="true"></i>Profile
                </a></li>
        @endif

        <li
                class="{{ (request()->is('s-shop/advertisement/*') || (request()->is('s-shop/advertisement'))) ? 'active' : '' }}">
                <a href="{{ URL::action('SShopController@advertisement') }}"> <i class="fa fa-picture-o"
                                aria-hidden="true"></i>Advertisement </a>
        </li>

        <li class="{{ (request()->is('s-shop/maps/*') || (request()->is('s-shop/maps'))) ? 'active' : '' }}"><a
                        href="{{ URL::action('SShopController@maps') }}"> <i class="fa fa-map"
                                aria-hidden="true"></i>Maps
                </a></li>

        <li class="{{ (request()->is('s-shop/shopping/*') || (request()->is('s-shop/shopping'))) ? 'active' : '' }}"><a
                        href="{{ URL::action('SShopController@shopping') }}"> <i class="fa fa-shopping-cart"
                                aria-hidden="true"></i>Shopping
                </a></li>

        @if(Auth::check())
        <li class="{{ (request()->is('s-shop/history/*') || (request()->is('s-shop/history'))) ? 'active' : '' }}"><a
                        href="{{ URL::action('SShopController@history') }}"> <i class="fa fa-history"
                                aria-hidden="true"></i>History
                </a></li>
        @endif

        @if(Auth::check())
        <li class="mt-4">
                <a id="logout" href="javascript:void(0)"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
        </li>
        <form id="logout-form" action="{{URL::action('SShopController@logout')}}" method="POST" style="display: none;">
                {{ csrf_field() }}
        </form>
        @else
        <li class="mt-4"><a href="{{ URL::action('SShopController@splash') }}"> <i class="fa fa-play"
                                aria-hidden="true"></i>Start
                        Over</a></li>
        @endif
</ul>