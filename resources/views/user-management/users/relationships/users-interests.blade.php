<div class="m-3">
    @can('user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("InformationManagement.Interests.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.informationManagement.sub_title_3.title') }}
            </a>
        </div>
    </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.userManagement.sub_title_3.title') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-user-Interest">
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
                                {{ trans('cruds.fields.description') }}

                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($interests as $key => $interest)
                        <tr data-entry-id="{{ $interest->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $interest->id ?? '' }}
                            </td>
                            <td>
                                {{ $interest->name ?? '' }}
                            </td>
                            <td>
                                {{ $interest->description ?? '' }}
                            </td>
                            <td>
                                @include('module.datatable.action.index',[
                                'permission_subject' => 'interest',
                                'route_subject' => 'InformationManagement.Interests',
                                'id' => $interest->id
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
'permission_massDestory' => 'interest_delete',
'route' => route('InformationManagement.Interests.massDestroy'),
'pageLength' => 25,
'class' => 'datatable-user-Interest'
])
@endsection