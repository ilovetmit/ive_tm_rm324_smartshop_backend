<?php
$menu_open = null;
$match = preg_match_all('/http(.*)"/i', $child, $matches);

foreach ($matches[0] as $key => $url) { // $matches[0] is an array store all of the matched data
    $pure_url = trim(str_replace('"','', $url));
    if(preg_match('/'. preg_quote($pure_url, '/') . '*/', request()->url())){
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
