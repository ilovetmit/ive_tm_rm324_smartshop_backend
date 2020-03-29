<div class="m-3">
    @can('user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("TransactionManagement.LockerTransaction.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.transactionManagement.lockerTransaction.title') }}
            </a>
        </div>
    </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.transactionManagement.lockerTransaction.title') }} {{ trans('global.list') }}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Locker">
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
                        <tr data-entry-id="{{ $user->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $user->id ?? '' }}
                            </td>
                            <td>
                                @include('module.datatable.badge_tag.tag',[
                                'type' => 'info',
                                'element' => $user->id . ". " . $user->getFullNameAttribute() ?? '',
                                ])
                            </td>
                            <td>
                                {{ $user->email ?? '' }}
                            </td>
                            <td>
                                {{ $user->email_verified_at ?? '' }}
                            </td>
                            <td>
                                @foreach($user->hasRole as $key => $item)
                                @include('module.datatable.badge_tag.tag',[
                                'type' => 'info',
                                'element' => $item->name ?? '',
                                ])
                                @endforeach
                            </td>
                            <td>
                                @include('module.datatable.action.index',[
                                'permission_subject' => 'user',
                                'route_subject' => 'UserManagement.Users',
                                'id' => $user->id
                                ])
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@section('scripts')
@parent
@include('module.datatable.massdestory',[
'permission_massDestory' => 'user_delete',
'route' => route('UserManagement.Users.massDestroy'),
'pageLength' => 25,
'class' => 'datatable-User'
])
@endsection