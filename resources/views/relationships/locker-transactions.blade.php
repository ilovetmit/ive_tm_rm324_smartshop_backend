<div class="m-3">
    @can('locker_transaction_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{-- route("TransactionManagement.LockerTransaction.create") --}}">
                {{ trans('global.add') }} {{ trans('cruds.lockerTransaction.locker_transaction.title') }}
            </a>
        </div>
    </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.lockerTransaction.locker_transaction.title') }} {{ trans('global.list') }}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-locker-LockerTransaction">
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
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr data-entry-id="{{-- $locker_transaction->id --}}">
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                {{--
                                @include('module.datatable.action.index',[
                                'permission_subject' => 'locker_transaction',
                                'route_subject' => 'TransactionManagement.LockerTransaction',
                                'id' => '',
                                ])
                                --}}

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
'permission_massDestory' => 'locker_transaction_delete',
'route' => route('InformationManagement.Devices.massDestroy'),
'pageLength' => 25,
'class' => 'datatable-locker-LockerTransaction'
])
@endsection