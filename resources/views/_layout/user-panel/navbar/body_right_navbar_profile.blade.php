<div class="list-inline-item logout">
    <a id="logout" href="javascript:void(0)"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
        <span class="d-none d-sm-inline">Logout </span><i class="icon-logout"></i></a>

    <form id="logout-form" action="{{URL::action('Auth\SmartBankingLoginController@logout')}}" method="POST"
        style="display: none;">
        {{ csrf_field() }}
    </form>
</div>