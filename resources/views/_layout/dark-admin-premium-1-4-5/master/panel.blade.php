<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('_layout.dark-admin-premium-1-4-5.html_head')
</head>
<body>
<header class="header">
    <nav class="navbar navbar-expand-lg">
        @include('_layout.dark-admin-premium-1-4-5.navbar.body_search_panel')
        <div class="container-fluid d-flex align-items-center justify-content-between">
            @include('_layout.dark-admin-premium-1-4-5.navbar.body_left_navbar')
            @include('_layout.dark-admin-premium-1-4-5.navbar.body_right_navbar')
        </div>
    </nav>
</header>
<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
        @include('_layout.dark-admin-premium-1-4-5.sidebar.body_sidebar')
    </nav>
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        @section('page_header') @show

        @section('body_main_content') @show

        @include('_layout.dark-admin-premium-1-4-5.footer.body_footer')
    </div>
</div>

@section('body_end') @show

@include('_layout.dark-admin-premium-1-4-5.html_end_scripts')

@section('body_end_scripts') @show

</body>
</html>