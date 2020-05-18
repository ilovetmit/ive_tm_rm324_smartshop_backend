<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('_layout.user-panel.html_head')
</head>

<body>
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        <nav id="sidebar">
            @include('_layout.user-panel.sidebar.s_shop')
        </nav>
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="d-flex">
                <div class="page-header no-margin-bottom">
                    <div class="container-fluid">
                        <h2 class="h5 no-margin-bottom">@section('page_header') @show</h2>
                    </div>
                </div>
                {{-- Header Right (Logout button) --}}
                <div class="page-header no-margin-bottom" style="width:100vw">
                    {{-- @if(Auth::check())
                    <div class="container-fluid text-right">
                        <a id="logout" href="javascript:void(0)"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                            <span class="d-none d-sm-inline">Logout </span><i class="icon-logout"></i></a>
                    </div>
                    <form id="logout-form" action="{{URL::action('Auth\SmartBankingLoginController@logout')}}"
                    method="POST" style="display: none;">
                    {{ csrf_field() }}
                    </form>
                    @endif --}}
                </div>
                {{-- End Header Right (Logout button) --}}
            </div>


            @section('body_main_content') @show

            @include('_layout.user-panel.footer.body_footer')
            @include('_layout.user-panel.footer.body_footer')
        </div>
    </div>

    @section('body_end') @show

    @include('_layout.user-panel.html_end_scripts')

    @section('body_end_scripts') @show

</body>

</html>
