<?php
if(!isset($menu_name)){
    $name = Str::camel($permission_subjects);
    $menu_name = trans("cruds.$name.title");
}
$regex = '/' . preg_quote(str_replace('.index', '', $location) , '/') . '*/';
?>
@can($permission_subjects . '_access')
<li class="nav-item">
    <a href="{{ route($location) }}"
        class="nav-link {{preg_match($regex, Route::currentRouteName()) ? 'active' : null}}">
        <i class="{{$icon}}">
        </i>
        <p>
            <span>{{ $menu_name }}</span>
        </p>
    </a>
</li>
@endcan
