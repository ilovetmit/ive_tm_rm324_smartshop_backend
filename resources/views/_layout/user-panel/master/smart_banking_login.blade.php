<!DOCTYPE html>
<html>

<head>
    @include('_layout.user-panel.html_head')
</head>

<body>

    <div class="container-fluid px-3">
        @section('body_main_content') @show
    </div>

    @section('body_end') @show
    @include('_layout.user-panel.html_end_scripts')
    @section('body_end_scripts') @show

</body>

</html>
