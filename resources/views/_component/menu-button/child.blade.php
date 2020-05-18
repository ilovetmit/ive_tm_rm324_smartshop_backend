<?php
if(!isset($menu_name)){
    $name = Str::camel($permission_subjects);
    $menu_name = trans("cruds.$name.title");
}
?>
@can($permission_subjects . '_access')
<li class="nav-item">
    <a href="{{ route($location) }}" class="nav-link {{Route::currentRouteName() === $location ? 'active' : null}}">
        <i class="{{$icon}}">
        </i>
        <p>
            <span>{{ $menu_name }}</span>
        </p>
    </a>
</li>
@endcan
