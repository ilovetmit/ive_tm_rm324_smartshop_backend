<!-- Sidebar Header-->
<!-- TODO: load user profile pic and name -->
<div class="sidebar-header d-flex align-items-center"><a href="{{URL::action('SmartBankingController@dashboard')}}">
                <div class="avatar"><img src="{{ auth()->user()->avatar }}" class="img-fluid rounded-circle">
                </div>
        </a>
        <div class="title">
                <h1 class="h5">{{auth()->user()->name}}</h1>
                <p>VIP</p>
        </div>
</div>
<!-- Sidebar Navidation Menus--><span class="heading">Main</span>
<ul class="list-unstyled">
        <li class="{{ (request()->is('/dashboard/*') || (request()->is('/dashboard'))) ? 'active' : '' }}"><a
                        href="{{ URL::action('SmartBankingController@dashboard') }}"> <i class="fa fa-dashcube"
                                aria-hidden="true"></i>Dashboard</a>
        </li>
        <li
                class="{{ (request()->is('/transaction/*') || (request()->is('/transaction'))) ? 'active' : '' }}">
                <a href="{{ URL::action('SmartBankingController@transaction') }}"> <i class="fa fa-list-alt"
                                aria-hidden="true"></i></i>Transaction
                </a></li>
        <li class="{{ (request()->is('/transfer/*') || (request()->is('/transfer'))) ? 'active' : '' }}"><a
                        href="{{ URL::action('SmartBankingController@transfer') }}"> <i class="fa fa-exchange"
                                aria-hidden="true"></i>Transfer </a>
        </li>
        <li class="{{ (request()->is('/stock/*') || (request()->is('/stock'))) ? 'active' : '' }}"><a
                        href="{{ URL::action('SmartBankingController@stock') }}"> <i class="fa fa-line-chart"
                                aria-hidden="true"></i>Stock
                        Market </a>
        </li>
        <li class="{{ (request()->is('/insurance/*') || (request()->is('/insurance'))) ? 'active' : '' }}"><a
                        href="{{ URL::action('SmartBankingController@insurance') }}"><i class="fa fa-shield ml-2"
                                aria-hidden="true"></i>Insurance </a></li>
</ul>
