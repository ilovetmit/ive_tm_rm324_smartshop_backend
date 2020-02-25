@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.userManagement.sub_title_1.title') }} {{ $permission }}
    </div>

</div>



@endsection