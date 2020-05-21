<div class="m-3">
    {{--
    @can('user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("UserManagement.Users.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.userManagement.user.title') }}
            </a>
        </div>
    </div>
    @endcan
    --}}
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.userManagement.user.title') }} {{ trans('global.list') }}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.fields.email') }}
                            </th>
                            <th>
                                {{ trans('cruds.fields.email_verified_at') }}
                            </th>
                            <th>
                                {{ trans('cruds.fields.role') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $user)
                        <tr data-entry-id="{{ $user->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $user->id ?? '' }}
                            </td>
                            <td>
                                {{ $user->full_name ?? '' }}
                            </td>
                            <td>
                                {{ $user->email ?? '' }}
                            </td>
                            <td>
                                {{ $user->email_verified_at ?? '' }}
                            </td>
                            <td>
                                @foreach($user->hasRole as $key => $item)
                                @include('_module.datatable.badge_tag.tag',[
                                'type' => config('constant.badge_type')[$item->name],
                                'element' => $item->name ?? '',
                                ])
                                @endforeach
                            </td>
                            <td>
                                @include('_module.datatable.action.index',[
                                'permission_subject' => 'user',
                                'route_subject' => 'UserManagement.Users',
                                'id' => $user->id
                                ])
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('scripts')
@parent
@include('_module.datatable.massdestory',[
'permission_massDestory' => '{{--user_delete--}}',
'route' => route('UserManagement.Users.massDestroy'),
'pageLength' => 25,
'class' => 'datatable-User'
])
@endsection
