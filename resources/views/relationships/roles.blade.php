<div class="m-3">
    @can('role_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("UserManagement.Roles.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.userManagement.role.title') }}
            </a>
        </div>
    </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.userManagement.role.title') }} {{ trans('global.list') }}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Role">
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
                                {{ trans('cruds.fields.title') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $key => $role)
                        <tr data-entry-id="{{ $role->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $role->id ?? '' }}
                            </td>
                            <td>
                                {{ $role->name ?? '' }}
                            </td>
                            <td>
                                @foreach($role->hasPermission as $key => $item)
                                @include('module.datatable.badge_tag.tag',[
                                'type' => 'info',
                                'element' => $item->name ?? '',
                                ])
                                @endforeach
                            </td>
                            <td>
                                @include('module.datatable.action.index',[
                                'permission_subject' => 'role',
                                'route_subject' => 'UserManagement.Roles',
                                'id' => $role->id
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
@include('module.datatable.massdestory',[
'permission_massDestory' => 'role_delete',
'route' => route('UserManagement.Roles.massDestroy'),
'pageLength' => 25,
'class' => 'datatable-Role'
])
@endsection