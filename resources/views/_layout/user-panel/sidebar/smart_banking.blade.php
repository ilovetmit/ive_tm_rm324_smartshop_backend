<!-- Sidebar Header-->
<!-- TODO: load user profile pic and name -->
<div class="sidebar-header d-flex align-items-center"><a href="{{URL::action('SmartBankingController@dashboard')}}">
        <div class="avatar"><img src="{{ asset('storage/users/avatar/'. auth()->user()->avatar) }}" class="img-fluid rounded-circle">
        </div>
    </a>
    <div class="title">
        {{-- todo lastname firstname--}}
        <h1 class="h5">{{auth()->user()->getFullNameAttribute()}}</h1>
        <p>VIP</p>
    </div>
</div>
<!-- Sidebar Navidation Menus--><span class="heading">Main</span>
<ul class="list-unstyled">
    <li
        class="{{ (request()->is('smart-banking/dashboard/*') || (request()->is('smart-banking/dashboard'))) ? 'active' : '' }}">
        <a href="{{ URL::action('SmartBankingController@dashboard') }}"> <i class="fa fa-dashcube"
                aria-hidden="true"></i>Dashboard</a>
    </li>
    <li
        class="{{ (request()->is('smart-banking/transaction/*') || (request()->is('smart-banking/transaction'))) ? 'active' : '' }}">
        <a href="{{ URL::action('SmartBankingController@transaction') }}"> <i class="fa fa-list-alt"
                aria-hidden="true"></i></i>Transaction
        </a></li>
    <li
        class="{{ (request()->is('smart-banking/transfer/*') || (request()->is('smart-banking/transfer'))) ? 'active' : '' }}">
        <a href="{{ URL::action('SmartBankingController@transfer') }}"> <i class="fa fa-exchange"
                aria-hidden="true"></i>Transfer </a>
    </li>
    <li
        class="{{ (request()->is('smart-banking/stock/*') || (request()->is('smart-banking/stock'))) ? 'active' : '' }}">
        <a href="{{ URL::action('SmartBankingController@stock') }}"> <i class="fa fa-line-chart"
                aria-hidden="true"></i>Stock
            Market </a>
    </li>
    <li
        class="{{ (request()->is('smart-banking/insurance/*') || (request()->is('smart-banking/insurance'))) ? 'active' : '' }}">
        <a href="{{ URL::action('SmartBankingController@insurance') }}"><i class="fa fa-shield ml-2"
                aria-hidden="true"></i>Insurance </a></li>
</ul>
