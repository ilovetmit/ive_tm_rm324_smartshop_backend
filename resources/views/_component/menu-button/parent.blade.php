<?php
$menu_open = null;
$match = preg_match_all('/http(.*)" /im', $child, $array);

foreach ($array[0] as $key => $url) {
    if(request()->url() === trim(str_replace('"','', $url))){
        $menu_open = 'menu-open';
        break;
    }
}

if(getType($permission_subjects) === 'string'){
    if(!isset($menu_name)){
        $name = Str::camel($permission_subjects);
        $menu_name = trans("cruds.$name.title");
    }
    $permission_subjects = $permission_subjects . '_access';
}

if(getType($permission_subjects) === 'array'){
    if(!isset($menu_name)){
        $menu_name = 'XXX';
    }
    foreach ($permission_subjects as $key => $permission_subject) {
        $permission_subjects[$key] = $permission_subject . '_access';
    }
}
?>

@canany($permission_subjects)
<li class="nav-item has-treeview {{$menu_open}}">
    <a class="nav-link nav-dropdown-toggle {{$menu_open}}" href="#">
        <i class="{{$icon}}"></i>
        <p>
            <span>{{ $menu_name }}</span>
        </p>
        <i class="right fas fa-angle-left"></i>
    </a>
    <ul class="nav nav-treeview">
        {{$child}}
    </ul>
</li>
@endcanany
