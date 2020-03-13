<div class="m-3">
    @can('user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("TagManagement.Tags.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.tagManagement.sub_title_1.title') }}
            </a>
        </div>
    </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.tagManagement.sub_title_1.title') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-advertisement-Tag">
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
                        @foreach($tags as $key => $tag)
                        <tr data-entry-id="{{ $tag->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tag->id ?? '' }}
                            </td>
                            <td>
                                {{ $tag->name ?? '' }}
                            </td>
                            <td>
                                {{ $tag->description ?? '' }}
                            </td>
                            <td>
                                @include('module.datatable.action.index',[
                                'permission_subject' => 'tag',
                                'route_subject' => 'TagManagement.Tags',
                                'id' => $tag->id
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
'route' => route('AdvertisementManagement.ad.massDestroy'),
'pageLength' => 25,
'class' => 'datatable-advertisement-Tag'
])
@endsection